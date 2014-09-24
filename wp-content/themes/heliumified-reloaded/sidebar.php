
<div class="sidebar">

	<h2><?php echo __('Sidebar', PADD_THEME_SLUG) ?></h2>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Top') ) : ?>

	<?php endif; ?>

	<div class="widget widget_search">
		<h3 class="title"><?php echo __('Search', PADD_THEME_SLUG); ?></h3>
		<?php get_search_form(); ?>
	</div>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Bottom') ) : ?>

	<div class="widget popular-posts">
		<h3 class="title"><?php echo __('Most Popular', PADD_THEME_SLUG); ?></h3>
		<?php padd_theme_widget_wpp(); ?>
	</div>

	<div class="widget widget_socialnet">
		<h3 class="title"><?php echo __('Subscribe', PADD_THEME_SLUG); ?></h3>
		<?php padd_theme_widget_socialnet(); ?>
	</div>

	<div class="widget widget_flickrRSSRU">
		<h3 class="title"><?php echo __('Featured Photos', PADD_THEME_SLUG); ?></h3>
		<?php
			if (function_exists('get_flickrRSSRU')) {
				get_flickrRSSRU(array('num_items' => 6));
			} else {
				echo '<p>Please install the <a target="_blank" href="http://wordpress.org/extend/plugins/flickrrss-ru/">flickrRSSRU</a> WordPress plugin.</p>';
			}
		?>
	</div>

	<div class="widget widget_meta">
		<h3 class="title"><?php echo __('Meta', PADD_THEME_SLUG); ?></h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</div>
	<?php endif; ?>


	<div class="bottom"></div>
</div>


