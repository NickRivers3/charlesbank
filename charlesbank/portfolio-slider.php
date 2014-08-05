<?php
/* Portfolio Slider */
?>
<script>
jQuery(document).ready(function($) {
	
	var count = $('.portfolio-item').length;
	var totalItemHeight = 103;
	var totalGroupHeight = count * totalItemHeight; //Total height of all the Divs + margins in pixels
	var numRows = Math.ceil(count / 3);
		
	if (count > 6)
	{
		$('#portfolio-gallery').css('margin-bottom', '100px');
	}
	
	if (count > 11)
	{
		$('#portfolio-gallery').css('margin-bottom', '185px');
	}

	$('.portfolio-item a').mouseenter(function() {
		var theTop = $(this).offset().top - 298;
		var linkClass = $(this).attr('class');
		var companySlide = $('#portfolio-slider .company-slide').hide();
		
		$('#portfolio-slider').fadeIn(400);
		$('#portfolio-slider .company-slide#'+linkClass).show();
		$('#portfolio-slider').animate({top: theTop}, 110);
	});
	
	
	
	
});

</script>


<div id="portfolio-slider">
	<div class="wrapper">
		<?php 
			if (is_page('current')) {
				$portfolio_current_query = new WP_Query( array(
					'post_type' => array('portfolio'),
					'category_name' => 'active',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
				));
				while ($portfolio_current_query->have_posts() ) : $portfolio_current_query->the_post(); ?>
				
				<section id="<?php the_ID() ?>" class="company-slide">
					<h2 class="slider-title"><?php the_title() ?></h2>
					<div class="slider-sub-description">
						<span><?php the_field('sub_description'); ?></span>
					</div>
					<div class="slider-industry">
						<h5 class="label">Industry:</h5>
						<span><?php the_field('industry'); ?></span>
					</div>
					<div class="slider-headquarters">
						<h5 class="label">Headquarters:</h5>
						<span><?php the_field('headquarters'); ?></span>
					</div>
					<div class="slider-status">
						<h5 class="label">Status:</h5>
						<span><?php the_field('status'); ?></span>
					</div>
				</section>
			<?php endwhile; 
			} 
			elseif (is_page('communications')) {
				$portfolio_communications_query = new WP_Query( array(
					'post_type' => array('portfolio'),
					'tag' => 'communications',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
				));
				while ($portfolio_communications_query->have_posts() ) : $portfolio_communications_query->the_post(); ?>
				
				<section id="<?php the_ID() ?>" class="company-slide">
					<h2 class="slider-title"><?php the_title() ?></h2>
					<div class="slider-sub-description">
						<span><?php the_field('sub_description'); ?></span>
					</div>
					<div class="slider-industry">
						<h5 class="label">Industry:</h5>
						<span><?php the_field('industry'); ?></span>
					</div>
					<div class="slider-headquarters">
						<h5 class="label">Headquarters:</h5>
						<span><?php the_field('headquarters'); ?></span>
					</div>
					<div class="slider-status">
						<h5 class="label">Status:</h5>
						<span><?php the_field('status'); ?></span>
					</div>
				</section>
			<?php endwhile; 
			}
			elseif (is_page('consumer')) {
				$portfolio_consumer_query = new WP_Query( array(
					'post_type' => array('portfolio'),
					'tag' => 'consumer',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
				));
				while ($portfolio_consumer_query->have_posts() ) : $portfolio_consumer_query->the_post(); ?>
				
				<section id="<?php the_ID() ?>" class="company-slide">
					<h2 class="slider-title"><?php the_title() ?></h2>
					<div class="slider-sub-description">
						<span><?php the_field('sub_description'); ?></span>
					</div>
					<div class="slider-industry">
						<h5 class="label">Industry:</h5>
						<span><?php the_field('industry'); ?></span>
					</div>
					<div class="slider-headquarters">
						<h5 class="label">Headquarters:</h5>
						<span><?php the_field('headquarters'); ?></span>
					</div>
					<div class="slider-status">
						<h5 class="label">Status:</h5>
						<span><?php the_field('status'); ?></span>
					</div>
				</section>
			<?php endwhile; 
			}
			elseif (is_page('education')) {
				$portfolio_education_query = new WP_Query( array(
					'post_type' => array('portfolio'),
					'tag' => 'education',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
				));
				while ($portfolio_education_query->have_posts() ) : $portfolio_education_query->the_post(); ?>
				
				<section id="<?php the_ID() ?>" class="company-slide">
					<h2 class="slider-title"><?php the_title() ?></h2>
					<div class="slider-sub-description">
						<span><?php the_field('sub_description'); ?></span>
					</div>
					<div class="slider-industry">
						<h5 class="label">Industry:</h5>
						<span><?php the_field('industry'); ?></span>
					</div>
					<div class="slider-headquarters">
						<h5 class="label">Headquarters:</h5>
						<span><?php the_field('headquarters'); ?></span>
					</div>
					<div class="slider-status">
						<h5 class="label">Status:</h5>
						<span><?php the_field('status'); ?></span>
					</div>
				</section>
			<?php endwhile; 
			}
			elseif (is_page('energy')) {
				$portfolio_energy_query = new WP_Query( array(
					'post_type' => array('portfolio'),
					'tag' => 'energy',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
				));
				while ($portfolio_energy_query->have_posts() ) : $portfolio_energy_query->the_post(); ?>
				
				<section id="<?php the_ID() ?>" class="company-slide">
					<h2 class="slider-title"><?php the_title() ?></h2>
					<div class="slider-sub-description">
						<span><?php the_field('sub_description'); ?></span>
					</div>
					<div class="slider-industry">
						<h5 class="label">Industry:</h5>
						<span><?php the_field('industry'); ?></span>
					</div>
					<div class="slider-headquarters">
						<h5 class="label">Headquarters:</h5>
						<span><?php the_field('headquarters'); ?></span>
					</div>
					<div class="slider-status">
						<h5 class="label">Status:</h5>
						<span><?php the_field('status'); ?></span>
					</div>
				</section>
			<?php endwhile; 
			}
			elseif (is_page('financial-services')) {
				$portfolio_financial_services_query = new WP_Query( array(
					'post_type' => array('portfolio'),
					'tag' => 'financial-services',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
				));
				while ($portfolio_financial_services_query->have_posts() ) : $portfolio_financial_services_query->the_post(); ?>
				
				<section id="<?php the_ID() ?>" class="company-slide">
					<h2 class="slider-title"><?php the_title() ?></h2>
					<div class="slider-sub-description">
						<span><?php the_field('sub_description'); ?></span>
					</div>
					<div class="slider-industry">
						<h5 class="label">Industry:</h5>
						<span><?php the_field('industry'); ?></span>
					</div>
					<div class="slider-headquarters">
						<h5 class="label">Headquarters:</h5>
						<span><?php the_field('headquarters'); ?></span>
					</div>
					<div class="slider-status">
						<h5 class="label">Status:</h5>
						<span><?php the_field('status'); ?></span>
					</div>
				</section>
			<?php endwhile; 
			}
			elseif (is_page('healthcare')) {
				$portfolio_healthcare_query = new WP_Query( array(
					'post_type' => array('portfolio'),
					'tag' => 'healthcare',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
				));
				while ($portfolio_healthcare_query->have_posts() ) : $portfolio_healthcare_query->the_post(); ?>
				
				<section id="<?php the_ID() ?>" class="company-slide">
					<h2 class="slider-title"><?php the_title() ?></h2>
					<div class="slider-sub-description">
						<span><?php the_field('sub_description'); ?></span>
					</div>
					<div class="slider-industry">
						<h5 class="label">Industry:</h5>
						<span><?php the_field('industry'); ?></span>
					</div>
					<div class="slider-headquarters">
						<h5 class="label">Headquarters:</h5>
						<span><?php the_field('headquarters'); ?></span>
					</div>
					<div class="slider-status">
						<h5 class="label">Status:</h5>
						<span><?php the_field('status'); ?></span>
					</div>
				</section>
			<?php endwhile; 
			}
			elseif (is_page('healthcare')) {
				$portfolio_healthcare_query = new WP_Query( array(
					'post_type' => array('portfolio'),
					'tag' => 'healthcare',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
				));
				while ($portfolio_healthcare_query->have_posts() ) : $portfolio_healthcare_query->the_post(); ?>
				
				<section id="<?php the_ID() ?>" class="company-slide">
					<h2 class="slider-title"><?php the_title() ?></h2>
					<div class="slider-sub-description">
						<span><?php the_field('sub_description'); ?></span>
					</div>
					<div class="slider-industry">
						<h5 class="label">Industry:</h5>
						<span><?php the_field('industry'); ?></span>
					</div>
					<div class="slider-headquarters">
						<h5 class="label">Headquarters:</h5>
						<span><?php the_field('headquarters'); ?></span>
					</div>
					<div class="slider-status">
						<h5 class="label">Status:</h5>
						<span><?php the_field('status'); ?></span>
					</div>
				</section>
			<?php endwhile; 
			}
			elseif (is_page('industrial')) {
				$portfolio_industrial_query = new WP_Query( array(
					'post_type' => array('portfolio'),
					'tag' => 'industrial',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
				));
				while ($portfolio_industrial_query->have_posts() ) : $portfolio_industrial_query->the_post(); ?>
				
				<section id="<?php the_ID() ?>" class="company-slide">
					<h2 class="slider-title"><?php the_title() ?></h2>
					<div class="slider-sub-description">
						<span><?php the_field('sub_description'); ?></span>
					</div>
					<div class="slider-industry">
						<h5 class="label">Industry:</h5>
						<span><?php the_field('industry'); ?></span>
					</div>
					<div class="slider-headquarters">
						<h5 class="label">Headquarters:</h5>
						<span><?php the_field('headquarters'); ?></span>
					</div>
					<div class="slider-status">
						<h5 class="label">Status:</h5>
						<span><?php the_field('status'); ?></span>
					</div>
				</section>
			<?php endwhile; 
			}
			elseif (is_page('alphabetical') || is_post_type_archive('portfolio') ) {
				$portfolio_alphabetical_query = new WP_Query( array(
					'post_type' => array('portfolio'),
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
				));
				while ($portfolio_alphabetical_query->have_posts() ) : $portfolio_alphabetical_query->the_post(); ?>
				
				<section id="<?php the_ID() ?>" class="company-slide">
					<h2 class="slider-title"><?php the_title() ?></h2>
					<div class="slider-sub-description">
						<span><?php the_field('sub_description'); ?></span>
					</div>
					<div class="slider-industry">
						<h5 class="label">Industry:</h5>
						<span><?php the_field('industry'); ?></span>
					</div>
					<div class="slider-headquarters">
						<h5 class="label">Headquarters:</h5>
						<span><?php the_field('headquarters'); ?></span>
					</div>
					<div class="slider-status">
						<h5 class="label">Status:</h5>
						<span><?php the_field('status'); ?></span>
					</div>
				</section>
			<?php endwhile; 
			}
			else {} 
		?>
	</div>
</div>