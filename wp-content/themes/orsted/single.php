<?php include("header.php"); ?>

<!-- BEGIN content -->
<div id="content">

	<?php
	if (have_posts()) : the_post(); 
	?>

	<!-- begin post -->
	<div class="single">
	
		<h2><?php the_title(); ?></h2>
		<p class="details">
		<?php the_time('F j, Y') ?> |
		<?php the_category(', ') ?>
		</p>
		<div class="break"></div>
		<?php echo the_content(); ?>
		<p class="tags">Tags: <?php the_tags('', ', ', ''); ?></p>
	
	</div>
	<!-- end post -->
	
	<div id="comments">
	<?php comments_template(); ?>
	</div>
	
	<?php else : ?>
	<div class="notfound">
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that is not here.</p>
	</div>
	<?php endif; ?>

</div>
<!-- END content -->

<?php get_sidebar(); get_footer(); ?>
