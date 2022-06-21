<?php require_once "php/controllerUserData.php"; ?>
<?php
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    
    if ($email != false) {
        $sql = "SELECT * FROM user_login WHERE email = '$email'";
        $run_Sql = mysqli_query($link, $sql);
        if ($run_Sql) {
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $status = $fetch_info['email_status'];
            $name = $fetch_info['name'];
            $username = $fetch_info['username'];
            $code = $fetch_info['code'];
            $profile = $fetch_info['profile'];
            $user_uid = $fetch_info['user_uid'];
            if ($status == "verified") {
                if ($code != 0) {
                    header('Location: reset-code');
                }
            } else {
                header('Location: user-otp');
            }
        }
    } else {
        header('Location: login');
    }
}

$text= $search_req;
?>
<?php require_once "php/follow_action.php"; ?>
<?php
$meta_title = 'Blog';
$category_description = 'Start curating your thoughts in a decentralized and autonomous environment for your communities to browse without perjury and risk of prosecution from anywhere around the globe.';
$meta_description = implode(' ', array_slice(explode(' ', $category_description), 0, 15)) . "\n";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <base href="<?php echo $base_url; ?>">

    <title><?php echo $meta_title ?> | Pink Papers </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo ($meta_description); ?>">
    <!-- Enter a keywords for the page in tag -->
    <meta name="Keywords" content="<?php echo ($meta_title); ?>">
    <!-- Enter Page title -->
    <meta property="og:title" content="<?php echo $meta_title ?> | Pink Papers" />
    <!-- Enter Page URL -->
    <meta property="og:url" content="<?php echo ($actual_link) ?>" />
    <!-- Enter page description -->
    <meta property="og:description" content="<?php echo ($meta_description); ?>...">
    <!-- Enter Logo image URL for example : http://cryptonite.finstreet.in/images/cryptonitepost.png -->
    <meta property="og:image" itemprop="image" content="assets/images/logo/logo_icon.png" />
    <meta property="og:image:secure_url" itemprop="image" content="assets/images/logo/logo_icon.png" />
    <meta name="twitter:card" content="assets/images/logo/logo_icon.png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">

    <!-- favicon -->
    <link rel="icon" href="assets/images/logo/favicon.ico">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- icons pack -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
    <script src="assets/feather/feather.min.js"></script>


    <!-- stylesheet -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">

    <!-- swiper slider -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />


