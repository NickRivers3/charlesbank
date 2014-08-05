<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('');?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen, print" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/navigation.css" type="text/css" media="screen, print" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/type.css" type="text/css" media="screen, print" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/theRiver.css" type="text/css" media="screen, print" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/sidebar.css" type="text/css" media="screen, print" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url'); ?>" />

	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if lte IE 8]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie-7.css">
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie-8.css">
	<![endif]-->
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-44584314-1', 'charlesbank.com');
		ga('send', 'pageview');
	</script>
	<?php wp_head();?>
	
</head>

<body <?php body_class(); ?>>
		<script>
			jQuery(document).ready(function($) {
				// Fade in Content
				$('#main-content').delay(500).fadeIn(500);
			});
		</script>
	<div id="site">
		<!-- #top-menu -->
		<nav id="top-menu">
			<?php
			// Checking if there is anything in the Top Menu
				if ( has_nav_menu( 'top-menu' ) ) {
				// if there is, add it now
					wp_nav_menu( array(
						'menu' => 'top-menu',
						'container' => 'ul',
						'container_class' => 'navigation',
						'theme_location' => 'top-menu',
					));
				}
			?>
		</nav>
		<div id="site-container">
			<!-- #site-wrapper -->
			<div id="site-wrapper" class="container">
				<header class="container">
					<div id="header-branding" class="container">
						<!-- Branding -->
						<div id="header-upper" class="container">
							<div id="branding">
								<div id="logo" class="grids right">
									<a href="<?php bloginfo('url');?>" title="<?php bloginfo('title');?>">
										<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="charlesbank"/>
									</a>
								</div>
							</div>
							<nav id="middle-menu">
								<?php
								// Checking if there is anything in the Top Menu
									if ( has_nav_menu( 'middle-menu' ) ) {
									// if there is, add it now
										wp_nav_menu( array(
											'menu' => 'middle-menu',
											'container' => 'ul',
											'container_class' => 'navigation',
											'theme_location' => 'middle-menu',
										));
									}
								?>
							</nav>
						</div>
						<!-- Nav -->
						<nav id="main-menu" class="container">
							<?php
								// Checking if there is anything in the Top Menu
								if ( has_nav_menu( 'main-menu' ) ) {
									// if there is, add it now
									wp_nav_menu( array(
										'menu' => 'main-menu',
										'container' => 'ul',
										'container_class' => 'navigation',
										'theme_location' => 'main-menu',
									));
								}
							?>
						</nav>

					</div>
				</header>