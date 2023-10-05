<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  Wonderful Blog 1.0.0
 * @access public
 */
final class Wonderful_Blog_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since Wonderful Blog 1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since Wonderful Blog 1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since Wonderful Blog 1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since Wonderful Blog 1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require trailingslashit( get_template_directory() ) . 'inc/customizer/upgrade-to-pro/section-pro.php' ;

		// Register custom section types.
		$manager->register_section_type( 'Wonderful_Blog_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Wonderful_Blog_Customize_Section_Pro(
				$manager,
				'wonderful-blog',
				array(
					'title'    => esc_html__( 'Wonderful Blog Pro','wonderful-blog' ),
					'pro_text' => esc_html__( 'Go Pro','wonderful-blog' ),
					'pro_url'  => esc_url( 'https://adorethemes.com/downloads/wonderful-blog-pro/' )
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since Wonderful Blog 1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'wonderful-blog-go-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/upgrade-to-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'wonderful-blog-go-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/upgrade-to-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
Wonderful_Blog_Customize::get_instance();