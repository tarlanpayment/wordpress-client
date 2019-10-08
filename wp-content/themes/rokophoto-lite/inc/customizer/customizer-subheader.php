<?php
/**
 * Subheader section customizer controls.
 *
 * @package RokoPhoto
 */

/**
 * Hook the subheader section controls to the customizer.
 *
 * @param object $wp_customize The wp_customize object.
 */
function rokophotolite_subheader_customize_register( $wp_customize ) {

	/**
	 * Sub header
	 */

	$wp_customize->add_section(
		'rokophotolite_subhead_section',
		array(
			'priority' => 60,
			'title'    => __( 'Sub-Header', 'rokophoto-lite' ),
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_subhead_title',
		array(
			'default'           => __( 'Welcome to', 'rokophoto-lite' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_subhead_title',
		array(
			'label'    => __( 'Sub-Header Title', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_subhead_section',
			'priority' => 5,
			'settings' => 'rokophotolite_subhead_title',
		)
	);

}

add_action( 'customize_register', 'rokophotolite_subheader_customize_register' );
