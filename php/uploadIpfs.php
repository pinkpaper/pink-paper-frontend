<?php
require "connection.php";
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['postUid'])) {    
    $data = array();    
    $post_uid = mysqli_real_escape_string($link, $_POST['postUid']);
    $ipfs_url = mysqli_real_escape_string($link, $_POST['ipfs_url']);

    $query = "UPDATE `stories` SET `blog_ipfs_url`= '$ipfs_url'  WHERE post_uid='$post_uid'";

    if (mysqli_query($link, $query) ) {
        $data['status'] = 201;
        $data['success'] = "status updated";
        echo json_encode($data);
    } else {
        $data['status'] = 301;
        $data['error'] = 'Error';
        echo json_encode($data);
    }
}
?>