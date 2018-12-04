<?php
function add_services() {
	// Adding labels to the custom type of services
	$labels = array(
		'name' => _x('Services', 'post type name', 'thelivingroom'),
		'singular_name' => _x('Service', 'post types singluar name', 'thelivingroom'),
		'new_item' => _x('Add new service', 'adding new service', 'thelivingroom')
	);

	$args = array(
		'labels' => $labels,
		'description' => 'A custom post type for the services the company offers',
		'public' => true,
		'hirarchical' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'menu_position' => 32,
		'menu_icon' => 'dashicons-smiley',
		'supports' => array(
			'title', 'thumbnail'
		),
		'query_var' => true
	);
	register_post_type('services', $args);
}

add_action('init', 'add_services');

function add_staff(){
	// Adding labels to the custom type of services
	$labels = array(
		'name' => _x('Staff', 'post type name', 'thelivingroom'),
		'singular_name' => _x('Staff', 'post types singluar name', 'thelivingroom'),
		'new_item' => _x('Add a new staff', 'adding new staff', 'thelivingroom')
	);

	$args = array(
		'labels' => $labels,
		'description' => 'A custom post type for the staff members of the company',
		'public' => true,
		'hirarchical' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'menu_position' => 35,
		'menu_icon' => 'dashicons-id-alt',
		'supports' => array(
			'title', 'editor', 'thumbnail'
		),
		'query_var' => true
	);
	register_post_type('staff', $args);
}

add_action('init', 'add_staff');

function add_enquiries(){
	// Adding labels to the custom type of services
	$labels = array(
		'name' => _x('Enquiries', 'post type name', 'thelivingroom'),
		'singular_name' => _x('Enquiry', 'post types singluar name', 'thelivingroom'),
		'new_item' => _x('Add a new enquiry', 'adding new enquiry', 'thelivingroom')
	);

	$args = array(
		'labels' => $labels,
		'description' => 'A custom post type for enquiries from website viewers',
		'public' => true,
		'hirarchical' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'menu_position' => 38,
		'menu_icon' => 'dashicons-phone',
		'supports' => array(
			'title', 'editor'
		),
		'query_var' => true
	);
	register_post_type('enquiries', $args);
}

add_action('init', 'add_enquiries');
