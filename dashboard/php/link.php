<?php
// local host link
// $link = mysqli_connect("localhost", "root", "", "blog_cms_new");
$link = mysqli_connect('localhost', 'pink_main', 'P7lPdzlLkUZY', 'pink_main');

if (mysqli_connect_error()){
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
?>