<?php require_once "php/controllerUserData.php"; ?>
<?php
if(isset($_SESSION['email'])){ 
    $email = $_SESSION['email'];
    
    if($email != false){
        $sql = "SELECT * FROM user_login WHERE email = '$email'";
        $run_Sql = mysqli_query($link, $sql);
        if($run_Sql){
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $status = $fetch_info['email_status'];
            $name = $fetch_info['name'];
            $username = $fetch_info['username'];
            $code = $fetch_info['code'];
            $profile = $fetch_info['profile'];
            $user_uid = $fetch_info['user_uid'];
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
$username_req = $about_req;
$sql2 = "SELECT * FROM user_login WHERE username = '$username_req'";
$run_Sql2 = mysqli_query($link, $sql2);
$fetch_info2 = mysqli_fetch_assoc($run_Sql2);
$name2 = $fetch_info2['name'];
$username2 = $fetch_info2['username'];
$bio2 = $fetch_info2['bio'];
$profile2 = $fetch_info2['profile'];
$user_uid2 = $fetch_info2['user_uid'];

$sql5 = "SELECT * FROM follow WHERE followed_user_uid = '$user_uid2'";
$run_Sql5 = mysqli_query($link, $sql5);
$follower_count = mysqli_num_rows($run_Sql5);

?>
<?php
$meta_title = $name2;
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
    <meta name="description" content="<?php echo ($meta_description); ?>">
    <!-- Enter a keywords for the page in tag -->
    <meta name="Keywords" content="<?php echo ($meta_title); ?>">
    <!-- Enter Page title -->
    <meta property="og:title" content="<?php echo $meta_title ?> | Pink Papers" />
    <!-- Enter Page URL -->
    <meta property="og:url" content="<?php echo ($actual_link) ?>" />
    <!-- Enter page description -->
    <meta property="og:description" content="<?php echo ($meta_description); ?>...">
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
        <div class="loader"></div>
    </div>
    <!-- loader end-->

    <button id="back-to-top" class="btn btn-lg back-to-top text-white"><i class="fas fa-chevron-up"></i></button>

    <!-- header start-->
    <?php include('include/header.php'); ?>
    <!-- header end-->


    <!-- profileHeaderDetails start-->
    <?php include('include/components/profileHeaderDetails.php'); ?>
    <!-- profileHeaderDetails end-->


    <section class="latest-post my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <!-- user details -->
                    <div class="about-div mb-5">
                        <div class="about-card shadow d-flex flex-lg-row flex-column px-3 py-4 gap-3">
                            <?php 
                                            if($profile2 == ''){
                                                echo '<div class="text-center"><canvas class="avatar-image text-center p-1 shadow-sm mb-2" title="'.$name2.'"></canvas></div>';
                                            }else{
                                                echo '<div class="text-center"><img src="'.$profile2.'" alt="" class="text-center p-1 shadow-sm mb-2"></div>';
                                            }
                                        ?>
                            <div class="text-align">
                                <h4 class="fw-bold text-capitalize mb-3" style="color:var(--text-color);">About
                                    <?php echo $name2; ?></h4>
                                <p class="text-muted mb-3"><?php echo $bio2; ?></p>
                                <div class="d-flex justify-content-lg-start justify-content-center gap-3">
                                    <a href="followers.php?username=<?php echo $username2; ?>"
                                        class="text-link-2">
                                        <?php echo $follower_count.' Follower'.($follower_count == 1 ? '' : 's') ?></a>
                                    &bull;
                                    <a href="following.php?username=<?php echo $username2; ?>"
                                        class="text-link-2"><?php
                                            $sql4 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid2'";
                                            $run_Sql4 = mysqli_query($link, $sql4);
                                            $c = mysqli_num_rows($run_Sql4);
                                            echo $c;
                                        ?> Following</a>
                                </div>
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
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <script>
        $(".avatar-image").letterpic({
                    colors: [
                        "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                        "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                    ],
                    font: 'Inter'
                });
    </script>
</body>

</html>