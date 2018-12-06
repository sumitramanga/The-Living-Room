<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta property="og:title" content="<?php echo bloginfo('name') ?>">
		<meta property="og:type" content="article">
		<meta property="og:url" content="<?php echo site_url(); ?>" />
		<meta property="og:description" content="<?php echo bloginfo('description') ?>">
		<meta property="og:image" content=""> <!--  insert logo -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<title><?php echo site_url(); ?></title>
		<?php wp_head(); ?>
		<link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
	</head>
	<body>
		<div class="navbar navbar-expand-lg">
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
					<?php
						$site_logo = get_theme_mod('custom_logo');
						$logo_url = wp_get_attachment_image_url($site_logo, 'medium');
					 ?>
					<?php if($site_logo): ?>
						<img src="<?php echo $logo_url ?>" alt="Logo" class="nav-logo" width="200">
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

		<?php
			if ( get_header_image() == false ) {
				$banner_image = get_template_directory_uri() . 'assets/images/default-header.jpg';
			} else {
				$banner_image = get_header_image();
			}
		 ?>

		<?php if (get_header_image()): ?>
			<div id="headerBanner" class="bg-dark headerBanner" style="background-image:url(<?php echo $banner_image ?>);">
				<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post(); ?>
						<div class="container bannerOpac bannerTitleWrapCon">
							<div class="row bannerTitleWrapCon">
								<div class="col-12 align-self-center">
									<h1 class="bannerTitle"><?php the_title(); ?></h1>
								</div>
							</div>
						</div>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
