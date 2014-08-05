<?php
/* Testimonial Gallery */
?>
<script>
jQuery.fn.cycle.updateActivePagerLink = function(pager, currSlideIndex) { 
	jQuery(pager).find('li').removeClass('activeItem').addClass('inactiveItem').filter('li:eq('+currSlideIndex+')').removeClass('inactiveItem').addClass('activeItem');
	jQuery('.inactiveItem').find('img').attr('src','<?php bloginfo('template_url'); ?>/images/buttons/test-select-off.jpg');
	jQuery('.activeItem').find('img').attr('src','<?php bloginfo('template_url'); ?>/images/buttons/test-select-on.jpg');
}; 
jQuery(document).ready(function($) {
	$('#gallery').cycle({
		speed: 800,
		timeout: '6500',
		pause: 'true',
		slideExpr: '.testimonial-gallery-item',
		pager: '#testimonial-switcher',
		pagerAnchorBuilder: function(idx, slide) { 
			return '#testimonial-switcher li:eq(' + idx + ') a';
		}
	});
});
</script>

<div id="testimonial-gallery" class="grids">
	<div id="testimonial-switcher">
		<ul>
			<li><a href="#"><img/></a></li>
			<li><a href="#"><img/></a></li>
			<li><a href="#"><img/></a></li>
		</ul>
	</div>
	<div id="gallery" class="gallery-wrapper">
		<?php 
			$testimonial_query = new WP_Query( array(
				'post_type' => array('testimonials'),
				'order' => 'ASC',
				'tag' => 'gallery'
			));
		?>
		<?php while ($testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
			<section class="testimonial-gallery-item grids">
				<div class="testimonial-gallery-item-wrapper">
					<img class="testimonial-gallery-image" src="<?php the_field('gallery_image'); ?>" alt="<?php the_title();?>" title="<?php the_title();?>"/>
					<div class="testimonial-gallery-content-wrapper">
						<div class="testimonial-gallery-quote"><?php the_field('quote'); ?></div>
						<div class="testimonial-gallery-info">
							<h5 class="testimonial-title">- <?php the_title();?>,</h5>
							<span class="testimonial-credentials"> <?php the_field('title'); ?>,</span>
							<?php 
								if (has_sub_field('credentials')) { ?>
									<span class="testimonials-company"> <?php the_field('company'); ?></span>
									<span class="testimonial-credentials"> <?php the_field('credentials'); ?></span>
							<?php } 
								else { ?>
									<span class="testimonials-company"> <?php the_field('company'); ?></span>
							<?php }	?>
							
						</div>
					</div>
				</div>
			</section>
		<?php endwhile; ?>
	</div>
	<div class="clearfix"></div>
</div>