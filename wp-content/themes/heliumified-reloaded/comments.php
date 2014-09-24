<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('Please do not load this page directly. Thanks!');
}
?>
<a name="comments"></a>
<div class="box box-replies box-comments">
	<div class="title">
		<h2><?php echo __('Comments', PADD_THEME_SLUG); ?></h2>
		<p><?php echo __('Tell us what do you think.', PADD_THEME_SLUG); ?></p>
	</div>
	<div class="interior box-comments-interior">
	<?php if (post_password_required()) : ?>
		<p class="no-comments"><?php echo __('This post is password protected. Enter the password to view comments.', PADD_THEME_SLUG); ?></p>
	<?php elseif (!empty($comments_by_type['comment'])) : ?>
		<ol class="comments-list">
			<?php wp_list_comments('type=comment&callback=padd_theme_single_comments'); ?>
		</ol>
	<?php else : ?>
		<p class="no-comments"><?php echo __('There are no comments on this entry.', PADD_THEME_SLUG); ?></p>
	<?php endif; ?>
	</div>
</div>

<?php if ('1' == Padd_Theme_Option::get('show_trackbacks','')) : ?>
<a name="trackbacks"></a>
<div class="box box-replies box-trackbacks">
	<div class="title">
		<h2><?php echo __('Trackbacks', PADD_THEME_SLUG); ?></h2>
		<p><?php echo __('Websites mentioned my entry.', PADD_THEME_SLUG); ?></p>
	</div>
	<div class="interior box-trackbacks-interior">
	<?php if (post_password_required()) : ?>
		<p class="no-trackbacks"><?php echo __('This post is password protected. Enter the password to view trackbacks.', PADD_THEME_SLUG); ?></p>
	<?php elseif (!empty($comments_by_type['pings'])) : ?>
		<ol class="trackbacks-list">
			<?php wp_list_comments('type=pings&callback=padd_theme_single_trackbacks'); ?>
		</ol>
	<?php else : ?>
		<p class="no-trackbacks"><?php echo __('There are no trackbacks on this entry', PADD_THEME_SLUG); ?></p>
	<?php endif; ?>
	</div>
</div>
<?php endif; ?>

<?php if (comments_open()) : ?>

<a name="reply"></a>
<div class="box box-reply" id="reply">
	<div class="title box-reply-title append-clear">
		<h2><?php comment_form_title('Add a Comment', 'Add a Comment to %s'); ?></h2>
		<p><?php echo __('Fill in the form and submit.', PADD_THEME_SLUG); ?></p>
	</div>
	<div class="interior box-reply-interior">
		<?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
		<p>You must be <a href="<?php echo wp_login_url(get_permalink()); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
		<form action="<?php echo bloginfo('wpurl'); ?>/wp-comments-post.php" method="post" id="comment-form">
			<?php if ( is_user_logged_in() ) : ?>
			<p>Logged in as <a href="<?php echo bloginfo('wpurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
			<?php else : ?>
			<p class="input input-small input-name">
				<label for="comment-author"><?php echo __('Name', PADD_THEME_SLUG); ?>: <small><?php if ($req) echo __("(Required)", PADD_THEME_SLUG); ?></small></label>
				<span><input type="text" name="author" id="comment-author" value="<?php echo '' != esc_attr($comment_author) ? esc_attr($comment_author) : ''; ?>" size="22" tabindex="1" /></span>
			</p>
			<p class="input input-small input-email">
				<label for="comment-email"><?php echo __('E-mail', PADD_THEME_SLUG); ?>: <small><?php if ($req) echo __("(Required)", PADD_THEME_SLUG); else echo __("(Optional)", PADD_THEME_SLUG); ?></small></label>
				<span><input type="text" name="email" id="comment-email" value="<?php echo '' != esc_attr($comment_author_email) ? esc_attr($comment_author_email) : ''; ?>" size="22" tabindex="2" /></span>
			</p>
			<p class="input input-website">
				<label for="comment-url"><?php echo __('Website', PADD_THEME_SLUG); ?>: <small><?php echo __("(Optional)", PADD_THEME_SLUG); ?></small></label>
				<span><input type="text" name="url" id="comment-url" value="<?php echo '' != esc_attr($comment_author_url) ? esc_attr($comment_author_url) : ''; ?>" size="22" tabindex="3" /></span>
			</p>
			<?php endif; ?>
			<p class="inpit">
				<label for="comment-comment"><?php echo __('Comments', PADD_THEME_SLUG); ?>:</label>
				<span><textarea name="comment" id="comment-comment" cols="22" rows="5" tabindex="4"></textarea></span>
			</p>
			<div class="comment-notify-submit">
				<?php
					if (function_exists('show_subscription_checkbox')) {
						show_subscription_checkbox();
					}
				?>
				<p class="comment-submit">
					<button type="submit" name="submit" value="submit" id="comment-submit" tabindex="5" ><span><?php echo __('Submit', PADD_THEME_SLUG); ?></span></button>
					<small><?php cancel_comment_reply_link(); ?></small>
				</p>
				<div class="clear"></div>
			</div>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
		<?php endif; ?>
	</div>
</div>

<?php endif; ?>
