<?php
$currentPage = 'comments';
//$currentPageSub = '';
require_once('PHP/link.php');

$id = $_REQUEST['id'];
$query = "SELECT * from post_comments where comment_id ='" . $id . "'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$cmuid=$row['comment_uid'];
//$query22 = "SELECT * from comments where article_id ='" . $row['article_id'] . "'";
//$result22 = mysqli_query($link, $query22);
//$row22 = mysqli_fetch_array($result22);
session_start();
if (!isset($_SESSION['session_user'])) {
    header("location:login.php");
} else {
    if(isset($_GET['page'])){
        $page=$_GET['page']; 
    }else{
        $page=1;
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
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
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

    .reply {
        margin-left: 120px;
    }

    @media (max-width: 991px) {
        .reply {
            margin-left: 13px;
        }
    }

    #reply_row {
        display: block;
    }

    #comment_row {
        display: none;
    }

    .pagination li a {
        margin-left: 5px;
        border-radius: 7px;
        transition: .3s ease-in-out;
    }

    .pagination li a:hover {
        background: #2B8FE9;
        color: #fff;

    }

    .pagination .active {
        background: #2B8FE9 !important;
        color: #fff !important;
        border-radius: 7px;
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item small-screens-sidebar-link">
                            <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <li class="breadcrumb-item"><a href="comments">All comments</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Comment</li>
                        </ol>
                    </nav>
                </div>
                <div class="main-wrapper">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-12">
                                    <?php
                                        $puid=$row['post_uid'];     
                                            $query0 = "SELECT * from stories where post_uid='".$puid."'";
                                            $result0 = mysqli_query($link, $query0);
                                            $row0 = mysqli_fetch_array($result0);
                                    ?>
                                    <h4><strong>Post Title : </strong><?php echo $row0['post_title']?></h4>
                                    <h6 class="my-2"><strong>Upload Date : </strong>
                                    <?php 
                                        $date_var2 = date_create($row['created_at']);
                                        $time = (date_format($date_var2,"M d, Y h:ia"));
                                        echo $time; ?>
                                        
                                  </h6>
                                </div>
                            </div>
                            <div class="comment-info">
                                <h3>Main comment</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="collapse" id="collapseAdd">
                                            <div class="mb-4 p-4"
                                                style="border:2px solid #ddd;border-radius:10px;">
                                                <h3 class="d-flex justify-content-start mb-0 pb-0">Write a Comment</h3>
                                                <div class="row pt-3">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="control-label"
                                                                style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Comment</label>
                                                            <input type="hidden" id="comment_id"
                                                                value="<?php echo ($id); ?> ">
                                                            <textarea class="form-control" id="comment"
                                                                style="border-radius: 7px;font-size:15px;"
                                                                spellcheck="false"
                                                                placeholder="Write Your Comments Here..."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group pt-3 justify-content-center d-flex">
                                                    <button class="btn px-5 mx-3 bg-success" id="edit-comment" type="button"
                                                        style="font-size: 1rem;color: #ffffff;">Add</button>
                                                    <!-- <button class="btn px-5 bg-primary" type="button"
                                                        style="font-size: 1rem;color: #ffffff;"
                                                        onClick="javascript:history.go(-1)">Cancel</button> -->
                                                        <button class="btn px-5 bg-primary" type="button"
                                                        style="font-size: 1rem;color: #ffffff;" data-toggle="collapse" href="#collapseAdd"
                                                        >Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $comment_id = $row['comment_id'];
                                    $query33 = "SELECT * from post_comments where comment_id ='$comment_id'";
                    
                                    $result33 = mysqli_query($link, $query33); 
                                        while($row33 = mysqli_fetch_array($result33)){
                                            $useruid=$row33['user_uid'];
                                            $query7="SELECT * from user_login where user_uid='".$useruid."'";
                                            $re=mysqli_query($link, $query7);
                                            $row7=mysqli_fetch_array($re);

                                    ?>
                                <div class="row">
                                    <div class="col-9">
                                        <input type="hidden" id="comment_id"
                                            value="<?php echo ($row33['comment_id']); ?> ">
                                        <p class="mt-2  mr-3 pb-1 d-inline"
                                            style="font-weight: bold;font-size:17px;color:#2B8FE9;">
                                            <?php echo ($row7['name']) ?></p>
                                        <p class="date d-inline" style="font-weight: bold;font-size:12px;">
                                        <?php 
                                                $date_var2 = date_create($row33['created_at']);
                                                $time = (date_format($date_var2,"M d, Y h:ia"));
                                                echo $time; ?>
                                            </p>
                                        <div class="form-control mt-3 p-2" id="main-comment"
                                            style="border-radius: 7px;font-size:15px; background:#EAFAF1;border-color:#ABEBC6;"
                                            disabled><?php echo ($row33['comment']); ?></div>
                                    </div>
                                    <div class="col-2 mb-2 d-flex align-items-end">
                                        <div class="btn-group">
                                            <a href="replycomment.php?id=<?php echo ($row33['comment_uid']); ?>" class="fas fa-reply px-2"
                                                style="color:#7d7d83"></a>
                                            <a href="editcomment.php?id=<?php echo ($row33['comment_uid']); ?>"
                                                class="fas fa-pencil-alt px-2" style="color:#7d7d83"></a>
                                            <button class="far fa-trash-alt  edit-sub-comment px-2"
                                                onclick="delComment('<?php echo ($row33['comment_id']); ?>')"
                                                style="border: none;background-color: transparent;color:#7d7d83"></button>
                                        </div>
                                    </div>
                                    <!-- <div class="col-2 btn-group">
                                            <button class="btn mt-3" id="edit-comment" type="button" style="font-size: 1rem;background-color: #2b8fe9;color: #ffffff;">Edit Comment</button>
                                        </div>                                        -->
                                </div>
                                <div class="reply pt-4">

                                    <?php
                                        $comment_uid = $row33['comment_uid'];
                                        $limit=10;
                                        $offset=($page-1)*$limit;
                                        $query2 = "SELECT * from post_subcomments where comment_uid ='$comment_uid' ORDER BY created_at LIMIT {$offset},{$limit}";
                        
                                        $result2= mysqli_query($link, $query2); 
                                       
                                        if (mysqli_num_rows($result2) != 0) {

                                        ?>
                                    <h5 class="pt-2">subcomments</h5> 
                                    <hr>
                                    <?php
                                            while ($row2 = mysqli_fetch_array($result2)) {
                                                $useruid=$row33['user_uid'];
                                            $query8="SELECT * from user_login where user_uid='".$useruid."'";
                                            $ree=mysqli_query($link, $query8);
                                            $row8=mysqli_fetch_array($ree);

                                            ?>
                                    <form class="comment-form">
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <input type="hidden" name="subcomment_id"
                                                    value="<?php echo ($row2['subcomment_id']); ?>">

                                                <p class="mt-2 d-inline mr-3"
                                                    style="font-weight: bold;font-size:17px;color:#2B8FE9;">
                                                    <?php echo ($row8['name']); ?></p>
                                                <p class="date d-inline" style="font-weight: bold;font-size:12px;">
                                                <?php 
                                                $date_var2 = date_create($row2['created_at']);
                                                $time = (date_format($date_var2,"M d, Y h:ia"));
                                                echo $time; ?>
                                                </p>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="pl-3 col-9">
                                                <input class="form-control p-2 w-100" disabled name='sub-comment-text'
                                                    style="border-radius: 7px;font-size:15px;"
                                                    value="<?php echo ($row2['subcomment']); ?>">
                                            </div>
                                            <div class="col-2 mb-4 p-3">
                                                <div class="btn-group ">
                                                    <a class="px-2"
                                                        href="editsubcomment.php?id=<?php echo ($row2['subcomment_uid']); ?>"><i
                                                            class="fas fa-pencil-alt" style="color:#7d7d83"></i></a>
                                                    <button class="far fa-trash-alt  edit-sub-comment px-2"
                                                        onclick="del('<?php echo ($row2['subcomment_id']); ?>')"
                                                        style="border: none;background-color: transparent;color:#7d7d83"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </form>
                                    <?php
                                            }
                                        }
                                        ?>

                                    <!-- <h4 class="pt-4 ">Add a new Comment</h3> -->
                                    <!--  <div class="form-group d-flex align-items-baseline">
                                            <label class="control-label pr-3" style="font-weight:bold;font-size:1.5rem;color:#717BA2;">Add a new</label>
                                            <select class="form-control custom-select w-50" style="border-radius: 7px;width: 100%;padding: 12px 18px;font-size:15px" data-placeholder="Choose a Category" tabindex="1" onchange="change_comment(this)" id="comment_type">
                                                <option value="reply" selected>Reply</option>
                                                <option value="comment">Comment</option>
                                            </select>
                                        </div>
                                        <hr> -->
                                    <!-- <div class="row">
                                            <div class="col-12" id="reply_row">
                                                <input type="hidden" class="form-control" id="user_name" value="<?php echo ($_SESSION['session_name']); ?>">
                                                <input type="hidden" class="form-control" id="user_email" value="<?php echo ($_SESSION['session_user']); ?>">
                                                <label class="control-label mt-4" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Reply</label>
                                                <textarea class="form-control" id="reply" style="border-radius: 7px;font-size:15px;"></textarea>
                                                <button class="btn mt-3" id="add-sub-comment" type="button" style="font-size: 1rem;background-color: #2b8fe9;color: #ffffff;">Add Reply</button>
                                            </div>
                                            <div class="col-12" id="comment_row">
                                                <input type="hidden" class="form-control" id="user_name_comment" value="<?php echo ($_SESSION['session_name']); ?>">
                                                <input type="hidden" class="form-control" id="user_email_comment" value="<?php echo ($_SESSION['session_user']); ?>">
                                                <label class="control-label mt-4" style="font-weight:bold;font-size:1.3rem;color:#717BA2;">Comment</label>
                                                <textarea class="form-control" id="comment" style="border-radius: 7px;font-size:15px;"></textarea>
                                                <button class="btn mt-3" id="add-comment" type="button" style="font-size: 1rem;background-color: #2b8fe9;color: #ffffff;">Add Comment</button>
                                            </div>
                                        </div> -->

                                </div>
                                <?php 
                                        }
                                    ?>
                                
                                <!-- pagination code start -->
                                <div class="mt-3 d-flex justify-content-center">
                                    <?php 
                                $ends_count = 1;  //how many items at the ends (before and after [...])
                                $middle_count = 2;  //how many items before and after current page
                                $dots = false;  
                                $comment_uid=$row['comment_uid'];
                                $query1 = "SELECT * from post_subcomments where comment_uid ='$comment_uid'";                          
                            
                                $result1 = mysqli_query($link, $query1);
                                if(mysqli_num_rows($result1) > 0)
                                {
                                    $link_value='';
                                    $total_records = mysqli_num_rows($result1);
                                    $limit=10;
                                    $total_page=ceil($total_records / $limit);
                                    ?>
                                    <ul class="pagination">
                                        <li>
                                            <a class="prev"
                                                href="viewcomments.php?page=<?php if($page<=1){echo ($page);}else{echo ($page-1);}?>&id=<?php echo $id; ?>"><i
                                                    class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <?php
                                    for($i=1;$i<=$total_page;$i++){
                                        ?>
                                        <?php if($i==$page){
                                            $active="active";
                                            
                                        }else{
                                            $active="";
                                        } ?>

                                        <?php if ($i == $page) {?>
                                        <li><a href="viewcomments.php?page=<?php echo $i?>&id=<?php echo $id; ?>"
                                                class=<?php echo $active; ?>><?php echo $i; ?></a></li>
                                        <?php
                                            $dots = true;
                                            } else {
                                                if ($i <= $ends_count || ($page && $i >= $page - $middle_count && $i <= $page + $middle_count) || $i > $total_page - $ends_count) { 
                                        ?>
                                        <li><a href="viewcomments.php?page=<?php echo $i?>&id=<?php echo $id; ?>"
                                                class=<?php echo $active; ?>><?php echo $i; ?></a></li>
                                        <?php
                                            $dots = true;
                                            } elseif ($dots) {
                                        ?>
                                        <li>
                                            <p>&nbsp;&hellip;&nbsp;</p>
                                        </li>
                                        <?php
                                            $dots = false;
                                            }
                                        } ?>
                                        <?php
                                    }?>
                                        <li><a class="next"
                                                href="viewcomments.php?page=<?php if($page>=$total_page){echo $page;}else{echo $page+1;}?>&id=<?php echo $id; ?>"><i
                                                    class="fas fa-chevron-right"></i></a></li>
                                    </ul>
                                    <?php
                                }
                               ?>
                                </div>
                                <!-- pagination code end -->
<hr>


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
    <script src="assets/sweetalert/sweetalert.min.js"></script>
    <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>


    <script>
    function del(subcomment_id) {
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
                    url: "PHP/deletesubcomment.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        subcomment_id: subcomment_id,
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.status == 201) {
                            window.location.reload();
                        } else if (data.status == 301) {
                            console.log(data.error);
                            alert("error");
                        } else {}
                    }
                });
            } else {
                swal("Cancelled", "Your  file is safe :)", "error");
            }
        });
    }
    // Delete comment 
    function delComment(comment_id) {
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
                        url: "php/deletecomments.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            comment_id: comment_id
                         },
                        success: function(data) {
                            console.log(data);
                            if (data.status == 201) {
                                // if(data.link!=""){
                                window.location.replace("comments");
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
        
    // Edit reply

    $(".edit-sub-comment").on("click", function(e) {
        e.preventDefault();
        var error = "";

        var sub_comment = $(this).closest("form.comment-form").find("textarea[name='sub-comment-text']").val();
        var sub_comment_id = $(this).closest("form.comment-form").find("input[name='sub_comment_id']").val();

        if (sub_comment == "") {
            alert('Sub Comment cannot be empty');
            error = error + 'sub-comment';
        }
        if (error == "") {
            $.ajax({
                type: 'POST',
                url: 'PHP/editSubComment',
                dataType: "json",
                data: {
                    sub_comment_id: sub_comment_id,
                    sub_comment: sub_comment

                },
                success: function(data) {
                    if (data.status == 201) {
                        window.location.reload();
                    } else if (data.status == 501) {
                        alert("please contact with admin to active your account");
                    } else {
                        alert(
                            "Some error occured. Our team is dedicatedly addressing this issue. Thankyou for your patience"
                            );
                    }
                }
            });
        }

    });

    //Add A Reply
    function add_reply() {
        $('#add-sub-comment').on('click', function(e) {
            e.preventDefault();
            var error = "";
            var formData = new FormData();
            if ($('#reply').val() == "") {
                sweetAlert("Warning", "Please enter Sub comment name", "warning");
                error = error + '#sub_comment';
            } else {

                formData.append('sub_comment', $('#reply').val());
            }
            if ($('#user_name').val() == "") {
                sweetAlert("Warning", "Please enter Sub comment name", "warning");
                error = error + 'name';
            } else {

                formData.append('name', $('#user_name').val());
            }
            if ($('#user_email').val() == "") {
                sweetAlert("Warning", "Please enter Sub comment name", "warning");
                error = error + 'username';
            } else {

                formData.append('username', $('#user_email').val());
            }
            if (error == "") {
                formData.append('comment_id', $('#comment_id').val());
                formData.append('article_id', $('#article_id').val());
                $.ajax({
                    url: "PHP/add_sub_comment_admin.php",
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
                            alert("error");
                        } else if (data.status == 601) {
                            console.log(data.error);
                            alert("error");
                        } else if (data.status == 603) {
                            console.log(data.error);
                            alert("error");
                        } else {}
                    }
                });
            } else {}
        });
    }

    function add_comment() {
        $('#add-comment').on('click', function(e) {
            e.preventDefault();
            var error = "";
            var formData = new FormData();
            if ($('#comment').val() == "") {
                sweetAlert("Warning", "Please enter comment", "warning");
                error = error + '#comment';
            } else {

                formData.append('comment', $('#comment').val());
            }
            if ($('#user_name_comment').val() == "") {
                sweetAlert("Warning", "Please enter comment name", "warning");
                error = error + 'name';
            } else {

                formData.append('name', $('#user_name').val());
            }
            if ($('#user_email_comment').val() == "") {
                sweetAlert("Warning", "Please enter  comment", "warning");
                error = error + 'username';
            } else {
                formData.append('username', $('#user_email').val());
            }
            if (error == "") {
                formData.append('article_id', $('#article_id').val());
                $.ajax({
                    url: "PHP/add_comment_admin.php",
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
                            alert("error");
                        } else if (data.status == 601) {
                            console.log(data.error);
                            alert("error");
                        } else if (data.status == 603) {
                            console.log(data.error);
                            alert("error");
                        } else {}
                    }
                });
            } else {}
        });
    }
    var comment_type = ($("#comment_type").val());
    if (comment_type == "reply") {
        $('#reply_row').css('display', 'block');
        $('#comment_row').css('display', 'none');
        add_reply();
    } else {
        $('#reply_row').css('display', 'none');
        $('#comment_row').css('display', 'block');
        add_comment();
    }

    function change_comment(selectObject) {
        var value = selectObject.value;
        console.log(value);
        if (value == "reply") {
            $('#reply_row').css('display', 'block');
            $('#comment_row').css('display', 'none');
            add_reply();
        } else {
            $('#reply_row').css('display', 'none');
            $('#comment_row').css('display', 'block');
            add_comment();
        }
    }


    $('#edit-comment').on('click', function(e) {
        e.preventDefault();
        var error = "";
        var formData = new FormData();
        if ($('#comment').val() == "") {
            sweetAlert("Warning", "Please enter comment", "warning");
            error = error + 'comment';
        } else {

            formData.append('comment', $('#comment').val());
        }
        if (error == "") {
            formData.append('article_id', $('#article_id').val());
            formData.append('username', $('#email_id').val());
            console.log(formData);

            $.ajax({
                url: "PHP/add_comment_admin.php",
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
                        alert("error");

                    } else if (data.status == 601) {
                        console.log(data.error);
                        alert("error");

                    } else if (data.status == 603) {
                        console.log(data.error);
                        alert("error");
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
}
?>