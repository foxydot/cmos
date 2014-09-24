<?php

$padd_options = array();

function padd_theme_admin_init() {
	global $padd_options, $padd_background;

	$padd_options['general'] = array(
		new Padd_Theme_Input(
			'favicon_url',
			__('Favicon URL', PADD_THEME_SLUG),
			__('The URL where your favicon is located. Must start with <code>http://</code> or <code>https://</code>.', PADD_THEME_SLUG),
			array('type' => 'upload', 'width' => 500, 'switch_no' => 1)
		),
	    new Padd_Theme_Input(
			'sitename_logo_url',
			__('Logo URL', PADD_THEME_SLUG),
			__('The URL where your logo is located. Must start with <code>http://</code> or <code>https://</code>. The height of the image should be 48 pixels.', PADD_THEME_SLUG),
			array('type' => 'upload', 'width' => 500, 'switch_no' => 2)
		),
	    	new Padd_Theme_Input(
			'featured_page_show',
			__('Show Featured Page in Home Page', PADD_THEME_SLUG),
			__('Click to show designated featured page in home page.', PADD_THEME_SLUG),
			array('type' => 'checkbox')
		),
	    new Padd_Theme_Input(
			'featured_page_id',
			__('Designated Featured Page', PADD_THEME_SLUG),
			__('A page that is designated as featured page, shown at the home page.', PADD_THEME_SLUG),
			array('type' => 'page', 'width' => 250)
		),
	    	new Padd_Theme_Input(
			'home_widgets_show',
			__('Show Home Page Widget Areas', PADD_THEME_SLUG),
			__('Click to show home page widgets.', PADD_THEME_SLUG),
			array('type' => 'checkbox')
		),
		new Padd_Theme_Input(
			'post_1_page_id',
			__('First Column Page', PADD_THEME_SLUG),
			__('The page title to show the contents of the first column in home page.', PADD_THEME_SLUG),
			array('type' => 'page', 'width' => 250)
		),
		new Padd_Theme_Input(
			'post_2_page_id',
			__('Second Column Page', PADD_THEME_SLUG),
			__('The page title to show the contents of the second column in home page.', PADD_THEME_SLUG),
			array('type' => 'page', 'width' => 250)
		),
		new Padd_Theme_Input(
			'post_3_page_id',
			__('Third Column Page', PADD_THEME_SLUG),
			__('The page title to show the contents of the third column in home page.', PADD_THEME_SLUG),
			array('type' => 'page', 'width' => 250)
		),
		new Padd_Theme_Input(
			'show_trackbacks',
			__('Show Trackbacks', PADD_THEME_SLUG),
			__('Tick this box to render the trackbacks.', PADD_THEME_SLUG),
			array('type' => 'checkbox')
		),
	);

	$padd_options['background'] = array(
		 new Padd_Theme_Input(
			'background_mode',
			__('Background Mode', PADD_THEME_SLUG),
			__('Image changes only at the top portion of the header and the footer background. Select Ready-Made mode if you want ready-made background tiles or Custom Background if you want to upload your own.', PADD_THEME_SLUG),
			array('type' => 'dropdown', 'choices' => array(
				'R' => __('Ready-Made', PADD_THEME_SLUG),
				'C' => __('Custom Background', PADD_THEME_SLUG)
			))
		),
	     new Padd_Theme_Input(
			'background_tile',
			__('Background Tile', PADD_THEME_SLUG),
			__('', PADD_THEME_SLUG),
			array('type' => 'imageselect', 'choices' => $padd_background)
		),
	    new Padd_Theme_Input(
			'background_url',
			__('Background URL', PADD_THEME_SLUG),
			__('The URL where your custom background is located. Must start with <code>http://</code> or <code>https://</code>.', PADD_THEME_SLUG),
			array('type' => 'upload', 'width' => 500, 'switch_no' => 3)
		),
	);

	$padd_options['tracker'] = array(
		new Padd_Theme_Input(
			'tracker_head',
			__('Tracker Code 1', PADD_THEME_SLUG),
			__('A tracker code to be placed inside the <code>&lt;head&gt;</code> tag.', PADD_THEME_SLUG),
			array('type' => 'textarea')
		),
		new Padd_Theme_Input(
			'tracker_top',
			__('Tracker Code 2', PADD_THEME_SLUG),
			__('A tracker code to be placed just after the opening <code>&lt;body&gt;</code> tag.', PADD_THEME_SLUG),
			array('type' => 'textarea')
		),
		new Padd_Theme_Input(
			'tracker_bot',
			__('Tracker Code 3', PADD_THEME_SLUG),
			__('A tracker code to be placed just before the closing <code>&lt;body&gt;</code> tag.', PADD_THEME_SLUG),
			array('type' => 'textarea')
		),
	);

	$padd_options['socialnetwork'] = array(
	    new Padd_Theme_Input(
			'sn_username_facebook',
			__('Facebook Username or URL', PADD_THEME_SLUG),
			__('Your <a href="http://www.facebook.com">Facebook</a> username. Please note that user name <em>does not mean</em> your e-mail address. <a href="http://www.facebook.com/help.php?page=897">Read the Q&amp;A</a> for more info.', PADD_THEME_SLUG),
			array('type' => 'textfield', 'width' => 250)
		),
	     new Padd_Theme_Input(
			'sn_username_feedburner',
			__('Feedburner Username', PADD_THEME_SLUG),
			__('Your user name in Feedburner.', PADD_THEME_SLUG),
			array('type' => 'textfield', 'width' => 250)
		),
	    new Padd_Theme_Input(
			'sn_username_flickr',
			__('Flickr Username', PADD_THEME_SLUG),
			__('Your user name in Flickr.', PADD_THEME_SLUG),
			array('type' => 'textfield', 'width' => 250)
		),
	    new Padd_Theme_Input(
			'sn_username_googlebuzz',
			__('Google Buzz Username', PADD_THEME_SLUG),
			__('Your Google Buzz user name.', PADD_THEME_SLUG),
			array('type' => 'textfield', 'width' => 250)
		),
		new Padd_Theme_Input(
			'sn_username_twitter',
			__('Twitter Username', PADD_THEME_SLUG),
			__('Your <a href="http://twitter.com">Twitter</a> user name. You may leave it blank if you don\'t have one but we recommend to <a href="http://twitter.com/signup">create an account</a>.', PADD_THEME_SLUG),
			array('type' => 'textfield', 'width' => 250)
		)
	);

	$padd_options['pagenav'] = array(
		new Padd_Theme_Input(
			'pgn_pages_to_show',
			__('Number of Pages to Show', PADD_THEME_SLUG),
			__('The number of pages to show in the page navigation at a time.', PADD_THEME_SLUG),
			array('type' => 'textfield', 'width' => 100)
		),
		new Padd_Theme_Input(
			'pgn_larger_page_numbers',
			__('Number of Large Page Numbers to Show', PADD_THEME_SLUG),
			__('Larger page numbers are in additional to the default page numbers. It is useful for authors who is paginating through many posts.<br />For example, page navigation will display: Pages 1, 2, 3, 4, 5, 10, 20, 30, 40, 50.<br />Enter 0 to disable. ', PADD_THEME_SLUG),
			array('type' => 'textfield', 'width' => 100)
		),
		new Padd_Theme_Input(
			'pgn_larger_page_numbers_multiple',
			__('Show Larger Page Numbers in Multiples of', PADD_THEME_SLUG),
			__('If mutiple is in 5, it will show: 5, 10, 15, 20, 25. If mutiple is in 10, it will show: 10, 20, 30, 40, 50.', PADD_THEME_SLUG),
			array('type' => 'textfield', 'width' => 100)
		),
	);

	$padd_options['advertisements'] = array(
	    new Padd_Theme_Input(
			'ads_125125_1',
			__('Sidebar Ad Space 1 (125 &times; 125)', PADD_THEME_SLUG),
			__('Link/Image advertisement code to be placed at the sidebar. It can be an HTML code, Google Adsense code or something else.', PADD_THEME_SLUG),
			array('type' => 'textarea')
		),
		new Padd_Theme_Input(
			'ads_125125_2',
			__('Sidebar Ad Space 2 (125 &times; 125)', PADD_THEME_SLUG),
			__('Link/Image advertisement code to be placed at the sidebar. It can be an HTML code, Google Adsense code or something else.', PADD_THEME_SLUG),
			array('type' => 'textarea')
		),
		new Padd_Theme_Input(
			'ads_125125_3',
			__('Sidebar Ad Space 3 (125 &times; 125)', PADD_THEME_SLUG),
			__('Link/Image advertisement code to be placed at the sidebar. It can be an HTML code, Google Adsense code or something else.', PADD_THEME_SLUG),
			array('type' => 'textarea')
		),
		new Padd_Theme_Input(
			'ads_125125_4',
			__('Sidebar Ad Space 4 (125 &times; 125)', PADD_THEME_SLUG),
			__('Link/Image advertisement code to be placed at the sidebar. It can be an HTML code, Google Adsense code or something else.', PADD_THEME_SLUG),
			array('type' => 'textarea')
		),
	);
}
add_action('init','padd_theme_admin_init');


