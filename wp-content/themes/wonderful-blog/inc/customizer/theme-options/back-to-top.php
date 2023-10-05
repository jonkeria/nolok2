<?php
/**
 * Back To Top settings
 */

$wp_customize->add_section(
	'wonderful_blog_back_to_top_section',
	array(
		'title' => esc_html__( 'Scroll Up ( Back To Top )', 'wonderful-blog' ),
		'panel' => 'wonderful_blog_theme_options_panel',
	)
);

// Scroll to top enable setting.
$wp_customize->add_setting(
	'wonderful_blog_enable_scroll_to_top',
	array(
		'default'           => true,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_enable_scroll_to_top',
		array(
			'label'    => esc_html__( 'Enable scroll to top.', 'wonderful-blog' ),
			'settings' => 'wonderful_blog_enable_scroll_to_top',
			'section'  => 'wonderful_blog_back_to_top_section',
			'type'     => 'checkbox',
		)
	)
);
