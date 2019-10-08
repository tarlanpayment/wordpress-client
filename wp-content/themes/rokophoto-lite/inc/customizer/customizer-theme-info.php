<?php
/**
 * Theme info customizer controls.
 *
 * @package RokoPhoto
 */

/**
 * Hook Theme Info section to customizer.
 *
 * @param object $wp_customize The wp_customize object.
 */
function rokophotolite_theme_info_customize_register( $wp_customize ) {

	require_once( get_template_directory() . '/inc/class/theme-info/class-rokophoto-info.php' );

	$wp_customize->add_section(
		'rokophotolite_theme_info',
		array(
			'title'    => __( 'Theme info', 'rokophoto-lite' ),
			'priority' => 0,
		)
	);
	$wp_customize->add_setting(
		'rokophotolite_theme_info',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new RokoPhoto_Info(
			$wp_customize,
			'rokophotolite_theme_info',
			array(
				'section'  => 'rokophotolite_theme_info',
				'priority' => 10,
				'links'    => array(
					array(
						'name' => __( ' View PRO version', 'rokophoto-lite' ),
						'link' => esc_url( 'https://themeisle.com/themes/rokophoto/' ),
					),
					array(
						'name' => __( 'Documentation', 'rokophoto-lite' ),
						'link' => esc_url( 'http://docs.themeisle.com/article/178-rokophoto-lite-documentation' ),
					),
					array(
						'name' => __( 'Leave us a review (it will help us)', 'rokophoto-lite' ),
						'link' => esc_url( 'https://wordpress.org/support/theme/rokophoto-lite/reviews/' ),
					),
				),
			)
		)
	);
}

add_action( 'customize_register', 'rokophotolite_theme_info_customize_register' );
