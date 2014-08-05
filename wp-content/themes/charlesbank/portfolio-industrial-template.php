<?php
/* Template Name: Portfolio Industrial Template*/
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
					<h1 class="entry-title">Portfolio</h1>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<section>
							<div class="the-content"><?php the_content(); ?></div>
							<?php	if ( has_post_thumbnail() ) { ?>
									<h3 class="entry-title"><?php the_title();?></h3>
									<div class="thumb"><?php the_post_thumbnail('large');?></div>
							<?php } else { ?>
									<h3 class="entry-title no-post_thumbnail"><?php the_title();?></h3>
							<?php } ?>
						</section>
					<?php endwhile; ?>
				</article>
			</div>
			<div id="industrial-portfolio" class="grids">
				<div class="wrapper">
					<article id="portfolio">
						<div id="portfolio-gallery" class="wrapper">
							<?php 
								$portfolio_query = new WP_Query( array(
									'post_type' => array('portfolio'),
									'tag' => 'industrial',
									'orderby' => 'title',
									'order' => 'ASC',
									'posts_per_page' => -1
								));
							?>
							<?php 
								$itemNumber = 0;
								while ($portfolio_query->have_posts() ) : $portfolio_query->the_post(); 
							?>
							
								<section id="item-<?php echo $itemNumber++; ?>" class="portfolio-item grids">
									<div class="portfolio-item-wrapper">
										<a class="<?php the_ID(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
											<img class="portfolio-thumbnail" src="<?php the_field('gallery_thumbnail'); ?>" title="<?php the_title();?>" alt="<?php the_title();?>"/>
										</a>
										<div class="clearfix"></div>
									</div>
								</section>
							<?php endwhile; ?>
						</div>
					</article>
				</div>
			</div>
			<?php get_template_part('portfolio-slider'); ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>