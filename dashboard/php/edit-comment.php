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
    
  
                $comment = mysqli_real_escape_string($link, $_POST['comment']);
                $comment_uid = mysqli_real_escape_string($link, $_POST['comment_id']);
                
                $query = "UPDATE `post_comments` SET `comment`='$comment'WHERE `comment_uid`='$comment_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Tag Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            
}