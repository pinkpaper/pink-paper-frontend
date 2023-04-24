<?php
require_once 'connection.php';

if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['user_address'])) {
    $data = array();
    $user_address = mysqli_real_escape_string($link, $_POST['user_address']);

    $sql = "SELECT * FROM `user_login` WHERE metamask_address='$user_address'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data['username'] = $row['username'];
            $data['name'] = $row['name'];
            $data['metamask_address'] = $row['metamask_address'];
            $data['status'] = 201;
            echo json_encode($data);
        }
    } else {
        $data['status'] = 301;
        $data['success'] = "User Not Found";
        echo json_encode($data);
    }
} else {
    $data['status'] = 404;
    $data['success'] = "like";
    echo json_encode($data);
}