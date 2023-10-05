<?php

// upgrade to pro.
require get_theme_file_path() . '/inc/upgrade-to-pro/class-customize.php';

function outstanding_blog_customize_register( $wp_customize ) {

	class Outstanding_Blog_Toggle_Checkbox_Custom_control extends WP_Customize_Control {
		public $type = 'toogle_checkbox';

		public function render_content() {
			?>
		<div class="checkbox_switch">
			<div class="onoffswitch">
				<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="onoffswitch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" 
													<?php
													$this->link();
													checked( $this->value() );
													?>
				>
				<label class="onoffswitch-label" for="<?php echo esc_attr( $this->id ); ?>"></label>
			</div>
			<span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?></span>
			<p><?php echo wp_kses_post( $this->description ); ?></p>
		</div>
			<?php
		}
	}

	// Recent Posts section.
	require get_theme_file_path() . '/inc/customizer/recent-posts.php';

}
add_action( 'customize_register', 'outstanding_blog_customize_register' );

function outstanding_blog_customize_preview_js() {
	wp_enqueue_script( 'outstanding-blog-customizer', get_stylesheet_directory_uri() . '/assets/js/customizer.min.js', array( 'customize-preview', 'wonderful-blog-customizer' ), true );
}
add_action( 'customize_preview_init', 'outstanding_blog_customize_preview_js' );

function outstanding_blog_custom_control_scripts() {
	wp_enqueue_style( 'outstanding-blog-customize-controls', get_theme_file_uri() . '/assets/css/customize-controls.min.css' );
	wp_enqueue_script( 'outstanding-blog-custom-controls-js', get_stylesheet_directory_uri() . '/assets/js/customize-control.min.js', array( 'wonderful-blog-customize-control', 'jquery', 'jquery-ui-core' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'outstanding_blog_custom_control_scripts' );
