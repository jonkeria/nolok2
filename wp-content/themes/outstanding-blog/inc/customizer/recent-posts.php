<?php
/**
 * Adore Themes Customizer
 *
 * @package Outstanding Blog Pro
 *
 * Recent Posts Section
 */

$wp_customize->add_section(
	'outstanding_blog_recent_posts_section',
	array(
		'title' => esc_html__( 'Editor Pick Section', 'outstanding-blog' ),
		'panel' => 'wonderful_blog_frontpage_panel',
	)
);

// Recent Posts section enable settings.
$wp_customize->add_setting(
	'outstanding_blog_recent_posts_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Outstanding_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'outstanding_blog_recent_posts_section_enable',
		array(
			'label'    => esc_html__( 'Enable Editor Pick Section', 'outstanding-blog' ),
			'type'     => 'checkbox',
			'settings' => 'outstanding_blog_recent_posts_section_enable',
			'section'  => 'outstanding_blog_recent_posts_section',
		)
	)
);

// recent_posts content type settings.
$wp_customize->add_setting(
	'outstanding_blog_recent_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'wonderful_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'outstanding_blog_recent_posts_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'outstanding-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'outstanding-blog' ),
		'section'         => 'outstanding_blog_recent_posts_section',
		'type'            => 'select',
		'active_callback' => 'outstanding_blog_if_recent_posts_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'outstanding-blog' ),
			'category' => esc_html__( 'Category', 'outstanding-blog' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// recent_posts post setting.
	$wp_customize->add_setting(
		'outstanding_blog_recent_posts_post_' . $i,
		array(
			'sanitize_callback' => 'wonderful_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'outstanding_blog_recent_posts_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'outstanding-blog' ), $i ),
			'section'         => 'outstanding_blog_recent_posts_section',
			'type'            => 'select',
			'choices'         => wonderful_blog_get_post_choices(),
			'active_callback' => 'outstanding_blog_recent_posts_section_content_type_post_enabled',
		)
	);

}

// recent_posts category setting.
$wp_customize->add_setting(
	'outstanding_blog_recent_posts_category',
	array(
		'sanitize_callback' => 'wonderful_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'outstanding_blog_recent_posts_category',
	array(
		'label'           => esc_html__( 'Category', 'outstanding-blog' ),
		'section'         => 'outstanding_blog_recent_posts_section',
		'type'            => 'select',
		'choices'         => wonderful_blog_get_post_cat_choices(),
		'active_callback' => 'outstanding_blog_recent_posts_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function outstanding_blog_if_recent_posts_enabled( $control ) {
	return $control->manager->get_setting( 'outstanding_blog_recent_posts_section_enable' )->value();
}
function outstanding_blog_recent_posts_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'outstanding_blog_recent_posts_content_type' )->value();
	return outstanding_blog_if_recent_posts_enabled( $control ) && ( 'post' === $content_type );
}
function outstanding_blog_recent_posts_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'outstanding_blog_recent_posts_content_type' )->value();
	return outstanding_blog_if_recent_posts_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'outstanding_blog_recent_posts_title_text_partial' ) ) :
	// Title.
	function outstanding_blog_recent_posts_title_text_partial() {
		return esc_html( get_theme_mod( 'outstanding_blog_recent_posts_title' ) );
	}
endif;
if ( ! function_exists( 'outstanding_blog_recent_posts_view_all_button_label_text_partial' ) ) :
	// View All Button.
	function outstanding_blog_recent_posts_view_all_button_label_text_partial() {
		return esc_html( get_theme_mod( 'outstanding_blog_recent_posts_view_all_button_label' ) );
	}
endif;
