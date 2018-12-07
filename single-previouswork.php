<?php get_header(); ?>

	<?php if (have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<?php
				$title = get_the_title();
				$desc = get_the_content();
				$post_img = get_the_post_thumbnail_url($id);
				$work_post_id = get_the_id();
		 	 ?>
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
			<div class="row">
				<div class="col-12">
					<div style="background-image: url(<?php echo $post_img; ?>); width:100%; height: 100px; background-size: cover;"></div>
				</div>
				<div class="col-12">
					<h3 class="staffName"><?php echo $title; ?></h3>
					<p class="serviceReview">"<?php echo $singleReview; ?>"</p>
					<p class="staffDesc"><?php echo $desc; ?></p>
				</div>
			</div>
		</div>




	<?php endif; ?>

<?php get_footer(); ?>
