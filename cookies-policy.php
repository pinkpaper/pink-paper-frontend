<?php require_once "php/controllerUserData.php"; ?>
<?php
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    
    if ($email != false) {
        $sql = "SELECT * FROM user_login WHERE email = '$email'";
        $run_Sql = mysqli_query($link, $sql);
        if ($run_Sql) {
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $status = $fetch_info['email_status'];
            $name = $fetch_info['name'];
            $username = $fetch_info['username'];
            $code = $fetch_info['code'];
            $profile = $fetch_info['profile'];
            $user_uid = $fetch_info['user_uid'];
            if ($status == "verified") {
                if ($code != 0) {
                    header('Location: reset-code');
                }
            } else {
                header('Location: user-otp');
            }
        }
    } else {
        header('Location: login-user-mm');
    }
}
?>
<?php
$meta_title = 'Cookies Policy';
$category_description = 'Start curating your thoughts in a decentralized and autonomous environment for your communities to browse without perjury and risk of prosecution from anywhere around the globe.';
$meta_description = implode(' ', array_slice(explode(' ', $category_description), 0, 15)) . "\n";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $base_url; ?>">
    <title><?php echo $meta_title ?> | Pink Papers </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Start curating your thoughts in a decentralized and autonomous environment for your communities to browse without perjury and risk of prosecution from anywhere around the globe.
">
    <!-- Enter a keywords for the page in tag -->
    <meta name="Keywords" content="somys">
    <!-- Enter Page title -->
    <meta property="og:title" content="somys | Pink Papers" />
    <!-- Enter Page URL -->
    <meta property="og:url" content="https://localhost/cms-medium/somya" />
    <!-- Enter page description -->
    <meta property="og:description" content="Start curating your thoughts in a decentralized and autonomous environment for your communities to browse without perjury and risk of prosecution from anywhere around the globe.
...">
    <!-- Enter Logo image URL for example : http://cryptonite.finstreet.in/images/cryptonitepost.png -->
    <meta property="og:image" itemprop="image" content="assets/images/logo/logo_icon.png" />
    <meta property="og:image:secure_url" itemprop="image" content="assets/images/logo/logo_icon.png" />
    <meta name="twitter:card" content="assets/images/logo/logo_icon.png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">

    <!-- favicon -->
    <link rel="icon" href="assets/images/logo/favicon.ico">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- icons pack -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
    <script src="assets/feather/feather.min.js"></script>


    <!-- stylesheet -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">

    <!-- Styling -->
    <style type="text/css">
        .row-c {
            margin-left: 5%;
            margin-right: 5%;
            padding-left: 10%;
            padding-right: 10%;
            padding-bottom: 5%;
            padding-top: 5%;
            text-align: justify;
        box-shadow: 2px #F8F8F8;
        
        }
   
    </style>

</head>

<body onload="loader()">

    <!-- loader start-->
    <div class="loader-container">
        <div class="loader"></div>
    </div>
    <!-- loader end-->

    <button id="back-to-top" class="btn btn-lg back-to-top text-white"><i class="fas fa-chevron-up"></i></button>

    <!-- header start-->
    <?php include('include/header.php'); ?>
    <!-- header end-->
 
        <div class="container-fluid header-div-profile">
            <div class="container" style="padding-top:50px;">
                <div class="row py-5">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <div class="mb-5" style="margin-top:6rem">
                            <h1 class="display-4 fw-bold mb-2 text-capitalize" style="color:var(--text-color);">Cookies Policy</h1>



                        </div>
                    </div>
                </div>
            </div>
        </div>
  
    <div class="row-c">
        <?php
        $query = "SELECT * FROM `cookies` ";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>

<h5 class="fw mb-0 text-left" style="color:var(--text-color);">              
 <?php
 
 $newtext=$row['cookies_policy'];
 $about = wordwrap($newtext, 620, "<br />\n","<br />\n");
 echo $about;
  ?></h5>
  <?php }
        } else { ?>
        <?php } ?>

</div>
  

















    <!-- footer start-->
    <?php include('include/footer.php'); ?>
    <!-- footer end-->
    <!-- script -->
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/sweetalert/sweetalert.min.js"></script>
    <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="assets/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src='https://cdn.quilljs.com/1.2.3/quill.min.js'></script>
    <script src="assets/dropify/js/dropify.min.js"></script>
    <script src="assets/tagify/jQuery.tagify.min.js"></script>
    <script src="assets/toastr/toastr.min.js"></script>




</body>

</html>