<?php
$currentPage = 'posts';
$currentPageSub = 'category';
/* require_once('PHP/link.php');
session_start();
if (!isset($_SESSION['session_user'])) {
    header("location:sign-in");
} else { */
?>

<?php require_once "PHP/controllerUserData.php"; ?>
<?php 
$username = $_SESSION['session_user'];

if($username != false){
    $sql = "SELECT * FROM adminlogin WHERE username = '$username'";
    $run_Sql = mysqli_query($link, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $username_status = $fetch_info['email_status'];
        $code = $fetch_info['OTP'];
        $name = $fetch_info['name'];
        $role = $fetch_info['role'];
        $user_uid = $fetch_info['admin_uuid'];
        if($username_status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: owner-otp.php');
        }
    }
}else{
    header('Location: login.php');
}
?>
    <!DOCTYPE html>
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


        <style>
            .form-control:focus {
                border-color: #2b8fe97d;
                box-shadow: 0 0 0 0.2rem rgb(43 143 233 / 25%);
            }

            .dataTables_length select {
                border-radius: 7px;
                width: 100%;
                padding: 8px 18px;
                font-size: 15px
            }

            input[type=search] {
                border-radius: 7px;
                width: 100%;
                padding: 8px 18px;
                font-size: 15px
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
                                    <span><?php echo ($name); ?></span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
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
                                <li class="breadcrumb-item"><a href="index">CMS</a></li>
                                <li class="breadcrumb-item"><a href="add_category_home">Categories</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                            </ol>
                        </nav>

                    </div>
                    <div class="main-wrapper d-flex justify-content-center col-12">



                        <div class="row">
                            <div class="card">
                                <h2 class="d-flex justify-content-center  mb-0 pb-0 pt-4">Add a category</h2>
                                <div class="card-body pt-3">

                                    <div class="row pt-3">
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <input type="hidden" id="user_uid" class="form-control" value="<?php echo $user_uid; ?>">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Category Name</label>
                                                <input type="text" id="category_name" class="form-control" required="" placeholder="Add the Category name" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                                <input type="hidden" id="category_id" class="form-control" required="">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Category slug</label>

                                                <input type="text " id="category_slug" class="form-control " required="" placeholder="Add the category_slug " style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Category Description</label>
                                                <textarea id="category_description" class="form-control" name="category_description" value="" id="" cols="30" rows="10" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px" placeholder="Enter Category Description"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Extra Description(Optional)</label>
                                                <div id="editor"></div>
                                            </div>
                                        </div>
                                        


                                    </div>
                                    <div class="form-group pt-3 d-flex justify-content-center">
                                        <button class="btn" id="add-category" type="button" style="font-size: 1rem;background-color: #2b8fe9;color: #ffffff;">Add Category</button>

                                    </div>





                                </div>
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
            $(document).ready(function() {
                var slug;
                // Jquery datatable function call

                $('#zero-conf').DataTable();

                //Function to change slug according to the category name

                $("#category_name").keyup(function() {
                    var Text = $(this).val();

                    Text = Text.toLowerCase();
                    Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                    console.log(Text);
                    $("#category_slug").val(Text);
                });

                CKEDITOR.replace('editor', {
                // skin:'moono-dark',
                height: 250,
                // removePlugins: 'about,specialchar,a11yhelp,ckeditor_wiris,maximize,sourcearea,easyimage',
                filebrowserUploadUrl: 'PHP/ck_upload.php',
                filebrowserUploadMethod: 'form'
            });

                // Add category 

                $('#add-category').on('click', function(e) {

                    e.preventDefault();
                    var error = "";
                    var data = CKEDITOR.instances.editor.getData();
                    var formData = new FormData();

                    if ($('#category_name').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'category_name';
                    } else {

                        formData.append('category_name', $('#category_name').val());
                    }
                    if ($('#category_slug').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'category_slug';
                    } else {
                        formData.append('category_slug', $('#category_slug').val());
                    }
                    if ($('#category_description').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'category_description';
                    } else {
                        formData.append('category_description', $('#category_description').val());
                    }

                    formData.append('user_uid', $('#user_uid').val());
                    formData.append('extra_description', data);


                    if (error == "") {
                        console.log(formData);
                        $.ajax({
                            url: "PHP/addCategory.php",
                            type: "POST",
                            dataType: "json",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,

                            success: function(data) {
                                console.log(data);
                                if (data.status == 201) {

                                    window.location.replace("add_category_home");


                                } else if (data.status == 301) {
                                    console.log(data.error);
                                    swal("error");

                                } else if (data.status == 601) {
                                    console.log(data.error);
                                    swal("error");

                                } else if (data.status == 603) {
                                    console.log(data.error);
                                    swal("error");

                                } else {

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