</head>
<body onload="loader()">

    <!-- loader start-->
    <div class="loader-container">
        <div class="loader"></div>
    </div>
    <!-- loader end-->

    <button id="back-to-top" class="btn btn-lg back-to-top text-white"><i class="fas fa-chevron-up"></i></button>

    <!-- header start-->
    <?php include('include/header.php'); ?>
    <!-- header end-->

    <div class="container" style="padding-top:50px;"></div>

    <div class="container">

    </div>

    <section class="latest-post my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="heading mb-4" style="margin-top:6rem">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="fw-bold text-capitalize" style="color: var(--text-color);"> Your Search result for:&nbsp;<?php echo utf8_decode(urldecode($text)); ?></h2>
                            
                        </div>
                        <hr>
                    </div>

                    <div class="post-latest-post">
                        <?php
                        $count_query_latest_post = "SELECT count(*) as allcount FROM `stories` WHERE `post_title` LIKE '%$text%' OR `post_slug` LIKE '%$text%' ";
                        $count_result_latest_post = mysqli_query($link, $count_query_latest_post);
                        $count_fetch_latest_post = mysqli_fetch_array($count_result_latest_post);
                        $postCountPublished = $count_fetch_latest_post['allcount'];
                        $limitPublished = 2;

                        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`  WHERE `post_title` LIKE '%$text%' OR `post_title` LIKE '%$text%' ORDER BY post_id DESC LIMIT 0," . $limitPublished;
                        $result = mysqli_query($link, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                                <div class="card border-0 shadow-sm mb-3 card-reading-time">
                                    <div class="d-flex">
                                        <div class="card-img p-2">
                                            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                                                <?php
                                                if ($row['featured_image'] == '') {
                                                    echo '<img src="assets/images/blogcms.com.png" alt="image" class="shadow">';
                                                } else {
                                                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow">';
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="card-body px-2">
                                            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>" class="title-link articles-dot mb-0">
                                                <h5 class="fw-bold"><?php echo $row['post_title']; ?></h5>
                                            </a>
                                            <p class="text-muted articles-dot small mb-2"><?php echo strip_tags($row['post_content']); ?></p>

                                            <div class="d-flex flex-wrap gap-2 mb-3">
                                                <?php
                                                $tag_name = explode(",", $row['post_tags']);
                                                foreach ($tag_name as $key => $val) {
                                                    echo '<a href="topic/' . $val . '" class="topic fw-bold py-0 px-3">' . $val . '</a>';
                                                }
                                                ?>
                                            </div>
                                            <div class="author d-flex justify-content-start">
                                                <?php
                                                if ($row['profile'] == '') {
                                                    echo '<div class="profile">
                                                    <a href="' . $row['username'] . '">
                                                    <canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="40" height="40"></canvas>

                                                    </a>
                                                </div>';
                                                } else {
                                                    echo '<div class="profile">
                                                    <a href="' . $row['username'] . '">
                                                        <img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle">
                                                    </a>
                                                </div>';
                                                }
                                                ?>


                                                <div class="author-name ms-2">
                                                    <a href="<?php echo $row['username']; ?>" class="author-link">
                                                        <h6 class="fw-bold mb-0" style="font-size:14px;"><?php echo $row['name']; ?></h6>
                                                    </a>
                                                    <span class="text-muted" style="font-size:12px;"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></span> <span class="text-muted">&bull;</span> <span class="text-muted" style="font-size:12px;">
                                                        <?php
                                                        $mycontent = $row['post_content'];
                                                        $word = str_word_count(strip_tags($mycontent));
                                                        $m = floor($word / 200);
                                                        $s = floor($word % 200 / (200 / 60));
                                                        //$readtime = $m . ' min' . ($m == 1 ? '' : 's') . ', ' . $s . ' sec' . ($s == 1 ? '' : 's');
                                                        if ($m >= '1') {
                                                            echo $m . ' min' . ($m == 1 ? '' : 's') . ' read';
                                                        } else if ($m <= '1') {
                                                            echo $s . ' sec' . ($s == 1 ? '' : 's') . ' read';
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }
                        } else { ?>

                            <div class="my-5">
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        <img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
                                        <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data</h6>
                                        <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story or <a href="./"class="text-link-3 fw-bold ">read</a> on Blog CMS.</h6>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="loadmorePublished text-center">
                                <?php
                                if ($limitPublished < $postCountPublished) {
                                ?>
                                    <input type="button" class="loadBtn" id="loadBtnPublished" value="Load More">
                                <?php } ?>
                                <input type="hidden" id="rowPublished" value="0">
                                <input type="hidden" id="dat" value="<?php echo $text?>">
                                <input type="hidden" id="postCountPublished" value="<?php echo $postCountPublished; ?>">
                            </div>



                    <!-- view all post -->
                    <!-- <div class="d-flex justify-content-center my-4">
                        <a href="all-posts" class="btn button-outline-primary fw-bold" role="button">View all Posts</a>
                    </div> -->

                    <div class="d-lg-none">
                        <div class="d-flex justify-content-center mb-4">
                            <hr style="background:var(--gray-color);width:80%;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-item">
                        <div class="make-me-sticky">
                            <!-- topics -->
                           
                            <div class="topic-div mb-5">
                                <div class="heading mb-4">
                                    <h4 class="fw-bold">More Topics<span>.</span></h4>
                                </div>
                                <div class="topic-card shadow d-flex flex-wrap justify-content-start px-3 py-4">
                                    <?php
                                    $query = "SELECT * FROM `tags` ORDER BY RAND() LIMIT 10";
                                    $result = mysqli_query($link, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>                                    
                                        <a href="topic/<?php echo $row['tag_name']; ?>" class="btn topic-single ms-2 mb-2 px-3"><?php echo $row['tag_name']; ?></a>
                                    <?php } }else{?>
                                        <h6>No data Found</h6>
                                    <?php }?>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- footer start-->
    <?php include('include/footer.php'); ?>
    <!-- footer end-->




    <!-- script -->
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/sweetalert/sweetalert.min.js"></script>
    <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="assets/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
           
            $(document).on('click', '#loadBtnPublished', function() {
                var row = Number($('#rowPublished').val());
                var count = Number($('#postCountPublished').val());
                var limit = 2;
                row = row + limit;
                var dat=String($('#dat').val());
                $('#rowPublished').val(row);
                $('#dat').val(dat);
                $("#loadBtnPublished").val('Loading...');

                $.ajax({
                    type: 'POST',
                    url: 'php/loadMoreSearchData.php',
                    data: {row: row, dat: dat},
                    success: function(data) {
                        var rowCount = row + limit;
                        $('.post-latest-post').append(data);
                        if (rowCount >= count) {
                            $('#loadBtnPublished').css("display", "none");
                        } else {
                            $("#loadBtnPublished").val('Load More');
                        }
                        $(".avatar-image").letterpic({
                            colors: [
                                "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                                "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                            ],
                            font: 'Inter'
                        });
                    }
                });
            });

        });

        function del(post_uid) {
            swal({
                title: "Delete Story",
                text: "Are you sure you want to delete this story?",
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
                        url: "php/deleteStory.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            post_uid: post_uid
                        },
                        success: function(data) {
                            //console.log(data);
                            if (data.status == 201) {
                                toastr["success"]("Story Deleted.");
                                window.location.replace("stories");
                            
                            } else if (data.status == 301) {
                                //console.log(data.error);
                                swal("error");
                            } else {
                                //swal("problem with query");
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your  file is safe :)", "error");
                }
            });
        }
    </script>
</body>

</html>