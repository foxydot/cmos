<?php

require '../../../../wp-load.php';

$out = '';

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_start();
}

include 'jquery.superfish.js';
echo "\n\n\n";
?>

function padd_toggle(classname,value) {
	jQuery(classname).focus(function() {
		if (value == jQuery(classname).val()) {
			jQuery(this).val('');
		}
	});
	jQuery(classname).blur(function() {
		if ('' == jQuery(classname).val()) {
			jQuery(this).val(value);
		}
	});
}

jQuery(document).ready(function() {
	jQuery.noConflict();

	jQuery('#menubar > ul').superfish({
		autoArrows: false,
		hoverClass: 'hover',
		speed: 500,
		animation: { opacity: 'show', height: 'show' }
	});

	jQuery('input#s').val('<?php echo __('Enter Search', PADD_THEME_SLUG); ?>');
	padd_toggle('input#s','<?php echo __('Enter Search', PADD_THEME_SLUG); ?>');
	jQuery('div.search form').click(function () {
		jQuery('input#s').focus();
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
