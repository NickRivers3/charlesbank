<?php
/* Portfolio Mini Gallery */
?>
<script>
jQuery.fn.cycle.updateActivePagerLink = function(pager, currSlideIndex) { 
	jQuery(pager).find('li').removeClass('activeItem').addClass('inactiveItem').filter('li:eq('+currSlideIndex+')').removeClass('inactiveItem').addClass('activeItem');
	jQuery('.inactiveItem').find('img').attr('src','<?php bloginfo('template_url'); ?>/images/buttons/test-select-off.jpg');
	jQuery('.activeItem').find('img').attr('src','<?php bloginfo('template_url'); ?>/images/buttons/test-select-on.jpg');
}; 
jQuery(document).ready(function($) {
	$('#case-studies-mini-gallery').cycle({
		speed: 600,
		timeout: '6500',
		pause: 'true',
		cleartypeNoBg: 'false',
		containerResize:0,
		slideExpr: '.mini-item',
		pager: '#case-studies-switcher',
		pagerAnchorBuilder: function(idx, slide) { 
			return '#case-studies-switcher li:eq(' + idx + ') a';
		}
	});
	$('#testimonials-mini-gallery').cycle({
		speed: 800,
		timeout: '6500',
		pause: 'true',
		cleartypeNoBg: 'false',
		containerResize:0,
		slideExpr: '.mini-item',
		pager: '#testimonial-switcher',
		pagerAnchorBuilder: function(idx, slide) { 
			return '#testimonial-switcher li:eq(' + idx + ') a';
		}
	});
});
</script>
<div class="portfolio-mini-gallery">
	<div id="case-studies-container">
		<div id="case-studies-switcher">
			<ul>
				<li><a href="#"><img/></a></li>
				<li><a href="#"><img/></a></li>
				<li><a href="#"><img/></a></li>
				<li><a href="#"><img/></a></li>
				<li><a href="#"><img/></a></li>
			</ul>
		</div>
		<div id="case-studies-mini-gallery" class="wrapper">
			<?php 
				$casestudies_query = new WP_Query( array(
					'post_type' => array('casestudies'),
					'order' => 'ASC'
				));
				$caseNumber = 0;
				while ($casestudies_query->have_posts() ) : $casestudies_query->the_post(); 
			?>
			<section id="item-<?php echo $caseNumber++; ?>" class="mini-item grids">
				<div class="mini-item-wrapper">
					<div class="mini-gallery-content-wrapper">
						<a class="mini-gallery-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
							<img class="mini-gallery-image" src="<?php the_field('gallery_image'); ?>" alt="<?php the_title();?>" title="<?php the_title();?>"/>
						</a>
						<a class="mini-gallery-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
							<h5 class="min-gallery-title"><?php the_title();?></h5>
						</a>
					</div>
				</div>
				<div class="clearfix"></div>
			</section>
			<?php endwhile; wp_reset_query();?>
			<div class="clearfix"></div>
		</div>
	</div>
	<div id="testimonials-container">	
		<div id="testimonial-switcher">
			<ul>
				<li><a href="#"><img/></a></li>
				<li><a href="#"><img/></a></li>
				<li><a href="#"><img/></a></li>
			</ul>
		</div>
		<div id="testimonials-mini-gallery" class="wrapper">
			<?php 
				$testimonials_query = new WP_Query( array(
					'post_type' => array('testimonials'),
					'order' => 'ASC',
					'tag' => 'gallery'
				));
				$testNumber = 0;
				while ($testimonials_query->have_posts() ) : $testimonials_query->the_post(); 
			?>
			<section id="item-<?php echo $testNumber++; ?>" class="mini-item grids">
				<div class="mini-item-wrapper">
					<div class="mini-gallery-content-wrapper">
						<a class="mini-gallery-link" href="/investments/testimonials" title="Testimonials">
							<img class="mini-gallery-image" src="<?php the_field('gallery_image'); ?>" alt="<?php the_title();?>" title="<?php the_title();?>"/>
						</a>
						<a class="mini-gallery-link" href="/investments/testimonials" title="Testimonials">
							<h5 class="min-gallery-title"><?php the_title();?>, <?php the_field('company');?></h5>
						</a>
					</div>
				</div>
				<div class="clearfix"></div>
			</section>
			<?php endwhile; wp_reset_query();?>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="clearfix"></div>
</div>