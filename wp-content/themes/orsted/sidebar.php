<!-- BEGIN sidebar -->
	<div id="sidebar">
	
		<?php if ( !function_exists('dynamic_sidebar')
		|| !dynamic_sidebar(1) ) : ?>
	
		<!-- begin subscription options -->
		<div class="box">
		<h2>Subscription Options</h2>
		<ul class="subscribe">
		<li class="rss"><a href="#">RSS</a></li>
		<li class="mail"><a href="#">Mail</a></li>
		<li class="twitter"><a href="#">Twitter</a></li>
		<li class="facebook"><a href="#">Facebook</a></li>
		<li class="delicious"><a href="#">Delicious</a></li>
		<li class="stumbleupon"><a href="#">StumbleUpon</a></li>
		</ul>
		<div class="ads">
		
	<a href="http://tiny.cc/l7qf4"><img src="http://tracking.hostgator.com/img/Shared/125x125.gif" alt="Advertisement" /></a>
	<a href="http://wpcorner.com"><img src="<?php bloginfo('template_url'); ?>/images/ad125x125.gif" alt="Advertisement" /></a>
	<a href="http://wpcorner.com"><img src="<?php bloginfo('template_url'); ?>/images/ad125x125.gif" alt="Advertisement" /></a>
	<a href="http://tiny.cc/l7qf4"><img src="http://tracking.hostgator.com/img/Shared/125x125.gif" alt="Advertisement" /></a>		</div>
		</div>
		<!-- end subscription options -->
		
		<!-- begin search -->
		<div class="box">
		<h2>Search</h2>
		<form action="<?php echo get_option('home'); ?>/">
		<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" />
		<button type="submit">Search</button>
		</form>
		</div>
		<!-- end search -->
		
		<!-- begin popular articles -->
		<div class="box">
		<h2>Popular Articles</h2>
		<ul class="popular">
		<?php dp_popular_posts(4); ?>
		</ul>
		<div class="break"></div>
		</div>
		<!-- end popular articles -->
		
		<!-- begin flickr photos -->
		<div class="box">
		<h2>Flickr Photos</h2>
		<div class="flickr">
		<?php if (function_exists('get_flickrRSS')) get_flickrRSS(); ?>
		</div>
		</div>
		<!-- end flickr photos -->
		
		<!-- begin featured video -->
		<div class="box">
		<h2>Featured Video</h2>
		<div class="video">
		<script type="text/javascript">showVideo('<?php echo dp_settings("youtube") ?>');</script>
		</div>
		</div>
		<!-- end featured video -->
		
		<!-- begin tag cloud -->
		<div class="box">
		<h2>Tag Cloud</h2>
		<div class="tags">
		<?php wp_tag_cloud(); ?>
		</div>
		</div>
		<!-- end tag cloud -->
		
		<?php endif; ?>
	
	</div>
	<!-- END sidebar -->

</div>
<!-- END wrapper -->

<!-- BEGIN footer 1 -->
<div id="footer1"><div class="wrapper">

	<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar(2) ) : ?>

	<!-- begin categories -->
	<div class="box">
	<h2>Categories</h2>
	<ul>
	<?php wp_list_categories('title_li='); ?>
	</ul>
	</div>
	<!-- end categories -->
	
	<!-- begin pages -->
	<div class="box">
	<h2>Pages</h2>
	<ul>
	<?php dp_list_pages(); ?>
	</ul>
	</div>
	<!-- end pages -->
	
	<!-- begin blogroll -->
	<div class="box">
	<?php wp_list_bookmarks('category_before=&category_after=&title_before=<h2>&title_after=</h2>'); ?>
	</div>
	<!-- end blogroll -->
	
	<!-- begin archives -->
	<div class="box">
	<h2>Archives</h2>
	<ul>
	<?php wp_get_archives('type=monthly'); ?>
	</ul>
	</div>
	<!-- end archives -->
	
	<!-- begin meta -->
	<div class="box">
	<h2>Meta</h2>
	<ul>
	<?php wp_register(); ?>
	<li><?php wp_loginout(); ?></li>
	<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
	<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
	<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
	<?php wp_meta(); ?>
	</ul>
	</div>
	<!-- end meta -->
	
	<?php endif; ?>
	
	<div class="break"></div>

</div></div>
<!-- END footer 1 -->
