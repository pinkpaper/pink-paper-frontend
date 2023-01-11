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
?>
<?php
$meta_title = 'Contact Us';
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
    <script src="assets/feather/feather.min.js"></script>


    <!-- stylesheet -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="assets/toastr/toastr.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">


    <!-- Styling for contact us starts -->
    <style type="text/css">
    .container {
        padding-top: 0px;

    }

    .card {
        /* background-color: #F8F8F8; */
        margin-top: 30px;
        padding: 70px;

    }

    .email {
        padding-left: 32px;
        padding-right: 32px;
        padding-bottom: 3vmax;

    }

    .message {
        padding-left: 32px;
        padding-right: 32px;
        padding-bottom: 3vmax;
    }

    #submit_msg {
        margin-left: 3%;
    }

    @media only screen and (max-width: 800px) {
        #submit_msg {
            margin-left: 7%;
        }
    }

    @media only screen and (width:768px) {
        #submit_msg {
            margin-left: 40%;
        }
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

    <div class="container-fluid header-div-profile">
        <div class="container" style="padding-top:50px;">
            <div class="row py-5">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="mb-5" style="margin-top:6rem">
                        <h1 class="display-4 fw-bold mb-2 text-capitalize" style="color:var(--text-color);">Contact Us
                        </h1>



                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="profile-card shadow d-flex flex-column justify-content-center px-3 py-4 text-center"
                    style="width: 100%;">

                    <div class="row">

                        <div class="col-lg-6 col-md-12 col-sm-12"
                            style="padding-left: 32px;padding-right: 32px;padding-bottom: 3vmax;">
                            <div class="form-group" id="title">
                                <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">
                                    First Name</h5>
                                <input type="text" class="form-control form-control-lg story-input" name="fname"
                                    id="first_name" placeholder="First Name" aria-required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12"
                            style="padding-right: 32px;padding-left: 32px;padding-bottom: 3vmax;">
                            <div class="form-group" id="title">
                                <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">
                                    Last Name</h5>
                                <input type="text" class="form-control form-control-lg  story-input" name="lname"
                                    id="last_name" placeholder="Last Name">
                            </div>
                        </div>
                    </div>





                    <div class="row">
                        <div class="email">

                            <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Email
                            </h5>
                            <form> <input type="email"
                                    pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"
                                    class="form-control form-control-lg story-input" name="username" id="email"
                                    placeholder="Email" aria-required value="">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="message">
                            <div class="form-group" id="title">
                                <h5 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">
                                    Message</h5>
                                <textarea class="form-control form-control-lg story-input"
                                    placeholder="Enter Your Message" type="text" name="msg" id="message" aria-required
                                    style="padding-bottom:200px"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group" id="submit-btn">
                            <button type="button" name="submit" class="btn button-primary" id="submit_msg">Send
                                Message</button>
                        </div>


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
    <script src="assets/sweetalert/sweetalert.min.js"></script>
    <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="assets/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>
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


    <script type="text/javascript">
    $(document).ready(function() {

        $('#submit_msg').on('click', function(e) {

            e.preventDefault();
            var error = "";
            var formData = new FormData();

            if ($('#first_name').val() == "") {
                sweetAlert("Warning", "Please enter all fields", "warning");
                error = error + 'first_name';
            } else {

                formData.append('first_name', $('#first_name').val());
            }
            if ($('#last_name').val() == "") {
                sweetAlert("Warning", "Please enter all fields", "warning");
                error = error + 'last_name';
            } else {

                formData.append('last_name', $('#last_name').val());
            }
            if ($('#email').val() == "") {
                sweetAlert("Warning", "Please enter all fields", "warning");
                error = error + 'username';
            } else {

                formData.append('username', $('#email').val());
            }
            if ($('#message').val() == "") {
                sweetAlert("Warning", "Please enter all fields", "warning");
                error = error + 'message';
            } else {

                formData.append('message', $('#message').val());
            }
            if (error == "") {
                console.log(formData);
                $.ajax({
                    url: "php/add-contact-us.php",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,

                    success: function(data) {
                        console.log(data);
                        if (data.status == 201) {

                            swal(" Message Sent");

                        } else {
                            console.log(data.error);
                            swal("error");

                        }
                    }
                });
            } else {

            }
        });


    });
    </script>