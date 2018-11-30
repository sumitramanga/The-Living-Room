		<div class="footer">
			<p class="copyright"><?php bloginfo('name') ?> ©</p>
			<div class="socialmedia">
				<a href="<?php echo get_page_link( get_page_by_title( 'blog' )->ID ); ?>">blog |</a>
				pinterest | facebook | houzz
			</div>
		</div>
	</body>
	<?php wp_footer(); ?>
</html>
