<?php
/* Template Name: Strategy Template */
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="five-twenty grids">
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
				<ul id="page-nav" class="menu">
					<?php $siblings = siblings(''); if( $siblings ) :
						if( $siblings['previous'] ) { ?>
							<li id="previous"><a href="<?php echo $siblings['previous']; ?>"><?php siblings_title('previous_title');?></a></li>
						<?php } else { ?>
							<li class="empty"></li>
						<?php } 
						if( $siblings['next'] ) { ?>
							<li id="next"><a href="<?php siblings('next'); ?>"> <?php siblings_title('next_title');?></a></li>
						<?php } else { ?>
							<li class="empty"></li>
						<?php } endif;?>
				</ul>
			</div>
		</article>
	</div>
	<div id="right-column" class="sidebar two-hundred grids">
		<?php get_sidebar('alt'); ?>
	</div>
</div>
<?php get_footer(); ?>
