<?php require_once "php/controllerUserData.php"; ?>
<?php
require_once "php/schedule_cron.php";
$user_uid = '';
if (isset($_SESSION['userAddress'])) {
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
            $code = $fetch_info['code'];
            $profile = $fetch_info['profile'];
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
/* $arr = explode('/',$router);
$username_req='';
if(isset($arr[1])){
    $username_req = $arr[1];
} */
$username_req = $username_profile;

$sql2 = "SELECT * FROM user_login WHERE username = '$username_req'";
$run_Sql2 = mysqli_query($link, $sql2);
$fetch_info2 = mysqli_fetch_assoc($run_Sql2);
$name2 = $fetch_info2['name'];
$username2 = $fetch_info2['username'];
$bio2 = $fetch_info2['bio'];
$profile2 = $fetch_info2['profile'];
$user_uid2 = $fetch_info2['user_uid'];
$twitter_url = $fetch_info2['twitter_url'];
$instagram_url = $fetch_info2['instagram_url'];
$linkedin_url = $fetch_info2['linkedin_url'];
$facebook_url = $fetch_info2['facebook_url'];

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
<?php require_once "php/follow_action.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $base_url; ?>">
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
    <meta property="og:image" itemprop="image" content="https://test.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
    <meta property="og:image:secure_url" itemprop="image"
        content="https://test.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
    <meta name="twitter:card" content="https://test.pinkpaper.xyz/assets/images/logo/logo_icon.png">
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
    <link rel="stylesheet" href="assets/css/medium.css" />
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/js/popr/popr.css">
    <link rel="stylesheet" href="assets/css/croudFundingUI.css">

</head>

<body onload="loader()">

    <!-- loader start-->
    <div class="loader-container">
        <div class="loadingio-spinner-ellipsis-tjmuel5ie5">
            <div class="ldio-g2ezeznggp">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- loader end-->

    <button id="back-to-top" class="btn btn-lg back-to-top text-white"><i class="fas fa-chevron-up"></i></button>
    <input type="hidden" id="usernameId" value="<?php echo $username_req; ?>">
    <input type="hidden" name="user_uid2" id="user_uid2" value="<?= $user_uid2 ?>">
    <input type="hidden" name="user_uid" id="user_uid" value="<?= $user_uid ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 d-flex justify-content-center">
                <!-- side menu include here start -->
                <?php include('include/side-menu-medium-top.php'); ?>
                <?php include('include/side-menu-medium.php'); ?>
                <?php include('include/side-menu-medium-bottom.php'); ?>
                <!-- side menu include here end -->
            </div>
            <div class="col-lg-8 col-md-12 side-border">
                <div>
                    <div class="top-panel m-lg-5 mb-0 pb-4 bg-white border-bottom">
                        <div class="tag-main-wrapper pt-4 pt-lg-0">
                            <div class="tag-main-inner-wrapper">
                                <div class="tag-container">
                                    <div class="inner-tag-container">
                                        <div class="tag-icon-name-div">
                                            <div class="tag-icon-name-inner-div">
                                                <div class="y">
                                                    <h1 class="tag-heading"><?php echo $name2; ?></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-panel m-lg-5 mt-3">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="h-100 w-100 position-relative d-inline-block">
                    <div class="sticky-lg-top">
                        <div class="h-100">
                            <div class="search-wrapper">
                                <div class="am lz ma mb">
                                    <div class="cp" aria-hidden="false" aria-describedby="searchResults"
                                        aria-labelledby="searchResults"></div><span class="mg y"><svg width="25"
                                            height="25" viewBox="0 0 25 25" fill="rgba(8, 8, 8, 1)">
                                            <path
                                                d="M20.07 18.93l-4.16-4.15a6 6 0 1 0-.88.88l4.15 4.16a.62.62 0 1 0 .89-.89zM6.5 11a4.75 4.75 0 1 1 9.5 0 4.75 4.75 0 0 1-9.5 0z">
                                            </path>
                                        </svg></span>
                                    <input type="search" id="searchtext2" name="searchtext"
                                        class="ks mc bv bw bx ae md me by mf" placeholder="Search">
                                </div>
                            </div>
                            <div class="user-profile-wrapper">
                                <a class="user-profile-inner" href="<?php echo $username2; ?>" rel="noopener follow">
                                    <div class="user-profile-div">
                                        <?php
                                    if ($profile2 == '') {
                                        echo '<canvas class="avatar-image img-fluid rounded-circle user-profile-img" title="' . $name2 . '" width="88" height="88"></canvas>';
                                    } else {
                                        echo '<img src="uploads/profile/' . $profile2 . '" alt="" class="user-profile-img" width="88" height="88" loading="lazy">';
                                    }
                                    ?>
                                        <div class="user-profile-inner-div"></div>
                                    </div>
                                </a>
                                <div class="tt l"></div>
                                <a class="user-profile-inner" href="<?php echo $username2; ?>" rel="noopener follow">
                                    <h2 class="pw-author-name"><span class="il"><?php echo $name2; ?></span></h2>
                                </a>
                                <div class="tu l"></div>
                                <span class="pw-follower-count">
                                    <a href="<?php echo $username2; ?>" class="user-profile-inner-button">
                                        <?php 
                                            $sql5 = "SELECT * FROM follow WHERE followed_user_uid = '$user_uid2'";
                                            $run_Sql5 = mysqli_query($link, $sql5);
                                            $follower_count = mysqli_num_rows($run_Sql5);
                                            ?>
                                        <?= $follower_count ?> Followers
                                    </a>
                                </span>
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="social-share-wrapper-inner">
                                        <?php 
                                        if($twitter_url !== '' && $twitter_url !== null){
                                        ?>
                                        <div class="social-share">
                                            <div>
                                                <div class="cp" aria-hidden="false" aria-describedby="2566"
                                                    aria-labelledby="2566">
                                                    <a href='<?php echo $twitter_url; ?>'
                                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                                        target="_blank" title="Follow me on Twitter">
                                                        <span
                                                            class="social-share-button-span social-share-button-author"><svg
                                                                width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M20 5.34c-.67.41-1.4.7-2.18.87a3.45 3.45 0 0 0-5.02-.1 3.49 3.49 0 0 0-1.02 2.47c0 .28.03.54.07.8a9.91 9.91 0 0 1-7.17-3.66 3.9 3.9 0 0 0-.5 1.74 3.6 3.6 0 0 0 1.56 2.92 3.36 3.36 0 0 1-1.55-.44V10c0 1.67 1.2 3.08 2.8 3.42-.3.06-.6.1-.94.12l-.62-.06a3.5 3.5 0 0 0 3.24 2.43 7.34 7.34 0 0 1-4.36 1.49l-.81-.05a9.96 9.96 0 0 0 5.36 1.56c6.4 0 9.91-5.32 9.9-9.9v-.5c.69-.49 1.28-1.1 1.74-1.81-.63.3-1.3.48-2 .56A3.33 3.33 0 0 0 20 5.33"
                                                                    fill="#A8A8A8">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php 
                                        if($facebook_url !== '' && $facebook_url !== null){
                                        ?>
                                        <div class="social-share">
                                            <div>
                                                <div class="cp" aria-hidden="false" aria-describedby="2567"
                                                    aria-labelledby="2567">
                                                    <a href='<?php echo $facebook_url; ?>'
                                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                                        target="_blank" title="Follow me on Facebook"><span
                                                            class="social-share-button-span social-share-button-author"><svg
                                                                width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M19.75 12.04c0-4.3-3.47-7.79-7.75-7.79a7.77 7.77 0 0 0-5.9 12.84 7.77 7.77 0 0 0 4.69 2.63v-5.49h-1.9v-2.2h1.9v-1.62c0-1.88 1.14-2.9 2.8-2.9.8 0 1.49.06 1.69.08v1.97h-1.15c-.91 0-1.1.43-1.1 1.07v1.4h2.17l-.28 2.2h-1.88v5.52a7.77 7.77 0 0 0 6.7-7.71"
                                                                    fill="#A8A8A8">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php 
                                        if($linkedin_url !== '' && $linkedin_url !== null){
                                        ?>
                                        <div class="social-share">
                                            <div>
                                                <div class="cp" aria-hidden="false" aria-describedby="2568"
                                                    aria-labelledby="2568">
                                                    <a href='<?php echo $linkedin_url; ?>'
                                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                                        target="_blank" title="Follow me on Linkedin">
                                                        <span
                                                            class="social-share-button-span social-share-button-author">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M19.75 5.39v13.22a1.14 1.14 0 0 1-1.14 1.14H5.39a1.14 1.14 0 0 1-1.14-1.14V5.39a1.14 1.14 0 0 1 1.14-1.14h13.22a1.14 1.14 0 0 1 1.14 1.14zM8.81 10.18H6.53v7.3H8.8v-7.3zM9 7.67a1.31 1.31 0 0 0-1.3-1.32h-.04a1.32 1.32 0 0 0 0 2.64A1.31 1.31 0 0 0 9 7.71v-.04zm8.46 5.37c0-2.2-1.4-3.05-2.78-3.05a2.6 2.6 0 0 0-2.3 1.18h-.07v-1h-2.14v7.3h2.28V13.6a1.51 1.51 0 0 1 1.36-1.63h.09c.72 0 1.26.45 1.26 1.6v3.91h2.28l.02-4.43z"
                                                                    fill="#A8A8A8">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php 
                                        if($instagram_url !== '' && $instagram_url !== null){
                                        ?>
                                        <div class="social-share">
                                            <div>
                                                <div class="cp" aria-hidden="false" aria-describedby="2568"
                                                    aria-labelledby="2568">
                                                    <a href='<?php echo $instagram_url; ?>'
                                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                                        target="_blank" title="Follow me on Instagram">
                                                        <span
                                                            class="social-share-button-span px-1 social-share-button-author2">
                                                            <img src="assets/images/insta.svg" alt="box" width="17"
                                                                height="17">
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tv l"></div>
                                <p class="user-profile-para">
                                    <span class="user-profile-para-desc"><?php echo $bio2; ?></span>
                                </p>
                                <div class="tx o w-100" id="follow_reload">
                                    <?php
                                        
                                        $sql20 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid' AND followed_user_uid = '$user_uid2'";
                                        $run_Sql20 = mysqli_query($link, $sql20);
                                        $fetch_info20 = mysqli_fetch_assoc($run_Sql20);

                                        $following_user_uid = $fetch_info20['following_user_uid'] ?? null;
                                        $followed_user_uid = $fetch_info20['followed_user_uid'] ?? null;

                                        if (!isset($_SESSION['username'])) {
                                            echo '<button type="button" class="user-profile-follow-button w-100" onClick="login()">Follow</button>';
                                        } else if ($user_uid2 == $user_uid) {
                                            //echo '';
                                        } else if ($following_user_uid == $user_uid && $followed_user_uid == $user_uid2) {
                                            echo '<button type="button" class="user-profile-follow-button w-100 following-button" onClick="unfollow(\'' . $user_uid . '\',\'' . $user_uid2 . '\')">Following</button>';
                                        } else {
                                            echo '<button type="button" class="user-profile-follow-button w-100" onClick="follow(\'' . $user_uid . '\',\'' . $user_uid2 . '\')">Follow</button>';
                                        }
                                        ?>
                                </div>
                            </div>
                            <div class="lw lx ly y">
                                <div class="y">
                                    <div class="y">
                                        <div class="py-3 y">
                                            <div class="y">
                                                <h2 class="follow-title">More Post</h2>
                                            </div>
                                        </div>
                                        <div class="y">
                                            <!-- data set here start -->
                                            <?php
                                        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` WHERE `post_status` = 'published' AND `unlisted` = 'false' ORDER BY RAND() DESC LIMIT 4";
                                        $result = mysqli_query($link, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $more_post_img = $row['profile'];
                                                $more_post_name = $row['name'];
                                        ?>
                                            <div class="more-from-wrapper">
                                                <div class="more-from-wrapper-inner">
                                                    <div class="more-from-card">
                                                        <div class="more-from-card-inner">
                                                            <div class="more-from">
                                                                <div class="more-from-text-wrapper">
                                                                    <div class="more-from-inner-div">
                                                                        <a class="more-from-anchor"
                                                                            href="<?php echo $more_post_name ?>"
                                                                            rel="noopener follow">
                                                                            <div class="more-from-anchor-div">
                                                                                <?php
                                                                                if ($more_post_img == '') {
                                                                                    echo '<canvas class="avatar-image img-fluid rounded-circle more-from-anchor-img-one" title="' . $more_post_name . '" width="20" height="20"></canvas>';
                                                                                } else {
                                                                                    echo '<img src="uploads/profile/' . $more_post_img . '" alt="" class="more-from-anchor-img-one" width="20" height="20" loading="lazy">';
                                                                                }
                                                                                ?>
                                                                                <div class="more-from-anchor-div-div">
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <div class="more-from-innner-div-second">
                                                                        <div>
                                                                            <div class="more-from-second-div"
                                                                                aria-hidden="false"
                                                                                aria-describedby="103"
                                                                                aria-labelledby="103">
                                                                                <div
                                                                                    class="more-from-second-div-anchor-wrapper">
                                                                                    <a class="more-from-second-anchor"
                                                                                        href="<?php echo $username2; ?>">
                                                                                        <p class="more-from-para">
                                                                                            <?php echo $name2; ?></p>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>"
                                                                    rel="noopener follow">
                                                                    <h2 class="more-from-heading">
                                                                        <div><?php echo $row['post_title'] ?></div>
                                                                    </h2>
                                                                </a>
                                                            </div><a
                                                                href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>"
                                                                rel="noopener follow">
                                                                <div class="more-from-img-wrapper">
                                                                    <div class="more-from-img-wrapper-inner">
                                                                        <div class="more-from-img-inner-div">
                                                                            <?php
                                                                        if ($row['featured_image'] == '') {
                                                                            echo '<img src="https://test.pinkpaper.xyz/assets/images/blogcms.com.png" alt="image" class="more-from-img" width="56" loading="lazy" role="presentation">';
                                                                        } else {
                                                                            echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="more-from-img" onError="this.onerror=null;this.src=\'https://test.pinkpaper.xyz/assets/images/blogcms.com.png\';" width="56" loading="lazy" role="presentation">';
                                                                        }
                                                                        ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }
                                        } else { ?>
                                            <div class="my-5">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 text-center">
                                                        <img src="assets/images/no_data.svg" alt="" class="p-3"
                                                            style="width: 200px;">
                                                        <h6 class="fw-bold text-center" style="color:var(--gray-color)">
                                                            You
                                                            have no data</h6>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <!-- data set here end -->
                                        </div>
                                    </div>
                                </div>
                                <p class="bv b hw bx jp"><a class="ay az ba bb bc bd be bf bg bh bi bj bk bl bm"
                                        rel="noopener follow" href="all-post">See the full list</a></p>
                            </div>
                            <div class="little-tag-wrapper">
                                <div class="little-tag">
                                    <a class="little-tag-anchor" href="https://discord.com/invite/NREkpnfM"
                                        rel="noopener follow" target="_blank">


                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-discord little-tag-para"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="little-tag">
                                    <a class="little-tag-anchor" href="https://twitter.com/Pinkpaperxyz"
                                        rel="noopener follow" target="_blank">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-twitter little-tag-para"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="little-tag">
                                    <a class="little-tag-anchor" href="https://telegram.me/pinkpaperxyz"
                                        rel="noopener follow" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-telegram little-tag-para"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="little-tag">
                                    <a class="little-tag-anchor" href="mailto:team@pinkpaper.xyz" rel="noopener follow"
                                        target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-envelope-at-fill little-tag-para"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                            <path
                                                d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                        </svg>
                                    </a>
                                </div>
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
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/popr/popr.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <script>
    $(document).ready(function() {
        $(".avatar-image").letterpic({
            colors: [
                "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60",
                "#2980b9", "#8e44ad", "#2c3e50",
                "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400",
                "#c0392b", "#bdc3c7", "#7f8c8d"
            ],
            font: 'Inter'
        });
        $(document).on('click', '.loadmoreLatestPost', function() {
            var row = Number($('#rowLatestPost').val());
            var count = Number($('#postCountLatestPost').val());
            var limit = 10;
            row = row + limit;
            const username = $('#usernameId').val();
            const user_uid2 = $('#user_uid2').val();
            const user_uid = $('#user_uid').val();
            $('#rowLatestPost').val(row);
            $(".loadmoreLatestPost").val('Loading...');
            $.ajax({
                type: 'POST',
                url: 'php/loadMoreData/loadMoreProfileData.php',
                data: {
                    row: row,
                    query: username,
                    user_uid2: user_uid2,
                    user_uid: user_uid
                },
                success: function(data) {
                    var rowCount = row + limit;
                    $('.content-panel').append(data);
                    if (rowCount >= count) {
                        $('.loadmoreLatestPost').css("display", "none");
                    } else {
                        $(".loadmoreLatestPost").val('Load More');
                    }
                    $(".avatar-image").letterpic({
                        colors: [
                            "#1abc9c", "#2ecc71", "#3498db", "#9b59b6",
                            "#34495e", "#16a085", "#27ae60", "#2980b9",
                            "#8e44ad", "#2c3e50",
                            "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1",
                            "#95a5a6", "#f39c12", "#d35400", "#c0392b",
                            "#bdc3c7", "#7f8c8d"
                        ],
                        font: 'Inter'
                    });
                }
            });
        });

        function content_data_load(row) {
            const username = $('#usernameId').val();
            const user_uid2 = $('#user_uid2').val();
            const user_uid = $('#user_uid').val();
            $.ajax({
                url: "php/loadMoreData/loadMoreProfileData.php",
                method: "POST",
                data: {
                    query: username,
                    row: row,
                    user_uid2: user_uid2,
                    user_uid: user_uid
                },
                success: function(data) {
                    $('.content-panel').html(data);

                }
            });
        }
        content_data_load(0);
    });
    </script>
    <script>
    $(document).ready(function() {

        $('#follow_btn').click(function() {
            location.reload(forceGet);
        });


        $('#unfollow_btn').click(function() {
            location.reload(forceGet);
        });
    });

    function unsave(user_uid, post_uid) {
        $.ajax({
            url: "php/unsavePost.php",
            method: "POST",
            dataType: "json",
            data: {
                user_uid: user_uid,
                post_uid: post_uid
            },
            // beforeSend: function() {
            //   $("#divProfileReload .save-reload").html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
            //  $("#divReload .save-reload").html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
            //},
            success: function(data) {
                console.log(data);
                if (data.status == 201) {
                    // if(data.link!=""){
                    // window.location.replace("all-tags");
                    // }else{
                    //     window.location.replace("./);
                    // }
                    window.location.reload();
                    //    $("#divProfileReload").load(location.href + " #divProfileReload");
                    //      $("#divReload").load(location.href + " #divReload");

                } else if (data.status == 301) {
                    console.log(data.error);
                    //swal("error");
                    // $('#contact-success').css('display', 'none');
                    // $('#contact-form').css('display', 'block');
                    // swal('success'); 
                } else {
                    //     swal("problem with query");
                }
            }
        });


    }

    function save(user_uid, post_uid) {
        $.ajax({
            url: "php/savePost.php",
            method: "POST",
            dataType: "json",
            data: {
                user_uid: user_uid,
                post_uid: post_uid
            },
            //beforeSend: function() {
            //   $("#divProfileReload .save-reload").html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
            //   $("#divReload .save-reload").html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
            //},
            success: function(data) {
                console.log(data);
                if (data.status == 201) {
                    // if(data.link!=""){
                    // window.location.replace("all-tags");
                    // }else{
                    //     window.location.replace("./);
                    // }
                    window.location.reload();
                    //$("#divProfileReload").load(location.href + " #divProfileReload");
                    // $("#divReload").load(location.href + " #divReload");

                } else if (data.status == 301) {
                    console.log(data.error);
                    //swal("error");
                    // $('#contact-success').css('display', 'none');
                    // $('#contact-form').css('display', 'block');
                    // swal('success'); 
                } else {
                    //     swal("problem with query");
                }
            }
        });


    }

    function follow(following_user_uid, followed_user_uid) {
        $.ajax({
            url: "php/followUser.php",
            method: "POST",
            dataType: "json",
            data: {
                following_user_uid: following_user_uid,
                followed_user_uid: followed_user_uid
            },
            beforeSend: function() {
                $("#follow_reload").html(
                    '<div class="d-flex.justify-content-center" style="color:var(--text-color);"><div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                );
            },
            success: function(data) {
                console.log(data);
                if (data.status == 201) {
                    $("#follow_reload").load(location.href + " #follow_reload");

                } else if (data.status == 301) {
                    console.log(data.error);
                } else {
                    //     swal("problem with query");
                }
            }
        });


    }

    function unfollow(following_user_uid, followed_user_uid) {
        $.ajax({
            url: "php/unfollowUser.php",
            method: "POST",
            dataType: "json",
            data: {
                following_user_uid: following_user_uid,
                followed_user_uid: followed_user_uid
            },
            beforeSend: function() {
                $("#follow_reload").html(
                    '<div class="d-flex.justify-content-center" style="color:var(--text-color);"><div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                );
            },
            success: function(data) {
                console.log(data);
                if (data.status == 201) {
                    $("#follow_reload").load(location.href + " #follow_reload");

                } else if (data.status == 301) {
                    console.log(data.error);
                } else {
                    //     swal("problem with query");
                }
            }
        });


    }
    </script>
</body>

</html>