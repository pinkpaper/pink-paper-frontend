<?php require_once "php/controllerUserData.php"; ?>
<?php 
require_once "php/schedule_cron.php";
//$username = $_SESSION['username'];
//if($username == false){
  //header('Location: login-user-mm');
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change New a Passsword | Pink Paper </title>
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

    <?php
        $result = mysqli_query($link, 'SELECT * FROM `logo`');
        $rowLogo = mysqli_fetch_assoc($result);
    ?>

    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-lg-8 col-md-12">
                <div class="register-main-card shadow">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="register-left px-3 py-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="<?php echo $rowLogo['logo_image']; ?>" width='151px' alt='logo'>
                                    <a href="./"class="btn btn-home-icon"><i class="icon-home"></i></a>
                                </div>
                                <div class="p-5">
                                    <img src="assets/images/logo/post.svg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="register-right text-center px-4 py-4">
                                <h4 class="fw-bold">New Password</h4>
                                <p class="text-muted">Change New a Passsword</p>

                                <form action="new-password" method="POST" autocomplete="off">
                                    <?php 
                                    if(isset($_SESSION['info'])){
                                        ?>
                                        <div class="alert alert-success text-center my-3">
                                            <?php echo $_SESSION['info']; ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if(count($errors) > 0){
                                        ?>
                                        <div class="alert alert-danger text-center my-3">
                                            <?php
                                            foreach($errors as $showerror){
                                                echo $showerror;
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                                    </div>
                                    <div class="d-grid mb-4">
                                        <input class="btn button-primary" type="submit" name="change-password" value="Change">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- script -->
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/popr/popr.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>

    </script>
</body>

</html>