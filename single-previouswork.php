<?php get_header(); ?>

	<?php if (is_singular()): ?>
		<div class="container">
			<div class="col-12 col-sm-6 col-md-6 col-lg-4 indivStaff">
				<div class="imgStaffWrap">
					<?php the_post_thumbnail('staff_size', ['class' => 'indivStaffImg', 'alt' => 'Project']); ?> <!-- feature image -->
				</div>
				<?php if ( strlen($testimonial) > 1 ): ?>
					<p class="serviceReview">"<?php echo $testimonial; ?>"</p>
				<?php endif; ?>
				<h3 class="staffName"><?php echo get_the_title(); ?></h3>
				<p class="staffDesc"><?php echo get_the_content(); ?></p>
			</div>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>
