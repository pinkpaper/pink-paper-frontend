<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['subcomment'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    
  
                $subcomment = mysqli_real_escape_string($link, $_POST['subcomment']);
                $subcomment_uid = mysqli_real_escape_string($link, $_POST['subcomment_id']);
                
                $query = "UPDATE `post_subcomments` SET `subcomment`='$subcomment'WHERE `subcomment_uid`='$subcomment_uid' ";

                  
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