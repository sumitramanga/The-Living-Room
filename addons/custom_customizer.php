<?php

function customisation_for_theme( $wp_customize ) {

	// Carousel settings -------------------------------------------------------
	$wp_customize-> add_section('custom_theme_carousel_img', array(
		'title' => __('Front Page Carousel', 'thelivingroom'),
		'description' => 'Insert images for the front page carousel',
		'priority' => 30
	));

	for ($i=1; $i <=3 ; $i++) {
		$wp_customize-> add_setting('carousel_img_'.$i.'_setting', array(
			'default' => '',
			'transport' => 'refresh'
		));

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'carousel_img_'.$i.'_control',
				array(
					'label' => __('Image '.$i, 'thelivingroom'),
					'section' => 'custom_theme_carousel_img',
					'settings' => 'carousel_img_'.$i.'_setting',
				)
			)
		);
	}

	// Social Media Footer Links -----------------------------------------------

	$wp_customize-> add_section('social_media_links', array(
		'title' => __('Social Media Links', 'thelivingroom'),
		'description' => 'Here you can add your social media links'
	));

	// Adding Pinterest
	$wp_customize-> add_setting('pinterest_link_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'pinterest_link_control',
			array(
				'label' => __('Pinterst', 'thelivingroom'),
				'section' => 'social_media_links',
				'settings' => 'pinterest_link_setting',
				'type' => 'input'
			)
		)
	);

	// Adding Facebook
	$wp_customize-> add_setting('facebook_link_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'facebook_link_control',
			array(
				'label' => __('Facebook', 'thelivingroom'),
				'section' => 'social_media_links',
				'settings' => 'facebook_link_setting',
				'type' => 'input'
			)
		)
	);

	// Adding houzz
	$wp_customize-> add_setting('houzz_link_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'houzz_link_control',
			array(
				'label' => __('Houzz', 'thelivingroom'),
				'section' => 'social_media_links',
				'settings' => 'houzz_link_setting',
				'type' => 'input'
			)
		)
	);

}
add_action('customize_register', 'customisation_for_theme');
