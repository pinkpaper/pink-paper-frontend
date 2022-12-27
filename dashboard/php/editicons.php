<?php

require_once 'link.php';

if(isset($_POST['twitter_link'])){
    session_start();
    $data = array();  
    $from_ip = $_SERVER['REMOTE_ADDR'];
    $from_browser = $_SERVER['HTTP_USER_AGENT'];
    date_default_timezone_set("Asia/Calcutta");
    $date_now = date("r");

    
    $twitter_link = mysqli_real_escape_string($link, $_POST['twitter_link']);
    $twitter_visibility = mysqli_real_escape_string($link, $_POST['twitter_visibility']);

    $instagram_link = mysqli_real_escape_string($link, $_POST['instagram_link']);
    $instagram_visibility = mysqli_real_escape_string($link, $_POST['instagram_visibility']);

    $telegram_link = mysqli_real_escape_string($link, $_POST['telegram_link']);
    $telegram_visibility = mysqli_real_escape_string($link, $_POST['telegram_visibility']);



     /* ---------------------------- category backup insert  start--------------------------- */  
    // $query = "SELECT * FROM `adminlogin` where `uid` ='" .$admin_id. "'"; 
    // $result = mysqli_query($link,$query);    
    //  if (mysqli_num_rows($result) !=0 ) {   
    //     $row=mysqli_fetch_array($result);                
    //     $pre_data="";
    //     $pre_data_value="";
    //     if(!($row['username']==$admin_name)){
    //         $pre_data.="`username`,";
    //         $pre_data_value.="'".$row['username']."',";            
    //     }
    //     if(!($row['username']==$admin_email)){
    //         $pre_data.="`email`,";
    //         $pre_data_value.="'".$row['username']."',";            
    //     }
    //     if(!($row['password']==$hashed_password)){
    //         $pre_data.="`password`,";
    //         $pre_data_value.="'".$row['password']."',";            
    //     }
    //     if(!($pre_data=="")){                
    //         $link->query("INSERT INTO `adminlogin_history` (`sql_operation`,`uid`,$pre_data `updated_by`,`from_ip`, `from_browser`, `time`)VALUES ('update','" . $admin_id . "',$pre_data_value'".$_SESSION['userlogin']."','$from_ip','$from_browser','$date_now')");    
    //     }          
    // }
    // /* ---------------------------- category backup  data insert end--------------------------- */

        $query1 = "UPDATE `social_media` SET `icon_link`='$twitter_link', `visibility` = '$twitter_visibility'  WHERE `id` = '2' ";
        $query2 = "UPDATE `social_media` SET `icon_link`='$instagram_link', `visibility` = '$instagram_visibility'  WHERE `id` = '7' ";
        $query3 = "UPDATE `social_media` SET `icon_link`='$telegram_link', `visibility` = '$telegram_visibility'  WHERE `id` = '9' ";
        
        // $result3 = mysqli_query($link, $query3) && $result4 = mysqli_query($link, $query4) && $result5 = mysqli_query($link, $query5) && $result6 = mysqli_query($link, $query6) && $result7 = mysqli_query($link, $query7) && $result8 = mysqli_query($link, $query8)
        
        if($result1 = mysqli_query($link, $query1) && $result2 = mysqli_query($link, $query2) && $result3 = mysqli_query($link, $query3) && $result4 = mysqli_query($link, $query4) && $result5 = mysqli_query($link, $query5) && $result6 = mysqli_query($link, $query6) && $result7 = mysqli_query($link, $query7) && $result8 = mysqli_query($link, $query8))  
        {        
            $data['status'] = 201;
            $data['google_link'] = $googleplus_link;
            $data['google_visibility'] = $googleplus_visibility;
            
        
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