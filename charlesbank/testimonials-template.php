<?php
/* Template Name: Testimonials Template*/
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="seven-forty grids content">
		<div class="content-wrapper">
			<div id="page-content" class="grids">
				<article class="page-content">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<section>
							<?php	if ( has_post_thumbnail() ) { ?>
									<h1 class="entry-title"><?php the_title();?></h1>
									<div class="thumb"><?php the_post_thumbnail('large');?></div>
							<?php } else { ?>
									<h1 class="entry-title no-post_thumbnail"><?php the_title();?></h1>
							<?php } ?>
							<div class="the-content"><?php the_content(); ?></div>
						</section>
					<?php endwhile; ?>
				</article>
			</div>
			<?php get_template_part('testimonial-gallery'); ?>
			<div id="testimonials" class="grids">
				<div class="wrapper">
					<article id="testimonial-clients">
						<?php 
							$testimonials_query = new WP_Query( array(
								'post_type' => array('testimonials'),
								'order' => 'ASC' 
							));
						?>
						<?php 
							$itemNumber = 0;
							while ($testimonials_query->have_posts() ) : $testimonials_query->the_post(); 
						?>
							<section id="item-<?php echo $itemNumber++; ?>" class="testimonial-item grids">
								<div class="testimonial-item-wrapper">
									<div class="testimonial-thumbnail">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="entry-content"><?php the_content(); ?></div>
									<div class="testimonial-content-wrapper">
										<h5 class="testimonial-title"><?php the_title();?>,</h5>
										<span class="testimonial-credentials"> <?php the_field('title'); ?></span>
										
										<?php 
											if (has_sub_field('credentials')) { ?>
												<span class="testimonials-company with"> <?php the_field('company'); ?></span>
												<span class="testimonial-credentials"> <?php the_field('credentials'); ?></span>
										<?php } 
											else { ?>
												<span class="testimonials-company"> <?php the_field('company'); ?></span>
										<?php }	?>
									</div>
									<div class="clearfix"></div>
								</div>
							</section>
						<?php endwhile; ?>
					</article>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>