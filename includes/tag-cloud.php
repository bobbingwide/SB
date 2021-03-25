<?php
/**
 * Server-side rendering of the `core/tag-cloud` block.
 *
 * @package WordPress
 */

/**
 * Renders the `core/tag-cloud` block on server.
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the tag cloud for selected taxonomy.
 */
function sb_render_block_core_tag_cloud( $attributes ) {
    $args      = array(
        'echo'       => false,
        'taxonomy'   => $attributes['taxonomy'],
        'show_count' => $attributes['showTagCounts'],
    );
    $tag_cloud = wp_tag_cloud( $args );

    if ( ! $tag_cloud ) {
        $taxonomy = get_taxonomy($attributes['taxonomy']);
        if ($taxonomy) {
            $labels = get_taxonomy_labels(get_taxonomy($attributes['taxonomy']));
            $tag_cloud = esc_html(
                sprintf(
                /* translators: %s: taxonomy name */
                    __('Your site doesn&#8217;t have any %s, so there&#8217;s nothing to display here at the moment.'),
                    strtolower($labels->name)
                )
            );
        } else {
            $tag_cloud = esc_html(
                sprintf(
                /* translators: %s: taxonomy name */
                    __('Tag cloud not displayed. Taxonomy %s is not registered.'), $attributes['taxonomy']

                )
            );
        }

    }

    $wrapper_attributes = get_block_wrapper_attributes();

    return sprintf(
        '<p %1$s>%2$s</p>',
        $wrapper_attributes,
        $tag_cloud
    );
}


