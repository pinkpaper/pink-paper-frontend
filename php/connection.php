<?php 
//localhost
$link = mysqli_connect('localhost', 'root', '', 'blog_cms_new');
// test link
// $link = mysqli_connect('localhost', 'ether_cms', 'WL02XE056L5j', 'ether_cms');

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['SERVER_NAME'].'/pinkpaper-mainnet/';



// $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['SERVER_NAME'];
?>