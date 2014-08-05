<?php
/* Archive News.php */
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="archive five-twenty grids">
		<div id="news" class="content">
			<div class="content-wrapper">
				<?php 
					$archive_year = get_the_time('Y'); 
					$current_year = date('Y');
					if ($archive_year == $current_year) { ?>
						<h1 class="page-title">News Archive</h1>
				<?php } elseif (is_paged() == true) {?>
						<h1 class="page-title">News Archive - <?php if ( $paged < 2 ) {} else { echo (' Page '); echo ($paged);}?></h1>
					
				<?php } else {?>
					<h1 class="page-title"><?php the_time('Y'); ?> News Archive</h1>
				<?php } ?>
			
				<article id="news-items">
					<?php // Makes all Posts Display in Ascending Order
						global $query_string;
						query_posts( $query_string . '&order=DSC'); 

						// The charlesbank loop
						while ( have_posts() ) : the_post();?>
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
		<?php if(function_exists('wp_paginate')) {
					wp_paginate();
				} ?>
	</div>
	<div id="right-column" class="sidebar two-hundred grids">
		<?php get_sidebar('alt'); ?>
	</div>
</div>
<?php get_footer(); ?>
