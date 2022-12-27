<?php
$currentPage = 'settings';
$currentPageSub = 'logo';
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

$query = "SELECT * from `logo`";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
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
        <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
        <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">

        <!-- Theme Styles -->
        <link href="assets/css/connect.min.css" rel="stylesheet">
        <link href="assets/css/admin4.css" rel="stylesheet">
        <link href="assets/css/dark_theme.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">

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
    </head>

    <body>
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
                <!-- page header start-->
                <?php include 'inc/page_header.php'; ?>
                <!-- page header end-->
                <div class="page-content">
                    <div class="page-info">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="">Settings</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Logo</li>
                            </ol>
                        </nav>

                    </div>
                    <div class="main-wrapper d-flex justify-content-center col-12">



                        <div class="row">
                            <div class="card">
                                <h2 class="d-flex justify-content-center  mb-0 pb-0 pt-4">Edit Logo Image</h2>
                                <div class="card-body pt-3">

                                    <div class="row pt-3">

                                        <div class="col-12 p-3">

                                            <h4>Logo image</h4>
                                            <h4 class="card-title">Upload Logo</h4>
                                            <?php
                                            // $old_image = $row['author_profile_image'];

                                            ?>
                                            <input type="hidden" id="id" value="<?php echo ($row['id']); ?>">
                                            <input type="hidden" id="old_image" value="<?php echo ($row['logo_image']); ?>">
                                            <input type="file" id="hero-image" class="dropify" data-default-file="<?php echo $row['logo_image'] ?>" />
                                            <label for="hero-image" id="label-hero-image">Profle Picture of the author will be displayed with the blog</label>




                                        </div>





                                    </div>
                                    <div class="form-group pt-3 d-flex justify-content-center">
                                        <button class="btn" id="updatelogo" type="button" style="font-size: 1rem;background-color: #2b8fe9;color: #ffffff;">Update Logo</button>

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
        <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
        <script src="assets/sweetalert/sweetalert.min.js"></script>
        <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>

        <script>
            $(document).ready(function() {
                $('.dropify').dropify();
                $('#zero-conf').DataTable();

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





                $('#updatelogo').on('click', function(e) {

                    e.preventDefault();
                    var error = "";
                    var formData = new FormData();
                    if ($('#hero-image').val() == "") {
                        // sweetAlert("Warning", "Please enter all fields", "warning");
                    } else {

                        formData.append('hero-image', $("#hero-image")[0].files[0]);
                    }

                    if (error == "") {

                        formData.append('id', $('#id').val());

                        console.log(formData);

                        $.ajax({
                            url: "PHP/editlogo.php",
                            type: "POST",
                            dataType: "json",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,

                            success: function(data) {

                                if (data.status == 201) {

                                    // window.location.replace("viewlogo");


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

?>