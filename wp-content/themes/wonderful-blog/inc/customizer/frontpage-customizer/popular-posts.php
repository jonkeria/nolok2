<?php
/**
 * Adore Themes Customizer
 *
 * @package Wonderful Blog
 *
 * Popular Posts Section
 */

$wp_customize->add_section(
	'wonderful_blog_popular_posts_section',
	array(
		'title' => esc_html__( 'Popular Posts Section', 'wonderful-blog' ),
		'panel' => 'wonderful_blog_frontpage_panel',
	)
);

// Popular Posts section enable settings.
$wp_customize->add_setting(
	'wonderful_blog_popular_posts_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_popular_posts_section_enable',
		array(
			'label'    => esc_html__( 'Enable Popular Posts Section', 'wonderful-blog' ),
			'type'     => 'checkbox',
			'settings' => 'wonderful_blog_popular_posts_section_enable',
			'section'  => 'wonderful_blog_popular_posts_section',
		)
	)
);

// Popular Posts title settings.
$wp_customize->add_setting(
	'wonderful_blog_popular_posts_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wonderful_blog_popular_posts_title',
	array(
		'label'           => esc_html__( 'Section Title', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_popular_posts_section',
		'active_callback' => 'wonderful_blog_if_popular_posts_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'wonderful_blog_popular_posts_title',
		array(
			'selector'            => '.popularpost h3.section-title',
			'settings'            => 'wonderful_blog_popular_posts_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'wonderful_blog_popular_posts_title_text_partial',
		)
	);
}

// Popular Posts subtitle settings.
$wp_customize->add_setting(
	'wonderful_blog_popular_posts_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wonderful_blog_popular_posts_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_popular_posts_section',
		'active_callback' => 'wonderful_blog_if_popular_posts_enabled',
	)
);

// View All button label setting.
$wp_customize->add_setting(
	'wonderful_blog_popular_posts_view_all_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wonderful_blog_popular_posts_view_all_button_label',
	array(
		'label'           => esc_html__( 'View All Button Label', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_popular_posts_section',
		'settings'        => 'wonderful_blog_popular_posts_view_all_button_label',
		'type'            => 'text',
		'active_callback' => 'wonderful_blog_if_popular_posts_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'wonderful_blog_popular_posts_view_all_button_label',
		array(
			'selector'            => '.popularpost .adore-view-all',
			'settings'            => 'wonderful_blog_popular_posts_view_all_button_label',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'wonderful_blog_popular_posts_view_all_button_label_text_partial',
		)
	);
}

// View All button URL setting.
$wp_customize->add_setting(
	'wonderful_blog_popular_posts_view_all_button_url',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'wonderful_blog_popular_posts_view_all_button_url',
	array(
		'label'           => esc_html__( 'View All Button Link', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_popular_posts_section',
		'settings'        => 'wonderful_blog_popular_posts_view_all_button_url',
		'type'            => 'url',
		'active_callback' => 'wonderful_blog_if_popular_posts_enabled',
	)
);

// popular_posts content type settings.
$wp_customize->add_setting(
	'wonderful_blog_popular_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'wonderful_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'wonderful_blog_popular_posts_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'wonderful-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_popular_posts_section',
		'type'            => 'select',
		'active_callback' => 'wonderful_blog_if_popular_posts_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'wonderful-blog' ),
			'category' => esc_html__( 'Category', 'wonderful-blog' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {
	// popular_posts post setting.
	$wp_customize->add_setting(
		'wonderful_blog_popular_posts_post_' . $i,
		array(
			'sanitize_callback' => 'wonderful_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'wonderful_blog_popular_posts_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'wonderful-blog' ), $i ),
			'section'         => 'wonderful_blog_popular_posts_section',
			'type'            => 'select',
			'choices'         => wonderful_blog_get_post_choices(),
			'active_callback' => 'wonderful_blog_popular_posts_section_content_type_post_enabled',
		)
	);

}

// popular_posts category setting.
$wp_customize->add_setting(
	'wonderful_blog_popular_posts_category',
	array(
		'sanitize_callback' => 'wonderful_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'wonderful_blog_popular_posts_category',
	array(
		'label'           => esc_html__( 'Category', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_popular_posts_section',
		'type'            => 'select',
		'choices'         => wonderful_blog_get_post_cat_choices(),
		'active_callback' => 'wonderful_blog_popular_posts_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function wonderful_blog_if_popular_posts_enabled( $control ) {
	return $control->manager->get_setting( 'wonderful_blog_popular_posts_section_enable' )->value();
}
function wonderful_blog_popular_posts_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'wonderful_blog_popular_posts_content_type' )->value();
	return wonderful_blog_if_popular_posts_enabled( $control ) && ( 'post' === $content_type );
}
function wonderful_blog_popular_posts_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'wonderful_blog_popular_posts_content_type' )->value();
	return wonderful_blog_if_popular_posts_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'wonderful_blog_popular_posts_title_text_partial' ) ) :
	// Title.
	function wonderful_blog_popular_posts_title_text_partial() {
		return esc_html( get_theme_mod( 'wonderful_blog_popular_posts_title' ) );
	}
endif;
if ( ! function_exists( 'wonderful_blog_popular_posts_view_all_button_label_text_partial' ) ) :
	// View All.
	function wonderful_blog_popular_posts_view_all_button_label_text_partial() {
		return esc_html( get_theme_mod( 'wonderful_blog_popular_posts_view_all_button_label' ) );
	}
endif;
