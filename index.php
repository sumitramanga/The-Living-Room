<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>The Living Room</title>
		<?php wp_head(); ?>
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Show the logo if present else show the site title -->
				<a class="navbar-brand" href="<?php echo site_url(); ?>">
					<?php $header_logo_setting = get_theme_mod('header_logo_setting'); ?>
					<?php if( strlen($header_logo_setting) > 0 ): ?>
						<img src="<?php echo get_theme_mod('header_logo_setting'); ?>" alt="Logo" class="nav-logo">
					<?php else: ?>
						<?php echo bloginfo('name'); ?>
					<?php endif; ?>
				</a>

				<!-- Nav pages/slide out -->
				<?php wp_nav_menu( array(
					'theme-location' => 'header_nav',
					'depth' => 2,
					'container' => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'      => 'navbarSupportedContent',
					'menu_class'        => 'nav navbar-nav',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				)); ?>
			</nav>

			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<p><?php the_content(); ?></p>
				<?php endwhile; ?>
			<?php endif ?>
		</div>
	</body>
	<?php wp_footer(); ?>
</html>
