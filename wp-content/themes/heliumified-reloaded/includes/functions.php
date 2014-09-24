<?php

/**
 * Checks if the value of the Facebook field is URL or username.
 *
 * @param <type> $string
 * @return boolean
 */
function padd_theme_check_facebook_url($string) {
	$url = false;
	if ('http://' == substr($string, 0, 7)) {
		$url = true;
	}
	return $url;
}

/**
 * Trim the title.
 *
 * @param int $length Number of letters.
 * @param string $after Ellipsis by default.
 */
function padd_theme_trim_title($length, $after='...') {
	$title = get_the_title();
	if (strlen($title) > $length ) {
		$title = substr($title, 0, $length);
		echo $title . $after;
	} else {
		echo $title;
	}
}

/**
 * Renders the list of social networking websites.
 */
function padd_theme_widget_socialnet($list=true) {
	global $padd_socialnet;
	$fburl = Padd_Theme_Option::get('sn_username_facebook');
	if (!padd_theme_check_facebook_url($fburl) && !empty($fburl)) {
		$padd_socialnet['facebook']->username = $fburl;
		$fburl = (string) $padd_socialnet['facebook'];
	}
	$padd_socialnet['feedburner']->username = Padd_Theme_Option::get('sn_username_feedburner');
	$padd_socialnet['flickr']->username = Padd_Theme_Option::get('sn_username_flickr');
	$padd_socialnet['twitter']->username = Padd_Theme_Option::get('sn_username_twitter');
	$padd_socialnet['googlebuzz']->username = Padd_Theme_Option::get('sn_username_googlebuzz');
	if ($list) :
?>
<ul class="socialnet">
	<?php if (!empty($padd_socialnet['googlebuzz']->username)) : ?>
	<li class="googlebuzz">
		<?php echo sprintf(__('<a href="%s">Google Buzz</a>', PADD_THEME_SLUG), $padd_socialnet['googlebuzz']); ?>
	</li>
	<?php endif; ?>
	<?php if (!empty($padd_socialnet['twitter']->username)) : ?>
	<li class="twitter">
		<?php echo sprintf(__('<a href="%s">Twitter</a>', PADD_THEME_SLUG), $padd_socialnet['twitter']); ?>
	</li>
	<?php if (!empty($fburl)) : ?>
	<li class="facebook">
		<?php echo sprintf(__('<a href="%s">Facebook</a>', PADD_THEME_SLUG), $fburl); ?>
	</li>
	<?php endif; ?>
	<?php endif; ?>
	<?php if (!empty($padd_socialnet['feedburner']->username)) : ?>
	<li class="rss">
		<?php echo sprintf(__('<a href="%s">RSS</a>', PADD_THEME_SLUG), $padd_socialnet['feedburner']); ?>
	</li>
	<li class="mail">
		<?php echo sprintf(__('<a href="%s">Mail</a>', PADD_THEME_SLUG), 'http://feedburner.google.com/fb/a/mailverify?uri=' . $padd_socialnet['feedburner']->username); ?>
	</li>
	<?php endif; ?>
</ul>
<?php
	else :
?>
	<?php if (!empty($padd_socialnet['googlebuzz']->username)) : ?>
	<?php echo sprintf(__('<a href="%s">Google Buzz</a>', PADD_THEME_SLUG), $padd_socialnet['googlebuzz']); ?> <span class="no-display">|</span>
	<?php endif; ?>
	<?php if (!empty($fburl)) : ?>
	<?php echo sprintf(__('<a class="icon icon-facebook" href="%s"><span>Facebook</span></a>', PADD_THEME_SLUG), $fburl); ?> <span class="no-display">|</span>
	<?php endif; ?>
	<?php if (!empty($padd_socialnet['twitter']->username)) : ?>
	<?php echo sprintf(__('<a class="icon icon-twitter" href="%s"><span>Twitter</span></a>', PADD_THEME_SLUG), $padd_socialnet['twitter']); ?> <span class="no-display">|</span>
	<?php endif; ?>
	<?php if (!empty($padd_socialnet['feedburner']->username)) : ?>
	<?php echo sprintf(__('<a class="icon icon-rss" href="%s"><span>RSS</span></a>', PADD_THEME_SLUG), $padd_socialnet['feedburner']); ?> <span class="no-display">|</span>
	<?php echo sprintf(__('<a href="%s">Mail</a>', PADD_THEME_SLUG), 'http://feedburner.google.com/fb/a/mailverify?uri=' . $padd_socialnet['feedburner']->username); ?>
	<?php endif; ?>

<?php
	endif;
}

