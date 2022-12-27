<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['post_title'])) {
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
    $post_uid = guidv4(openssl_random_pseudo_bytes(16));
$username = mysqli_real_escape_string($link, $_POST['user_uid']);
$query="SELECT * FROM user_login WHERE username= '". $username ."'";
$result=mysqli_query($link,$query);
$row = mysqli_fetch_array($result);
if(mysqli_num_rows($result)>0)
{


$user_uid=$row['user_uid'];

                $post_title = mysqli_real_escape_string($link, $_POST['post_title']);
                $post_content = mysqli_real_escape_string($link, $_POST['post_content']);
                if (isset($_FILES["featured_image"]["name"])) {
                    $target_dir = "../../uploads/featuredImages/";
                    $temp = explode(".", $_FILES["featured_image"]["name"]);
                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    $target_file = $target_dir . basename($newfilename);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
                    move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file);
                    $image = mysqli_real_escape_string($link, basename($newfilename));
                    $image = $image;
                } else {
                    $image = '';
                }
                 $post_tags = mysqli_real_escape_string($link, $_POST['post_tags']);
                $unlisted = mysqli_real_escape_string($link, $_POST['unlisted']);
                $pin_story = mysqli_real_escape_string($link, $_POST['pin_story']);
                $post_status = mysqli_real_escape_string($link, $_POST['post_status']);
                $post_slug = mysqli_real_escape_string($link, $_POST['post_slug']);
                $meta_title = mysqli_real_escape_string($link, $_POST['meta_title']);
                $meta_description = mysqli_real_escape_string($link, $_POST['meta_description']);
                $from_ip= $_SERVER['REMOTE_ADDR'];
                $from_browser= $_SERVER['HTTP_USER_AGENT'];
                $query = "INSERT INTO `stories`(`post_uid`,`user_uid`,`post_title`,`post_content`,`featured_image`,`post_tags`,`unlisted`,`pin_story`,`post_status`,`post_slug`,`meta_title`,`meta_description`,`from_ip`,`from_browser`, `created_at`) VALUES ('$post_uid','$user_uid','$post_title','$post_content','$image','$post_tags','$unlisted','$pin_story','$post_status','$post_slug','$meta_title','$meta_description','$from_ip','$from_browser','$date_now')";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "User added";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
         
            }
            else{
                $data['status'] = 501;
                $data['error'] = 'Error';
                echo json_encode($data);
            
            }
        
     
  
 
   

    
   
       
    //backup data start //
            
    // $query1 = "INSERT INTO `user_data_history`(`user_uid`,`username`, `password`,`name`,`phone`,`fixed reduction`,`sql_operation`,`updated_by`,`from_ip`,`from_browser`,`time`) VALUES ('$user_uid','$username', '$hashed_password','$name','$phone','$fixed_reduction','insert','".$_SESSION['userlogin']."','$from_ip','$from_browser','$date_now')";                
       
    //backup data end // 
            }
?>
