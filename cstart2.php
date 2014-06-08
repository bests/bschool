<?php
require_once("phpfastcache/phpfastcache.php");

$config = array(
        /*
         * Default storage
         * if you set this storage => "files", then $cache = phpFastCache(); <-- will be files cache
         */
        "storage"   =>  "memcache", // files, sqlite, auto, apc, wincache, xcache, memcache, memcached,

        /*
         * Default Path for Cache on HDD
         * Use full PATH like /home/username/cache
         * Keep it blank "", it will automatic setup for you
         */
        "path"      =>  "" , // default path for files
        "securityKey"   =>  "", // default will good. It will create a path by PATH/securityKey

        /*
         * FallBack Driver
         * Example, in your code, you use memcached, apc..etc, but when you moved your web hosting
         * The new hosting don't have memcached, or apc. What you do? Set fallback that driver to other driver.
         */
        "fallback"  =>  array(
                "example"   =>  "files",
                "memcache"  =>  "files",
                "apc"       =>  "sqlite",
        ),

        /*
         * .htaccess protect
         * default will be  true
         */
        "htaccess"  =>  true,

        /*
         * Default Memcache Server for all $cache = phpFastCache("memcache");
         */
        "server"        =>  array(
                array("127.0.0.1",11211,1),
            //  array("new.host.ip",11211,1),
        ),
);

phpFastCache::setup($config);
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
   