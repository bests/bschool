<?php
define('MEMCACHED_HOST', '127.0.0.1');
define('MEMCACHED_PORT', '11211');
 
// Connection creation
$memcache = new Memcache;
$cacheAvailable = $memcache->connect(MEMCACHED_HOST, MEMCACHED_PORT);
?>
   