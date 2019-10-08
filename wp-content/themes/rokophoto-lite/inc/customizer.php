<?php
/**
 * RokoPhoto Theme Customizer.
 *
 * @package RokoPhoto
 */

/**
 * Define all the controls for the Theme Customizer.
 */
function rokophoto_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}

add_action( 'customize_register', 'rokophoto_customize_register' );

/**
 * Register customizer scripts.
 */
function rokophoto_registers() {

	wp_enqueue_script( 'rokophoto_jquery_ui', '//code.jquery.com/ui/1.11.3/jquery-ui.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_style( 'rokophoto_jquery_ui_css', '//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css' );
	wp_enqueue_script( 'rokophoto_customizer_script', get_template_directory_uri() . '/js/rokophoto_customizer.js', array( 'jquery', 'rokophoto_jquery_ui' ), '20120207', true );
	wp_enqueue_script( 'rokophoto_range', get_template_directory_uri() . '/js/rokophoto_range.js', array( 'jquery' ), '20120206', true );
}
add_action( 'customize_controls_enqueue_scripts', 'rokophoto_registers' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rokophoto_customize_preview_js() {
	wp_enqueue_script( 'rokophoto_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.3', true );
	wp_localize_script(
		'rokophoto_customizer',
		'requestpost',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'customize_preview_init', 'rokophoto_customize_preview_js' );

/**
 * Samitization function for text input.
 *
 * @param string $input Control input.
 *
 * @return string
 */
function rokophoto_one_sanitize_input( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}


