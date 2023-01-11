<?php
$currentPage = 'stories';
//$currentPageSub = 'category';
?>
<?php require_once "php/controllerUserData.php"; ?>
<?php
$username = $_SESSION['session_user'];

if ($username != false) {
    $sql = "SELECT * FROM admin_login WHERE username = '$username'";
    $run_Sql = mysqli_query($link, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $name = $fetch_info['name'];
    }
} else {
    header('Location: login.php');
}
?>
<?php require_once "PHP/controllerUserData.php"; ?>
<?php
$username = $_SESSION['session_user'];

if ($username != false) {
    $sql = "SELECT * FROM admin_login WHERE username = '$username'";
    $run_Sql = mysqli_query($link, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $name = $fetch_info['name'];
    }
} else {
    header('Location: login.php');
}
?>    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CMS Admin Dashboard">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>QuadbTech - CMS Admin Dashboard</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="assets/plugins/DataTables/datatables.min.css" rel="stylesheet">
        <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="assets/css/connect.min.css" rel="stylesheet">
        <link href="assets/css/admin4.css" rel="stylesheet">
        <link href="assets/css/dark_theme.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">

        <script src="assets/ckeditor/ckeditor.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .form-control:focus {
                border-color: #2b8fe97d;
                box-shadow: 0 0 0 0.2rem rgb(43 143 233 / 25%);
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

    <body>
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNWHRNG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <!-- left sidebar start-->
            <?php include 'inc/sidebar.php'; ?>
            <!-- left sidebar end-->
            <div class="page-container">
                <div class="page-header">
                    <nav class="navbar navbar-expand">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav">
                            <li class="nav-item small-screens-sidebar-link">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="assets/images/avatars/profile-image-1.png" alt="profile image">
                                </a>
                                <div class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                                    <!-- <a class="dropdown-item" href="#">Calendar<span class="badge badge-pill badge-info float-right">2</span></a>
                                    <a class="dropdown-item" href="#">Settings &amp; Privacy</a>
                                    <a class="dropdown-item" href="#">Switch Account</a>
                                    <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="logout">Log out</a>
                                </div>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">mail</i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">notifications</i></a>
                            </li>-->
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="dark-theme-toggle"><i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a>
                            </li>
                        </ul>
                        <!-- <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Reports</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- <div class="navbar-search">
                            <form>
                                <div class="form-group">
                                    <input type="text" name="search" id="nav-search" placeholder="Search...">
                                </div>
                            </form>
                        </div> -->
                    </nav>
                </div>
                <div class="page-content">
                    <div class="page-info">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="allpost">All Posts</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Post</li>
                            </ol>
                        </nav>
                        
                    </div>
                    <div class="main-wrapper d-flex justify-content-center col-12">
                        <div class="row">
                            <div class="card">
                                <h2 class="d-flex justify-content-center  mb-0 pb-0 pt-4">Add New Post</h2>
                                <div class="card-body pt-3">

                                    <div class="row pt-3">
                                     <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Username</label>
                                                <input type="text" id="user_uid" class="form-control" required="" placeholder="Add usernaname" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Post Title</label>
                                                <input type="text" id="post_title" class="form-control" required="" placeholder="Add post title" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Post Content</label>
                                                <input type="text" id="post_content" class="form-control" required="" placeholder="Add post content" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">featured_image</label> <br>
                                                <input type="file" id="featured-image"style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px" class="dropify" data-height="150" />
                                                   
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Post_tags</label>
                                                <input type="text" id="post_tags" class="form-control" required="" placeholder="Add tags" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Unlisted</label>
                                                <select value="<?php echo $row['name']; ?>" id="unlisted" class="form-control" required="" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                                    <option value="true" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">Yes</option>
                                                        <option value="false" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">No</option>
        </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Pin story</label>
                                                <select value="<?php echo $row['name']; ?>" id="pin_story" class="form-control" required="" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                                    <option value="true" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">Yes</option>
                                                        <option value="false" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">No</option>
        </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Post Status</label>
                                                <select value="<?php echo $row['name']; ?>" id="post_status" class="form-control" required="" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                                    <option value="published" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">active</option>
                                                        <option value="deleted" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">inactive</option>
                                                            </select>

                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Post Slug</label>
                                                <input type="text" id="post_slug" class="form-control" required="" placeholder="Add Slug" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Meta Title</label>
                                                <input type="text" id="meta_title" class="form-control" required="" placeholder="Add meta title" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Meta Description</label>
                                                <textarea  rows="5" id="meta_description" class="form-control" required="" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px"></textarea>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group pt-3 d-flex justify-content-center">
                                        <button class="btn" id="add_post" type="button" style="font-size: 1rem;background-color: #2b8fe9;color: #ffffff;">Add Post</button>

                                    </div>





                                </div>
                            </div>








                        </div>
                    </div>



                    <div class="page-footer ">
                        <div class="row ">
                            <div class="col-md-12 ">
                                <span class="footer-text ">2021 © cms.quadbtech.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-3.4.1.min.js "></script>
    <script src="assets/plugins/bootstrap/popper.min.js "></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js "></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js "></script>
    <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js "></script>
    <script src="assets/plugins/apexcharts/dist/apexcharts.min.js "></script>
    <script src="assets/plugins/blockui/jquery.blockUI.js "></script>
    <script src="assets/plugins/flot/jquery.flot.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.time.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.symbol.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.resize.min.js "></script>
    <script src="assets/plugins/flot/jquery.flot.tooltip.min.js "></script>
    <script src="assets/js/connect.min.js "></script>
    <script src="assets/js/pages/dashboard.js "></script>
    <script src="assets/plugins/DataTables/datatables.min.js"></script>
    <script src="assets/plugins/DataTables/dataTables.select.min.js"></script>
    <script src="assets/sweetalert/sweetalert.min.js"></script>
    <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>

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
            $(document).ready(function() {
                var slug;
                // Jquery datatable function call

                $('#zero-conf').DataTable();

                // Add category 

                $('#add_post').on('click', function(e) {

                    e.preventDefault();
                    var error = "";
                    var formData = new FormData();

                   
                    if ($('#user_uid').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'user_uid';
                    } else {

                        formData.append('user_uid', $('#user_uid').val());
                    }
                    if ($('#post_title').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'post_title';
                    } else {

                        formData.append('post_title', $('#post_title').val());
                    }
                    if ($('#post_content').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'post_content';
                    } else {

                        formData.append('post_content', $('#post_content').val());
                    }
                    if ($("#featured-image").val() == "") {
                    error = error + 'featured image';
                    toastr["error"]("Upload featured image");
                } else {
                    formData.append('featured_image', $("#featured-image")[0].files[0]);
                }
                    if ($('#post_tags').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'post_tags';
                    } else {

                        formData.append('post_tags', $('#post_tags').val());
                    }
                    if ($('#unlisted').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'unlisted';
                    } else {

                        formData.append('unlisted', $('#unlisted').val());
                    }
                    if ($('#pin_story').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'pin_story';
                    } else {

                        formData.append('pin_story', $('#pin_story').val());
                    }
                    if ($('#post_status').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'post_status';
                    } else {

                        formData.append('post_status', $('#post_status').val());
                    }
                    if ($('#post_slug').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'post_slug';
                    } else {

                        formData.append('post_slug', $('#post_slug').val());
                    }
                    if ($('#meta_title').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'meta_title';
                    } else {

                        formData.append('meta_title', $('#meta_title').val());
                    }
                    if ($('#meta_description').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'meta_description';
                    } else {

                        formData.append('meta_description', $('#meta_description').val());
                    }
                    if (error == "") {
                        console.log(formData);
                        $.ajax({
                            url: "php/add-post.php",
                            type: "POST",
                            dataType: "json",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,

                            success: function(data) {
                                console.log(data);
                                if (data.status == 201) {

                                    window.location.replace("allpost");


                                } else if (data.status == 301) {
                                    console.log(data.error);
                                    swal("error");
                                } else if (data.status == 501) {
                                    sweetAlert("Warning", "Please enter correct username", "warning");

                                } 
                            }
                        });
                    } else {

                    }
                });


            });
        </script>
    </body>

    </html>
<?php
//}
?>