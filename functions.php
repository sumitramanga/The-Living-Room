<?php

function add_js_and_css() {
	// CSS's
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
	wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper.min.css', array(), '0.0.1', 'all');
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/theme-style.css', array(), '0.0.1', 'all');

	// Scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.1.3', true);
	wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), '0.0.1', true);
	wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/theme-script.js', array(), '0.0.1', true);
}

add_action('wp_enqueue_scripts', 'add_js_and_css');

function add_top_menu() {
	add_theme_support('menus');
	register_nav_menu('top_nav', 'This navigation menu will appear at the top of the pages');
}

add_action('init', 'add_top_menu');

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Add logo support
function add_custom_logo(){
	add_theme_support('custom-logo', array(
		'flex-height' => false,
		'flex-width' => false,
		'height' => 300,
		'width' => 300
	));
}

add_action('init', 'add_custom_logo');

require get_parent_theme_file_path('./addons/custom_customizer.php');
