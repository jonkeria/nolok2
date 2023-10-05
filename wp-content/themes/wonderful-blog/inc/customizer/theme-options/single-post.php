<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'wonderful_blog_single_page_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'wonderful-blog' ),
		'panel' => 'wonderful_blog_theme_options_panel',
	)
);

// Enable single post category setting.
$wp_customize->add_setting(
	'wonderful_blog_enable_single_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_enable_single_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'wonderful-blog' ),
			'settings' => 'wonderful_blog_enable_single_category',
			'section'  => 'wonderful_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post author setting.
$wp_customize->add_setting(
	'wonderful_blog_enable_single_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_enable_single_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'wonderful-blog' ),
			'settings' => 'wonderful_blog_enable_single_author',
			'section'  => 'wonderful_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post date setting.
$wp_customize->add_setting(
	'wonderful_blog_enable_single_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_enable_single_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'wonderful-blog' ),
			'settings' => 'wonderful_blog_enable_single_date',
			'section'  => 'wonderful_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post tag setting.
$wp_customize->add_setting(
	'wonderful_blog_enable_single_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_enable_single_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'wonderful-blog' ),
			'settings' => 'wonderful_blog_enable_single_tag',
			'section'  => 'wonderful_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Single post related Posts title label.
$wp_customize->add_setting(
	'wonderful_blog_related_posts_title',
	array(
		'default'           => __( 'Related Posts', 'wonderful-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wonderful_blog_related_posts_title',
	array(
		'label'           => esc_html__( 'Related Posts Title', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_single_page_options',
		'settings'        => 'wonderful_blog_related_posts_title',
	)
);
