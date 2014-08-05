<?php
/* Sidebar.php */
?>


	<aside class="sidebar-container">
			<?php 
				if (is_page('news') || is_singular('news') || is_page('recent-releases') || is_post_type_archive('news')) {?>
					<div id="news-sidebar" class="sidebar-wrapper shadow">
						<h2 id="sidebar-header">News</h2>
						<ul>
							<?php dynamic_sidebar('left-column-news-sidebar');?>
						</ul>
					</div>
				<?php }
				elseif (is_page('people') || is_page('investment-team') || is_singular('investment') || is_singular('operations')) { ?>
					<div id="team-sidebar" class="sidebar-wrapper shadow">
						<h2 id="sidebar-header">People</h2>
						<ul>
							<?php dynamic_sidebar('left-column-investment-team-sidebar'); ?>
						</ul>
					</div>
				<?php }
				elseif (is_page('operations-team') || is_singular('operations-team')) { ?>
					<div id="team-sidebar" class="sidebar-wrapper shadow">
						<h2 id="sidebar-header">People</h2>
						<ul>
							<?php dynamic_sidebar('left-column-operations-team-sidebar'); ?>
						</ul>
					</div>
				<?php }
				elseif (is_page('strategy') || is_page('investment-philosophy') || is_page('investment-criteria') || is_page('partnering-with-management') || is_page('value-creation')) { ?>
					<div id="strategy-sidebar" class="sidebar-wrapper shadow">
						<h2 id="sidebar-header">Strategy</h2>
						<ul>
							<?php dynamic_sidebar('left-column-strategy-sidebar'); ?>
						</ul>
					</div>
				<?php }
				elseif (is_page('portfolio') || is_singular('portfolio')) { ?>
					<div id="portfolio-sidebar" class="sidebar-wrapper shadow">
						<h2 id="sidebar-header">Investments</h2>
						<ul>
							<?php dynamic_sidebar('left-column-portfolio-sidebar'); ?>
						</ul>
					</div>
				<?php }
				elseif (is_page('testimonials')) { ?>
					<div id="testimonials-sidebar" class="sidebar-wrapper shadow">
						<h2 id="sidebar-header">Investments</h2>
						<ul>
							<?php dynamic_sidebar('left-column-testimonials-sidebar'); ?>
						</ul>
					</div>
				<?php }
				elseif (is_page('case-studies') || is_singular('casestudies')) { ?>
					<div id="case-studies-sidebar" class="sidebar-wrapper shadow">
						<h2 id="sidebar-header">Investments</h2>
						<ul>
							<?php dynamic_sidebar('left-column-case-studies-sidebar'); ?>
						</ul>
					</div>
				<?php }
				elseif (is_page('portfolio') || is_singular('portfolios') || is_page('current') || is_page('communications') || is_page('consumer') || is_page('education') || is_page('energy') || is_page('financial-services') || is_page('healthcare') || is_page('industrial') || is_page('alphabetical') || is_post_type_archive('portfolio')) { ?>
					<div id="case-studies-sidebar" class="sidebar-wrapper shadow">
						<h2 id="sidebar-header">Investments</h2>
						<ul>
							<?php dynamic_sidebar('left-column-portfolio-sidebar'); ?>
						</ul>
					</div>
				<?php }
				else {
					dynamic_sidebar('left-column-sidebar');
				}
			?>
		<div class="clearfix"></div>
	</aside>