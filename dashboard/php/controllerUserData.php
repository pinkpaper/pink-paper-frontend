<?php 
session_start();
require "link.php";
$username = "";
$password = "";
$errors = array();

    //if user click login button
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $check_email = "SELECT * FROM admin_login WHERE username = '$username'";
        $res = mysqli_query($link, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $encpass = hash("sha512", $password);
            $fetch_pass = $fetch['password'];
            if($fetch_pass == $encpass){
                $_SESSION['session_user'] = $username;
                $username_status = $fetch['email_status'];
                if($username_status == 'verified'){
                  $_SESSION['session_user'] = $username;
                  $_SESSION['password'] = $password;
                    header('location: ./');
                }
            }else{
                $errors['username'] = "Incorrect email or password!";
            }
        }else{
            $errors['username'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }
    
?>