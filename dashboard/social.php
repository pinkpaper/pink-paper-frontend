<?php
$currentPage = 'settings';
$currentPageSub = 'social';
require_once('PHP/link.php');
$query = "SELECT * from social_media";
$links = array();
$result = mysqli_query($link, $query);

$i = 1;
$field = "";
while ($row = mysqli_fetch_array($result)) {

    ${"variable$i"} = $row['icon_link'];
    ${"check$i"} = $row['visibility'];
    $i = $i + 1;
}
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CMS Admin Dashboard">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>QuadbTech - CMS Admin Dashboard</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="assets/plugins/DataTables/datatables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
        <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">

        <!-- Theme Styles -->
        <link href="assets/css/connect.min.css" rel="stylesheet">
        <link href="assets/css/admin4.css" rel="stylesheet">
        <link href="assets/css/dark_theme.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .form-control:focus {
                border-color: #2b8fe97d;
                box-shadow: 0 0 0 0.2rem rgb(43 143 233 / 25%);
            }
        </style>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TNWHRNG');</script>
<!-- End Google Tag Manager -->
</head>

    <body>
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNWHRNG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <!-- left sidebar start-->
            <?php include 'inc/sidebar.php'; ?>
            <!-- left sidebar end-->
            <div class="page-container">
                <div class="page-header">
                    <nav class="navbar navbar-expand">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav">
                            <li class="nav-item small-screens-sidebar-link">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/avatars/profile-image-1.png" alt="profile image">
                                    </a>
                                <div class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="#">Calendar<span class="badge badge-pill badge-info float-right">2</span></a>
                                    <a class="dropdown-item" href="#">Settings &amp; Privacy</a>
                                    <a class="dropdown-item" href="#">Switch Account</a>
                                    <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="logout">Log out</a>
                                </div>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">mail</i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">notifications</i></a>
                            </li>-->
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="dark-theme-toggle"><i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a>
                            </li>
                        </ul>
                        <!-- <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Reports</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- <div class="navbar-search">
                            <form>
                                <div class="form-group">
                                    <input type="text" name="search" id="nav-search" placeholder="Search...">
                                </div>
                            </form>
                        </div> -->
                    </nav>
                </div>
                <div class="page-content">
                    <div class="page-info">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="">Settings</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Social Media</li>
                            </ol>
                        </nav>

                    </div>
                    <div class="main-wrapper d-flex justify-content-center col-12">



                        <div class="row">
                            <div class="card  pl-5 pr-5 pt-2">
                                <h4 class="d-flex justify-content-center  mb-0 pb-0 pt-4">Social Media</h4>
                                <div class="card-body pt-3">

                                    <div class="row pt-3">
                                        <div class="col-lg-12">
                                            <div class="form-group">


                                                 <div class="custom-control custom-switch">

                                                    <input type="checkbox" class="custom-control-input" id="twitter" <?php if ($check1 == "true") { ?>checked="" <?php } else {
                                                                                                                                                        } ?>>
                                                    <label type="" class="custom-control-label mb-2" for="twitter" style="font-weight:bold;font-size:1.2rem;color:#717BA2;">Twitter</label>
                                                    <input id="twitter-link" placeholder="link" class="form-control" style="padding: 8px 8px;border-radius: 7px;<?php if ($check1 == "true") {
                                                                                                                                                                    echo ("display:inline-block");
                                                                                                                                                                } else {
                                                                                                                                                                    echo ("display:none");
                                                                                                                                                                } ?>" value="<?php echo ($variable1); ?>">
                                                </div>
                                                <div class="custom-control custom-switch ">

                                                    <input type="checkbox" class="custom-control-input" id="instagram" <?php if ($check2 == "true") { ?>checked="" <?php } else {
                                                                                                                                                            } ?>>
                                                    <label type="" class="custom-control-label mb-2" for="instagram" style="font-weight:bold;font-size:1.2rem;color:#717BA2;">Instagram</label>
                                                    <input id="instagram-link" placeholder="link" class="form-control" style="padding: 8px 8px;border-radius: 7px;<?php if ($check2 == "true") {
                                                                                                                                                                        echo ("display:inline-block");
                                                                                                                                                                    } else {
                                                                                                                                                                        echo ("display:none");
                                                                                                                                                                    } ?>" value="<?php echo ($variable2); ?>" value="<?php echo ($variable7); ?>">
                                                </div>
                                                <div class="custom-control custom-switch ">

                                                    <input type="checkbox" class="custom-control-input" id="telegram" <?php if ($check3 == "true") { ?>checked="" <?php } else {
                                                                                                                                                    } ?>>
                                                    <label type="" class="custom-control-label mb-2" for="telegram" style="font-weight:bold;font-size:1.2rem;color:#717BA2;">Telegram</label>
                                                    <input id="telegram-link" placeholder="link" class="form-control" style="padding: 8px 8px;border-radius: 7px;display:<?php if ($check3 == "true") {
                                                                                                                                                                        echo ("display:inline-block");
                                                                                                                                                                    } else {
                                                                                                                                                                        echo ("display:none");
                                                                                                                                                                    } ?>" value="<?php echo ($variable3); ?>" value="<?php echo ($variable8); ?>">
                                                </div>


                                            </div>

                                        </div>

                                        <!-- <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Author description</label>

                                                <textarea id="descrip" class="form-control" rows="7" style="padding: 12px 18px;border-radius: 7px;"><?php echo $row['description']; ?></textarea>

                                            </div>
                                        </div> -->




                                    </div>
                                    <div class="form-group pt-3 d-flex justify-content-center">
                                        <button class="btn" id="update" type="button" style="font-size: 1rem;background-color: #2b8fe9;color: #ffffff;">Update</button>

                                    </div>





                                </div>
                            </div>








                        </div>
                    </div>



                    <div class="page-footer ">
                        <div class="row ">
                            <div class="col-md-12 ">
                                <span class="footer-text ">2021 © cms.quadbtech.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-3.4.1.min.js "></script>
        <script src="assets/plugins/bootstrap/popper.min.js "></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js "></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js "></script>
        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js "></script>
        <script src="assets/plugins/apexcharts/dist/apexcharts.min.js "></script>
        <script src="assets/plugins/blockui/jquery.blockUI.js "></script>
        <script src="assets/plugins/flot/jquery.flot.min.js "></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js "></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js "></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js "></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js "></script>
        <script src="assets/js/connect.min.js "></script>
        <script src="assets/js/pages/dashboard.js "></script>
        <script src="assets/plugins/DataTables/datatables.min.js"></script>
        <script src="assets/plugins/DataTables/dataTables.select.min.js"></script>
        <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
        <script src="assets/sweetalert/sweetalert.min.js"></script>
        <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>

        <script>
            $(document).ready(function() {

                var twitter_link = "twitter.com";
                var instagram_link = "instagram.com";
                var telegram_link = "rss.com"

                var twitter_visibility = true;
                var instagram_visibility = true;
                var telegram_visibility = true;

                $('#twitter').on('change', function() {
                    if ($(this).is(':checked')) {
                        twitter_visibility = true;


                        $("#twitter-link").show();
                        twitter_link = $('#twitter-link').val();

                    } else {
                        twitter_visibility = false;

                        $("#twitter-link").hide();

                    }
                });
                $('#instagram').on('change', function() {
                    if ($(this).is(':checked')) {
                        instagram_visibility = true;
                        $("#instagram-link").show();
                        instagram_link = $('#instagram-link').val();

                    } else {
                        instagram_visibility = false;
                        $("#instagram-link").hide();

                    }
                });
                $('#telegram').on('change', function() {
                    if ($(this).is(':checked')) {
                        telegram_visibility = true;
                        $("#telegram-link").show();
                        rss_link = $('#telegram-link').val();

                    } else {
                        telegram_visibility = false;
                        $("#telegram-link").hide();

                    }
                });



                if ($("#twitter").prop('checked') == true) {
                    twitter_visibility = true;
                } else {
                    twitter_visibility = false;
                }
                if ($("#instagram").prop('checked') == true) {
                    instagram_visibility = true;
                } else {
                    instagram_visibility = false;
                }
                if ($("#telegram").prop('checked') == true) {
                    telegram_visibility = true;
                } else {
                    telegram_visibility = false;
                }

                $('#update').on('click', function(e) {

                    e.preventDefault();
                    var error = "";

                    var formData = new FormData();


                    twitter_link = $('#twitter-link').val();
                    instagram_link = $('#instagram-link').val();
                    telegram_link = $('#telegram-link').val();



                    formData.append('twitter_link', twitter_link);
                    formData.append('instagram_link', instagram_link);
                    formData.append('telegram_link', telegram_link);


                    formData.append('twitter_visibility', twitter_visibility);
                    formData.append('instagram_visibility', instagram_visibility);
                    formData.append('telegram_visibility', telegram_visibility);










                    if (error == "") {



                        console.log(formData);

                        $.ajax({
                            url: "PHP/editicons.php",
                            type: "POST",
                            dataType: "json",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,

                            success: function(data) {
                                console.log(data);
                                if (data.status == 201) {
                                    // if(data.link!=""){

                                    // }else{
                                    window.location.replace("social");
                                    // }

                                } else if (data.status == 301) {
                                    console.log(data.error);
                                    swal("error");
                                    // $('#contact-success').css('display', 'none');
                                    // $('#contact-form').css('display', 'block');
                                    // swal('success'); 
                                } else if (data.status == 601) {
                                    console.log(data.error);
                                    swal("error");
                                    // $('#contact-success').css('display', 'none');
                                    // $('#contact-form').css('display', 'block');
                                    // swal('success'); 
                                } else if (data.status == 603) {
                                    console.log(data.error);
                                    swal("error");
                                    // $('#contact-success').css('display', 'none');
                                    // $('#contact-form').css('display', 'block');
                                    // swal('success'); 
                                } else {
                                    //     swal("problem with query");
                                }
                            }
                        });
                    } else {

                    }
                });
            });
        </script>
    </body>

    </html>
<?php


?>