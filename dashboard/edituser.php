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
$id = $_REQUEST['id'];
$query = "SELECT * from user_login where user_uid ='" . $id . "'";
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
                            <li class="breadcrumb-item"><a href="all-users">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit users</li>
                        </ol>
                    </nav>
                </div>
                <div class="main-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- start here -->
                                    <h1>Edit User</h1>
                                </div>
                                
                            <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">User_Uid</label>
                                                <input type="text" id="user_uid" class="form-control" required="" value="<?php echo $row['user_uid']; ?>" placeholder="Add the UID" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Name</label>
                                                <input type="text" id="name" class="form-control" required="" value="<?php echo $row['name']; ?>" placeholder="Add name" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Username</label>
                                                <input type="text" id="username" class="form-control" required="" value="<?php echo $row['username']; ?>" placeholder="Add the username" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                              
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">E-Mail</label>
                                                <input type="text" id="email" class="form-control" required="" value="<?php echo $row['username']; ?>" placeholder="Add email" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Password</label>
                                                <input type="text" id="password" class="form-control" required="" value="<?php echo $row['password']; ?>" placeholder="Add Password" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                              
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Profile</label>
                                                <input type="file" id="profile" class="dropify" data-height="150" />
                                               
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Bio</label>

                                                
                                                <textarea id="bio" class="form-control" name="bio" value="" id="" cols="30" rows="10" style="padding: 5px;border-radius: 10px;"><?php echo $row['bio']; ?></textarea>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Code</label>
                                                <input type="text" id="code" class="form-control" required="" value="<?php echo $row['code']; ?>" placeholder="Add Code" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                               
                                            </div>
                                        </div><div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Email Status</label>
                                                <input type="text" id="email_status" class="form-control" required="" value="<?php echo $row['email_status']; ?>" placeholder="Add Email Status" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                                
                                            </div>
                                        </div><div class="col-lg-12">
                                            <div class="form-group" id="title">
                                                <label class="control-label" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Account Status</label>
                                                <input type="text" id="account_status" class="form-control" required="" value="<?php echo $row['account_status']; ?>" placeholder="Add Account Status" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px">
                                                
                                            </div>
                                        </div>
                            <div class="form-group pt-3 d-flex justify-content-center">
                                        <button class="btn" id="edit" type="button" style="font-size: 1rem;background-color: #2b8fe9;color: #ffffff;">Edit User</button>

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

                $('#edit').on('click', function(e) {

                    e.preventDefault();
                    var error = "";
                    var formData = new FormData();

                    if ($('#user_uid').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'user_uid';
                    } else {

                        formData.append('user_uid', $('#user_uid').val());
                    }
                    if ($('#name').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'name';
                    } else {

                        formData.append('name', $('#name').val());
                    }
                    if ($('#username').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'username';
                    } else {

                        formData.append('username', $('#username').val());
                    }
                    if ($('#email').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'username';
                    } else {

                        formData.append('username', $('#email').val());
                    }
                    if ($('#password').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'password';
                    } else {

                        formData.append('password', $('#password').val());
                    }
                    if ($("#profile").val() == "") {
                    error = error + 'profile';
                    toastr["error"]("Upload profile image");
                } else {
                    formData.append('profile', $("#profile")[0].files[0]);
                }
                    if ($('#bio').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'bio';
                    } else {

                        formData.append('bio', $('#bio').val());
                    }
                    if ($('#code').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'code';
                    } else {

                        formData.append('code', $('#code').val());
                    }
                    if ($('#email_status').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'email_status';
                    } else {

                        formData.append('email_status', $('#email_status').val());
                    }
                    if ($('#account_status').val() == "") {
                        sweetAlert("Warning", "Please enter all fields", "warning");
                        error = error + 'account_status';
                    } else {

                        formData.append('account_status', $('#account_status').val());
                    }
                   
                    if (error == "") {
                        
                        console.log(formData);
                        $.ajax({
                            url: "php/edit-user.php",
                            type: "POST",
                            dataType: "json",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: formData,

                            success: function(data) {
                                console.log(data);
                                if (data.status == 201) {

                                    window.location.replace("all-users");


                                } else if (data.status == 501) {
                                    
                                    swal("User already exist");

                                } else if (data.status == 301) {
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

</body>

</html>