<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['user_uid'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    
  
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from metamask_details where user_uid ='" . $user_uid . "'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if($row['meta_status'] =="active"){
                    $query = "UPDATE `metamask_details` SET `meta_status`='inactive' WHERE
                    `user_uid`='$user_uid' ";
 if (mysqli_query($link, $query) ) {
    $data['status'] = 201;
    $data['success'] = "Status Updated to inactive";
    echo json_encode($data);
}
       else{
        $data['status'] = 201;
        $data['success'] = "Statusive";
        echo json_encode($data);
       }         
                               }
                else{            
            
                    $query = "UPDATE `metamask_details` SET `meta_status`='active' WHERE
                    `user_uid`='$user_uid' ";
                    if (mysqli_query($link, $query) ) {
                        $data['status'] = 301;
                        $data['success'] = "Status Updated to active";
                        echo json_encode($data);
                    }
            }
}