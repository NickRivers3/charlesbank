<?php
/* Template Name: Operations Team*/
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="seven-forty grids">
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
			</div>
		</div>
		<div id="operations-team">
			<div class="wrapper">
				<article id="operations-team-members">
					<?php 
						$team_query = new WP_Query( array(
							'post_type' => array('operations'),
							'order' => 'ASC' 
						));
					?>
					<?php while ($team_query->have_posts() ) : $team_query->the_post(); ?>
						<section class="team-item grids">
							<div class="team-item-wrapper">
									<a class="team-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
										<img class="<?php the_slug();?> grid-roll" src="<?php the_field('thumbnail_image'); ?>"/>
									</a>
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
<?php get_footer(); ?>
