<?php

if ( ! function_exists( 'sb_support' ) ) :
	function sb_support()  {

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Adding support for alignwide and alignfull classes in the block editor.
		//add_theme_support( 'align-wide' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Adding support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		// @TODO Is it a good idea or a bad idea to use style.css as the editor style
		// It's OK when it's empty but is it right to use this file normally?
		//add_editor_style( 'style.css' );
		add_editor_style( 'style-editor.css' );


		// Add support for custom units.
		add_theme_support( 'custom-units' );

		/** Add support for using link colour in certain blocks
		 * https://developer.wordpress.org/block-editor/developers/themes/theme-support/#experimental-%e2%80%94-link-color-control
		 */
		add_theme_support('experimental-link-color');

		add_theme_support('custom-line-height');

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );



	}
	add_action( 'after_setup_theme', 'sb_support' );
endif;

/**
 *
 */
function sb_get_theme_version() {
	if ( defined( 'SCRIPT_DEBUG') && SCRIPT_DEBUG ) {
		$version = filemtime( get_stylesheet_directory() . "/style.css");
	} else {
		$version = wp_get_theme()->get( 'Version' );
	}
	return $version;
}

/**
 * Enqueue scripts and styles.
 */
function sb_scripts() {

	// Enqueue theme stylesheet.

	$version = sb_get_theme_version();
	wp_enqueue_style( 'sb-style', get_template_directory_uri() . '/style.css', array(), $version );

	// Enqueue alignments stylesheet.
	//wp_enqueue_style( 'sb-alignments-style', get_template_directory_uri() . '/assets/alignments-front.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'sb_scripts' );

/**
 * Enables oik based shortcodes.
 */
function sb_init() {
	if (function_exists('bw_add_shortcode')) {
		do_action("oik_add_shortcodes");

	}
	else {
		// oik shortcodes won't be expanded.
	}
	//add_shortcode( 'archive_description', 'fizzie_archive_description' );
	add_shortcode( 'post-edit', 'sb_post_edit' );
}

add_action( 'init', 'sb_init', 20);

require_once __DIR__ . '/includes/block-overrides.php';

/**
 * Filters the_posts
 *
 * Is this a good idea? Filter the posts to get the ones with attached images first.
 * How do we mark the posts that have attached images?
 *
 * @param array $posts
 * @param object $query
 * @return array reordered array of posts
 */
function genesis_sb_the_posts( $posts, $query ) {
   if ( is_admin()) {
        return $posts;
    }
   if ( $query->is_post_type_archive() ) {
	   $post_type=$query->get( 'post_type' );
	   bw_trace2( $post_type, "post_type", true );
	   if ( is_scalar( $post_type ) && ! ( $post_type == 'bigram' || $post_type === 'any' ) ) {
		   return $posts;
	   }
   }
    bw_trace2( count( $posts ), "count(posts)", true, BW_TRACE_VERBOSE );

    $images = array();
    $non_images = array();
    foreach ( $posts as $post ) {
        $thumbnail = 0;
        if ( $post->post_type === 'bigram') {
            $thumbnail = get_post_thumbnail_id($post);
        }
        if ( $thumbnail > 0 ) {
            bw_trace2( $thumbnail, "post: ". $post->ID, false, BW_TRACE_VERBOSE  );
            $images[] = $post;

        } else {
            $non_images[] = $post;
        }
    }
    bw_trace2( $images, "images: " . count( $images ), false, BW_TRACE_VERBOSE  );
    bw_trace2( $non_images, "non_images: " . count( $non_images ), false, BW_TRACE_VERBOSE  );
    $posts = array_merge( $images, $non_images );
    $query->featured_images = count( $images );
    bw_trace2( $query, "query", false, BW_TRACE_DEBUG );
    bw_trace2( count( $posts ), "count(posts)", false, BW_TRACE_VERBOSE  );

    return $posts;
}

add_filter( 'the_posts', 'genesis_sb_the_posts', 10, 2 );

/**
 * Implements [post-edit] shortcode.
 *
 * If the user is authorised return a post edit link for the current post.
 *
 * @param $attrs
 * @param $content
 * @param $tag
 *
 * @return string
 */

function sb_post_edit( $attrs, $content, $tag ) {
    $link = '';
    $url = get_edit_post_link();
    if ( $url ) {
        $class = 'bw_edit';
        $text= __( '(Edit)', 'sb' );
        $link='<a class="' . esc_attr( $class ) . '" href="' . esc_url( $url ) . '">' . $text . '</a>';
    }
    return $link;
}


/**
 * Register custom block styles
 *
 * @since sb v0.4.0
 * @return void
 */
function sb_block_styles() {

	register_block_style(
		'core/paragraph',
		array(
			'name'        =>'aiprompt',
			'label'       =>__( 'AI prompt', 'sb' )
		)
	);
	register_block_style(
		'core/paragraph',
		array(
			'name'        =>'airesponse',
			'label'       =>__( 'AI response', 'sb' )
		)
	);
	register_block_style(
		'core/paragraph',
		array(
			'name'        =>'revisedprompt',
			'label'       =>__( 'Revised prompt', 'sb' ),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'        =>'aiprompt',
			'label'       =>__( 'AI prompt', 'sb' )
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'        =>'airesponse',
			'label'       =>__( 'AI response', 'sb' )
		)
	);
}
add_action( 'init', 'sb_block_styles' );

	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since sb v0.5.0
	 * @return void
	 */
	function sb_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/paragraph',
			array(
				'handle' => 'sb-paragraph-style-aiprompt',
				'src'    => get_theme_file_uri( 'css/paragraph-aiprompt.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_theme_file_path( 'css/paragraph-aiprompt.css' ),
			)
		);
	}


add_action( 'init', 'sb_block_stylesheets' );
