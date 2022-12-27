<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['comment'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    
                $id=rand(0,1000000000000000);
                $comment_uid = hash("sha512", $id);
                $comment = mysqli_real_escape_string($link, $_POST['comment']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $post_uid = mysqli_real_escape_string($link, $_POST['post_uid']);
               $commentstatus= "active";
               $from_ip= $_SERVER['REMOTE_ADDR'];
                $from_browser= $_SERVER['HTTP_USER_AGENT'];
                
                $query = "INSERT INTO `post_comments`(`comment`,`comment_uid`,`post_uid`,`user_uid`,
                `status`,`from_ip`,`from_browser`, `created_at`) 
                VALUES ('$comment','$comment_uid','$post_uid','$user_uid',
                '$commentstatus','$from_ip','$from_browser','$date_now')";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "added";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
}