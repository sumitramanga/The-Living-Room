		<div class="footer">
			<p class="copyright"><?php bloginfo( 'name' ) ?> ©</p>
			<div class="socialmedia">
				<a href="<?php echo get_page_link( get_page_by_title( 'blog' )->ID ); ?>" class="socialMeds">blog |</a>

				<?php
					$social_pint = get_theme_mod( 'pinterest_link_setting' );
					$social_fb = get_theme_mod( 'facebook_link_setting' );
					$social_houz = get_theme_mod( 'houzz_link_setting' );
				 ?>

				 <?php if (strlen($social_pint) > 0 ): ?>
				 	<a href="<?php echo $social_pint ?>" class="socialMeds" target="_blank"> Pinterest |</a>
				 <?php endif; ?>

				 <?php if (strlen($social_fb) > 0): ?>
				 	<a href="<?php echo $social_fb ?>" class="socialMeds" target="_blank"> Facebook |</a>
				 <?php endif; ?>

				 <?php if (strlen($social_houz) > 0): ?>
				 	<a href="<?php echo $social_houz ?>" class="socialMeds" target="_blank"> Houzz </a>
				 <?php endif; ?>

			</div>
		</div>
	</body>
	<?php wp_footer(); ?>
</html>
