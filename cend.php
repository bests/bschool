<?php
 // GET HTML CONTENT
if($html == null) {
   
    $html = ob_get_contents();
    // Save to Cache 30 minutes
    __c("files")->set($keyword_webpage,$html, 1800);
}

echo $html;

   ?>