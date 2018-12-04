<?php /* Template name: Previous Work Template */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>

			<div class="container">
				<p><?php the_content(); ?></p>
			</div>


		<?php endwhile; ?>
	<?php endif; ?>

	<h1>our previous work template</h1>

<?php get_footer(); ?>
