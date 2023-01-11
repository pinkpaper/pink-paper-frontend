<?php
require "connection.php";
session_start();
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['address'])) {
    $data = array();    
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $label = mysqli_real_escape_string($link, $_POST['label']);

        //
        // ──────────────────────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: C H E C K   N E O   U S E R   E X I T   O R   N O T : :  :   :    :     :        :          :
        // ──────────────────────────────────────────────────────────────────────────────────────────────────────
        //
        
        $neo_check = "SELECT * FROM `metamask_login` WHERE `address` = '$address' AND `nonce` = '$label'";
        $res_metamask = mysqli_query($link, $neo_check);
        if(mysqli_num_rows($res_metamask) > 0){
            $update_query = "UPDATE `metamask_login` SET `nonce`= '$label'  WHERE `address` = '$address'";
            if (mysqli_query($link, $update_query) ) {

                $metamask_check = ("SELECT * FROM user_login WHERE `metamask_address` = '$address'");
                $res_metamask = mysqli_query($link, $metamask_check);                
                if(mysqli_num_rows($res_metamask) > 0){
                    $_SESSION['header_show'] = $address;
                }

                $_SESSION['userAddress'] = $address;
                $data['status'] = 201;
                $data['success'] = "user updated";
                echo json_encode($data);
            } else {
                $data['status'] = 301;
                $data['error'] = 'Error';
                echo json_encode($data);
            }
        }else{
            $insert_data = "INSERT INTO `metamask_login`(`address`,`nonce`) values('$address','$label')";
            if (mysqli_query($link, $insert_data) ) {

                $metamask_check = "SELECT * FROM user_login WHERE `metamask_address` = '$address'";
                $res_metamask = mysqli_query($link, $metamask_check);                
                if(mysqli_num_rows($res_metamask) > 0){
                    $_SESSION['header_show'] = $address;
                }

                $_SESSION['userAddress'] = $address;
                $data['status'] = 201;
                $data['success'] = "user added";
                echo json_encode($data);
            } else {
                $data['status'] = 301;
                $data['error'] = 'Error';
                echo json_encode($data);
            }
        }
}
?>