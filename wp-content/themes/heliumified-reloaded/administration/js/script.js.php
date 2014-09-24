<?php

require '../../../../../wp-load.php';

$out = '';

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_start();
}

?>
function padd_admintabs_init() {
	if (!jQuery("#padd-admin-tabs").length) {
		return;
	}

	var jQversion = undefined == jQuery.ui ? [0,0,0] : undefined == jQuery.ui.version ? [0,1,0] : jQuery.ui.version.split('.');
	switch(true) {
		case jQversion[0] >= 1 && jQversion[1] >= 7:
			jQuery("#padd-admin-tabs").tabs();
			break;
		default:
			jQuery("#padd-admin-tabs > ul").tabs();
	}
}

jQuery(document).ready(function() {
	padd_admintabs_init();
	var popswitch = 0;

	<?php
		echo $padd_options['general'][0]->get_js_upload_click();
		echo $padd_options['general'][1]->get_js_upload_click();
		echo $padd_options['background'][2]->get_js_upload_click();
	?>

	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		switch (popswitch) {
			<?php
				echo $padd_options['general'][0]->get_js_upload_switch();
				echo $padd_options['general'][1]->get_js_upload_switch();
				echo $padd_options['background'][2]->get_js_upload_switch();
			?>
		}
		popswitch = 0;
		tb_remove();
	}

	if (!jQuery('#featured_page_show').is(':checked')) {
		jQuery('#tr-featured_page_id').hide();
	}
	jQuery('#featured_page_show').click(function () {
		if (jQuery('#featured_page_show').is(':checked')) {
			jQuery('#tr-featured_page_id').fadeIn(1000);
		} else {
			jQuery('#tr-featured_page_id').fadeOut(1000);
		}
	});

	if (!jQuery('#home_widgets_show').is(':checked')) {
		jQuery('#tr-post_1_page_id').hide();
		jQuery('#tr-post_2_page_id').hide();
		jQuery('#tr-post_3_page_id').hide();
	}
	jQuery('#home_widgets_show').click(function () {
		if (jQuery('#home_widgets_show').is(':checked')) {
			jQuery('#tr-post_1_page_id').fadeIn(1000);
			jQuery('#tr-post_2_page_id').fadeIn(1000);
			jQuery('#tr-post_3_page_id').fadeIn(1000);
		} else {
			jQuery('#tr-post_1_page_id').fadeOut(1000);
			jQuery('#tr-post_2_page_id').fadeOut(1000);
			jQuery('#tr-post_3_page_id').fadeOut(1000);
		}
	});

	if (jQuery('#background_mode').val() == 'R') {
		jQuery('#tr-background_tile').show();
		jQuery('#tr-background_url').hide();
	} else {
		jQuery('#tr-background_tile').hide(1000);
		jQuery('#tr-background_url').show(1000);
	}
	jQuery('#background_mode').change(function () {
		if (jQuery('#background_mode').val() == 'R') {
			jQuery('#tr-background_tile').fadeIn(1000);
			jQuery('#tr-background_url').fadeOut(1000);
		} else {
			jQuery('#tr-background_tile').fadeOut(1000);
			jQuery('#tr-background_url').fadeIn(1000);
		}
	});

});

<?php

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	$out = ob_get_clean();
}


$compress = (isset($_GET['c']) && $_GET['c']);
$force_gzip = ($compress && 'gzip' == $_GET['c']);
$expires_offset = 31536000;

header('Content-Type: application/x-javascript; charset=UTF-8');
header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
header("Cache-Control: public, max-age=$expires_offset");

if ( $compress && ! ini_get('zlib.output_compression') && 'ob_gzhandler' != ini_get('output_handler') && isset($_SERVER['HTTP_ACCEPT_ENCODING']) ) {
	header('Vary: Accept-Encoding'); // Handle proxies
	if ( false !== strpos( strtolower($_SERVER['HTTP_ACCEPT_ENCODING']), 'deflate') && function_exists('gzdeflate') && ! $force_gzip ) {
		header('Content-Encoding: deflate');
		$out = gzdeflate( $out, 3 );
	} elseif ( false !== strpos( strtolower($_SERVER['HTTP_ACCEPT_ENCODING']), 'gzip') && function_exists('gzencode') ) {
		header('Content-Encoding: gzip');
		$out = gzencode( $out, 3 );
	}
}

echo $out;