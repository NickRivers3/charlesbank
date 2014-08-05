<?php
/* Single News.php */
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="five-twenty grids">
		<div id="page-content" class="content">
			<div class="content-wrapper">
				<h1 class="page-title">Press Releases</h1>
				<article id="news-article" class="page-content">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<section>
							<?php	if ( has_post_thumbnail() ) { ?>
									<div class="location-date">
										<span class="custom-location"><?php the_field('location'); ?> - </span>
										<span class="custom-date"><?php the_time('F j, Y'); ?></span>
									</div>
									<h1 class="entry-title"><?php the_title();?></h1>
									<div class="thumb"><?php the_post_thumbnail('large');?></div>
							<?php } else { ?>
									<div class="location-date no-post_thumbnail">
										<span class="custom-location"><?php the_field('location'); ?> - </span>
										<span class="custom-date"><?php the_time('F j, Y'); ?></span>
									</div>
									<h1 class="entry-title no-post_thumbnail"><?php the_title();?></h1>
							<?php } ?>
							<div class="entry-content"><?php the_content(); ?></div>
							<?php if (get_field('media_contact') !==''): 
								$currentPost = get_the_ID();
								$postid = "1420";
									
								if ($currentPost == $postid): ?>

								<div class="other-contacts">
									<?php the_field('media_contact'); ?>
								</div>
								<?php endif; endif;?>
						</section>
						<div class="entry-meta">
						<?php edit_post_link( __( 'Edit Content', 'charlesbank'), '<span class="edit-link">', '</span>' ); ?>
					</div>
					<?php endwhile; ?>
				</article>
			</div>
		</div>
	</div>
	<div id="right-column" class="sidebar two-hundred grids">
		<?php get_sidebar('alt'); ?>
	</div>
</div>
<?php get_footer(); ?>
