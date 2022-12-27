<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['post_id'])) {
    session_start();

    $data = array();
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    
  
    $post_id = mysqli_real_escape_string($link, $_POST['post_id']);
    $post_uid = mysqli_real_escape_string($link, $_POST['post_uid']);
    $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
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
    $answer = mysqli_real_escape_string($link, $_POST['answer']);
    $post_slug = mysqli_real_escape_string($link, $_POST['post_slug']);
    $meta_title = mysqli_real_escape_string($link, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($link, $_POST['meta_description']);
    $from_ip= $_SERVER['REMOTE_ADDR'];
    $from_browser= $_SERVER['HTTP_USER_AGENT'];

    if(strcmp($answer, 'yes')==0){
        $query2= "INSERT INTO  `editor_choice` (`post_uid`,`ec_status`) VALUES ('$post_uid','active')";
        mysqli_query($link, $query2);
    }

   else if(strcmp($answer, 'no')==0){
        $query2= "DELETE FROM  `editor_choice` WHERE `post_uid`='$post_uid'";
        mysqli_query($link, $query2);
    }
            
                $query = "UPDATE `stories` SET `post_id`='$post_id',`post_uid`='$post_uid',`user_uid`='$user_uid',
                `post_title`='$post_title',`post_content`='$post_content',`featured_image`='$image',
                `post_tags`='$post_tags',`unlisted`='$unlisted',`pin_story`='$pin_story',`post_status`='$post_status',
                `post_slug`='$post_slug ',`meta_title`='$meta_title',`meta_description`='$meta_description',
                `from_ip`='$from_ip',`from_browser`='$from_browser' ,`updated_at`='$date_now' WHERE `post_id`='$post_id' ";

                  
                if (mysqli_query($link, $query) ) {

                    $data['status'] = 201;
                    $data['success'] = "Updated";
                    echo json_encode($data);
                } else {
                    $data['status'] = 301;
                    $data['error'] = 'Error';
                    echo json_encode($data);
                }
            
}