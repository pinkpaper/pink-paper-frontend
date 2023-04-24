<?php require_once "php/controllerUserData.php"; ?>
<?php
if(isset($_SESSION['username'])){ 
    $username = $_SESSION['username'];
    
    if($username != false){
        $sql = "SELECT * FROM user_login WHERE username = '$username'";
        $run_Sql = mysqli_query($link, $sql);
        if($run_Sql){
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $status = $fetch_info['email_status'];
            $name = $fetch_info['name'];
            $username = $fetch_info['username'];
            $code = $fetch_info['code'];
            $profile2 = $fetch_info['profile'];
            if($status == "verified"){
                if($code != 0){
                    header('Location: reset-code');
                }
            }else{
                header('Location: user-otp');
            }
        }
    }else{
        header('Location: login-user-mm');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $base_url; ?>">

    <title>Page Not Found | Blog CMS </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="icon" href="assets/images/logo/favicon.ico">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- icons pack -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
    <script src="assets/feather/feather.min.js"></script>


    <!-- stylesheet -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">


</head>

<body onload="loader()">

    <!-- loader start-->
    <div class="loader-container">
        <div class="loadingio-spinner-ellipsis-tjmuel5ie5"><div class="ldio-g2ezeznggp">
<div></div><div></div><div></div><div></div><div></div>
</div></div>
    </div>
    <!-- loader end-->

    <button id="back-to-top" class="btn btn-lg back-to-top text-white"><i class="fas fa-chevron-up"></i></button>

    <!-- header start-->
    <?php include('include/header.php'); ?>
    <!-- header end-->

    <div class="container" style="padding-top:50px;"></div>
    

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="my-5">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <img src="assets/images/page_not_found.svg" alt="" class="p-3" style="width: 300px;">
                                <h5 class="fw-bold text-center mb-3" style="color:var(--gray-color)">Page Not Found</h5>
                                <h6 class="text-center" style="color:var(--gray-color)"><a href="./" class="text-link-3 fw-bold ">Back to homepage</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    



    <!-- footer start-->
    <?php include('include/footer.php'); ?>
    <!-- footer end-->



    <!-- script -->
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/popr/popr.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>

</body>

</html>