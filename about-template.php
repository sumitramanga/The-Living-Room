<?php /* Template Name: About Template */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>

			<div class="aboutBlurb">
				<p class="aboutText">
					<?php the_content(); ?>
				</p>
			</div>

			<?php
				$args = array(
					'post_type' => 'staff'
				)
			 ?>
			<?php $all_staff = new WP_Query($args); ?>

			<?php if($all_staff->have_posts()): ?>
				<?php while($all_staff->have_posts()): $all_staff->the_post(); ?>
					<div class="container staff">
						<?php the_post_thumbnail('medium', ['class' => 'staffImg', 'alt' => 'Staff member']); ?> <!-- feature image -->
						<h3 class="staffName"><?php the_title(); ?></h3> <!-- the_title -->
						<p class="staffDesc"><?php the_content(); ?></p> <!-- the_content -->
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
