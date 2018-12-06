<?php get_header(); ?>
<p>single page for previous work template</p>
	<?php if (have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<div class="container">
				<h3><?php the_title(); ?></h3>
				<p><?php the_content(); ?></p>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
