<?php get_header(); ?>

<!-- Begin #colleft -->
			<div id="colLeft">
			<h1><?php the_title(); ?></h1>	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php the_content(); ?>
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
			
			</div>
			<!-- End #colLeft -->
			

<?php get_sidebar(); ?>	
<?php get_footer(); ?>