<?php
/**
 * The Loop
 *
 * Section dedicated for rendering the number of posts in which we will expect
 * to return at least one or more posts.
 *
 */
?>

<?php if (!have_posts()) : ?>

<div id="post-0" class="entry post error404 not-found">
	<div class="title">
		<h2><?php echo __('Not Found', PADD_THEME_SLUG); ?></h2>
	</div>
	<div class="content">
		<p><?php echo __('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', PADD_THEME_SLUG); ?></p>
	</div>
</div>

<?php else : ?>

	<?php
		$tag = 'h2';
		add_filter('excerpt_length', 'padd_theme_hook_excerpt_loop_length');
		$i = 1;
		$thumbnail_type = PADD_THEME_SLUG . '-thumbnail';
		$padd_image_def = get_template_directory_uri() . '/images/thumbnail.png';
	?>
	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
		<div id="entry-<?php the_ID(); ?>" <?php post_class('entry entry-' . $i); ?>>
			<div class="post-date"><?php the_time('d') ?> <span><?php the_time('M') ?></span></div>
			<div class="thumbnail">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php
						$postmeta = get_post_meta ($post->ID, "Heliumified", true);
						if (is_array($postmeta) && $postmeta['postimg'] != '') {
							echo '<img src="' . $postmeta['postimg'] . '" alt="' . get_the_title() . '" />';
						} else if (is_string($postmeta) && $postmeta != '') {
							echo '<img src="' . $postmeta . '" alt="' . get_the_title() . '" />';
						} else {
							if (has_post_thumbnail()) {
								the_post_thumbnail($thumbnail_type);
							} else {
								echo '<img class="image-thumbnail" alt="Default thumbnail." src="' . $padd_image_def . '" />';
							}
						}
					?>
				</a>
			</div>
			<div class="title">
				<<?php echo $tag;?>><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></<?php echo $tag; ?>>
			</div>
			<div class="byline"><p>by <?php the_author() ?> in <?php the_category(', ') ?></p></div>
			<div class="excerpt">
				<?php the_excerpt(); ?>
				<p class="more">
					<a href="<?php comments_link(); ?>"><?php comments_number('Leave a Comment', '1 Comment', '% Comments'); ?></a> |
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read More</a>
				</p>
			</div>
		</div>
	<?php endwhile; ?>
	<?php
		remove_filter('excerpt_length', 'padd_theme_hook_excerpt_loop_length');
		Padd_Theme_PageNavigation::render();
	?>

<?php endif;
