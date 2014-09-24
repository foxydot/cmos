<?php get_header(); ?>

<div id="blog">
	<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>">
			<a class="comments-link" href="<?php the_permalink() ?>#comments" title="Comments"><?php comments_number('0','1','%'); ?></a>
		
			<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p class="post-meta">Posted on <?php the_time('F j, Y'); ?> by <?php the_author(); ?></p>
			
			<div <?php post_class('') ?>>
				<?php if(has_post_thumbnail()) {?>
				<a href="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 1000,1000 ), false, '' ); echo $src[0]; ?>" class="fancy" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
				<?php } ?>
				<?php the_content('... Continue Reading'); ?>
				<?php edit_post_link( __( 'Edit', 'sideblog' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
		</div> <!-- post -->
		
		<?php endwhile; else : ?>
		
		<div id="nothing-here">			
			<h2>Whoops!!! Nothing Here by That Name</h2>
			
			<div class="page">
				<p>Very sorry, but what you are looking for isn't here. Maybe you should try one of the links below.</p>
				
				<h4 class="not-here">Find Posts by Title:</h4>
				<ul>
				<?php query_posts('&showposts=1000&orderby=title&order=asc'); if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>									
				<?php endwhile; endif; ?> 
				</ul>
				
				<h4 class="not-here">Find Posts by Month:</h4>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
				
				<h4 class="not-here">Find Posts by Category:</h4>
				<ul>
					<?php wp_list_categories('title_li='); ?>
				</ul>
				
				<h4 class="not-here">Maybe a Page:</h4>
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>
			</div> <!-- page -->
		</div> <!-- nothing-here -->
		
		<?php endif; ?>
		
		<?php if(function_exists('sf_pagenavi')) { sf_pagenavi('', '', '', '', 20, false);} ?>
	</div> <!-- main -->
	
	<?php get_sidebar(); ?>
</div> <!-- blog -->

<?php get_footer(); ?>