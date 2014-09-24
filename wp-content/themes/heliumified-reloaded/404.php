<?php
/*
Template Name: 404 Error Page
*/
?>
<?php get_header(); ?>

<div class="content-area content-area-singular content-area-page content-not-found">
	<div id="post-0" class="entry not-found">

	<?php
		if (function_exists('bcn_display')) {
			echo '<p class="breadcrumb">';
			bcn_display();
			echo '</p>';
		}
	?>

	<div class="title">
		<h1><?php echo __('Not Found', PADD_THEME_SLUG); ?></h1>
	</div>
	<div class="content">
		<p><?php echo __('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', PADD_THEME_SLUG); ?></p>
	</div>

	</div>
</div>

<?php get_sidebar(); ?>

<div class="clear"></div>

<?php get_footer(); ?>