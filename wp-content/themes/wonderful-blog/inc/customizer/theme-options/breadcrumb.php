<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'wonderful_blog_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'wonderful-blog' ),
		'panel' => 'wonderful_blog_theme_options_panel',
	)
);

// Breadcrumb enable setting.
$wp_customize->add_setting(
	'wonderful_blog_breadcrumb_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_breadcrumb_enable',
		array(
			'label'    => esc_html__( 'Enable breadcrumb.', 'wonderful-blog' ),
			'type'     => 'checkbox',
			'settings' => 'wonderful_blog_breadcrumb_enable',
			'section'  => 'wonderful_blog_breadcrumb_section',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'wonderful_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'wonderful_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'wonderful_blog_breadcrumb_enable' )->value() );
		},
	)
);
