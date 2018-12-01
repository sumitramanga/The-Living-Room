<?php

function customisation_for_theme( $wp_customize ) {

	// Carousel settings -------------------------------------------------------
	$wp_customize-> add_section('custom_theme_carousel_img', array(
		'title' => __('Front Page Carousel', 'thelivingroom'),
		'description' => 'Insert images for the front page carousel',
		'priority' => 30
	));

	$wp_customize-> add_setting('carousel_img_1_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'carousel_img_1_control',
			array(
				'label' => __('Image 1', 'thelivingroom'),
				'section' => 'custom_theme_carousel_img',
				'settings' => 'carousel_img_1_setting',
			)
		)
	);

	$wp_customize-> add_setting('carousel_img_2_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'carousel_img_2_control',
			array(
				'label' => __('Image 2', 'thelivingroom'),
				'section' => 'custom_theme_carousel_img',
				'settings' => 'carousel_img_2_setting',
			)
		)
	);

	$wp_customize-> add_setting('carousel_img_3_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'carousel_img_3_control',
			array(
				'label' => __('Image 3', 'thelivingroom'),
				'section' => 'custom_theme_carousel_img',
				'settings' => 'carousel_img_3_setting',
			)
		)
	);

	// Carousel settings end ------------------------------------------------------------

}
add_action('customize_register', 'customisation_for_theme');
