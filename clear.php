<?php
require_once("phpfastcache/phpfastcache.php");

$cache = phpFastCache("files");


// keyword = Webpage_URL
$keyword_webpage = md5($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']);
//echo $keyword_webpage;
$html = null;
$caching = true;

// no caching for some special page;
// $_SERVER['REQUEST_URI'];
//if(strpos($_SERVER['REQUESR_URI'],"contact") !== false || strpos($_SERVER['REQUESR_URI'],"login") !== false  || strpos($_SERVER['REQUESR_URI'],"register") !== false  ) {
   // $caching = false;
//}


// ONLY ACCESS CACHE IF $CACHE = TRUE

$cache->clean();

?>
   