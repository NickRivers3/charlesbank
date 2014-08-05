<?php
/* Template Name: Portfolio Archive*/
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="archive seven-forty grids content">
		<div class="content-wrapper">
			<div id="page-content" class="grids">
				<article id="portfolio-archive" class="page-content">
					<h1 class="entry-title">Portfolio Archive</h1>
					<?php 
					global $query_string;
						query_posts( $query_string . '&order=DSC&posts_per_page=-1'); 
					
						while ( have_posts() ) : the_post();?>
						<section class="portfolio-items">
							<a class="portfolio-image thumb shadow" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail();?></a>
							<div class="portfolio-item-wrapper">
								<a class="portfolio-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><h3 class="entry-title"><?php the_title();?></h3></a>
								<div class="the-excerpt"><?php the_excerpt(); ?></div>
							</div>
						</section>
					<?php endwhile; ?>
				</article>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>

