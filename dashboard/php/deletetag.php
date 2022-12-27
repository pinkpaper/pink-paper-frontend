<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['tag_id'])) {
    
    $data = array();
    
    $tag_id = mysqli_real_escape_string($link, $_POST['tag_id']);

    $query = "DELETE FROM `tags` WHERE `tag_id` = '$tag_id' ";

    if (mysqli_query($link, $query) ) {
        $data['status'] = 201;
        $data['success'] = "tag deleted";
        echo json_encode($data);
    } else {
        $data['status'] = 301;
        $data['error'] = 'Error';
        echo json_encode($data);
    }
}



?>