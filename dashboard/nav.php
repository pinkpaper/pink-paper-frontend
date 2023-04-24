<?php
$currentPage = 'settings';
$currentPageSub = 'nav-menu';
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
        <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">


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
                                <li class="breadcrumb-item active" aria-current="page">Nav Menu</li>
                            </ol>
                        </nav>

                    </div>
                    <div class="main-wrapper">



                        <div class="row ">
                            <div class="card col-lg-12">
                                <h2 class="d-flex justify-content-center  mb-0 pb-0 pt-4">Nav Menu</h2>
                                <div class="card-body pt-3">
                                    <div id="header-link" class="col-12">
                                        <h4>Nav settings</h4>


                                        <?php


                                        $result = mysqli_query($link, "SELECT * FROM `header-settings`");
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <div class="header-link-next">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12">
                                                        <label class="control-label mt-2" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Nav bar name</label>

                                                        <input type="text " name="nav-name" class="form-control nav-name-control" required="" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px" value="<?php echo ($row['nav-name']) ?>">
                                                    </div>
                                                    <div class="col-lg-8 col-md-12">
                                                        <label class="control-label mt-2" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Nav bar link</label>

                                                        <input type="text " name="nav-link" class="form-control nav-link-control" required="" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px" value="<?php echo ($row['nav-link']) ?>">
                                                    </div>
                                                </div>
                                                

                                                
                                            </div>
                                        <?php
                                        }
                                        ?>




                                    </div>
                                    <div class="btn-group card-body p-0 pl-3 mt-4">
                                        <button class="btn" id="add-link" type="button" style="font-size: 1rem;background-color: #2b8fe9;color: #ffffff;">Add</button>
                                        <button class="btn ml-2" id="delete-link" type="button" style="font-size: 1rem;background-color: #f05154;color: #ffffff;">Delete</button>
                                    </div>









                                    <div class="form-group pt-3 d-flex justify-content-center">
                                        <button class="btn" id="add-settings" type="button" style="font-size: 1rem;background-color: #2b8fe9;color: #ffffff;">Add Navs</button>

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
        <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>


        <script>
            var nav_name = [];
            var nav_link = [];


            $('#add-link').on('click', function(e) {
                e.preventDefault();
                $("#delete-link").show();
                $("#header-link").append(
                    '<div class="header-link-next"><div class="row"><div class="col-lg-4 col-md-12"><label class="control-label mt-2" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Nav bar name</label><input type="text " name="nav-name" class="form-control " required="" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px"></div><div class="col-lg-8 col-md-12"><label class="control-label mt-2" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Nav bar link</label><input type="text " name="nav-link" class="form-control " required="" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px"></div></div></div>'
                );


            });
            $('#delete-link').on('click', function(e) {
                $(".header-link-next").last().remove();
                if ($(".header-link-next")[0]) {
                    $("#delete-link").show();
                } else {
                    $("#delete-link").hide();
                }

            });
            // $("#delete-link").hide();
            $('#add-settings').on('click', function(e) {

                e.preventDefault();
                var error = "";

                var formData = new FormData();

                if ($('.nav-name-control').val() == "") {
                    sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'nav-name';

                } else {
                    $('input[name="nav-name"]').each(function() {

                        nav_name.push(this.value);
                    });

                    formData.append('nav-name', nav_name);
                }
                if ($('.nav-link-control').val() == "") {
                    sweetAlert("Warning", "Please enter all fields", "warning");

                    error = error + 'nav-link';
                } else {
                    $('input[name="nav-link"]').each(function() {

                        nav_link.push(this.value);
                    });

                    formData.append('nav-link', nav_link);
                }
                if (error == "") {
                    console.log(formData);
                    $.ajax({
                        url: "PHP/addnav.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {

                                window.location.reload();

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
        </script>
    </body>

    </html>
<?php


?>