<?php
/**
 * Blog / Archive Options
 */

$wp_customize->add_section(
	'wonderful_blog_archive_page_options',
	array(
		'title' => esc_html__( 'Blog / Archive Pages Options', 'wonderful-blog' ),
		'panel' => 'wonderful_blog_theme_options_panel',
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'wonderful_blog_excerpt_length',
	array(
		'default'           => 15,
		'sanitize_callback' => 'wonderful_blog_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'wonderful_blog_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'wonderful-blog' ),
		'section'     => 'wonderful_blog_archive_page_options',
		'settings'    => 'wonderful_blog_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Enable archive page category setting.
$wp_customize->add_setting(
	'wonderful_blog_enable_archive_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_enable_archive_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'wonderful-blog' ),
			'settings' => 'wonderful_blog_enable_archive_category',
			'section'  => 'wonderful_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page author setting.
$wp_customize->add_setting(
	'wonderful_blog_enable_archive_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_enable_archive_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'wonderful-blog' ),
			'settings' => 'wonderful_blog_enable_archive_author',
			'section'  => 'wonderful_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page date setting.
$wp_customize->add_setting(
	'wonderful_blog_enable_archive_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_enable_archive_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'wonderful-blog' ),
			'settings' => 'wonderful_blog_enable_archive_date',
			'section'  => 'wonderful_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);