/**
 * Renders the Feedburner subscription form.
 *
 * @param string $description
 */
function padd_theme_widget_feedburner($description = '') {
	global $padd_socialnet;
	$padd_socialnet['feedburner']->username = Padd_Theme_Option::get('sn_username_feedburner');
?>
<p><?php echo $description; ?></p>
<form id="subscribe" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/emailverifySubmit?uri=<?php echo urlencode($padd_socialnet['feedburner']); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520'); return true">
	<span class="input"><input type="text" value="<?php echo __('Enter your email address', PADD_THEME_SLUG); ?>" onfocus="if (this.value == '<?php echo __('Enter your email address', PADD_THEME_SLUG); ?>') {this.value = '';}" onblur="if (this.value == '') { this.value = '<?php echo __('Enter your email address', PADD_THEME_SLUG); ?>'; }" name="email" /></span>
	<button type="submit"><span>Sign Up Now</span></button>
	<input type="hidden" value="<?php echo $padd_socialnet['feedburner']->username; ?>" name="uri"/>
	<input type="hidden" value="News Subscribe" name="title" />
</form>
<?php
}

/**
 * Renders the twitter widget.
 */
function padd_theme_widget_twitter() {
	global $padd_socialnet;
	$padd_socialnet['twitter']->username = (Padd_Theme_Option::get('sn_username_twitter'));
	$padd_sb_twitter = Padd_Theme_Option::get('sn_username_twitter');
	$twitter = new Padd_Theme_Twitter($padd_sb_twitter, 3, true);
	$twitter->show_tweets();
	?>
	<p class="follow"><?php echo sprintf(__('Follow %s', PADD_THEME_SLUG), '<a href="' . $padd_socialnet['twitter'] . '">@' . $padd_sb_twitter . '</a>'); ?></p>
	<?php
}

/**
 * Renders the advertisements.
 */
function padd_theme_widget_sponsors() {
	echo '<div class="ads-area">';
	for ($i=1;$i<=4;$i++) {
		$ad = Padd_Theme_Option::get('ads_125125_' . $i,'');
		echo '<span class="ads ads-',  $i, '">', stripslashes($ad), '</span>';
	}
	echo '<div class="clear"></div>';
	echo '</div>';
}

/**
 * Renders the Facebook Like Box.
 *
 * @paran string $id Facebook numerical ID
 * @param int $w Width of the box
 * @param int $h Height of the box
 * @param int $conn Number of connections
 * @param int $stream News feed streaming. 1 to enable, 0 to disable. The default value is 0.
 * @param int $header Like Box header. 1 to show, 0 to hide. The default value is 0.
 */
function padd_theme_widget_facebook_likebox($w=230,$h=300,$conn=10,$stream=0,$header=0) {
	global $padd_socialnet;
	$fburl = Padd_Theme_Option::get('sn_username_facebook');
	if (!padd_theme_check_facebook_url($fburl)) {
		$padd_socialnet['facebook']->username = $fburl;
		$fburl = (string) $padd_socialnet['facebook'];
	}
?>
<iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($fburl); ?>&amp;width=<?php echo $w; ?>&amp;connections=<?php echo $conn; ?>&amp;stream=<?php echo $stream == 1 ? 'true' : 'false'; ?>&amp;header=<?php echo $header == 1 ? 'true' : 'false'; ?>&amp;height=<?php echo $h; ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $w; ?>px; height:<?php echo $h; ?>px;"></iframe>
<?php
}

/**
 * Render the popular posts.
 */
function padd_theme_widget_wpp() {
	if (function_exists('get_mostpopular')) :
		get_mostpopular('pages=0&stats_comments=1&range=all&limit=5&thumbnail_selection=usergenerated&thumbnail_width=50&thumbnail_height=50&do_pattern=1&pattern_form={image}{title}{stats}');
	else :
	?>
		<p>Please install the <a href="http://wordpress.org/extend/plugins/wordpress-popular-posts/">Wordpress Popular Posts plugin</a>.</p>
	<?php
	endif;
}

/**
 * Renders the list of recent comments.
 *
 * @global object $wpdb
 * @global array $comments
 * @global array $comment
 * @param int $limit
 */
