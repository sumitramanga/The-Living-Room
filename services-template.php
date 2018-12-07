<?php /* Template name: Services Template */ ?>

<?php get_header(); ?>
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>

			<?php $args = array(
				'post_type' => 'services'
			) ?>

			<?php $all_services = new WP_Query($args); ?>

			<div class="container servicesCon">
				<div class="row">
					<?php if( $all_services->have_posts() ): ?>
						<?php while($all_services->have_posts()): $all_services->the_post(); ?>

							<?php
								$id = get_the_id();
								$icon_type = get_post_meta($id, 'icon', true);
								$description = get_post_meta($id, 'description', true);
								$testimonial = get_post_meta($id, 'testimonial', true);

								if (has_post_thumbnail()) {
									$image = get_the_post_thumbnail_url($id);
								}
	  						 ?>
							<div class="col-sm-12 col-md-6 flex-row">
								<div class="container">
									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-12 homeReviewsCol secHomeImg" style="background-image:url(<?php echo $image; ?>);">
											<div class="row flex-column justify-content-center reviewWrapper">
												<div class="col- align-self-center serviceIconWrap">
													<?php if ( !empty($icon_type) ): ?>
														<i class="fas fa-<?php echo strtolower($icon_type); ?>"></i>
													<?php endif; ?>
												</div>
												<div class="col- align-self-center serviceNameWrap">
													<p class="serviceName"><?php echo get_the_title(); ?></p>
												</div>
											</div>
										</div>

										<div class="col-sm-12 col-md-12 col-lg-12 homeReviewsCol serviceDets" id="serviceDets">
											<?php if ( strlen($description) > 1 ): ?>
												<p><?php echo $description; ?></p>
											<?php endif; ?>

											<?php if ( strlen($testimonial) > 1 ): ?>
												<p class="serviceReview">"<?php echo $testimonial; ?>"</p>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
