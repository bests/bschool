<?php
require_once("phpfastcache/phpfastcache.php");


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
if($caching == true ) {
   $html = __c("files")->get($keyword_webpage);
}


if($html == null) {
	//echo "<h1>not cahced</h1><br><br>";
    ob_start();
    include("worldfastinc.php");

     $html = ob_get_contents();
    // Save to Cache 30 minutes
    __c("files")->set($keyword_webpage,$html, 1800);
  }else {
//echo "<h1>cahced</h1>";
  	echo $html;
  	
  }
   


?>
   