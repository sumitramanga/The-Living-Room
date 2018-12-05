<?php
function add_services() {
	// Adding labels to the custom type of services
	$labels = array(
		'name' => _x('Services', 'post type name', 'thelivingroom'),
		'singular_name' => _x('Service', 'post types singluar name', 'thelivingroom'),
		'add_new_item' => _x('Add new service', 'adding new service', 'thelivingroom'),
		'edit_item' => _x('Edit your service', 'editing service', 'thelivingroom')
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
		'menu_position' => 30,
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
		'add_new_item' => _x('Add a new staff', 'adding new staff', 'thelivingroom'),
		'edit_item' => _x('Edit staff member\'s details', 'editing staff member', 'thelivingroom')
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
		'menu_position' => 31,
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
		'add_new_item' => _x('Add a new enquiry', 'adding new enquiry', 'thelivingroom'),
		'edit_item' => _x('Edit an enquiry', 'editing enquiry', 'thelivingroom')
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
		'menu_position' => 33,
		'menu_icon' => 'dashicons-phone',
		'supports' => array(
			'title'
		),
		'query_var' => true
	);
	register_post_type('enquiries', $args);
}

add_action('init', 'add_enquiries');

function add_work(){
	// Adding labels to the custom type of services
	$labels = array(
		'name' => _x('Previous Work', 'post type name', 'thelivingroom'),
		'singular_name' => _x('Previous Work', 'post types singluar name', 'thelivingroom'),
		'add_new_item' => _x('Add a new piece of work', 'work', 'thelivingroom'),
		'edit_item' => _x('Edit work', 'work', 'thelivingroom')
	);

	$args = array(
		'labels' => $labels,
		'description' => 'A custom post type for the company\'s work done in the past to present',
		'public' => true,
		'hirarchical' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'menu_position' => 32,
		'menu_icon' => 'dashicons-layout',
		'supports' => array(
			'title', 'editor', 'thumbnail'
		),
		'query_var' => true
	);
	register_post_type('previous work', $args);
}

add_action('init', 'add_work');
