<?php require_once "php/controllerUserData.php"; ?>
<?php
require_once "php/schedule_cron.php";
$username = $_SESSION['username'];

if ($username != false) {
    $sql = "SELECT * FROM user_login WHERE username = '$username'";
    $run_Sql = mysqli_query($link, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['email_status'];
            $name = $fetch_info['name'];
            $username = $fetch_info['username'];
            $user_uid = $fetch_info['user_uid'];
            $code = $fetch_info['code'];
            $profile = $fetch_info['profile'];
            $bio = $fetch_info['bio'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: reset-code');
            }
        } else {
            header('Location: user-otp');
        }
    }
} else {
    header('Location: login-user-mm');
}

?>
<?php
$meta_title = '';
$category_description = 'Start curating your thoughts in a decentralized and autonomous environment for your communities to browse without perjury and risk of prosecution from anywhere around the globe.';
$meta_description = implode(' ', array_slice(explode(' ', $category_description), 0, 15)) . "\n";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<?php require_once "php/follow_action.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $meta_title ?> | Pink Paper </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo ($meta_description); ?>">
    <!-- Enter a keywords for the page in tag -->
    <meta name="Keywords" content="<?php echo ($meta_title); ?>">
    <!-- Enter Page title -->
    <meta property="og:title" content="<?php echo $meta_title ?> | Pink Paper" />
    <!-- Enter Page URL -->
    <meta property="og:url" content="<?php echo ($actual_link) ?>" />
    <!-- Enter page description -->
    <meta property="og:description" content="<?php echo ($meta_description); ?>...">
    <!-- Enter Logo image URL for example : http://cryptonite.finstreet.in/images/cryptonitepost.png -->
    <meta property="og:image" itemprop="image" content="https://content.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
    <meta property="og:image:secure_url" itemprop="image" content="https://content.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
    <meta name="twitter:card" content="https://content.pinkpaper.xyz/assets/images/logo/logo_icon.png">
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


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TNWHRNG');</script>
<!-- End Google Tag Manager -->
</head>

