<?php

function customisation_for_theme( $wp_customize ) {

	// Homepage content panel --------------------------------------------------

	$wp_customize->add_panel('homepage_panel', array(
		'title' => __('Home Page Content', 'thelivingroom'),
		'priority' => 21,
		'description' => 'Here you can edit the content on the homepage'
	));

	// Landing Screen Text -----------------------------------------------------
	$wp_customize-> add_section('landing_screen_text_section', array(
		'title' => __('Landing Screen Text', 'thelivingroom'),
		'description' => 'Add a small quote to the landing screen text',
		'priority' => 40,
		'panel' => 'homepage_panel'

	));

	$wp_customize-> add_setting('landing_screen_text_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'landing_screen_text_control',
			array(
				'label' => __('Quote', 'thelivingroom'),
				'section' => 'landing_screen_text_section',
				'settings' => 'landing_screen_text_setting',
				'type' => 'text'
			)
		)
	);


	// Carousel settings -------------------------------------------------------
	$wp_customize-> add_section('custom_theme_carousel_img', array(
		'title' => __('Front Page Carousel', 'thelivingroom'),
		'description' => 'Insert images for the front page carousel',
		'priority' => 30,
		'panel' => 'homepage_panel'

	));

	// For loop to create 3 separate img selections
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

	// Secondary content -------------------------------------------------------
	$wp_customize-> add_section('secondary_content_section', array(
		'title' => __('Secondary Content', 'thelivingroom'),
		'description' => 'Insert an images and a short description about your company',
		'priority' => 40,
		'panel' => 'homepage_panel'

	));

	// Adding image
	$wp_customize-> add_setting('secondary_img_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'secondary_img_control',
			array(
				'label' => __('Image', 'thelivingroom'),
				'section' => 'secondary_content_section',
				'settings' => 'secondary_img_setting',
			)
		)
	);

	// Adding descrption
	$wp_customize-> add_setting('secondary_text_setting', array(
		'default' => '',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'secondary_text_control',
			array(
				'label' => __('Description', 'thelivingroom'),
				'section' => 'secondary_content_section',
				'settings' => 'secondary_text_setting',
				'type' => 'textarea'
			)
		)
	);


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
