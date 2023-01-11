<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['first_name'])) {
    // session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");

    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
   
    
    function guidv4($data)
    {
        assert(strlen($data) == 16);

        $data[6] = chr(ord($data[6]) && 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) && 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    
   
    $message_uid=guidv4(openssl_random_pseudo_bytes(16));
  
    $first_name =$_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $message = $_POST['message'];

    $query = "INSERT INTO contact_us(`message_uid`, `first_name`, `last_name`, `email`, `message`, `from_ip`, `from_browser`,`created_at`) VALUE 
    ('$message_uid','$first_name', '$last_name','$username','$message','$from_ip','$from_browser','$date_now')";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Message Sent";
                    echo json_encode($data);
                }
                // }else if ( $data['status'] == 501) {
                
                //     echo("Already Sent the message");
    
                // } 
                
                else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }

            }



