<?php
/**
 * Outstanding Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Outstanding Blog
 */

add_theme_support( 'title-tag' );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'register_block_style' );

add_theme_support( 'register_block_pattern' );

add_theme_support( 'responsive-embeds' );

add_theme_support( 'wp-block-styles' );

add_theme_support( 'align-wide' );

add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	)
);

add_theme_support(
	'custom-logo',
	array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	)
);

if ( ! function_exists( 'outstanding_blog_setup' ) ) :
	function outstanding_blog_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'outstanding-blog', get_stylesheet_directory() . '/languages' );
	}
endif;
add_action( 'after_setup_theme', 'outstanding_blog_setup' );

if ( ! function_exists( 'outstanding_blog_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function outstanding_blog_enqueue_styles() {
		$parenthandle = 'wonderful-blog-style';
		$theme        = wp_get_theme();

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'wonderful-blog-fonts',
				'wonderful-blog-slick-style',
				'wonderful-blog-fontawesome-style',
				'wonderful-blog-blocks-style',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'outstanding-blog-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

	}

endif;

add_action( 'wp_enqueue_scripts', 'outstanding_blog_enqueue_styles' );

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses outstanding_blog_header_style()
 */
function outstanding_blog_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'wonderful_blog_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '614d47',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'wonderful_blog_header_style',
			)
		)
	);
}

// Set up the WordPress core custom background feature.
add_theme_support(
	'custom-background',
	apply_filters(
		'wonderful_blog_custom_background_args',
		array(
			'default-color' => 'ffeee2',
			'default-image' => '',
		)
	)
);

add_action( 'after_setup_theme', 'outstanding_blog_custom_header_setup' );

/**
 * Customizer.
 */
require get_theme_file_path() . '/inc/customizer/customizer.php';

/**
 * Widgets.
 */
require get_theme_file_path() . '/inc/widgets/widgets.php';

function outstanding_blog_load_custom_wp_admin_style() {
	?>
	<style type="text/css">

		.ocdi p.demo-data-download-link {
			display: none !important;
		}

	</style>

	<?php
}
add_action( 'admin_enqueue_scripts', 'outstanding_blog_load_custom_wp_admin_style' );

// One Click Demo Import after import setup.
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_theme_file_path() . '/inc/demo-import.php';
}