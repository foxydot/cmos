		<div id="footer">
			<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer' ) ); ?>
			<div id="footer-content">
			<?php if (get_option(THEME_PREFIX . "copy_text")) { ?>
				<h3>Copyright <?php echo date("Y"); ?> <?php echo get_option(THEME_PREFIX . "copy_text"); ?> - All Rights Reserved</h3>
			<?php } ?>
			
			<?php if (get_option(THEME_PREFIX . "footer_text")) : ?>
				<p><?php echo get_option(THEME_PREFIX . "footer_text"); ?></p>
			<?php else : ?>
				<p>Site Design by: <a href="http://www.press75.com/" title="Press75.com" >Press75.com</a> | Powered by: <a href="http://www.wordpress.org/" target="_blank" title="WordPress.org">WordPress</a></p>
			<?php endif; ?>
			</div>
						
			<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
		</div> <!-- footer -->
	</div> <!-- content -->
	
	<?php wp_footer(); ?>
	
	<?php if (get_option(THEME_PREFIX . "no_ie")) { ?>
	<!--[if IE 6]>
	<script type="text/javascript"> 
		/*Load jQuery if not already loaded*/ if(typeof jQuery == 'undefined'){ document.write("<script type=\"text/javascript\"   src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></"+"script>"); var __noconflict = true; } 
		var IE6UPDATE_OPTIONS = {
			icons_path: "http://static.ie6update.com/hosted/ie6update/images/"
		}
	</script>
	<script type="text/javascript" src="http://static.ie6update.com/hosted/ie6update/ie6update.js"></script>
	<![endif]-->
	<?php } ?>
</body>
</html>