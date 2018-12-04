<?php /* Template name: Enquiries/contact Template */ ?>

<?php
	if ($_POST) {
		// var_dump($_POST);

		$errors = array();
		$success_messsage = '';

		if (!wp_verify_nonce($_POST['_wpnonce'], 'wp_enquiry_form')) {
			echo("We cannot save the data at this time. Please try again later.");
			return;
		}

		if (strlen($_POST['userName']) <= 2) {
			array_push($errors, 'Name is too short. Please enter your full name');
		} elseif (strlen($_POST['userName']) >= 90) {
			array_push($errors, 'Name is too long.');
		}

		if (strlen($_POST['userEmail']) <= 1) {
			array_push($errors, 'Email is too short. Please enter a valid email.');
		}

		if ($_POST['reasonForContact'] == 'Choose an option') {
			array_push($errors, 'Please enter your reasoning for contacting us');
		}

		if (strlen($_POST['enquirySubject']) <= 5) {
			array_push($errors, 'Please enter a more descriptive subject');
		} elseif (strlen($_POST['enquierySubject']) >= 100) {
			array_push($errors, 'Your subject is too long. Please enter a shorter subject.');
		}

		if (strlen($_POST['userMessage']) <= 5) {
			array_push($errors, 'Please enter a more descriptive message');
		} elseif (strlen($_POST['userMessage']) >= 400) {
			array_push($errors, 'Please enter a shorter message');
		}

		if (empty($errors)) {
			$args = array(
				'post_title' => $_POST['enquirySubject'],
				'post_content' => $_POST['userMessage'],
				'post_type' =>	'enquiries',
				'meta_input' =>	array(
					'full_name' => $_POST['userName'],
					'email' => $_POST['userEmail'],
					'message_reason' => $_POST['reasonForContact']
				)
			);

			wp_insert_post($args);
			$success_message = 'Thank you for your message. We will get back to you shortly';
		}

	}

 ?>

<?php get_header(); ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<div class="container contactContainer">
				<div class="contactBlurb">
					<p><?php the_content(); ?></p>
				</div>

				<?php if ($_POST && !empty($errors)): ?>
					<div class="row">
						<div class="col">
							<ul>
								<?php foreach($errors as $singleError): ?>
									<li><?php echo($singleError); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>

				<?php if($_POST && empty($errors)): ?>
					<?php echo $success_message; ?>
				<?php endif; ?>

				<div class="row">
					<div class="col">
						<form class="contanctForm" action="<?php get_permalink(); ?>" method="post">
							<?php wp_nonce_field('wp_enquiry_form'); ?>
							<div class="form-group">
								<label for="userName">Full Name</label>
								<input type="text" class="form-control" id="userName" name="userName"/>
							</div>
							<div class="form-group">
								<label for="userEmail">Email</label>
								<input type="email" class="form-control" id="userEmail" name="userEmail"/>
							</div>

							<div class="form-group">
								<label for="reasonForContact">Why are you contacting us?</label>
								<select class="form-control" name="reasonForContact">
									<option>Choose an option</option>
									<option value="I have a question">I have a question</option>
									<option value="Booking an appointment">Booking an appointment</option>
									<option value="Wanting more information on your services">Wanting more information on your services</option>
								</select>
							</div>

							<div class="form-group">
								<label for="enquirySubject">Subject</label>
								<input type="text" class="form-control" id="enquirySubject" name="enquirySubject"/>
							</div>

							<div class="form-group">
								<label for="userMessage">Your Message</label>
								<textarea name="userMessage" class="form-control" rows="8" cols="80"></textarea>
							</div>

							<div class="form-group submitBtnWrapper">
								  <button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
