<?php get_header(); ?>
<div class="content-area loop loop-archive">
	<?php
		if (function_exists('bcn_display')) {
			echo '<p class="breadcrumb">';
			bcn_display();
			echo '</p>';
		}
	?>
	<?php the_post(); ?>
	<div class="content-title">
		<?php if (is_day()) : ?>
		<h1><?php echo sprintf(__('Daily Archives: %s', PADD_THEME_SLUG), get_the_date()); ?></h1>
		<?php elseif (is_month()) : ?>
		<h1><?php echo sprintf(__('Monthly Archives: %s', PADD_THEME_SLUG), get_the_date(__('F Y', PADD_THEME_SLUG))); ?></h1>
		<?php elseif (is_year()) : ?>
		<h1><?php echo sprintf(__('Monthly Archives: %s', PADD_THEME_SLUG), get_the_date(__('Y', PADD_THEME_SLUG))); ?></h1>
		<?php elseif (is_author()) : ?>
		<h1><?php echo sprintf(__('Posts by %s', PADD_THEME_SLUG), get_the_author()); ?></h1>
		<?php elseif (is_category()) : ?>
		<h1><?php echo sprintf(__('Posts under %s Category', PADD_THEME_SLUG), single_cat_title('',false)); ?></h1>
		<?php elseif (is_tag()) : ?>
		<h1><?php echo sprintf(__('Posts Tagged  &#8216;%s &#8217;', PADD_THEME_SLUG), single_tag_title('',false)); ?></h1>
		<?php else : ?>
		<h1><?php echo __('Blog Archives', PADD_THEME_SLUG)?></h1>
		<?php endif; ?>
	</div>
	<?php rewind_posts(); ?>
	<?php get_template_part('loop','archive'); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
