
<?php get_header(); ?>
<div class="content-area loop loop-search">
	<?php
		if (function_exists('bcn_display')) {
			echo '<p class="breadcrumb">';
			bcn_display();
			echo '</p>';
		}
	?>
	<?php the_post(); ?>
	<div class="content-title">
		<h1><?php echo sprintf(__('Search Results for: %s', PADD_THEME_SLUG), get_search_query()); ?></h1>
	</div>
	<?php get_template_part('loop','search'); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>