/**
 * A function that will save the options.
 *
 * @global array $options_general
 * @global array $options_socialbookmarking
 * @global array $options_yourads
 */
function padd_theme_add_admin() {
	global $padd_options;

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['page'] == basename(__FILE__) ) {
		foreach ($padd_options[$_POST['action']] as $opt) {
			if (isset($_REQUEST[$opt->keyword])) {
				Padd_Theme_Option::set($opt->keyword,$_REQUEST[$opt->keyword]);
			} else {
				Padd_Theme_Option::set($opt->keyword,'');
			}
		}

		Padd_Theme_Option::update();

		header("Location: themes.php?page=options-functions.php&saved=true#padd-admin-tab-" . $_POST['action']);
		break;

	}

	add_theme_page(sprintf(__('%s Options', PADD_THEME_SLUG), PADD_THEME_NAME), sprintf(__('%s Options', PADD_THEME_SLUG), PADD_THEME_NAME), 'edit_theme_options', basename(__FILE__), 'padd_theme_admin');
}


function padd_theme_admin_head() {
	echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/administration/css/style.css' . '" type="text/css" media="screen" />';
	echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/administration/js/script.js.php?c=1"></script>';
}

if (is_admin() && $_GET['page'] == 'options-functions.php') {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_style('thickbox');
	add_action('admin_head','padd_theme_admin_head');
}


/**
 * Renders the user interface for custom theme settings.
 *
 * @global array $options_general
 * @global array $options_socialbookmarking
 * @global array $options_yourads
 */
function padd_theme_admin() {
	global $padd_options;

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>' . sprintf(__('%s options saved.', PADD_THEME_SLUG), PADD_THEME_NAME) . '</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>' . sprintf(__('%s options reset.', PADD_THEME_SLUG), PADD_THEME_NAME) . '</strong></p></div>';

	require PADD_THEME_PATH .  DIRECTORY_SEPARATOR . 'administration' . DIRECTORY_SEPARATOR . 'options-ui.php';
}
add_action('admin_menu', 'padd_theme_add_admin');
