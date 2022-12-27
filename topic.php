<?php require_once "php/controllerUserData.php"; ?>
<?php
require_once "php/schedule_cron.php";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];    
    if ($username != false) {
        $sql = "SELECT * FROM user_login WHERE username = '$username'";
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

/* $arr = explode('/',$router);
$topic_req='';
if(isset($arr[2])){
    $topic_req = $arr[2];
} */
$topic_req = $topic_req;


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
    <meta property="og:image" itemprop="image" content="https://test.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
    <meta property="og:image:secure_url" itemprop="image"
        content="https://test.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
    <meta name="twitter:card" content="https://test.pinkpaper.xyz/assets/images/logo/logo_icon.png">
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
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
                    <div class="heading mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="fw-bold text-capitalize" style="color: var(--text-color);"><i
                                    class="fas fa-hashtag fst-italic" style="color: var(--gray-color);"></i>
                                <?php echo  utf8_decode(urldecode($topic_req)); ?></h1>
                            <?php
                            $user_uid2 = $user_uid ?? null; 

                            $sql7 = "SELECT * FROM topic_follow WHERE user_uid = '$user_uid2' AND topic_follow = '$topic_req'";
                            $run_Sql7 = mysqli_query($link, $sql7);
                            $fetch_info7 = mysqli_fetch_array($run_Sql7);
                            $topic_follow = $fetch_info7['topic_follow'] ?? null;
                            $user_uid3 = $fetch_info7['user_uid'] ?? null;

                            if (!isset($_SESSION['username'])) {
                            echo '<form id="follow" action="login-user.php">
                                <button style="float:left;" class="follow_btn btn button-follow fw-bold" type="button">Follow</button>
                            </form>';
                            }else if($topic_follow == $topic_req && $user_uid3 == $user_uid2){
                                echo '<form id="follow" >
                                <input type="hidden" value="'.$user_uid2.'" name="user_uid">
                                <input type="hidden" value="'.$topic_req.'" name="topic_follow">
                                <button style="float:left;" onClick="unfollowtopic(\'' . $user_uid . '\',\'' . $topic_req . '\')" class="follow_btn btn button-follow fw-bold" type="button" name="unfollow_topic">Following</button>
                            </form>';
                            }else{
                                echo '<form id="follow">
                                <input type="hidden" value="'.$user_uid2.'" name="user_uid">
                                <input type="hidden" value="'.$topic_req.'" name="topic_follow">
                                <button style="float:left;" onClick="followtopic(\'' . $user_uid . '\',\'' . $topic_req . '\')" class="follow_btn btn button-follow fw-bold" type="button" name="follow_topic">Follow</button>
                            </form>';
                            }
                            ?>
                        </div>
                        <hr>
                        <input type="hidden" id="topic_req" value="<?php echo $topic_req; ?>">
                    </div>
                    <div class="heading mb-3">
                        <h3 class="fw-bold">Latest Post<span>.</span></h3>
                    </div>

                    <div class="post-latest-post">
                        <?php
                        $count_query_latest_post = "SELECT count(*) as allcount FROM `stories` WHERE `post_status` = 'published' AND  `unlisted` = 'false' AND `post_tags` LIKE '%$topic_req%'";
                        $count_result_latest_post = mysqli_query($link, $count_query_latest_post);
                        $count_fetch_latest_post = mysqli_fetch_array($count_result_latest_post);
                        $postCountLatestPost = $count_fetch_latest_post['allcount'];
                        $limitLatestPost = 2;

                        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` WHERE `post_status` = 'published' AND `unlisted` = 'false' AND `post_tags` LIKE '%$topic_req%' ORDER BY post_id DESC LIMIT 0," . $limitLatestPost;
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
                                    <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>"
                                        class="title-link articles-dot mb-0">
                                        <h5 class="fw-bold"><?php echo $row['post_title']; ?></h5>
                                    </a>
                                    <p class="text-muted articles-dot small mb-2">
                                        <?php echo strip_tags($row['post_content']); ?></p>

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
                                                <h6 class="fw-bold mb-0" style="font-size:14px;">
                                                    <?php echo $row['name']; ?></h6>
                                            </a>
                                            <span class="text-muted"
                                                style="font-size:12px;"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></span>
                                            <span class="text-muted">&bull;</span> <span class="text-muted"
                                                style="font-size:12px;">
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
                                    <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data
                                    </h6>
                                    <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story"
                                            class="text-link-3 fw-bold ">Write</a> a story or <a href="./"
                                            class="text-link-3 fw-bold ">read</a> on Blog CMS.</h6>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="loadmoreLatestPost text-center">
                        <?php
                        if ($limitLatestPost < $postCountLatestPost) {
                        ?>
                        <input type="button" class="loadBtn" id="loadBtnLatestPost" value="Load More">
                        <?php } ?>
                        <input type="hidden" id="rowLatestPost" value="0">
                        <input type="hidden" id="postCountLatestPost" value="<?php echo $postCountLatestPost; ?>">
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
                            <div class="topic-card shadow p-3 mb-4">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <?php
                                            $query2 = "SELECT DISTINCT(post_uid) FROM `stories` WHERE `post_tags` LIKE '%$topic_req%'";
                                            $result2 = mysqli_query($link, $query2);
                                            $count_stories = mysqli_num_rows($result2);
                                        ?>
                                        <h4 class="fw-bold mb-0" style="color: var(--text-color);">
                                            <?php echo custom_number_format($count_stories); ?>
                                        </h4>
                                        <h6 class="mb-0" style="color: var(--gray-color);">
                                            Stor<?php echo ($count_stories == 1 ? 'y' : 'ies'); ?></h6>
                                    </div>
                                    <div class="col-6 text-center">
                                        <?php
                                        $query3 = "SELECT DISTINCT(user_uid) FROM `stories` WHERE `post_tags` LIKE '%$topic_req%'";
                                        $result3 = mysqli_query($link, $query3);
                                        $count_writers = mysqli_num_rows($result3);
                                    ?>
                                        <h4 class="fw-bold mb-0" style="color: var(--text-color);">
                                            <?php echo custom_number_format($count_writers); ?></h4>
                                        <h6 class="mb-0" style="color: var(--gray-color);">
                                            Writer<?php echo ($count_writers == 1 ? '' : 's'); ?></h6>
                                    </div>
                                </div>
                            </div>

                            <div class="topic-div mb-5">
                                <div class="heading mb-4">
                                    <h4 class="fw-bold">More Topics<span>.</span></h4>
                                </div>
                                <div class="topic-card shadow d-flex flex-wrap justify-content-start px-3 py-4">
                                    <?php
                                    $query = "SELECT * FROM `tags` WHERE `tag_name` != '$topic_req' ORDER BY RAND() LIMIT 10";
                                    $result = mysqli_query($link, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <a href="topic/<?php echo $row['tag_name']; ?>"
                                        class="btn topic-single ms-2 mb-2 px-3"><?php echo $row['tag_name']; ?></a>
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
    <script type="text/javascript" src="assets/js/Typewriter.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>


    <script>
    feather.replace()
    </script>
    <script>
    var animated_text_color = document.getElementById('animated-text-color');

    var typewriter = new Typewriter(animated_text_color, {
        loop: true
    });

    typewriter.typeString('Post')
        .pauseFor(2500)
        .deleteAll()
        .typeString('Article')
        .pauseFor(2500)
        .deleteChars(7)
        .typeString('Story')
        .start();
    </script>

    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 15,
        pagination: {
            el: ".swiper-pagination-1",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next-1",
            prevEl: ".swiper-button-prev-1",
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 25,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 25,
            },
        },
    });

    var swiper = new Swiper(".mySwiper2", {
        slidesPerView: 1,
        spaceBetween: 15,
        pagination: {
            el: ".swiper-pagination-2",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next-2",
            prevEl: ".swiper-button-prev-2",
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 25,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 25,
            },
        },
    });
    </script>
    <script>
    $(document).ready(function() {

        $(".avatar-image").letterpic({
            colors: [
                "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60",
                "#2980b9", "#8e44ad", "#2c3e50",
                "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400",
                "#c0392b", "#bdc3c7", "#7f8c8d"
            ],
            font: 'Inter'
        });

        $(document).on('click', '#loadBtnLatestPost', function() {
            var row = Number($('#rowLatestPost').val());
            var count = Number($('#postCountLatestPost').val());
            var topic_req = $('#topic_req').val();
            var limit = 2;
            row = row + limit;
            $('#rowLatestPost').val(row);
            $("#loadBtnLatestPost").val('Loading...');

            $.ajax({
                type: 'POST',
                url: 'php/loadMoreTopicPost.php',
                data: {
                    row: row,
                    topic_req: topic_req
                },
                success: function(data) {
                    var rowCount = row + limit;
                    $('.post-latest-post').append(data);
                    if (rowCount >= count) {
                        $('#loadBtnLatestPost').css("display", "none");
                    } else {
                        $("#loadBtnLatestPost").val('Load More');
                    }
                    $(".avatar-image").letterpic({
                        colors: [
                            "#1abc9c", "#2ecc71", "#3498db", "#9b59b6",
                            "#34495e", "#16a085", "#27ae60", "#2980b9",
                            "#8e44ad", "#2c3e50",
                            "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1",
                            "#95a5a6", "#f39c12", "#d35400", "#c0392b",
                            "#bdc3c7", "#7f8c8d"
                        ],
                        font: 'Inter'
                    });
                }
            });
        });

    });
    </script>
    <script>
    function followtopic(user_uid, topic_req) {
        $.ajax({
            url: "php/followtopic.php",
            method: "POST",
            dataType: "json",
            data: {
                user_uid: user_uid,
                topic_req: topic_req
            },
            success: function(data) {
                console.log(data);
                if (data.status == 201) {
                    if (data.link != "") {
                        window.location.replace("all-tags");
                    } else {
                        window.location.replace("./");
                    }
                    window.location.reload();
                    $("#divProfileReload").load(location.href + " #divProfileReload");
                    $("#follow_reloaduser").load(location.href + " #follow_reloaduser");
                } else if (data.status == 301) {
                    console.log(data.error);
                    swal("error");
                    $('#contact-success').css('display', 'none');
                    $('#contact-form').css('display', 'block');
                    swal('success');
                } else {
                    swal("problem with query");
                }
            }
        });
    }

    function unfollowtopic(user_uid, topic_req) {
        $.ajax({
            url: "php/unfollowtopic.php",
            method: "POST",
            dataType: "json",
            data: {
                user_uid: user_uid,
                topic_req: topic_req
            },
            success: function(data) {
                console.log(data);
                if (data.status == 201) {
                    if (data.link != "") {
                        window.location.replace("all-tags");
                    } else {
                        window.location.replace("./");
                    }
                    window.location.reload();
                    $("#follow_reloaduser").load(location.href + " #follow_reloaduser");

                } else if (data.status == 301) {
                    console.log(data.error);
                    swal("error");
                    $('#contact-success').css('display', 'none');
                    $('#contact-form').css('display', 'block');
                    swal('success');
                } else {
                    swal("problem with query");
                }
            }
        });
    }
    </script>

</body>

</html>