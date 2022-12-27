<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['name'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("20y-m-d");
    
  
    function guidv4($data)
    {
        assert(strlen($data) == 16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
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
        $bio = mysqli_real_escape_string($link, $_POST['bio']);
                $username_status = mysqli_real_escape_string($link, $_POST['email_status']);
                $account_status = mysqli_real_escape_string($link, $_POST['account_status']);
                $from_ip= $_SERVER['REMOTE_ADDR'];
                $from_browser= $_SERVER['HTTP_USER_AGENT'];
                $query = "INSERT INTO `user_login`(`user_uid`,`name`,`username`,`email`,`password`,`profile`,`bio`,`email_status`,`account_status`,`from_ip`,`from_browser`, `created_at`) VALUES ('$user_uid','$name','$username','$username','$password','$image','$bio','$username_status','$account_status','$from_ip','$from_browser','$date_now')";

                  
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