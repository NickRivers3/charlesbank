<?php /*
Template Name: Front Page
*/ ?>
<?php get_header(); ?>
		<div id="main-content" class="container">
			<article id="welcome-box">
				<div class="wrapper">
					<?php while (have_posts() ) : the_post(); ?>
						<div class="front-entry">
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
				</div>
			</article>
		</div>
<?php get_footer(); ?>