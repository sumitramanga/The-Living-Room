<?php /* Template name: Enquiries/contact Template */ ?>

<?php get_header(); ?>

	<h1>contact template</h1>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<div class="container contactContainer">
				<div class="contactBlurb">
					<p><?php the_content(); ?></p>
				</div>

				<div class="row">
					<div class="col">
						<form class="contanctForm" action="<?php get_permalink(); ?>" method="post">
							<?php wp_nonce_field('wp_enquiry_form'); ?>
							<div class="form-group">
								<label for="userName">Full Name</label>
								<input type="text" class="form-control" id="userName" name="userName" placeholder="Name"/>
							</div>
							<div class="form-group">
								<label for="userEmail">Email</label>
								<input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email"/>
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
								<label for="enquierySubject">Subject</label>
								<input type="text" class="form-control" id="enquierySubject" name="enquierySubject"/>
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
