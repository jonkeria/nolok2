<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'wonderful_blog_pagination',
	array(
		'title' => esc_html__( 'Pagination', 'wonderful-blog' ),
		'panel' => 'wonderful_blog_theme_options_panel',
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'wonderful_blog_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'wonderful-blog' ),
			'settings' => 'wonderful_blog_pagination_enable',
			'section'  => 'wonderful_blog_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'wonderful_blog_pagination_type',
	array(
		'default'           => 'loadmore',
		'sanitize_callback' => 'wonderful_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'wonderful_blog_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_pagination',
		'type'            => 'select',
		'choices'         => array(
			'default'  => __( 'Default (Older/Newer)', 'wonderful-blog' ),
			'numeric'  => __( 'Numeric', 'wonderful-blog' ),
			'loadmore' => __( 'Load More Button', 'wonderful-blog' ),
		),
		'active_callback' => 'wonderful_blog_pagination_enabled',
	)
);

// Loadmore text label.
$wp_customize->add_setting(
	'wonderful_blog_loadmore_text_label',
	array(
		'default'           => __( 'Load More', 'wonderful-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wonderful_blog_loadmore_text_label',
	array(
		'label'           => esc_html__( 'Load More Button Label', 'wonderful-blog' ),
		'settings'        => 'wonderful_blog_loadmore_text_label',
		'section'         => 'wonderful_blog_pagination',
		'active_callback' => 'wonderful_blog_loadmore_text_label_enabled',
	)
);

/*========================Active Callback==============================*/
function wonderful_blog_pagination_enabled( $control ) {
	return $control->manager->get_setting( 'wonderful_blog_pagination_enable' )->value();
}
function wonderful_blog_loadmore_text_label_enabled( $control ) {
	$pagination = $control->manager->get_setting( 'wonderful_blog_pagination_type' )->value();
	return wonderful_blog_pagination_enabled( $control ) && ( 'loadmore' === $pagination );
}
