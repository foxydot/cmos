<?php

require '../../../../wp-load.php';

$out = '';

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_start();
}

if (file_exists('fonts.css')) {
	include 'fonts.css';
}

include 'base.css';
include 'required.css';
include 'layout.css';
include 'header.css.php';

if (file_exists('headbar.css')) {
	include 'headbar.css';
}

include 'navigation.css';
include 'content.css';
include 'content-comments.css';
include 'pagination.css';
include 'sidebar.css';

if (file_exists('footbar.css')) {
	include 'footbar.css';
}

include 'footer.css';
include 'jquery.cycle.css.php';

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	$out = ob_get_clean();
}

$compress = (isset($_GET['c']) && $_GET['c']);
$force_gzip = ($compress && 'gzip' == $_GET['c']);
$expires_offset = 31536000;

header('Content-Type: text/css');
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