function padd_theme_widget_recent_comments($limit=5) {
	global $wpdb, $comments, $comment;

	if ( !$comments = wp_cache_get( 'recent_comments', 'widget' ) ) {
		$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $limit");
		wp_cache_add( 'recent_comments', $comments, 'widget' );
	}
	echo '<ul class="comments-recent">';
	if ( $comments ) :
		foreach ( (array) $comments as $comment) :
			echo  '<li class="comments-recent">' . sprintf(__('%1$s on %2$s', PADD_THEME_SLUG), get_comment_author_link(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
		endforeach;
	endif;
	echo '</ul>';
}

/**
 * Renders the excerpt of the page.
 */
function padd_theme_pagebox_special($pid,$class,$col) {
?>
<div class="widget widget_special widget_special_<?php echo $class; ?>">
	<?php
		wp_reset_query();
		add_filter('excerpt_length','padd_theme_hook_excerpt_pages_length');
		query_posts('page_id=' . $pid);
		the_post();
	?>
	<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<p><?php echo wp_trim_excerpt(''); ?></p>
	<?php
		remove_filter('excerpt_length','padd_theme_hook_excerpt_pages_length');
		wp_reset_query();
	?>
</div>
<?php
}

/**
 * Renders the excerpt of the page.
 */
function padd_theme_pagebox_featured($pid,$class,$col) {
?>
<div class="widget widget_special widget_special_<?php echo $class; ?>">
	<div class="inner">
		<?php
			wp_reset_query();
			add_filter('excerpt_length','padd_theme_hook_excerpt_featured_length');
			query_posts('page_id=' . $pid);
			the_post();
			$padd_image_def = get_template_directory_uri() . '/images/thumbnail-featured.jpg';
		?>
		<?php
			if (has_post_thumbnail()) {
				the_post_thumbnail(PADD_THEME_SLUG . '-thumbnail-featured', array('title' => get_the_title()));
			} else {
				echo '<img class="thumbnail" src="' . $padd_image_def . '" />';
			}
		?>
		<h2 class="title"><?php the_title(); ?></h2>
		<p><?php echo wp_trim_excerpt(''); ?></p>
		<?php
			remove_filter('excerpt_length','padd_theme_hook_excerpt_featured_length');
			wp_reset_query();
		?>
		<div class="clear"></div>
	</div>
</div>
<?php
}

/**
 * Renders the list of comments.
 *
 * @param string $comment
 * @param string $args
 * @param string $depth
 */
function padd_theme_single_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-box">
			<div class="comment-interior append-clear">
				<div class="comment-author append-clear">
					<div class="comment-avatar"><?php echo get_avatar($comment,'33'); ?></div>
					<div class="comment-meta">
						<span class="author"><?php echo sprintf(__('%s says:', PADD_THEME_SLUG), get_comment_author_link()); ?></span>
						<span class="time"><?php echo get_comment_date(Padd_Theme_Option::get('date_format')); ?></span>
					</div>
				</div>
				<div class="comment-details">
					<div class="comment-details-interior">
						<?php comment_text(); ?>
						<?php if ($comment->comment_approved == '0') : ?>
						<p class="comment-notice"><?php _e('My comment is awaiting moderation.', PADD_THEME_SLUG) ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="comment-actions clear">
					<?php edit_comment_link(__('Edit', PADD_THEME_SLUG),'<span class="edit">','</span> | ') ?>
					<?php comment_reply_link(array('respond_id' => 'reply', 'add_below' => 'comment' , 'depth' => $depth, 'max_depth' => $args['max_depth'])) ; ?>
				</div>
			</div>
		</div>
	<?php
}

/**
 * Render the list of trackbacks.
 *
 * @param string $comment
 * @param string $args
 * @param string $depth
 */
function padd_theme_single_trackbacks($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="pings-<?php comment_ID() ?>">
		<?php comment_author_link(); ?>
	<?php
}

function padd_theme_share_button($class='share') {
?>
<ul>
	<li class="facebook"><a name="fb_share" type="button_count" share_url="<?php the_permalink(); ?>"><?php echo __('Share', PADD_THEME_SLUG); ?></a></li>
	<li class="twitter"><a href="http://twitter.com/share?url=<?php echo urlencode(get_permalink());?>&amp;count=horizontal" class="twitter-share-button">Twitter</a></li>
	<li class="google-plus-1"><g:plusone size="medium" count="true"></g:plusone></li>
</ul>
<?php
}
