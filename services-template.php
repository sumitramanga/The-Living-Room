<?php /* Template name: Services Template */ ?>

<?php get_header(); ?>
<p>Services Template</p>
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<!-- title for the page -->
			<h1><?php the_title(); ?></h1>

			<?php $args = array(
				'post_type' => 'services'
			) ?>

			<?php $all_services = new WP_Query($args); ?>

			<div class="container">
				<?php if( $all_services->have_posts() ): ?>
					<?php while($all_services->have_posts()): $all_services->the_post(); ?>

						<!-- title for the specific service type -->
						<div class=""><?php the_title(); ?></div>

						<!-- Echoing the icon type name -->
						<?php
							$id = get_the_id();
							$icon_type = get_post_meta($id, 'icon', true);
							$description = get_post_meta($id, 'description', true);
							$testimonial = get_post_meta($id, 'testimonial', true);
  						 ?>

						<?php if(has_post_thumbnail()): ?>
							<?php the_post_thumbnail('medium', ['class' => 'serviceImg', 'alt' => 'thumbnail-image']); ?>
						<?php endif; ?>

						<?php if ( !empty($icon_type) ): ?>
							<i class="fas fa-<?php echo strtolower($icon_type); ?>"></i>
						<?php endif; ?>

						<?php if ( strlen($description) > 1 ): ?>
							<p> <?php echo $description; ?></p>
						<?php endif; ?>

						<?php if ( strlen($testimonial) > 1 ): ?>
							<p> <?php echo $testimonial; ?></p>
						<?php endif; ?>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