<body onload="loader()">
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNWHRNG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

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




    <section class="latest-post my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">

                    <div class="sidebar-item">
                        <div class="make-me-sticky">
                            <div class="d-none d-lg-block">
                                <!-- user details -->

                                <!-- profilePageLeftDiv start-->
                                <div class="profile-div mb-5">
                                    <div class="profile-card shadow d-flex flex-column justify-content-center px-3 py-4 text-center">
                                        <?php
                                        if ($profile == '') {
                                            echo '<div class="text-center"><canvas class="avatar-image rounded-circle text-center p-1 shadow-sm mb-2" title="' . $name . '"></canvas></div>';
                                        } else {
                                            echo '<div class="text-center"><img src="' . $profile . '" alt="" class="text-center p-1 shadow-sm mb-2"></div>';
                                        }
                                        ?>
                                        <h4 class="fw-bold text-capitalize mb-0" style="color:var(--text-color);"><?php echo $name; ?></h4>
                                        <p class="text-muted mb-3"><?php echo $bio; ?></p>


                                        
                                    </div>
                                </div>
                                <!-- profilePageLeftDiv end-->
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="heading mb-4">
                        <h2 class="fw-bold">Reading List<span>.</span></h2>
                    </div>
                    <div class="post-profile-post">
                        <?php
                        $count_query_profile_post = "SELECT count(*) as allcount FROM `post_list` INNER JOIN `stories` ON `stories`.`post_uid`=`post_list`.`post_uid` INNER JOIN `user_login` ON `user_login`.`user_uid`=`stories`.`user_uid` WHERE `stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false' AND `post_list`.`user_uid`='$user_uid'";
                        $count_result_profile_post = mysqli_query($link, $count_query_profile_post);
                        $count_fetch_profile_post = mysqli_fetch_array($count_result_profile_post);
                        $postCountProfilePost = $count_fetch_profile_post['allcount'];
                        $limitProfilePost = 2;

    
                        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `post_list` INNER JOIN `stories` ON `stories`.`post_uid`=`post_list`.`post_uid` INNER JOIN `user_login` ON `user_login`.`user_uid`=`stories`.`user_uid` WHERE `stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false' AND `post_list`.`user_uid`='$user_uid' ORDER BY `stories`.`post_id` DESC LIMIT 0," . $limitProfilePost;
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
                                                    echo '<img src="assets/images/blogcms.com.png" alt="image" class="shadow" style="height: 100%;width:125px;   object-fit: cover;">';
                                                } else {
                                                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" style="height: 100%;width:125px;   object-fit: cover;">';
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
                        <div class="d-flex justify-content-between align-items-center">
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
                                            <div id="divReload">
                                                            <?php
                                                            $post_uid=$row['post_uid'];
                                                            $user_uid=$row['user_uid'];
                                            $user_uid2 = $user_uid ?? null;
                                            $sql12 = "SELECT * FROM post_list WHERE post_uid = '$post_uid' AND user_uid = '$user_uid2'";
                                            $run_Sql12 = mysqli_query($link, $sql12);
                                            $fetch_info12 = mysqli_fetch_assoc($run_Sql12);

                                            $list_user_uid = $fetch_info12['user_uid'] ?? null;
                                            $list_post_uid = $fetch_info12['post_uid'] ?? null;
                                            if (!isset($_SESSION['username'])) {
                                                echo '<p class="icon-color mb-0 save-reload" onClick="login()"><i class="far fa-bookmark"></i></p>';
                                            } else if ($list_user_uid == $user_uid2 && $list_post_uid == $post_uid) {
                                                echo '<p class="icon-color mb-0 save-reload" onClick="unsave(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="fas fa-bookmark"></i></p>';
                                            } else {
                                                echo '<p class="icon-color mb-0 save-reload" onClick="save(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="far fa-bookmark"></i></p>';
                                            }
                                            ?>
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
                    <div class="loadmoreProfilePost text-center">
                        <?php
                        if ($limitProfilePost < $postCountProfilePost) {
                        ?>
                            <input type="button" class="loadBtn" id="loadBtnProfilePost" value="Load More">
                        <?php } ?>
                        <input type="hidden" id="rowProfilePost" value="0">
                        <input type="hidden" id="postCountProfilePost" value="<?php echo $postCountProfilePost; ?>">
                    </div>

                    <div class="d-lg-none">
                        <div class="d-flex justify-content-center mb-4">
                            <hr style="background:var(--gray-color);width:80%;">
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
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <script>
        $(document).ready(function() {
            $(".avatar-image").letterpic({
                colors: [
                    "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                    "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                ],
                font: 'Inter'
            });

            $(document).on('click', '#loadBtnProfilePost', function() {
                var row = Number($('#rowProfilePost').val());
                var count = Number($('#postCountProfilePost').val());
                var user_uid = '<?php echo $user_uid; ?>';
                var limit = 2;
                row = row + limit;
                $('#rowProfilePost').val(row);
                $("#loadBtnProfilePost").val('Loading...');

                $.ajax({
                    type: 'POST',
                    url: 'php/loadMoreReadingPost.php',
                    data: {
                        'row': row,
                        'user_uid': user_uid
                    },
                    success: function(data) {
                        var rowCount = row + limit;
                        $('.post-profile-post').append(data);
                        if (rowCount >= count) {
                            $('#loadBtnProfilePost').css("display", "none");
                        } else {
                            $("#loadBtnProfilePost").val('Load More');
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
        function unsave(user_uid, post_uid) {
            $.ajax({
                url: "php/unsavePost.php",
                method: "POST",
                dataType: "json",
                data: {
                    user_uid: user_uid,
                    post_uid: post_uid
                },
               // beforeSend: function() {
                 //   $("#divProfileReload .save-reload").html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
                  //  $("#divReload .save-reload").html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
                //},
                success: function(data) {
                    console.log(data);
                    if (data.status == 201) {
                        // if(data.link!=""){
                        // window.location.replace("all-tags");
                        // }else{
                        //     window.location.replace("./);
                        // }
                        window.location.reload();
                    //    $("#divProfileReload").load(location.href + " #divProfileReload");
                  //     $("#divReload").load(location.href + " #divReload");

                    } else if (data.status == 301) {
                        console.log(data.error);
                        //swal("error");
                        // $('#contact-success').css('display', 'none');
                        // $('#contact-form').css('display', 'block');
                        // swal('success'); 
                    } else {
                        //     swal("problem with query");
                    }
                }
            });


        }

       
        function save(user_uid, post_uid) {
            $.ajax({
                url: "php/savePost.php",
                method: "POST",
                dataType: "json",
                data: {
                    user_uid: user_uid,
                    post_uid: post_uid
                },
               //beforeSend: function() {
                 //   $("#divProfileReload .save-reload").html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
                 //   $("#divReload .save-reload").html('<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
                //},
                success: function(data) {
                    console.log(data);
                    if (data.status == 201) {
                        // if(data.link!=""){
                        // window.location.replace("all-tags");
                        // }else{
                        //     window.location.replace("./);
                        // }
                        window.location.reload();
                        //$("#divProfileReload").load(location.href + " #divProfileReload");
                      // $("#divReload").load(location.href + " #divReload");

                    } else if (data.status == 301) {
                        console.log(data.error);
                        //swal("error");
                        // $('#contact-success').css('display', 'none');
                        // $('#contact-form').css('display', 'block');
                        // swal('success'); 
                    } else {
                        //     swal("problem with query");
                    }
                }
            });


        }
    </script>
</body>

</html>