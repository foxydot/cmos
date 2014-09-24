<?php
/*
Template Name: Single Post
*/
?>
<?php get_header(); ?>

<div class="content-area content-area-singular content-area-single">
	<div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

<?php while (have_posts()) : ?>
	<?php the_post(); ?>

<div class="post-date"><?php the_time('d') ?> <span><?php the_time('M') ?></span></div>

<div class="title">
	<h1><?php the_title(); ?></h1>
</div>

<div class="content">
	<?php the_content(); ?>
	<div class="clear"></div>
	<?php wp_link_pages(array('before' => '<p class="pages"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<div class="box box-share">
	<div class="title">
		<h2><?php echo __('Share Our Posts', PADD_THEME_SLUG); ?></h2>
		<p><?php echo __('Share this post through social bookmarks.', PADD_THEME_SLUG); ?></p>
	</div>
	<?php
		remove_filter('excerpt_more','padd_theme_hook_excerpt_index_more');
		add_filter('get_the_excerpt','padd_theme_hook_excerpt_bookmark');
		add_filter('excerpt_more','padd_theme_hook_excerpt_bookmark_more');
		$padd_sb_url = urlencode(get_permalink());
		$padd_sb_title = urlencode(get_the_title());
		$padd_sb_notes = urlencode(get_the_excerpt());
		$padd_img_path = get_template_directory_uri() . '/images/icon-bm-32-%s.png';
	?>
	<div class="interior">
		<ul>
		<?php
			global $padd_socialbook;
			foreach ($padd_socialbook as $k => $psb) {
				$psb->ref_url = $padd_sb_url;
				$psb->title = $padd_sb_title;
				$psb->excerpt = $padd_sb_notes;
				$psb->content = '<img alt="' . $psb->network . '" src="' . sprintf($padd_img_path, $k) . '" />';
				echo '<li>' . $psb . '</li>';
			}
		?>
		</ul>
		<div class="clear"></div>
	</div>
</div>

<?php
	if (function_exists('related_posts')) {
		related_posts();
	}
?>

<?php comments_template('',true); ?>

<?php endwhile; ?>

	</div>
</div>

<?php get_sidebar(); ?>

<div class="clear"></div>

<?php get_footer(); ?>