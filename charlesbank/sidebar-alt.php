<?php
/* Sidebar Alternate.php */
?>
	<aside class="sidebar-container">
			<?php 
				if (is_page('news') || is_singular('news') || is_page('recent-releases') || is_archive('news')) {?>
					<div id="media-sidebar" class="sidebar-wrapper shadow">
						<div class="sidebar-inner">
							<h3 id="sidebar-alt-header">Media Inquiries</h3>
							<ul>
								<?php dynamic_sidebar('right-column-news-sidebar');?>
							</ul>
							
						</div>
					</div>
				<?php }
				elseif (is_page('strategy') || '208' == $post->post_parent) { ?>
					<div id="testimonials-sidebar" class="sidebar-wrapper shadow">
						<?php get_template_part('testimonial-mini-gallery'); ?>
					</div>
				<?php }
				else {
					dynamic_sidebar('right-column-sidebar');
				}
			?>
		<div class="clearfix"></div>
	</aside>