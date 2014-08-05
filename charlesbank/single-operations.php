<?php
/* Single Operations */
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="seven-forty grids">
		<article class="team-content">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="portrate-image" class="two-sixty-six grids"><?php the_post_thumbnail('large');?></div>
				<div id="member-info" class="content four-forty-two grids">
					<div class="content-wrapper">
						<h1 id="member-name" class="entry-title"><?php the_title();?></h1>
						<div id="member-title" class=""><?php the_field('job_title'); ?></div>
						<div id="member-bio" class="entry-content"><?php the_content(); ?></div>
						<div class="entry-meta">
								<?php edit_post_link( __( 'Edit Content', 'charlesbank'), '<span class="edit-link">', '</span>' ); ?>
						</div>
						<ul id="team-nav" class="next-back menu">
							<li id="previous"><?php previous_post_link('%link', '', FALSE);?></li>
							<li id="next"><?php next_post_link('%link', '', FALSE); ?></li>
						</ul>
					</div>
				</div>
			<?php endwhile; ?>
		</article>
	</div>
</div>
<?php get_footer(); ?>
