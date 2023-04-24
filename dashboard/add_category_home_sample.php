<?php
$currentPage = 'posts';
$currentPageSub = 'category';
?>


<?php require_once "PHP/controllerUserData.php"; ?>
<?php
$username = $_SESSION['session_user'];

if ($username != false) {
    $sql = "SELECT * FROM adminlogin WHERE username = '$username'";
    $run_Sql = mysqli_query($link, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $username_status = $fetch_info['email_status'];
        
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
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
                        </ol>
                    </nav>
                    <div class="page-options">
                        <?php if ($role == 'admin') {?>
                        <a href="categoryOrderable" class="btn btn-primary">Set Category Orderable</a>
                        <?php }?>
                        <a href="add_category" class="btn btn-primary">Add a New Category</a>
                    </div>
                </div>
                <div class="main-wrapper">



                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive">






                                    <table id="zero-conf" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tag name</th>
                                                <th>Created Date</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

$result = mysqli_query($link, "SELECT * FROM `tags`");
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $category_id = $row['tag_id'];
                                                echo "<input type=\"hidden\" id=\"tag_id\" value=\"{$row['tag_id']}\">";

                                                if ($role == 'admin') {
                                                    echo "<tr><td>{$i}</td><td>{$row['tag_name']}</td><td>{$row['created_at']}</td>";
                                                    if (($row['tag_id']) !== '076c15dc-b095-4847-a5de-9824a4501238') {
                                                        echo "<td>
                                                <a href= \"edit_category.php?id={$row['tag_id']}\"   data-toggle= \"tooltip \" data-original-title= \"Edit \"> <i class= \"fas fa-pencil-alt \" style=\"color:#7d7d83\"></i></a>
                                                <button type=\"button\" id=\"delete\" onClick=\"del('{$row['tag_id']}','{$row['created_at']}')\" class=\"far fa-trash-alt  \" style=\"border: none;background-color: transparent;color:#7d7d83\"></button>
                                               
                                            </td>";
                                                    } else {
                                                        echo "<td style='cursor: not-allowed;'>
                                                <a class='btn disabled p-0 m-0' href= \"#\"   data-toggle= \"tooltip \" data-original-title= \"Edit \"> <i class= \"fas fa-pencil-alt \" style=\"color:#7d7d83\"></i></a>
                                                <button disabled type=\"button\" id=\"delete\"  class=\"far fa-trash-alt  \" style=\"border: none;cursor: not-allowed;background-color: transparent;color:#7d7d83\"></button>
                                               
                                            </td></tr>\n";
                                                    }
                                                } else if ($role == 'author') {
                                                    echo "<tr><td>{$i}</td><td>{$row['tag_name']}</td><td>{$row['created_at']}</td><td>
                                                <a href= \"edit_category.php?id={$row['tag_id']}\"   data-toggle= \"tooltip \" data-original-title= \"Edit \"> <i class= \"fas fa-pencil-alt \" style=\"color:#7d7d83\"></i></a>
                                                <button type=\"button\" id=\"delete\" onClick=\"del('{$row['tag_id']}','{$row['created_at']}')\" class=\"far fa-trash-alt  \" style=\"border: none;background-color: transparent;color:#7d7d83\"></button>
                                               
                                            </td>";
                                                } else if ($role == 'seomanager') {
                                                    echo "<tr><td>{$i}</td><td>{$row['tag_name']}</td><td>{$row['created_at']}</td>";
                                                    /* if (($row['category_id']) !== '076c15dc-b095-4847-a5de-9824a4501238') {
                                                            echo "<td>
                                                <a href= \"edit_category.php?id={$row['category_id']}\"   data-toggle= \"tooltip \" data-original-title= \"Edit \"> <i class= \"fas fa-pencil-alt \" style=\"color:#7d7d83\"></i></a></td>";
                                                        } else {
                                                            echo "<td style='cursor: not-allowed;'>
                                                <a class='btn disabled p-0 m-0' href= \"#\"   data-toggle= \"tooltip \" data-original-title= \"Edit \"> <i class= \"fas fa-pencil-alt \" style=\"color:#7d7d83\"></i></a></td></tr>\n";
                                                        } */
                                                }

                                                $i = $i + 1;
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tag name</th>
                                                <th>Created Date</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>

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
        function del(category_id, category_slug) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to retrieve data",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes,Delete it",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        url: "PHP/deleteCategory.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            category_id: category_id,
                            category_slug: category_slug,
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {
                                // if(data.link!=""){
                                window.location.replace("add_category_home");
                                // }else{
                                //     window.location.replace("/");
                                // }

                            } else if (data.status == 301) {
                                console.log(data.error);
                                swal("error");
                                // $('#contact-success').css('display', 'none');
                                // $('#contact-form').css('display', 'block');
                                // swal('success'); 
                            } else {
                                //     swal("problem with query");
                            }
                        }
                    });


                } else {
                    swal("Cancelled", "Your  file is safe :)", "error");
                }
            });
        }
        $(document).ready(function() {
            var slug;
            $('#zero-conf').DataTable();
            $("#category_name").keyup(function() {
                var Text = $(this).val();

                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                console.log(Text);
                $("#category_slug").val(Text);
            });
            $('#add-category').on('click', function(e) {


                e.preventDefault();
                var error = "";

                var formData = new FormData();

                // var author = $('#author').val();
                // var author_descrip = $('#author_descrip').val();
                // var image =  $('#hero-image').val();



                if ($('#category_name').val() == "") {
                    // sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'category_name';
                } else {

                    formData.append('category_name', $('#category_name').val());
                }
                if ($('#category_slug').val() == "") {
                    // sweetAlert("Warning", "Please enter all fields", "warning");
                    error = error + 'category_slug';
                } else {
                    formData.append('category_slug', $('#category_slug').val());
                }


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
                                // if(data.link!=""){
                                window.location.replace("add_category_home");
                                // }else{
                                //     window.location.replace("/");
                                // }

                            } else if (data.status == 301) {
                                console.log(data.error);
                                swal("error");
                                // $('#contact-success').css('display', 'none');
                                // $('#contact-form').css('display', 'block');
                                // swal('success'); 
                            } else if (data.status == 601) {
                                console.log(data.error);
                                swal("error");
                                // $('#contact-success').css('display', 'none');
                                // $('#contact-form').css('display', 'block');
                                // swal('success'); 
                            } else if (data.status == 603) {
                                console.log(data.error);
                                swal("error");
                                // $('#contact-success').css('display', 'none');
                                // $('#contact-form').css('display', 'block');
                                // swal('success'); 
                            } else {
                                //     swal("problem with query");
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