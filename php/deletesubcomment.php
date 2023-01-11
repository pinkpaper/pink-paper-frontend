<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['subcomment_uid'])) {
    
    $data = array();
    
    $subcomment_uid = mysqli_real_escape_string($link, $_POST['subcomment_uid']);

    $query = "DELETE FROM `post_subcomments` WHERE `subcomment_uid` = '$subcomment_uid' ";

    if (mysqli_query($link, $query) ) {
        $data['status'] = 201;
        $data['success'] = "subcomment deleted";
        echo json_encode($data);
    } else {
        $data['status'] = 301;
        $data['error'] = 'Error';
        echo json_encode($data);
    }
}



?>