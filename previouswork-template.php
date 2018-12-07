<?php /* Template name: Previous Work Template */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>

			<?php $args = array(
				'post_type' => 'previouswork'
			) ?>

			<?php $previous_work = new WP_Query($args); ?>

			<div class="container servicesCon">
				<div class="row">
					<?php if( $previous_work->have_posts() ): ?>
						<?php while($previous_work->have_posts()): $previous_work->the_post(); ?>
							<?php
								$id = get_the_id();
								$customer_testimonial = get_post_meta($id, 'service_testimonial', true);
								$work_icon = get_post_meta($id, 'icon', true);
								$work_description = get_the_content();

								if (has_post_thumbnail()) {
									$work_image = get_the_post_thumbnail_url($id);
								}
	  						 ?>

							<div class="col-sm-12 col-md-6 col-lg-4 flex-row">
								<div class="container">
									<div class="row">
										<div class="col-sm-12 col-md-12 col-lg-12 homeReviewsCol secHomeImg" style="background-image:url(<?php echo $work_image; ?>);">
											<div class="row flex-column justify-content-center reviewWrapper">
												<div class="col- align-self-center serviceIconWrap">
													<?php if ( !empty($work_icon) ): ?>
														<div class="workIcon" style="background-image:url('<?php echo get_template_directory_uri() . '/assets/images/'; echo strtolower($work_icon); ?>.png');"></div>
													<?php endif; ?>
												</div>
												<div class="col- align-self-center serviceNameWrap">
													<p class="serviceName"><?php echo get_the_title(); ?></p>
												</div>
											</div>
										</div>

										<div class="col-sm-12 col-md-12 col-lg-12 homeReviewsCol serviceDets" id="serviceDets">
											<?php if ( strlen($customer_testimonial) > 1 ): ?>
												<p class="serviceReview">"<?php echo $customer_testimonial; ?>"</p>
											<?php endif; ?>

											<?php if ( strlen($work_description) > 1 ): ?>
												<p><?php echo wp_trim_words( $work_description, 50, '' ); ?> <span><a href="<?php the_permalink(); ?>" class="viewMoreBtn">View more...</a></span></p>
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
