<?php get_header(); ?>
	<div class="container main">
		<div>
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<p><?php the_content(); ?></p>
				<?php endwhile; ?>
			<?php endif ?>
		</div>
	</div>
<?php get_footer(); ?>
