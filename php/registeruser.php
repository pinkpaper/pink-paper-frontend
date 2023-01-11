<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['name'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("20y-m-d");
    
  
    
    $user_uid = guidv4(openssl_random_pseudo_bytes(16));
$name = mysqli_real_escape_string($link, $_POST['name']);
$username = mysqli_real_escape_string($link, $_POST['username']);

    
                $passwor = mysqli_real_escape_string($link, $_POST['password']);
                
                
        $password = password_hash($passwor, PASSWORD_BCRYPT);
        if (isset($_FILES["profile"]["name"])) {
            $target_dir = "../../uploads/profile/";
            $temp = explode(".", $_FILES["profile"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $target_file = $target_dir . basename($newfilename);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
            $image = mysqli_real_escape_string($link, basename($newfilename));
            $image = $image;
        } else {
            $image = '';
        }
                $from_ip= $_SERVER['REMOTE_ADDR'];
                $from_browser= $_SERVER['HTTP_USER_AGENT'];
                $query = "INSERT INTO `user_login`(`user_uid`,`name`,`username`,`email`,`password`,`profile`,`from_ip`,`from_browser`, `created_at`) VALUES ('$user_uid','$name','$username','$username','$password','$image','$from_ip','$from_browser','$date_now')";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "User added";
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