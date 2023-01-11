<?php require_once "php/controllerUserData.php"; ?>
<?php
require_once "php/schedule_cron.php";
$username = $_SESSION['username'];

if ($username != false) {
  $sql = "SELECT * FROM user_login WHERE username = '$username'";
  $run_Sql = mysqli_query($link, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['email_status'];
    $name = $fetch_info['name'];
    $username = $fetch_info['username'];
    $user_uid = $fetch_info['user_uid'];
    $profile = $fetch_info['profile'];
    $code = $fetch_info['code'];
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
?>
<?php
$sql2 = "SELECT * FROM user_login ";
$run_Sql2 = mysqli_query($link, $sql2);
$fetch_info2 = mysqli_fetch_assoc($run_Sql2);
$name2 = $fetch_info2['name'];
$user_uid2 = $fetch_info2['user_uid'];

$sql5 = "SELECT * FROM follow WHERE followed_user_uid = '$user_uid' ";

$sql6 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid'";
$run_Sql5 = mysqli_query($link, $sql5);
$run_Sql6 = mysqli_query($link, $sql6);
$follower_count = mysqli_num_rows($run_Sql5);
$following_count = mysqli_num_rows($run_Sql6);
?>
<?php
$meta_title = 'Audience-Stats';
$category_description = 'Start curating your thoughts in a decentralized and autonomous environment for your communities to browse without perjury and risk of prosecution from anywhere around the globe.';
$meta_description = implode(' ', array_slice(explode(' ', $category_description), 0, 15)) . "\n";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $meta_title ?> | Pink Paper </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo ($meta_description); ?>">
    <!-- Enter a keywords for the page in tag -->
    <meta name="Keywords" content="<?php echo ($meta_title); ?>">
    <!-- Enter Page title -->
    <meta property="og:title" content="<?php echo $meta_title ?> | Pink Paper" />
    <!-- Enter Page URL -->
    <meta property="og:url" content="<?php echo ($actual_link) ?>" />
    <!-- Enter page description -->
    <meta property="og:description" content="<?php echo ($meta_description); ?>...">
    <!-- Enter Logo image URL for example : http://cryptonite.finstreet.in/images/cryptonitepost.png -->
    <meta property="og:image" itemprop="image" content="https://content.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
    <meta property="og:image:secure_url" itemprop="image" content="https://content.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
    <meta name="twitter:card" content="https://content.pinkpaper.xyz/assets/images/logo/logo_icon.png">
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
    <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="assets/toastr/toastr.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">
    <style type="text/css">
        .row-a {

            padding-top: 5%;
        }

        .chart {
            width: 100%;
            min-height: 450px;
        }

        .row {
            margin: 0 !important;
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

<body onload="loader()">
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNWHRNG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- loader start-->
    <div class="loader-container">
        <div class="loader"></div>
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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Your Audience<p style="font-size: medium;color:gray"> Updated Daily </p>
                        </h1>

                        <a href="user-stats" class="btn button-outline-primary">Story Stats</a>
                    </div>
                    <div class="profile-div mb-5">
                        <div class="profile-card shadow d-flex flex-column justify-content-center px-3 py-4 text-center">
                            <?php
                            if ($profile == '') {
                                echo '<div class="text-center"><canvas class="avatar-image rounded-circle text-center p-1 shadow-sm mb-2" title="' . $name . '"></canvas></div>';
                            } else {
                                echo '<div class="text-center"><img src="' . $profile . '" alt="" class="text-center p-1 shadow-sm mb-2"></div>';
                            }
                            ?>
                            <h4 class="fw-bold text-capitalize mb-0" style="color:var(--text-color);"></h4>
                            <h1 class="display-4 fw-bold mb-2 text-capitalize" style="color:var(--text-color);"><?php echo $name; ?></h1>
                            <hr style="color: gray;">
                            <div class="row">
                                <div class="col-lg-12 col-md-12" style="padding-top: 30px;">
                                    <h4 class="fw-bold text-capitalize mb-0" style="color:var(--text-color);float:left;padding:0px">Followers</h4>
                                    <a href="followers.php?username=<?php echo $username2; ?>" style="font-size:large" class="text-link-2"><?php echo '<span class=" follower_add">' . $follower_count . '</span> ' . ($follower_count == 1 ? '' : '') ?></a>
                                </div>
                                <div class="col-lg-12 col-md-12" style="padding-top: 30px;">
                                    <h4 class="fw-bold text-capitalize mb-0" style="color:var(--text-color);float:left;padding:0px">Following</h4>
                                    <a href="following.php?username=<?php echo $username2; ?>" style="font-size:large" class="text-link-2"><?php echo '<span class=" following_add">' . $following_count . '</span> ' . ($following_count == 1 ? '' : '') ?></a>


                                </div>
                                <div class="col-lg-12 col-md-12">

                                    <a href="" class="text-link-2"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row-a">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h1 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Monthly Growth</h1>
                        </div>
                        <ul class="nav nav-tabs  flex-column flex-sm-row nav-pills mb-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="followers-daily-tab" data-bs-toggle="tab" href="#followers" role="tab" aria-controls="followers" aria-selected="false">Daily</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="followers-monthly-tab" data-bs-toggle="tab" href="#months" role="tab" aria-controls="months" aria-selected="true">Monthly</a>
                            </li>

                        </ul>

                    </div> -->
                    <!-- <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="followers" role="tabpanel" aria-labelledby="followers-daily-tab"> -->
                        <div class="row">
                        <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="fw-bold text-center " style="color:var(--gray-color);">Daily Followers Stats</h4>
                            </div>
                                <div class="col-md-12">

                                    <div id="piechart1" class="chart">
                                    </div>
                                </div>
                            </div>
                        </div> 
                       
                        <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="fw-bold text-center " style="color:var(--gray-color);">Monthly Followers Stats</h4>
                            </div>
                                <div class="col-md-12">

                                    <div id="piechart2" class="chart">
                                    </div>
                                </div>
                            </div>
                        </div> 
                       

                        </div>
                    </div>
                </div>
            </div>
    </section>
        <!-- </div> -->


        </div>
    </section>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
        <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart1);

        function drawChart1() {

            var data = google.visualization.arrayToDataTable([
                ['followerid', 'followers'],
                <?php

                $sql2 = "SELECT count(followed_user_uid) as total, /*CAST(MONTH(date) AS VARCHAR(4))*/`follow`.`date` as day FROM `follow`
        WHERE `follow`.`followed_user_uid`='$user_uid'
         group by date order by date DESC";

                $fire2 = mysqli_query($link, $sql2);
$i=1;
                while ($result = mysqli_fetch_assoc($fire2)) {
if($i<=10)
{
                        echo "['" . $result['day'] . "'," . $result['total'] . "],";
 $i=$i+1;   
}
else{
    break;
}
                    }

                ?>
            ]);

            var options = {
                title: 'Followers Details',
                curveType: 'function',

            };

            var chart = new google.visualization.LineChart(document.getElementById('piechart1'));

            chart.draw(data, options);
            $(window).resize(function() {
                drawChart1();

            });
        }
    </script>


    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {

            var data = google.visualization.arrayToDataTable([
                ['followerid', 'followers'],
                <?php

                $sql2 = "SELECT count(followed_user_uid) as total,CAST(MONTH(date) AS VARCHAR(4)) as day FROM `follow`
        WHERE `follow`.`followed_user_uid`='$user_uid'
         
        group by CAST(MONTH(date) AS VARCHAR(4)) order by date desc";
         

                $fire2 = mysqli_query($link, $sql2);

                $i=1;
                while ($result = mysqli_fetch_assoc($fire2)) {
if($i<=10)
{
                        echo "['" . $result['day'] . "'," . $result['total'] . "],";
 $i=$i+1;   
}
else{
    break;
}
                }

                ?>
            ]);

            var options = {
                title: 'Followers Details',
                curveType: 'function',

            };

            var chart = new google.visualization.LineChart(document.getElementById('piechart2'));

            chart.draw(data, options);
            $(window).resize(function() {
                drawChart2();

            });
        }
    </script>








    <script type="text/javascript">
        $(document).ready(function() {
            $(".avatar-image").letterpic({
                colors: [
                    "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                    "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                ],
                font: 'Inter'
            });

        });
    </script>



</body>

</html>