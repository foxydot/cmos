

/* = header.css
--------------------------------------------------- */
#header-wrap {
	padding: 25px 0 0 0;
	border-top: 1px solid #999;
	background: #fff url('../images/bg-container.png') 50% 0 no-repeat;
}
#header {
	width: 960px;
	height: 65px;
	margin: 0 auto;
}
#header .box h3 {
	display: none;
}
#header .box-masthead {
	float: left;
}
<?php
	$sitename = Padd_Theme_Option::get('sitename_mode','0');
?>
<?php if ('0' == $sitename) : ?>
#header .title {
	display: block;
	margin: 0;
	padding: 40px 0 0 0;
}
#header .title a {
	display: block;
	margin: 0;
	font: normal 60px/120px 'Maiden Orange', sans-serif;
	font-style: normal;
	text-decoration: none;
	outline: none;
	color: #fac75d;
	text-shadow: #000 1px 1px 1px;
}
#header .title a:hover {
	text-decoration: none;
}
<?php else : ?>
	<?php
		$image = Padd_Theme_Option::get('sitename_logo_url');
		$val = getimagesize($image);
	?>
#header .title {
	display: block;
	margin: 0;
	padding: 0;
}
#header .title a {
	display: block;
	margin: 0;
	font-family: 'Georgia', sans-serif;
	font-size: 40px;
	text-indent: -999999px;
	background: transparent url('<?php echo $image; ?>') left center no-repeat;
	width: <?php echo $val[0]; ?>px;
	height: <?php echo $val[1]; ?>px;
}
<?php endif; ?>
#header .description {
	display: none;
}

#header .box-socialnet {
	padding: 12px 0 16px 0;
	height: 16px;
}
#header .box-socialnet ul {
	display: block;
	float: right;
	margin: 0;
	padding: 0;
	height: 16px;
}
#header .box-socialnet ul li {
	display: block;
	float: left;
	width: 16px;
	height: 16px;
	margin: 0 0 0 10px;
	padding: 0;
	border-bottom: 0 none;
}
#header .box-socialnet ul li a {
	display: block;
	width: 16px;
	height: 16px;
	margin: 0;
	padding: 0 0 0 38px;
	font: normal 10px/16px 'Lucida Grande', 'Lucida Sans';
	color: #333;
	text-indent: -999999px;
	text-transform: uppercase;
	text-decoration: none;
}
#header .box-socialnet ul li a:hover {
	color: #933;
}
#header .box-socialnet ul li.flickr {
	background: transparent url('../images/icon-sn-flickr.png') left top no-repeat;
}
#header .box-socialnet ul li.facebook {
	background: transparent url('../images/icon-sn-facebook.png') left top no-repeat;
}
#header .box-socialnet ul li.rss {
	background: transparent url('../images/icon-sn-rss.png') left top no-repeat;
}
#header .box-socialnet ul li.twitter {
	background: transparent url('../images/icon-sn-twitter.png') left top no-repeat;
}