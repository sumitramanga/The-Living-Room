<?php get_header(); ?>
<p>single page for previous work template</p>
	<?php if (have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>


		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
