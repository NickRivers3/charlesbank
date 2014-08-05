<?php
/* Single Portfolio.php */
?>

<?php get_header(); ?>
<div id="main-content" class="main-content">
	<div id="left-column" class="sidebar two-hundred grids">
		<?php get_sidebar(); ?>
	</div>
	<div id="sub-content" class="seven-forty grids">
		<div id="page-content" class="content">
			<div class="content-wrapper">
				<h1 class="page-title">Portfolio</h1>
				<article id="portfolio-article" class="page-content">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<section>
							<div class="portfolio-top">
								<div class="portfolio-image thumb shadow">
									<?php the_post_thumbnail();?>
								</div>
								<div class="portfolio-details">
									<h1 class="entry-title"><?php the_title();?></h1>
									<div class="portfolio-details-item">
										<h5 class="portfolio-section">Industry:</h5>
										<span><?php the_field('industry'); ?></span>
									</div>
									<div class="portfolio-details-item">
										<h5 class="portfolio-section">Headquarters:</h5>
										<span><?php the_field('headquarters'); ?></span>
									</div>
									<div class="portfolio-details-item">
										<h5 class="portfolio-section">Status:</h5>
										<span><?php the_field('status'); ?></span>
									</div>
									<div class="portfolio-details-item last">
										<a class="website" href="<?php the_field('website'); ?>" target="_blank"><?php the_field('website');?></a>
									</div>
								</div>
							</div>
							<div class="portfolio-bottom">
							
								<div class="portfolio-info-item">
									<h4 class="portfolio-section">Business:</h5>
									<div class="entry-content"><?php the_content(); ?></div>
								</div>
								
								<?php 
									if (get_field('sub_description') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section">Description:</h5>
											<div class="entry-content"><p><?php the_field('sub_description'); ?></p></div>
										</div>
								<?php }
									if (get_field('charlesbank_investment') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section">Charlesbank Investment:</h5>
											<div class="entry-content"><p><?php the_field('charlesbank_investment'); ?></p></div>
										</div>
								<?php }
									if (get_field('ceo') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section inline">CEO:</h5>
											<span><?php the_field('ceo'); ?></span>
										</div>
								<?php }
									if (get_field('president_coo') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section inline">President and COO:</h5>
											<span><?php the_field('president_coo'); ?></span>
										</div>
								<?php }
									if (get_field('president_and_ceo') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section inline">President and CEO:</h5>
											<span><?php the_field('president_and_ceo'); ?></span>
										</div>
								<?php }
									if (get_field('employees') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section inline">Employees:</h5>
											<span><?php the_field('employees'); ?></span>
										</div>
								<?php }
									if (get_field('locations') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section inline">Locations:</h5>
											<span><?php the_field('locations'); ?></span>
										</div>
								<?php }
									if (get_field('charlesbank_team') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section inline">Charlesbank Team:</h5>
											<?php $post_objects = get_field('charlesbank_team');
												if( $post_objects ): 
												
													$counter = 0;
													$lenght = count($post_objects);
													
													foreach( $post_objects as $post_object): 
													
														if ($counter == $lenght - 1 ) { ?>
															<a class="charlesbank-team" href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a>
														<?php }
														else { ?>
															<a class="charlesbank-team" href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?>, </a>
														<?php }
														$counter++;
													endforeach; 
												endif; 
											?>
										</div>
								<?php }
									if (get_field('premiums') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section inline">Premiums:</h5>
											<span><?php the_field('premiums'); ?></span>
										</div>
								<?php }
									if (get_field('managed_assets') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section inline">Managed Assets:</h5>
											<span><?php the_field('managed_assets'); ?></span>
										</div>
								<?php }
									if (get_field('total_assets') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section inline">Total Assets:</h5>
											<span><?php the_field('total_assets'); ?></span>
										</div>
								<?php }
									if (get_field('total_assets') !='') { ?>
										<div class="portfolio-info-item">
											<h4 class="portfolio-section inline">Book Value:</h5>
											<span><?php the_field('book_value'); ?></span>
										</div>
								<?php }
									else {}
								?>
							</div>
						</section>
						<div class="entry-meta">
								<?php edit_post_link( __( 'Edit Content', 'charlesbank'), '<span class="edit-link">', '</span>' ); ?>
							</div>
							<ul id="portfolio-nav" class="next-back menu">
								<li id="previous"><?php previous_post_link('%link', 'Previous', FALSE);?></li>
								<li id="next"><?php next_post_link('%link', 'Next', FALSE); ?> </li>
							</ul>
					<?php endwhile; ?>
				</article>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
