<?php get_header('front'); ?>
<div class="container main containerWidthMain">

	<!-- Carousel/landing page content -->
	<div class="landingContent">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php
					$all_carousel_imgs = array(
						$carousel_img_1 = get_theme_mod('carousel_img_1_setting'),
						$carousel_img_2 = get_theme_mod('carousel_img_2_setting'),
						$carousel_img_3 = get_theme_mod('carousel_img_3_setting')
					);
				 ?>

				 <?php foreach ($all_carousel_imgs as $carousel_img): ?>
					 <div class="swiper-slide">
						<div class="carouselImgBg" style="background-image: url(<?php echo $carousel_img ?>);"></div>
					 </div>
				 <?php endforeach; ?>

				 <div class="carouselTopLayerWrapper">
					<div class="carouselTopLayer">
						<?php $land_screen_text = get_theme_mod('landing_screen_text_setting'); ?>
						<p class="landingText"><?php echo $land_screen_text ?></p>
						<div class="scrollDownBtn">
						   <i class="fas fa-angle-down fa-2x"></i>
						</div>
					</div>
				 </div>
			</div>
		</div>
	</div>

	<!-- Secondary homepage content -->
	<?php
		$secContentImg = get_theme_mod('secondary_img_setting');
		$secContentText = get_theme_mod('secondary_text_setting');
	 ?>

	<?php if (strlen($secContentImg) > 0 && strlen($secContentText) > 0): ?>
		<div class="container secondaryCont">
			<div class="row secHomeRow">
				<div class="col-sm-12 col-md-6 secHomeImgWrapper secColWidth" style="background-color: white;">
					<div class="secHomeImg" style="background-image:url(<?php echo $secContentImg; ?>);"></div>
				</div>
				<div class="col-sm-12 col-md-6 secHomeTextWrapper secColWidth">
					<p class="secHomeText"><?php echo $secContentText; ?></p>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<!-- Testimonials -->
	<div class="container">
		<div class="row">

			<?php $args = array(
				'post_type' => 'previouswork',
				'posts_per_page' => 3
			) ?>

			<?php $all_previouswork = new WP_Query($args); ?>

			<?php if( $all_previouswork->have_posts() ): ?>
				<?php while( $all_previouswork->have_posts() ): $all_previouswork->the_post(); ?>

					<?php
						$id = get_the_id();
						$testimonial = get_post_meta($id, 'service_testimonial', true);
						$customer_name = get_post_meta($id, 'customer_name', true);

						if (has_post_thumbnail()) {
							$image = get_the_post_thumbnail_url($id);
						}
					 ?>

					<div class="col-sm-12 col-md-6 col-lg-4 homeReviewsCol secHomeImg" style="background-image:url(<?php echo $image; ?>);">
						<div class="row flex-column justify-content-center justify-content-center reviewWrapper">
							<div class="col- align-self-center"><p class="homeReviewtxt"><?php echo $testimonial; ?></p></div>
							<div class="col- align-self-center"><p class="homeCusName"><?php echo $customer_name; ?></p></div>
						</div>
					</div>
					<hr/>

				<?php endwhile; ?>
			<?php endif; ?>

			</div>
		</div>
<?php get_footer(); ?>
