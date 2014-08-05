<?php
/* Index.php */
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="index seven-forty grids">
			<?php get_template_part( 'loop', 'index' ); ?>
	</div>
</div>
<?php get_footer(); ?>
