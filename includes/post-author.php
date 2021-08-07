<?php

/**
 * Overrides core/post-author to run bigram_the_content to change the output.
 *
 * @param $attributes
 * @param $content
 * @param $block
 *
 * @return string
 */
function sb_render_block_core_post_author( $attributes, $content, $block ) {
    $html = gutenberg_render_block_core_post_author( $attributes, $content, $block );
    if ( function_exists( 'bigram_the_content') ) {
    	$html=bigram_the_content( $html );
    }
    $html = sb_replace_bigram_with_self_bio( $html );
    return $html;
}

function sb_replace_bigram_with_self_bio( $html ) {
	$url = site_url( '/bigram/self-bio');
	$link = sprintf( '<a href="%s">Self Bio</a>', $url );
	$html = str_replace( '<p class="wp-block-post-author__name">bigram</p>', $link,	$html );
	return $html;
}