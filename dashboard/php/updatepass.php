<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['id'])) {
    session_start();

    $id = mysqli_real_escape_string($link, $_POST['id']);
    $curr= mysqli_real_escape_string($link, $_POST['current']);
    $pass = mysqli_real_escape_string($link, $_POST['password']);
    $confirm = mysqli_real_escape_string($link, $_POST['confirm']);
    $encurr = hash("sha512", $curr);
    $enpass = hash("sha512", $pass);
   
    $query2 = "SELECT * from admin_login where id ='" . $id . "'";
    $result2 = mysqli_query($link, $query2);
    $row = mysqli_fetch_array($result2); 
    $orig=$row['password'];
    if($encurr!=$orig){
        $data['status'] = 501;
        $data['success'] = "Enter Correct Current Password";
        echo json_encode($data);
    }
    else if($pass!=$confirm)
    {
        $data['status'] = 601;
        $data['success'] = "password does not match";
        echo json_encode($data);
    }
    else{            

                
                $query = "UPDATE `admin_login` SET `password`='$enpass'WHERE `id`='$id' ";

                  
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
        }