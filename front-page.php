<?php get_header(); ?>

<div class="container main containerWidthMain">

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
						<p class="landingText">Where Living begins here</p>
						<div class="scrollDownBtn">
						   <i class="fas fa-angle-down fa-2x"></i>
						</div>
					</div>
				 </div>
			</div>
		</div>
	</div>

	<div class="featuredReviews"></div>
</div>


<?php get_footer(); ?>
