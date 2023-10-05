<?php

// Home Page Customizer panel.
$wp_customize->add_panel(
	'wonderful_blog_frontpage_panel',
	array(
		'title'    => esc_html__( 'Frontpage Sections', 'wonderful-blog' ),
		'priority' => 140,
	)
);

$customizer_settings = array( 'popular-posts', 'instagram' );

foreach ( $customizer_settings as $customizer ) {

	require get_template_directory() . '/inc/customizer/frontpage-customizer/' . $customizer . '.php';

}
