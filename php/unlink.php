<?php 
require_once 'connection.php';

$sql = "SELECT * FROM `stories` WHERE post_id = '4'";
$run_Sql = mysqli_query($link, $sql);
$fetch_info = mysqli_fetch_assoc($run_Sql);
$old_image = $fetch_info['featured_image'];
echo $old_image;
    //unlink('../uploads/featuredImages/1640545414.png');
?>