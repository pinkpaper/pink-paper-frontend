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


if($_SESSION['userAddress'] == ""){
    header('Location: ./login-user-mm');
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
            <h1>Please Wait ...</h1>
            <p>Don't refresh the page.<br>Data will be lost if you leave the page,you will autometically redirect on
                story list tab after this process.</p>
        </div>
    </div>
    <!-- new loader end -->
    <input type="hidden" id="selected_theme" name="selected_theme" value="0">
    <input type="hidden" id="user_username" name="user_username" value="<?= $username?>">
    <input type="hidden" id="user_address" name="user_address" value="<?= $user_address?>">
    <input type="hidden" id="user_amount_in" name="user_amount_in" value="ETH">
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
                            <h1 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Write
                                Story
                            </h1>
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
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="write-story-div">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control form-control-lg story-input" name="story_title"
                                id="story_title" placeholder="Story Title">
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
                        <div class="make-me-sticky">
                            <div class="row">
                                <div class="col-12 order-last order-lg-first">
                                    <div class="story-right-card shadow px-3 py-3 mb-3">
                                        <!-- new code start -->
                                        <form id="myForm">
                                            <div class="radio">
                                                <input id="radio-1" name="radio" type="radio" value="Published" checked>
                                                <label for="radio-1" class="radio-label"
                                                    style="color:var(--text-color);">Publish now</label>
                                            </div>

                                            <div class="radio">
                                                <input id="radio-2" name="radio" type="radio" value="Schedule">
                                                <label for="radio-2" class="radio-label"
                                                    style="color:var(--text-color);">Schedule</label>
                                            </div>
                                        </form>
                                        <div class="mb-3" style="display:none;" id="display-schedule">
                                            <div class="d-flex justify-content-between">
                                                <div class="flatpickr d-flex justify-content-center align-items-center mx-2"
                                                    id="myDate" style="background:#8080804a;border-radius:3px;">
                                                    <input class="form-control" type="text" placeholder="Date"
                                                        data-input id="input_date">
                                                    <a class="input-button mx-1" title="toggle" data-toggle><i
                                                            class="icon-calendar"></i></a>
                                                </div>
                                                <div class="flatpickr d-flex justify-content-center align-items-center mx-2"
                                                    id="myTime" style="background:#8080804a;border-radius:3px;">
                                                    <input class="form-control" type="text" placeholder="Time"
                                                        data-input id="input_time">
                                                    <a class="input-button mx-1" title="toggle" data-toggle><i
                                                            class="icon-clock"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- new code end -->
                                        <div class="d-grid mt-3 mb-1">
                                            <button type="submit" class="btn button-primary"
                                                id="add_story">Publish</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- funding code start -->
                                <div class="col-12" style="display:none;" id="crowdfunding_section">
                                    <div class="story-right-card shadow px-3 py-3 mb-3"
                                        style="color:var(--text-color);">
                                        <div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5>Crowdfunding</h5>
                                                <div class="d-flex justify-content-end align-items-center">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="crowd_funding_switch">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- funding body start -->
                                            <div id="crowd_funding_body">
                                                <div class="d-flex justify-content-center align-items-center my-2 p-3" style="background:#f4fbff;">
                                                    <!-- eth and matic start -->
                                                    <label class="mx-2 network_class_eth"
                                                        style="color:var(--text-color);font-size:16px;font-weight:bold;"><img
                                                            style="width:1.2rem;height:1.2rem;"
                                                            src="assets/images/download.png" alt="matic"
                                                            class="img-responsive mx-1">ETH</label>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="crowd_funding_network" style="width:2.4em;height:1.2em">
                                                    </div>
                                                    <label
                                                        class="mx-1 network_class_matic d-flex justify-content-center align-items-center"
                                                        style="color:var(--text-color);font-size:16px;"><img
                                                            style="width:1.2rem;height:1.2rem;"
                                                            src="assets/images/polygon-matic-logo.png" alt="matic"
                                                            class="img-responsive mx-1">MATIC</label>
                                                    <!-- eth and matic end -->
                                                </div>

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
                                                                        <input type="number" class="form-control"
                                                                            id="min_donation" placeholder="Min Donation"
                                                                            min="0">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">ETH</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="sr-only" for="target_amount">Target
                                                                        Value</label>
                                                                    <div class="input-group mb-2">
                                                                        <input type="number"
                                                                            class="form-control currencyField"
                                                                            id="target_amount"
                                                                            placeholder="Target Amount" min="0"
                                                                            name="convFrom">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">ETH</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto mt-2 w-100">
                                                                    <div class="form-check mb-2 py-1 w-100 d-flex justify-content-between"
                                                                        style="background:#efefef;color: mediumpurple;">
                                                                        <input class="form-check-input mx-lg-2"
                                                                            type="checkbox" id="settingConfiramtion">
                                                                        <label class="form-check-label w-100"
                                                                            for="settingConfiramtion">
                                                                            I confirm these settings are correct and
                                                                            would
                                                                            be not change in future.
                                                                        </label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <small style="font-size:0.75rem;"><b>*Min
                                                                    Donation:&nbsp;</b>You
                                                                can
                                                                set minimum amount which user can pay.</small><br>
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
                                                                        <input type="number" class="form-control"
                                                                            id="min_donation_matic"
                                                                            placeholder="Min Donation" min="0">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">MATIC</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label class="sr-only"
                                                                        for="target_amount_matic">Target
                                                                        Value</label>
                                                                    <div class="input-group mb-2">
                                                                        <input type="number"
                                                                            class="form-control currencyFieldMatic"
                                                                            id="target_amount_matic"
                                                                            placeholder="Target Amount" min="0"
                                                                            name="convFromMatic">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">MATIC</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto mt-2 w-100">
                                                                    <div class="form-check mb-2 py-1 w-100 d-flex justify-content-between"
                                                                        style="background:#efefef;color: mediumpurple;">
                                                                        <input class="form-check-input mx-lg-2"
                                                                            type="checkbox"
                                                                            id="settingConfiramtion_matic">
                                                                        <label class="form-check-label w-100"
                                                                            for="settingConfiramtion_matic">
                                                                            I confirm these settings are correct and
                                                                            would
                                                                            be not change in future.
                                                                        </label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <small style="font-size:0.75rem;"><b>*Min
                                                                    Donation:&nbsp;</b>You
                                                                can
                                                                set minimum amount which user can pay.</small><br>
                                                            <small style="font-size:0.75rem;"><b>**Target
                                                                    Amount:&nbsp;</b>You
                                                                can set total funding required.</small>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- matic_crowd_funding_network end-->
                                            </div>
                                            <!-- funding body end -->
                                        </div>
                                    </div>
                                </div>
                                <!-- funding code end -->
                                <div class="col-12 ">
                                    <div class="story-right-card shadow px-3 py-3 mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a class="sidebar-setting-link sidebar-setting-link-1"
                                                data-bs-toggle="collapse" href="#collapseMainSettings"
                                                aria-expanded="false" aria-controls="collapseMainSettings">
                                                Main Settings
                                            </a>
                                            <a class="sidebar-setting-link sidebar-setting-link-1"
                                                data-bs-toggle="collapse" href="#collapseMainSettings"
                                                aria-expanded="false" aria-controls="collapseMainSettings">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                        <div class="collapse" id="collapseMainSettings">
                                            <hr>
                                            <div class="row gap-2">
                                                <div class="col-12 d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0" style="color:var(--text-color);">Pin this story to
                                                        the top of your profile?</h6>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="pin_story">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0" style="color:var(--text-color);">Make this story
                                                        unlisted?</h6>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="unlisted_btn">
                                                        <!-- <label class="form-check-label" for="flexSwitchCheckDefault">No/Yes</label> -->
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h6 style="color:var(--text-color);">Featured Image</h6>
                                                    <input type="file" id="featured-image" class="dropify"
                                                        data-height="150" />
                                                    <p id="label-featured-image" class="small"
                                                        style="color:var(--gray-color);">Tip:
                                                        add a high-quality image to your story to capture people’s
                                                        interest</p>

                                                </div>
                                                <div class="col-12 tags-div">
                                                    <h6 class="small mb-1" style="color:var(--text-color);">Add or
                                                        change tags (up
                                                        to 3) so readers know what your story is about:</h6>
                                                    <!-- <input name="tags" placeholder="Add a tag" class="form-control story-input"
                                                id="tags"> -->
                                                    <input type="text" name="tags" placeholder="Add a tag" id="tags"
                                                        class="typeahead tm-input form-control tm-input-info story-input" />
                                                    <button class="btn button-follow fw-bold" data-bs-toggle="modal"
                                                        data-bs-target="#commentRightModal">Add New Tag</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="story-right-card shadow px-3 py-3 mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a class="sidebar-setting-link sidebar-setting-link-2"
                                                data-bs-toggle="collapse" href="#collapseSeoSettings"
                                                aria-expanded="false" aria-controls="collapseSeoSettings">
                                                SEO Settings
                                            </a>
                                            <a class="sidebar-setting-link sidebar-setting-link-2"
                                                data-bs-toggle="collapse" href="#collapseSeoSettings"
                                                aria-expanded="false" aria-controls="collapseSeoSettings">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>
                                        <div class="collapse" id="collapseSeoSettings">
                                            <hr>
                                            <div class="form-group mb-3">
                                                <h6 style="color:var(--text-color);">Meta Title (<span
                                                        id="meta_title_chars">0</span>)</h6>
                                                <input type="text" class="form-control story-input" name="meta_title"
                                                    id="meta_title" placeholder="Meta Title">
                                            </div>
                                            <div class="form-group">
                                                <h6 style="color:var(--text-color);">Meta Description (<span
                                                        id="meta_description_chars">0</span>)</h6>
                                                <textarea name="meta_description" class="form-control story-input"
                                                    id="meta_description" rows="5"
                                                    placeholder="Meta Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- theme slider -->
                                <div class="col-12 themeSliderShow">
                                    <div class="story-right-card shadow px-3 py-3 mb-3">
                                        <div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5>Selected Theme</h5>
                                                <span class="theme-select d-flex justify-content-end"
                                                    id="theme-select-id"
                                                    style="border-bottom:2px solid grey">default</span>
                                            </div>
                                            <hr>
                                            <div
                                                class="owl-carousel carousel-main justify-content-center align-items-center">
                                                <div
                                                    class="d-flex flex-column position-relative class-1 slider activeSlider">
                                                    <img src="http://via.placeholder.com/350x400/FECA57/FFF.jpg?text=Default"
                                                        onclick="sliderClick(1)">
                                                    <i title="preview"
                                                        class="fa fa-eye d-flex justify-content-center align-items-center my-1 text-secondary position-absolute px-1 eye-style w-100 bg-light mt-0 bg-opacity-50"
                                                        onclick="previewClick(1)"></i>
                                                </div>
                                                <div class="d-flex flex-column position-relative class-2 slider">
                                                    <img src="http://via.placeholder.com/350x400/FECA57/FFF.jpg?text=Theme-1"
                                                        onclick="sliderClick(2)">
                                                    <i title="preview"
                                                        class="fa fa-eye d-flex justify-content-center align-items-center my-1 text-secondary position-absolute px-1 eye-style w-100 bg-light mt-0 bg-opacity-50"
                                                        onclick="previewClick(2)"></i>
                                                </div>
                                                <div class="d-flex flex-column position-relative class-3 slider">
                                                    <img src="http://via.placeholder.com/350x400/FECA57/FFF.jpg?text=Theme-2"
                                                        onclick="sliderClick(3)">
                                                    <i title="preview"
                                                        class="fa fa-eye d-flex justify-content-center align-items-center my-1 text-secondary position-absolute px-1 eye-style w-100 bg-light mt-0 bg-opacity-50"
                                                        onclick="previewClick(3)"></i>
                                                </div>
                                                <div class="d-flex flex-column position-relative class-4 slider">
                                                    <img src="http://via.placeholder.com/350x400/FECA57/FFF.jpg?text=Theme-3"
                                                        onclick="sliderClick(4)">
                                                    <i title="preview"
                                                        class="fa fa-eye d-flex justify-content-center align-items-center my-1 text-secondary position-absolute px-1 eye-style w-100 bg-light mt-0 bg-opacity-50"
                                                        onclick="previewClick(4)"></i>
                                                </div>
                                                <div class="d-flex flex-column position-relative class-5 slider">
                                                    <img src="http://via.placeholder.com/350x400/FECA57/FFF.jpg?text=Theme-4"
                                                        onclick="sliderClick(5)">
                                                    <i title="preview"
                                                        class="fa fa-eye d-flex justify-content-center align-items-center my-1 text-secondary position-absolute px-1 eye-style w-100 bg-light mt-0 bg-opacity-50"
                                                        onclick="previewClick(5)"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- theme slider end -->
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
            /* {
                        'list': 'ordered'
                    }, */
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
        var editor_theme = 'bubble';
    }
    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        placeholder: 'Tell your story...',
        theme: editor_theme
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
        pro = await new Promise(async (d) => {
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
    $(document).ready(function() {
        var _autosave;
        $('#add_story').on('click', function(e) {
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
            const crowd_amount_in = $('#user_amount_in').val();
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
                error = error + 'tags';
                toastr["error"]("Add one tag..");
            } else {
                formData.append('tags', tag_list);
            }


            if ($("#featured-image").val() == "") {
                error = error + 'featured image';
                toastr["error"]("Upload featured image");
            } else {
                formData.append('featured_image', $("#featured-image")[0].files[0]);
            }
            if ($("#crowd_funding_switch").is(':checked')) {
                crowd_on_off = true;
                if ($('#user_amount_in').val() === 'ETH') {
                    confirmation_function();
                } else if ($('#user_amount_in').val() === 'MATIC') {
                    confirmation_function_matic();
                } else {
                    console.log('something went wrong');
                }

                const is_confirm_crowd = $("#settingConfiramtion").is(':checked');
                const is_confirm_crowd_matic = $("#settingConfiramtion_matic").is(':checked');
                if (crowdfunding_price_confiramtion && crowd_on_off && (is_confirm_crowd ||
                        is_confirm_crowd_matic)) {

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

            if (error == "") {
                if (crowd_on_off) {
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
                                    value,
                                    crowd_amount_in);
                            });
                        }
                    } else if ($('#user_amount_in').val() === 'MATIC') {
                        if ((window.ethereum.networkVersion) !== '80001') {
                            changeNetwork('13881');
                        } else {
                            console.log(crowd_min_amount_matic, crowd_target_amount_matic,
                                crowd_amount_in);
                            const promise2 = Promise.resolve(fun_project_qri(crowd_project_uri_matic));
                            promise2.then((value) => {
                                $(".new-loader-wrapper").removeClass("d-none");
                                $(".new-loader-wrapper").addClass("d-flex");
                                createProjectFundingMatic(crowd_min_amount_matic,
                                    crowd_target_amount_matic,
                                    value, crowd_amount_in);
                            });
                        }

                    } else {
                        console.log('Something went wrong.')
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
                formData.append('featured_image', $("#featured-image")[0].files[0]);
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
    } else {
        $('#display-schedule').css('display', 'none');
        $('#add_story').html('Published');
    }

    $('#myForm input').on('change', function() {
        if ($('input[name=radio]:checked', '#myForm').val() === 'Schedule') {
            $('#display-schedule').css('display', 'block');
            $('#add_story').html('Schedule');
        } else {
            $('#display-schedule').css('display', 'none');
            $('#add_story').html('Published');
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
            toastr["error"]("confirm crowdfunding settings first.");
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
            toastr["error"]("confirm crowdfunding settings first.");
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

        $("#crowd_funding_network").on('change', function() {
            if ($(this).is(':checked')) {
                crowd_funding_network = $(this).is(':checked');
                $('.network_class_matic').css('font-weight', 'bold');
                $('.network_class_eth').css('font-weight', 'inherit');
                $('#matic_crowdfunding_section').css('display', 'flex');
                $('#eth_crowdfunding_section').css('display', 'none');
                $('#user_amount_in').val('MATIC');
                changeNetwork('13881');
            } else {
                crowd_funding_network = $(this).is(':checked');
                $('.network_class_eth').css('font-weight', 'bold');
                $('.network_class_matic').css('font-weight', 'inherit');
                $('#matic_crowdfunding_section').css('display', 'none');
                $('#eth_crowdfunding_section').css('display', 'flex');
                $('#user_amount_in').val('ETH');
                changeNetwork('5');
            }
        });
    });
    // check start
    async function isConnected() {
        const currAccount = $('#user_address').val();
        var str2 = "0x";
        if (currAccount.indexOf(str2) != -1) {
            $('#crowdfunding_section').css('display', 'block');
        } else {
            $('#crowdfunding_section').css('display', 'none');
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
</body>

</html>