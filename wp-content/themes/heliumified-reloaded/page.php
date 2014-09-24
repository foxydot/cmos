<?php
/*
Template Name: Default Page
*/
?>
<?php get_header(); ?>

<div class="content-area content-area-singular content-area-page">
	<div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>

<?php while (have_posts()) : ?>
	<?php the_post(); ?>

<div class="title">
	<h1><?php the_title(); ?></h1>
</div>
<div class="content">
	<?php the_content(); ?>
</div>

<?php endwhile; ?>

	</div>
</div>

<?php get_sidebar(); ?>

<div class="clear"></div>

<?php get_footer(); ?>