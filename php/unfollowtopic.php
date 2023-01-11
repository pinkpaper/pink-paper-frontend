<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
	die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['user_uid'])) {



    $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
    $topic_req =  mysqli_real_escape_string($link, $_POST['topic_req']);
       
            
     $query = "DELETE FROM `topic_follow` WHERE `user_uid`='$user_uid' AND `topic_follow`='$topic_req'";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "added";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
         
           /*  } */
        
     
  


}