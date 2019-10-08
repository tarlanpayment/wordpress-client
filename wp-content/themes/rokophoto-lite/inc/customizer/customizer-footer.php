<?php
/**
 * Frontpage ribbon section customizer controls.
 *
 * @package RokoPhoto
 */

/**
 * Hook the frontpage ribbon section controls to the customizer.
 *
 * @param object $wp_customize The wp_customize object.
 */
function rokophotolite_footer_customize_register( $wp_customize ) {

	/* Footer */

	$wp_customize->add_section(
		'rokophotolite_footer_section',
		array(
			'priority' => 80,
			'title'    => __( 'Footer', 'rokophoto-lite' ),
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_social_label',
		array(
			'default'           => __( 'To get the latest update of me and my works', 'rokophoto-lite' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_social_label',
		array(
			'label'    => __( 'Social Box Label', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 5,
			'settings' => 'rokophotolite_social_label',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_social_text',
		array(
			'default'           => __( 'Follow Me', 'rokophoto-lite' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_social_text',
		array(
			'label'    => __( 'Social Box Text', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 10,
			'settings' => 'rokophotolite_social_text',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_facebook_link',
		array(
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_facebook_link',
		array(
			'label'    => __( 'Facebook URL', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 20,
			'settings' => 'rokophotolite_facebook_link',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_twitter_link',
		array(
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_twitter_link',
		array(
			'label'    => __( 'Twitter URL', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 25,
			'settings' => 'rokophotolite_twitter_link',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_behance_link',
		array(
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_behance_link',
		array(
			'label'    => __( 'Behance URL', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 30,
			'settings' => 'rokophotolite_behance_link',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_dribbble_link',
		array(
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',

		)
	);

	$wp_customize->add_control(
		'rokophotolite_dribbble_link',
		array(
			'label'    => __( 'Dribbble URL', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 35,
			'settings' => 'rokophotolite_dribbble_link',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_flickr_link',
		array(
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_flickr_link',
		array(
			'label'    => __( 'Flickr URL', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 40,
			'settings' => 'rokophotolite_flickr_link',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_googleplus_link',
		array(
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_googleplus_link',
		array(
			'label'    => __( 'Google + URL', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 45,
			'settings' => 'rokophotolite_googleplus_link',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_instagram_link',
		array(
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_instagram_link',
		array(
			'label'    => __( 'Instagram URL', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 50,
			'settings' => 'rokophotolite_instagram_link',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_linkedin_link',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_linkedin_link',
		array(
			'label'    => __( 'LinkedIn URL', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 55,
			'settings' => 'rokophotolite_linkedin_link',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_mail_link',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_mail_link',
		array(
			'label'    => __( 'Email Address', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 60,
			'settings' => 'rokophotolite_mail_link',
		)
	);

	$wp_customize->add_setting(
		'rokophotolite_footer_copyrights',
		array(
			'default'           => __( 'Awesome Photography. All Rights Reserved', 'rokophoto-lite' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'rokophotolite_footer_copyrights',
		array(
			'label'    => __( 'Footer Copyrights', 'rokophoto-lite' ),
			'section'  => 'rokophotolite_footer_section',
			'priority' => 65,
			'settings' => 'rokophotolite_footer_copyrights',
		)
	);
}

add_action( 'customize_register', 'rokophotolite_footer_customize_register' );
