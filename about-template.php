<?php /* Template Name: About Template */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<?php if( strlen(get_the_content()) > 0): ?>
				<div class="container aboutTextCon">
					<div class="row">
						<div class="col-sm-12 aboutTextCol">
							<!-- <p class="aboutText"> -->
								<?php echo get_the_content(); ?>
							<!-- </p> -->
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php
				$args = array(
					'post_type' => 'staff',
					'order' => 'ASC',
					'orderby' => 'title'
				)
			 ?>
			<?php $all_staff = new WP_Query($args); ?>

			<?php if($all_staff->have_posts()): ?>
				<h1 class="teamTitle">Meet the Team</h1>
				<div class="container staffSec">
					<div class="row justify-content-center">
						<?php while($all_staff->have_posts()): $all_staff->the_post(); ?>
							<?php if (has_post_thumbnail()): ?>
								<div class="col-12 col-sm-6 col-md-6 col-lg-4 indivStaff">
									<div class="imgStaffWrap">
										<?php the_post_thumbnail('staff_size', ['class' => 'indivStaffImg', 'alt' => 'Staff member']); ?> <!-- feature image -->
									</div>
									<h3 class="staffName"><?php echo get_the_title(); ?></h3> <!-- the_title -->
									<p class="staffDesc"><?php echo get_the_content(); ?></p> <!-- the_content -->
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>
