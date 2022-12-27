<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['meta_id'])) {
    
    $data = array();
    
    $meta_id = mysqli_real_escape_string($link, $_POST['meta_id']);

    $query = "UPDATE `metamask_details`SET `meta_status`='active' WHERE meta_id=$meta_id";

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