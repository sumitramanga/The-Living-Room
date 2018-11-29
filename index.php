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
