<?php
function is_buggy_IE() {
	$ret = false;
	$agent = $_SERVER ['HTTP_USER_AGENT'];
	if (strpos ( $agent, 'Mozilla/4.0 (compatible; MSIE ' ) === 0 && strpos ( $agent, 'Opera' ) === false) {
		$version = floatval ( substr ( $agent, 30 ) );
		if ($version < 6) {
			$ret = true;
		} else if ($version == 6 && strpos ( $agent, 'SV1' ) === false) {
			$ret = true;
		}
	}
	return $ret;
}

if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') && !is_buggy_IE()) ob_start("ob_gzhandler");
else ob_start();

$files = array(
    'vendor/modernizr-2.7.2.custom.min.js',
    'vendor/lightbox-2.7.1.min.js',
    'vendor/jquery.carouFredSel-6.2.1-packed.js',
		'isotope.pkgd.min.js',
	//'externe_blank.js',
	'application.js',
);

$cache = 'cache.js';

$time = mktime ( 0, 0, 0, 21, 5, 1980 );

foreach ( $files as $file ) {
	$fileTime = filemtime ( $file );

	if ($fileTime > $time) {
		$time = $fileTime;
	}
}

if (file_exists ( $cache )) {
	$cacheTime = filemtime ( $cache );
	if ($cacheTime < $time) {
		$time = $cacheTime;
		$recache = true;
	} else {
		$recache = false;
	}
} else {
	$recache = true;
}

if (! $recache && isset ( $_SERVER ['If-Modified-Since'] ) && strtotime ( $_SERVER ['If-Modified-Since'] ) >= $time) {
	header ( "HTTP/1.0 304 Not Modified" );
} else {
	header ( 'Content-type: application/javascript' );
	header ( 'Last-Modified: ' . gmdate ( "D, d M Y H:i:s", $time ) . " GMT" );

	if ($recache) {

		$js = '';

		foreach ( $files as $file ) {
			$js .= file_get_contents ( $file );
		}

		file_put_contents ( $cache, $js );
		echo $js;
	} else {
		readfile ( $cache );
	}
}
 ?>
