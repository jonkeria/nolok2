<?php

// CSS to hide demo data download link.
function outstanding_blog_intro_text( $default_text ) {
	$default_text .= sprintf(
		'<p class="outstanding-blog-demo-data">%1$s <a href="%2$s" target="_blank">%3$s</a></p>',
		esc_html__( 'Demo content files for Outstanding Blog Theme.', 'outstanding-blog' ),
		esc_url( 'https://demo.adorethemes.com/documentations/docs/outstanding-blog/demo-data/' ),
		esc_html__( 'Click here for Demo File download', 'outstanding-blog' )
	);

	return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'outstanding_blog_intro_text' );

/**
 * OCDI after import.
 */
function outstanding_blog_after_import_setup() {
	// Assign menus to their locations.
	$primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$social_menu  = get_term_by( 'name', 'Social Menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary' => $primary_menu->term_id,
			'social'  => $social_menu->term_id,
		)
	);

}
add_action( 'ocdi/after_import', 'outstanding_blog_after_import_setup' );

// Style for demo data download link.
function outstanding_blog_admin_panel_demo_data_download_link() {
	?>
	<style type="text/css">
		p.outstanding-blog-demo-data {
			font-size: 16px;
			font-weight: 700;
			display: inline-block;
			border: 0.5px solid #dfdfdf;
			padding: 8px;
			background: #ffff;
		}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'outstanding_blog_admin_panel_demo_data_download_link' );
