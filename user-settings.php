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
        $bio = $fetch_info['bio'];
        $twitter_url = $fetch_info['twitter_url'];
        $instagram_url = $fetch_info['instagram_url'];
        $linkedin_url = $fetch_info['linkedin_url'];
        $facebook_url = $fetch_info['facebook_url'];
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
    header('Location: login-user');
}

?>
<?php
$meta_title = 'Settings';
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
    <!-- Styling for settings starts -->
    <style type="text/css">
        .left-card {
            justify-content: left;
            position: relative;
        }

        .row {
            text-align: left;
            justify-content: left;

            padding-bottom: 20px;
        }

        .row-h {
            padding-bottom: 1px;
            text-align: left;
            justify-content: left;
        }

        .nav-link {
            padding: 5px;
            ;
            color: #6c757d;

        }

        .form-control {
            height: 40px;
            font-size: 15px;
            background: #E2E8F0;
            color: #6c757d;
            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 15px;
            padding-bottom: 4px;
        }

        .about-you {
            width: 100%;

        }

        .email-section,
        .social-section {
            padding-bottom: none;
        }

        @media only screen and (max-width: 600px) {
            .col-8 {
                width: 100vw;
                text-align: left;
            }

            .row {
                text-align: left;
                justify-content: left;

                padding-bottom: 20px;
            }

            .row-h {
                padding-bottom: 1px;
                text-align: left;
                justify-content: left;
            }

            h5 {
                font-size: medium;
            }

            p {
                font-size: small;
            }

            button {
                size: small;
            }

        }

        #save {
            visibility: hidden;
        }
    </style>
    <!-- Styling for settings ends-->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TNWHRNG');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body onload="loader()">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNWHRNG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
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

    <section class="my-5" style="padding-top:50px;">
        <div class="container">
            <div class="row-h">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold text-capitalize mb-0 text-align d-none d-md-none d-lg-block d-sm-none " style="color:var(--text-color);
                            margin-left: 82px;">Settings
                        </h3>

                        <div class="d-flex justify-content-between">

                        </div>
                    </div>
                    <div class="about-you">
                        <h2 class="fw-bold text-capitalize mb-0 text-align=left" style="color:var(--text-color);padding-top:27px;padding-left:11.5vw;
                            width:100%">About You
                        </h2>
                        <hr style="color: gray;padding-left:11.5vw;margin-left:11.5vw">
                        </hr>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 d-none d-md-none d-lg-block d-sm-none ">
                    <div class="d-flex justify-content-between align-items-center mb-4 	">
                        <div>
                            <ul class="nav nav-tabs flex-column " style="text-align: left;text-decoration:none;margin-left: 92px;">

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#about-you" style="justify-content:left">About You</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link " href="#email-section">Email</a>
                                </li>                                 -->
                                <li class="nav-item">
                                    <a class="nav-link " href="#meta-section" tabindex="-1" aria-disabled="true">Metamask Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#social-section">Social Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- About You Starts -->
                <div class="col-8 d-md-block d-lg-block">
                    <div class="row">
                        <section id="about-you">
                            <div class="about-you" href="about-you">
                                <div class="row">
                                    <div class="d-flex justify-content-between align-items-center mb-4">

                                        <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Name
                                            <p></p>
                                            <div class=" form-group mb-3">
                                                <?php

                                                $query = "SELECT * from `user_login` WHERE`user_login`.`user_uid`='$user_uid' ";
                                                $result = mysqli_query($link, $query);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                ?> <input class="form-control" required readonly id="name" type="text" placeholder="Name" required value="<?php echo $row['name'] ?>">
                                                        <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                            </div>

                                        <?php }
                                                } else { ?>
                                    <?php } ?>
                                        </h5>
                                        <div class="d-flex justify-content-between">

                                        </div>

                                        <div class="inputs d-flex justify-content-between align-items-center mt-4 gap-2">
                                            <button class="btn button-outline-primary " id='cancel' style="visibility: hidden;" type='reset'>Cancel</button>
                                            <button class='btn button-outline-primary' data-role="update" id='submitname' style="visibility: hidden;" type='button'>Save</a>
                                                <button class='btn button-outline-primary' id="edit1">Edit</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Bio
                                            <p></p>
                                            <div class="form-group mb-3">
                                                <input class="form-control" readonly id="Bio" type="text" name="bio" placeholder="Bio" required value="<?php echo $bio ?>">
                                            </div>
                                        </h5>
                                        <div class="d-flex justify-content-between">

                                        </div>
                                        <div class="inputs d-flex justify-content-between align-items-center mt-4 gap-2">
                                            <button class="btn button-outline-primary" id='cancel2' style="visibility: hidden;" onclick="window.location.replace('user-settings.php')" type='reset'>Cancel</button>
                                            <button class='btn button-outline-primary' id='save2' style="visibility: hidden;" type='submit'>Save</button>

                                            <button class='btn button-outline-primary' id="edit2">Edit</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-12 d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="fw-bold text-capitalize mb-0 text-align mx-2" style="color:var(--text-color);">Photo
                                            <p class="fw-bold text-capitalize mb-0 text-align" style="font-size: small;color:grey">Your photo appears on your Profile
                                                page and<br> with your stories across Medium.
                                                File type: JPG, PNG or GIF.</p>
                                        </h5>
                                        <div>
                                            <!-- Query for profile picture -->
                                            <?php
                                            $query = "SELECT `user_login`.* FROM `user_login` WHERE `user_uid`='$user_uid'";
                                            $result = mysqli_query($link, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($row['profile'] == '') {
                                                        echo '<div class="profile">
                                                    <a href="' . $row['username'] . '">
                                                    <canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="40" height="40"></canvas>

                                                    </a>
                                                </div>';
                                                    } else {
                                                        echo '<div class="profile" style="width:6rem;height:6rem;">
                                                    <a href="' . $row['username'] . '">
                                                        <img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle">
                                                    </a>
                                                </div>';
                                                    }
                                                }
                                            }
                                            ?>
                                            <!-- Query for profile picture ends-->
                                        </div>


                                    </div>
                                    <div class="col-12 d-flex justify-content-end align-items-center">
                                        <form action="upload.php" method="post" enctype="multipart/form-data" style="justify-content:space-between;" class="align-items-center d-flex form justify-content-center">
                                            <input type="file" name="fileToUpload" id="fileToUpload" style="display: inline-block;font-weight: 200;line-height: 1.5;justify-content:space-between;margin-left: 15px;visibility: hidden;width: 90%;
                                        ">
                                            <input class="btn button-outline-primary" type="submit" value="Upload Image" name="submit" id="upload" style="display: inline-block;font-weight: 200;line-height: 1;justify-content:space-between;margin-left: 55px;visibility: hidden;">
                                        </form>
                                        <button id="edit6" class="btn button-outline-primary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Metamask Details starts -->
                        <section id="meta-section">
                            <div class="meta-section"> <?php
                                                        $query = "SELECT * from `metamask_details` WHERE`metamask_details`.`user_uid`='$user_uid' ";
                                                        $result = mysqli_query($link, $query);
                                                        if (mysqli_num_rows($result) > 0) {
                                                        ?>

                                    <div class="row">
                                        <div class="d-flex justify-content-between align-items-center mb-4 col-sm-12">
                                            <div class="security-settings">
                                                <h2 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Account Details
                                                </h2>
                                                <hr style="color: gray; width:29vw;padding-left: 15vw;">
                                                </hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-end">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <small class="mb-4 d-block">You can recieve
                                                donation on these accounts from users.
                                            </small>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="email" class="fw-bold text-capitalize mb-0 text-align=left">Meta
                                                    Address</label>

                                                <?php

                                                            $query = "SELECT * from `metamask_details` WHERE`metamask_details`.`user_uid`='$user_uid' ";
                                                            $result = mysqli_query($link, $query);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                        <input class="form-control" required readonly id="maddress" name="maddress" type="text" value="<?php echo $row['eth_metamask_address'] ?>">
                                                        <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                                <?php
                                                                }
                                                            } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="inputs-1 d-flex  justify-content-end">
                                                <button class="btn button-outline-primary" id='cancel8' style="visibility: hidden;" type='reset' onclick="window.location.replace('user-settings.php')">Cancel</button>
                                                <button class='btn button-outline-primary' data-role="update" id='save8' style="visibility: hidden;" type='button'>Save</button>
                                                <button class='btn button-outline-primary' id="edit8">Edit</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 mt-4">
                                            <div class="form-group">
                                                <label for="email" class="fw-bold text-capitalize mb-0 text-align=left">Neo
                                                    Address</label>
                                                <?php
                                                            $query = "SELECT * from `metamask_details` WHERE`metamask_details`.`user_uid`='$user_uid' ";
                                                            $result = mysqli_query($link, $query);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                        <input class="form-control" required readonly id="naddress" name="maddress" type="text" value="<?php echo $row['neo_address'] ?>">
                                                        <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                                <?php
                                                                }
                                                            } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="inputs-1 d-flex  justify-content-end">
                                                <button class="btn button-outline-primary" id='cancel88' style="visibility: hidden;" type='reset' onclick="window.location.replace('user-settings.php')">Cancel</button>
                                                <button class='btn button-outline-primary' data-role="update" id='save88' style="visibility: hidden;" type='button'>Save</button>
                                                <button class='btn button-outline-primary' id="edit88">Edit</button>
                                            </div>
                                        </div>
                                        <!-- IDriss Account -->
                                        <div class="col-lg-6 col-md-12 col-sm-12 mt-4">
                                            <div class="form-group">
                                                <label for="email" class="fw-bold text-capitalize mb-0 text-align=left">IDriss Username</label>
                                                <?php
                                                            $query = "SELECT * from `metamask_details` WHERE`metamask_details`.`user_uid`='$user_uid' ";
                                                            $result = mysqli_query($link, $query);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                        <input class="form-control" required readonly id="IDrissaddress" name="IDrissaddress" type="text" value="<?php echo $row['Idriss_username'] ?>" placeholder="email | mobile | twitter username">
                                                        <input type="hidden" id="user_uid" value="<?php echo $user_uid ?>">
                                                <?php
                                                                }
                                                            } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="inputs-1 d-flex  justify-content-end gap-2">
                                                <button class="btn button-outline-primary" id='cancel888' style="visibility: hidden;" type='reset' onclick="window.location.replace('user-settings.php')">Cancel</button>
                                                <button class='btn button-outline-primary' data-role="update" id='save888' style="visibility: hidden;" type='button'>Save</button>
                                                <button class='btn button-outline-primary' id="edit888">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-end">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="meta" class="fw-bold text-capitalize mb-0 text-align=left">Account
                                                    Status</label>
                                                <?php
                                                            $query = "SELECT * from `metamask_details` WHERE`metamask_details`.`user_uid`='$user_uid' ";
                                                            $result = mysqli_query($link, $query);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $status_now = $row['meta_status'];
                                                                    if ($row['meta_status'] == "active") {
                                                                        $meta_stat = "<button type=\"button\" class=\"follow_btn btn button-follow fw-bold\" style=\"margin-top:5px;\">Active Account</button> <input type=\"hidden\" name=\"meta_status_check\" id=\"meta_status_check\" value=\"$status_now\" />";
                                                                    } else {
                                                                        $meta_stat = "<button type=\"button\" class=\"follow_btn btn button-follow fw-bold\" style=\"margin-top:5px;\">Inactive Account</button> <input type=\"hidden\" name=\"meta_status_check\" id=\"meta_status_check\" value=\"$status_now\" />";
                                                                    }
                                                ?>
                                                        <br>
                                                        <?php echo $meta_stat;  ?>
                                            </div>
                                        <?php }
                                                            } else { ?>
                                    <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </section>
                        <!-- Metamask Details end -->
                        <!-- Social starts -->
                        <section id="social-section">
                            <div class="social-section mt-5">
                                <div class="row">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="email-settings">
                                            <h2 class="fw-bold text-capitalize mb-0 text-align=left" style="color:var(--text-color);">Social Settings
                                            </h2>
                                            <hr style="color: gray; width:29vw;padding-left: 15vw;">
                                            </hr>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Twitter
                                            <p></p>
                                            <div class="form-group mb-3">
                                                <input class="form-control" type="text" readonly id="social-twitter" name="twitter_url" placeholder="Enter Twitter full account url" required value="<?php echo $twitter_url ?>">
                                            </div>
                                        </h5>
                                        <div class="d-flex justify-content-between"></div>
                                        <div class="inputs d-flex justify-content-between align-items-center mt-4 gap-2">
                                            <button class="btn button-outline-primary" id='cancel-twitter' style="visibility: hidden;" type='reset' onclick="window.location.replace('user-settings.php')">Cancel</button>
                                            <button class='btn button-outline-primary' id='save-twitter' style="visibility: hidden;" type='submit'>Save</button>

                                            <button class='btn button-outline-primary' id="edit-twitter">Edit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Instagram
                                            <p></p>
                                            <div class="form-group mb-3">
                                                <input class="form-control" type="text" readonly id="social-instagram" name="instagram_url" placeholder="Enter Instagram full account url" required value="<?php echo $instagram_url ?>">
                                            </div>
                                        </h5>
                                        <div class="d-flex justify-content-between"></div>
                                        <div class="inputs d-flex justify-content-between align-items-center mt-4 gap-2">
                                            <button class="btn button-outline-primary" id='cancel-instagram' style="visibility: hidden;" type='reset' onclick="window.location.replace('user-settings.php')">Cancel</button>
                                            <button class='btn button-outline-primary' id='save-instagram' style="visibility: hidden;" type='submit'>Save</button>

                                            <button class='btn button-outline-primary' id="edit-instagram">Edit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">LinkedIn
                                            <p></p>
                                            <div class="form-group mb-3">
                                                <input class="form-control" type="text" readonly id="social-linkedin" name="linkedin_url" placeholder="Enter Linkedin full account url" required value="<?php echo $linkedin_url ?>">
                                            </div>
                                        </h5>
                                        <div class="d-flex justify-content-between"></div>
                                        <div class="inputs d-flex justify-content-between align-items-center mt-4 gap-2">
                                            <button class="btn button-outline-primary" id='cancel-linkedin' style="visibility: hidden;" type='reset' onclick="window.location.replace('user-settings.php')">Cancel</button>
                                            <button class='btn button-outline-primary' id='save-linkedin' style="visibility: hidden;" type='submit'>Save</button>

                                            <button class='btn button-outline-primary' id="edit-linkedin">Edit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Facebook
                                            <p></p>
                                            <div class="form-group mb-3">
                                                <input class="form-control" type="text" readonly id="social-facebook" name="facebook_url" placeholder="Enter Facebook full account url" required value="<?php echo $facebook_url ?>">
                                            </div>
                                        </h5>
                                        <div class="d-flex justify-content-between"></div>
                                        <div class="inputs d-flex justify-content-between align-items-center mt-4 gap-2">
                                            <button class="btn button-outline-primary" id='cancel-facebook' style="visibility: hidden;" type='reset' onclick="window.location.replace('user-settings.php')">Cancel</button>
                                            <button class='btn button-outline-primary' id='save-facebook' style="visibility: hidden;" type='submit'>Save</button>

                                            <button class='btn button-outline-primary' id="edit-facebook">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Social Ends -->
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
    <script>
        $('.nav-link').click(function() {
            $('.nav-link').hover('');
        });

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
    </script>
    <!-- JQuery for edit options -->
    <script>
        $(document).ready(function() {
            $('#edit1').click(function() {
                $('#name').focus($('#name').css({
                    'border': '1px solid #7259B5',

                }));
                $('#name').prop("readonly", false)
            });
            $("#edit1").click(function() {
                $(this).hide();
                var t = $('#name').html();
                $('#name').val(t);
                $('#name').show();
            });

            $("#edit1").blur(function() {

                $(this).hide();
                var t = $('#name').val();
                $('#name').html(t);
                $('#name').show();

            });
            $('#edit1').click(function() {
                var edit = document.getElementById("edit1");
                var save = document.getElementById("submitname");
                var cancel = document.getElementById("cancel");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });
        $(document).ready(function() {
            $('#edit2').click(function() {
                $('#Bio').focus($('#Bio').css({
                    'border': '1px solid #7259B5',

                }));
                $('#Bio').prop("readonly", false)
            });
            $("#edit2").click(function() {
                $(this).hide();
                var t = $('#Bio').html();
                $('#Bio').val(t);
                $('#Bio').show();
            });

            $("#edit2").blur(function() {

                $(this).hide();
                var t = $('#Bio').val();
                $('#Bio').html(t);
                $('#Bio').show();

            });
            $('#edit2').click(function() {

                var edit = document.getElementById("edit2");
                var save = document.getElementById("save2");
                var cancel = document.getElementById("cancel2");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });


        });

        $(document).ready(function() {
            $('#edit5').click(function() {
                $('#email').focus($('#email').css({
                    'border': '1px solid #7259B5',

                }));
                $('#email').prop("readonly", false)
            });
            $("#edit5").click(function() {
                $(this).hide();
                var t = $('#email').html();
                $('#email').val(t);
                $('#email').show();
            });

            $("#edit5").blur(function() {

                $(this).hide();
                var t = $('#email').val();
                $('#email').html(t);
                $('#email').show();

            });
            $('#edit5').click(function() {

                var edit = document.getElementById("edit5");
                var save = document.getElementById("save5");
                var cancel = document.getElementById("cancel5");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });

        $(document).ready(function() {
            $('#edit3').click(function() {
                $('#Username').focus($('#Username').css({
                    'border': '1px solid #7259B5',

                }));
                $('#Username').prop("readonly", false)
            });
            $("#edit3").click(function() {
                $(this).hide();
                var t = $('#Username').html();
                $('#Username').val(t);
                $('#Username').show();
            });

            $("#edit3").blur(function() {

                $(this).hide();
                var t = $('#Username').val();
                $('#Username').html(t);
                $('#Username').show();

            });
            $('#edit3').click(function() {

                var edit = document.getElementById("edit3");
                var save = document.getElementById("save3");
                var cancel = document.getElementById("cancel3");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });


        });

        $(document).ready(function() {
            $('#edit4').click(function() {
                $('#Url').focus($('#Url').css({
                    'border': '1px solid #7259B5',

                }));
                $('#Url').prop("readonly", false)
            });
            $("#edit4").click(function() {
                $(this).hide();
                var t = $('#Url').html();
                $('#Url').val(t);
                $('#Url').show();
            });

            $("#edit4").blur(function() {

                $(this).hide();
                var t = $('#Url').val();
                $('#Url').html(t);
                $('#Url').show();

            });
            $('#edit4').click(function() {
                var edit = document.getElementById("edit4");
                var save = document.getElementById("save4");
                var cancel = document.getElementById("cancel4");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });


        });
        $(document).ready(function() {
            $('#edit6').click(function() {
                $('#fileToUpload').focus($('#fileToUpload').css({
                    'border': '1px solid #7259B5',

                }));

            });
            $("#edit6").click(function() {
                $(this).hide();
                var t = $('#fileToUpload').html();
                $('#fileToUpload').val(t);
                $('#fileToUpload').show();
            });

            $("#edit6").blur(function() {

                $(this).hide();
                var t = $('#fileToUpload').val();
                $('#fileToUpload').html(t);
                $('#fileToUpload').show();

            });
            $('#edit6').click(function() {

                var edit = document.getElementById("edit6");
                var save = document.getElementById("fileToUpload");
                var cancel = document.getElementById("upload");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });
        $(document).ready(function() {
            $('#edit8').click(function() {
                $('#maddress').focus($('#maddress').css({
                    'border': '1px solid #7259B5',

                }));
                $('#maddress').prop("readonly", false)
            });
            $("#edit8").click(function() {
                $(this).hide();
                var t = $('#maddress').html();
                $('#maddress').val(t);
                $('#maddress').show();
            });

            $("#edit8").blur(function() {

                $(this).hide();
                var t = $('#maddress').val();
                $('#maddress').html(t);
                $('#maddress').show();

            });
            $('#edit8').click(function() {
                var edit = document.getElementById("edit8");
                var save = document.getElementById("save8");
                var cancel = document.getElementById("cancel8");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });

        $(document).ready(function() {
            $('#edit88').click(function() {
                $('#naddress').focus($('#naddress').css({
                    'border': '1px solid #7259B5',

                }));
                $('#naddress').prop("readonly", false)
            });
            $("#edit88").click(function() {
                $(this).hide();
                var t = $('#naddress').html();
                $('#naddress').val(t);
                $('#naddress').show();
            });

            $("#edit88").blur(function() {

                $(this).hide();
                var t = $('#naddress').val();
                $('#naddress').html(t);
                $('#naddress').show();

            });
            $('#edit88').click(function() {
                var edit = document.getElementById("edit88");
                var save = document.getElementById("save88");
                var cancel = document.getElementById("cancel88");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });

            $('#edit888').click(function() {
                $('#IDrissaddress').focus($('#IDrissaddress').css({
                    'border': '1px solid #7259B5',

                }));
                $('#IDrissaddress').prop("readonly", false)
            });
            $("#edit888").click(function() {
                $(this).hide();
                var t = $('#IDrissaddress').html();
                $('#IDrissaddress').val(t);
                $('#IDrissaddress').show();
            });

            $("#edit888").blur(function() {

                $(this).hide();
                var t = $('#IDrissaddress').val();
                $('#IDrissaddress').html(t);
                $('#IDrissaddress').show();

            });
            $('#edit888').click(function() {
                var edit = document.getElementById("edit888");
                var save = document.getElementById("save888");
                var cancel = document.getElementById("cancel888");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });


        $(document).ready(function() {
            $('#edit-twitter').click(function() {
                $('#social-twitter').focus($('#social-twitter').css({
                    'border': '1px solid #7259B5',

                }));
                $('#social-twitter').prop("readonly", false)
            });
            $("#edit-twitter").click(function() {
                $(this).hide();
                var t = $('#social-twitter').html();
                $('#social-twitter').val(t);
                $('#social-twitter').show();
            });

            $("#edit-twitter").blur(function() {

                $(this).hide();
                var t = $('#social-twitter').val();
                $('#social-twitter').html(t);
                $('#social-twitter').show();

            });
            $('#edit-twitter').click(function() {
                var edit = document.getElementById("edit-twitter");
                var save = document.getElementById("save-twitter");
                var cancel = document.getElementById("cancel-twitter");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });

        $(document).ready(function() {
            $('#edit-instagram').click(function() {
                $('#social-instagram').focus($('#social-instagram').css({
                    'border': '1px solid #7259B5',

                }));
                $('#social-instagram').prop("readonly", false)
            });
            $("#edit-instagram").click(function() {
                $(this).hide();
                var t = $('#social-instagram').html();
                $('#social-instagram').val(t);
                $('#social-instagram').show();
            });

            $("#edit-instagram").blur(function() {

                $(this).hide();
                var t = $('#social-instagram').val();
                $('#social-instagram').html(t);
                $('#social-instagram').show();

            });
            $('#edit-instagram').click(function() {
                var edit = document.getElementById("edit-instagram");
                var save = document.getElementById("save-instagram");
                var cancel = document.getElementById("cancel-instagram");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });

        $(document).ready(function() {
            $('#edit-linkedin').click(function() {
                $('#social-linkedin').focus($('#social-linkedin').css({
                    'border': '1px solid #7259B5',

                }));
                $('#social-linkedin').prop("readonly", false)
            });
            $("#edit-linkedin").click(function() {
                $(this).hide();
                var t = $('#social-linkedin').html();
                $('#social-linkedin').val(t);
                $('#social-linkedin').show();
            });

            $("#edit-linkedin").blur(function() {

                $(this).hide();
                var t = $('#social-linkedin').val();
                $('#social-linkedin').html(t);
                $('#social-linkedin').show();

            });
            $('#edit-linkedin').click(function() {
                var edit = document.getElementById("edit-linkedin");
                var save = document.getElementById("save-linkedin");
                var cancel = document.getElementById("cancel-linkedin");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });

        $(document).ready(function() {
            $('#edit-facebook').click(function() {
                $('#social-facebook').focus($('#social-facebook').css({
                    'border': '1px solid #7259B5',

                }));
                $('#social-facebook').prop("readonly", false)
            });
            $("#edit-facebook").click(function() {
                $(this).hide();
                var t = $('#social-facebook').html();
                $('#social-facebook').val(t);
                $('#social-facebook').show();
            });

            $("#edit-facebook").blur(function() {

                $(this).hide();
                var t = $('#social-facebook').val();
                $('#social-facebook').html(t);
                $('#social-facebook').show();

            });
            $('#edit-facebook').click(function() {
                var edit = document.getElementById("edit-facebook");
                var save = document.getElementById("save-facebook");
                var cancel = document.getElementById("cancel-facebook");
                save.style.visibility = "visible";
                cancel.style.visibility = "visible";
            });
        });

        $(document).ready(function() {
            $('.form-check-input').click(function() {
                $('#meta').focus($('#meta').css({
                    'border': '1px solid #7259B5',

                }));
                $('#meta').prop("readonly", false)
            });
        });
    </script>
    <!-- Jquery for edit ends -->

    <!-- Jquery for cancel starts -->
    <script>
        $('#cancel').click(function() {
            $(this).hide();
            $(this).parent().prev().find('#edit1').show();
            $(this).parent().prev().find('#submitname').hide();
            $(this).prev().hide();
            $(this).prev().prev().show();
            $(submitname).hide();
            $('#edit1').show();
            $(name).val('');

        });
    </script>

    <script>
        $(document).on('click', '#swch', function() {
            var user_uid = '<?php echo $user_uid ?>';
            var metamask_address = document.getElementById("metamask");

            $.ajax({
                type: 'POST',
                url: 'php/changestatusmeta.php',
                data: {
                    'user_uid': user_uid,
                    'metamask_address': metamask_address
                },
                success: function(data) {
                    window.location.reload();
                }
            });
        });

        $(document).on('click', '#switch2', function() {

            event.preventDefault();
            var error = "";
            var formData = new FormData();

            if ($('#metamask').val() == "") {
                alert("Warning", "Please enter all fields", "warning");
                error = error + 'metamask_address';
            } else {

                formData.append('metamask_address', $('#metamask').val());
            }
            formData.append('user_uid', $('#user_uid').val());
            console.log(formData);
            $.ajax({
                url: "php/changestatusmeta.php",
                type: "POST",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,

                success: function(data) {
                    window.location.reload();
                }
            });
        });
        $(document).ready(function() {
            $('.form-check-input').click(function() {
                $('#meta').focus($('#meta').css({
                    'border': '1px solid #7259B5',

                }));
                $('#meta').prop("readonly", true)
            });
        });

        $(document).ready(function() {

            $('.form-check-input').click(function() {

                var view = document.getElementById("meta");
                view.style.visibility = "visible";
                if (view.style.visibility == "visible") {
                    $('.form-check-input').click(function() {

                        var view = document.getElementById("meta");
                        view.style.visibility = "hidden";

                    });

                }

            });
        });
        $(document).ready(function() {

            $('.form-check-input').click(function() {
                var cnt = 0;

                cnt = parseInt(cnt) + parseInt(1);
                if (cnt == 2) {
                    window.replace.location('user-settings.php');
                }

            });
        });
        //         $(document).ready(function() {
        //             var view = document.getElementById("meta");
        //             if(view.style.visibility=="hidden"){
        //             $('.form-check-input').click(function() {
        //         var view = document.getElementById("meta");
        //         view.style.visibility="visible";

        //     });

        // } 
        //     });


        // });
    </script>
    <!-- Jquery for edit ends -->

    <!-- Jquery for cancel starts -->
    <script>
        $('#cancel').click(function() {
            window.location.replace('user-settings.php');

        });
    </script>

    <!-- Jquery for cancel ends -->

    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#submitname').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#name').val() == "") {
                    sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'name';
                } else {

                    formData.append('name', $('#name').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Name Updated");

                                var save = document.getElementById("submitname");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel");
                                cancel.style.visibility = "hidden";
                                $('#name').prop("readonly", true);
                                $('#name').focus($('#name').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');

                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");
                                // window.location.replace('user-settings.php');
                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr["success"]("Error");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save2').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#Bio').val() == "") {
                    alert("Warning", "Please enter all fields", "warning");
                    error = error + 'Bio';
                } else {

                    formData.append('Bio', $('#Bio').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Bio Updated");
                                var edit = document.getElementById("edit2");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save2");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel2");
                                cancel.style.visibility = "hidden";
                                $('#Bio').prop("readonly", true);
                                $('#Bio').focus($('#Bio').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr.error("Error");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save3').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#Username').val() == "") {
                    alert("Please enter all fields");
                    error = error + 'Username';
                } else {

                    formData.append('Username', $('#Username').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(data) {
                            if (data.status == 201) {
                                var edit = document.getElementById("edit3");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save3");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel3");
                                cancel.style.visibility = "hidden";
                                $('#Username').prop("readonly", true);
                                $('#Username').focus($('#Username').css({
                                    'border': 'none',
                                }));
                                toastr["success"]("Username Updated");
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {
                                toastr["success"]("No changes made");
                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr.error("Error");
                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save8').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#maddress').val() == "") {
                    alert("Please enter all fields");
                    error = error + 'maddress';
                } else {

                    formData.append('maddress', $('#maddress').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/updatemetaaddress.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Address Updated");
                                var edit = document.getElementById("edit8");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save8");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel8");
                                cancel.style.visibility = "hidden";
                                $('#maddress').prop("readonly", true);
                                $('#maddress').focus($('#maddress').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 801) {
                                console.log(data.error);
                                toastr.error("Error");
                                alert("Status is inactive");

                            }
                        }
                    });
                } else {

                }
            });

            $('#save88').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#naddress').val() == "") {
                    alert("Please enter all fields");
                    error = error + 'naddress';
                } else {

                    formData.append('naddress', $('#naddress').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/updatemetaaddress.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Address Updated");
                                var edit = document.getElementById("edit8");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save8");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel8");
                                cancel.style.visibility = "hidden";
                                $('#naddress').prop("readonly", true);
                                $('#naddress').focus($('#naddress').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 801) {
                                console.log(data.error);
                                toastr.error("Error");
                                alert("Status is inactive");

                            }
                        }
                    });
                } else {

                }
            });
            $('#save888').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#IDrissaddress').val() == "") {
                    alert("Please enter all fields");
                    error = error + 'IDrissaddress';
                } else {

                    formData.append('IDrissaddress', $('#IDrissaddress').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/updatemetaaddress.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Address Updated");
                                var edit = document.getElementById("edit888");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save888");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel888");
                                cancel.style.visibility = "hidden";
                                $('#IDrissaddress').prop("readonly", true);
                                $('#IDrissaddress').focus($('#IDrissaddress').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 801) {
                                console.log(data.error);
                                toastr.error("Error");
                                alert("Status is inactive");

                            }
                        }
                    });
                } else {

                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save8').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#maddress').val() == "") {
                    alert("Please enter all fields");
                    error = error + 'maddress';
                } else {

                    formData.append('maddress', $('#maddress').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/updatemetaaddress.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Address Updated");
                                var edit = document.getElementById("edit8");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save8");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel8");
                                cancel.style.visibility = "hidden";
                                $('#maddress').prop("readonly", true);
                                $('#maddress').focus($('#maddress').css({
                                    'border': 'none',

                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 801) {
                                console.log(data.error);
                                toastr.error("Error");
                                alert("Status is inactive");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save9').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();

                if ($('#newmaddress').val() == "") {
                    alert("Please enter all fields");
                    error = error + 'newmaddress';
                } else {

                    formData.append('newmaddress', $('#newmaddress').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/addmetaaddress.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Address Updated");
                                var edit = document.getElementById("edit9");
                                edit.style.visibility = "visible";
                                var save = document.getElementById("save9");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel9");
                                cancel.style.visibility = "hidden";
                                $('#newmaddress').prop("readonly", true);
                                $('#newmaddress').focus($('#newmaddress').css({
                                    'border': 'none',

                                }));
                                window.location.reload();
                            } else if (data.status == 501) {

                                toastr["success"]("No changes made");

                            } else if (data.status == 801) {
                                console.log(data.error);
                                toastr.error("Error");
                                alert("Status is inactive");

                            }
                        }
                    });
                } else {

                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#save5').on('click', function(event) {
                event.preventDefault();
                var error = "";
                var formData = new FormData();
                if ($('#email').val() == "") {
                    sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'username';
                } else {
                    formData.append('username', $('#email').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {
                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {
                                toastr["success"]("Name Updated");
                                var save = document.getElementById("submitname");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel");
                                cancel.style.visibility = "hidden";
                                $('#email').prop("readonly", true);
                                $('#email').focus($('#email').css({
                                    'border': 'none',
                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {
                                toastr["success"]("No changes made");
                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr["success"]("Error");

                            }
                        }
                    });
                } else {

                }
            });
        });
    </script>

    <script>
        //social media setting start
        if ($('#meta_status_check').val()) {
            var status_value = $('#meta_status_check').val();
            if (status_value === 'active') {
                $('#switch2').prop('checked', true);
            } else {
                $('#switch2').prop('checked', false);
            }
        }
        $(document).ready(function() {
            /* --------------------------------- twitter -------------------------------- */
            $('#save-twitter').on('click', function(event) {
                event.preventDefault();
                var error = "";
                var formData = new FormData();
                if ($('#social-twitter').val() == "") {
                    sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'social-twitter';
                } else {
                    formData.append('social-twitter', $('#social-twitter').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {
                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Name Updated");

                                var save = document.getElementById("submitname");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel");
                                cancel.style.visibility = "hidden";
                                $('#social-twitter').prop("readonly", true);
                                $('#social-twitter').focus($('#social-twitter').css({
                                    'border': 'none',
                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {
                                toastr["success"]("No changes made");
                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr["success"]("Error");
                            }
                        }
                    });
                }
            });

            /* -------------------------------- instagram ------------------------------- */
            $('#save-instagram').on('click', function(event) {
                event.preventDefault();
                var error = "";
                var formData = new FormData();
                if ($('#social-instagram').val() == "") {
                    sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'social-instagram';
                } else {
                    formData.append('social-instagram', $('#social-instagram').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {
                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {
                                toastr["success"]("Name Updated");
                                var save = document.getElementById("submitname");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel");
                                cancel.style.visibility = "hidden";
                                $('#social-instagram').prop("readonly", true);
                                $('#social-instagram').focus($('#social-instagram').css({
                                    'border': 'none',
                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {
                                toastr["success"]("No changes made");
                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr["success"]("Error");
                            }
                        }
                    });
                }
            });
            /* -------------------------------- linkedin -------------------------------- */
            $('#save-linkedin').on('click', function(event) {
                event.preventDefault();
                var error = "";
                var formData = new FormData();
                if ($('#social-linkedin').val() == "") {
                    sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'social-linkedin';
                } else {
                    formData.append('social-linkedin', $('#social-linkedin').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {
                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Name Updated");

                                var save = document.getElementById("submitname");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel");
                                cancel.style.visibility = "hidden";
                                $('#social-linkedin').prop("readonly", true);
                                $('#social-linkedin').focus($('#social-linkedin').css({
                                    'border': 'none',
                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {
                                toastr["success"]("No changes made");
                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr["success"]("Error");
                            }
                        }
                    });
                }
            });
            /* -------------------------------- facebook -------------------------------- */
            $('#save-facebook').on('click', function(event) {
                event.preventDefault();
                var error = "";
                var formData = new FormData();
                if ($('#social-facebook').val() == "") {
                    sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'social-facebook';
                } else {
                    formData.append('social-facebook', $('#social-facebook').val());
                }
                formData.append('user_uid', $('#user_uid').val());
                if (error == "") {
                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Name Updated");

                                var save = document.getElementById("submitname");
                                save.style.visibility = "hidden";
                                var cancel = document.getElementById("cancel");
                                cancel.style.visibility = "hidden";
                                $('#social-facebook').prop("readonly", true);
                                $('#social-facebook').focus($('#social-facebook').css({
                                    'border': 'none',
                                }));
                                window.location.replace('user-settings.php');
                            } else if (data.status == 501) {
                                toastr["success"]("No changes made");
                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr["success"]("Error");
                            }
                        }
                    });
                }
            });
        });

        //social media setting end
    </script>
    <script>
        $(document).ready(function() {
            var slug;
            //Add Category
            $('#deactivate').on('click', function(event) {

                event.preventDefault();
                var error = "";
                var formData = new FormData();
                formData.append('user_uid', $('#user_uid').val());
                formData.append('deactivate', $('#deactivate').val());
                if (error == "") {

                    console.log(formData);
                    $.ajax({
                        url: "php/edit-settings.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                toastr["success"]("Account Deactivated");

                            } else if (data.status == 501) {

                                toastr.warning("No changes made");

                            } else if (data.status == 301) {
                                console.log(data.error);
                                toastr.error("Error");

                            }
                        }
                    });

                } else {

                }
            });

        });
    </script>

    <script>
        var _autosave;
        $(document).ready(function() {
            $('#upload').on('click', function(e) {
                clearInterval(_autosave);
                // var image = $('#images').val();
                var error = "";

                e.preventDefault();
                var formData = new FormData();
                if ($("#fileToUpload").val() == "") {
                    error = error + 'images';
                    toastr["error"]("Upload featured image");
                } else {

                    formData.append('profile', $("#fileToUpload")[0].files[0]);
                }
                formData.append('user_uid', $('#user_uid').val());

                if (error == "") {
                    console.log(formData);
                    $.ajax({

                        url: 'php/edit-settings.php',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function() {
                            toastr["success"]("Picture Updated");
                            window.location.reload();

                        }
                    });
                }
            });
        });
    </script>

</body>

</html>