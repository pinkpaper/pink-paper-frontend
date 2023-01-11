<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
	die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['following_user_uid'])) {



    $following_user_uid = mysqli_real_escape_string($link, $_POST['following_user_uid']);
    $followed_user_uid =  mysqli_real_escape_string($link, $_POST['followed_user_uid']);
       
            
     $query = "DELETE FROM `follow` WHERE `following_user_uid`='$following_user_uid' AND `followed_user_uid`='$followed_user_uid'";

                  
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