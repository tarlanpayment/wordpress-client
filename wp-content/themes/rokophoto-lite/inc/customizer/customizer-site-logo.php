<?php
/**
 * Add the site logo section to customizer.

 * @package RokoPhoto
 */

/**
 * Hook the logo controls to the customizer.
 *
 * @param object $wp_customize The wp_customize object.
 */
function rokophotolite_site_logo_customize_register( $wp_customize ) {

	$wp_customize->add_section(
		'rokophotolite_logo_section',
		array(
			'priority' => 25,
			'title'    => __( 'Site Logo', 'rokophoto-lite' ),
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_logo_image',
		array(
			'default'           => get_template_directory_uri() . '/img/logo.png',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'rokophotolite_logo_image',
			array(
				'label'    => __( 'Site Logo Image', 'rokophoto-lite' ),
				'section'  => 'rokophotolite_logo_section',
				'priority' => 5,
				'settings' => 'rokophotolite_logo_image',
			)
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_disable_preloader',
		array(
			'sanitize_callback' => 'rokophotolite_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_disable_preloader',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Disable pre-loader?', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_logo_section',
			'priority' => 15,
		)
	);
}

add_action( 'customize_register', 'rokophotolite_site_logo_customize_register' );

/**
 * Function to sanitize checkboxes
 *
 * @param bool $input Input to be sanitized.
 *
 * @return bool
 */
function rokophotolite_sanitize_checkbox( $input ) {
	return ( isset( $input ) && true == $input ? true : false );
}
