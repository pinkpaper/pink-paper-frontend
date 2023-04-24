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
        $profile = $fetch_info['profile'];
        $user_uid = $fetch_info['user_uid'];
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
$post_id = $edit_req;
$query2 = "SELECT * FROM `stories` WHERE `post_uid` = '$post_id'";
$run_query2 = mysqli_query($link, $query2);
$row2 = mysqli_fetch_assoc($run_query2);
$post_title = $row2['post_title'];
$post_content = $row2['post_content'];
$post_uid = $row2['post_uid'];
$project_address = $row2['project_address'];
$project_creator = $row2['project_creator'];
$project_uri = $row2['project_uri_link'];
$created_at = $row2['created_at'];
$minimum_pay = $row2['minimum_pay'];
$target_amount = $row2['target_amount'];
$amount_in = $row2['amount_in'];
$featured_image = $row2['featured_image'];
$post_tags = $row2['post_tags'];
$pin_story = $row2['pin_story'];
$unlisted = $row2['unlisted'];
$meta_title2 = $row2['meta_title'];
$meta_description2 = $row2['meta_description'];
$post_status = $row2['post_status']; 
$schedule_time = $row2['schedule_time'];
$selected_theme = $row2['theme'];
$post_slug = $row2['post_slug'];
$meta_title = 'Blog';
$is_croudfunded = $row2['is_croudfunded'];
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
?>
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

    <!-- medium editor -->
    <!-- <link rel="stylesheet" href="assets/mediumEditor/css/medium-editor.css">
    <link rel="stylesheet" href="assets/mediumEditor/css/themes/beagle.min.css">
    <link rel="stylesheet" href="assets/mediumEditor/css/medium-editor-insert-plugin.min.css"> -->
    <link rel="stylesheet" href="assets/dropify/css/dropify.min.css">
    <link href="assets/tagify/tagify.css" rel="stylesheet">
    <link href="assets/toastr/toastr.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">

    <!-- Main Quill library -->

    <link rel='stylesheet' href='https://cdn.quilljs.com/1.2.3/quill.snow.css'>
    <link rel='stylesheet' href='https://cdn.quilljs.com/1.2.3/quill.bubble.css'>
    <link rel="stylesheet" href="assets/css/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/assets/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/croudFundingUI.css">
    <link rel="stylesheet" href="assets/css/newLoader.css">
    <style>
    input[type=radio] {
        width: 20px;
        height: 20px;
    }

    .radio {
        padding: 0.5rem 0.5rem;
        margin: 0.5rem 0;
        display: flex;
        justify-content: start;
        align-items: center;
    }

    .radio-label {
        margin: 0rem 0.5rem;
    }

    .radio:hover {
        background-color: #e9ecef;
        border-radius: 10px;
    }

    #display-schedule {
        transition: all 2s ease;
        margin-top: 0.8rem;
    }

    .ql-bubble .ql-tooltip-editor input[type=text] {
        color: var(--text-color);
    }

    /* fix blank or flashing items on carousel */
    .col-carousel {
        margin: 70px 0;
    }


    /* owl nav */
    .owl-prev span,
    .owl-next span {
        color: #FFF;
    }

    .owl-prev span:hover,
    .owl-next span:hover {
        color: #8199A3;
    }

    .owl-prev,
    .owl-next {
        position: absolute;
        top: 0;
        height: 100%;
    }

    .owl-prev {
        left: 7px;
    }

    .owl-next {
        right: 7px;
    }

    /* removing blue outline from buttons */
    button:focus,
    button:active {
        outline: none;
    }

    .eye-style {
        cursor: pointer;
    }

    .eye-style:hover {
        color: #667eea !important;
    }

    .activeSlider {
        border: 3px solid #764ba2;
    }
    </style>
</head>

<body onload="loader()">
    <input type="hidden" name="projectAddress" id="projectAddress" value="<?= $project_address ?>">
    <input type="hidden" name="postUId" id="postUId" value="<?= $post_uid ?>">
    <input type="hidden" name="target_amount" id="target_amount" value="<?= $target_amount ?>">
    <input type="hidden" name="amount_in" id="amount_in" value="<?= $amount_in ?>">
    <input type="hidden" name="crowd_query_total_pay" id="crowd_query_total_pay" value="<?= $crowd_query_total_pay ?>">
    <!-- loader start-->
    <div class="loader-container">
        <div class="loadingio-spinner-ellipsis-tjmuel5ie5"><div class="ldio-g2ezeznggp">
