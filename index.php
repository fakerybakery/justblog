<?php
/*
     __         __  ___  __         
 __ / /_ _____ / /_/ _ )/ /__  ___ _
/ // / // (_-</ __/ _  / / _ \/ _ `/
\___/\_,_/___/\__/____/_/\___/\_, / 
                             /___/  
                             
A simple, no-hassle blogging platform for PHP 7 and 8.

Made by mrfakename (www.mrfake.name)

Copyright (c) 2022 mrfakename. All rights reserved.
*/
$blogname='The Justblog Times';
$blogdir='./justblog';

function endsWith($haystack,$needle){$length=strlen($needle);if(!$length){return true;}return substr($haystack,-$length)===$needle;}function scan_dir($dir){$ignored=array('.','..','.png','.jpg','.jpeg','.tiff','.gif','.htaccess','.htpasswd');$files=array();foreach(scandir($dir)as $file){if(in_array($file,$ignored))continue;$files[$file]=filemtime($dir.'/'.$file);}arsort($files);$files=array_keys($files);return($files)?$files:false;} ?><!doctypehtml><html lang="en"><head><meta charset="UTF-8"><title><?=$blogname?></title></head><body><h1><?=$blogname?></h1><?php foreach(scan_dir($blogdir)as $post){if(endsWith($post,'.html')&&($post!=='index.html')): ?><h2><?=get_meta_tags($blogdir.'/'.$post)['title']?></h2><p><?=get_meta_tags($blogdir.'/'.$post)['description']?></p><button onclick='window.open("<?=$blogdir?>/<?=$post?>","_blank","location=yes,height=570,width=520,scrollbars=yes,status=yes")'>View Post</button><?php endif;} ?><p>Powered by <a href="https://github.com/fakerybakery/justblog">JustBlog</a> by mrfakename.</p></body></html>
