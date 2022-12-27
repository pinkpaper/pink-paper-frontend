<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['id'])) {
    session_start();

                
                $icon_link = mysqli_real_escape_string($link, $_POST['icon_link']);
                
                $id = mysqli_real_escape_string($link, $_POST['id']);
                
                $query = "UPDATE `social_media` SET  `icon_link`='$icon_link' WHERE `id`='$id'";

                  
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