<?php
/**
 * Footer copyright
 */

// Footer copyright
$wp_customize->add_section(
	'wonderful_blog_footer_section',
	array(
		'title' => esc_html__( 'Footer Options', 'wonderful-blog' ),
		'panel' => 'wonderful_blog_theme_options_panel',
	)
);

$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'wonderful-blog' ), '[the-year]', '[site-link]' );

// Footer copyright setting.
$wp_customize->add_setting(
	'wonderful_blog_copyright_txt',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wonderful_blog_sanitize_html',
	)
);

$wp_customize->add_control(
	'wonderful_blog_copyright_txt',
	array(
		'label'           => esc_html__( 'Copyright text', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_footer_section',
		'type'            => 'textarea',
	)
);
