<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
	die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['user_uid'])) {


    $data = array();


    $user_uid =  $_POST['user_uid'];
    $topic_req =  $_POST['topic_req'];
  
               /*  $tag_name = mysqli_real_escape_string($link, $_POST['tag_name']);
                $query2 = "SELECT * from tags where tag_name ='" . $tag_name . "'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = "Tag Already exist";
                    echo json_encode($data);
                }
                else{ */         
            
                $query = "INSERT INTO `topic_follow`(`user_uid`,`topic_follow`) VALUES ('$user_uid','$topic_req')";

                  
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