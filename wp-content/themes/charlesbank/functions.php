<?php

	// textdomain support for localization support
	// language files in the /lang folder
	load_theme_textdomain('charlesbank', TEMPLATEPATH . '/lang' );
	
	// load jQuery
	function load_scripts() {
		// Register the script like this for a theme:  
		wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ) );
		wp_register_script( 'jquery.cycle.all', 'http://malsup.github.io/jquery.cycle.all.js', array( 'jquery' ) );
	  	  
		// For either a plugin or a theme, you can then enqueue the script:  
		wp_enqueue_script( 'custom' );  
		wp_enqueue_script( 'jquery.cycle.all' );  
	}  
	add_action( 'wp_enqueue_scripts', 'load_scripts' );  
	
	// charlesbank content width
	if (! isset( $content_width ) )
		$content_width = 680;
	
	// theme support for thumbnails
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 160, 160 );
	}
	// theme support for custom background
	// Adding theme support for custome backgrounds
	add_theme_support( 'custom-background' );
	
	// Telling wodpress to use editor-style.css for the visual editor
    function admin_head_styles() {
        echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/editor-style.css" />';
    }
    add_action('admin_head', 'admin_head_styles');
	
	// Adding feed links to header
	add_theme_support('automatic-feed-links');
	
	// Custome Header
	// --------------------------------------------------------------------------------------------
	// Adding theme support for custom headers
	$header_args = array(
		'flex-width'	=> true,
		'flext-height'	=> true,
		'default-image' => get_template_directory_uri() . '/images/header.jpg',
		'uploads'		=> true,
	);
	add_theme_support( 'custom-header', $header_args );
	
	// Remove header text and null the text color
	define( 'NO_HEADER_TEXT', true);
	define( 'HEADER_TEXTCOLOR', '');
	
	// gets included in the site header
	function header_style() {
    ?><style type="text/css">
        #header {
            background: url(<?php header_image(); ?>);
        }
    </style><?php
	}
	// gets included in the admin header
	function admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            background: no-repeat;
        }
    </style><?php
	}
	
	// Theme support for Custom Headers
	add_theme_support('custom-header'. $args);
	
	// theme support for post-thumbnails
	set_post_thumbnail_size (HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
	
	// Give attachments Categories
	function reg_tax() {
   		register_taxonomy_for_object_type('category', 'attachment');
   		add_post_type_support('attachment', 'category');
	}
	add_action('admin_init', 'reg_tax');
	
	// Excerpt Trim funciton. Controll amout of trim and allow html elements
	function custom_wp_trim_excerpt($text) {
		$raw_excerpt = $text;
		if ( '' == $text ) {
			$text = get_the_content('');
			$text = strip_shortcodes( $text );
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
			
			/***Add the allowed HTML tags separated by a comma.***/
			$allowed_tags = '<a>,<em>,<strong>';  
			$text = strip_tags($text, $allowed_tags);
			
			/***Change the excerpt word count.***/
			$excerpt_word_count = 40; 
			$excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
			
			/*** Change the excerpt ending.***/
			$excerpt_end = '... <a class="readmore" href="'. get_permalink($post->ID) . '">' . 'Read More' . '</a>'; 
			$excerpt_more = apply_filters('excerpt_more', '' . $excerpt_end);
			$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
			if ( count($words) > $excerpt_length ) {
				array_pop($words);
				$text = implode(' ', $words);
				$text = $text . $excerpt_more;
			} else {
				$text = implode(' ', $words);
			}
		}
		return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
	}
	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');
	
	// Functions to add Classes to the Body
	function charlesbank_add_body_class($classes) {
		// You can modify this check so it will run on every post type
		if (is_page()) {
			global $post;
			// If we *do* have an ancestors list, process it
			// http://codex.wordpress.org/Function_Reference/get_post_ancestors
			if ($parents = get_post_ancestors($post->ID)) {
				foreach ((array)$parents as $parent) {
					// As the array contains IDs only, we need to get each page
					if ($page = get_page($parent)) {
						// Add the current ancestor to the body class array
						$classes[] = "{$page->post_type}-{$page->post_name}";
					}
				}
			}

			// Add the current page to our body class array
			$classes[] = "{$post->post_type}-{$post->post_name}";
		}
		elseif (is_singular('portfolio')) {
			$tag = array_values(get_the_tags($post->ID));
			$slug = $tag[0]->slug;
			$classes[] = 'post-tag-' . $slug;
			
		}
		else {}
		return $classes;
	}
	
	// Add a filter for WP
	add_filter('body_class', 'charlesbank_add_body_class');
	
	// Add Sidebar Names to Body Class
	add_action('wp_head', create_function("",'ob_start();') );
	add_action('get_sidebar', 'my_sidebar_class');
	add_action('wp_footer', 'my_sidebar_class_replace');
	
	function my_sidebar_class($name=''){
		static $class="sidebar";
		if(!empty($name))$class.=" sidebar-{$name}";
			my_sidebar_class_replace($class);
	}	
	function my_sidebar_class_replace($c=''){
		static $class='';
		if(!empty($c)) $class=$c;
		else {
			echo str_replace('<body class="','<body class="'.$class.' ',ob_get_clean());
			ob_start();
		}
	}
	
	
	// Add Archive Year to Body Class
	function archive_year_body_class( $classes ) {
		if (is_singular('news')) {
			$archive_year = get_the_time('Y'); 
			$classes[] = 'archive-' . $archive_year;
		}
		else {
			$classes[] = '';
		}
		return $classes;
	}
	add_filter( 'body_class', 'archive_year_body_class');
	
	// Add Post Slug to Menu
	function add_slug_class_to_menu_item($output){
		$ps = get_option('permalink_structure');
		if(!empty($ps)) {
			if (is_singular('news')) {
				$idstr = preg_match_all('/<li id="menu-item-(\d+)/', $output, $matches);
				foreach($matches[1] as $mid){
					$id = get_post_meta($mid, '_menu_item_object_id', true);
					$slug = basename(get_permalink($id));
					$output = preg_replace('/menu-item-'.$mid.'">/', 'menu-item-'.$mid.' archive-'.$slug.'">', $output, 1);
				}
			}
			else {
				$idstr = preg_match_all('/<li id="menu-item-(\d+)/', $output, $matches);
				foreach($matches[1] as $mid){
					$id = get_post_meta($mid, '_menu_item_object_id', true);
					$slug = basename(get_permalink($id));
					$output = preg_replace('/menu-item-'.$mid.'">/', 'menu-item-'.$mid.' '.$slug.'">', $output, 1);
				}
			}
		}
		return $output;
	}
	add_filter('wp_nav_menu', 'add_slug_class_to_menu_item');
	
	// Slug Filter
	function the_slug($echo=true){
		$slug = basename(get_permalink());
		do_action('before_slug', $slug);
		$slug = apply_filters('slug_filter', $slug);
		if( $echo ) echo $slug;
		do_action('after_slug', $slug);
		return $slug;
	}
	
	// News Rewrite
	function news_rewrite() {
		//global $wp_rewrite;
		add_permastruct('news', 'news/archive/%year%/%postname%/', true, 1);
		add_rewrite_rule('news/archive/([0-9]{4})/(.+)/?$', 'index.php?news=$matches[2]', 'top');
		add_rewrite_rule('^news/archive/([0-9]{4})/?','index.php?post_type=news&year=$matches[1]','top');
	}
	add_action('init', 'news_rewrite');
	
	// Back and Next links for Sibling Pages
	function siblings($link) {
		global $post;
		$siblings_args = array (
			'child_of' => $post->post_parent,
			'parent' => $post->post_parent,
			'sort_column' => menu_order
		);	
		$siblings = get_pages($siblings_args);
		foreach ($siblings as $key=>$sibling){
			if ($post->ID == $sibling->ID){
				$ID = $key;
			}
		}
		$number = count($siblings);
		$previous_url = ($ID == 0) ? '' : get_permalink($siblings[$ID-1]->ID);
		$next_url = ($ID == $number-1) ? '' : get_permalink($siblings[$ID+1]->ID);
		$closest = array('previous'=>$previous_url,'next'=>$next_url,'current'=>$ID+1,'total'=>$number);
		if ($link == 'previous' || $link == 'next') { echo $closest[$link]; } else { return $closest; }
	}
	
	// Back and Next titles for Sibling Pages
	function siblings_title($link) {
		global $post;
		$siblings_title_args = array (
			'child_of' => $post->post_parent,
			'parent' => $post->post_parent,
			'sort_column' => menu_order
		);	
		$siblings_title = get_pages($siblings_title_args);
		foreach ($siblings_title as $key=>$sibling_title){
			if ($post->ID == $sibling_title->ID){
				$ID = $key;
			}
		}
		$closest = array('previous_title'=>get_the_title($siblings_title[$ID-1]->ID),'next_title'=>get_the_title($siblings_title[$ID+1]->ID));

		if ($link == 'previous_title' || $link == 'next_title') { echo $closest[$link]; } else { return $closest; }
	}
	
	// Custom Post Types
	// -------------
	function codex_custom_init() {
		// News
		$news_label = array(
			'name' => 'News',
			'singular_name' => 'News',
			'add_new' => 'Add News',
			'add_new_item' => 'Add New News',
			'edit_item' => 'Edit News',
			'new_item' => 'New News',
			'all_items' => 'All News',
			'view_item' => 'View News',
			'search_items' => 'Search News',
			'not_found' => 'No News found',
			'not_found_in_trash' => 'No News found in Trash',
			'parent_item_colon' => '',
			'menu_name' => 'News'
		);
		$news_args = array (
			'labels' => $news_label,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'news/archive'),
			'capability_type' => 'post',
			'has_archive' => true,
			'with_front' => false,
			'hierarchical' => true,
			'menu_position' => null,
			'supports' => array('title', 'editor', 'thumbnail', 'attachments', 'page-attributes'),
			'taxonomies' => array('post_tag')
		);
		// Operations Team Member
		$operations_label = array(
			'name' => 'Operations',
			'singular_name' => 'Operations Team',
			'add_new' => 'Add Operations Team Member',
			'add_new_item' => 'Add New Operations Team Member',
			'edit_item' => 'Edit Operations Team Member',
			'new_item' => 'New Operations Team Members',
			'all_items' => 'All Operations Team',
			'view_item' => 'View Operations Team',
			'search_items' => 'Search Operations Team',
			'not_found' => 'No People Operations Team Members Found',
			'not_found_in_trash' => 'No Operations Team Members found in Trash',
			'parent_item_colon' => '',
			'menu_name' => 'Operations Team Member'
		);
		$operations_args = array (
			'labels' => $operations_label,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'people/operations','with_front' => true),
			'capability_type' => 'post',
			'has_archive' => false,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title', 'editor', 'thumbnail', 'attachments', 'page-attributes'),
		);		
		// Investment Team Member
		$investment_label = array(
			'name' => 'Investment',
			'singular_name' => 'Investment Team',
			'add_new' => 'Add Investment Team Member',
			'add_new_item' => 'Add New Investment Team Member',
			'edit_item' => 'Edit Investment Team Member',
			'new_item' => 'New Investment Team Members',
			'all_items' => 'All Investment Team Members',
			'view_item' => 'View Investment Team Member',
			'search_items' => 'Search Investment Team',
			'not_found' => 'No People Investment Team Members Found',
			'not_found_in_trash' => 'No Investment Team Members found in Trash',
			'parent_item_colon' => '',
			'menu_name' => 'Investment Team Member'
		);
		$investment_args = array (
			'labels' => $investment_label,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'people/investment','with_front' => true),
			'capability_type' => 'post',
			'has_archive' => false,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title', 'editor', 'thumbnail', 'attachments', 'page-attributes'),
		);
		// Portfolio
		$portfolio_label = array(
			'name' => 'Portfolio',
			'singular_name' => 'Portfolio',
			'add_new' => 'Add Portfolio',
			'add_new_item' => 'Add New Portfolio',
			'edit_item' => 'Edit Portfolio',
			'new_item' => 'New Portfolio',
			'all_items' => 'All Portfolio',
			'view_item' => 'View Portfolio',
			'search_items' => 'Search Portfolios',
			'not_found' => 'No Portfolio found',
			'not_found_in_trash' => 'No Portfolios found in Trash',
			'parent_item_colon' => '',
			'menu_name' => 'Portfolio'
		);
		$portfolio_args = array (
			'labels' => $portfolio_label,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'investments/portfolio/companies'),
			'capability_type' => 'post',
			'has_archive' => true,
			'with_front' => false,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title', 'editor', 'thumbnail', 'attachments'),
			'taxonomies' => array('post_tag', 'category')
		);
		// Case Studies
		$case_label = array(
			'name' => 'Case Studies',
			'singular_name' => 'Case Studies',
			'add_new' => 'Add Case Study',
			'add_new_item' => 'Add New Case Study',
			'edit_item' => 'Edit Case Study',
			'new_item' => 'New Case Study',
			'all_items' => 'All Case Studies',
			'view_item' => 'View Case Study',
			'search_items' => 'Search Case Studies',
			'not_found' => 'No Case Study found',
			'not_found_in_trash' => 'No Case Studies found in Trash',
			'parent_item_colon' => '',
			'menu_name' => 'Case Studies'
		);
		$case_args = array (
			'labels' => $case_label,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'investment/case-studies/companies'),
			'capability_type' => 'post',
			'has_archive' => false,
			'with_front' => false,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title', 'editor', 'thumbnail', 'attachments'),
			'taxonomies' => array('post_tag')
		);
		// Testimonials
		$testimonials_label = array(
			'name' => 'Testimonials',
			'singular_name' => 'Testimonial',
			'add_new' => 'Add Testimonial',
			'add_new_item' => 'Add New Testimonial',
			'edit_item' => 'Edit Testimonial',
			'new_item' => 'New Testimonial',
			'all_items' => 'All Testimonials',
			'view_item' => 'View Testimonial',
			'search_items' => 'Search Testimonials',
			'not_found' => 'No Testimonial found',
			'not_found_in_trash' => 'No Testimonials found in Trash',
			'parent_item_colon' => '',
			'menu_name' => 'Testimonials'
		);
		$testimonials_args = array (
			'labels' => $testimonials_label,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'testimonials' ),
			'capability_type' => 'post',
			'has_archive' => false,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title', 'editor', 'thumbnail', 'attachments'),
			'taxonomies' => array('post_tag')
		);
		
		register_post_type('news', $news_args);
		register_post_type('operations', $operations_args);
		register_post_type('investment', $investment_args);
		register_post_type('portfolio', $portfolio_args);
		register_post_type('case studies ', $case_args);
		register_post_type('testimonials', $testimonials_args);
	}
	
	add_action( 'init', 'codex_custom_init');
	
	
	// MENU AREA
	// -------------
	// register nav menus
	register_nav_menus ( array (
		'top-menu' => __('Main Menu', 'charlesbank'),
		'main-menu' => __('Top Menu', 'charlesbank'),
		'middle-menu' => __('Middle Menu', 'charlesbank'),
	));

	// WIDGET AREAS
	// -------------
	// Left Column Sidebar
	register_sidebar( array (
		'name' => __('Left Column Sidebar', 'charlesbank'), 
		'id' => 'left-column-sidebar',
		'description' => __('The left column widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	// Right Column Sidebar
	register_sidebar( array (
		'name' => __('Right Column Sidebar', 'charlesbank'), 
		'id' => 'right-column-sidebar',
		'description' => __('The right column widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	// Left Column Investment Team Sidebar
	register_sidebar( array (
		'name' => __('Left Column Investment Team Sidebar', 'charlesbank'), 
		'id' => 'left-column-investment-team-sidebar',
		'description' => __('The left column Investment Team widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	// Left Column Operations Team Sidebar
	register_sidebar( array (
		'name' => __('Left Column Operations Team Sidebar', 'charlesbank'), 
		'id' => 'left-column-operations-team-sidebar',
		'description' => __('The left column Operations Team widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	// Left Column Strategy Sidebar
	register_sidebar( array (
		'name' => __('Left Column Strategy Sidebar', 'charlesbank'), 
		'id' => 'left-column-strategy-sidebar',
		'description' => __('The left column Strategy widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	// Right Column Strategy Sidebar
	register_sidebar( array (
		'name' => __('Right Column Strategy Sidebar', 'charlesbank'), 
		'id' => 'right-column-strategy-sidebar',
		'description' => __('The right column Strategy widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	// Left Column Portfolio Sidebar
	register_sidebar( array (
		'name' => __('Left Column Portfolio Sidebar', 'charlesbank'), 
		'id' => 'left-column-portfolio-sidebar',
		'description' => __('The left column Portfolio widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	// Left Column Case Studies Sidebar
	register_sidebar( array (
		'name' => __('Left Column Case Studies Sidebar', 'charlesbank'), 
		'id' => 'left-column-case-studies-sidebar',
		'description' => __('The left column Case Studies widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	// Left Column Testimonials Sidebar
	register_sidebar( array (
		'name' => __('Left Column Testimonials Sidebar', 'charlesbank'), 
		'id' => 'left-column-testimonials-sidebar',
		'description' => __('The left column Testimonials widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	// Left Column News Sidebar
	register_sidebar( array (
		'name' => __('Left Column News Sidebar', 'charlesbank'), 
		'id' => 'left-column-news-sidebar',
		'description' => __('The left column News widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	// Right Column News Sidebar
	register_sidebar( array (
		'name' => __('Right Column News Sidebar', 'charlesbank'), 
		'id' => 'right-column-news-sidebar',
		'description' => __('The right column News widget area.', 'charlesbank'), 
		'before_widget' => '<li class="widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">', 
		'after_title' => '</h3>',
	));
	
	// Un-Used Functions
	
	// Add Custom Meta Boxes
	//function investment_custom_metabox(){
	//	if(function_exists('') && function_exists( 'add_meta_box')){
	//		add_meta_box( 'investmentCustomMetabox','Custom Field Metabox', 'investmentCustomMetabox', 'investment', 'normal', 'high' );
	//	}
	//	return;
	//}
	//function operations_custom_metabox(){
	//	if(function_exists('') && function_exists( 'add_meta_box')){
	//		add_meta_box( 'operationsCustomMetabox','Custom Field Metabox', 'operationsCustomMetabox', 'operations', 'normal', 'high' );
	//	}
	//	return;
	//}
	//add_action('admin_menu','investment_custom_metabox');
	//add_action('admin_menu','operations_custom_metabox');
	
	// Menu Classes
	//function be_menu_extras($menu, $args) {
	//	$extras = '<li class="right">Your extras go here</li>';
	//	return $menu . $extras;
	//}
	//add_filter('wp_nav_menu_primary_items','be_menu_extras', 10, 2);
?>
