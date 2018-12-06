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
				'type' => 'radio',
				'description' => 'This is the type of icon you would like to feature on a service',
				'options' => array('Handshake', 'Pen', 'Couch', 'Clipboard')
			),
			'description' => array(
				'title' => 'Descrption',
				'type' => 'textarea',
				'description' => 'Write your description about the service'
			),
			'testimonial' => array(
				'title' => 'Testimonial',
				'type' => 'textarea',
				'description' => 'Write your testimonial from customers'
			)
		)
	),
	'enquiries' => array(
		'title' => 'Enquiry Details',
		'applicableto' => 'enquiries',
		'location' => 'normal',
		'priority' => 'high',
		'fields' => array(
			'user_name' => array(
				'title' => 'Full Name',
				'type' => 'text',
				'description' => 'Customers name'
			),
			'email' => array(
				'title' => 'Email',
				'type' => 'email',
				'description' => 'Users email'
			),
			'contact_reason' => array(
				'title' => 'Contacting reason',
				'type' => 'select',
				'description' => 'Reasoning for contacting us',
				'options' => array('I have a question', 'Booking an appointment', 'Wanting more information on your services')
			),
			'enquiry_subject' => array(
				'title' => 'Subject',
				'type' => 'text',
				'description' => 'Subject of enquiry message'
			),
			'user_message' => array(
				'title' => 'Message',
				'type' => 'textarea',
				'description' => 'The users message'
			)
		)
	),
	'previous_work' => array(
		'title' => 'Testimonial',
		'applicableto' => 'previouswork',
		'location' => 'normal',
		'priority' => 'low',
		'fields' => array(
			'icon' => array(
				'title' => 'Icon',
				'type' => 'radio',
				'options' => array('Wallpaper', 'Doors', 'Sofa')
			),
			'service_testimonial' => array(
				'title' => 'Quote',
				'type' => 'textarea',
				'description' => 'A customers review on this specific service'
			),
			'customer_name' => array(
				'title' => 'Customer Name',
				'type' => 'text',
				'description' => 'Name of customer who has given the review'
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
	$custom_values = get_post_custom($post->ID);
	$output = '<input type="hidden" name="post_format_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'">';

	if ( ! empty($fields) ) {
		foreach ($fields as $id => $field) {
			switch ($field['type']) {
				// for descrptions for service
				case 'text':
					$output .= '<label for="'.$id.'">'.$field['title'].'</label>';
					$output .= '<input type="text" name="'.$id.'" class="servicesInput" style="width:100%;" value="'.$custom_values[$id][0].'">';
				break;
				//for icons
				case 'radio':
					$output .= '<label for="'.$id.'">'.$field['title'].'</label><br>';
					$options = $field['options'];
					foreach ($options as $option) {
						$checked_value = '';
						if ($custom_values['icon']['0'] == $option) {
							$checked_value = 'checked="checked"';
						}
						$output .= '<input type="radio" name="'.$id.'" value="'.$option.'"'.$checked_value.'>'.$option.'<br>';
					}
				break;
				// for contact/enquries
				case 'select':
					$output .= '<label for="'.$id.'">'.$field['title'].'</label><br>';
					$output .= '<select name="'.$id.'"><option value="">Choose an option</option>';
					$options = $field['options'];
					foreach ($options as $option) {
						$selected_value = '';
						if ($custom_values['contact_reason']['0'] == $option) {
							$selected_value = 'selected="selected"';
						}
						$output .= '<option value="'.$option.'"'.$selected_value.'>'.$option.'</option>';
					}
					$output .= '</select><br>';
				break;

				// for enquiries
				case 'email':
					$output .= '<label for="'.$id.'">'.$field['title'].'</label><br>';
					$output .= '<input type="email" name="'.$id.'" class="servicesInput" style="width:100%;" value="'.$custom_values[$id][0].'"><br>';
				break;

				// for testimonials & service description
				case 'textarea':
					$output .= '<label for="'.$id.'">'.$field['title'].'</label><br>';
					$output .= '<textarea rows="4" cols="50" name="'.$id.'" class="servicesTextArea" style="width:100%;">';
					$field_text = '';
					if ( strlen($custom_values[$id][0]) > 1) {
						$field_text = $custom_values[$id][0];
					}
					$output .= $field_text.'</textarea>';
				break;

				default:
					$output .= '<label for="'.$id.'">'.$field['title'].'</label><br>';
					$output .= '<input type="text" name="'.$id.'" class="servicesInput" style="width:100%;"><br>';
				break;
			}
		}
	}
	echo $output;
}

// Saving to the database
function save_metaboxes($post_id){
	global $metaboxes;

	if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename(__FILE__)) ) {
		return $post_id;
	}

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ($_POST['post_type'] == 'page') {
		if ( ! current_user_can('edit_page', $post_id ) ) {
			return $post_id;
		}
	} elseif ( ! current_user_can('edit_page', $post_id ) ) {
		return $post_id;
	}

	$post_type = get_post_type();

	foreach ( $metaboxes as $id => $metabox ) {
		if ( $metabox['applicableto'] == $post_type ) {
			$fields = $metaboxes[$id]['fields'];

			foreach ($fields as $id => $field) {
				$old_value = get_post_meta($post_id, $id, true);
				$new_value = $_POST[$id];

				if ($new_value && $new_value != $old_value) {
					update_post_meta($post_id, $id, $new_value);
				} elseif ($new_value == '' && $old_value || !isset($_POST[$id])) {
					delete_post_meta($post_id, $id, $old_value);
				}
			}

		}
	}
}

add_action('save_post', 'save_metaboxes');
