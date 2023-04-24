<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
date_default_timezone_set('Asia/Calcutta'); 
$date_now = date("Y-m-d H:i");
$query = "SELECT * FROM `stories` WHERE `post_status` = 'schedule'";
$result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $time =  $row['schedule_time'];
            $now = new DateTime("now");
            $past = new DateTime($time);
        if($past < $now) {
        $post_id = $row['post_id'];
        $link->query("UPDATE `stories` SET `post_status` = 'published',`schedule_time`='',`created_at`='$date_now',`updated_at`='$date_now' WHERE `post_id` = '$post_id'");
        }
    }
}

?>