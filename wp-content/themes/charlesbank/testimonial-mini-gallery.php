<?php
/* Testimonial Mini Gallery */
?>
<script>
jQuery(document).ready(function($) {
	$('#mini-gallery').cycle({
		speed: 800,
		timeout: '6500',
		pause: 'true',
		cleartypeNoBg: 'false',
		containerResize:0,
		slideExpr: '.testimonial-mini-item'		
	});
});
</script>
<div id="mini-gallery">
	<div class="wrapper">
		<?php 
			$testimonials_query = new WP_Query( array(
				'post_type' => array('testimonials'),
				'order' => 'ASC' 
			));
			$itemNumber = 0;
			while ($testimonials_query->have_posts() ) : $testimonials_query->the_post(); 
		?>

		<section id="item-<?php echo $itemNumber++; ?>" class="testimonial-mini-item grids">
			<div class="testimonial-item-wrapper">
				<div class="testimonial-mini-quote"><?php the_field('quote'); ?></div>
				<div class="testimonial-mini-gallery-content-wrapper">
					<h5 class="testimonial-title">- <?php the_title();?>,</h5>
					<span class="testimonial-credentials"> <?php the_field('title'); ?>,</span>
					<span class="testimonials-company"> <?php the_field('company'); ?></span>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>
		<?php endwhile; ?>
		<div class="clearfix"></div>
	</div>
	<div id="more-testimonials">
		<a href="/investments/testimonials/" title="More Testimonials">More Testimonials</a>
	</div>
	<div class="clearfix"></div>
</div>