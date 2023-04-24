<?php
$currentPage = 'followers';
$currentPageSub = 'savepost';
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
                                <li class="breadcrumb-item"><a href="followusers">Followers</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Saved Posts</li>
                        </ol>
                    </nav>
                </div>
                
                <div class="main-wrapper">



                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <h1>All Saved Posts</h1>





                                    <table id="zero-conf" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Saved Post</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $result = mysqli_query($link, "SELECT * FROM `post_list`");
                                           
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id = $row['list_id'];
                                                $userid=$row['user_uid'];
                                                $postid=$row['post_uid'];
                                            $result2 = mysqli_query($link, "SELECT * FROM `user_login` WHERE `user_uid` = '$userid' ");
                                            $row2 = mysqli_fetch_array($result2);
                                            $user=$row2['name'];
                                            
                                            $result3 = mysqli_query($link, "SELECT * FROM `stories` WHERE `post_uid` = '$postid' ");
                                            $row3 = mysqli_fetch_array($result3);
                                            $post=$row3['post_title'];

                                                echo "<input type=\"hidden\" id=\"list_id\" value=\"{$row['list_id']}\">";
                                                       
                                                   echo "<tr><td>".$i."</td><td><a href= \"viewuser.php?id={$row2['id']}\" >$user</a></td><td><a href= \"viewpost.php?id={$row3['post_id']}\" data-toggle= \"tooltip \" data-original-title= \"View \" color=\"inherit\" text-decoration:\"none\">$post</a></td>
                                                   </tr>";
                                                    
                                                       

                                                $i = $i + 1;
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                
                                            <th>ID</th>
                                                <th>User</th>
                                                <th>Saved Post</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
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
        function del(tag_id) {
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
                        url: "php/deletetag.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            tag_id: tag_id
                         },
                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {
                                // if(data.link!=""){
                                window.location.replace("all-tags");
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