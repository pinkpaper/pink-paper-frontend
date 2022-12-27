<?php require_once "php/controllerUserData.php"; ?>
<?php
require_once "php/schedule_cron.php";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    if ($username != false) {
        $sql = "SELECT * FROM user_login WHERE username = '$username'";
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
$user_is_ok = false;
$current_login_address = '--------';
$new_login_address = '--------';
if(isset($_SESSION['userAddress'])){
    $user_address_new = $_SESSION['userAddress'];
    if(strpos($user_address_new, '0x') !== false){
        $current_login_address='MetaMask';
        $new_login_address='Neo';
    }else{
    $current_login_address='Neo';
    $new_login_address='Metamask';
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

$is_croudfunded = $fetch_info2['is_croudfunded'];
$crowd_min_amount=$fetch_info2['minimum_pay'];
$project_address=$fetch_info2['project_address'];
$project_creator = $fetch_info2['project_creator'];
$minimum_pay = $fetch_info2['minimum_pay'];
$target_amount = $fetch_info2['target_amount'];
$amount_in = $fetch_info2['amount_in'];
$project_uri_link = $fetch_info2['project_uri_link'];

$theme = $fetch_info2['theme'];
$selected_theme = 'theme/theme-'.$theme.'.php';
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


// croud funding data get start 
$crowd_query_1 = "SELECT `post_uid`, sum(pay_amount) as total_pay,`project_address` FROM `crowd_fund` WHERE `post_uid`='$post_uid' GROUP BY `post_uid`,`project_address` ORDER by total_pay DESC;";

$crowd_run_1 = mysqli_query($link, $crowd_query_1);
if (mysqli_num_rows($crowd_run_1) > 0) {
    $crowd_query_result = mysqli_fetch_assoc($crowd_run_1);
    $crowd_query_post_uid = $crowd_query_result['post_uid'];
    $crowd_query_total_pay = $crowd_query_result['total_pay'];
    $crowd_query_project_address = $crowd_query_result['project_address'];
}else{
    $crowd_query_post_uid = '';
    $crowd_query_total_pay = 0;
    $crowd_query_project_address = '';
}
// croud funding data get end

$sql_author = "SELECT * FROM metamask_details WHERE user_uid = '$user_uid_follow'";
$run_Sql_author = mysqli_query($link, $sql_author);
$fetch_info_author = mysqli_fetch_assoc($run_Sql_author);
$metamask_author = $fetch_info_author['eth_metamask_address'];
$neo_author = $fetch_info_author['neo_address'];
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
    <script src="https://test.pinkpaper.xyz/assets/feather/feather.min.js"></script>


    <!-- stylesheet -->
    <link href="https://test.pinkpaper.xyz/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://test.pinkpaper.xyz/assets/toastr/toastr.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://test.pinkpaper.xyz/assets/css/success.css'>
    <link href="https://test.pinkpaper.xyz/assets/css/app.css" rel="stylesheet">
    <link href="https://test.pinkpaper.xyz/assets/css/loader.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.quilljs.com/1.2.3/quill.snow.css'>
    <link rel='stylesheet' href='https://cdn.quilljs.com/1.2.3/quill.bubble.css'>
    <link rel='stylesheet' href='assets/css/theme/theme-2.css'>
    <link rel='stylesheet' href='assets/css/croudFundingUI.css'>
    <link rel="stylesheet" href="assets/css/newLoader.css">
    <style>
    .post-content iframe {
        width: 100% !important;
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

    .theme-4-main-image {
        width: 15%;
        object-fit: cover;
    }

    .post-content-theme-4 {
        text-align: left;
    }

    .post-content-theme-4 img {
        width: 60%;
        height: 100%;
    }

    @media screen and (min-width: 992px) {
        .heading-right {
            border-right: 5px solid var(--text-color);
            color: var(--text-color);
            padding-right: 20px;
        }
    }

    .post-content img {
        width: 75%;
        height: auto;
    }

    @media screen and (max-width: 991px) {
        .post-content img {
            width: 100%;
            height: auto;
        }

        .heading-right {
            border-left: 5px solid var(--text-color);
            color: var(--text-color);
            padding-left: 20px;
        }

        .theme-4-main-image {
            width: 100% !important;
        }

        .post-content-theme-4 img {
            width: 100% !important;
            height: 100%;
        }
    }

    .topRanker {
        color: rgb(0, 125, 255);
    }

    .transition-error {
        transition: all 1s ease-in-out;
    }
    </style>
</head>

<body onload="loader()">

    <!-- loader start-->
    <div class="loader-container">
        <div class="loader"></div>
    </div>
    <!-- loader end-->
    <!-- new loader start -->
    <div class="new-loader-wrapper" style="display:none">
        <div>
            <div class="loadingio-spinner-blocks-6z64s4i6x4q">
                <div class="ldio-orclk6era8b">
                    <div style='left:38px;top:38px;animation-delay:0s'></div>
                    <div style='left:80px;top:38px;animation-delay:0.125s'></div>
                    <div style='left:122px;top:38px;animation-delay:0.25s'></div>
                    <div style='left:38px;top:80px;animation-delay:0.875s'></div>
                    <div style='left:122px;top:80px;animation-delay:0.375s'></div>
                    <div style='left:38px;top:122px;animation-delay:0.75s'></div>
                    <div style='left:80px;top:122px;animation-delay:0.625s'></div>
                    <div style='left:122px;top:122px;animation-delay:0.5s'></div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <h2>Please Wait ...</h2>
            <p>Don't refresh the page.<br>Data will be lost if you leave the page.</p>
        </div>
    </div>
    <!-- new loader end -->

    <button id="back-to-top" class="btn btn-lg back-to-top text-white"><i class="fas fa-chevron-up"></i></button>

    <!-- header start-->
    <?php include('include/header.php'); ?>
    <!-- header end-->

    <div class="container" style="padding-top:50px;"></div>
    <input type="hidden" name="chooseChain" id="chooseChain">
    <input type="hidden" name="postUId" id="postUId" value="<?php echo $post_uid ?>">
    <input type="hidden" name="ipfsUrl" id="ipfsUrl" value="<?php echo $ipfs_link ?>">
    <input type="hidden" name="current_login_address" id="current_login_address"
        value="<?php echo $current_login_address ?>">
    <input type="hidden" name="target_amount" id="target_amount" value="<?= $target_amount ?>">
    <input type="hidden" name="amount_in" id="amount_in" value="<?= $amount_in ?>">
    <input type="hidden" name="crowd_query_total_pay" id="crowd_query_total_pay" value="<?= $crowd_query_total_pay ?>">
    <!-- new theme added here start -->
    <?php include($selected_theme); ?>
    <!-- new theme added here end -->

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
                        if (!isset($_SESSION['username'])) {
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
                                                    if (!isset($_SESSION['username'])) {
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
                    $metatoEth = $fetch_info0['eth_metamask_address'];
                    $metatoNeo = $fetch_info0['neo_address'];
                    ?>
                    <div class="row g-3 mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="my-2" for=" amount" style="color:var(--text-color);">Select network chain
                                    to
                                    donate
                                    in</label>
                                <select class="form-control story-input p-2" onchange="selectChain()"
                                    id="selectNetworkChain">
                                    <option value="">Select chain</option>
                                    <option value="ethereum">ETH</option>
                                    <option value="binancecoin">BNB</option>
                                    <option value="celo">CELO</option>
                                    <option value="fantom">FTM</option>
                                    <option value="avalanche-2">AVAX</option>
                                    <option value="klay-token">KLAY</option>
                                    <option value="matic-network">MATIC</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3" id="donateArea" style="display:none;">
                        <div class=" col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="amount" style="color:var(--text-color);">Amount(in dollar)</label>
                                <input type="number" required min="0" oninput="validity.valid||(value='');"
                                    class="form-control story-input p-2 currencyField" name="usd" id="dollar_amount"
                                    required />
                                <input type="hidden" class="metato" id="metato" value="<?php echo $metato; ?>">
                                <input type="hidden" class="metato" id="metatoEth" value="<?php echo $metatoEth; ?>">
                                <input type="hidden" class="metato" id="metatoNeo" value="<?php echo $metatoNeo; ?>">
                                <input type="hidden" class="metafrom" id="metafrom" value="<?php echo $metafrom; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="price" style="color:var(--text-color);">Amount(in
                                    <span id="price_lable">celo</span>)</label>
                                <input type="number" required min="0" oninput="validity.valid||(value='');"
                                    class="form-control story-input p-2 currencyField" id="price" name="eth" required />
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
                    <small style="font-size:12px;">
                        <b>Note:</b>&nbsp;Your selected network must be add in your metamask,to add network chain in
                        your
                        metamask
                        you
                        can visit on <a href="https://chainlist.org/" target="_blank">chainlist</a>.
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!--Neo Modal -->
    <div class="modal fade shadow-lg" id="neoDonateModal" tabindex="-1" aria-labelledby="neoDonateModalLabel"
        aria-hidden="true" style="background:rgba(0,0,0, .5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content mx-2" style="border-radius: 15px !important;">
                <div class="modal-header" style="border-top-right-radius:15px !important;color:var(--text-color)">
                    <h5 class="modal-title" id="neoDonateModalLabel">Donate to Author</h5>
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
                    <input type="hidden" name="neo_chain_name" value="neo" id="neo_chain_name">
                    <div class="row g-3">
                        <div class=" col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="amount" style="color:var(--text-color);">Amount(in dollar)</label>
                                <input type="number" required min="0" oninput="validity.valid||(value='');"
                                    class="form-control story-input p-2 NeocurrencyField" name="usd_neo"
                                    id="dollar_amount_neo" required />
                                <input type="hidden" class="metato" id="metato_neo" value="<?php echo $metato; ?>">
                                <input type="hidden" class="metato" id="metato_neoEth"
                                    value="<?php echo $metatoEth; ?>">
                                <input type="hidden" class="metato" id="metato_neoNeo"
                                    value="<?php echo $metatoNeo; ?>">
                                <input type="hidden" class="metafrom" id="metafrom_neo"
                                    value="<?php echo $metafrom; ?>">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="price" style="color:var(--text-color);">Amount(in
                                    <span id="price_lable_neo" class="text-capitalize">neo</span>)</label>
                                <input type="number" required min="0" oninput="validity.valid||(value='');"
                                    class="form-control story-input p-2 NeocurrencyField" id="price_neo" name="eth_neo"
                                    required />
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar1_neo" class="dollar_click">$1</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar2_neo" class="dollar_click">$2</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar5_neo" class="dollar_click">$5</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar10_neo" class="dollar_click">$10</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar20_neo" class="dollar_click">$20</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar50_neo" class="dollar_click">$50</button>
                                <button class="btn btn-light px-2 py-1"
                                    style="background:var(--text-color);color:var(--primary-color);border-radius:20px;"
                                    id="dollar100_neo" class="dollar_click">$100</button>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="d-grid mb-3">
                                <button class="btn button-primary tip-button_neo">Donate</button>
                            </div>
                            <div class="message text-muted"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Switch Account Modal -->
    <div class="modal fade shadow-lg" id="switchAccountModal" tabindex="-1" aria-labelledby="switchAccountModalLabel"
        aria-hidden="true" style="background:rgba(0,0,0, .5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content mx-2" style="border-radius: 15px !important;">
                <div class="modal-header" style="border-top-right-radius:15px !important;color:var(--text-color)">
                    <h5 class="modal-title" id="switchAccountModalLabel">Switch Account</h5>
                    <button type="button" class="close-modal btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body" style="background:var(--primary-color);border-radius:0 0 15px 15px;">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 my-3">
                            <h4 class="text-center mb-3">Network not supported !</h4>
                            <h6 class="text-center">You are logged in by using <span
                                    class="current-account-text"><?= $current_login_address ?></span>, to donate with
                                <span class="new-account-text"><?=$new_login_address?></span> to author you have to
                                login with your <span class="new-account-text"><?=$new_login_address?></span> Account
                            </h6>
                            <h6 class="text-center">Are you sure to logged in with <span
                                    class="new-account-text"><?=$new_login_address?></span> ?</h6>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="d-grid mb-3">
                                <button class="btn button-primary" data-bs-dismiss="modal" aria-label="Close"
                                    style="background:#333;">Back</button>
                            </div>
                            <div class="message text-muted"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="d-grid mb-3">
                                <a class="btn button-primary" href="logout">Switch Account</a>
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

    <!-- contribute user modal start -->
    <div class="modal fade" id="viewContributeModal" tabindex="-1" aria-labelledby="viewContributeModalLabel"
        aria-hidden="true" style="background:rgb(46 46 46 / 62%);">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content" style="border-radius:15px;">
                <div class="modal-header d-flex justify-content-between align-items-center"
                    style="padding:15px;border-color:#e5e5e5;">
                    <span data-bs-dismiss="modal" class="modal-title text-secondary" aria-label="Close"
                        style="cursor:pointer;font-weight:800;">Close</span>
                    <span class="modal-title" aria-label="Close" style="font-weight:800;color:var(--text-color)">
                        <?php
                        $get_view_query_2 = "SELECT count(distinct user_address) as total_contributor FROM crowd_fund WHERE `post_uid`='$post_uid';";
                        $result_view_2 = mysqli_query($link, $get_view_query_2);
                        if (mysqli_num_rows($result_view_2) > 0) {
                        while($row_view_2 = mysqli_fetch_array($result_view_2)){
                        ?>
                        <span><?= $row_view_2['total_contributor'] ?></span><?php }} ?>&nbsp;Contributor</span>
                    <?php 
                    if($amount_in === 'ETH'){                                               
                    ?>
                    <span class="modal-title" aria-label="Close"
                        style="cursor:pointer;font-weight:800;color: rgb(0, 125, 255);"
                        onclick="startProjectFunding('<?= $crowd_min_amount ?>', '<?= $project_address ?>');">Contribute</span>
                    <?php }else if($amount_in === 'MATIC'){ ?>
                    <span class="modal-title" aria-label="Close"
                        style="cursor:pointer;font-weight:800;color: rgb(0, 125, 255);"
                        onclick="startProjectFundingMatic('<?= $crowd_min_amount ?>', '<?= $project_address ?>');">Contribute</span>
                    <?php
                    }else{  ?>
                    <span class="modal-title" aria-label="Close"
                        style="cursor:pointer;font-weight:800;color: rgb(0, 125, 255);">Wait ...</span>
                    <?php }
                                                ?>
                </div>
                <div class="modal-body">
                    <div class="viewModal-container">
                        <?php
                            $get_Allview_query_2 = "SELECT user_address, post_uid, sum(pay_amount) as total_pay,project_address FROM crowd_fund WHERE `post_uid`='$post_uid' GROUP BY user_address, post_uid,project_address ORDER by total_pay DESC;";
                            $result_Allview_2 = mysqli_query($link, $get_Allview_query_2);
                            if (mysqli_num_rows($result_Allview_2) > 0) {
                                $ii=1;
                            while($row_Allview_2 = mysqli_fetch_array($result_Allview_2)){

                            $userAddressView = $row_Allview_2['user_address'];
                            $get_Allview_query_1 = "SELECT * FROM `user_login` WHERE `metamask_address` = '$userAddressView'";
                            $result_Allview_1 = mysqli_query($link, $get_Allview_query_1);

                            $show_userName = '';
                            $show_userAddress = substr($userAddressView , 0, 4).'...'.substr($userAddressView , -4);

                            if (mysqli_num_rows($result_Allview_1) > 0) {
                                while($row_Allview_1 = mysqli_fetch_array($result_Allview_1)){
                                    $show_userName = $row_Allview_1['name'];
                                }
                            }else{
                                $show_userName =  $row_Allview_2['user_address'];
                                $show_userName = substr($show_userName , 0, 5).'...'.substr($show_userName , -5);
                            }
                        ?>
                        <a class="viewModal-Wrapper"
                            href="https://goerli.etherscan.io/address/<?= $row_Allview_2['user_address'] ?>"
                            target="_blank">
                            <div class="viewModal-Wrapper-inner">
                                <div class="viewModal-inner-in">
                                    <div class="viewModal-img-wrapper d-flex">
                                        <span class="d-flex">
                                            <div class="viewModal-img-inner">
                                                <div class="viewModal-img-inner-in">
                                                    <span class="img-setting-wrapper">
                                                        <span class="img-setting-wrapper-in">
                                                            <img class="img-setting-wrapper-in-img" alt=""
                                                                aria-hidden="true"
                                                                src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2728%27%20height=%2728%27/%3e">
                                                        </span>
                                                        <img alt="" class="img-setting-wrapper-in-img2"
                                                            srcset="https://i.pravatar.cc/100?u=<?= $row_Allview_2['user_address'] ?> 1x, https://i.pravatar.cc/100?u=<?= $row_Allview_2['user_address'] ?> 2x"
                                                            src="https://i.pravatar.cc/100?u=<?= $row_Allview_2['user_address'] ?>"
                                                            decoding="async" data-nimg="intrinsic">
                                                    </span>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="viewModal-username text-truncate" style="width:7.5rem;">
                                        <?= $show_userName ?></div>
                                    <div class="viewModal-address-wrapper">
                                        <div class="viewModal-address"><?= $show_userAddress ?></div>
                                    </div>
                                </div>
                                <div class="viewModal-inner-rank <?php echo $ii<=3 ?'topRanker':'' ?>">#<?= $ii ?></div>
                            </div>
                        </a>
                        <?php $ii=$ii+1; }} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contribute user modal end -->


    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://test.pinkpaper.xyz/assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://test.pinkpaper.xyz/assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script type="text/javascript" src="https://test.pinkpaper.xyz/assets/avatar/jquery.letterpic.min.js">
    </script>
    <script src="https://test.pinkpaper.xyz/assets/toastr/toastr.min.js"></script>
    <script src='https://cdn.quilljs.com/1.2.3/quill.min.js'></script>
    <script type="text/javascript" src="./assets/js/app.js"></script>
    <script type="text/javascript" src="https://test.pinkpaper.xyz/assets/js/loader.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.1-rc.0/web3.min.js
"></script>
    <script src="https://aloycwl.github.io/js/cdn/ipfs-api.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/near-api-js@0.41.0/dist/near-api-js.min.js"></script>
    <script type="text/javascript" src="assets/js/neoLogin.js"></script>
    <script src="contract/projectFunding.js"></script>
    <script src="contract/contract.js"></script>

    <script src="contract/matic/maticProjectFunding.js"></script>
    <script src="contract/matic/maticContract.js"></script>
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
                    $("#divProfileReload").load(location.href + " #divProfileReload");
                    $("#divReload").load(location.href + " #divReload");
                } else if (data.status == 301) {
                    console.log(data.error);
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
                    $("#divProfileReload").load(location.href + " #divProfileReload");
                    $("#divReload").load(location.href + " #divReload");
                } else if (data.status == 301) {
                    console.log(data.error);
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
                    $("#divProfileReload").load(location.href + " #divProfileReload");
                    $("#divReload").load(location.href + " #divReload");
                } else if (data.status == 301) {
                    console.log(data.error);
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
                    $("#divProfileReload").load(location.href + " #divProfileReload");
                    $("#divReload").load(location.href + " #divReload");

                } else if (data.status == 301) {
                    console.log(data.error);
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

    function closeSuccessModel() {
        $('#metamaskSuccessModal').modal('hide');
    }

    $(document).ready(function() {
        $('#submitComments').on('click', function(e) {

            e.preventDefault();
            var error = "";
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
    });

    $(document).on('show.bs.modal', '.modal', function(event) {
        var zIndex = 99999 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass(
                'modal-stack');
        }, 0);
    });
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
                    window.location.reload();
                } else if (data.status == 301) {
                    console.log(data.error);
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
                    window.location.reload();
                } else if (data.status == 301) {
                    console.log(data.error);
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

        var ADDRESS = document.getElementById('metatoEth');
        var MY_ADDRESS = ADDRESS.value
        var tipButton = document.querySelector('.tip-button')

        tipButton.addEventListener('click', async function() {
            if ($('#current_login_address').val() !== 'MetaMask') {
                $('#switchAccountModal').modal('show');
                $('#metamaskDonateModal').modal('hide');
            } else {
                let chainSelect = $('#selectNetworkChain').val();
                if (window.ethereum.networkVersion && chainSelect) {
                    abcnew(chainSelect);
                }
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
                var valueinitial = document.getElementById('price')
                var value = valueinitial.value
                let web3 = new Web3(Web3.givenProvider || "ws://localhost:8545");
                var ab = web3.utils.numberToHex(web3.utils.toWei(value));
                /* ----------------------------- new code start ----------------------------- */
                const post_uuid = $('#postUId').val();

                /* ------------------------------ new code end ------------------------------ */
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
                    if (window.ethereum.networkVersion) {
                        const currentChainId = window.ethereum.networkVersion;
                        uploadDonate(post_uuid, user_address, MY_ADDRESS, value, transactionHash,
                            currentChainId)
                    }
                } catch (error) {
                    console.error(error)
                }

                /* ---------------------- transation success code start --------------------- */
                function uploadDonate(post_uuid, user_address, MY_ADDRESS, value, transactionHash,
                    currentChainId) {
                    console.log(post_uuid, user_address, MY_ADDRESS, value, transactionHash,
                        currentChainId);
                    $.ajax({
                        url: "php/uploadDonate.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            post_uuid: post_uuid,
                            from_address: user_address,
                            to_address: MY_ADDRESS,
                            eth_price: value,
                            transation_hash: transactionHash,
                            current_chain_id: currentChainId
                        },
                        success: function(data) {
                            if (data.status == 201) {
                                console.log(data.success);
                                $('#transation_successfull_msg').css('display',
                                    'block');
                                $('#transation_failed_msg').css('display', 'none');
                                $("#transationLinkStyle").attr("href",
                                    `${data.transaction_url}`
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
            }
        })


        function renderMessage(message) {
            var messageEl = document.querySelector('.message')
            messageEl.innerHTML = message
        }
    });
    </script>
    <script>
    $(document).ready(function() {
        var dollar_amount = $("#dollar_amount_neo").val();
        var ethereum_amount = $("#price_neo").val();
        $("#dollar1_neo").click(function() {
            $("#dollar_amount_neo").val(1);
        });
        $("#dollar2_neo").click(function() {
            $("#dollar_amount_neo").val(2);
        });
        $("#dollar5_neo").click(function() {
            $("#dollar_amount_neo").val(5);
        });
        $("#dollar10_neo").click(function() {
            $("#dollar_amount_neo").val(10);
        });
        $("#dollar20_neo").click(function() {
            $("#dollar_amount_neo").val(20);
        });
        $("#dollar50_neo").click(function() {
            $("#dollar_amount_neo").val(50);
        });
        $("#dollar100_neo").click(function() {
            $("#dollar_amount_neo").val(100);
        });

        //
        // ──────────────────────────────────────────────────────────────────────────── I ──────────
        //   :::::: S E N D   B A L L A N C E   C O D E : :  :   :    :     :        :          :
        // ──────────────────────────────────────────────────────────────────────────────────────
        //

        $('.tip-button_neo').on('click', function() {
            var ADDRESS_TO = document.getElementById('metato_neoNeo')
            var USER_ADDRESS = ADDRESS_TO.value;
            var ADDRESS_FROM = document.getElementById('metafrom_neo')
            var MY_ADDRESS = ADDRESS_FROM.value;
            var valueinitial_neo = document.getElementById('price_neo')
            var value_neo = valueinitial_neo.value
            const post_uuid_neo = $('#postUId').val();
            if ($('#current_login_address').val() !== 'Neo') {
                $('#switchAccountModal').modal('show');
                $('#neoDonateModal').modal('hide');
            } else {
                donateNeo(post_uuid_neo, MY_ADDRESS, USER_ADDRESS, value_neo);
            }
        });

        function renderMessage(message) {
            var messageEl = document.querySelector('.message')
            messageEl.innerHTML = message
        }
    });
    </script>
    <script>
    $(document).ready(function() {
        var dollar_amount = $("#dollar_amount").val();
        var ethereum_amount = $("#price").val();
        $("#dollar1").click(function() {
            $("#dollar_amount").val(1);
            var chain = $('#selectNetworkChain').val();
            console.log(chain)
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 1;
                    var exchangeRate = parseFloat(data[0].current_price);
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
            var chain = $('#selectNetworkChain').val();
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 2;
                    var exchangeRate = parseFloat(data[0].current_price);
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
            var chain = $('#selectNetworkChain').val();
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 5;
                    var exchangeRate = parseFloat(data[0].current_price);
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
            var chain = $('#selectNetworkChain').val();
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 10;
                    var exchangeRate = parseFloat(data[0].current_price);
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
            var chain = $('#selectNetworkChain').val();
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 20;
                    var exchangeRate = parseFloat(data[0].current_price);
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
            var chain = $('#selectNetworkChain').val();
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 50;
                    var exchangeRate = parseFloat(data[0].current_price);
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
            var chain = $('#selectNetworkChain').val();
            let convFrom;
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 100;
                    var exchangeRate = parseFloat(data[0].current_price);
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
        var chain = $('#selectNetworkChain').val();
        if ($(this).prop("name") == "usd") {
            convFrom = "usd";
            convTo = "eth";
        } else {
            convFrom = "eth";
            convTo = "usd";
        }
        $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

            function(data) {
                var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                var exchangeRate = parseFloat(data[0].current_price);
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

    $(document).ready(function() {
        var dollar_amount_neo = $("#dollar_amount_neo").val();
        var ethereum_amount_neo = $("#price_neo").val();
        $("#dollar1_neo").click(function() {
            $("#dollar_amount_neo").val(1);
            var chain = $('#neo_chain_name').val();
            console.log(chain)
            let convFrom;
            if ($(this).prop("name") == "usd_neo") {
                convFrom = "usd_neo";
                convTo = "eth_neo";
            } else {
                convFrom = "eth_neo";
                convTo = "usd_neo";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 1;
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd_neo")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth_neo" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd_neo")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar2_neo").click(function() {
            $("#dollar_amount_neo").val(2);
            var chain = $('#neo_chain_name').val();
            let convFrom;
            if ($(this).prop("name") == "usd_neo") {
                convFrom = "usd_neo";
                convTo = "eth_neo";
            } else {
                convFrom = "eth_neo";
                convTo = "usd_neo";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 2;
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd_neo")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth_neo" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd_neo")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar5_neo").click(function() {
            $("#dollar_amount_neo").val(5);
            var chain = $('#neo_chain_name').val();
            let convFrom;
            if ($(this).prop("name") == "usd_neo") {
                convFrom = "usd_neo";
                convTo = "eth_neo";
            } else {
                convFrom = "eth_neo";
                convTo = "usd_neo";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 5;
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd_neo")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth_neo" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd_neo")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar10_neo").click(function() {
            $("#dollar_amount_neo").val(10);
            var chain = $('#neo_chain_name').val();
            let convFrom;
            if ($(this).prop("name") == "usd_neo") {
                convFrom = "usd_neo";
                convTo = "eth_neo";
            } else {
                convFrom = "eth_neo";
                convTo = "usd_neo";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 10;
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd_neo")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth_neo" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd_neo")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar20_neo").click(function() {
            $("#dollar_amount_neo").val(20);
            var chain = $('#neo_chain_name').val();
            let convFrom;
            if ($(this).prop("name") == "usd_neo") {
                convFrom = "usd_neo";
                convTo = "eth_neo";
            } else {
                convFrom = "eth_neo";
                convTo = "usd_neo";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 20;
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd_neo")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth_neo" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd_neo")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar50_neo").click(function() {
            $("#dollar_amount_neo").val(50);
            var chain = $('#neo_chain_name').val();
            let convFrom;
            if ($(this).prop("name") == "usd_neo") {
                convFrom = "usd_neo";
                convTo = "eth_neo";
            } else {
                convFrom = "eth_neo";
                convTo = "usd_neo";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 50;
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd_neo")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth_neo" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd_neo")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        $("#dollar100_neo").click(function() {
            $("#dollar_amount_neo").val(100);
            var chain = $('#neo_chain_name').val();
            let convFrom;
            if ($(this).prop("name") == "usd_neo") {
                convFrom = "usd_neo";
                convTo = "eth_neo";
            } else {
                convFrom = "eth_neo";
                convTo = "usd_neo";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,

                function(data) {
                    // var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                    var origAmount = 100;
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount;
                    console.log(origAmount)
                    console.log(convFrom)
                    console.log(convTo)
                    console.log(exchangeRate)
                    if (convFrom == "usd_neo")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + "eth_neo" + "']").val(amount.toFixed(5));
                    console.log(amount)
                    if (convFrom == "usd_neo")
                        price.innerHTML = amount
                    else
                        dollar_amount.innerHTML = amount
                });
        });
        if (window.location.href.indexOf("https://ipfs.io/ipfs/") < 0) {
            load();
        }
    });

    $(".NeocurrencyField").keypress(function() { //input[name='calc']
        let convFrom;
        var chain = $('#neo_chain_name').val();
        if ($(this).prop("name") == "usd_neo") {
            convFrom = "usd_neo";
            convTo = "eth_neo";
        } else {
            convFrom = "eth_neo";
            convTo = "usd_neo";
        }
        $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,
            function(data) {
                var origAmount = parseFloat($("input[name='" + convFrom + "']").val());
                var exchangeRate = parseFloat(data[0].current_price);
                let amount;
                if (convFrom == "eth") {
                    amount = parseFloat(origAmount * exchangeRate);
                } else {
                    amount = parseFloat(origAmount / exchangeRate);
                }
                $("input[name='" + convTo + "']").val(amount.toFixed(5));
                if (convFrom == "usd") {
                    price_neo.innerHTML = amount
                } else {
                    dollar_amount_neo.innerHTML = amount
                }
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
        const projectId = '2DInI7VLAGEHD8O9MjGjm2HDlo5';
        const projectSecret = 'f69504cfab98937d3b6bd405d175420a';
        const auth = 'Basic ' + Buffer.from(projectId + ':' + projectSecret).toString('base64');
        ipfs = IpfsApi({
            host: 'ipfs.infura.io',
            port: 5001,
            protocol: 'https',
            headers: {
                authorization: auth,
            },
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

    function selectChain() {
        var chain = $('#selectNetworkChain').val();
        $('#dollar_amount').val('');
        $('#price').val('');
        if (chain || (chain !== '')) {
            $('#donateArea').css('display', 'flex');
        } else {
            $('#donateArea').css('display', 'none');
        }
        if (window.ethereum.networkVersion && chain) {
            abcnew(chain);
        }

    }


    /* ------------------------ switch network code start ----------------------- */
    async function abcnew(chainValue) {
        var chainId = "4" // Ethereum Testnet
        var HexchainId = "0x4"; // Hex Ethereum Testnet
        var coinSymble = 'ETH';

        if (chainValue === "ethereum") {
            chainId = "4"; // Ethereum Testnet
            HexchainId = "0x4"; // Hex Ethereum Testnet
            coinSymble = 'ETH';
        } else if (chainValue === "binancecoin") {
            chainId = "97"; // BNB Testnet
            HexchainId = "0x61"; // Hex BNB Testnet
            coinSymble = 'BNB';
        } else if (chainValue === "celo") {
            chainId = "44787"; // CELO Testnet
            HexchainId = "0xAEF3"; // Hex CELO Testnet
            coinSymble = 'CELO';
        } else if (chainValue === "fantom") {
            chainId = "4002"; // FANTOM Testnet
            HexchainId = "0xFA2"; // Hex FANTOM Testnet
            coinSymble = 'FTM';
        } else if (chainValue === "avalanche-2") {
            chainId = "43113"; // AVAX Testnet
            HexchainId = "0xA869"; // Hex AVAX Testnet
            coinSymble = 'AVAX';
        } else if (chainValue === "klay-token") {
            chainId = "1001"; // KLAY Testnet
            HexchainId = "0x3E9"; // Hex KLAY Testnet
            coinSymble = 'KLAY';
        } else if (chainValue === "matic-network") {
            chainId = "80001"; // MATIC Testnet
            HexchainId = "0x13881"; // Hex MATIC Testnet
            coinSymble = 'MATIC';
        } else {
            chainId = "4"; // Ethereum Testnet
            HexchainId = "0x4"; // Hex Ethereum Testnet
            coinSymble = 'ETH';
        }
        $('#price_lable').text(coinSymble);
        if (window.ethereum.networkVersion !== chainId) {
            try {
                await window.ethereum.request({
                    method: 'wallet_switchEthereumChain',
                    params: [{
                        chainId: HexchainId,
                    }],
                });
            } catch (err) {
                console.log(err);
            }
        }
    }

    function viewContribution() {
        $('#viewContributeModal').modal('show');
    };

    async function startProjectFunding(crowd_min_amount, ProjectAddress) {
        const user_donation_amount = $('#min_donation_in_eth').val();
        if (parseFloat(user_donation_amount) > 0) {
            if (parseFloat(user_donation_amount) >= parseFloat(crowd_min_amount)) {
                if (window.ethereum) {
                    if ((window.ethereum.networkVersion) !== '5') {
                        changeNetwork('5');
                    } else {
                        $('#viewContributeModal').modal('hide');
                        $(".new-loader-wrapper").removeClass("d-none");
                        $(".new-loader-wrapper").addClass("d-flex");
                        console.log("This is DAppp Environment");
                        var accounts = await ethereum.request({
                            method: 'eth_requestAccounts'
                        });
                        var currentaddress = accounts[0];
                        web3 = new Web3(window.ethereum);

                        myProjectContract = new web3.eth.Contract(projectFunding, ProjectAddress);

                        await myProjectContract.methods.contribute().send({
                            from: currentaddress,
                            value: web3.utils.toWei(user_donation_amount.toString(), 'ether')
                        }).then((res) => {
                            console.log(res);
                            var formData = new FormData();
                            const post_uid = $('#postUId').val();
                            const user_address = res.from;
                            const pay_amount = user_donation_amount;
                            const pay_amount_in = $('#amount_in').val();
                            const project_address = ProjectAddress;
                            const transactionHash = res.transactionHash;

                            formData.append('project_address', project_address);
                            formData.append('post_uid', post_uid);
                            formData.append('user_address', user_address);
                            formData.append('pay_amount', pay_amount);
                            formData.append('pay_amount_in', pay_amount_in);
                            formData.append('transactionHash', transactionHash);

                            $.ajax({
                                url: 'php/crowd_funding.php',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formData,
                                success: function() {
                                    toastr["success"]("Contribution added successfully");
                                    $(".new-loader-wrapper").addClass("d-none");
                                    window.location.reload();
                                }
                            });

                        }).catch((err) => {
                            $(".new-loader-wrapper").addClass("d-none");
                            console.log(err);
                        });
                    }
                    $('#show_input_amount_error_eth').css('display', 'none');
                    $('#show_input_required_error_eth').css('display', 'none');
                } else {
                    $(".new-loader-wrapper").addClass("d-none");
                    console.log("Please connect with metamask");
                }
            } else {
                $('#show_input_required_error_eth').css('display', 'none');
                $('#show_input_amount_error_eth').css('display', 'block');
            }
        } else {
            $('#show_input_required_error_eth').css('display', 'block');
            $('#show_input_amount_error_eth').css('display', 'none');
        }
    }

    async function startProjectFundingMatic(crowd_min_amount, ProjectAddress) {
        const user_donation_amount = $('#min_donation_in_matic').val();
        if (parseFloat(user_donation_amount) > 0) {
            if (parseFloat(user_donation_amount) >= parseFloat(crowd_min_amount)) {
                if (window.ethereum) {
                    if ((window.ethereum.networkVersion) !== '80001') {
                        changeNetwork('13881');
                    } else {
                        $('#viewContributeModal').modal('hide');
                        $(".new-loader-wrapper").removeClass("d-none");
                        $(".new-loader-wrapper").addClass("d-flex");
                        console.log("This is DAppp Environment");
                        var accounts = await ethereum.request({
                            method: 'eth_requestAccounts'
                        });
                        var currentaddress = accounts[0];
                        web3 = new Web3(window.ethereum);
                        myProjectContract = new web3.eth.Contract(maticProjectFunding, ProjectAddress);
                        await myProjectContract.methods.contribute().send({
                            from: currentaddress,
                            value: web3.utils.toWei(user_donation_amount.toString(), 'ether')
                        }).then((res) => {
                            console.log(res);
                            var formData = new FormData();
                            const post_uid = $('#postUId').val();
                            const user_address = res.from;
                            const pay_amount = user_donation_amount;
                            const pay_amount_in = $('#amount_in').val();
                            const project_address = ProjectAddress;
                            const transactionHash = res.transactionHash;

                            formData.append('project_address', project_address);
                            formData.append('post_uid', post_uid);
                            formData.append('user_address', user_address);
                            formData.append('pay_amount', pay_amount);
                            formData.append('pay_amount_in', pay_amount_in);
                            formData.append('transactionHash', transactionHash);

                            $.ajax({
                                url: 'php/crowd_funding.php',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formData,
                                success: function() {
                                    toastr["success"]("Contribution added successfully");
                                    $(".new-loader-wrapper").addClass("d-none");
                                    window.location.reload();
                                }
                            });

                        }).catch((err) => {
                            $(".new-loader-wrapper").addClass("d-none");
                            console.log(err);
                        });
                    }
                    $('#show_input_amount_error_matic').css('display', 'none');
                    $('#show_input_required_error_matic').css('display', 'none');
                } else {
                    $(".new-loader-wrapper").addClass("d-none");
                    console.log("Please connect with metamask");
                }
            } else {
                $('#show_input_required_error_matic').css('display', 'none');
                $('#show_input_amount_error_matic').css('display', 'block');
            }
        } else {
            $('#show_input_required_error_matic').css('display', 'block');
            $('#show_input_amount_error_matic').css('display', 'none');
        }
    }

    const number = $('#target_amount').val();
    const amount_in_view = $('#amount_in').val();
    const crowd_query_total_pay = $('#crowd_query_total_pay').val();
    console.log(crowd_query_total_pay, number)
    const percentage_pay = parseFloat(((parseFloat(crowd_query_total_pay) * 100) / parseFloat(number)).toFixed(2));
    console.log(percentage_pay);
    $('#span_percentage_view').text(percentage_pay);
    $('#percentage_view').text(percentage_pay);
    $('.progress-bar').css('width', `${percentage_pay}%`);

    const convertNumber = (number.toLocaleString('en-IN', {
        maximumFractionDigits: 3,
    }));

    const crowd_query_total_pay_view = ((parseFloat(crowd_query_total_pay).toFixed(5)).toLocaleString('en-IN', {
        maximumFractionDigits: 3,
    }));
    console.log(crowd_query_total_pay_view)
    $('.progress-bar').attr('aria-valuenow', percentage_pay)
    $('#crowd_query_total_pay_view').text(crowd_query_total_pay_view);
    $('#target_amount_view').text(convertNumber);
    $('.amount_in_view').text(amount_in_view);

    async function changeNetwork(chainId) {
        console.log(window.ethereum.networkVersion);
        if (window.ethereum.networkVersion !== chainId) {
            try {
                await window.ethereum.request({
                    method: 'wallet_switchEthereumChain',
                    params: [{
                        chainId: `0x${chainId}`
                    }],
                });
            } catch (err) {
                console.log(err);
            }
        }
    }
    </script>
</body>

</html>