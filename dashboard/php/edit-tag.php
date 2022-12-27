<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['tag_name'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    
  
                $tag_name = mysqli_real_escape_string($link, $_POST['tag_name']);
                $tag_id = mysqli_real_escape_string($link, $_POST['tag_id']);
                $query2 = "SELECT * from tags where tag_name ='" . $tag_name . "'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = "Tag Already exist";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `tags` SET `tag_name`='$tag_name', `updated_at`='$date_now' WHERE `tag_id`='$tag_id' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Tag Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }
}