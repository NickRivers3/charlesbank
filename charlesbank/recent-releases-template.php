<?php
/* Template Name: Recent Releases */
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="five-twenty grids">
		<div id="page-content" class="content">
			<div class="content-wrapper">
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
				<div id="news" class="loop-content">
					<div class="wrapper">
						<article id="news-items">
							<?php 
								$news_query = new WP_Query( array(
									'post_type' => array('news'),
									'order' => 'DSC',
									'date_query' => array(  
										array(  
											'after' => 'January 1st, 2014',
											'before' => 'December 31st, 2014',
										),  
									)  
								));
							?>
							<?php while ($news_query->have_posts() ) : $news_query->the_post(); ?>
								<section class="news-item grids">
									<div class="news-item-wrapper">
										<span class="custom-date"><?php the_time('F j, Y'); ?></span>
										<a class="news-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
											<h3 class="news-title"><?php the_title();?></h3>
										</a>
										<div class="content-excerpt"><?php the_excerpt(); ?></div>
										<div class="clearfix"></div>
									</div>
								</section>
							<?php endwhile; ?>
						</article>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="right-column" class="sidebar two-hundred grids">
		<?php get_sidebar('alt'); ?>
	</div>
</div>
<?php get_footer(); ?>