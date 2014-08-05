<?php get_header(); ?>
<?php get_sidebar(); ?>

		<div id="main-wrapper">
				<article id="custom-content">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<section>
						<?php	if ( has_post_thumbnail() ) { ?>
								<h2 class="entry-title"><?php the_title();?></h2>
								<div class="pub-date"><?php the_time('l, F jS, Y') ?></div>
								<div class="thumb"><?php the_post_thumbnail('large');?></div>
						<?php } else { ?>
								<h2 class="entry-title no-post_thumbnail"><?php the_title();?></h2>
								<div class="pub-date"><?php the_time('l, F jS, Y') ?></div>
						<?php } ?>
						<div><?php the_content(); ?></div>
					</section>
					<?php endwhile; ?>
				</article>
			</div>
		</div>
<?php get_footer(); ?>