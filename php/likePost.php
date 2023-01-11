<?php
require "connection.php";

if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['user_uid'])) {
    

    $data = array();
   /*  date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r"); */
    $post_uid = mysqli_real_escape_string($link, $_POST['post_uid']);
    $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
  
               /*  $tag_name = mysqli_real_escape_string($link, $_POST['tag_name']);
                $query2 = "SELECT * from tags where tag_name ='" . $tag_name . "'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = "Tag Already exist";
                    echo json_encode($data);
                }
                else{   */       
            
                $query = "INSERT INTO `post_like`(`user_uid`, `post_uid`) VALUES ('$user_uid','$post_uid')";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "like";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
         
            /* } */
        
     
  
 
   

    
   
       


}