<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['user_uid'])) {
    
    $data = array();
    
    $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);

    $query = "DELETE FROM `user_login` WHERE `user_uid` = '$user_uid' ";

    if (mysqli_query($link, $query) ) {
        $data['status'] = 201;
        $data['success'] = "user deleted";
        echo json_encode($data);
    } else {
        $data['status'] = 301;
        $data['error'] = 'Error';
        echo json_encode($data);
    }
}



?>