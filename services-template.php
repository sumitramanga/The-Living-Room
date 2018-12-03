<?php /* Template name: Services Template */ ?>

<?php get_header(); ?>
	<h1>this is the services template</h1>

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
						<?php
							$custom_field = get_post_custom();
							$icon_type = get_post_meta($post->ID, 'icon', true);
							echo $icon_type;
  						 ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
