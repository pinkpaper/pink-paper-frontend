<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['post_uid'])) {
    
    //session_start();
    $data = array();

    $post_uid = mysqli_real_escape_string($link, $_POST['post_uid']);
    $post_status = 'deleted';
    
    //$query = "DELETE FROM `sidebar` WHERE id = '$image_id' ";
    $query = "UPDATE `stories` SET `post_status`='$post_status' WHERE `post_uid`='$post_uid'";
        
    if (mysqli_query($link, $query)) {

        $data['status'] = 201;
        $data['success'] = "Tag deleted";
        echo json_encode($data);
    } else {
        $data['status'] = 301;
        $data['error'] = 'Error';
        echo json_encode($data);
    }
}