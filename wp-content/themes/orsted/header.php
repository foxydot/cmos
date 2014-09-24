<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<!-- BEGIN html head -->
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php if (function_exists('wp_enqueue_script') && function_exists('is_singular')) : ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php endif; ?>
<?php wp_head(); ?>
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ie.css" />
<![endif]-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
</head>
<!-- END html head -->

<body>

<!-- BEGIN wrapper -->
<div id="wrapper">

	<!-- BEGIN header -->
	<div id="header">
	
		<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
		<ul>
		<li><a href="<?php echo get_option('home'); ?>">Home</a></li>
		<?php dp_list_pages(); ?>
		</ul>
	
	</div>
	<!-- END header -->
	
	<!-- BEGIN featured -->
	<div id="featured">
	
		<div class="container">
		<ul>
		<?php 
		$tmp_query = $wp_query;
		query_posts('cat=' . get_cat_ID(dp_settings('featured1')));
		if (have_posts()) :
		while (have_posts()) : the_post();
		?>
		<li><a href="<?php the_permalink(); ?>"><?php dp_attachment_image($post->ID, 'full', 'alt="' . $post->post_title . '"'); ?></a></li>
		<?php 
		endwhile; 
		endif; 
		$wp_query = $tmp_query;
		?>
		</ul>
		</div>
		
		<a href="#" class="prev">Previous</a>
		<a href="#" class="next">Next</a>
	
	</div>
	<!-- END featured -->
