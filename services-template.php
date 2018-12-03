<?php /* Template name: Services Template */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>

			<?php $args = array(
				'post_type' => 'services'
			) ?>

			<?php $all_services = new WP_Query($args); ?>

			<div class="container">
				<?php if( $all_services->have_posts() ): ?>
					<?php while($all_services->have_posts()): $all_services->the_post(); ?>
						<div class=""><?php the_title(); ?></div>

						<!-- Echoing the icon type name -->
						<?php
							$id = get_the_id();
							$icon_type = get_post_meta($id, 'icon', true);
							$description = get_post_meta($id, 'description', true);
							$testimonial = get_post_meta($id, 'testimonial', true);
							echo $icon_type;
							echo $description;
							echo $testimonial;
  						 ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
