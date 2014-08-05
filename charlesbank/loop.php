<?php 
   // No posts to show, the famous 404 error message
   if ( ! have_posts() ) :
?>
   <article id="post-0" class="post error404 not-found content">
      <h1 class="entry-title"><?php __( 'Page Not Found', 'charlesbank' ); ?></h1>
      <section class="entry-content">
         <p><?php 
               // Error message output file (localized)
               __( 'There is nothing here, try searching for whatever you were looking for.', 'charlesbank' );
         ?></p>
         <?php get_search_form(); ?>
      </section>
   </article>
<?php endif; ?>

<?php
	// Makes all Posts Display in Ascending Order
	global $query_string;
	query_posts( $query_string . '&order=DSC' ); 

	// The charlesbank loop
	while ( have_posts() ) : the_post();

	// If it's an archive or search result
	if ( is_home() || is_archive() || is_search() ) : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
			<div class="content-wrapper">
			<?php	if ( has_post_thumbnail() ) { ?>
				<div class="featured-image">
					<?php the_post_thumbnail();?>
				</div>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo __('Permalink to ', 'charlesbank'); the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php } else { ?>
				<h2 class="entry-title no-post_thumbnail"><?php the_title();?></h2>
			<?php } ?>
				<div class="entry entry-excerpt">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</article>
		
	<!-- Page Loop -->
	<?php elseif (is_page()) : ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
			<div class="content-wrapper">
			<?php	if ( has_post_thumbnail() ) { ?>
				<div class="featured-image">
					<?php the_post_thumbnail();?>
				</div>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo __('Permalink to ', 'charlesbank'); the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php } else { ?>
				<h1 class="entry-title no-post_thumbnail"><?php the_title();?></h1>
			<?php } ?>
				<div class="entry entry-content">
					<?php the_content(); ?>
				</div>
				<div class="entry-meta">
					<?php edit_post_link( __( 'Edit Content', 'charlesbank'), '<span class="edit-link">', '</span>' ); ?>
				</div>
			</div>
		</article>
			
	<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
		<div class="content-wrapper">
		<?php	if ( has_post_thumbnail() ) { ?>
			<div class="featured-image">
				<?php the_post_thumbnail();?>
			</div>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php } else { ?>
			<h1 class="entry-title no-post_thumbnail"><?php the_title();?></h1>
		<?php } ?>
			<div class="entry entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'charlesbank'), 'after' => '</div>' ) ); ?>
			</div>
			<div class="entry-meta">
				<?php edit_post_link( __( 'Edit Content', 'charlesbank'), '<span class="edit-link">', '</span>' ); ?>
			</div>
		</div>
	</article>
	
	<?php endif; ?>
<?php endwhile ?>