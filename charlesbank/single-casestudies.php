<?php
/* Single Case Studies.php */
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="seven-forty grids">
		<div id="page-content" class="content">
			<div class="content-wrapper">
				<h1 class="page-title">Case Studies</h1>
				<article id="case-studies-article" class="page-content">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<section>
							<div class="left-column">
								<div class="thumb"><?php the_post_thumbnail();?></div>
								<a class="website" href="<?php the_field('website'); ?>" target="_blank"><?php the_field('website');?></a>
							</div>
							<div class="right-column">
								<h1 class="entry-title"><?php the_title();?></h1>
								<h5 class="case-studies-section">Situation</h5>
								<div class="entry-content"><?php the_content(); ?></div>
								<h5 class="case-studies-section">Transaction</h5>
								<div class="entry-content"><p><?php the_field('transaction'); ?></p></div>
								<h5 class="case-studies-section">Charlesbank Role</h5>
								<div class="entry-content"><p><?php the_field('charlesbank_role'); ?></p></div>
								<h5 class="case-studies-section">Results</h5>
								<div class="entry-content"><p><?php the_field('results'); ?></p></div>
							</div>
						</section>
						<div class="entry-meta">
								<?php edit_post_link( __( 'Edit Content', 'charlesbank'), '<span class="edit-link">', '</span>' ); ?>
							</div>
							<ul id="case-nav" class="menu next-back">
								<li id="previous"><?php previous_post_link('%link', 'Previous', FALSE);?></li>
								<li id="next"><?php next_post_link('%link', 'Next', FALSE);?></li>
							</ul>
					<?php endwhile; ?>
				</article>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>