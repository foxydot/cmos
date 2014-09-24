<?php

if (!function_exists('padd_theme_setup')) {
	function padd_theme_setup() {
		remove_action('wp_head','wp_generator');

		add_theme_support('post-thumbnails');
		add_theme_support('automatic-feed-links');

		load_theme_textdomain(PADD_THEME_SLUG, PADD_THEME_PATH . DIRECTORY_SEPARATOR . 'languages' );

		$locale = get_locale();
		$locale_file = PADD_THEME_PATH . DIRECTORY_SEPARATOR . 'languages' . DIRECTORY_SEPARATOR . $locale . '.php';
		if (is_readable($locale_file)) {
			require_once($locale_file);
		}

		register_nav_menus(array(
			'main' => __('Main Menu', PADD_THEME_SLUG),
		));

		add_image_size(PADD_THEME_SLUG . '-thumbnail',PADD_LOOP_THUMB_W, PADD_LOOP_THUMB_H, true);
		add_image_size(PADD_THEME_SLUG . '-thumbnail-featured', 250, 200, true);

		wp_enqueue_script('jquery');
		wp_enqueue_script('theme', get_stylesheet_directory_uri() . '/js/frontend.js.php?c=1', array('jquery'), PADD_THEME_VERS, true);
	}
}
add_action('after_setup_theme', 'padd_theme_setup');

function padd_theme_widgets_init() {
	register_sidebar(array(
		'name' => __('Home 1', PADD_THEME_SLUG),
		'description' => __('Home widget area at the first column. Make sure that you that the checkbox of the Show Home Page Widget Areas in theme options is marked', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __('Home 2', PADD_THEME_SLUG),
	     'description' => __('Home widget area at the second column. Make sure that you that the checkbox of the Show Home Page Widget Areas in theme options is marked', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __('Home 3', PADD_THEME_SLUG),
		'description' => __('Home widget area at the last column.  Make sure that you that the checkbox of the Show Home Page Widget Areas in theme options is marked', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __('Sidebar Top', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Sidebar Bottom', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Footer 1', PADD_THEME_SLUG),
		'description' => __('Footer widget area at the first column.', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="box %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __('Footer 2', PADD_THEME_SLUG),
	     'description' => __('Footer widget area at the second column.', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __('Footer 3', PADD_THEME_SLUG),
		'description' => __('Footer widget area at the third column.', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __('Footer 4', PADD_THEME_SLUG),
		'description' => __('Footer widget area at the last column.', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'padd_theme_widgets_init');

function padd_theme_head_favicon() {
	$icon = Padd_Theme_Option::get('favicon_url','');
	if (!empty($icon)) {
		echo '<link rel="shortcut icon" href="' . $icon . '" />' . "\n";
		echo '<link rel="icon" href="' . $icon . '" />' . "\n";
	}
}
add_action('wp_head', 'padd_theme_head_favicon');

function padd_theme_head_tracker() {
	$tracker = Padd_Theme_Option::get('tracker_head','');
	if (!empty($tracker)) {
		echo stripslashes($tracker);
	}
}
add_action('wp_head', 'padd_theme_head_tracker');

add_filter('excerpt_length', 'padd_theme_hook_excerpt_loop_length');
add_filter('excerpt_more', 'padd_theme_hook_excerpt_loop_more');
add_filter('get_comments_number', 'padd_theme_hook_count_comments',0);
add_filter('wp_page_menu_args', 'padd_theme_hook_menu_args');

function padd_theme_queue_js(){
	if (!is_admin()){
		if ( is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_print_scripts', 'padd_theme_queue_js');

/** Code taken from the Nice Search Plugin by Mark Jaquith **/
if (!function_exists('cws_nice_search_redirect')) {
	function padd_search_redirect() {
		if (is_search() && strpos( $_SERVER['REQUEST_URI'], '/wp-admin/') === false && strpos($_SERVER['REQUEST_URI'], '/search/') === false ) {
			wp_redirect(home_url('/search/' . str_replace(array(' ', '%20'),  array('+', '+'), get_query_var('s'))));
			exit();
		}
	}
	add_action('template_redirect', 'padd_search_redirect');
}