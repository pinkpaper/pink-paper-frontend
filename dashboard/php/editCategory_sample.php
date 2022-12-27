<?php

require_once 'link.php';

if(isset($_POST['category_id'])){
    session_start();
    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");
    $category_id= mysqli_real_escape_string($link, $_POST['category_id']);
    $category_name = mysqli_real_escape_string($link, $_POST['category_name']);
    $category_slug = strtolower(mysqli_real_escape_string($link, $_POST['category_slug']));
    $category_description = mysqli_real_escape_string($link, $_POST['category_description']);
    $extra_description = mysqli_real_escape_string($link, $_POST['extra_description']);

        $query = "UPDATE `articles_category` SET `category_name`='$category_name', `category_slug` = '$category_slug', `category_description` = '$category_description', `extra_description` = '$extra_description' WHERE `category_id` = '$category_id' ";
        
        if($result = mysqli_query($link, $query))  
        {        
            $data['status'] = 201;
            $data['id'] = $category_id;
            echo json_encode($data);
        }  
        else  
        {  
            $data['status'] = 601;
            $data['error'] = "error";
            echo json_encode($data);
        } 

}
?>