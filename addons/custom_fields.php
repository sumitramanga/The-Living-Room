<?php
$metaboxes = array(
	'services' => array(
		'title' => 'Services Details',
		'applicableto' => 'services',
		'location' => 'normal',
		'priority' => 'high',
		'fields' => array(
			'icon' => array(
				'title' => 'Icon Type',
				'type' => 'radio'
			)
		)
	)
);

function add_services_custom_fields() {
	global $metaboxes;

	if ( ! empty($metaboxes) ) {
		foreach ($metaboxes as $id => $metabox) {
			add_meta_box($id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id);
		}
	}
}

add_action('admin_init', 'add_services_custom_fields');

function show_metaboxes($post, $args) {
	global $metaboxes;

	$fields = $metaboxes[$args['id']]['fields'];

	if ( ! empty($fields) ) {
		foreach ($fields as $id => $field) {
			switch ($field['type']) {
				// for descrptions for service
				case 'text':
					$output .= '<label for="'.$id.'">'.$field['title'].'</label>';
					$output .= '<input type="text" name="'.$id.'" class="servicesInput" style="width:100%;">';
				break;
				//for icons
				case 'radio':
					$output .= '<label for="'.$id.'">'.$field['title'].'</label>';
					$output .= '<input type="radio" name="'.$id.'"> Icon 1 handshake';
				break;

				// For testimonials
				case 'testimonial':
					$output .= '<label for="'.$id.'">'.$field['title'].'</label>';
					$output .= '<textarea name="'.$id.'" rows="4" cols="40">';
				break;

				default:
				$output .= '<label for="'.$id.'">'.$field['title'].'</label>';
				$output .= '<input type="text" name="'.$id.'" class="servicesInput" style="width:100%;">';
				break;
			}
		}
	}
	echo $output;
}
