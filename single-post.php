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

$username_req = $username_post;
$post_slug_req = $post_slug;
$sql2 = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`,`user_login`.`bio`,`user_login`.`twitter_url`,`user_login`.`instagram_url`,`user_login`.`linkedin_url`,`user_login`.`facebook_url` FROM `stories`INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` 
WHERE `stories`.`unlisted` = 'false'
AND `user_login`.`account_status`='active' AND `user_login`.`username`='$username_req' 
AND `stories`.`post_slug` = '$post_slug_req'";
$run_Sql2 = mysqli_query($link, $sql2);
$fetch_info2 = mysqli_fetch_assoc($run_Sql2);
$name2 = `user_login` . $fetch_info2['name'];
$username2 = `user_login` . $fetch_info2['username'];
$bio2 = `user_login` . $fetch_info2['bio'];
$profile2 = `user_login` . $fetch_info2['profile'];
$post_title2 = `stories` . $fetch_info2['post_title'];
$featured_image2 = `stories` . $fetch_info2['featured_image'];
$post_content2 = `stories` . $fetch_info2['post_content'];
$created_at2 = `stories` . $fetch_info2['created_at'];
$post_tags2 = `stories` . $fetch_info2['post_tags'];
$post_uid = `stories` . $fetch_info2['post_uid'];
$user_uid_follow = `user_login` . $fetch_info2['user_uid'];
$ipfs_link = $fetch_info2['blog_ipfs_url'];
$twitter_url = $fetch_info2['twitter_url'];
$instagram_url = $fetch_info2['instagram_url'];
$linkedin_url = $fetch_info2['linkedin_url'];
$facebook_url = $fetch_info2['facebook_url'];
$data = array();
date_default_timezone_set("Asia/Calcutta");
$date_now = date("20y-m-d");
$post_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$query11 = "SELECT * FROM post_views WHERE post_uid='$post_uid' order by `post_views`.`day` desc";
$ree = mysqli_query($link, $query11);
$roww = mysqli_fetch_array($ree);
$day = $roww['day'];
if ($day == $date_now) {
    $link->query("UPDATE post_views SET post_per_day_views=post_per_day_views+1 WHERE post_uid='$post_uid' AND day='$date_now'");
} else {

    $link->query("INSERT INTO post_views(post_uid,day,post_per_day_views) VALUES ('$post_uid','$date_now','1') ");
}
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
    <meta property="og:image" itemprop="image"
        content="https://ethereumcms.quadbtech.com/assets/images/logo/logo_icon.png" />
    <meta property="og:image:secure_url" itemprop="image"
        content="https://ethereumcms.quadbtech.com/assets/images/logo/logo_icon.png" />
    <meta name="twitter:card" content="https://ethereumcms.quadbtech.com/assets/images/logo/logo_icon.png">
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
    <script src="https://ethereumcms.quadbtech.com/assets/feather/feather.min.js"></script>


    <!-- stylesheet -->
    <link href="https://ethereumcms.quadbtech.com/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://ethereumcms.quadbtech.com/assets/toastr/toastr.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://ethereumcms.quadbtech.com/assets/css/success.css'>
    <link href="https://ethereumcms.quadbtech.com/assets/css/app.css" rel="stylesheet">
    <link href="https://ethereumcms.quadbtech.com/assets/css/loader.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.quilljs.com/1.2.3/quill.snow.css'>
    <link rel='stylesheet' href='https://cdn.quilljs.com/1.2.3/quill.bubble.css'>
    <style>
    .post-content img {
        width: 100%;
    }


    /*right modal*/
    /* .modal{
    background: var(--primary-color);
} */

    .modal.right_modal {
        position: fixed;
        z-index: 99999;
    }

    .modal.right_modal .modal-dialog {
        position: fixed;
        margin: auto;
        width: 32%;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    .modal-dialog {
        /* max-width: 100%; */
        margin: 1.75rem auto;
        border-radius: 15px 0 0 15px;
    }

    .modal.right_modal .modal-content {
        /*overflow-y: auto;
    overflow-x: hidden;*/
        height: 100vh !important;
    }

    .modal.right_modal .modal-body {
        padding: 15px 15px 30px;
    }

    .modal-backdrop {
        display: none;
    }

    /*Right*/
    .modal.right_modal.fade .modal-dialog {
        right: -50%;
        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
        transition: opacity 0.3s linear, right 0.3s ease-out;
    }

    .modal.right_modal.fade.show .modal-dialog {
        right: 0;
        box-shadow: 0px 0px 19px rgba(0, 0, 0, .5);
    }

    /* ----- MODAL STYLE ----- */
    .modal-content {
        border: none;
        border-radius: 15px 0 0 15px;
    }

    .modal-header {
        padding: 10px 15px;
        border-bottom-color: var(--gray-color);
        background: var(--primary-color) !important;
        border-radius: 15px 0 0 0;
    }

    .modal_outer .modal-body {
        /*height:90%;*/
        overflow-y: auto;
        overflow-x: hidden;
        height: 91vh;
        background: var(--primary-color);
        border-radius: 0 0 0 15px;
    }

    .close-modal {
        color: var(--gray-color);
        transition: transform .25s, opacity .25s;
    }

    .close-modal:hover {
        color: var(--gray-color);
        opacity: 1;
        transform: rotate(90deg);
    }

    .close-modal:focus {
        color: var(--gray-color);
        opacity: 1;
        transform: rotate(90deg);
    }

    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;

        width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
        display: none;
        position: absolute;
        bottom: 250;
        right: 15px;
        z-index: 6000;
    }

    /* Add styles to the form container */
    .form-container {
        z-index: 3;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 40em;
        height: 28em;
        border-radius: 30px;
        margin-top: 0em;
        /*set to a negative number 1/2 of your height*/
        margin-left: 15em;
        /*set to a negative number 1/2 of your width*/
        background-color: #edecec;
    }

    /* Full-width input fields */
    .form-container input[type=number],
    .form-container input[type=password] {
        width: 70%;
        padding: 10px;
        margin: 5px 0 18px 0;
        border: 2px solid black;
        border-radius: 12px;
        background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=number]:focus,
    .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 60%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }


    @media (max-width: 991px) {
        .modal.right_modal {
            position: fixed;
            z-index: 99999;
        }

        .modal.right_modal .modal-dialog {
            position: fixed;
            margin: auto;
            width: 100%;
            height: 80%;
            -webkit-transform: translate3d(0%, 0, 0);
            -ms-transform: translate3d(0%, 0, 0);
            -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
        }

        .modal-dialog {
            /* max-width: 100%; */
            margin: 1.75rem auto;
            border-radius: 10px;
            border-radius: 15px 15px 0 0;
        }

        .modal.right_modal .modal-content {
            /*overflow-y: auto;
        overflow-x: hidden;*/
            height: 80vh !important;
        }

        .modal.right_modal .modal-body {
            padding: 15px 15px 30px;
        }

        .modal-backdrop {
            display: none;
        }

        /*Right*/
        .modal.right_modal.fade .modal-dialog {
            bottom: -50%;
            -webkit-transition: opacity 0.3s linear, bottom 0.3s ease-out;
            -moz-transition: opacity 0.3s linear, bottom 0.3s ease-out;
            -o-transition: opacity 0.3s linear, bottom 0.3s ease-out;
            transition: opacity 0.3s linear, bottom 0.3s ease-out;
        }

        .modal.right_modal.fade.show .modal-dialog {
            bottom: 0;
            box-shadow: 0px 0px 19px rgba(0, 0, 0, .5);
        }

        /* ----- MODAL STYLE ----- */
        .modal-content {
            border: none;
            border-radius: 15px 15px 0 0;

        }

        .modal-header {
            padding: 10px 15px;
            border-bottom-color: var(--gray-color);
            background-color: var(--primary-color);
            border-radius: 15px 15px 0 0;

        }

        .modal_outer .modal-body {
            /*height:90%;*/
            overflow-y: auto;
            overflow-x: hidden;

        }

        .form-popup {
            display: none;
            position: absolute;
            bottom: 250;
            right: 15px;
            z-index: 6000;
        }

        .form-container {
            z-index: 3;
            position: initial;
            top: 50%;
            left: 50%;
            width: 40em;
            height: 28em;

            margin-top: 0em;
            /*set to a negative number 1/2 of your height*/
            margin-left: 15em;
            /*set to a negative number 1/2 of your width*/
            background-color: #edecec;
        }

        /* Full-width input fields */
        .form-container input[type=number],
        .form-container input[type=password] {
            width: 70%;
            padding: 10px;
            margin: 5px 0 18px 0;
            border: 2px solid black;
            border-radius: 12px;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=number]:focus,
        .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 70%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }
    }

    /* @media (max-width: 770px) {
    .form-container {
  z-index: 3;
  position:initial;
    top: 50%;
    left: 50%;
    width:40em;
    height:22em;
    
    margin-top: 0em; /*set to a negative number 1/2 of your height
    margin-left: 15em; /*set to a negative number 1/2 of your width
  background-color: white;
} 


}*/
    @media (max-width: 590px) {
        .form-container {
            z-index: 3;
            position: initial;
            top: 50%;
            left: 50%;
            width: 25em;
            height: 28em;

            margin-top: 0em;
            /*set to a negative number 1/2 of your height*/
            margin-left: 15em;
            /*set to a negative number 1/2 of your width*/
            background-color: #edecec;
        }

    }

    #editorComment {
        background: var(--accent-color);
        color: var(--accent-hover-color);
        border: none;
        border-radius: 15px;
        border: 1px solid var(--accent-hover-color) !important;

        /*  overflow-y: auto;
    height: 300px; */
    }

    #editorSubcomment {
        background: var(--accent-color);
        color: var(--accent-hover-color);
        border: none;
        border-radius: 15px;
        border: 1px solid var(--accent-hover-color) !important;

        /*  overflow-y: auto;
    height: 300px; */
    }

    .ql-editor {
        padding: 10px 20px !important;
        height: 60px !important;
    }

    #editorComment:focus {
        background: var(--accent-color);
        color: var(--accent-hover-color);
    }

    #editorSubcomment:focus {
        background: var(--accent-color);
        color: var(--accent-hover-color);
    }

    .ql-editor::placeholder {
        color: var(--accent-hover-color) !important;
    }

    .ql-snow {
        background: var(--bg-color);
        border: 1px solid var(--primary-color) !important;
        color: var(--text-color);
        border-radius: 15px;
        margin-bottom: 5px;
    }

    .ql-stroke {
        stroke: var(--text-color) !important;

    }

    .ql-fill {
        fill: var(--text-color) !important;

    }

    .comment-paragraph canvas {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px dashed var(--gray-color);
        padding: 2px;
    }

    .comment-paragraph img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px dashed var(--gray-color);
        padding: 2px;
    }

    .comment-paragraph .author-link {
        color: var(--text-color);
        text-decoration: none;
    }

    .subcomment-paragraph {
        border-left: 3px solid var(--gray-color-50);
    }

    .subcomment-paragraph canvas {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px dashed var(--gray-color);
        padding: 2px;
    }

    .subcomment-paragraph img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px dashed var(--gray-color);
        padding: 2px;
    }

    .subcomment-paragraph .author-link {
        color: var(--text-color);
        text-decoration: none;
    }



    #header-setting-style {
        margin-bottom: 3rem !important;
    }

    tbody {
        display: table-caption;
        height: 13rem;
        /* Just for the demo          */
        overflow-y: auto;
        /* Trigger vertical scroll    */
        overflow-x: hidden;
        /* Hide the horizontal scroll */
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

    <div class="container" style="padding-top:50px;"></div>
    <input type="hidden" name="postUId" id="postUId" value="<?php echo $post_uid ?>">
    <input type="hidden" name="ipfsUrl" id="ipfsUrl" value="<?php echo $ipfs_link ?>">
    <section class="latest-post my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-12 order-2 order-lg-1">
                    <div class="sidebar-item">
                        <div class="">

                            <!-- user details -->
                            <div class="profile-div mb-4">
                                <div
                                    class="profile-card shadow d-flex flex-column justify-content-center px-3 py-3 text-center">
                                    <?php
                                    if ($profile2 == '') {
                                        echo '<div class="text-center"><canvas class="avatar-image rounded-circle text-center p-1 shadow-sm" title="' . $name2 . '" style="width:60px;height:60px;"></canvas></div>';
                                    } else {
                                        echo '<div class="text-center"><img src="uploads/profile/' . $profile2 . '" alt="" class="text-center p-1 shadow-sm" style="width:60px;height:60px;"></div>';
                                    }
                                    ?>
                                    <h6 class="fw-bold text-capitalize mb-1" style="color:var(--text-color);">
                                        <?php echo $name2; ?></h6>
                                    <!-- <p class="text-muted mb-2">@<?php echo $username2; ?></p> -->
                                    <p class="text-muted small mb-2 show-read-more-2"><?php echo $bio2; ?></p>
                                    <?php $user2uid = $user_uid_follow; ?>

                                    <div class="d-grid" id="follow_reload">
                                        <?php
                                        $user_uid2 = $user_uid ?? null;
                                        $sql20 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid2' 
                                        AND followed_user_uid = '$user_uid_follow'";
                                        $run_Sql20 = mysqli_query($link, $sql20);
                                        $fetch_info20 = mysqli_fetch_assoc($run_Sql20);

                                        $following_user_uid = $fetch_info20['following_user_uid'] ?? null;
                                        $followed_user_uid = $fetch_info20['followed_user_uid'] ?? null;

                                        if (!isset($_SESSION['email'])) {
                                            echo '<button type="button" class="btn button-follow fw-bold" onClick="login()">Follow</button>';
                                        } else if ($user_uid2 == $user_uid_follow) {
                                            //echo '';
                                        } else if ($following_user_uid == $user_uid2 && $followed_user_uid == $user_uid_follow) {
                                            echo '<button type="button" class="btn button-follow fw-bold" onClick="unfollow(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Following</button>';
                                        } else {
                                            echo '<button type="button" class="btn button-follow fw-bold" onClick="follow(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Follow</button>';
                                        }
                                        ?>
                                    </div>
                                    <div class="d-flex gap-2 social-icon-post justify-content-center">
                                        <?php 
                                        if($twitter_url !== '' && $twitter_url !== null){
                                        ?>
                                        <a class="mt-2" href='<?php echo $twitter_url; ?>'
                                            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Follow me on Twitter"><i
                                                class="fab fa-twitter"></i></a>
                                        <?php } ?>

                                        <?php 
                                        if($instagram_url !== '' && $instagram_url !== null){
                                        ?>
                                        <a class="mt-2" href='<?php echo $instagram_url; ?>'
                                            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Follow me on Instagram"><i
                                                class="fab fa-instagram"></i></a>
                                        <?php } ?>

                                        <?php 
                                        if($linkedin_url !== '' && $linkedin_url !== null){
                                        ?>
                                        <a class="mt-2" href='<?php echo $linkedin_url; ?>'
                                            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Follow me on Linkedin"><i
                                                class="fab fa-linkedin-in"></i></a>
                                        <?php } ?>

                                        <?php 
                                        if($facebook_url !== '' && $facebook_url !== null){
                                        ?>
                                        <a class="mt-2" href='<?php echo $facebook_url; ?>'
                                            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                            target="_blank" title="Follow me on Facebook"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <?php } ?>
                                    </div>
                                    <?php
                                    if (!isset($_SESSION['email'])) {
                                        echo '<button class="btn tip-button-2 fw-bold  mt-3" onClick="login()"><img src="https://ethereumcms.quadbtech.com/assets/images/metamask-fox.svg"><span class="ms-2">Donate<span class="d-lg-none"> with MetaMask</span></span></button>';
                                        // echo '<button class="btn tip-button-2 fw-bold  mt-3" id="nearbtn"><span class="ms-2">Connect NEAR</span></button>';
                                    } else if ($user_uid2 == $user_uid_follow) {
                                        //echo '';
                                    } else {
                                        echo '<button class="btn tip-button-2 fw-bold  mt-3" data-bs-toggle="modal" data-bs-target="#metamaskDonateModal"><img src="https://ethereumcms.quadbtech.com/assets/images/metamask-fox.svg"><span class="ms-2">Donate<span class="d-lg-none">with MetaMask </span></span></button>';
                                        //echo '<button class="btn tip-button-2 fw-bold  mt-3" id="nearbtn"><span class="ms-2">Connect NEAR</span></button>';
                                    ?>
                                    <?php
                                    }
                                    ?>
                                    <div class="message text-muted"></div>
                                </div>
                            </div>
                            <div class="d-none d-lg-block">
                                <div class="profile-div mb-5">
                                    <div class="profile-card shadow  p-3">
                                        <div class="d-flex justify-content-around gap-4" id="divProfileReload">
                                            <?php
                                            $user_uid2 = $user_uid ?? null;
                                            $sql10 = "SELECT * FROM post_like WHERE post_uid = '$post_uid' AND user_uid = '$user_uid2'";
                                            $run_Sql10 = mysqli_query($link, $sql10);
                                            $fetch_info10 = mysqli_fetch_assoc($run_Sql10);

                                            $run_Sql11 = mysqli_query($link, "SELECT * FROM post_like WHERE post_uid = '$post_uid'");
                                            $count_like = mysqli_num_rows($run_Sql11);
                                            $like_user_uid = $fetch_info10['user_uid'] ?? null;
                                            $like_post_uid = $fetch_info10['post_uid'] ?? null;
                                            if (!isset($_SESSION['email'])) {
                                                echo '<p class="icon-color mb-0 like-reload" onClick="login()"><i class="far fa-heart"></i> ' . $count_like . '</p>';
                                            } else if ($like_user_uid == $user_uid2 && $like_post_uid == $post_uid) {
                                                echo '<p class="icon-color mb-0 like-reload" onClick="unlike(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="fas fa-heart"></i> ' . $count_like . '</p>';
                                            } else {
                                                echo '<p class="icon-color mb-0 like-reload" onClick="like(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="far fa-heart"></i> ' . $count_like . '</p>';
                                            }
                                            ?>
                                            <p class="icon-color mb-0" data-bs-toggle="modal"
                                                data-bs-target="#commentRightModal"><i class="far fa-comment"></i></p>

                                            <?php
                                            $user_uid2 = $user_uid ?? null;
                                            $sql12 = "SELECT * FROM post_list WHERE post_uid = '$post_uid' AND user_uid = '$user_uid2'";
                                            $run_Sql12 = mysqli_query($link, $sql12);
                                            $fetch_info12 = mysqli_fetch_assoc($run_Sql12);

                                            $list_user_uid = $fetch_info12['user_uid'] ?? null;
                                            $list_post_uid = $fetch_info12['post_uid'] ?? null;
                                            if (!isset($_SESSION['email'])) {
                                                echo '<p class="icon-color mb-0 save-reload" onClick="login()"><i class="far fa-bookmark"></i></p>';
                                            } else if ($list_user_uid == $user_uid2 && $list_post_uid == $post_uid) {
                                                echo '<p class="icon-color mb-0 save-reload" onClick="unsave(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="fas fa-bookmark"></i></p>';
                                            } else {
                                                echo '<p class="icon-color mb-0 save-reload" onClick="save(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="far fa-bookmark"></i></p>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 order-1 order-lg-2">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h2 class="fw-bold mb-3" style="color:var(--text-color);"><?php echo $post_title2; ?></h2>
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                                <div class="author d-flex justify-content-start">
                                    <?php
                                    if ($profile2 == '') {
                                        echo '<div class="profile"><a href="' . $username2 . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $name2 . '" width="40" height="40"></canvas></a></div>';
                                    } else {
                                        echo '<div class="profile"><a href="' . $username2 . '"><img src="uploads/profile/' . $profile2 . '" alt="" class="img-fluid rounded-circle"></a></div>';
                                    }
                                    ?>
                                    <div class="author-name ms-2">
                                        <a href="<?php echo $username2; ?>" class="author-link">
                                            <h6 class="fw-bold mb-0" style="font-size:14px;"><?php echo $name2; ?></h6>
                                        </a>
                                        <span class="text-muted"
                                            style="font-size:12px;"><?php echo date('M j, Y', strtotime($created_at2)); ?></span>
                                        <span class="text-muted">&bull;</span> <span class="text-muted"
                                            style="font-size:12px;">
                                            <?php
                                            $mycontent = $post_content2;
                                            $word = str_word_count(strip_tags($mycontent));
                                            $m = floor($word / 200);
                                            $s = floor($word % 200 / (200 / 60));
                                            //$readtime = $m . ' min' . ($m == 1 ? '' : 's') . ', ' . $s . ' sec' . ($s == 1 ? '' : 's');
                                            if ($m >= '1') {
                                                echo $m . ' min' . ($m == 1 ? '' : 's') . ' read';
                                            } else if ($m <= '1') {
                                                echo $s . ' sec' . ($s == 1 ? '' : 's') . ' read';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 social-icon-post">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_link; ?>&t=<?php echo $post_title2; ?>"
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>

                                    <a href="https://twitter.com/share?url=<?php echo $post_link; ?>&text=<?php echo $post_title2; ?>"
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a>

                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_link; ?>&t=<?php echo $post_title2; ?>"
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    <?php 
                                        if($ipfs_link !== ''){
                                            ?>
                                    <a href="<?php echo $ipfs_link ?>"
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="IPFS url"><img
                                            src="https://ethereumcms.quadbtech.com/assets/images/ipfs.svg" alt=""
                                            style="height:auto;width:60%;"></a>
                                    <?php
                                        }
                                        ?>

                                    <a href="whatsapp://send?text=<?php echo $post_link; ?>"
                                        data-action="share/whatsapp/share"
                                        onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Share on whatsapp"><i class="fab fa-whatsapp"></i></a>

                                    <p class="copy-link" data-clipboard-text="<?php echo $post_link; ?>"
                                        title="Copy link"><i class="fas fa-link"></i></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <?php
                                if ($featured_image2 == '') {
                                    echo '<img src="https://ethereumcms.quadbtech.com/assets/images/blogcms.com.png" alt="image" class="shadow img-fluid" style="border-radius:15px;">';
                                } else {
                                    echo '<img src="uploads/featuredImages/' . $featured_image2 . '" alt="image" class="shadow img-fluid" style="border-radius:15px;" onError="this.onerror=null;this.src=\'https://ethereumcms.quadbtech.com/assets/images/blogcms.com.png\';">';
                                }
                                ?>
                            </div>
                            <div class="mb-2 post-content" style="color:var(--gray-color);">
                                <?php echo $post_content2; ?>
                            </div>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <?php
                                $tag_name = explode(",", $post_tags2);
                                foreach ($tag_name as $key => $val) {
                                    echo '<a href="topic/' . $val . '" class="topic fw-bold py-1 px-3">' . $val . '</a>';
                                }
                                ?>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center" id="social-style">
                                <div class="d-flex gap-4 mb-2 mb-lg-0 mb-md-0" id="divReload">
                                    <?php
                                    $user_uid2 = $user_uid ?? null;
                                    $sql10 = "SELECT * FROM post_like WHERE post_uid = '$post_uid' AND user_uid = '$user_uid2'";
                                    $run_Sql10 = mysqli_query($link, $sql10);
                                    $fetch_info10 = mysqli_fetch_assoc($run_Sql10);

                                    $run_Sql11 = mysqli_query($link, "SELECT * FROM post_like WHERE post_uid = '$post_uid'");
                                    $count_like = mysqli_num_rows($run_Sql11);

                                    $like_user_uid = $fetch_info10['user_uid'] ?? null;
                                    $like_post_uid = $fetch_info10['post_uid'] ?? null;
                                    if (!isset($_SESSION['email'])) {
                                        echo '<p class="icon-color mb-0 like-reload" onClick="login()"><i class="far fa-heart"></i> ' . $count_like . '</p>';
                                    } else if ($like_user_uid == $user_uid2 && $like_post_uid == $post_uid) {
                                        echo '<p class="icon-color mb-0 like-reload" onClick="unlike(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="fas fa-heart"></i> ' . $count_like . '</p>';
                                    } else {
                                        echo '<p class="icon-color mb-0 like-reload" onClick="like(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="far fa-heart"></i> ' . $count_like . '</p>';
                                    }
                                    ?>


                                    <p class="icon-color mb-0" data-bs-toggle="modal"
                                        data-bs-target="#commentRightModal"><i class="far fa-comment"></i></p>


                                    <?php
                                    $user_uid2 = $user_uid ?? null;
                                    $sql12 = "SELECT * FROM post_list WHERE post_uid = '$post_uid' AND user_uid = '$user_uid2'";
                                    $run_Sql12 = mysqli_query($link, $sql12);
                                    $fetch_info12 = mysqli_fetch_assoc($run_Sql12);

                                    $list_user_uid = $fetch_info12['user_uid'] ?? null;
                                    $list_post_uid = $fetch_info12['post_uid'] ?? null;
                                    if (!isset($_SESSION['email'])) {
                                        echo '<p class="icon-color mb-0 save-reload" onClick="login()"><i class="far fa-bookmark"></i></p>';
                                    } else if ($list_user_uid == $user_uid2 && $list_post_uid == $post_uid) {
                                        echo '<p class="icon-color mb-0 save-reload" onClick="unsave(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="fas fa-bookmark"></i></p>';
                                    } else {
                                        echo '<p class="icon-color mb-0 save-reload" onClick="save(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="far fa-bookmark"></i></p>';
                                    }
                                    ?>
                                </div>
                                <div class="d-flex justify-content-center align-items-center gap-2 social-icon-post">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_link; ?>&t=<?php echo $post_title2; ?>"
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>

                                    <a href="https://twitter.com/share?url=<?php echo $post_link; ?>&text=<?php echo $post_title2; ?>"
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a>

                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_link; ?>&t=<?php echo $post_title2; ?>"
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    <?php 
                                        if($ipfs_link !== ''){
                                            ?>
                                    <a href="<?php echo $ipfs_link ?>"
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="IPFS url"><img
                                            src="https://ethereumcms.quadbtech.com/assets/images/ipfs.svg" alt=""
                                            style="height:auto;width:60%;"></a>
                                    <?php
                                        }
                                        ?>

                                    <a href="whatsapp://send?text=<?php echo $post_link; ?>"
                                        data-action="share/whatsapp/share"
                                        onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Share on whatsapp"><i class="fab fa-whatsapp"></i></a>

                                    <p class="copy-link mb-0" data-clipboard-text="<?php echo $post_link; ?>"
                                        title="Copy link"><i class="fas fa-link"></i></p>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 order-3 order-lg-3">
                    <div class="sidebar-item">
                        <div class="make-me-sticky">
                            <div class="mb-2">
                                <div class="profile-div mb-3">
                                    <div class="heading mb-4">
                                        <h4 class="fw-bold">More Post<span>.</span></h4>
                                    </div>
                                    <div class="profile-card shadow p-2">
                                        <?php

                                        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` WHERE `post_status` = 'published' AND `unlisted` = 'false' AND `user_login`.`user_uid`='$user_uid_follow' AND `stories`.`post_uid`!='$post_uid' ORDER BY post_id DESC LIMIT 5";
                                        $result = mysqli_query($link, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                        <div class="more-posts py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0" style="width:80px;border-radius:15px;">
                                                    <?php
                                                            if ($row['featured_image'] == '') {
                                                                echo '<a href="' . $row['username'] . '/' . $row['post_slug'] . '"><img src="https://ethereumcms.quadbtech.com/assets/images/blogcms.com.png" alt="image" class="shadow-sm img-fluid" style="border-radius:15px;"></a>';
                                                            } else {
                                                                echo '<a href="' . $row['username'] . '/' . $row['post_slug'] . '"><img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow-sm img-fluid" onError="this.onerror=null;this.src=\'https://ethereumcms.quadbtech.com/assets/images/blogcms.com.png\';" style="border-radius:15px;"></a>';
                                                            }
                                                            ?>
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>"
                                                        class="articles-dot ">
                                                        <h6 class="fw-bold"><?php echo $row['post_title'] ?></h6>
                                                    </a>
                                                    <p class="small mb-0">
                                                        <?php echo date('M j, Y', strtotime($row['created_at'])); ?></p>
                                                </div>
                                            </div>

                                        </div>

                                        <?php }
                                        } else { ?>

                                        <div class="my-5">
                                            <div class="row justify-content-center">
                                                <div class="col-12 text-center">
                                                    <img src="https://ethereumcms.quadbtech.com/assets/images/no_data.svg"
                                                        alt="" class="p-3" style="width: 200px;">
                                                    <h6 class="fw-bold text-center" style="color:var(--gray-color)">You
                                                        have no data</h6>

                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="profile-div mb-3">
                                    <div class="heading mb-4">
                                        <h4 class="fw-bold">Top Contributor<span>.</span></h4>
                                    </div>
                                    <?php
                                                    $query = "SELECT count(`post_uid`) as total_count FROM `donate_eth` WHERE `post_uid` = '$post_uid'";
                                                    $result = mysqli_query($link, $query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $total_contributors = $row['total_count'];
                                                        ?>
                                    <small class="d-flex justify-content-start align-items-center ml-4 mb-2"
                                        style="color:#6c757d !important">Total Contributor:&nbsp;<h6 class="m-0">
                                            <?php echo $row['total_count'] ?>

                                        </h6></small>
                                        <?php 
                                        if($total_contributors !== '0'){
                                            ?>
                                    <div class="profile-card shadow p-2">
                                        <table class="table table-hover table-responsive"
                                            style="color:#6c757d !important">
                                            <thead class="thead-light">
                                                <tr class="py-5">
                                                    <th scope="col">#</th>
                                                    <th scope="col">User</th>
                                                    <th scope="col">ETH</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query = "SELECT * FROM `donate_eth` WHERE `post_uid` = '$post_uid' ORDER BY eth_price DESC";
                                                    $result = mysqli_query($link, $query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        $i=1;
                                                        while ($row = mysqli_fetch_assoc($result)) {                                                            
                                                    ?>
                                                <tr class="py-5">
                                                    <th scope="row"><?php echo $i ?></th>
                                                    <td class="text-truncate"
                                                        title=<?php echo $row['from_user_address'] ?>
                                                        style="cursor:pointer">
                                                        <a href="https://rinkeby.etherscan.io/address/<?php echo $row['from_user_address'] ?>"
                                                            style="text-decoration: none;color: inherit;"><img
                                                                src="./assets/images/user.png" alt="user-img"
                                                                height="20" width="20"
                                                                class="mx-1"><img><?php echo substr($row['from_user_address'], 0, 5) ?>...<?php echo substr($row['from_user_address'], -5) ?></a>
                                                    </td>
                                                    <td><?php echo $row['eth_price'] ?></td>
                                                </tr>
                                                <?php 
                                                $i = $i+1;
                                            } }?>
                                            </tbody>
                                        </table>

                                    </div>
                                    <?php }}} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="d-lg-none">
                <div class="d-flex justify-content-center mb-4">
                    <hr style="background:var(--gray-color);width:80%;">
                </div>
            </div> -->
        </div>
    </section>


    <!-- footer start-->
    <?php include('include/footer.php'); ?>
    <!-- footer end-->


    <!-- right modal -->
    <div class="modal modal_outer right_modal fade" id="commentRightModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <?php
            $query = "SELECT `post_comments`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `post_comments` INNER JOIN `user_login` ON `post_comments`.`user_uid`=`user_login`.`user_uid` WHERE `post_comments`.`post_uid`='$post_uid' ORDER BY `post_comments`.`comment_id` DESC";
            $result = mysqli_query($link, $query);

            ?>
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase fw-bold" style="color:var(--text-color)">Comments
                        (<?php echo mysqli_num_rows($result); ?>)</h5>
                    <button type="button" class="close-modal btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <input type="hidden" id="post_uid_comment" value="<?php echo $post_uid; ?>">
                        <input type="hidden" id="user_uid_comment" value="<?php echo $user_uid ?? null; ?>">
                        <!-- <div id="editorComment">
                        </div> -->
                        <textarea class="form-control" id="editorComment" rows="4" placeholder="Comment"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <?php
                        if (!isset($_SESSION['email'])) {
                            echo '<button class="btn button-primary-2"  onClick="login()">Respond</button>';
                        } else {
                            echo '<button class="btn button-primary-2" id="submitComments">Respond</button>';
                        }
                        ?>
                    </div>
                    <hr>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="comment-paragraph">
                        <div class="d-flex justify-content-start">
                            <?php
                                    if ($row['profile'] == '') {
                                        echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="40" height="40"></canvas></a></div>';
                                    } else {
                                        echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
                                    }
                                    ?>
                            <div class="author-name ms-2">
                                <a href="" class="author-link mb-0">
                                    <h6 class="fw-bold mb-0" style="font-size:14px;"><?php echo $row['name']; ?></h6>
                                </a>
                                <span class="text-muted"
                                    style="font-size:12px;"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></span>
                            </div>
                        </div>
                        <p class="show-read-more small" style="color:var(--gray-color);">
                            <?php echo strip_tags($row['comment']); ?></p>

                        <?php
                                $comment_uid = $row['comment_uid'];

                                $query2 = "SELECT `post_subcomments`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `post_subcomments` INNER JOIN `user_login` ON `post_subcomments`.`user_uid`=`user_login`.`user_uid` WHERE `post_subcomments`.`post_uid`='$post_uid' AND `post_subcomments`.`comment_uid`='$comment_uid' ORDER BY `post_subcomments`.`subcomment_id` DESC";
                                $result2 = mysqli_query($link, $query2);


                                ?>
                        <div class="d-flex justify-content-between mb-3">
                            <div><button class="btn bg-transparent p-0" style="color:var(--text-color);"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseAllReply<?php echo $row['comment_id']; ?>"
                                    aria-expanded="false"
                                    aria-controls="collapseAllReply<?php echo $row['comment_id']; ?>"><?php if (mysqli_num_rows($result2) > -1) {
                                                                                                                                                                                                                                                                                                            echo mysqli_num_rows($result2) . ' replies';
                                                                                                                                                                                                                                                                                                        }; ?></button>
                            </div>
                            <div>


                                <button class="btn bg-transparent p-0" style="color:var(--text-color);"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapseReplyForm<?php echo $row['comment_id']; ?>"
                                    aria-expanded="false"
                                    aria-controls="collapseReplyForm<?php echo $row['comment_id']; ?>">Reply</button>
                                <?php
                                        if ($row['user_uid'] == $user_uid2) {


                                            echo '<button class="btn bg-transparent p-0" onClick="delcomment(\'' . $user_uid . '\',\'' . $comment_uid . '\')">Delete</button>';
                                        }
                                        ?>
                            </div>
                        </div>
                        <div class="subcomment-paragraph ms-5 ps-2">
                            <div class="collapse my-2" id="collapseReplyForm<?php echo $row['comment_id']; ?>">
                                <div class="">
                                    <form method="post" action="php/addSubcomments.php" target="_self">
                                        <div class="form-group mb-2">
                                            <!-- <div id="editorSubcomment">
                                            </div> -->
                                            <input type="hidden" id="post_uid_subcomment" name="post_uid"
                                                class="post_uid_subcomment" value="<?php echo $post_uid; ?>">
                                            <input type="hidden" id="user_uid_subcomment" name="user_uid"
                                                class="user_uid_subcomment" value="<?php echo $user_uid ?? null; ?>">
                                            <input type="hidden" id="comment_uid" class="comment_uid" name="comment_uid"
                                                value="<?php echo $comment_uid; ?>">
                                            <input type="hidden" id="comment_uid" class="comment_uid" name="comment_uid"
                                                value="<?php echo $comment_uid; ?>">
                                            <input type="hidden" id="page_url" class="page_url" name="page_url"
                                                value="<?php echo $post_link; ?>">
                                            <textarea class="form-control" id="editorSubcomment" name="subcomment"
                                                class="editorSubcomment" rows="4" placeholder="Reply Comment"
                                                required></textarea>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <?php
                                                    if (!isset($_SESSION['email'])) {
                                                        echo '<button class="btn button-primary-2"  onClick="login()">Respond</button>';
                                                    } else {
                                                        echo '<button type="submit" name="submitSubcomments" class="btn button-primary-2 submitSubcomments" id="submitSubcomments" >Respond</button>';
                                                    }
                                                    ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="collapseAllReply<?php echo $row['comment_id']; ?>">
                            <?php
                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                    ?>
                            <div class="subcomment-paragraph ms-5 ps-2">

                                <div class="d-flex justify-content-start">
                                    <?php
                                                    if ($row2['profile'] == '') {
                                                        echo '<div class="profile"><a href="' . $row2['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row2['name'] . '" width="40" height="40"></canvas></a></div>';
                                                    } else {
                                                        echo '<div class="profile"><a href="' . $row2['username'] . '"><img src="uploads/profile/' . $row2['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
                                                    }
                                                    ?>
                                    <div class="author-name ms-2">
                                        <a href="" class="author-link mb-0">
                                            <h6 class="fw-bold mb-0" style="font-size:14px;">
                                                <?php echo $row2['name']; ?></h6>
                                        </a>
                                        <span class="text-muted"
                                            style="font-size:12px;"><?php echo date('M j, Y', strtotime($row2['created_at'])); ?></span>
                                    </div>
                                </div>
                                <p class="show-read-more small" style="color:var(--gray-color);">
                                    <?php echo strip_tags($row2['subcomment']); ?></p>
                                <?php
                                                $subcomment_uid = $row2['subcomment_uid'];

                                                ?>

                                <div class="d-flex justify-content-end mb-3">
                                    <?php
                                                    if ($row2['user_uid'] == $user_uid2) {


                                                        echo '<button class="btn bg-transparent p-0" onClick="subdelcomment(\'' . $user_uid . '\',\'' . $subcomment_uid . '\')">Delete</button>';
                                                    }
                                                    ?>
                                </div>
                            </div>
                            <?php  }
                                    } ?>
                        </div>
                        <hr>

                    </div>
                    <?php }
                    } ?>

                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <!-- Modal -->
    <div class="modal fade shadow-lg" id="metamaskDonateModal" tabindex="-1" aria-labelledby="metamaskDonateModalLabel"
        aria-hidden="true" style="background:rgba(0,0,0, .5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content mx-2" style="border-radius: 15px !important;">
                <div class="modal-header" style="border-top-right-radius:15px !important;color:var(--text-color)">
                    <h5 class="modal-title" id="metamaskDonateModalLabel">Donate to Author</h5>
                    <button type="button" class="close-modal btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body" style="background:var(--primary-color);border-radius:0 0 15px 15px;">
                    <?php

                    $sql0 = "SELECT * FROM metamask_details WHERE user_uid = '$user_uid'";
                    $run_Sql0 = mysqli_query($link, $sql0);
                    $fetch_info0 = mysqli_fetch_assoc($run_Sql0);
                    $metafrom = $fetch_info0['metamask_address'];

                    $sql0 = "SELECT * FROM metamask_details WHERE user_uid = '$user2uid'";
                    $run_Sql0 = mysqli_query($link, $sql0);
                    $fetch_info0 = mysqli_fetch_assoc($run_Sql0);
                    $metato = $fetch_info0['metamask_address'];
                    ?>
                    <div class="row g-3">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="amount" style="color:var(--text-color);">Amount(in dollar)</label>
                                <input type="number" required min="0" oninput="validity.valid||(value='');"
                                    class="form-control story-input p-2 currencyField" class="currencyField" name="usd"
                                    id="dollar_amount" placeholder="Amount(in dollar)" required />
                                <!--                                 
                                <label for="amount" style="margin:3px"><b>Donate Amount</b></label> <br>
                                            <input type="number" class="currencyField" placeholder="Enter amount to be donated in ETH" name="eth" id="metavalue" required>
                                            
                                            <input type="number" id="price" readonly name="usd" class="currencyField"  placeholder="in USD"> -->
                                <input type="hidden" class="metato" id="metato" value="<?php echo $metato; ?>">
                                <input type="hidden" class="metafrom" id="metafrom" value="<?php echo $metafrom; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="price" style="color:var(--text-color);">Amount(in ethereum)</label>
                                <input type="number" required min="0" oninput="validity.valid||(value='');"
                                    class="form-control story-input p-2 currencyField" class="currencyField" id="price"
                                    name="eth" placeholder="Amount(in ethereum)" required />
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar1" class="dollar_click">$1</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar2" class="dollar_click">$2</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar5" class="dollar_click">$5</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar10" class="dollar_click">$10</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar20" class="dollar_click">$20</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar50" class="dollar_click">$50</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar100" class="dollar_click">$100</button>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="d-grid mb-3">
                                <button class="btn button-primary tip-button">Donate</button>
                            </div>
                            <div class="message text-muted"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------------ success model ----------------------------- */ -->
    <div class="modal fade shadow-lg" id="metamaskSuccessModal" tabindex="-1"
        aria-labelledby="metamaskSuccessModalLabel" aria-hidden="true" style="background:rgba(0,0,0, .5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content mx-2" style="border-radius: 15px !important;">
                <div class="modal-body" style="background:var(--primary-color);border-radius:15px;">
                    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro"
                        rel="stylesheet">
                    <div class=content>
                        <div class="wrapper-1">
                            <div class="wrapper-2" style="display:none" id="transation_successfull_msg">
                                <h1>Thank you !</h1>
                                <p>Thanks for donation</p>
                                <p>Transation id : <a id="transationLinkStyle" target="_blank" href="#"><span
                                            id="transationLink">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span></a>
                                </p>
                                <button class="go-home" onclick="closeSuccessModel()">
                                    Close
                                </button>
                            </div>
                            <div class="wrapper-2" style="display:none" id="transation_failed_msg">
                                <h1>Sorry !</h1>
                                <p>Somthing went wrong</p>
                                <p>Try after some time... Thank you.</p>
                                <button class="go-home" onclick="closeSuccessModel()">
                                    Close
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ethereumcms.quadbtech.com/assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://ethereumcms.quadbtech.com/assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script type="text/javascript" src="https://ethereumcms.quadbtech.com/assets/avatar/jquery.letterpic.min.js">
    </script>
    <script src="https://ethereumcms.quadbtech.com/assets/toastr/toastr.min.js"></script>
    <script src='https://cdn.quilljs.com/1.2.3/quill.min.js'></script>

    <script type="text/javascript" src="https://ethereumcms.quadbtech.com/assets/js/app.js"></script>
    <script type="text/javascript" src="https://ethereumcms.quadbtech.com/assets/js/loader.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.1-rc.0/web3.min.js
"></script>
    <script src="https://aloycwl.github.io/js/cdn/ipfs-api.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/near-api-js@0.41.0/dist/near-api-js.min.js"></script>
    <script>
    // connect to NEAR
    const near = new nearApi.Near({
        keyStore: new nearApi.keyStores.BrowserLocalStorageKeyStore(),
        networkId: 'testnet',
        nodeUrl: 'https://rpc.testnet.near.org',
        walletUrl: 'https://wallet.testnet.near.org'
    });

    // connect to the NEAR Wallet
    const wallet = new nearApi.WalletConnection(near, 'my-app');

    // connect to a NEAR smart contract
    const contract = new nearApi.Contract(wallet.account(), 'guest-book.testnet', {
        viewMethods: ['getMessages'],
        changeMethods: ['addMessage']
    });

    const button = document.getElementById('nearbtn');
    if (!wallet.isSignedIn()) {
        button.textContent = 'Connect NEAR'
    }

    // call the getMessages view method
    //    contract.getMessages()
    //    .then(messages => {
    //    const ul = document.getElementById('messages');
    //  messages.forEach(message => {
    //     const li = document.createElement('li');
    //     li.textContent = `${message.sender} - ${message.text}`;
    //      ul.appendChild(li);
    //  })
    //  });

    // Either sign in or call the addMessage change method on button click
    document.getElementById('nearbtn').addEventListener('click', () => {
        if (wallet.isSignedIn()) {
            contract.addMessage({
                amount: nearApi.utils.format.parseNearAmount('1.5'),

                contractId: 'guest-book.testnet',
                methodNames: ['getMessages', 'addMessage']

            })
        } else {
            wallet.requestSignIn({
                contractId: 'guest-book.testnet',
                methodNames: ['getMessages', 'addMessage']
            });
        }
    });
    </script>
    <script>
    $(".avatar-image").letterpic({
        colors: [
            "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9",
            "#8e44ad", "#2c3e50",
            "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b",
            "#bdc3c7", "#7f8c8d"
        ],
        font: 'Inter'
    });

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    /* var toolbarOptions = [
        ['bold', 'italic', 'underline'], // toggled buttons
        ['clean'] // remove formatting button
    ];

    var editor_theme = 'snow';
    var quill = new Quill('#editorComment', {
        modules: {
            toolbar: toolbarOptions
        },
        placeholder: 'Comment...',
        theme: editor_theme
    }); */

    /*  var editor_theme2 = 'snow';
     var quill = new Quill('#editorSubcomment', {
         modules: {
             toolbar: toolbarOptions
         },
         placeholder: 'Reply Comment...',
         theme: editor_theme2
     }); */

    $('.copy-link').on('click', function() {
        // finds data-clipboard-test for content p class "click" 
        value = $(this).data('clipboard-text');
        // Temporary input tag to store text
        var $temp = $("<input>");
        $("body").append($temp);
        // Selects text value
        $temp.val(value).select();
        // Copies text, removes temporary tag
        document.execCommand("copy");
        $temp.remove();
        toastr["success"]("Link copied.");
    })

    function login() {
        location.href = 'login-user-mm';
    }

    function like(user_uid, post_uid) {
        $.ajax({
            url: "php/likePost.php",
            method: "POST",
            dataType: "json",
            data: {
                user_uid: user_uid,
                post_uid: post_uid
            },
            beforeSend: function() {
                $("#divProfileReload .like-reload").html(
                    '<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $("#divReload .like-reload").html(
                    '<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
            },
            success: function(data) {
                console.log(data);
                if (data.status == 201) {
                    // if(data.link!=""){
                    // window.location.replace("all-tags");
                    // }else{
                    //     window.location.replace("./);
                    // }
                    //window.location.reload();
                    $("#divProfileReload").load(location.href + " #divProfileReload");
                    $("#divReload").load(location.href + " #divReload");

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

    function unlike(user_uid, post_uid) {
        $.ajax({
            url: "php/unlikePost.php",
            method: "POST",
            dataType: "json",
            data: {
                user_uid: user_uid,
                post_uid: post_uid
            },
            beforeSend: function() {
                $("#divProfileReload .like-reload").html(
                    '<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $("#divReload .like-reload").html(
                    '<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
            },
            success: function(data) {
                console.log(data);
                if (data.status == 201) {
                    // if(data.link!=""){
                    // window.location.replace("all-tags");
                    // }else{
                    //     window.location.replace("./);
                    // }
                    //window.location.reload();
                    $("#divProfileReload").load(location.href + " #divProfileReload");
                    $("#divReload").load(location.href + " #divReload");

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
            beforeSend: function() {
                $("#divProfileReload .save-reload").html(
                    '<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $("#divReload .save-reload").html(
                    '<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
            },
            success: function(data) {
                console.log(data);
                if (data.status == 201) {
                    // if(data.link!=""){
                    // window.location.replace("all-tags");
                    // }else{
                    //     window.location.replace("./);
                    // }
                    //window.location.reload();
                    $("#divProfileReload").load(location.href + " #divProfileReload");
                    $("#divReload").load(location.href + " #divReload");

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

    function unsave(user_uid, post_uid) {
        $.ajax({
            url: "php/unsavePost.php",
            method: "POST",
            dataType: "json",
            data: {
                user_uid: user_uid,
                post_uid: post_uid
            },
            beforeSend: function() {
                $("#divProfileReload .save-reload").html(
                    '<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $("#divReload .save-reload").html(
                    '<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
            },
            success: function(data) {
                console.log(data);
                if (data.status == 201) {
                    // if(data.link!=""){
                    // window.location.replace("all-tags");
                    // }else{
                    //     window.location.replace("./);
                    // }
                    //window.location.reload();
                    $("#divProfileReload").load(location.href + " #divProfileReload");
                    $("#divReload").load(location.href + " #divReload");

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
                    // if(data.link!=""){
                    // window.location.replace("all-tags");
                    // }else{
                    //     window.location.replace("./);
                    // }
                    //window.location.reload();
                    //$("#divProfileReload").load(location.href + " #divProfileReload");
                    $("#follow_reload").load(location.href + " #follow_reload");

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
                    // if(data.link!=""){
                    // window.location.replace("all-tags");
                    // }else{
                    //     window.location.replace("./);
                    // }
                    //window.location.reload();
                    $("#follow_reload").load(location.href + " #follow_reload");

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

    function closeSuccessModel() {
        $('#metamaskSuccessModal').modal('hide');
    }

    $(document).ready(function() {
        $('#submitComments').on('click', function(e) {

            e.preventDefault();
            var error = "";
            /* var myEditor = document.querySelector('#editorComment')
            var editorComment = myEditor.children[0].innerHTML; */
            var formData = new FormData();

            if ($('#editorComment').val() == "") {
                $('#editorComment').css('cssText', 'border-color: red !important');
                error = error + 'editorComment';
            } else {
                formData.append('editorComment', $('#editorComment').val());
            }

            formData.append('post_uid_comment', $('#post_uid_comment').val());
            formData.append('user_uid_comment', $('#user_uid_comment').val());


            if (error == "") {
                //console.log(formData);
                $.ajax({
                    url: "php/addComments.php",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,

                    success: function(data) {
                        //console.log(data);
                        if (data.status == 201) {

                            window.location.replace(
                                "<?php echo $username_req; ?>/<?php echo $post_slug_req; ?>"
                            );
                            //toastr["success"]("Comment Added");


                        } else if (data.status == 501) {

                            //swal("Tag already exist");

                        } else if (data.status == 301) {
                            //console.log(data.error);
                            //swal("error");

                        }
                    }
                });
            } else {

            }
        });

        /* $('#submitSubcomments').on('click', function(e) {

            e.preventDefault();
            var error = "";
            //var myEditor = document.querySelector('#editorComment')
            //var editorComment = myEditor.children[0].innerHTML;
            var formData = new FormData();

            if ($('#editorSubcomment').val() == "") {
                $('#editorSubcomment').css('cssText', 'border-color: red !important');
                error = error + 'editorSubcomment';
            } else {
                formData.append('editorSubcomment', $('#editorSubcomment').val());
            }

            formData.append('post_uid_subcomment', $('#post_uid_subcomment').val());
            formData.append('user_uid_subcomment', $('#user_uid_subcomment').val());
            formData.append('comment_uid', $('#comment_uid').val());
            
            
            if (error == "") {
                //console.log(formData);
                $.ajax({
                    url: "php/addSubcomments.php",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,

                    success: function(data) {
                        //console.log(data);
                        if (data.status == 201) {

                           window.location.replace("<?php echo $username_req; ?>/<?php echo $post_slug_req; ?>");
                           //toastr["success"]("Comment Added");


                        } else if (data.status == 501) {

                            //swal("Tag already exist");

                        } else if (data.status == 301) {
                            //console.log(data.error);
                            //swal("error");

                        }
                    }
                });
            } else {

            }
        }); */


    });
    /* $('#submitSubcomments').on('click', function(e) {

        e.preventDefault();
        var error = "";
        //var myEditor = document.querySelector('#editorComment')
        //var editorComment = myEditor.children[0].innerHTML;
        var formData = new FormData();

        if ($('#editorSubcomment').val() == "") {
            $('#editorSubcomment').css('cssText', 'border-color: red !important');
            error = error + 'editorSubcomment';
        } else {
            formData.append('editorSubcomment', $('#editorSubcomment').val());
        }

        formData.append('post_uid_subcomment', $('#post_uid_subcomment').val());
        formData.append('user_uid_subcomment', $('#user_uid_subcomment').val());
        formData.append('comment_uid', $('#comment_uid').val());
        
        
        if (error == "") {
            //console.log(formData);
            $.ajax({
                url: "php/addSubcomments.php",
                type: "POST",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,

                success: function(data) {
                    //console.log(data);
                    if (data.status == 201) {

                       window.location.replace("<?php echo $username_req; ?>/<?php echo $post_slug_req; ?>");
                       //toastr["success"]("Comment Added");


                    } else if (data.status == 501) {

                        //swal("Tag already exist");

                    } else if (data.status == 301) {
                        //console.log(data.error);
                        //swal("error");

                    }
                }
            });
        } else {

        }
    }); */





    $(document).on('show.bs.modal', '.modal', function(event) {
        var zIndex = 99999 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });

    // var MY_ADDRESS = '0x55e2780588aa5000F464f700D2676fD0a22Ee160'
    //var ADDRESS = document.getElementById('metato')
    //var MY_ADDRESS = ADDRESS.value
    // console.log(ADDRESS.value)
    //console.log(MY_ADDRESS)

    /* var tipButton = document.querySelector('.tip-button')

    tipButton.addEventListener('click', async function() {

        if (typeof ethereum === 'undefined') {
            return renderMessage('<div>You need to install <a href=“https://metmask.io“>MetaMask </a> to use this feature.  <a href=“https://metmask.io“>https://metamask.io</a></div>')
        }

        const accounts = await ethereum.request({
            method: 'eth_requestAccounts'
        })

        if (typeof window.ethereum !== 'undefined') {
            console.log('MetaMask is installed!');
        }
        ethereum.request({
            method: 'eth_requestAccounts'
        });

        //  var user_address = accounts[0]
        var user_add = document.getElementById('metafrom')
        var user_address = user_add.value
        //   console.log(user_add.value)
        // console.log(user_address)
        var valueinitial = document.getElementById('metavalue')
        var value = valueinitial.value
        let web3 = new Web3(Web3.givenProvider || "ws://localhost:8545");
        var ab = web3.utils.numberToHex(web3.utils.toWei(value));
        //console.log(value)
        // var ab= '0x' + (50000000000000000).toString(16);
        console.log(ab)


        try {
            const transactionHash = await ethereum.request({
                method: 'eth_sendTransaction',
                params: [{
                    'to': MY_ADDRESS,
                    'from': user_address,
                    'value': ab,
                }, ],
            })
            // Handle the result
            console.log(transactionHash)
        } catch (error) {
            console.error(error)
        }
    })

    function renderMessage(message) {
        var messageEl = document.querySelector('.message')
        messageEl.innerHTML = message
    } */
    </script>
    <script>
    /* $(".currencyField").keyup(function() { //input[name='calc']
            let convFrom;
            if ($(this).prop("name") == "eth") {
                convFrom = "eth";
                convTo = "usd";
            } else {
                convFrom = "usd";
                convTo = "eth";
            }
            $.getJSON("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum",
                function(data) {
                    var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var exchangeRate = parseInt(data[0].current_price);
                    let amount;
                    if (convFrom == "eth")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + convTo + "']").val(amount.toFixed(2));
                    price.innerHTML = amount
                });
        }); */
    </script>
    <script>
    function delcomment(user_uid, comment_uid) {
        $.ajax({
            url: "php/deletecomment.php",
            method: "POST",
            dataType: "json",
            data: {
                user_uid: user_uid,
                comment_uid: comment_uid
            },
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
                    //$("#follow_reloaduser").load(location.href + " #follow_reloaduser");

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
    </script>
    <script>
    function subdelcomment(user_uid, subcomment_uid) {
        $.ajax({
            url: "php/deletesubcomment.php",
            method: "POST",
            dataType: "json",
            data: {
                user_uid: user_uid,
                subcomment_uid: subcomment_uid
            },
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
                    //$("#follow_reloaduser").load(location.href + " #follow_reloaduser");

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
    </script>
    <script>
    function myFunction() {

        var x;

        var site = prompt("Enter Amount to be donated", "Write Value");

        if (site != null) {

            x = "Welocme at " + site + "! Have a good day";

            document.getElementById("demo").innerHTML = x;

        }

    }
    </script>
    <script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
    </script>

    <script>
    $(document).ready(function() {
        var dollar_amount = $("#dollar_amount").val();
        var ethereum_amount = $("#price").val();
        $("#dollar1").click(function() {
            $("#dollar_amount").val(1);
        });
        $("#dollar2").click(function() {
            $("#dollar_amount").val(2);
        });
        $("#dollar5").click(function() {
            $("#dollar_amount").val(5);
        });
        $("#dollar10").click(function() {
            $("#dollar_amount").val(10);
        });
        $("#dollar20").click(function() {
            $("#dollar_amount").val(20);
        });
        $("#dollar50").click(function() {
            $("#dollar_amount").val(50);
        });
        $("#dollar100").click(function() {
            $("#dollar_amount").val(100);
        });

        // var MY_ADDRESS = '0x55e2780588aa5000F464f700D2676fD0a22Ee160'
        var ADDRESS = document.getElementById('metato')
        var MY_ADDRESS = ADDRESS.value
        // console.log(ADDRESS.value)
        //console.log(MY_ADDRESS)

        var tipButton = document.querySelector('.tip-button')

        tipButton.addEventListener('click', async function() {

            if (typeof ethereum === 'undefined') {
                return renderMessage(
                    '<div>You need to install <a href=“https://metmask.io“>MetaMask </a> to use this feature.  <a href=“https://metmask.io“>https://metamask.io</a></div>'
                )
            }

            const accounts = await ethereum.request({
                method: 'eth_requestAccounts'
            })

            if (typeof window.ethereum !== 'undefined') {
                console.log('MetaMask is installed!');
            }
            ethereum.request({
                method: 'eth_requestAccounts'
            });

            var user_address = accounts[0]
            //  var user_add = document.getElementById('metafrom')
            // var user_address = user_add.value
            //   console.log(user_add.value)
            // console.log(user_address)
            var valueinitial = document.getElementById('price')
            var value = valueinitial.value
            let web3 = new Web3(Web3.givenProvider || "ws://localhost:8545");
            var ab = web3.utils.numberToHex(web3.utils.toWei(value));
            /* ----------------------------- new code start ----------------------------- */
            const post_uuid = $('#postUId').val();

            /* ------------------------------ new code end ------------------------------ */
            //console.log(value)
            // var ab= '0x' + (50000000000000000).toString(16);
            console.log(ab)
            console.log(user_address)
            console.log(MY_ADDRESS)


            try {
                const transactionHash = await ethereum.request({
                    method: 'eth_sendTransaction',
                    params: [{
                        'to': MY_ADDRESS,
                        'from': user_address,
                        'value': ab,
                    }, ],
                })
                // Handle the result
                console.log(transactionHash);
                uploadDonate(post_uuid, user_address, MY_ADDRESS, value, transactionHash)

            } catch (error) {
                console.error(error)
            }

            /* ---------------------- transation success code start --------------------- */
            function uploadDonate(post_uuid, user_address, MY_ADDRESS, value, transactionHash) {
                console.log(post_uuid, user_address, MY_ADDRESS, value, transactionHash);
                $.ajax({
                    url: "php/uploadDonate.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        post_uuid: post_uuid,
                        from_address: user_address,
                        to_address: MY_ADDRESS,
                        eth_price: value,
                        transation_hash: transactionHash
                    },
                    success: function(data) {
                        if (data.status == 201) {
                            console.log(data.success);
                            $('#transation_successfull_msg').css('display', 'block');
                            $('#transation_failed_msg').css('display', 'none');
                            $("#transationLinkStyle").attr("href",
                                `https://rinkeby.etherscan.io/tx/${data.transaction_hash}`
                            );
                            $("#transationLink").text(data.transaction_hash);
                            $('#metamaskDonateModal').modal('hide');
                            $('#metamaskSuccessModal').modal('show');
                        } else if (data.status == 301) {
                            $('#transation_successfull_msg').css('display', 'none');
                            $('#transation_failed_msg').css('display', 'block');
                            console.log(data.error);
                        } else {}
                    }
                });
            }
            /* ----------------------- transation success code end ---------------------- */
        })

        function renderMessage(message) {
            var messageEl = document.querySelector('.message')
            messageEl.innerHTML = message
        }
    });
    </script>
    <!-- <script>
        $(".currencyField").keyup(function(){ //input[name='calc']
 let convFrom;
 if($(this).prop("name") == "eth") {
       convFrom = "eth";
       convTo = "usd";
 }
 else {
       convFrom = "usd";
       convTo = "eth";
 }
 $.getJSON( "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum", 
    function( data) {
    var origAmount = parseFloat($("input[name='" + convFrom + "']").val());        
    var exchangeRate = parseInt(data[0].current_price);
    let amount;
    if(convFrom == "eth")
       amount = parseFloat(origAmount * exchangeRate);
    else
       amount = parseFloat(origAmount/ exchangeRate); 
    $("input[name='" + convTo + "']").val(amount.toFixed(2));
    price.innerHTML = amount
    });
});

    </script> -->
    <script>
    $(document).ready(function() {

        var dollar_amount = $("#dollar_amount").val();
        var ethereum_amount = $("#price").val();
        $("#dollar1").click(function() {
            $("#dollar_amount").val(1);
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum",

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 1;
                    var exchangeRate = parseInt(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar2").click(function() {
            $("#dollar_amount").val(2);
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum",

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 2;
                    var exchangeRate = parseInt(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar5").click(function() {
            $("#dollar_amount").val(5);
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum",

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 5;
                    var exchangeRate = parseInt(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar10").click(function() {
            $("#dollar_amount").val(10);
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum",

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 10;
                    var exchangeRate = parseInt(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar20").click(function() {
            $("#dollar_amount").val(20);
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum",

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 20;
                    var exchangeRate = parseInt(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar50").click(function() {
            $("#dollar_amount").val(50);
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum",

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 50;
                    var exchangeRate = parseInt(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar100").click(function() {
            $("#dollar_amount").val(100);
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum",

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 100;
                    var exchangeRate = parseInt(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        if (window.location.href.indexOf("https://ipfs.io/ipfs/") < 0) {
            load();
        }
    });
    </script>
    <script>
    $(".currencyField").keypress(function() { //input[name='calc']
        let convFrom;
        if ($(this).prop("name") == "usd") {
            convFrom = "usd";
            convTo = "eth";
        } else {
            convFrom = "eth";
            convTo = "usd";
        }
        $.getJSON("https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=ethereum",

            function(data) {
                // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                var exchangeRate = parseInt(data[0].current_price);
                let amount;
                // console.log(origAmount)
                // console.log(convFrom)
                // console.log(convTo)
                // console.log(exchangeRate)
                if (convFrom == "eth")
                    amount = parseFloat(origAmount * exchangeRate);
                else
                    amount = parseFloat(origAmount / exchangeRate);
                $("input[name='" + convTo + "']").val(amount.toFixed(5));
                console.log(amount)
                if (convFrom == "usd")
                    price.innerHTML = amount
                else
                    dollar_amount.innerHTML = amount
            });
    });

    function uploadIpfs(postUid, ipfs_link) {
        $.ajax({
            url: "php/uploadIpfs.php",
            method: "POST",
            dataType: "json",
            data: {
                postUid: postUid,
                ipfs_url: ipfs_link,
            },
            success: function(data) {
                if (data.status == 201) {
                    console.log(data.success);
                } else if (data.status == 301) {
                    console.log(data.error);
                } else {}
            }
        });
    }
    async function load() {
        const postUid = $('#postUId').val();
        const ipfs_url = $('#ipfsUrl').val();

        ipfs = IpfsApi({
            host: 'ipfs.infura.io',
            port: 5001,
            protocol: 'https',
        });
        pro = await new Promise(async (d) => {
            reader = new FileReader();
            reader.onloadend = () => {
                ipfs.add(ipfs.Buffer.from(reader.result)).then((files) => {
                    d(files);
                });
            };
            await fetch(window.location.href).then(response => response.text()).then(
                formatedResponse => {
                    reader.readAsArrayBuffer(
                        new File([formatedResponse], 'text/html')
                    );
                })

        });
        if (pro) {
            var ipfs_link = (`https://ipfs.io/ipfs/${pro[0].hash}`);
            if (ipfs_link && (ipfs_link !== ipfs_url)) {
                uploadIpfs(postUid, ipfs_link);
            }
        }

    }
    </script>
</body>

</html>