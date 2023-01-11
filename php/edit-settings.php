<?php
require_once 'connection.php';
session_start();

if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['name'])) {
    
    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");
    
  
                $user_name = mysqli_real_escape_string($link, $_POST['name']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from `user_login` where `user_login`.`name` ='$user_name'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = "Username Already exist";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `user_login` SET `user_login`.`name`='$user_name', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Name Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }
}
if (isset($_POST['Bio'])) {


    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");
    
  
                $bio = mysqli_real_escape_string($link, $_POST['Bio']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from `user_login` where `user_login`.`bio` ='$bio'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = " ";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `user_login` SET `user_login`.`bio`='$bio', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Bio Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }

}
if (isset($_POST['username'])) {
    // session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");    
  
                $username = mysqli_real_escape_string($link, $_POST['username']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from `user_login` where `user_login`.`email` ='$username'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = "Email Already exists";
                    echo json_encode($data);
                }
                else{           
                $query = "UPDATE `user_login` SET `user_login`.`email`='$username', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";
                if (mysqli_query($link, $query) ) {
                    $_SESSION['username'] = $username;
                    $data['status'] = 201;
                    $data['success'] = "Name Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }
}

if (isset($_POST['Username'])) {
    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");   
                $username = mysqli_real_escape_string($link, $_POST['Username']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from `user_login` where `user_login`.`username` ='$username'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = " ";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `user_login` SET `user_login`.`username`='$username', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Username Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }

}
if (isset($_POST['Url'])) {
    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");
  
                $Url = mysqli_real_escape_string($link, $_POST['Url']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query2 = "SELECT * from `user_login` where `user_login`.`Url` ='$Url'";
                $result2 = mysqli_query($link, $query2);
                $row = mysqli_fetch_array($result2); 
                if(mysqli_num_rows($result2) > 0){
                    $data['status'] = 501;
                    $data['success'] = " ";
                    echo json_encode($data);
                }
                else{            
            
                $query = "UPDATE `user_login` SET `user_login`.`Url`='$Url', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Username Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }

}

if (isset($_POST['deactivate'])) {
    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");      
    $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $query = "UPDATE `user_login` SET `user_login`.`account_status2`='inactive', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Username Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            }

if (isset($_FILES["profile"]["name"])) {
    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");
    
  
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                          
                    if (isset($_FILES["profile"]["name"])) {
                            $target_dir = "../uploads/profile/";
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
                $query = "UPDATE `user_login` SET `user_login`.`profile`='$image', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Profile Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            

}

/* ----------------------- social media setting start ----------------------- */
if (isset($_POST['social-twitter'])) {
    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");   
                $twitter_url = mysqli_real_escape_string($link, $_POST['social-twitter']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);

                $query = "UPDATE `user_login` SET `user_login`.`twitter_url`='$twitter_url', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                if (mysqli_query($link, $query) ) {
                    $data['status'] = 201;
                    $data['success'] = "Twitter URL Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }           

}

if (isset($_POST['social-instagram'])) {
    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");   
                $instagram_url = mysqli_real_escape_string($link, $_POST['social-instagram']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);

                $query = "UPDATE `user_login` SET `user_login`.`instagram_url`='$instagram_url', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                if (mysqli_query($link, $query) ) {
                    $data['status'] = 201;
                    $data['success'] = "Insragram URL Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }           

}

if (isset($_POST['social-linkedin'])) {
    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");   
                $linkedin_url = mysqli_real_escape_string($link, $_POST['social-linkedin']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);

                $query = "UPDATE `user_login` SET `user_login`.`linkedin_url`='$linkedin_url', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                if (mysqli_query($link, $query) ) {
                    $data['status'] = 201;
                    $data['success'] = "Linkedin URL Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }           

}

if (isset($_POST['social-facebook'])) {
    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now =date("20y-m-d");   
                $facebook_url = mysqli_real_escape_string($link, $_POST['social-facebook']);
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);

                $query = "UPDATE `user_login` SET `user_login`.`facebook_url`='$facebook_url', 
                `updated_at`='$date_now' WHERE `user_login`.`user_uid`='$user_uid' ";

                if (mysqli_query($link, $query) ) {
                    $data['status'] = 201;
                    $data['success'] = "Facebook URL Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }           

}