<?php
include("php_fast_cache.php");
phpFastCache::$storage = "auto";

 //ujjju


// keyword = Webpage_URL
$keyword_webpage = md5($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']);
//echo $keyword_webpage;
$html = null;
$caching = true;


// $_SERVER['REQUEST_URI'];
//if(strpos($_SERVER['REQUESR_URI'],"contact") !== false || strpos($_SERVER['REQUESR_URI'],"login") !== false  || strpos($_SERVER['REQUESR_URI'],"register") !== false  ) {
   // $caching = false;
//}


// ONLY ACCESS CACHE IF $CACHE = TRUE
if($caching == true ) {
  $html = phpFastCache::get($keyword_webpage);
}


if($html == null) {
	//echo "<h1>not cahced</h1><br><br>";
    ob_start();
    include("worldbasket.php");

     $html = ob_get_contents();
    // Save to Cache 30 minutes
    phpFastCache::set($keyword_webpage,$html, 1800);
  }else {
//echo $keyword_webpage;
  echo $html;
  	
  }

//phpFastCache::clean();

?>
   