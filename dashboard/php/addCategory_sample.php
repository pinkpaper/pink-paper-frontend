<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['category_name'])) {
    session_start();

    $data = array();
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    // This function will return a random 
        // string of specified length 
        // function random_strings($length_of_string) { 
            
        //     // md5 the timestamps and returns substring 
        //     // of specified length 
        //     return substr(md5(time()), 0, $length_of_string); 
        // } 
        function guidv4($data)
        {
            assert(strlen($data) == 16);

            $data[6] = chr(ord($data[6]) && 0x0f | 0x40); // set version to 0100
            $data[8] = chr(ord($data[8]) && 0x3f | 0x80); // set bits 6-7 to 10

            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        }
        

        // This function will generate  
        // Random string of length 10 
      
  
                $category_id = guidv4(openssl_random_pseudo_bytes(16)); 
                $category_name = mysqli_real_escape_string($link, $_POST['category_name']);
                $category_slug = mysqli_real_escape_string($link, $_POST['category_slug']);
                $category_description = mysqli_real_escape_string($link, $_POST['category_description']);
                $extra_description = mysqli_real_escape_string($link, $_POST['extra_description']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
  
            
                $query = "INSERT INTO `articles_category`(`category_id`, `category_name`, `category_slug`, `from_ip`, `from_browser`, `created_at`,`category_description`,`extra_description`, `added_by`) VALUES ('$category_id','$category_name','$category_slug','$from_ip','$from_browser','$date_now','$category_description','$extra_description','$user_uid')";

                  
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