<?php

// Widget Settings

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="box-right">', 
	'after_widget' => '</div>', 
	'before_title' => '<h4>', 
	'after_title' => '</h4>', 
	));
	
function widget_webdemar_search() {
?>
    	<div class="box-right">
		<h4>Search</h4>
			<div id="searchform">
				<form method="get" action="<?php bloginfo('url'); ?>/">
					<input type="text" value="search..." onfocus="if (this.value == 'search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'search...';}" name="s" id="search" />
					<input type="submit" id="search-submit" name="submit" value="GO" />
				</form>
			</div>
		</div>
	
<?php
}

if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_webdemar_search');

?>