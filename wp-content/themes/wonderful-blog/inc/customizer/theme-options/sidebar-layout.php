<?php
/**
 * Sidebar settings
 */

$wp_customize->add_section(
	'wonderful_blog_sidebar_option',
	array(
		'title' => esc_html__( 'Sidebar Options', 'wonderful-blog' ),
		'panel' => 'wonderful_blog_theme_options_panel',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'wonderful_blog_sidebar_position',
	array(
		'sanitize_callback' => 'wonderful_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'wonderful_blog_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'wonderful-blog' ),
		'section' => 'wonderful_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'wonderful-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'wonderful-blog' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'wonderful_blog_post_sidebar_position',
	array(
		'sanitize_callback' => 'wonderful_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'wonderful_blog_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'wonderful-blog' ),
		'section' => 'wonderful_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'wonderful-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'wonderful-blog' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'wonderful_blog_page_sidebar_position',
	array(
		'sanitize_callback' => 'wonderful_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'wonderful_blog_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'wonderful-blog' ),
		'section' => 'wonderful_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'wonderful-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'wonderful-blog' ),
		),
	)
);
