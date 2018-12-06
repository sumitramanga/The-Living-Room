<?php /* Template name: Previous Work Template */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>

			<?php $args = array(
				'post_type' => 'previouswork'
			) ?>

			<?php $previous_work = new WP_Query($args); ?>

			<div class="container">
				<p><?php the_content(); ?></p>
			</div>

			<div class="container">
				<?php if( $previous_work->have_posts() ): ?>
					<?php while($previous_work->have_posts()): $previous_work->the_post(); ?>
						<?php
							$id = get_the_id();
							$customer_testimonial = get_post_meta($id, 'service_testimonial', true);
  						 ?>

						<?php if ( strlen($customer_testimonial) > 1 ): ?>
							<p><?php echo $customer_testimonial; ?></p>
							<a href="<?php the_permalink(); ?>">View more...</a>
						<?php endif; ?>

						<p><?php the_title(); ?></p>
						<p><?php the_content(); ?></p>
						<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail('medium', ['class' => 'serviceImg', 'alt' => 'thumbnail-image']); ?>
						<?php endif; ?>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>


		<?php endwhile; ?>
	<?php endif; ?>

	<h1>our previous work template</h1>

<?php get_footer(); ?>