<div></div><div></div><div></div><div></div><div></div>
</div></div>
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
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h1 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">
                                Contributors</h1>
                            <div class="d-flex justify-content-between">
                                <p id="draftMsg" class="text-muted text-center mb-0" style="display:none;">Draft in
                                    <span class="text-capitalize"><?php echo $name; ?></span>
                                </p>
                                <p class="text-center mb-0" style="color:var(--gray-color)"><span id="result"></span>
                                </p>
                            </div>
                        </div>
                        <div>
                            <a href="stories" class="btn button-outline-primary">All Stories</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12" style="color:var(--text-color)">
                    <?php
                        $get_view_query_2 = "SELECT count(distinct user_address) as total_contributor FROM crowd_fund WHERE `post_uid`='$post_uid';";
                        $result_view_2 = mysqli_query($link, $get_view_query_2);
                        if (mysqli_num_rows($result_view_2) > 0) {
                        while($row_view_2 = mysqli_fetch_array($result_view_2)){
                            if($row_view_2['total_contributor'] > 0){
                        ?>
                    <h6 style="font-weight:800" class="my-3">
                        <span><?= $row_view_2['total_contributor'] ?></span>&nbsp;Contributor</span>
                    </h6>
                    <div class="write-story-div shadow story-right-card" style="border-radius:5px;">
                        <!-- doner list start -->
                        <div class="viewModal-container py-3">
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
                                    <div class="viewModal-inner-rank <?php echo $ii<=3 ?'topRanker':'' ?>">#<?= $ii ?>
                                    </div>
                                </div>
                            </a>
                            <?php $ii=$ii+1; }} ?>
                        </div>
                        <!-- doner list end -->
                    </div>
                    <?php }else{ ?>
                    <div class="write-story-div shadow story-right-card d-flex justify-content-center align-items-center"
                        style="border-radius:5px;">
                        <div class="my-5 d-flex justify-content-center align-items-center flex-column p-5"
                            style="background:#fdfdfd;border-radius:5px;">
                            <img src="assets/images/donate.png" alt="donate" class="img img-responsive"></img>
                            <h4 class="text-center my-4" style="color:var(--text-color);font-weight:800">No Contributor
                                found</h4>
                        </div>
                    </div>
                    <?php }}} ?>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-5 mt-lg-0" style="color:var(--text-color)">
                    <div class="sidebar-item">
                        <div class="make-me-sticky">
                            <div class="row">
                                <div class="col-12">
                                    <div class="story-right-card shadow px-3 py-1 mb-3">
                                        <div class="d-grid mt-3 mb-1">
                                            <div class="progress-panel">
                                                <div class="get-view-wrapper"
                                                    style="font-size: 0.9rem;font-weight: 800;"><span
                                                        id="crowd_query_total_pay_view">0,000</span>&nbsp;<?= $amount_in ?>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar d-inline" role="progressbar"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><span
                                                            id="span_percentage_view">0</span>%</div>
                                                </div>
                                                <div class="target-view-wrapper">
                                                    <div style="font-size: 0.9rem;">
                                                        <span style="font-weight: 800;">
                                                            <span id="percentage_view">0</span>%</span>&nbsp;Collected
                                                    </div>
                                                    <div style="font-size: 0.9rem;"><span
                                                            style="font-size: 0.9rem;font-weight: 800;"><span
                                                                id="target_amount_view">0,000</span>&nbsp;<span
                                                                id="amount_in_view">ETH</span></span>&nbsp;Target</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="story-right-card shadow px-3 py-3 mb-3">
                                        <div class="d-flex justify-content-center align-items-start flex-column my-2">
                                            <div>
                                                <h6 style="font-weight:800">Project UID</h6>
                                                <p style="font-size:0.9rem;word-break:break-all;"><?= $post_uid ?></p>
                                            </div>
                                            <div>
                                                <h6 style="font-weight:800;">Funding Address</h6>
                                                <p style="font-size:0.9rem;word-break:break-all;">
                                                    <?= $project_address ?></p>
                                            </div>
                                            <div>
                                                <h6 style="font-weight:800">Created by</h6>
                                                <p style="font-size:0.9rem;word-break:break-all;">
                                                    <?= $project_creator ?></p>
                                            </div>
                                            <div>
                                                <h6 style="font-weight:800">Fund Details</h6>
                                                <p style="font-size:0.9rem;word-break:break-all;"
                                                    class="d-flex justify-content-start flex-column">
                                                    <span style="font-size:0.9rem;word-break:break-all;"><span
                                                            style="font-weight:600">Minimum Pay
                                                            :</span>&nbsp;<span><?= $minimum_pay ?></span>&nbsp;<?= $amount_in ?></span>
                                                    <span style="font-size:0.9rem;word-break:break-all;"><span
                                                            style="font-weight:600">Target Amount
                                                            :</span>&nbsp;<span><?= $target_amount ?></span>&nbsp;<?= $amount_in ?></span>
                                                </p>
                                            </div>
                                            <div>
                                                <h6 style="font-weight:800">Project URI</h6>
                                                <p style="font-size:0.9rem;word-break:break-all;"><a
                                                        href="<?= $project_uri ?>" target="_blank"
                                                        style="text-decoration: none;color: inherit;"><?= $project_uri ?></a>
                                                </p>
                                            </div>
                                            <div>
                                                <h6 style="font-weight:800">Created On</h6>
                                                <p style="font-size:0.9rem;word-break:break-all;">
                                                    <?= explode(' +0530',$created_at)[0] ?></p>
                                            </div>
                                            <div>
                                                <h6 style="font-weight:800">Total Recieved Amount</h6>
                                                <p style="font-size:0.9rem;word-break:break-all;"><span
                                                        id="recieved_eth">0.00</span>&nbsp;<?= $amount_in ?></p>
                                            </div>
                                            <div>
                                                <h6 style="font-weight:800">Withdrawable Amount</h6>
                                                <p style="font-size:0.9rem;word-break:break-all;"><span
                                                        id="withdrawal_eth">0.00</span>&nbsp;<?= $amount_in ?></p>
                                            </div>
                                        </div>
                                        <div class="w-100">
                                            <?php
                                                $get_view_query_2 = "SELECT count(distinct user_address) as total_contributor FROM crowd_fund WHERE `post_uid`='$post_uid';";
                                                $result_view_2 = mysqli_query($link, $get_view_query_2);
                                                if (mysqli_num_rows($result_view_2) > 0) {
                                                while($row_view_2 = mysqli_fetch_array($result_view_2)){
                                                    if($row_view_2['total_contributor'] > 0){
                                                ?>
                                            <?php 
                                            if($amount_in === 'ETH'){                                               
                                            ?>
                                            <button type="button" class="btn button-primary w-100 py-2"
                                                id="withdraw-button">Withdraw
                                                Amount</button>
                                            <?php }else if($amount_in === 'MATIC'){ ?>
                                            <button type="button" class="btn button-primary w-100 py-2"
                                                id="withdraw-button-matic">Withdraw
                                                Amount</button>
                                            <?php }else{  ?>
                                            <button type="button" class="btn button-primary w-100 py-2">Wait
                                                ...</button>
                                            <?php } ?>
                                            <?php }else{
                                                ?>
                                            <h6 class="bg-warning text-center text-dark py-2">No fund available to
                                                withdraw !</h6>
                                            <?php
                                            }}} ?>
                                        </div>
                                    </div>
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
    <div class="modal modal_outer right_modal fade" id="commentRightModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase fw-bold" style="color:var(--text-color)">Add New Tags </h5>
                    <button type="button" class="close-modal btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <input type="hidden" id="user_uid" value="<?php echo $user_uid ?? null; ?>">
                        <!-- <div id="editorComment">
                        </div> -->
                        <input class="form-control" id="editorTag" placeholder="Enter new tag"></input>
                    </div>
                    <div class="d-flex justify-content-end">
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo '<button class="btn button-primary-2"  onClick="login()">Add Tag</button>';
                        } else {
                            echo '<button class="btn button-primary-2" id="submitTag">Add Tag</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="theme-preview-modal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel2">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" style="color:var(--text-color)" id="theme-preview-modal-title">Theme
                        preview</h5>
                    <button type="button" class="close-modal btn" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="theme/theme-0.png" class="w-100 img-fluid" id="theme-select-preview">
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
    <script type="text/javascript" src='https://cdn.quilljs.com/1.2.3/quill.min.js'></script>
    <script type="text/javascript" src="assets/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/popr/popr.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/near-api-js@0.41.0/dist/near-api-js.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.1-rc.0/web3.min.js"></script>
    <script src="contract/projectFunding.js"></script>
    <script src="contract/contract.js"></script>

    <script src="contract/matic/maticProjectFunding.js"></script>
    <script src="contract/matic/maticContract.js"></script>
    <script>
    $('.sidebar-setting-link-1').click(function() {
        $('.sidebar-setting-link-1 i').toggleClass('fa-chevron-right fa-chevron-down');
    });

    $('.sidebar-setting-link-2').click(function() {
        $('.sidebar-setting-link-2 i').toggleClass('fa-chevron-right fa-chevron-down');
    });

    const number = $('#target_amount').val();
    const amount_in_view = $('#amount_in').val();
    const crowd_query_total_pay = $('#crowd_query_total_pay').val();

    const percentage_pay = parseFloat(((parseFloat(crowd_query_total_pay) * 100) / parseFloat(number)).toFixed(2));

    $('#span_percentage_view').text(percentage_pay);
    $('#percentage_view').text(percentage_pay);
    $('.progress-bar').css('width', `${percentage_pay}%`);

    const convertNumber = (number.toLocaleString('en-IN', {
        maximumFractionDigits: 3,
    }));

    const crowd_query_total_pay_view = ((parseFloat(crowd_query_total_pay).toFixed(5)).toLocaleString('en-IN', {
        maximumFractionDigits: 3,
    }));

    $('.progress-bar').attr('aria-valuenow', percentage_pay)
    $('#crowd_query_total_pay_view').text(crowd_query_total_pay_view);
    $('#target_amount_view').text(convertNumber);
    $('#amount_in_view').text(amount_in_view);

    const projectAddress = $('#projectAddress').val();

    $(document).ready(function() {
        $('#withdraw-button').click(async function() {
            if (window.ethereum) {
                if ((window.ethereum.networkVersion) !== '5') {
                    changeNetwork('5');
                } else {
                    $(".new-loader-wrapper").removeClass("d-none");
                    $(".new-loader-wrapper").addClass("d-flex");
                    console.log("This is DAppp Environment");
                    var accounts = await ethereum.request({
                        method: 'eth_requestAccounts'
                    });
                    var currentaddress = accounts[0];
                    web3 = new Web3(window.ethereum);

                    myProjectContract = new web3.eth.Contract(projectFunding, projectAddress);

                    await myProjectContract.methods.withdraw().send({
                        from: currentaddress
                    }).then((res) => {
                        var formData = new FormData();
                        const post_uid = $('#postUId').val();
                        const user_address = res.from;
                        const project_address = projectAddress;
                        const transactionHash = res.transactionHash;
                        const withdraw_amount = $('#crowd_query_total_pay').val();
                        const amount_in = $('#amount_in').val();

                        formData.append('project_address', project_address);
                        formData.append('post_uid', post_uid);
                        formData.append('user_address', user_address);
                        formData.append('transactionHash', transactionHash);
                        formData.append('withdraw_amount', withdraw_amount);
                        formData.append('pay_amount_in', amount_in);

                        $.ajax({
                            url: 'php/withdraw_fund.php',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function() {
                                toastr["success"](
                                    "Withdrawal successfully");
                                $(".new-loader-wrapper").addClass("d-none");
                                window.location.replace("stories");
                            }
                        });

                    }).catch((err) => {
                        $(".new-loader-wrapper").addClass("d-none");
                        console.log(err);
                    });
                }
            } else {
                $(".new-loader-wrapper").addClass("d-none");
                console.log("Please connect with metamask");
            }
        });

        $('#withdraw-button-matic').click(async function() {
            if (window.ethereum) {
                if ((window.ethereum.networkVersion) !== '80001') {
                    changeNetwork('13881');
                } else {
                    $(".new-loader-wrapper").removeClass("d-none");
                    $(".new-loader-wrapper").addClass("d-flex");
                    console.log("This is DAppp Environment");
                    var accounts = await ethereum.request({
                        method: 'eth_requestAccounts'
                    });
                    var currentaddress = accounts[0];
                    web3 = new Web3(window.ethereum);

                    myProjectContract = new web3.eth.Contract(maticProjectFunding, projectAddress);

                    await myProjectContract.methods.withdraw().send({
                        from: currentaddress
                    }).then((res) => {
                        var formData = new FormData();
                        const post_uid = $('#postUId').val();
                        const user_address = res.from;
                        const project_address = projectAddress;
                        const transactionHash = res.transactionHash;
                        const withdraw_amount = $('#crowd_query_total_pay').val();
                        const amount_in = $('#amount_in').val();

                        formData.append('project_address', project_address);
                        formData.append('post_uid', post_uid);
                        formData.append('user_address', user_address);
                        formData.append('transactionHash', transactionHash);
                        formData.append('withdraw_amount', withdraw_amount);
                        formData.append('pay_amount_in', amount_in);

                        $.ajax({
                            url: 'php/withdraw_fund.php',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function() {
                                toastr["success"](
                                    "Withdrawal successfully");
                                $(".new-loader-wrapper").addClass("d-none");
                                window.location.replace("stories");
                            }
                        });

                    }).catch((err) => {
                        $(".new-loader-wrapper").addClass("d-none");
                        console.log(err);
                    });
                }
            } else {
                $(".new-loader-wrapper").addClass("d-none");
                console.log("Please connect with metamask");
            }
        });

        async function getBalance() {
            if (window.ethereum) {
                console.log("Chandan This is DAppp Environment");
                var accounts = await ethereum.request({
                    method: 'eth_requestAccounts'
                });
                var currentaddress = accounts[0];
                web3 = new Web3(window.ethereum);
                myProjectContract = new web3.eth.Contract(projectFunding, projectAddress);
                await myProjectContract.methods.getProjectData().call().then((res) => {
                    const total_get_fund = res[5];
                    const total_withdrawal_eth = res[4];
                    const withdrawalEth = web3.utils.fromWei(total_withdrawal_eth.toString(),
                        'ether');
                    $('#withdrawal_eth').text(withdrawalEth);
                    const recievedEth = web3.utils.fromWei(total_get_fund.toString(), 'ether');
                    $('#recieved_eth').text(recievedEth);
                }).catch((err) => {
                    console.log(err);
                });
            } else {
                console.log("Please connect with metamask");
            }
        }

        async function getBalanceMatic() {
            if (window.ethereum) {
                console.log("Chandan This is DAppp Environment");
                var accounts = await ethereum.request({
                    method: 'eth_requestAccounts'
                });
                var currentaddress = accounts[0];
                web3 = new Web3(window.ethereum);
                myProjectContract = new web3.eth.Contract(projectFunding, projectAddress);
                await myProjectContract.methods.getProjectData().call().then((res) => {
                    const total_get_fund = res[5];
                    const total_withdrawal_eth = res[4];
                    const withdrawalEth = web3.utils.fromWei(total_withdrawal_eth.toString(),
                        'ether');
                    $('#withdrawal_eth').text(withdrawalEth);
                    const recievedEth = web3.utils.fromWei(total_get_fund.toString(), 'ether');
                    $('#recieved_eth').text(recievedEth);
                }).catch((err) => {
                    console.log(err);
                });
            } else {
                console.log("Please connect with metamask");
            }
        }
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

        if ($('#amount_in').val() === 'ETH') {
            getBalance();
        } else if ($('#amount_in').val() === 'MATIC') {
            getBalanceMatic();
        } else {
            console.log('Something went wrong');
        }
    });
    </script>
</body>

</html>