<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['comment_id'])) {
    
    $data = array();
    
    $comment_id = mysqli_real_escape_string($link, $_POST['comment_id']);

    $query = "DELETE FROM `post_comments` WHERE `comment_id` = '$comment_id' ";

    if (mysqli_query($link, $query) ) {
        $data['status'] = 201;
        $data['success'] = "deleted";
        echo json_encode($data);
    } else {
        $data['status'] = 301;
        $data['error'] = 'Error';
        echo json_encode($data);
    }
}



?>