<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['msg_description'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    
    $id=1;
  
                $msg = mysqli_real_escape_string($link, $_POST['msg_description']);
            
                $query = "UPDATE `about` SET `about_us`='$msg',`Udated_at`='$date_now'
                WHERE id=$id";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Tag added";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
         }