<?php get_header(); ?>

<div class="container main">

	<div class="container">
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
					 <div class="swiper-slide"><img src="<?php echo $carousel_img ?>"  class="carouselImg" alt="Carousel Image"></div>
				 <?php endforeach; ?>
			</div>
		</div>

		<!-- <div class="mainImg">
			<p>Where Living begins here</p>
			<div class="arrowDown"></div>
		</div> -->
	</div>
</div>


<?php get_footer(); ?>
