<?php
/**
 * Adore Themes Customizer
 *
 * @package Wonderful Blog
 *
 * Instagram Section
 */

$wp_customize->add_section(
	'wonderful_blog_instagram_section',
	array(
		'title' => esc_html__( 'Instagram Section', 'wonderful-blog' ),
		'panel' => 'wonderful_blog_frontpage_panel',
	)
);

// Instagram Section section enable settings.
$wp_customize->add_setting(
	'wonderful_blog_instagram_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'wonderful_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Wonderful_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'wonderful_blog_instagram_section_enable',
		array(
			'label'    => esc_html__( 'Enable Instagram Section', 'wonderful-blog' ),
			'type'     => 'checkbox',
			'settings' => 'wonderful_blog_instagram_section_enable',
			'section'  => 'wonderful_blog_instagram_section',
		)
	)
);

// Instagram text label settings.
$wp_customize->add_setting(
	'wonderful_blog_instagram_text_label',
	array(
		'default'           => __( 'Follow Us on', 'wonderful-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wonderful_blog_instagram_text_label',
	array(
		'label'           => esc_html__( 'Instagram Text Label', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_instagram_section',
		'active_callback' => 'wonderful_blog_if_instagram_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'wonderful_blog_instagram_text_label',
		array(
			'selector'            => '.instagram-section .instagram-head h3',
			'settings'            => 'wonderful_blog_instagram_text_label',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'wonderful_blog_instagram_text_label_text_partial',
		)
	);
}

// Instagram Username settings.
$wp_customize->add_setting(
	'wonderful_blog_instagram_username',
	array(
		'default'           => __( 'Instagram', 'wonderful-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'wonderful_blog_instagram_username',
	array(
		'label'           => esc_html__( 'Instagram Username', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_instagram_section',
		'active_callback' => 'wonderful_blog_if_instagram_enabled',
	)
);

// Instagram Section - User Url.
$wp_customize->add_setting(
	'wonderful_blog_instagram_user_link',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'wonderful_blog_instagram_user_link',
	array(
		'label'           => esc_html__( 'Instagram User Link', 'wonderful-blog' ),
		'section'         => 'wonderful_blog_instagram_section',
		'settings'        => 'wonderful_blog_instagram_user_link',
		'type'            => 'url',
		'active_callback' => 'wonderful_blog_if_instagram_enabled',
	)
);

for ( $i = 1; $i <= 5; $i++ ) {

	// Instagram image.
	$wp_customize->add_setting(
		'wonderful_blog_instagram_image_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'wonderful_blog_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wonderful_blog_instagram_image_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Image %d', 'wonderful-blog' ), $i ),
				'section'         => 'wonderful_blog_instagram_section',
				'settings'        => 'wonderful_blog_instagram_image_' . $i,
				'active_callback' => 'wonderful_blog_if_instagram_enabled',
			)
		)
	);

}

/*========================Active Callback==============================*/
function wonderful_blog_if_instagram_enabled( $control ) {
	return $control->manager->get_setting( 'wonderful_blog_instagram_section_enable' )->value();
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'wonderful_blog_instagram_text_label_text_partial' ) ) :
	// Title.
	function wonderful_blog_instagram_text_label_text_partial() {
		return esc_html( get_theme_mod( 'wonderful_blog_instagram_text_label' ) );
	}
endif;
