


<div id="footbar-wrap">
	<div id="footbar">

		<div class="bar bar-1">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?>
			<div class="widget widget_recent_posts">
				<h3 class="title"><?php echo __('Recent Coments', PADD_THEME_SLUG); ?></h3>
				<?php padd_theme_widget_recent_comments(); ?>
			</div><!-- .widget -->

		<?php endif; ?>
		</div> <!-- .bar -->

		<div class="bar bar-2">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?>
			<div class="widget widget_recent_posts">
				<h3 class="title"><?php echo __('Recent Posts', PADD_THEME_SLUG); ?></h3>
				<ul>
					<?php wp_get_archives('title_li=&type=postbypost&limit=5'); ?>
				</ul>
			</div><!-- .widget -->
		<?php endif; ?>
		</div> <!-- .bar -->

		<div class="bar bar-3">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?>
			<div class="widget widget_tags">
				<h3 class="title"><?php echo __('Tags', PADD_THEME_SLUG); ?></h3>
				<?php wp_tag_cloud(); ?>
			</div><!-- .widget -->
		<?php endif; ?>
		</div> <!-- .bar -->

		<div class="bar bar-3">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 4') ) : ?>
			<div class="widget">
				<h3 class="title"><?php echo __('Partners', PADD_THEME_SLUG); ?></h3>
				<p>This is brought to you by <a href="http://www.rent-direct.com/" target="_blank">Rent-Direct.com</a>. For over 15 years, Rent-Direct.com has help New Yorkers
				find No Broker Fee rental apartments in New York Manhattan, Brooklyn, Queens and the Bronx.</p>
			</div><!-- .widget -->
		<?php endif; ?>
		</div> <!-- .bar -->

		<div class="clear"></div>

	</div><!-- #footbar -->
</div><!-- #footbar-wrap -->