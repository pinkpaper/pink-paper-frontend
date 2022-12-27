<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['id'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    
  
                $id = mysqli_real_escape_string($link, $_POST['id']);
                $subject = mysqli_real_escape_string($link, $_POST['subject']);
                $message = mysqli_real_escape_string($link, $_POST['msg_description']);
                $query = "SELECT * from contact_us where id ='" . $id . "'";
                        $result = mysqli_query($link, $query);
                        $row = mysqli_fetch_array($result);

                $username = $row['username'];
                mail($email,$subject,$message);
                  
                if (mail($email,$subject,$message) ) {

                    $data['status'] = 201;
                    $data['success'] = "mail sent";
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