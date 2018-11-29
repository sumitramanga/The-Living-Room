<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?php echo site_url(); ?></title>
		<?php wp_head(); ?>
		<link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
	</head>
	<body>
		<div class="navbar navbar-expand-lg fixed-top">
			<div class="navBar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
					<div class="navIcon">
	 					<div class="bar1"></div>
	 					<div class="bar2"></div>
	 					<div class="bar3"></div>
	 				</div>
					<span class="navIconText">Menu</span>
				</button>

				<!-- Show the logo if present else show the site title -->
				<a class="navbar-brand siteTitle" href="<?php echo site_url(); ?>">
					<?php $header_logo_setting = get_theme_mod('header_logo_setting'); ?>
					<?php if( strlen($header_logo_setting) > 0 ): ?>
						<img src="<?php echo get_theme_mod('header_logo_setting'); ?>" alt="Logo" class="nav-logo">
					<?php else: ?>
						<?php echo bloginfo('name'); ?>
					<?php endif; ?>
				</a>
			</div>

			<!-- Nav pages/slide out -->
			<?php wp_nav_menu( array(
				'theme-location' => 'header_nav',
				'depth' => 2,
				'container' => 'div',
				'container_class' => 'collapse navbar-collapse',
				'container_id'      => 'navbarTogglerDemo03',
				'menu_class'        => 'nav navbar-nav mr-auto mt-2 mt-lg-0',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker(),
			)); ?>
		</div>
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

	</body>
	<?php wp_footer(); ?>
</html>
