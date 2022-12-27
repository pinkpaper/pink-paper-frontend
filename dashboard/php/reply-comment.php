<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['rcomment'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    
                $uid=mysqli_real_escape_string($link, $_POST['comment_id']);
                $rcomment = mysqli_real_escape_string($link, $_POST['rcomment']);
                $sid=rand(0,1000000000000000000);
                $subcomment_uid = hash("sha512", $sid);
                $query1="SELECT * FROM post_comments WHERE comment_uid='".$uid."'";
                $res=mysqli_query($link,$query1);
                $row=mysqli_fetch_array($res);
               $postuid= $row['post_uid'];
               $useruid= $row['user_uid'];
               $subcommentstatus= "active";
               $from_ip= $_SERVER['REMOTE_ADDR'];
                $from_browser= $_SERVER['HTTP_USER_AGENT'];
                
                $query = "INSERT INTO `post_subcomments`(`subcomment`,`subcomment_uid`,`post_uid`,`user_uid`,`comment_uid`,`subcomment_status`,`from_ip`,`from_browser`, `created_at`) 
                VALUES ('$rcomment','$subcomment_uid','$postuid','$useruid','$uid','$subcommentstatus','$from_ip','$from_browser','$date_now')";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Tag added";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
         
            
        
     
  
 
   

    
   
       
    //backup data start //
            
    // $query1 = "INSERT INTO `user_data_history`(`user_uid`,`username`, `password`,`name`,`phone`,`fixed reduction`,`sql_operation`,`updated_by`,`from_ip`,`from_browser`,`time`) VALUES ('$user_uid','$username', '$hashed_password','$name','$phone','$fixed_reduction','insert','".$_SESSION['userlogin']."','$from_ip','$from_browser','$date_now')";                
       
    //backup data end // 
  

}