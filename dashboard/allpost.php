<?php
$currentPage = 'stories';
$currentPageSub = 'all-stories';
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
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="allpost">Stories</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Posts</li>
                        </ol>
                    </nav>
                
                <div class="page-options">
                        <a href="addpost" class="btn btn-primary">Add a New Post</a>
                    </div>
                </div>
                <div class="main-wrapper">



                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <h1>All Posts</h1>





                                    <table id="zero-conf" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Post Title</th>
                                                <th>Featured Image</th>
                                                <th>Post Status</th>
                                                <th>Meta Title</th>
                                                <th>Post per Day Views</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $result = mysqli_query($link, "SELECT * FROM `stories` WHERE `post_status`='deleted' OR `post_status`='published' OR `post_status`='editor' ");
                                            $i = 1;
                                            
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id = $row['post_id'];
                                                $uid=$row['post_uid'];
                                                $result2 = mysqli_query($link, "SELECT * FROM `post_views` WHERE `post_uid`='$uid'");
                                                $row2=mysqli_fetch_array($result2);

                                            
                                                echo "<input type=\"hidden\" id=\"id\" value=\"{$row['post_id']}\">";
                                                        $originalDate = $row['created_at'];
                                                        $newDate = date("j-M-Y", strtotime($originalDate));
                                                        if($row['post_status']=="published"){
                                                            $post_status='<span class="badge badge-success">Active</span>';
                                                        }
                                                        else if($row['post_status']=="deleted"){
                                                            $post_status='<span class="badge badge-danger">Inactive</span>';
            
                                                        }
                                                        if($row['post_status']=="published"){
                                                            $block_post="<button type=\"button\" id=\"block\" onClick=\"block('{$row['post_id']}')\" class=\"fas fa-ban  \" style=\"border: none;background-color: transparent;color:#7d7d83\"></button>";
                                                        }
                                                        else{
                                                            $block_post="<button type=\"button\" id=\"unblock\" onClick=\"unblock('{$row['post_id']}')\" class=\"fas fa-key  \" style=\"border: none;background-color: transparent;color:#7d7d83\"></button>";
            
                                                        }
                                                        
                                                        if($row['post_status']=="deleted"){
                                                            echo "<tr> <td>".$row['post_id']."</td><td>".$row['post_title']."</td><td><img readonly src=\"../uploads/featuredImages/<?php echo $row[featured_image]?>\" height=\"100\"> </td><td>".$post_status."</td><td>".$row['meta_title']."</td><td>".$row2['post_per_day_views']."</td><td><a href= \"viewpost.php?id={$row['post_id']}\"   data-toggle= \"tooltip \" data-original-title= \"View \"><i class= \"far fa-eye \" style=\"color:#7d7d83\"></i></a>
                                                            ".$block_post."
                                                            <a href= \"commentbypost.php?id={$row['post_id']}\"   data-toggle= \"tooltip \" data-original-title= \"viewcomment \"><i class= \"far fa-comment \" style=\"color:#7d7d83\"></i></a>
                                                            <button type=\"button\" id=\"delete\" onClick=\"trash('{$row['post_id']}')\" class=\"far fa-trash-alt  \" style=\"border: none;background-color: transparent;color:#7d7d83\"></button>
                                                          </td>
                                                           </tr>";
                                                          
                                                        }
                                                        else{
                                                   echo "<tr> <td>".$row['post_id']."</td><td>".$row['post_title']."</td><td><img readonly src=\"../uploads/featuredImages/<?php echo $row[featured_image]?>\" height=\"100\"></td><td>".$post_status."</td><td>".$row['meta_title']."</td><td>".$row2['post_per_day_views']."</td><td><a href= \"viewpost.php?id={$row['post_id']}\"   data-toggle= \"tooltip \" data-original-title= \"View \"><i class= \"far fa-eye \" style=\"color:#7d7d83\"></i></a>
                                                    ".$block_post."<a href= \"editpost.php?id={$row['post_id']}\"   data-toggle= \"tooltip \" data-original-title= \"Edit \"><i class= \"fas fa-pencil-alt \" style=\"color:#7d7d83\"></i></a>
                                                    <a href= \"commentbypost.php?id={$row['post_id']}\"   data-toggle= \"tooltip \" data-original-title= \"viewcomment \"><i class= \"far fa-comment \" style=\"color:#7d7d83\"></i></a>
                                                            
                                                    <button type=\"button\" id=\"delete\" onClick=\"trash('{$row['post_id']}')\" class=\"far fa-trash-alt  \" style=\"border: none;background-color: transparent;color:#7d7d83\"></button>
                                                  </td></tr>";
                                                  //<a href= \"editpost.php?id={$row['post_id']}\"   data-toggle= \"tooltip \" data-original-title= \"Edit \"><i class= \"fas fa-pencil-alt \" style=\"color:#7d7d83\"></i></a>
                                                        }
                                                    
                                                       

                                                $i = $i + 1;
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>ID</th>
                                                <th>Post Title</th>
                                                <th>Featured Image</th>
                                                <th>Post Status</th>
                                                <th>Meta Title</th>
                                                <th>Post per Day Views</th>
                                                <th class="text-nowrap">Action</th> 
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
        function del(post_id) {
            swal({
                title: "Are you sure?",
                text: "You will send data to Trash",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes,Send it to trash",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        url: "php/deletepost.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            post_id: post_id
                         },
                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {
                                // if(data.link!=""){
                                window.location.replace("allpost");
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
        function trash(post_id) {
            swal({
                title: "Are you sure?",
                text: "You will send your data to Trash",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes,Trash it",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        url: "php/trashpost.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            post_id: post_id
                         },
                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {
                                // if(data.link!=""){
                                window.location.replace("allpost");
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
        function unblock(post_id) {
            swal({
                title: "Are you sure?",
                text: "You will be inactive",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes,Unblock it",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        url: "php/unblockpost.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            post_id: post_id
                         },
                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {
                                // if(data.link!=""){
                                window.location.replace("allpost");
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
        function block(post_id) {
            swal({
                title: "Are you sure?",
                text: "You will active",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes,Block it",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        url: "php/blockpost.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            post_id: post_id
                         },
                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {
                                // if(data.link!=""){
                                window.location.replace("allpost");
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