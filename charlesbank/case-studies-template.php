<?php
/* Template Name: Case Studies Template*/
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
			<div id="case-study" class="grids">
				<div class="wrapper">
					<article id="case-studies">
						<?php 
							$casestudies_query = new WP_Query( array(
								'post_type' => array('casestudies'),
								'order' => 'ASC' 
							));
						?>
						<?php 
							$itemNumber = 0;
							while ($casestudies_query->have_posts() ) : $casestudies_query->the_post(); 
						?>
							<section id="item-<?php echo $itemNumber++; ?>" class="case-studies-item grids">
								<div class="case-studies-item-wrapper">
									<a class="case-studies-thumbnail-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
										<?php the_post_thumbnail(); ?>
									</a>
									<div class="case-studies-content-wrapper">
										<a class="case-studies-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><h4 class="case-studies-title"><?php the_title();?></h4></a>
										<div class="content-excerpt"><?php the_excerpt(); ?></div>
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