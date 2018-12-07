<?php get_header(); ?>

<?php
	if ($_POST) {

		$errors = array();
		$success_messsage = '';

		if (!wp_verify_nonce($_POST['_wpnonce'], 'wp_enquiry_form')) {
			echo("We cannot save the data at this time. Please try again later.");
			return;
		}

		if (strlen($_POST['user_name']) <= 2) {
			array_push($errors, 'Name is too short. Please enter your full name');
		} elseif (strlen($_POST['user_name']) >= 90) {
			array_push($errors, 'Name is too long.');
		}

		if (strlen($_POST['email']) <= 1) {
			array_push($errors, 'Email is too short. Please enter a valid email.');
		}

		if ($_POST['contact_reason'] == 'Choose an option') {
			array_push($errors, 'Please enter your reasoning for contacting us');
		}

		if (strlen($_POST['enquiry_subject']) <= 5) {
			array_push($errors, 'Please enter a more descriptive subject');
		} elseif (strlen($_POST['enquiery_subject']) >= 100) {
			array_push($errors, 'Your subject is too long. Please enter a shorter subject.');
		}

		if (strlen($_POST['user_message']) <= 5) {
			array_push($errors, 'Please enter a more descriptive message');
		} elseif (strlen($_POST['user_message']) >= 400) {
			array_push($errors, 'Please enter a shorter message');
		}

		if (empty($errors)) {
			$args = array(
				'post_type' =>	'enquiries',
				'post_title' => $_POST['enquiry_subject'],
				'meta_input' =>	array(
					'user_name' => $_POST['user_name'],
					'email' => $_POST['email'],
					'contact_reason' => $_POST['contact_reason'],
					'enquiry_subject' => $_POST['enquiry_subject'],
					'user_message' => $_POST['user_message']
				)
			);
			wp_insert_post($args);
			$success_message = 'Thank you for your message. We will get back to you shortly';
		}
	}
 ?>

	<?php if (have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<?php
				$title = get_the_title();
				$desc = get_the_content();
				$post_img = get_the_post_thumbnail_url($id);
				$work_post_id = get_the_id();
		 	 ?>
			 <?php if ($_POST && !empty($errors)): ?>
				 <?php $subject_value = isset($_POST['enquiry_subject']) ? $_POST['enquiry_subject'] : ''; ?>
			 <?php else: ?>
				 <?php $subject_value = get_the_title() .''. ' Appointment' ?>
			 <?php endif; ?>
		<?php endwhile; ?>

		<?php $args = array(
			'post_type' => 'previouswork',
			'posts_per_page' => '-1'
		) ?>

		<?php $previous_work = new WP_Query($args); ?>

		<?php if( $previous_work->have_posts() ): ?>
			<?php while($previous_work->have_posts()): $previous_work->the_post(); ?>

				<?php $id = get_the_id(); ?>
				<?php $customer_testimonial = get_post_meta($id, 'service_testimonial', true); ?>

				<?php if ($work_post_id == $id): ?>
					<?php $singleReview = $customer_testimonial; ?><br>
				<?php endif; ?>

			<?php endwhile; ?>
		<?php endif; ?>

		<div class="container">
			<?php if( wp_get_referer() ): ?>
				  <a href="'<?php echo wp_get_referer() ?>'"><i class="fas fa-chevron-left"></i></a>
			<?php endif; ?>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-7 col-lg-7">
					<div class="singleWorkImg" style="background-image: url(<?php echo $post_img; ?>);"></div>
					<h3 class="staffName"><?php echo $title; ?></h3>
					<p class="serviceReview">"<?php echo $singleReview; ?>"</p>
					<p class="staffDesc"><?php echo $desc; ?></p>
				</div>
				<div class="col-12 col-sm-12 col-md-5 col-lg-5">
					<h3>Want this service?</h3>

					<?php if ($_POST && !empty($errors)): ?>
						<div class="row errorMsgWrap">
							<div class="col">
								<h4 class="errorMessage">Your enquiry did not send through</h4>
								<ul>
									<?php foreach($errors as $single_error): ?>
										<li class="singleError"><?php echo($single_error); ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					<?php endif; ?>

					<?php if($_POST && empty($errors)): ?>
						<?php echo $success_message; ?>
					<?php endif; ?>
					<form class="contanctForm" action="<?php get_permalink(); ?>" method="post">
						<?php wp_nonce_field('wp_enquiry_form'); ?>
						<div class="form-group">
							<label for="user_name">Full Name</label>
							<!-- if form isnt sent to the database then keep the data sticky -->
							<input type="text" class="form-control" id="userName" name="user_name" value="<?php if ($_POST && !empty($errors)): ?> <?php echo isset($_POST['user_name']) ? $_POST['user_name'] : '' ?> <?php endif; ?>"/>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="userEmail" name="email" value="<?php if ($_POST && !empty($errors)): ?> <?php echo isset($_POST['email']) ? $_POST['email'] : '' ?> <?php endif; ?>"/>
						</div>

						<div class="form-group">
							<label for="contact_reason">Why are you contacting us?</label>
							<select class="form-control" name="contact_reason">
								<option>Choose an option</option>
								<option value="I have a question">I have a question</option>
								<option value="Booking an appointment" selected=selected>Booking an appointment</option>
								<option value="Wanting more information on your services">Wanting more information on your services</option>
							</select>
						</div>

						<div class="form-group">
							<label for="enquiry_subject">Subject</label>
							<input type="text" class="form-control enquirySubject" id="enquirySubject" name="enquiry_subject" value="<?php echo $subject_value; ?>"/>
						</div>

						<div class="form-group">
							<label for="user_message">Your Message</label>
							<textarea name="user_message" class="form-control" rows="8" cols="80"><?php if ($_POST && !empty($errors)): ?> <?php echo isset($_POST['user_message']) ? $_POST['user_message'] : '' ?> <?php endif; ?></textarea>
						</div>

						<div class="form-group submitBtnWrapper">
							<button type="submit" class="btn submitBtn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>




	<?php endif; ?>

<?php get_footer(); ?>
