<?php
$currentPage = 'dashboard';
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
            <!-- page header start-->
            <?php include 'inc/page_header.php'; ?>
            <!-- page header end-->
            <div class="page-content">
                <div class="page-info">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="index">Home</a></li> -->
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            
                                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
                <div class="main-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- start here -->
                                    <h1>Change Password</h1>
                                </div>
                                <?php
                                $result = mysqli_query($link, "SELECT * FROM `admin_login`");
                                        
                                            $row = mysqli_fetch_array($result);
                                            $id = $row['id'];
                                                ?>         
                                      
                                <div class="card-body">
                                        <input class="form-control"id="current" type="password" name="current" placeholder="Current Password" required>
                                        <input type="hidden" id="id" value="<?php echo $id?>">
                                    </div>
                                
                                <div class="card-body">
                                        <input class="form-control" id="password" type="password" name="password" placeholder="Create new password" required>
                                        <input type="hidden" id="id" value="<?php echo $id?>">
                                    </div>
                                    <div class="card-body">
                                        <input class="form-control" id="confirm" type="password" name="confirm" placeholder="Confirm your password" required>
                                        <input type="hidden" id="id" value="<?php echo $id?>">
                                    </div>
                                    
                
                                    <div class="card-body">
                                        <button class="btn btn-primary"  onClick="upp(<?php echo "$id";?>)" name="change-password" value="Change Password">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- page footer start-->
                    <?php include 'inc/page_footer.php'; ?>
                    <!-- page footer end-->

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
        
            
        function upp(id) {


                var error = "";

                var formData = new FormData();




                if ($('#current').val() == "") {
                    // sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'current';
                } else {

                    formData.append('current', $('#current').val());
                }
                if ($('#password').val() == "") {
                    // sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'password';
                } else {
                    formData.append('password', $('#password').val());
                }
                if ($('#confirm').val() == "") {
                    // sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'confirm';
                } else {
                    formData.append('confirm', $('#confirm').val());
                }
                formData.append('id', $('#id').val());

                if (error == "") {
                    console.log(formData);
                    $.ajax({
                        url: "php/updatepass.php",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,

                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {
                                // if(data.link!=""){
                                window.location.replace("index");
                                // }else{
                                //     window.location.replace("/");
                                // }

                            } else if (data.status == 301) {
                                console.log(data.error);
                                swal("error");
                                // $('#contact-success').css('display', 'none');
                                // $('#contact-form').css('display', 'block');
                                // swal('success'); 
                            } else if (data.status == 501) {
                                console.log(data.error);
                                swal("error current password not same");
                                // $('#contact-success').css('display', 'none');
                                // $('#contact-form').css('display', 'block');
                                // swal('success'); 
                            } else if (data.status == 601) {
                                console.log(data.error);
                                swal("error password mismatch");
                                // $('#contact-success').css('display', 'none');
                                // $('#contact-form').css('display', 'block');
                                // swal('success'); 
                            } else {
                                //     swal("problem with query");
                            }
                        }
                    });
                }
            };


        ;
    </script>


</body>

</html>