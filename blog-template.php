<?php
/* Template Name: Blog page template */
 ?>

<?php get_header(); ?>

<p>this is the blog template</p>

<div>
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>
		<?php endwhile; ?>
	<?php endif ?>
</div>

<?php get_footer(); ?>
