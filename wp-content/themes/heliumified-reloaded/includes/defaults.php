<?php

$padd_socialnet = array(
	'facebook' => new Padd_Theme_SocialNetwork('Facebook','http://www.facebook.com/%u%'),
	'feedburner' => new Padd_Theme_SocialNetwork('Feedburner','http://feeds.feedburner.com/%u%'),
	'flickr' => new Padd_Theme_SocialNetwork('Flickr','http://www.flickr.com/photos/%u%'),
     'googlebuzz' => new Padd_Theme_SocialNetwork('Twitter','http://www.google.com/profiles/%u%'),
	'twitter' => new Padd_Theme_SocialNetwork('Twitter','http://www.twitter.com/%u%'),
);

$padd_socialbook = array(
	'delicious' => new Padd_Theme_SocialBookmark('Delicious','http://delicious.com/post?url=%url%&amp;title=%title%&amp;notes=%excerpt%'),
	'digg' => new Padd_Theme_SocialBookmark('Digg','http://digg.com/submit?phase=2&amp;url=%url%&amp;title=%title%&amp;bodytext=%excerpt%'),
	'newsvine' => new Padd_Theme_SocialBookmark('Newsvine','http://www.newsvine.com/_tools/seed&amp;save?u=%url%&amp;h=%title%'),
	'rss' => new Padd_Theme_SocialBookmark('RSS',get_bloginfo('rss2_url')),
	'stumbleupon' => new Padd_Theme_SocialBookmark('StumbleUpon','http://www.stumbleupon.com/post?url=%url%&amp;title=%title%'),
	'technorati' => new Padd_Theme_SocialBookmark('Technorati','http://technorati.com/faves?add=%url%'),
);

$padd_background = array(
     'oranges' => 'oranges.gif',
	'aloha' => 'aloha.gif',
	'carbon' => 'carbon.gif',
	'fire' => 'fire.gif',
	'flowers' => 'flowers.gif',
	'heritage' => 'heritage.gif'
);

Padd_Theme_Option::instantiate();

$installed = Padd_Theme_Option::get('installed','0');
$installed = ('0' === $installed) ? false : true;

if (!$installed) {
	// Core
	Padd_Theme_Option::set('installed','1');

	// General
	Padd_Theme_Option::set('favicon_url','');
	Padd_Theme_Option::set('show_trackbacks','1');
	Padd_Theme_Option::set('sitename_mode','1');
	Padd_Theme_Option::set('sitename_logo_url',get_template_directory_uri() . '/images/site-title.png');
	Padd_Theme_Option::set('home_widgets_show','0');
	Padd_Theme_Option::set('featured_page_show','1');
	Padd_Theme_Option::set('featured_page_id','1');
	Padd_Theme_Option::set('post_1_page_id','1');
	Padd_Theme_Option::set('post_2_page_id','1');
	Padd_Theme_Option::set('post_3_page_id','1');

	// Tracker
	Padd_Theme_Option::set('tracker_head','');
	Padd_Theme_Option::set('tracker_top','');
	Padd_Theme_Option::set('tracker_bot','');

	// Social Networking
	foreach ($padd_socialnet as $k => $v) {
		Padd_Theme_Option::set('sn_username_' . $k, 'paddsolutions');
	}

	// Page Navigation
	Padd_Theme_Option::set('pgn_pages_to_show','5');
	Padd_Theme_Option::set('pgn_larger_page_numbers','0');
	Padd_Theme_Option::set('pgn_larger_page_numbers_multiple','10');

	// Advertisements
	// Custom Advertisement
	for ($i=1;$i<=4;$i++) {
		Padd_Theme_Option::set('ads_125125_' . $i,'<a href="http://www.paddsolutions.com/" target="_blank"><img alt="Advertisement" src="' . get_template_directory_uri() . '/images/advertisement-125x125.jpg" /></a>');
	}

	Padd_Theme_Option::update();

}

$padd_twitter = new Padd_Theme_Twitter(Padd_Theme_Option::get('sn_username_twitter'), 3, true);