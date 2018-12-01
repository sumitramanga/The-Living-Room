<?php get_header(); ?>

<div class="container main containerWidthMain">

	<div>
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
						<div class="arrowDown">
						   <i class="fas fa-caret-down"></i>
						</div>
					</div>
				 </div>

			</div>
		</div>


	</div>
</div>


<?php get_footer(); ?>
