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
    'vendor/bootstrap-3.3.1.min.css', //==> pas possible de charger en CDN les mixins ne marchent pas sinon + fallback délicat
    'vendor/lightbox.css',
    'css3_mixins.css',
    'application.css',
);


$cache = 'cache.css';


function minifyCSS($css) {
    $css = trim($css);
    $css = str_replace("\r\n", "\n", $css);
    $search = array("/\/\*[^!][\d\D]*?\*\/|\t+/", "/\s+/", "/\}\s+/");
    $replace = array(null, " ", "}\n");
    $css = preg_replace($search, $replace, $css);
    $search = array("/;[\s+]/", "/[\s+];/", "/\s+\{\\s+/", "/\\:\s+\\#/", "/,\s+/i", "/\\:\s+\\\'/i", "/\\:\s+([0-9]+|[A-F]+)/i", "/\{\\s+/", "/;}/");
    $replace = array(";", ";", "{", ":#", ",", ":\'", ":$1", "{", "}");
    $css = preg_replace($search, $replace, $css);
    $css = str_replace("\n", null, $css);
    return $css;
}

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
	header ( 'Content-type: text/css' );
	header ( 'Last-Modified: ' . gmdate ( "D, d M Y H:i:s", $time ) . " GMT" );

	if ($recache) {

		$css = '';

		foreach ( $files as $file ) {
			$css .= file_get_contents ( $file );
		}

		require 'lessc.inc.php';
		$less = new lessc();
		echo 'Cache : ' . ENABLE_OVERRIDE_CACHE ;
		if ( defined('ENABLE_OVERRIDE_CACHE') ) {
			$less->setFormatter("compressed");//actif en production
		} else {
			$less->setFormatter("classic");//actif en développement
		}
		$css = $less->compile($css);
		if ( defined('ENABLE_OVERRIDE_CACHE') ) {
			$css = minifyCSS($css);//actif en production pour compresser encore plus
		}
		file_put_contents ( $cache, $css );
        echo $css;

	} else {
		readfile ( $cache );
	}
}
 ?>
