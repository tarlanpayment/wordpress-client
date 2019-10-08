<?php
/**
 * Customizer info singleton class file.
 *
 * @package RokoPhoto
 */

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Customizer_Info_Singleton {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
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
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ), 1 );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager WordPress customizer object.
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'inc/class/upsell/class-customizer-info.php' );

		// Register custom section types.
		$manager->register_section_type( 'Customizer_Info' );

		$manager->add_section(
			new Customizer_Info(
				$manager,
				'rokophoto_view_pro',
				array(
					'section_title' => __( 'View PRO version', 'rokophoto-lite' ),
					'section_url'   => 'https://themeisle.com/themes/rokophoto/',
					'section_text'  => __( 'Get it', 'rokophoto-lite' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'customizer-info-js', trailingslashit( get_template_directory_uri() ) . 'inc/class/upsell/js/customizer-info-controls.js', array( 'customize-controls' ) );
	}
}

Customizer_Info_Singleton::get_instance();
