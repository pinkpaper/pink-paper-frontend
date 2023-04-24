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
$query2 = "SELECT * FROM `stories` WHERE `post_id` = '$post_id'";
$run_query2 = mysqli_query($link, $query2);
$row2 = mysqli_fetch_assoc($run_query2);
$post_title = $row2['post_title'];
$post_content = $row2['post_content'];
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
    <input type="hidden" name="schedule_time_taker" id="schedule_time_taker" value="<?= $schedule_time ?>">
    <input type="hidden" name="post_status_taker" id="post_status_taker" value="<?= $post_status ?>">
    <input type="hidden" id="selected_theme" name="selected_theme" value="<?= $selected_theme ?>">
    <input type="hidden" id="post_slug" name="post_slug" value="<?= $post_slug ?>">
    <input type="hidden" id="featured_image_preset" name="featured_image_preset" value="<?= $featured_image ?>">
    <!-- loader start-->
    <div class="loader-container">
        <div class="loadingio-spinner-ellipsis-tjmuel5ie5"><div class="ldio-g2ezeznggp">
<div></div><div></div><div></div><div></div><div></div>
</div></div>
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h1 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Edit
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
                                id="story_title" placeholder="Story Title" value="<?php echo $post_title; ?>">
                            <input type="hidden" id="post_id" value="<?php echo $post_id; ?>" />
                            <input type="hidden" id="name" value="<?php echo $name; ?>" />
                        </div>
                        <div class="form-group mb-3">
                            <div id="editor">
                                <?php echo $post_content; ?>
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
                                                <input id="radio-1" name="radio" type="radio" value="Published"
                                                    <?php echo $post_status !== 'schedule' ? 'checked' : '' ?>>
                                                <label for="radio-1" class="radio-label"
                                                    style="color:var(--text-color);">Publish now</label>
                                            </div>

                                            <div class="radio">
                                                <input id="radio-2" name="radio" type="radio" value="Schedule"
                                                    <?php echo $post_status === 'schedule' ? 'checked' : '' ?>>
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
                                            <button type="submit" class="btn button-primary" id="update_story">Update
                                                Story</button>
                                        </div>
                                    </div>
                                </div>
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
                                                        <input class="form-check-input" type="checkbox" id="pin_story"
                                                            <?php if($pin_story=='true') echo " checked "?>>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0" style="color:var(--text-color);">Make this story
                                                        unlisted?</h6>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="unlisted_btn"
                                                            <?php if($unlisted=='true') echo " checked "?>>
                                                        <!-- <label class="form-check-label" for="flexSwitchCheckDefault">No/Yes</label> -->
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h6 style="color:var(--text-color);">Featured Image</h6>
                                                    <input type="file" id="featured-image" class="dropify"
                                                        data-height="150"
                                                        data-default-file="<?php echo 'uploads/featuredImages/'.$featured_image ?>" />
                                                    <input type="hidden" id="old-featured-image"
                                                        value="<?php echo 'uploads/featuredImages/'.$featured_image ?>" />
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
                                                        class="typeahead tm-input form-control tm-input-info story-input"
                                                        value="<?php echo $post_tags; ?>" />
                                                    <input type="hidden" id="allTags"
                                                        value="<?php echo $post_tags; ?>" />
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
                                                    id="meta_title" placeholder="Meta Title"
                                                    value="<?php echo $meta_title2; ?>">
                                            </div>
                                            <div class="form-group">
                                                <h6 style="color:var(--text-color);">Meta Description (<span
                                                        id="meta_description_chars">0</span>)</h6>
                                                <textarea name="meta_description" class="form-control story-input"
                                                    id="meta_description" rows="5"
                                                    placeholder="Meta Description"><?php echo $meta_description2; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- theme slider -->
                                <?php 
                                if(!$is_croudfunded){
                                ?>
                                <div class="col-12 ">
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
                                                    class="d-flex flex-column position-relative class-1 slider <?php echo $selected_theme === '0'?'activeSlider':'' ?> ">
                                                    <img src="http://via.placeholder.com/350x400/FECA57/FFF.jpg?text=Default"
                                                        onclick="sliderClick(1)">
                                                    <i title="preview"
                                                        class="fa fa-eye d-flex justify-content-center align-items-center my-1 text-secondary position-absolute px-1 eye-style w-100 bg-light mt-0 bg-opacity-50"
                                                        onclick="previewClick(1)"></i>
                                                </div>
                                                <div
                                                    class="d-flex flex-column position-relative class-2 slider <?php echo $selected_theme === '1'?'activeSlider':'' ?>">
                                                    <img src="http://via.placeholder.com/350x400/FECA57/FFF.jpg?text=Theme-1"
                                                        onclick="sliderClick(2)">
                                                    <i title="preview"
                                                        class="fa fa-eye d-flex justify-content-center align-items-center my-1 text-secondary position-absolute px-1 eye-style w-100 bg-light mt-0 bg-opacity-50"
                                                        onclick="previewClick(2)"></i>
                                                </div>
                                                <div
                                                    class="d-flex flex-column position-relative class-3 slider <?php echo $selected_theme === '2'?'activeSlider':'' ?>">
                                                    <img src="http://via.placeholder.com/350x400/FECA57/FFF.jpg?text=Theme-2"
                                                        onclick="sliderClick(3)">
                                                    <i title="preview"
                                                        class="fa fa-eye d-flex justify-content-center align-items-center my-1 text-secondary position-absolute px-1 eye-style w-100 bg-light mt-0 bg-opacity-50"
                                                        onclick="previewClick(3)"></i>
                                                </div>
                                                <div
                                                    class="d-flex flex-column position-relative class-4 slider <?php echo $selected_theme === '3'?'activeSlider':'' ?>">
                                                    <img src="http://via.placeholder.com/350x400/FECA57/FFF.jpg?text=Theme-3"
                                                        onclick="sliderClick(4)">
                                                    <i title="preview"
                                                        class="fa fa-eye d-flex justify-content-center align-items-center my-1 text-secondary position-absolute px-1 eye-style w-100 bg-light mt-0 bg-opacity-50"
                                                        onclick="previewClick(4)"></i>
                                                </div>
                                                <div
                                                    class="d-flex flex-column position-relative class-5 slider <?php echo $selected_theme === '4'?'activeSlider':'' ?>">
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
                                <?php } ?>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js">
    </script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
    <script type="text/javascript" src='https://cdn.quilljs.com/1.2.3/quill.min.js'></script>
    <script type="text/javascript" src="assets/dropify/js/dropify.min.js"></script>
    <script type="text/javascript" src="assets/tagify/jQuery.tagify.min.js"></script>
    <script type="text/javascript" src="assets/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/popr/popr.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <script src="assets/js/flatpickr.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/moment-duration-format.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/owl.carousel.min.js"></script>
    <script>
    $('.sidebar-setting-link-1').click(function() {
        $('.sidebar-setting-link-1 i').toggleClass('fa-chevron-right fa-chevron-down');
    });

    $('.sidebar-setting-link-2').click(function() {
        $('.sidebar-setting-link-2 i').toggleClass('fa-chevron-right fa-chevron-down');
    });

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

        var allTags = $('#allTags').val();
        var strArray = allTags.split(",");

        for (var i = 0; i < strArray.length; i++) {
            $(".tm-input").tagsManager('pushTag', strArray[i]);
        }


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
    $(document).ready(function() {
        var _autosave;
        $('#update_story').on('click', function(e) {
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
            //var story_editor = quill.container.innerHTML;
            var myEditor = document.querySelector('#editor')
            var story_editor = myEditor.children[0].innerHTML;
            var post_id = $('#post_id').val();
            var meta_title = $('#meta_title').val();
            var meta_description = $('#meta_description').val();
            var old_featured_image = $('#old-featured-image').val();
            const current_radio_value = $('input[name=radio]:checked').val();
            var selected_theme = $('#selected_theme').val();
            var post_slug = $('#post_slug').val();
            var featured_image_preset = $('#featured_image_preset').val();
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

            formData.append('featured_image', $("#featured-image")[0].files[0]);
            formData.append('unlisted', unlisted_btn);
            formData.append('pin_story', pin_story);
            formData.append('story_editor', story_editor);
            formData.append('post_id', post_id);
            formData.append('old_featured_image', old_featured_image);

            formData.append('meta_title', meta_title);
            formData.append('meta_description', meta_description);
            formData.append('selected_theme', selected_theme);
            formData.append('post_slug', post_slug);
            formData.append('featured_image_preset', featured_image_preset);
            if (error == "") {
                $.ajax({
                    url: 'php/update_autosave_story.php',
                    type: "POST",
                    /* dataType: "json", */
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
        });

        function AutoSave() {
            _autosave = setInterval(function() {
                //alert('hii');
                var story_title = $('#story_title').val();
                //var story_editor = quill.container.innerHTML;
                var myEditor = document.querySelector('#editor')
                var story_editor = myEditor.children[0].innerHTML;
                var post_id = $('#post_id').val();
                var meta_title = $('#meta_title').val();
                var meta_description = $('#meta_description').val();
                var selected_theme = $('#selected_theme').val();
                var post_slug = $('#post_slug').val();
                var featured_image_preset = $('#featured_image_preset').val();
                var formData = new FormData();

                var values = $("#tags").map(function() {
                    return $(this).val();
                });
                var inputs = $(".tm-tag span");
                var tag_list = [];
                for (var i = 0; i < inputs.length; i++) {
                    tag_list.push(inputs[i].innerText);
                }

                formData.append('story_title', story_title);
                formData.append('tags', tag_list);
                formData.append('unlisted', unlisted_btn);
                formData.append('pin_story', pin_story);
                formData.append('story_editor', story_editor);
                //formData.append('featured_image', $("#featured-image")[0].files[0]);
                formData.append('post_id', post_id);
                formData.append('meta_title', meta_title);
                formData.append('meta_description', meta_description);
                formData.append('published_status', $('#post_status_taker').val());
                formData.append('schedule_time', $('#schedule_time_taker').val());
                formData.append('selected_theme', selected_theme);
                formData.append('post_slug', post_slug);
                formData.append('featured_image_preset', featured_image_preset);
                if (story_title != "") {
                    $.ajax({
                        url: 'php/update_autosave_story.php',
                        type: "POST",
                        /* dataType: "json", */
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        /* beforeSend: function() {
                            // setting a timeout
                            $('#result').html("Saving...").fadeOut(200);
                        }, */
                        success: function(data) {
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
            /* var myEditor = document.querySelector('#editorComment')
            var editorComment = myEditor.children[0].innerHTML; */
            var formData = new FormData();

            if ($('#editorTag').val() == "") {
                $('#editorTag').css('cssText', 'border-color: red !important');
                error = error + 'editorTag';
            } else {
                formData.append('editorTag', $('#editorTag').val());
            }

            formData.append('user_uid', $('#user_uid').val());


            if (error == "") {
                //console.log(formData);
                $.ajax({
                    url: "php/addTag.php",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,

                    success: function(data) {
                        //console.log(data);
                        if (data.status == 201) {
                            // $(".close-modal").load(location.href + " .close-modal");
                            //window.location.reload();
                            toastr["success"]("Tag Added");
                            $(".modal").modal("hide");


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
    const schedule_time_taker = $('#schedule_time_taker').val();
    var schedule_Date = '';
    var schedule_Time = '';
    if (schedule_time_taker && schedule_time_taker !== '') {
        const date_value = (schedule_time_taker.split(' '));
        schedule_Date = date_value[0];
        schedule_Time = date_value[1];
    }
    const optionDate = {
        dateFormat: "Y-m-d",
        wrap: true,
        minDate: "today",
        defaultDate: schedule_Date
    }

    const optionTime = {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        wrap: true,
        defaultDate: schedule_Time
    }

    const date = flatpickr("#myDate", optionDate);
    const time = flatpickr("#myTime", optionTime);

    const radio_value = $('input[name=radio]:checked', '#myForm').val();
    $('#add_story').html(radio_value);

    if ($('input[name=radio]:checked', '#myForm').val() === 'Schedule') {
        $('#display-schedule').css('display', 'block');

    } else {
        $('#display-schedule').css('display', 'none');

    }

    $('#myForm input').on('change', function() {
        if ($('input[name=radio]:checked', '#myForm').val() === 'Schedule') {
            $('#display-schedule').css('display', 'block');

        } else {
            $('#display-schedule').css('display', 'none');

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
    $(document).ready(function() {
        const selected_theme_value = ($('#selected_theme').val());
        if (selected_theme_value === '0') {
            $('#theme-select-id').text('default');
        } else if (selected_theme_value === '1') {
            $('#theme-select-id').text('theme-1');
        } else if (selected_theme_value === '2') {
            $('#theme-select-id').text('theme-2');
        } else if (selected_theme_value === '3') {
            $('#theme-select-id').text('theme-3');
        } else if (selected_theme_value === '4') {
            $('#theme-select-id').text('theme-4');
        }
    });
    </script>
</body>

</html>