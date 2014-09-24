<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="background-image: url('<?php echo Padd_Theme_Option::get('background_mode') == 'R' ? get_template_directory_uri() . '/images/patterns/' .  Padd_Theme_Option::get('background_tile') . '.gif' :  Padd_Theme_Option::get('background_url'); ?>')">
<div id="container">

	<div id="header-wrap">
		<div id="header">
			<div class="box box-masthead">
				<?php $tag = (is_home()) ? 'h1' : 'p'; ?>
				<<?php echo $tag; ?> class="title">
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
				</<?php echo $tag; ?>>
				<p class="description"><?php bloginfo('description'); ?></p>
			</div> <!-- .box-masthead -->
			<div id="menubar" class="box box-mainmenu">
				<h3 class="title">Main Menu</h3>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'main',
						'container' => null,
					));
				?>
			</div> <!-- #menubar -->
			<div class="clear"></div>
		</div> <!-- #header -->
	</div> <!-- #header-wrap -->



	<?php if (is_home()) : ?>

	<?php $featured = Padd_Theme_Option::get('featured_page_show','1'); ?>
	<?php if (is_home() && $featured === '1') : ?>
	<div id="featured-wrap">
		<div id="featured">
			<?php padd_theme_pagebox_featured(Padd_Theme_Option::get('featured_page_id',1),'1-page', 1); ?>
		</div> <!-- #featured -->
	</div> <!-- #featured-wrap -->
	<?php endif; ?>

	<?php $hometop = Padd_Theme_Option::get('home_widgets_show','1'); ?>
	<?php if (is_home() && $hometop === '1') : ?>
	<div id="hometop-wrap">
		<div id="hometop">
			<div class="bar bar-1">
			<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Home 1', PADD_THEME_SLUG))) :
					padd_theme_pagebox_special(Padd_Theme_Option::get('post_1_page_id',1),'1-page', 1);
				endif;
			?>
			</div>
			<div class="bar bar-2">
			<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Home 2', PADD_THEME_SLUG))) :
					padd_theme_pagebox_special(Padd_Theme_Option::get('post_2_page_id',1),'1-page', 2);
				endif;
			?>
			</div>
			<div class="bar bar-3">
			<?php
				if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Home 3', PADD_THEME_SLUG))) :
					padd_theme_pagebox_special(Padd_Theme_Option::get('post_3_page_id',1),'1-page', 3);
				endif;
			?>
			</div>
			<div class="clear"></div>
		</div> <!-- #hometop -->
	</div> <!-- #hometop-wrap -->
	<?php endif; ?>

	<?php endif; ?>

	<div id="middle-wrap">
		<div id="middle">