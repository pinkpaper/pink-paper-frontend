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
        $user_address = $fetch_info['metamask_address'];
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


if ($_SESSION['userAddress'] == "") {
    header('Location: ./login-user-mm');
}

$is_neo_chain = false;
$is_eth_chain = false;
$start_price_in = '';

if (strpos($user_address, '0x') === 0) {
    $is_eth_chain = true;
    $is_neo_chain = false;
    $start_price_in = 'ETH';
} else if (strpos($user_address, 'N') === 0) {
    $is_neo_chain = true;
    $is_eth_chain = false;
    $start_price_in = 'NEO';
} else {
    $is_neo_chain = false;
    $is_eth_chain = false;
    $start_price_in = '';
}
?>


<?php
$meta_title = 'Blog';
$category_description = 'Start curating your thoughts in a decentralized and autonomous environment for your communities to browse without perjury and risk of prosecution from anywhere around the globe.';
$meta_description = implode(' ', array_slice(explode(' ', $category_description), 0, 15)) . "\n";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <meta property="og:image:secure_url" itemprop="image" content="https://test.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
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

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">

    <!-- Main Quill library -->

    <link rel='stylesheet' href='https://cdn.quilljs.com/1.2.3/quill.snow.css'>
    <link rel='stylesheet' href='https://cdn.quilljs.com/1.2.3/quill.bubble.css'>
    <link rel="stylesheet" href="assets/css/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/assets/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/newLoader.css">
    <link rel="stylesheet" href="assets/css/medium.css" />
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/js/popr/popr.css">
    <link rel="stylesheet" href="assets/css/croudFundingUI.css">
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

        #editor img[src$='.svg'] {
            height: 16px;
            width: 16px;
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

        #gen-art {
            color: #fff;
            background: #e91e63;
            transition: all 0.2s ease-in;
        }

        #gen-art:hover {
            border-color: #e91e63;
            background: #fff;
            color: #e91e63;
        }
    </style>
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
            <h1>Please Wait ...</h1>
            <p>Don't refresh the page.<br>Data will be lost if you leave the page,you will autometically redirect on
                story list tab after this process.</p>
        </div>
    </div>
    <!-- new loader end -->
    <input type="hidden" id="selected_theme" name="selected_theme" value="0">
    <input type="hidden" id="user_username" name="user_username" value="<?= $username ?>">
    <input type="hidden" id="user_address" name="user_address" value="<?= $user_address ?>">
    <input type="hidden" id="user_amount_in" name="user_amount_in" value="<?= $start_price_in ?>">
    <button id="back-to-top" class="btn btn-lg back-to-top text-white"><i class="fas fa-chevron-up"></i></button>


    <div class="container">
        <div class="row">
            <div class="col-lg-1 d-flex justify-content-center">
                <!-- side menu include here start -->
                <?php include('include/side-menu-medium-top.php'); ?>
                <?php include('include/side-menu-medium.php'); ?>
                <?php include('include/side-menu-medium-bottom.php'); ?>
                <!-- side menu include here end -->
            </div>
            <div class="col-lg-11 col-md-12 my-5 my-lg-1">
                <section class="mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <h1 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Write
                                            Story
                                        </h1>
                                        <div class="d-flex justify-content-between">
                                            <p id="draftMsg" class="text-muted text-center mb-0" style="display:none;">
                                                Draft in
                                                <span class="text-capitalize"><?php echo $name; ?></span>
                                            </p>
                                            <p class="text-center mb-0" style="color:var(--gray-color)"><span id="result"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <a id="gen-art" class="audience-button">AI Article Generator</a>
                                    </div>
                                    <div>
                                        <a href="stories" class="audience-button">All Stories</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <div class="write-story-div">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control form-control-lg story-input" name="story_title" id="story_title" placeholder="Story Title">
                                        <input type="hidden" id="post_id" />
                                        <input type="hidden" id="user_uid" value="<?php echo $user_uid; ?>" />
                                        <input type="hidden" id="name" value="<?php echo $name; ?>" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <div id="editor">
                                            <!-- <h1 class="fw-light" style="color: var(--accent-hover-color);">Tell your story...</h1> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="sidebar-item">
                                    <div>
                                        <div class="row">
                                            <div class="col-12 order-last order-lg-first">
                                                <div class="shadow px-3 py-3 mb-3">
                                                    <!-- new code start -->
                                                    <form id="myForm">
                                                        <div class="radio">
                                                            <input id="radio-1" name="radio" type="radio" value="Published" checked>
                                                            <label for="radio-1" class="radio-label" style="color:var(--text-color);">Publish now</label>
                                                        </div>

                                                        <div class="radio">
                                                            <input id="radio-2" name="radio" type="radio" value="Schedule">
                                                            <label for="radio-2" class="radio-label" style="color:var(--text-color);">Schedule</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input id="radio-3" name="radio" type="radio" value="Draft">
                                                            <label for="radio-3" class="radio-label" style="color:var(--text-color);">Save as Draft</label>
                                                        </div>
                                                    </form>
                                                    <div class="mb-3" style="display:none;" id="display-schedule">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="flatpickr d-flex justify-content-center align-items-center mx-2" id="myDate" style="background:#8080804a;border-radius:3px;">
                                                                <input class="form-control" type="text" placeholder="Date" data-input id="input_date">
                                                                <a class="input-button mx-1" title="toggle" data-toggle><i class="icon-calendar"></i></a>
                                                            </div>
                                                            <div class="flatpickr d-flex justify-content-center align-items-center mx-2" id="myTime" style="background:#8080804a;border-radius:3px;">
                                                                <input class="form-control" type="text" placeholder="Time" data-input id="input_time">
                                                                <a class="input-button mx-1" title="toggle" data-toggle><i class="icon-clock"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- new code end -->
                                                    <div class="mt-3 mb-1" style="display: grid;" id="main_publish_button">
                                                        <button type="submit" class="user-profile-follow-button" id="add_story">Publish</button>
                                                    </div>
                                                    <div class="mt-3 mb-1" style="display: none;" id="main_publish_button_loader">
                                                        <button type="button" class="user-profile-follow-button" id="add_story_loader">
                                                            <div class="spinner-border text-light" role="status" style="width:1rem;height:1rem;">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                            Please Wait ...
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row p-0 m-0 auto-height-set d-block">
                                                <!-- funding code start -->
                                                <div class="col-12" style="display:none;" id="crowdfunding_section">
                                                    <div class="shadow px-3 py-3 mb-3" style="color:var(--text-color);">
                                                        <div>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <h5>Crowdfunding</h5>
                                                                <div class="d-flex justify-content-end align-items-center">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" id="crowd_funding_switch">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if (strpos($user_address, '0x') === 0) { ?>
                                                                <!-- funding body start -->
                                                                <div id="crowd_funding_body">
                                                                    <!-- croudfunding button start -->
                                                                    <div class="d-flex justify-content-start align-items-center my-2 p-3" style="background:#f4fbff;">
                                                                        <form id="croudfunding_form_area" class="w-100" name="croudfunding_form_area">
                                                                            <div class="radio">
                                                                                <input id="radio-4" name="radio_crowd" type="radio" value="ETH" checked>
                                                                                <label for="radio-4" class="radio-label" style="color:var(--text-color);"><img style="width:1.2rem;height:1.2rem;" src="assets/images/download.png" alt="matic" class="img-responsive mx-1">
                                                                                    ETH</label>
                                                                            </div>

                                                                            <div class="radio">
                                                                                <input id="radio-5" name="radio_crowd" type="radio" value="MATIC">
                                                                                <label for="radio-5" class="radio-label" style="color:var(--text-color);"><img style="width:1.2rem;height:1.2rem;" src="assets/images/polygon-matic-logo.png" alt="matic" class="img-responsive mx-1">
                                                                                    MATIC</label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <input id="radio-6" name="radio_crowd" type="radio" value="BNB">
                                                                                <label for="radio-6" class="radio-label" style="color:var(--text-color);"><img style="width:1.2rem;height:1.2rem;" src="assets/images/bnb.png" alt="matic" class="img-responsive mx-1">
                                                                                    BNB</label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!-- croudfunding button end -->

                                                                    <!-- eth_crowd_funding_network start-->
                                                                    <div id="eth_crowdfunding_section">
                                                                        <div class="d-flex justify-content-center align-items-center my-3">
                                                                            <form class="form">
                                                                                <p>Collect up to <span id="eth_show_value">0</span> ETH
                                                                                    ($<span id="dollar_amount">0.00</span>)
                                                                                    with these settings.</p>
                                                                                <div class="d-flex form-row align-items-center row mb-2">
                                                                                    <div class="col-md-12">
                                                                                        <label class="sr-only" for="min_donation">Min
                                                                                            Donation</label>
                                                                                        <div class="input-group mb-2">
                                                                                            <input type="number" class="form-control" id="min_donation" placeholder="Min Donation" min="0">
                                                                                            <div class="input-group-prepend">
                                                                                                <div class="input-group-text">
                                                                                                    ETH</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <label class="sr-only" for="target_amount">Target
                                                                                            Value</label>
                                                                                        <div class="input-group mb-2">
                                                                                            <input type="number" class="form-control currencyField" id="target_amount" placeholder="Target Amount" min="0" name="convFrom">
                                                                                            <div class="input-group-prepend">
                                                                                                <div class="input-group-text">
                                                                                                    ETH</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-auto mt-2 w-100">
                                                                                        <div class="form-check mb-2 py-1 w-100 d-flex justify-content-between" style="background:#efefef;color: mediumpurple;">
                                                                                            <input class="form-check-input mx-lg-2" type="checkbox" id="settingConfiramtion">
                                                                                            <label class="form-check-label w-100" for="settingConfiramtion">
                                                                                                I confirm these settings are
                                                                                                correct and
                                                                                                would
                                                                                                be not change in future.
                                                                                            </label>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <small style="font-size:0.75rem;"><b>*Min
                                                                                        Donation:&nbsp;</b>You
                                                                                    can
                                                                                    set minimum amount which user can
                                                                                    pay.</small><br>
                                                                                <small style="font-size:0.75rem;"><b>**Target
                                                                                        Amount:&nbsp;</b>You
                                                                                    can set total funding required.</small>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!-- eth_crowd_funding_network end-->

                                                                    <!-- matic_crowd_funding_network start-->
                                                                    <div id="matic_crowdfunding_section" style="display:none;">
                                                                        <div class="d-flex justify-content-center align-items-center my-3">
                                                                            <form class="form">
                                                                                <p>Collect up to <span id="matic_show_value">0</span> MATIC
                                                                                    ($<span id="dollar_amount_matic">0.00</span>)
                                                                                    with these settings.</p>
                                                                                <div class="d-flex form-row align-items-center row mb-2">
                                                                                    <div class="col-md-12">
                                                                                        <label class="sr-only" for="min_donation_matic">Min
                                                                                            Donation</label>
                                                                                        <div class="input-group mb-2">
                                                                                            <input type="number" class="form-control" id="min_donation_matic" placeholder="Min Donation" min="0">
                                                                                            <div class="input-group-prepend">
                                                                                                <div class="input-group-text">
                                                                                                    MATIC</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <label class="sr-only" for="target_amount_matic">Target
                                                                                            Value</label>
                                                                                        <div class="input-group mb-2">
                                                                                            <input type="number" class="form-control currencyFieldMatic" id="target_amount_matic" placeholder="Target Amount" min="0" name="convFromMatic">
                                                                                            <div class="input-group-prepend">
                                                                                                <div class="input-group-text">
                                                                                                    MATIC</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-auto mt-2 w-100">
                                                                                        <div class="form-check mb-2 py-1 w-100 d-flex justify-content-between" style="background:#efefef;color: mediumpurple;">
                                                                                            <input class="form-check-input mx-lg-2" type="checkbox" id="settingConfiramtion_matic">
                                                                                            <label class="form-check-label w-100" for="settingConfiramtion_matic">
                                                                                                I confirm these settings are
                                                                                                correct and
                                                                                                would
                                                                                                be not change in future.
                                                                                            </label>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <small style="font-size:0.75rem;"><b>*Min
                                                                                        Donation:&nbsp;</b>You
                                                                                    can
                                                                                    set minimum amount which user can
                                                                                    pay.</small><br>
                                                                                <small style="font-size:0.75rem;"><b>**Target
                                                                                        Amount:&nbsp;</b>You
                                                                                    can set total funding required.</small>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!-- matic_crowd_funding_network end-->
                                                                    <!-- bnb_crowd_funding_network start-->
                                                                    <div id="bnb_crowdfunding_section" style="display:none;">
                                                                        <div class="d-flex justify-content-center align-items-center my-3">
                                                                            <form class="form">
                                                                                <p>Collect up to <span id="bnb_show_value">0</span> BNB
                                                                                    ($<span id="dollar_amount_bnb">0.00</span>)
                                                                                    with these settings.</p>
                                                                                <div class="d-flex form-row align-items-center row mb-2">
                                                                                    <div class="col-md-12">
                                                                                        <label class="sr-only" for="min_donation_bnb">Min
                                                                                            Donation</label>
                                                                                        <div class="input-group mb-2">
                                                                                            <input type="number" class="form-control" id="min_donation_bnb" placeholder="Min Donation" min="0">
                                                                                            <div class="input-group-prepend">
                                                                                                <div class="input-group-text">
                                                                                                    BNB</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <label class="sr-only" for="target_amount_bnb">Target
                                                                                            Value</label>
                                                                                        <div class="input-group mb-2">
                                                                                            <input type="number" class="form-control currencyFieldBnb" id="target_amount_bnb" placeholder="Target Amount" min="0" name="convFromBnb">
                                                                                            <div class="input-group-prepend">
                                                                                                <div class="input-group-text">
                                                                                                    BNB</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-auto mt-2 w-100">
                                                                                        <div class="form-check mb-2 py-1 w-100 d-flex justify-content-between" style="background:#efefef;color: mediumpurple;">
                                                                                            <input class="form-check-input mx-lg-2" type="checkbox" id="settingConfiramtion_bnb">
                                                                                            <label class="form-check-label w-100" for="settingConfiramtion_bnb">
                                                                                                I confirm these settings are
                                                                                                correct and
                                                                                                would
                                                                                                be not change in future.
                                                                                            </label>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <small style="font-size:0.75rem;"><b>*Min
                                                                                        Donation:&nbsp;</b>You
                                                                                    can
                                                                                    set minimum amount which user can
                                                                                    pay.</small><br>
                                                                                <small style="font-size:0.75rem;"><b>**Target
                                                                                        Amount:&nbsp;</b>You
                                                                                    can set total funding required.</small>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!-- matic_crowd_funding_network end-->
                                                                </div>
                                                                <!-- funding body end -->
                                                            <?php } else if (strpos($user_address, 'N') === 0) { ?>
                                                                <!-- neo funding body start -->
                                                                <div id="crowd_funding_body">
                                                                    <!-- croudfunding button start -->
                                                                    <div class="d-flex justify-content-start align-items-center my-2 p-3" style="background:#f4fbff;">
                                                                        <form id="croudfunding_form_area" class="w-100" name="croudfunding_form_area">
                                                                            <div class="radio">
                                                                                <input id="radio-5" name="radio_crowd" type="radio" value="NEO" checked>
                                                                                <label for="radio-5" class="radio-label" style="color:var(--text-color);"><img style="width:1.2rem;height:1.2rem;" src="assets/images/neo_ui.png" alt="matic" class="img-responsive mx-1">
                                                                                    NEO</label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <!-- croudfunding button end -->

                                                                    <!-- neo_crowd_funding_network start-->
                                                                    <div id="neo_crowdfunding_section">
                                                                        <div class="d-flex justify-content-center align-items-center my-3">
                                                                            <form class="form">
                                                                                <p>Collect up to <span id="neo_show_value">0</span> NEO
                                                                                    ($<span id="dollar_amount_neo">0.00</span>)
                                                                                    with these settings.</p>
                                                                                <div class="d-flex form-row align-items-center row mb-2">
                                                                                    <div class="col-md-12">
                                                                                        <label class="sr-only" for="min_donation_neo">Min
                                                                                            Donation</label>
                                                                                        <div class="input-group mb-2">
                                                                                            <input type="number" class="form-control" id="min_donation_neo" placeholder="Min Donation" min="0">
                                                                                            <div class="input-group-prepend">
                                                                                                <div class="input-group-text">
                                                                                                    NEO</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <label class="sr-only" for="target_amount_neo">Target
                                                                                            Value</label>
                                                                                        <div class="input-group mb-2">
                                                                                            <input type="number" class="form-control currencyFieldNeo" id="target_amount_neo" placeholder="Target Amount" min="0" name="convFromNeo">
                                                                                            <div class="input-group-prepend">
                                                                                                <div class="input-group-text">
                                                                                                    NEO</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-auto mt-2 w-100">
                                                                                        <div class="form-check mb-2 py-1 w-100 d-flex justify-content-between" style="background:#efefef;color: mediumpurple;">
                                                                                            <input class="form-check-input mx-lg-2" type="checkbox" id="settingConfiramtion_neo">
                                                                                            <label class="form-check-label w-100" for="settingConfiramtion_neo">
                                                                                                I confirm these settings are
                                                                                                correct and
                                                                                                would
                                                                                                be not change in future.
                                                                                            </label>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <small style="font-size:0.75rem;"><b>*Min
                                                                                        Donation:&nbsp;</b>You
                                                                                    can
                                                                                    set minimum amount which user can
                                                                                    pay.</small><br>
                                                                                <small style="font-size:0.75rem;"><b>**Target
                                                                                        Amount:&nbsp;</b>You
                                                                                    can set total funding required.</small>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!-- neo_crowd_funding_network end-->
                                                                </div>
                                                                <!-- neo funding body end -->
                                                            <?php } else {
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- funding code end -->
                                                <div class="col-12 ">
                                                    <div class="shadow px-3 py-3 mb-3">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <a class="sidebar-setting-link sidebar-setting-link-1" data-bs-toggle="collapse" href="#collapseMainSettings" aria-expanded="false" aria-controls="collapseMainSettings">
                                                                Main Settings
                                                            </a>
                                                            <a class="sidebar-setting-link sidebar-setting-link-1" data-bs-toggle="collapse" href="#collapseMainSettings" aria-expanded="false" aria-controls="collapseMainSettings">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </a>
                                                        </div>
                                                        <div class="collapse" id="collapseMainSettings">
                                                            <hr>
                                                            <div class="row gap-2">
                                                                <div class="col-12 d-flex justify-content-between align-items-center">
                                                                    <h6 class="mb-0" style="color:var(--text-color);">
                                                                        Pin
                                                                        this story to
                                                                        the top of your profile?</h6>
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" id="pin_story">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-between align-items-center">
                                                                    <h6 class="mb-0" style="color:var(--text-color);">
                                                                        Make
                                                                        this story
                                                                        unlisted?</h6>
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" id="unlisted_btn">
                                                                        <!-- <label class="form-check-label" for="flexSwitchCheckDefault">No/Yes</label> -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <h6 style="color:var(--text-color);">Featured Image
                                                                    </h6>
                                                                    <input type="file" id="featured-image" class="dropify" data-height="150" />
                                                                    <p id="label-featured-image" class="small" style="color:var(--gray-color);">Tip:
                                                                        add a high-quality image to your story to
                                                                        capture
                                                                        people’s
                                                                        interest</p>

                                                                </div>
                                                                <div class="col-12 tags-div">
                                                                    <h6 class="small mb-1" style="color:var(--text-color);">
                                                                        Add or change tags (up to 3) so readers know
                                                                        what your story is about:
                                                                    </h6>
                                                                    <!-- <input name="tags" placeholder="Add a tag" class="form-control story-input" id="tags"> -->
                                                                    <input type="text" name="tags" placeholder="Add a tag" id="tags" class="typeahead tm-input form-control tm-input-info story-input" />
                                                                    <button class="user-profile-follow-button w-100 my-3" data-bs-toggle="modal" data-bs-target="#commentRightModal">Add New
                                                                        Tag</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 ">
                                                    <div class="shadow px-3 py-3 mb-3">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <a class="sidebar-setting-link sidebar-setting-link-2" data-bs-toggle="collapse" href="#collapseSeoSettings" aria-expanded="false" aria-controls="collapseSeoSettings">
                                                                SEO Settings
                                                            </a>
                                                            <a class="sidebar-setting-link sidebar-setting-link-2" data-bs-toggle="collapse" href="#collapseSeoSettings" aria-expanded="false" aria-controls="collapseSeoSettings">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </a>
                                                        </div>
                                                        <div class="collapse" id="collapseSeoSettings">
                                                            <hr>
                                                            <div class="form-group mb-3">
                                                                <h6 style="color:var(--text-color);">Meta Title (<span id="meta_title_chars">0</span>)</h6>
                                                                <input type="text" class="form-control story-input" name="meta_title" id="meta_title" placeholder="Meta Title">
                                                            </div>
                                                            <div class="form-group">
                                                                <h6 style="color:var(--text-color);">Meta Description
                                                                    (<span id="meta_description_chars">0</span>)</h6>
                                                                <textarea name="meta_description" class="form-control story-input" id="meta_description" rows="5" placeholder="Meta Description"></textarea>
                                                            </div>
                                                        </div>
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
            </div>
        </div>
    </div>





    <div class="modal modal_outer right_modal fade" id="commentRightModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase fw-bold" style="color:var(--text-color)">Add New Tags </h5>
                    <button type="button" class="close-modal btn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
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
                            echo '<button class="user-profile-follow-button"  onClick="login()">Add Tag</button>';
                        } else {
                            echo '<button class="user-profile-follow-button" id="submitTag">Add Tag</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="theme-preview-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" style="color:var(--text-color)" id="theme-preview-modal-title">Theme
                        preview</h5>
                    <button type="button" class="close-modal btn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="theme/theme-0.png" class="w-100 img-fluid" id="theme-select-preview">
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" data-bs-backdrop="static" data-bs-keyboard="false" id="article-generator" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" style="color:var(--text-color)" id="article-generator-title">AI Article Generator</h5>
                    <button type="button" class="close-modal btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="take_value" placeholder="Enter topic to generate">
                            <div class="input-group-prepend">
                                <div class="input-group-text mx-2" style="cursor:not-allowed;display:none;" id="ai_loading">
                                    <div class="spinner-border text-secondary" role="status" style="height:1.2rem;width:1.2rem;cursor:not-allowed">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="input-group-text mx-2" style="cursor:pointer" onclick="GenAiArticle()" id="ai_loading_button"><i class="m-1 fa fa-paper-plane"></i></div>
                            </div>
                        </div>
                        <div class="copy-area w-100 my-3" style="display: none;" id="copy-area">
                            <h6 class="mb-3" style="display: none;" id="ai_topic_show">Topic :&nbsp;<span style="color:#9e9e9e;" id="topic_para">This is the new topic</span></h6>
                            <input type="hidden" name="ai_regenerate_topic" id="ai_regenerate_topic">
                            <textarea readonly name="ai-gen_code_description" class="form-control story-input" id="ai-gen_code_description" rows="10" placeholder="generated article"></textarea>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="d-grid mt-3 mb-1 mx-2">
                                    <button type="button" class="user-profile-follow-button" id="copy_story" data-clipboard-target="#ai-gen_code_description">Copy Article</button>
                                </div>
                                <div class="d-grid mt-3 mb-1 mx-2">
                                    <button type="button" class="user-profile-follow-button" id="regenerate_story" style="background-color: #2c2c2c;border-color: #2c2c2c;" onclick="RegGenAiArticle()">Regenerate response</button>
                                    <div id="reg_loader_button" style="display: none;">
                                        <button type="button" class="user-profile-follow-button d-flex justify-content-center align-items-center" style="background-color: #2c2c2c;border-color: #2c2c2c;cursor: not-allowed;">
                                            <div class="spinner-grow text-light" role="status" style="width:1rem;height:1rem;">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <span class="mx-2">Please wait ...</span>
                                        </button>
                                    </div>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
    <script src='https://cdn.quilljs.com/1.2.3/quill.min.js'></script>
    <script src="assets/dropify/js/dropify.min.js"></script>
    <script src="assets/tagify/jQuery.tagify.min.js"></script>
    <script src="assets/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/popr/popr.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <script src="assets/js/flatpickr.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/moment-duration-format.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/owl.carousel.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.1-rc.0/web3.min.js"></script>
    <script src="https://aloycwl.github.io/js/cdn/ipfs-api.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/near-api-js@0.41.0/dist/near-api-js.min.js"></script>
    <!-- eth -->
    <script src="contract/factoryContract.js"></script>
    <script src="contract/contract.js"></script>
    <!-- matic -->
    <script src="contract/matic/maticFactoryContract.js"></script>
    <script src="contract/matic/maticContract.js"></script>
    <!-- bnb -->
    <script src="contract/bnb/bnbFactoryContract.js"></script>
    <script src="contract/bnb/bnbContract.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script src="https://unpkg.com/quill-image-compress@1.2.11/dist/quill.imageCompressor.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/@cityofzion/neon-js@5.3.0/dist/browser.js"></script>
    <script src="contract/neo/rawManifest.js"></script>
    <script src="contract/neo/neoContract.js"></script>
    <script>
        const json1 = manifest;
        const UserAddressString = $('#user_address').val();
        const currentTime = Date.now();
        const CurrentUserContractName = (`${UserAddressString}_${currentTime}`);

        const json2 = {
            "name": `${CurrentUserContractName}.CrowdFundingContract`,
        }

        function jsonConcat(o1, o2) {
            for (var key in o2) {
                o1[key] = o2[key];
            }
            return o1;
        }

        var output = {};
        output = jsonConcat(output, json1);
        output = jsonConcat(output, json2);
        const manifestNew = output;

        // intializatin process of neo envoirement start

        let neoline;
        let neolineN3;
        async function TestFunction() {
            try {
                function initDapi() {
                    const initCommonDapi = new Promise((resolve, reject) => {
                        window.addEventListener('NEOLine.NEO.EVENT.READY', () => {
                            neoline = new NEOLine.Init();
                            if (neoline) {
                                resolve(neoline);
                            } else {
                                reject('common dAPI method failed to load.');
                            }
                        });
                    });
                    const initN3Dapi = new Promise((resolve, reject) => {
                        window.addEventListener('NEOLine.N3.EVENT.READY', () => {
                            neolineN3 = new NEOLineN3.Init();
                            if (neolineN3) {
                                resolve(neolineN3);
                            } else {
                                reject('N3 dAPI method failed to load.');
                            }
                        });
                    });
                    initCommonDapi.then(() => {
                        console.log('The common dAPI method is loaded.');
                        return initN3Dapi;
                    }).then(() => {
                        console.log('The N3 dAPI method is loaded.');
                    }).catch((err) => {
                        console.log(err);
                    });
                    // function work start
                };
                initDapi();
            } catch (e) {
                console.log(e);
            }
        }

        TestFunction();

        // initialization of neo envoiremnet process start
        const dataTransfer = new DataTransfer();
        const compressImage = async (file, {
            quality = 1,
            type = file.type
        }) => {
            // Get as image data
            const imageBitmap = await createImageBitmap(file);

            // Draw to canvas
            const canvas = document.createElement('canvas');
            canvas.width = imageBitmap.width;
            canvas.height = imageBitmap.height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(imageBitmap, 0, 0);

            // Turn into Blob
            const blob = await new Promise((resolve) =>
                canvas.toBlob(resolve, type, quality)
            );

            // Turn Blob into File
            return new File([blob], file.name, {
                type: blob.type,
            });
        };

        // Get the selected file from the file input
        const input = document.querySelector('#featured-image');

        input.addEventListener('change', async (e) => {
            // Get the files
            const {
                files
            } = e.target;
            // No files selected
            if (!files.length) return;
            // We'll store the files in this data transfer object


            // For every file in the files list
            for (const file of files) {
                // We don't have to compress files that aren't images
                if (!file.type.startsWith('image')) {
                    // Ignore this file, but do add it to our result
                    dataTransfer.items.add(file);
                    continue;
                }

                // We compress the file by 50%
                const compressedFile = await compressImage(file, {
                    quality: 0.5,
                    type: 'image/jpeg',
                });

                // Save back the compressed file instead of the original file
                dataTransfer.items.add(compressedFile);
            }

            // Set value of the file input to our new files list
            // e.target.files = dataTransfer.files;

        });
    </script>
    <script>
        Quill.register("modules/imageCompressor", imageCompressor);
    </script>
    <script>
        $('.sidebar-setting-link-1').click(function() {
            $('.sidebar-setting-link-1 i').toggleClass('fa-chevron-right fa-chevron-down');
        });

        $('.sidebar-setting-link-2').click(function() {
            $('.sidebar-setting-link-2 i').toggleClass('fa-chevron-right fa-chevron-down');
        });

        var crowd_on_off = false;
        var crowdfunding_price_confiramtion = false;
        var project_uri_ipfs_link = '';
        var crowd_funding_switch = false;
        var crowd_funding_network = false;

        $(document).ready(function() {
            var name = $('#name').val();
            $('#story_title').change(function() {
                $('#meta_title').val($(this).val() + ' | ' + name);
            });

            $('#story_title').change(function() {
                $('#meta_description').val($(this).val() + ' is published by ' + name + '.');
            });

            $('#meta_title').keyup(function() {

                var characterCount = $(this).val().length,
                    current = $('#meta_title_chars');
                current.text(characterCount);

                if (characterCount < 40) {
                    current.css('color', 'orange');
                }
                if (characterCount > 40 && characterCount < 50) {
                    current.css('color', 'green');
                }
                if (characterCount > 50) {
                    current.css('color', 'red');
                }
            });

            $('#meta_description').keyup(function() {

                var characterCount = $(this).val().length,
                    current = $('#meta_description_chars');
                current.text(characterCount);

                if (characterCount < 140) {
                    current.css('color', 'orange');
                }
                if (characterCount > 140 && characterCount < 156) {
                    current.css('color', 'green');
                }
                if (characterCount > 156) {
                    current.css('color', 'red');
                }
            });
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


        var toolbarOptions = [
            ['bold', 'italic', 'underline' /* , 'strike' */ ], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [
                {
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }
            ],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            /* [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], */ // outdent/indent
            /* [{
                'direction': 'rtl'
            }], */ // text direction

            /* [{
                'size': ['small', false, 'large', 'huge']
            }], */ // custom dropdown
            /* [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }], */
            ['link', 'image', 'video', 'formula'], // add's image support
            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            /* [{
                'font': []
            }], */
            [{
                'align': []
            }],

            ['clean'] // remove formatting button
        ];
        var window_width = $(window).width();
        if (window_width <= 992) {
            var editor_theme = 'snow';
        } else {
            var editor_theme = 'snow';
        }
        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions,
                imageCompressor: {
                    quality: 0.8,
                    maxWidth: 1000, // default
                    maxHeight: 1000, // default
                    imageType: 'image/jpeg'
                }
            },
            placeholder: 'Tell your story...',
            theme: editor_theme,
        });
    </script>

    <script>
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            swal('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })

        //$('[name=tags]').tagify();

        var unlisted_btn = false;
        $("#unlisted_btn").on('change', function() {
            if ($(this).is(':checked')) {
                unlisted_btn = $(this).is(':checked');
                //alert(unlisted_btn);
            } else {
                unlisted_btn = $(this).is(':checked');
                //alert(unlisted_btn);
            }
        });

        var pin_story = false;
        $("#pin_story").on('change', function() {
            if ($(this).is(':checked')) {
                pin_story = $(this).is(':checked');
                //alert(unlisted_btn);
            } else {
                pin_story = $(this).is(':checked');
                //alert(unlisted_btn);
            }
        });


        $(document).ready(function() {
            var tagApi = $(".tm-input").tagsManager();


            $(".typeahead").typeahead({
                name: 'tags',
                displayKey: 'name',
                source: function(query, process) {
                    return $.get('php/getTags.php', {
                        query: query
                    }, function(data) {
                        data = $.parseJSON(data);
                        return process(data);
                    });
                },
                afterSelect: function(item) {
                    tagApi.tagsManager("pushTag", item);
                }
            });
        });
    </script>
    <script>
        async function fun_project_qri(crowd_project_uri) {
            console.log(JSON.stringify(crowd_project_uri));
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
            console.log(ipfs, 'ipfs');
            const pro = await new Promise(async (d) => {
                reader = new FileReader();
                reader.onloadend = () => {
                    ipfs.add(ipfs.Buffer.from(reader.result)).then((files) => {
                        d(files);
                    });
                };
                await fetch(window.location.href).then(response => response.text()).then(
                    formatedResponse => {
                        reader.readAsArrayBuffer(new File([JSON.stringify(crowd_project_uri)],
                            'application/json'));
                    })

            });
            if (pro) {
                var ipfs_link = (`https://ipfs.io/ipfs/${pro[0].hash}`);
                return ipfs_link;
            } else {
                return;
            }

        }

        async function fun_project_qri_neo(crowd_project_uri) {
            if (crowd_project_uri !== '') {
                const blob = new Blob([JSON.stringify(crowd_project_uri)], {
                    type: 'text/plain'
                });
                const newFile = new File([blob], "foo.json", {
                    type: "text/plain"
                });
                const bodyContent = new FormData();
                bodyContent.append("file", newFile);

                try {
                    const response = await fetch("https://cors-anywhere.herokuapp.com/https://http.t5.fs.neo.org/upload/Dc2weyCaqxMsXxJ6fHnzzg71o3dXGty7wjH5Zti1EM8L", {
                        method: "POST",
                        body: bodyContent,
                    });

                    const data = await response.json();
                    const ipfs_link = `https://cors-anywhere.herokuapp.com/https://http.t5.fs.neo.org/get/${data.container_id}/${data.object_id}`;
                    console.log(ipfs_link);
                    return ipfs_link;
                } catch (error) {
                    console.error(error);
                    return null;
                }
            }
            return null;
        }

        $(document).ready(function() {
            let current_radio_value = $('input[name=radio_crowd]:checked').val();

            $('input[name=radio_crowd]').on('change', function(e) {
                current_radio_value = ($(this).val());
                console.log(current_radio_value, 'current_radio_value')
                $('#user_amount_in').val(current_radio_value);

                if (current_radio_value === 'MATIC') {
                    crowd_funding_network = current_radio_value;
                    $('.network_class_matic').css('font-weight', 'bold');
                    $('.network_class_eth').css('font-weight', 'inherit');
                    $('#matic_crowdfunding_section').css('display', 'flex');
                    $('#eth_crowdfunding_section').css('display', 'none');
                    $('#bnb_crowdfunding_section').css('display', 'none');
                    $('#user_amount_in').val('MATIC');
                    changeNetwork('13881');
                } else if (current_radio_value === 'BNB') {
                    crowd_funding_network = current_radio_value;
                    $('.network_class_eth').css('font-weight', 'bold');
                    $('.network_class_matic').css('font-weight', 'inherit');
                    $('#matic_crowdfunding_section').css('display', 'none');
                    $('#eth_crowdfunding_section').css('display', 'none');
                    $('#bnb_crowdfunding_section').css('display', 'flex');
                    $('#user_amount_in').val('BNB');
                    changeNetwork('61');
                } else if (current_radio_value === 'NEO') {
                    crowd_funding_network = current_radio_value;
                    $('.network_class_eth').css('font-weight', 'bold');
                    $('.network_class_matic').css('font-weight', 'inherit');
                    $('#matic_crowdfunding_section').css('display', 'none');
                    $('#eth_crowdfunding_section').css('display', 'none');
                    $('#bnb_crowdfunding_section').css('display', 'none');
                    $('#user_amount_in').val('NEO');
                } else {
                    crowd_funding_network = current_radio_value;
                    $('.network_class_eth').css('font-weight', 'bold');
                    $('.network_class_matic').css('font-weight', 'inherit');
                    $('#matic_crowdfunding_section').css('display', 'none');
                    $('#bnb_crowdfunding_section').css('display', 'none');
                    $('#eth_crowdfunding_section').css('display', 'flex');
                    $('#user_amount_in').val('ETH');
                    changeNetwork('5');
                }

            });

            var _autosave;
            $('#add_story').on('click', function(e) {
                $('#main_publish_button').css('display', 'none');
                $('#main_publish_button_loader').css('display', 'grid');
                clearInterval(_autosave);
                const input_date = ($('#input_date').val()).trim();
                const input_time = ($('#input_time').val()).trim();
                const moment_time = (moment().format('HH:mm')).trim();
                const moment_date = (moment().format().split('T'))[0];
                // console.log(input_date, input_time, moment_time, moment_date);
                // console.log(moment(`${input_date} ${input_time}`,"YYYY-MM-DD HH:mm").isSame(`${moment_date} ${moment_time}`,"YYYY-MM-DD HH:mm"));
                const isTimeEqualOrGreater = moment(`${input_date} ${input_time}`, "YYYY-MM-DD HH:mm")
                    .isSameOrAfter(`${moment_date} ${moment_time}`, "YYYY-MM-DD HH:mm");
                const input_date_and_time = (`${input_date} ${input_time}`);
                var story_title = $('#story_title').val();
                var myEditor = document.querySelector('#editor')
                var story_editor = myEditor.children[0].innerHTML;
                var post_id = $('#post_id').val();
                var user_uid = $('#user_uid').val();
                var name = $('#name').val();
                var meta_title = $('#meta_title').val();
                var meta_description = $('#meta_description').val();
                var selected_theme = $('#selected_theme').val();
                const current_radio_value = $('input[name=radio]:checked').val();

                const crowd_min_amount = parseFloat($('#min_donation').val());
                const crowd_target_amount = parseFloat($('#target_amount').val());
                const crowd_min_amount_matic = parseFloat($('#min_donation_matic').val());
                const crowd_target_amount_matic = parseFloat($('#target_amount_matic').val());
                const crowd_min_amount_bnb = parseFloat($('#min_donation_bnb').val());
                const crowd_target_amount_bnb = parseFloat($('#target_amount_bnb').val());
                const crowd_min_amount_neo = parseFloat($('#min_donation_neo').val());
                const crowd_target_amount_neo = parseFloat($('#target_amount_neo').val());
                var crowd_amount_in = $('#user_amount_in').val();
                console.log(crowd_amount_in, 'crowd_amount_in')
                const crowd_current_datetime = moment().format('MMMM Do YYYY, h:mm:ss a');
                const username = $('#user_username').val();
                const authoraddress = $('#user_address').val();
                const current_timestamp = Date.now();
                var error = "";
                e.preventDefault();

                var formData = new FormData();
                if (current_radio_value === 'Schedule') {
                    if (isTimeEqualOrGreater) {
                        formData.append('published_status', 'schedule');
                        formData.append('schedule_time', input_date_and_time);
                    } else {
                        error = error + 'Time Error ';
                        toastr["error"]("Time Already Expired");
                    }
                } else if (current_radio_value === 'Draft') {
                    formData.append('published_status', 'draft');
                } else {
                    formData.append('published_status', 'published');
                }


                if ($("#story_title").val() == "") {
                    error = error + 'story title ';
                    toastr["error"]("Enter Story Title");

                } else {
                    formData.append('story_title', story_title);

                }

                var values = $("#tags").map(function() {
                    return $(this).val();
                });
                var inputs = $(".tm-tag span");
                var tag_list = [];
                for (var i = 0; i < inputs.length; i++) {
                    tag_list.push(inputs[i].innerText);
                }

                if (tag_list.length == 0) {
                    // error = error + 'tags';
                    // toastr["error"]("Add one tag..");
                    formData.append('tags', 'other');
                } else {
                    formData.append('tags', tag_list);
                }


                if ($("#featured-image").val() == "") {
                    // error = error + 'featured image';
                    // toastr["error"]("Upload featured image");
                    formData.append('featured_image', '');
                } else {
                    // formData.append('featured_image', $("#featured-image")[0].files[0]);
                    formData.append('featured_image', dataTransfer.files[0]);
                }
                if ($("#crowd_funding_switch").is(':checked')) {
                    crowd_on_off = true;
                    if ($('#user_amount_in').val() === 'ETH') {
                        confirmation_function();
                    } else if ($('#user_amount_in').val() === 'MATIC') {
                        confirmation_function_matic();
                    } else if ($('#user_amount_in').val() === 'BNB') {
                        confirmation_function_bnb();
                    } else if ($('#user_amount_in').val() === 'NEO') {
                        confirmation_function_neo();
                    } else {
                        console.log('something went wrong');
                    }

                    const is_confirm_crowd = $("#settingConfiramtion").is(':checked');
                    const is_confirm_crowd_matic = $("#settingConfiramtion_matic").is(':checked');
                    const is_confirm_crowd_neo = $("#settingConfiramtion_neo").is(':checked');
                    const is_confirm_crowd_bnb = $("#settingConfiramtion_bnb").is(':checked');
                    if (crowdfunding_price_confiramtion && crowd_on_off && (is_confirm_crowd ||
                            is_confirm_crowd_matic || is_confirm_crowd_bnb || is_confirm_crowd_neo)) {
                        formData.append('is_crowdfunding', true);
                    } else {
                        crowdfunding_price_confiramtion = false;
                    }
                } else {
                    crowd_on_off = false;
                    formData.append('is_crowdfunding', false);
                }

                formData.append('user_uid', user_uid);
                formData.append('unlisted', unlisted_btn);
                formData.append('pin_story', pin_story);
                formData.append('story_editor', story_editor);
                formData.append('post_id', post_id);
                formData.append('meta_title', meta_title);
                formData.append('meta_description', meta_description);
                formData.append('selected_theme', selected_theme);


                const crowd_project_uri = [{
                    content: {
                        title: story_title,
                        tag: tag_list,
                        story: story_editor,
                        timestamp: current_timestamp
                    },
                    author: {
                        address: authoraddress,
                        uid: user_uid,
                        username: username,
                    },
                    crowdfunding_details: {
                        min_pay_amount: crowd_min_amount,
                        target_amount: crowd_target_amount,
                        amount_in: crowd_amount_in
                    },
                    created_at: crowd_current_datetime,
                    updated_at: crowd_current_datetime
                }];
                // ETH Contract
                async function createProjectFunding(crowd_min_amount, crowd_target_amount, project_uri_link,
                    crowd_amount_in) {
                    if (window.ethereum) {
                        console.log("This is DAppp Environment");
                        var accounts = await ethereum.request({
                            method: 'eth_requestAccounts'
                        });
                        var currentaddress = accounts[0];
                        console.log("Current address: " + currentaddress);
                        web3 = new Web3(window.ethereum);
                        myFactoryContract = new web3.eth.Contract(factoryContract, contractAddress);
                        var min_donation_wei = web3.utils.toWei(crowd_min_amount.toString(), 'ether');
                        var target_amount_wei = web3.utils.toWei(crowd_target_amount.toString(),
                            'ether');

                        // create a project 
                        myFactoryContract.methods.createProject(min_donation_wei, target_amount_wei,
                            project_uri_link).send({
                            from: currentaddress
                        }).then((res) => {
                            const returnTxData = (res.events.ProjectCreated.returnValues);
                            const returnTxProjectId = returnTxData._project;
                            const returnTxCreator = returnTxData._creator;
                            console.log(returnTxProjectId, returnTxCreator);
                            formData.append('project_uri_link', project_uri_link);
                            formData.append('project_address', returnTxProjectId);
                            formData.append('project_creator', returnTxCreator);
                            formData.append('minimum_pay', crowd_min_amount);
                            formData.append('target_amount', crowd_target_amount);
                            formData.append('amount_in', crowd_amount_in);
                            $(".new-loader-wrapper").addClass("d-none");
                            $.ajax({
                                url: 'php/publish_stories.php',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formData,
                                success: function() {
                                    toastr["success"]("Story Published");
                                    $('#main_publish_button').css('display', 'grid');
                                    $('#main_publish_button_loader').css('display', 'none');
                                    window.location.replace("stories");
                                    AutoSave();
                                }
                            });
                        }).catch((err) => {
                            $(".new-loader-wrapper").addClass("d-none");
                            console.log(err);
                        });
                    } else {
                        console.log("Please connect with metamask");
                    }
                }


                const crowd_project_uri_matic = [{
                    content: {
                        title: story_title,
                        tag: tag_list,
                        story: story_editor,
                        timestamp: current_timestamp
                    },
                    author: {
                        address: authoraddress,
                        uid: user_uid,
                        username: username,
                    },
                    crowdfunding_details: {
                        min_pay_amount: crowd_min_amount_matic,
                        target_amount: crowd_target_amount_matic,
                        amount_in: crowd_amount_in
                    },
                    created_at: crowd_current_datetime,
                    updated_at: crowd_current_datetime
                }];
                // MATIC Contract
                async function createProjectFundingMatic(crowd_min_amount, crowd_target_amount,
                    project_uri_link, crowd_amount_in) {
                    console.log(crowd_min_amount, crowd_target_amount, project_uri_link,
                        crowd_amount_in)
                    if (window.ethereum) {
                        console.log("This is DAppp Environment");
                        var accounts = await ethereum.request({
                            method: 'eth_requestAccounts'
                        });
                        var currentaddress = accounts[0];
                        console.log("Current address: " + currentaddress);
                        web3 = new Web3(window.ethereum);
                        myFactoryContract = new web3.eth.Contract(maticFactoryContract, maticContract);
                        var min_donation_wei = web3.utils.toWei(crowd_min_amount.toString(), 'ether');
                        var target_amount_wei = web3.utils.toWei(crowd_target_amount.toString(),
                            'ether');

                        // create a project 
                        myFactoryContract.methods.createProject(min_donation_wei, target_amount_wei,
                            project_uri_link).send({
                            from: currentaddress
                        }).then((res) => {
                            const returnTxData = (res.events.ProjectCreated.returnValues);
                            const returnTxProjectId = returnTxData._project;
                            const returnTxCreator = returnTxData._creator;
                            console.log(returnTxProjectId, returnTxCreator);
                            formData.append('project_uri_link', project_uri_link);
                            formData.append('project_address', returnTxProjectId);
                            formData.append('project_creator', returnTxCreator);
                            formData.append('minimum_pay', crowd_min_amount);
                            formData.append('target_amount', crowd_target_amount);
                            formData.append('amount_in', crowd_amount_in);
                            $(".new-loader-wrapper").addClass("d-none");
                            // for (const value of formData.values()) {
                            // console.log(value);
                            // }
                            $.ajax({
                                url: 'php/publish_stories.php',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formData,
                                success: function() {
                                    toastr["success"]("Story Published");
                                    window.location.replace("stories");
                                    AutoSave();
                                }
                            });
                        }).catch((err) => {
                            $(".new-loader-wrapper").addClass("d-none");
                            console.log(err);
                        });
                    } else {
                        console.log("Please connect with metamask");
                    }
                }
                const crowd_project_uri_bnb = [{
                    content: {
                        title: story_title,
                        tag: tag_list,
                        story: story_editor,
                        timestamp: current_timestamp
                    },
                    author: {
                        address: authoraddress,
                        uid: user_uid,
                        username: username,
                    },
                    crowdfunding_details: {
                        min_pay_amount: crowd_min_amount_bnb,
                        target_amount: crowd_target_amount_bnb,
                        amount_in: crowd_amount_in
                    },
                    created_at: crowd_current_datetime,
                    updated_at: crowd_current_datetime
                }];
                // BNB Contract
                async function createProjectFundingBnb(crowd_min_amount, crowd_target_amount,
                    project_uri_link, crowd_amount_in) {
                    console.log(crowd_min_amount, crowd_target_amount, project_uri_link,
                        crowd_amount_in)
                    if (window.ethereum) {
                        console.log("This is DAppp Environment");
                        var accounts = await ethereum.request({
                            method: 'eth_requestAccounts'
                        });
                        var currentaddress = accounts[0];
                        console.log("Current address: " + currentaddress);
                        web3 = new Web3(window.ethereum);
                        myFactoryContract = new web3.eth.Contract(bnbFactoryContract, bnbContract);
                        var min_donation_wei = web3.utils.toWei(crowd_min_amount.toString(), 'ether');
                        var target_amount_wei = web3.utils.toWei(crowd_target_amount.toString(),
                            'ether');

                        // create a project 
                        myFactoryContract.methods.createProject(min_donation_wei, target_amount_wei,
                            project_uri_link).send({
                            from: currentaddress
                        }).then((res) => {
                            const returnTxData = (res.events.ProjectCreated.returnValues);
                            const returnTxProjectId = returnTxData._project;
                            const returnTxCreator = returnTxData._creator;
                            console.log(returnTxProjectId, returnTxCreator);
                            formData.append('project_uri_link', project_uri_link);
                            formData.append('project_address', returnTxProjectId);
                            formData.append('project_creator', returnTxCreator);
                            formData.append('minimum_pay', crowd_min_amount);
                            formData.append('target_amount', crowd_target_amount);
                            formData.append('amount_in', crowd_amount_in);
                            $(".new-loader-wrapper").addClass("d-none");
                            // for (const value of formData.values()) {
                            // console.log(value);
                            // }
                            $.ajax({
                                url: 'php/publish_stories.php',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formData,
                                success: function() {
                                    toastr["success"]("Story Published");
                                    window.location.replace("stories");
                                    AutoSave();
                                }
                            });
                        }).catch((err) => {
                            $(".new-loader-wrapper").addClass("d-none");
                            console.log(err);
                        });
                    } else {
                        console.log("Please connect with metamask");
                    }
                }

                const crowd_project_uri_neo = [{
                    content: {
                        title: story_title,
                        tag: tag_list,
                        story: story_editor,
                        timestamp: current_timestamp
                    },
                    author: {
                        address: authoraddress,
                        uid: user_uid,
                        username: username,
                    },
                    crowdfunding_details: {
                        min_pay_amount: crowd_min_amount_neo,
                        target_amount: crowd_target_amount_neo,
                        amount_in: crowd_amount_in
                    },
                    created_at: crowd_current_datetime,
                    updated_at: crowd_current_datetime
                }];
                // NEO Contract
                async function createProjectFundingNeo(crowd_min_amount, crowd_target_amount, project_uri_link, crowd_amount_in) {
                    console.log(crowd_min_amount, crowd_target_amount, project_uri_link, crowd_amount_in)
                    var currentaddress = $('#user_address').val();
                    console.log("Current address: " + currentaddress);
                    // neo contract method calling start
                    const {
                        u,
                        sc
                    } = Neon;
                    const manifestString = JSON.stringify(manifestNew);
                    const arg1 = sc.ContractParam.integer(crowd_target_amount);
                    const arg2 = sc.ContractParam.integer(crowd_min_amount)
                    const arg3 = sc.ContractParam.string(project_uri_link);
                    const arg4 = sc.ContractParam.string(manifestString);
                    const args = [arg1, arg2, arg3, arg4];
                    const Neo3Address = currentaddress;
                    const scriptHash = (Neon.wallet.getScriptHashFromAddress(Neo3Address));
                    const BigEndianHash = `0x${scriptHash}`;
                    const LittleEndianHash = Neon.u.reverseHex(scriptHash);
                    console.log(BigEndianHash, LittleEndianHash, Neo3Address, args);

                    async function SendTransaction(project_uri_link, returnTxCreator, crowd_min_amount, crowd_target_amount, crowd_amount_in) {
                        neolineN3.invoke({
                                scriptHash: neoContract,
                                operation: 'createProject',
                                args: args,
                                fee: '0.0001',
                                broadcastOverride: false,
                                signers: [{
                                    account: BigEndianHash,
                                    scopes: 16,
                                    allowedContracts: [LittleEndianHash],
                                    allowedGroups: []
                                }]
                            })
                            .then(result => {
                                async function ReadTransationData(txn_id, project_uri_link, returnTxCreator, crowd_min_amount, crowd_target_amount, crowd_amount_in) {
                                    console.log(txn_id, 'txn_id');
                                    setTimeout(waitFunction, 30000);
                                    async function waitFunction() {
                                        neolineN3.getApplicationLog({
                                                txid: txn_id,
                                            })
                                            .then(result => {
                                                const DataResult = result;
                                                const projectNeoContract = DataResult.executions[0].stack[0].value;
                                                const newDecodeHax = Neon.u.reverseHex(Neon.u.base642hex(projectNeoContract));
                                                const projectNewAddress = (`0x${newDecodeHax}`);
                                                formData.append('project_uri_link', project_uri_link);
                                                formData.append('project_address', projectNewAddress);
                                                formData.append('project_creator', returnTxCreator);
                                                formData.append('minimum_pay', crowd_min_amount);
                                                formData.append('target_amount', crowd_target_amount);
                                                formData.append('amount_in', crowd_amount_in);
                                                $(".new-loader-wrapper").addClass("d-none");
                                                // for (const value of formData.values()) {
                                                // console.log(value);
                                                // }
                                                $.ajax({
                                                    url: 'php/publish_stories.php',
                                                    type: "POST",
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    data: formData,
                                                    success: function() {
                                                        toastr["success"]("Story Published");
                                                        window.location.replace("stories");
                                                        AutoSave();
                                                    }
                                                }).catch((err) => {
                                                    $(".new-loader-wrapper").addClass("d-none");
                                                    console.log(err);
                                                });
                                            }).catch((error) => {
                                                const {
                                                    type,
                                                    description,
                                                    data
                                                } = error;
                                                switch (type) {
                                                    case 'NO_PROVIDER':
                                                        console.log('No provider available.');
                                                        break;
                                                    case 'RPC_ERROR':
                                                        console.log('There was an error when broadcasting this transaction to the network.');
                                                        break;
                                                    default:
                                                        // Not an expected error object.  Just write the error to the console.
                                                        console.error(error);
                                                        break;
                                                }
                                            });
                                    }
                                }
                                ReadTransationData(result.txid, project_uri_link, returnTxCreator, crowd_min_amount, crowd_target_amount, crowd_amount_in);
                            })
                            .catch((error) => {
                                const {
                                    type,
                                    description,
                                    data
                                } = error;
                                switch (type) {
                                    case 'NO_PROVIDER':
                                        console.log('No provider available.');
                                        break;
                                    case 'RPC_ERROR':
                                        console.log(
                                            'There was an error when broadcasting this transaction to the network.'
                                        );
                                        break;
                                    case 'CANCELED':
                                        console.log('The user has canceled this transaction.');
                                        break;
                                    default:
                                        // Not an expected error object.  Just write the error to the console.
                                        console.error(error);
                                        break;
                                }
                            });
                    }



                    SendTransaction(project_uri_link, Neo3Address, crowd_min_amount, crowd_target_amount, crowd_amount_in);
                    // neo contract method calling end
                }

                if (error == "") {
                    if (crowd_on_off) {
                        const is_confirm_crowd = $("#settingConfiramtion").is(':checked');
                        const is_confirm_crowd_matic = $("#settingConfiramtion_matic").is(':checked');
                        const is_confirm_crowd_bnb = $("#settingConfiramtion_bnb").is(':checked');
                        const is_confirm_crowd_neo = $("#settingConfiramtion_neo").is(':checked');
                        if (is_confirm_crowd || is_confirm_crowd_matic || is_confirm_crowd_bnb || is_confirm_crowd_neo) {
                            if ($('#user_amount_in').val() === 'ETH') {
                                if ((window.ethereum.networkVersion) !== '5') {
                                    changeNetwork('5');
                                } else {
                                    console.log(crowd_min_amount, crowd_target_amount, crowd_amount_in);
                                    const promise1 = Promise.resolve(fun_project_qri(crowd_project_uri));
                                    promise1.then((value) => {
                                        $(".new-loader-wrapper").removeClass("d-none");
                                        $(".new-loader-wrapper").addClass("d-flex");
                                        createProjectFunding(crowd_min_amount, crowd_target_amount,
                                            value, crowd_amount_in);
                                    });
                                }
                            } else if ($('#user_amount_in').val() === 'MATIC') {
                                if ((window.ethereum.networkVersion) !== '80001') {
                                    changeNetwork('13881');
                                } else {
                                    console.log(crowd_min_amount_matic, crowd_target_amount_matic,
                                        crowd_amount_in);
                                    const promise2 = Promise.resolve(fun_project_qri(
                                        crowd_project_uri_matic));
                                    promise2.then((value) => {
                                        $(".new-loader-wrapper").removeClass("d-none");
                                        $(".new-loader-wrapper").addClass("d-flex");
                                        createProjectFundingMatic(crowd_min_amount_matic,
                                            crowd_target_amount_matic,
                                            value, crowd_amount_in);
                                    });
                                }
                            } else if ($('#user_amount_in').val() === 'BNB') {
                                if ((window.ethereum.networkVersion) !== '97') {
                                    changeNetwork('61');
                                } else {
                                    console.log(crowd_min_amount_bnb, crowd_target_amount_bnb,
                                        crowd_amount_in);
                                    const promise2 = Promise.resolve(fun_project_qri(
                                        crowd_project_uri_bnb));
                                    promise2.then((value) => {
                                        $(".new-loader-wrapper").removeClass("d-none");
                                        $(".new-loader-wrapper").addClass("d-flex");
                                        createProjectFundingBnb(crowd_min_amount_bnb,
                                            crowd_target_amount_bnb, value, crowd_amount_in);
                                    });
                                }
                            } else if ($('#user_amount_in').val() === 'NEO') {
                                // console.log(crowd_min_amount_neo, crowd_target_amount_neo,
                                //     crowd_amount_in);
                                const promise2 = Promise.resolve(fun_project_qri_neo(
                                    crowd_project_uri_neo));
                                promise2.then((value) => {
                                    $(".new-loader-wrapper").removeClass("d-none");
                                    $(".new-loader-wrapper").addClass("d-flex");
                                    createProjectFundingNeo(crowd_min_amount_neo,
                                        crowd_target_amount_neo, value, crowd_amount_in);
                                });
                            } else {
                                console.log('Something went wrong.')
                            }
                        } else {
                            toastr["error"]("confirm crowdfunding settings first.");
                        }

                    } else {
                        $.ajax({
                            url: 'php/publish_stories.php',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function() {
                                toastr["success"]("Story Published");
                                window.location.replace("stories");
                                AutoSave();
                            }
                        });
                    }
                } else {
                    $('#main_publish_button').css('display', 'grid');
                    $('#main_publish_button_loader').css('display', 'none');
                }
            });


            function AutoSave() {
                _autosave = setInterval(function() {
                    var story_title = $('#story_title').val();
                    var myEditor = document.querySelector('#editor')
                    var story_editor = myEditor.children[0].innerHTML;
                    var post_id = $('#post_id').val();
                    var user_uid = $('#user_uid').val();
                    var name = $('#name').val();
                    var meta_title = $('#meta_title').val();
                    var meta_description = $('#meta_description').val();
                    var selected_theme = $('#selected_theme').val();
                    var formData = new FormData();

                    var values = $("#tags").map(function() {
                        return $(this).val();
                    });
                    var inputs = $(".tm-tag span");
                    var tag_list = [];
                    for (var i = 0; i < inputs.length; i++) {
                        tag_list.push(inputs[i].innerText);
                    }

                    formData.append('user_uid', user_uid);
                    formData.append('story_title', story_title);
                    formData.append('tags', tag_list);
                    formData.append('unlisted', unlisted_btn);
                    formData.append('pin_story', pin_story);
                    formData.append('story_editor', story_editor);
                    formData.append('featured_image', dataTransfer.files[0]);
                    formData.append('post_id', post_id);

                    formData.append('meta_title', meta_title);
                    formData.append('meta_description', meta_description);
                    formData.append('selected_theme', selected_theme);

                    if (story_title != "") {
                        $.ajax({
                            url: 'php/autosave_stories.php',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,
                            success: function(data) {
                                if (data != "") {
                                    $('#post_id').val(data);


                                }
                                toastr["success"]("Story Saved");
                            }
                        });
                    }
                }, 1 * 60 * 1000);
            }
            AutoSave();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#submitTag').on('click', function(e) {
                e.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#editorTag').val() == "") {
                    $('#editorTag').css('cssText', 'border-color: red !important');
                    error = error + 'editorTag';
                } else {
                    formData.append('editorTag', $('#editorTag').val());
                }

                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {
                    $.ajax({
                        url: "php/addTag.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            if (data.status == 201) {
                                // $(".close-modal").load(location.href + " .close-modal");
                                //window.location.reload();
                                toastr["success"]("Tag Added");
                                $(".modal").modal("hide");


                            } else if (data.status == 501) {

                                //swal("Tag already exist");

                            } else if (data.status == 301) {
                                //swal("error");

                            }
                        }
                    });
                } else {

                }
            });
        });
    </script>
    <script>
        $(function() {
            $('#editorTag').on('keypress', function(e) {
                if (e.which == 32) {
                    console.log('Space Detected');
                    return false;
                }
            });
        });
        const optionDate = {
            dateFormat: "Y-m-d",
            wrap: true,
            minDate: "today"
        }

        const optionTime = {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            wrap: true
        }

        const date = flatpickr("#myDate", optionDate);
        const time = flatpickr("#myTime", optionTime);

        const radio_value = $('input[name=radio]:checked', '#myForm').val();
        $('#add_story').html(radio_value);

        if ($('input[name=radio]:checked', '#myForm').val() === 'Schedule') {
            $('#display-schedule').css('display', 'block');
            $('#add_story').html('Schedule');
        } else if ($('input[name=radio]:checked', '#myForm').val() === 'Draft') {
            $('#display-schedule').css('display', 'none');
            $('#add_story').html('Draft');
        } else {
            $('#display-schedule').css('display', 'none');
            $('#add_story').html('Publish Now');
        }

        $('#myForm input').on('change', function() {
            if ($('input[name=radio]:checked', '#myForm').val() === 'Schedule') {
                $('#display-schedule').css('display', 'block');
                $('#add_story').html('Schedule');
            } else if ($('input[name=radio]:checked', '#myForm').val() === 'Draft') {
                $('#display-schedule').css('display', 'none');
                $('#add_story').html('Save as Draft');
            } else {
                $('#display-schedule').css('display', 'none');
                $('#add_story').html('Publish Now');
            }
        });


        $('.carousel-main').owlCarousel({
            items: 3,
            loop: false,
            autoplay: false,
            autoplayTimeout: 1500,
            margin: 10,
            nav: true,
            dots: false,
            navText: ['<span class="fas fa-chevron-left fa-2x"></span>',
                '<span class="fas fa-chevron-right fa-2x"></span>'
            ],
        });

        function sliderClick(getClass) {
            $('.slider').removeClass('activeSlider');
            $(`.class-${getClass}`).addClass('activeSlider');
            if (`class-${getClass}` === 'class-1') {
                $('#theme-select-id').text('default');
                $('#selected_theme').val(0);
            } else if (`class-${getClass}` === 'class-2') {
                $('#theme-select-id').text('theme-1');
                $('#selected_theme').val(1);
            } else if (`class-${getClass}` === 'class-3') {
                $('#theme-select-id').text('theme-2');
                $('#selected_theme').val(2);
            } else if (`class-${getClass}` === 'class-4') {
                $('#theme-select-id').text('theme-3');
                $('#selected_theme').val(3);
            } else if (`class-${getClass}` === 'class-5') {
                $('#theme-select-id').text('theme-4');
                $('#selected_theme').val(4);
            }
        }

        function previewClick(getClass) {
            if (`class-${getClass}` === 'class-1') {
                $('#theme-select-preview').attr("src", "theme/theme-0.png");
                $('#theme-preview-modal-title').text('Default Preview');
            } else if (`class-${getClass}` === 'class-2') {
                $('#theme-select-preview').attr("src", "theme/theme-1.png");
                $('#theme-preview-modal-title').text('Theme-1 Preview');
            } else if (`class-${getClass}` === 'class-3') {
                $('#theme-select-preview').attr("src", "theme/theme-2.png");
                $('#theme-preview-modal-title').text('Theme-2 Preview');
            } else if (`class-${getClass}` === 'class-4') {
                $('#theme-select-preview').attr("src", "theme/theme-3.png");
                $('#theme-preview-modal-title').text('Theme-3 Preview');
            } else if (`class-${getClass}` === 'class-5') {
                $('#theme-select-preview').attr("src", "theme/theme-4.png");
                $('#theme-preview-modal-title').text('Theme-4 Preview');
            }
            $('#theme-preview-modal').modal('show');
        }

        function confirmation_function() {
            if ($("#settingConfiramtion").is(':checked')) {
                Eth_to_usd();
                const min_donatation = parseFloat($('#min_donation').val());
                const target_amount = parseFloat($('#target_amount').val());
                if (min_donatation <= 0 || isNaN(min_donatation)) {
                    toastr["error"]("Error in Min Donation");
                    $("#settingConfiramtion").prop('checked', false);
                }
                if (target_amount <= 0 || isNaN(target_amount)) {
                    toastr["error"]("Error in Target Amount");
                    $("#settingConfiramtion").prop('checked', false);
                }
                if (min_donatation > target_amount) {
                    toastr["error"]("Min Donation must be less than Target Amount");
                    $("#settingConfiramtion").prop('checked', false);
                }

                if ((min_donatation > 0) && (target_amount > 0) && (min_donatation < target_amount)) {
                    crowdfunding_price_confiramtion = true;
                } else {
                    crowdfunding_price_confiramtion = false;
                }
            } else {
                toastr["error"]("confirm eth crowdfunding settings first.");
            }
        }

        function confirmation_function_matic() {
            if ($("#settingConfiramtion_matic").is(':checked')) {
                Matic_to_usd();
                const min_donatation = parseFloat($('#min_donation_matic').val());
                const target_amount = parseFloat($('#target_amount_matic').val());
                if (min_donatation <= 0 || isNaN(min_donatation)) {
                    toastr["error"]("Error in Min Donation");
                    $("#settingConfiramtion_matic").prop('checked', false);
                }
                if (target_amount <= 0 || isNaN(target_amount)) {
                    toastr["error"]("Error in Target Amount");
                    $("#settingConfiramtion_matic").prop('checked', false);
                }
                if (min_donatation > target_amount) {
                    toastr["error"]("Min Donation must be less than Target Amount");
                    $("#settingConfiramtion_matic").prop('checked', false);
                }

                if ((min_donatation > 0) && (target_amount > 0) && (min_donatation < target_amount)) {
                    crowdfunding_price_confiramtion = true;
                } else {
                    crowdfunding_price_confiramtion = false;
                }
            } else {
                toastr["error"]("confirm matic crowdfunding settings first.");
            }
        }

        function confirmation_function_bnb() {
            if ($("#settingConfiramtion_bnb").is(':checked')) {
                Bnb_to_usd();
                const min_donatation = parseFloat($('#min_donation_bnb').val());
                const target_amount = parseFloat($('#target_amount_bnb').val());
                if (min_donatation <= 0 || isNaN(min_donatation)) {
                    toastr["error"]("Error in Min Donation");
                    $("#settingConfiramtion_bnb").prop('checked', false);
                }
                if (target_amount <= 0 || isNaN(target_amount)) {
                    toastr["error"]("Error in Target Amount");
                    $("#settingConfiramtion_bnb").prop('checked', false);
                }
                if (min_donatation > target_amount) {
                    toastr["error"]("Min Donation must be less than Target Amount");
                    $("#settingConfiramtion_bnb").prop('checked', false);
                }

                if ((min_donatation > 0) && (target_amount > 0) && (min_donatation < target_amount)) {
                    crowdfunding_price_confiramtion = true;
                } else {
                    crowdfunding_price_confiramtion = false;
                }
            } else {
                toastr["error"]("confirm bnb crowdfunding settings first.");
            }
        }

        function confirmation_function_neo() {
            if ($("#settingConfiramtion_neo").is(':checked')) {
                Neo_to_usd();
                const min_donatation = parseFloat($('#min_donation_neo').val());
                const target_amount = parseFloat($('#target_amount_neo').val());
                if (min_donatation <= 0 || isNaN(min_donatation)) {
                    toastr["error"]("Error in Min Donation");
                    $("#settingConfiramtion_neo").prop('checked', false);
                }
                if (target_amount <= 0 || isNaN(target_amount)) {
                    toastr["error"]("Error in Target Amount");
                    $("#settingConfiramtion_neo").prop('checked', false);
                }
                if (min_donatation > target_amount) {
                    toastr["error"]("Min Donation must be less than Target Amount");
                    $("#settingConfiramtion_neo").prop('checked', false);
                }

                if ((min_donatation > 0) && (target_amount > 0) && (min_donatation < target_amount)) {
                    crowdfunding_price_confiramtion = true;
                } else {
                    crowdfunding_price_confiramtion = false;
                }
            } else {
                toastr["error"]("confirm neo crowdfunding settings first.");
            }
        }

        function Eth_to_usd() {
            var ethereum_amount = $("#target_amount").val();
            let convFrom;
            let convTo;
            var chain = "ethereum";
            if ($(this).prop("name") == "usd") {
                convFrom = "usd";
                convTo = "eth";
            } else {
                convFrom = "eth";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,
                function(data) {
                    var origAmount = parseFloat($("#target_amount").val());
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount = null;
                    if (convFrom == "eth")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + convTo + "']").val(amount.toFixed(5));
                    if (convFrom === "eth") {
                        if (isNaN(amount)) {
                            $("#dollar_amount").text('0.00');
                        } else {
                            $("#dollar_amount").text(amount);
                        }
                        if (isNaN(origAmount)) {
                            $("#eth_show_value").text('0');
                        } else {
                            $("#eth_show_value").text(origAmount);
                        }
                    }
                });
        }

        function Bnb_to_usd() {
            var ethereum_amount = $("#target_amount_bnb").val();
            let convFromMatic;
            let convTo;
            var chain = "binancecoin";
            if ($(this).prop("name") == "usd") {
                convFromMatic = "usd";
                convTo = "bnb";
            } else {
                convFromMatic = "bnb";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,
                function(data) {
                    var origAmount = parseFloat($("#target_amount_bnb").val());
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount = null;
                    if (convFromMatic == "bnb")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + convTo + "']").val(amount.toFixed(5));
                    if (convFromMatic === "bnb") {
                        if (isNaN(amount)) {
                            $("#dollar_amount_bnb").text('0.00');
                        } else {
                            $("#dollar_amount_bnb").text(amount);
                        }
                        if (isNaN(origAmount)) {
                            $("#bnb_show_value").text('0');
                        } else {
                            $("#bnb_show_value").text(origAmount);
                        }
                    }
                });
        }

        function Matic_to_usd() {
            var ethereum_amount = $("#target_amount_matic").val();
            let convFromMatic;
            let convTo;
            var chain = "matic-network";
            if ($(this).prop("name") == "usd") {
                convFromMatic = "usd";
                convTo = "matic";
            } else {
                convFromMatic = "matic";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,
                function(data) {
                    var origAmount = parseFloat($("#target_amount_matic").val());
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount = null;
                    if (convFromMatic == "matic")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + convTo + "']").val(amount.toFixed(5));
                    if (convFromMatic === "matic") {
                        if (isNaN(amount)) {
                            $("#dollar_amount_matic").text('0.00');
                        } else {
                            $("#dollar_amount_matic").text(amount);
                        }
                        if (isNaN(origAmount)) {
                            $("#matic_show_value").text('0');
                        } else {
                            $("#matic_show_value").text(origAmount);
                        }
                    }
                });
        }

        function Neo_to_usd() {
            var ethereum_amount = $("#target_amount_neo").val();
            let convFromNeo;
            let convTo;
            var chain = "neo";
            if ($(this).prop("name") == "usd") {
                convFromNeo = "usd";
                convTo = "neo";
            } else {
                convFromNeo = "neo";
                convTo = "usd";
            }
            $.getJSON(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${chain}`,
                function(data) {
                    var origAmount = parseFloat($("#target_amount_neo").val());
                    var exchangeRate = parseFloat(data[0].current_price);
                    let amount = null;
                    if (convFromNeo == "neo")
                        amount = parseFloat(origAmount * exchangeRate);
                    else
                        amount = parseFloat(origAmount / exchangeRate);
                    $("input[name='" + convTo + "']").val(amount.toFixed(5));
                    if (convFromNeo === "neo") {
                        if (isNaN(amount)) {
                            $("#dollar_amount_neo").text('0.00');
                        } else {
                            $("#dollar_amount_neo").text(amount);
                        }
                        if (isNaN(origAmount)) {
                            $("#neo_show_value").text('0');
                        } else {
                            $("#neo_show_value").text(origAmount);
                        }
                    }
                });
        }


        $(document).ready(function() {
            $('#crowd_funding_body').slideUp();
            $("#crowd_funding_switch").on('change', function() {
                if ($(this).is(':checked')) {
                    crowd_funding_switch = $(this).is(':checked');
                    $('.themeSliderShow').css('display', 'none');
                    $('#crowd_funding_body').slideDown();
                } else {
                    crowd_funding_switch = $(this).is(':checked');
                    $('#crowd_funding_body').slideUp();
                    $('.themeSliderShow').css('display', 'block');
                }
            });
            // eth
            $(".currencyField").keypress(function() {
                Eth_to_usd();
                $("#settingConfiramtion").prop('checked', false);
            });
            $(".currencyField").change(function() {
                Eth_to_usd();
                $("#settingConfiramtion").prop('checked', false);
            });

            $('#min_donation').keypress(function() {
                $("#settingConfiramtion").prop('checked', false);
            });
            $('#min_donation').change(function() {
                $("#settingConfiramtion").prop('checked', false);
            });

            $("#settingConfiramtion").on('change', function() {
                confirmation_function();
                changeNetwork('5');
            });
            // matic
            $(".currencyFieldMatic").keypress(function() {
                Matic_to_usd();
                $("#settingConfiramtion_matic").prop('checked', false);
            });
            $(".currencyFieldMatic").change(function() {
                Matic_to_usd();
                $("#settingConfiramtion_matic").prop('checked', false);
            });

            $('#min_donation_matic').keypress(function() {
                $("#settingConfiramtion_matic").prop('checked', false);
            });
            $('#min_donation_matic').change(function() {
                $("#settingConfiramtion_matic").prop('checked', false);
            });

            $("#settingConfiramtion_matic").on('change', function() {
                confirmation_function_matic();
                changeNetwork('13881');
            });

            // bnb
            $(".currencyFieldBnb").keypress(function() {
                Bnb_to_usd();
                $("#settingConfiramtion_bnb").prop('checked', false);
            });
            $(".currencyFieldBnb").change(function() {
                Bnb_to_usd();
                $("#settingConfiramtion_bnb").prop('checked', false);
            });

            $('#min_donation_bnb').keypress(function() {
                $("#settingConfiramtion_bnb").prop('checked', false);
            });
            $('#min_donation_bnb').change(function() {
                $("#settingConfiramtion_bnb").prop('checked', false);
            });

            $("#settingConfiramtion_bnb").on('change', function() {
                confirmation_function_bnb();
                changeNetwork('61');
            });

            // neo
            $(".currencyFieldNeo").keypress(function() {
                Neo_to_usd();
                $("#settingConfiramtion_neo").prop('checked', false);
            });
            $(".currencyFieldNeo").change(function() {
                Neo_to_usd();
                $("#settingConfiramtion_neo").prop('checked', false);
            });

            $('#min_donation_neo').keypress(function() {
                $("#settingConfiramtion_neo").prop('checked', false);
            });
            $('#min_donation_neo').change(function() {
                $("#settingConfiramtion_neo").prop('checked', false);
            });

            $("#settingConfiramtion_neo").on('change', function() {
                confirmation_function_neo();
                // changeNetwork('13881');
            });

            // $("#crowd_funding_network").on('change', function() {
            //     if ($(this).is(':checked')) {
            //         crowd_funding_network = $(this).is(':checked');
            //         $('.network_class_matic').css('font-weight', 'bold');
            //         $('.network_class_eth').css('font-weight', 'inherit');
            //         $('#matic_crowdfunding_section').css('display', 'flex');
            //         $('#eth_crowdfunding_section').css('display', 'none');
            //         $('#user_amount_in').val('MATIC');
            //         changeNetwork('13881');
            //     } else {
            //         crowd_funding_network = $(this).is(':checked');
            //         $('.network_class_eth').css('font-weight', 'bold');
            //         $('.network_class_matic').css('font-weight', 'inherit');
            //         $('#matic_crowdfunding_section').css('display', 'none');
            //         $('#eth_crowdfunding_section').css('display', 'flex');
            //         $('#user_amount_in').val('ETH');
            //         changeNetwork('5');
            //     }
            // });
        });
        // check start
        async function isConnected() {
            const currAccount = $('#user_address').val();
            var str2 = "0x";
            if (currAccount.indexOf(str2) != -1) {
                $('#crowdfunding_section').css('display', 'block');
            } else {
                $('#crowdfunding_section').css('display', 'none');
                $('#crowdfunding_section').css('display', 'block');
            }
        }
        isConnected();
        // check end
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
    <script type="text/javascript">
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
        });

        $(function() {
            $('#tags').keyup(function() {
                $(this).val($(this).val().replace(/ +?/g, ''));
            });
        });
    </script>
    <script type="text/javascript">
        async function GenAiArticle() {
            $('#ai_loading').css('display', 'block');
            $('#ai_loading_button').css('display', 'none');
            const value = $('#take_value').val();
            try {
                fetch('https://api.openai.com/v1/completions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer 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'
                    },
                    body: JSON.stringify({
                        'model': 'text-davinci-003',
                        'prompt': value,
                        'temperature': 1,
                        'max_tokens': 4000
                    })
                }).then((response) => response.json()).then((data) => {
                    $('#ai_loading').css('display', 'none');
                    $('#ai_loading_button').css('display', 'block');
                    if (data.choices) {
                        $('#copy-area').css('display', 'block');
                        $('#topic_para').text(value);
                        $('#ai_regenerate_topic').val(value);
                        $('#ai_topic_show').css('display', 'block');
                        $('#take_value').val('');
                        $('#ai-gen_code_description').text(((data.choices)[0].text));
                    } else {
                        const err = data.error.message;
                        console.log('There was an error', err);
                        toastr["error"](err);
                    }
                });
            } catch (error) {
                const err = error.error.message;
                console.log('There was an error', err);
                toastr["error"](err);
            }
        }

        async function RegGenAiArticle() {
            $('#regenerate_story').css('display', 'none');
            $('#reg_loader_button').css('display', 'block');
            const value = $('#ai_regenerate_topic').val();
            try {
                fetch('https://api.openai.com/v1/completions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer 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'
                    },
                    body: JSON.stringify({
                        'model': 'text-davinci-003',
                        'prompt': value,
                        'temperature': 1,
                        'max_tokens': 4000
                    })
                }).then((response) => response.json()).then((data) => {
                    $('#reg_loader_button').css('display', 'none');
                    $('#regenerate_story').css('display', 'block');
                    if (data.choices) {
                        $('#topic_para').text(value);
                        $('#ai_regenerate_topic').val(value);
                        $('#ai_topic_show').css('display', 'block');
                        $('#ai-gen_code_description').text(((data.choices)[0].text));
                    } else {
                        const err = data.error.message;
                        console.log('There was an error', err);
                        toastr["error"](err);
                    }
                });
            } catch (error) {
                const err = error.error.message;
                console.log('There was an error', err);
                toastr["error"](err);
            }
        }

        $('#gen-art').click(function() {
            $('#article-generator').modal('show');
        });

        var clipboard = new ClipboardJS('#copy_story');

        clipboard.on('success', function(e) {
            toastr["error"]("Article copied");

            e.clearSelection();
        });

        clipboard.on('error', function(e) {
            toastr["error"]("Error");
        });
        // console.log(dataTransfer);
    </script>
</body>

</html>