<?php
/**
 * Add the text-controls to the customizer.
 *
 * @package RokoPhoto
 */

/**
 * Hook the text controls to the customizer.
 *
 * @param object $wp_customize The wp_customize object.
 */
function rokophotolite_text_controls_customize_register( $wp_customize ) {

	require_once( get_template_directory() . '/inc/class/text-control/class-rokophoto-text-control.php' );

	$wp_customize->add_setting(
		'rokophotolite_slider_upsale',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new RokoPhoto_Text_Control(
			$wp_customize,
			'rokophotolite_slider_upsale',
			array(
				'section'           => 'header_image',
				'priority'          => 10,
				'rokophoto_message' => __( 'Check out the <a href="https://themeisle.com/themes/rokophoto/">PRO version</a> add a Slider on frontpage!', 'rokophoto-lite' ),
			)
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_portfolio_upsale',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new RokoPhoto_Text_Control(
			$wp_customize,
			'rokophotolite_portfolio_upsale',
			array(
				'section'           => 'rokophotolite_logo_section',
				'priority'          => 12,
				'rokophoto_message' => __( 'Check out the <a href="https://themeisle.com/themes/rokophoto/">PRO version</a> add a Portfolio section on frontpage!', 'rokophoto-lite' ),
			)
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_sanitize_pro_version',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new RokoPhoto_Text_Control(
			$wp_customize,
			'rokophotolite_sanitize_pro_version',
			array(
				'section'           => 'rokophotolite_subhead_section',
				'priority'          => 15,
				'rokophoto_message' => __( 'Check out the <a href="https://themeisle.com/themes/rokophoto/">PRO version</a> add a Contact section on frontpage!', 'rokophoto-lite' ),
			)
		)
	);

}

add_action( 'customize_register', 'rokophotolite_text_controls_customize_register' );
