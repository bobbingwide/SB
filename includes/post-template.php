<?php
/**
 * Overrides core/query-loop to implement multi part main query processing.
 *
 * The home page displays results in 3 blocks
 *
 * 1. Hero block
 * 2. Thumbnail grid of up to 32 posts in full blocks of 4
 * 3. Links
 * followed by a pagination block which is handled separately
 *
 * This is a hack until a solution is delivered in Gutenberg.
 * Note: Gutenberg's development team are probably unaware of the requirements.
 *
 * @param $attributes
 * @param $content
 * @param $block
 * @return string
 */
function sb_render_block_core_post_template( $attributes, $content, $block ) {
    //bw_trace2();
    $limit = null;
    $className = isset( $attributes['className'] ) ? $attributes['className'] : null;
    switch ( $className ) {
        case 'sb hero':
            $offset = 0;
            $limit = 1;
        break;
        case 'sb thumbnail':
            $offset = 1;
            $limit = sb_featured_images( $offset );
        break;
        case 'sb links':
            $offset = 1;
            $limit = sb_featured_images( $offset );
            $offset = $limit;
            global $wp_query;

            $limit = $wp_query->post_count;
        break;
        default:
            // No special processing.
    }

    $html = '';
    //$html .= "<p>Class name: $className</p>";
    if ( $limit ) {
        //$html .=  "<p>Processing: $limit from $offset</p>" . PHP_EOL;
        //bw_trace2( $block->context, "block context", false  );
        $attributes['offset'] = $offset;
        $attributes['limit' ] = $limit;
        $html .= sb_render_block_core_post_template_main_query( $attributes, $content, $block );
    } else {
        if ( function_exists('gutenberg_render_block_core_post_template')) {
            $html .= gutenberg_render_block_core_post_template($attributes, $content, $block);
        } else {
            $html .= render_block_core_post_template($attributes, $content, $block);
        }
    }
    return $html;
}

/**
 * Renders the `core/query-loop` block for a main query on the server.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @param WP_Block $block      Block instance.
 *
 * @return string Returns the output of the query, structured using the layout defined by the block's inner blocks.
 */
function sb_render_block_core_post_template_main_query( $attributes, $content, $block ) {

    global $wp_query;

    $classnames = '';
    if ( isset( $block->context['displayLayout'] ) && isset( $block->context['query'] ) ) {
        if ( isset( $block->context['displayLayout']['type'] ) && 'flex' === $block->context['displayLayout']['type'] ) {
            $classnames = "is-flex-container columns-{$block->context['displayLayout']['columns']}";
        }
    }

    $wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $classnames ) );

    $content = '';
    $index = 0;
    global $more;
    while ( $wp_query->have_posts() ) {
        $wp_query->the_post();
        if ( $index >= $attributes['offset'] && $index < $attributes['limit']) {
            $post = get_post();
            $more=-1;
            $block_content = (
            new WP_Block(
                $block->parsed_block,
                array(
                    'postType' => $post->post_type,
                    'postId' => $post->ID,
                )
            )
            )->render(array('dynamic' => false));
            $content .= "<li>{$block_content}</li>";
        }
        $index++;
    }

    return sprintf(
        '<ul %1$s>%2$s</ul>',
        $wrapper_attributes,
        $content
    );
}

/**
 * Returns the featured image count
 *
 * @param integer offset start offset - to allow for a big image at the start
 * @return integer number of featured images
 */
function sb_featured_images( $offset ) {
    $images = 0;
    global $wp_query;
    //bw_trace2( $wp_query, "wp_query", false );
    if ( property_exists( $wp_query, "featured_images" ) ) {
        $images = $wp_query->featured_images;
    }
    $images = sb_full_rows( $images, $offset );
    return $images;
}

/**
 * Returns the number of full rows
 *
 * @param integer $total total number of posts with featured images remaining
 * @param integer $entries_per_row number of items in a rows
 * @param integer $maximum_rows we support
 * @return integer
 */
function sb_full_rows( $total, $offset=0, $entries_per_row=4, $maximum_rows=8 ) {
    $rows = intdiv( $total-$offset, $entries_per_row );
    $rows = min( $rows, $maximum_rows );
    return ( $rows * $entries_per_row ) + $offset;
}