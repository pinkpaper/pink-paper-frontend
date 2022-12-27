<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['user_uid'])) {
    session_start();

  
                $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
                $name = mysqli_real_escape_string($link, $_POST['name']);
                $username = mysqli_real_escape_string($link, $_POST['username']);
                $username = mysqli_real_escape_string($link, $_POST['username']);
                $password = mysqli_real_escape_string($link, $_POST['password']);
                $profile = mysqli_real_escape_string($link, $_POST['profile']);
                $bio = mysqli_real_escape_string($link, $_POST['bio']);
                $code = mysqli_real_escape_string($link, $_POST['code']);
                $username_status = mysqli_real_escape_string($link, $_POST['email_status']);
                $account_status = mysqli_real_escape_string($link, $_POST['account_status']);
                $from_ip= $_SERVER['REMOTE_ADDR'];
    $from_browser= $_SERVER['HTTP_USER_AGENT'];
    $query = "UPDATE `user_login` SET `user_uid`='$user_uid',`name`='$name',`username`='$username',`email`='$username',`password`='$password',`profile`='$profile',`bio`='$bio',`code`='$code',`email_status`='$username_status',`account_status`='$account_status',`from_ip`='$from_ip',`from_browser`='$from_browser' WHERE user_uid=$user_uid";

                  
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