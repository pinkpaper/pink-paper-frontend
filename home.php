<?php require_once "php/controllerUserData.php"; ?>
<?php
require_once "php/schedule_cron.php";
if(isset($_SESSION['userAddress'])){
    $userAddres = $_SESSION['userAddress'];
}

if (isset($_SESSION['userAddress']) && isset($_SESSION['header_show'])) {
    $userAddress = $_SESSION['userAddress'];
    if ($userAddress != '') {
        $sql = "SELECT * FROM user_login  WHERE metamask_address = '$userAddress'";
        $run_Sql = mysqli_query($link, $sql);
        if ($run_Sql) {
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $first_time_login = $fetch_info['first_time_login'];
            $name = $fetch_info['name'];
            $username = $fetch_info['username'];
            $code = $fetch_info['code'];
            $profile = $fetch_info['profile'];
            $user_uid = $fetch_info['user_uid'];
            if ($first_time_login == "false") {
                header('Location: ./register');
            }
        }
    } else {
        header('Location: login-user-mm');
    }
}

?>
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

    <style>
    .trending-post .container {
        position: relative;
    }

    .swiper {
        width: 100%;
        height: 100%;
        padding: 0 20px;
    }

    .swiper-button-next-1,
    .swiper-button-prev-1 {
        width: 40px;
        height: 40px;
        background: var(--primary-color);
        border-radius: 50%;
        overflow: hidden;
        color: var(--text-color);
    }

    .swiper-button-next-1 {
        position: absolute;
        top: 60%;
        right: -10px;
    }

    .swiper-button-prev-1 {
        position: absolute;
        top: 60%;
        left: -10px;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 20px;
    }

    .editor-choice .container {
        position: relative;
    }

    .swiper-button-next-2,
    .swiper-button-prev-2 {
        width: 40px;
        height: 40px;
        background: var(--primary-color);
        border-radius: 50%;
        overflow: hidden;
        color: var(--text-color);
    }

    .swiper-button-next-2 {
        position: absolute;
        top: 60%;
        right: -10px;
    }

    .swiper-button-prev-2 {
        position: absolute;
        top: 60%;
        left: -10px;
    }


    @media only screen and (max-width: 992px) {
        .swiper-button-next {
            position: absolute;
            top: 50%;
            right: 5px;
        }

        .swiper-button-prev {
            position: absolute;
            top: 50%;
            left: 5px;
        }

        .swiper-button-next-2 {
            position: absolute;
            top: 50%;
            right: 5px;
        }

        .swiper-button-prev-2 {
            position: absolute;
            top: 50%;
            left: 5px;
        }

    }
    </style>
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

    <?php
    if (isset($_SESSION['username'])) {
        echo '<div class="container" style="padding-top:50px;"></div>';
    } else {
    ?>
    <div class="container-fluid header-div">
        <div class="container" style="padding-top:100px;">
            <div class="row py-5">
                <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                    <div class="card-left mb-5">
                        <h1 class="display-3 fw-bold mb-4">Create Your <br> Own <span class="animated-text-color"
                                id="animated-text-color"></span></h1>
                        <a href="register" class="btn btn-lg button-primary px-4 fw-bold" role="button"> Get
                            Started</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-center">
                        <div class="p-2 shape">
                            <div class="p-3">
                                <img src="assets/images/logo/post.svg" alt="image" class="img-fluid"
                                    style="height:200px">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- trendingPosts start-->
    <?php include('include/components/trendingPosts.php'); ?>

    <!-- trendingPosts end-->


    <!-- editor choice start-->
    <?php include('include/components/editorChoice.php'); ?>
    <!-- editor choice end-->


    <section class="latest-post my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">


                    <ul class="nav nav-tabs  flex-column flex-sm-row nav-pills mb-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="latest-post-tab" data-bs-toggle="tab" href="#latest-post"
                                role="tab" aria-controls="latest-post" aria-selected="false">Latest Post</a>
                        </li>
                        <?php
                        if (isset($_SESSION['username'])) { ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="following-post-tab" data-bs-toggle="tab" href="#following-post"
                                role="tab" aria-controls="following-post" aria-selected="false">Following Post</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="recommended-post-tab" data-bs-toggle="tab" href="#recommended-post"
                                role="tab" aria-controls="recommended-post" aria-selected="true">Recommended Post</a>
                        </li>
                        <?php
                        } else {
                            echo '';
                        }
                        ?>

                    </ul>


                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="latest-post" role="tabpanel"
                            aria-labelledby="latest-post-tab">

                            <div class="post-latest-post">
                                <?php
                                $count_query_latest_post = "SELECT count(*) as allcount FROM `stories` WHERE `post_status` = 'published' AND  `unlisted` = 'false'";
                                $count_result_latest_post = mysqli_query($link, $count_query_latest_post);
                                $count_fetch_latest_post = mysqli_fetch_array($count_result_latest_post);
                                $postCountLatestPost = $count_fetch_latest_post['allcount'];
                                $limitLatestPost = 2;

                                $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`
                        FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
                        WHERE `post_status` = 'published' AND `unlisted` = 'false' 
                        ORDER BY post_id DESC LIMIT 0," . $limitLatestPost;
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                <div class="card border-0 shadow-sm mb-3 card-reading-time overflow-auto">
                                    <div class="d-flex">
                                        <div class="card-img p-2">
                                            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                                                <?php
                                                        if ($row['featured_image'] == '') {
                                                            echo '<img src="assets/images/blogcms.com.png" alt="image" class="shadow" style="height: 100%;width:125px;   object-fit: cover;">';
                                                        } else {
                                                            echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" style="height: 100%;width:125px;   object-fit: cover;" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
                                                        }
                                                        ?>
                                            </a>
                                        </div>
                                        <div class="card-body px-2 w-75">
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
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="author d-flex justify-content-start">
                                                    <?php
                                                            if ($row['profile'] == '') {
                                                                echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="40" height="40"></canvas></a></div>';
                                                            } else {
                                                                echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
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
                                                <div id="divReload">
                                                    <?php
                                                            $post_uid=$row['post_uid'];
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
                                            <img src="assets/images/no_data.svg" alt="" class="p-3"
                                                style="width: 200px;">
                                            <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no
                                                data</h6>
                                            <h6 class="text-center" style="color:var(--gray-color)"><a
                                                    href="create-story" class="text-link-3 fw-bold ">Write</a> a story
                                                or <a href="./" class="text-link-3 fw-bold ">read</a> on Blog CMS.</h6>
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
                                <input type="hidden" id="postCountLatestPost"
                                    value="<?php echo $postCountLatestPost; ?>">
                            </div>


                        </div>
                        <?php
                        if (isset($_SESSION['username'])) { ?>
                        <div class="tab-pane fade" id="following-post" role="tabpanel"
                            aria-labelledby="following-post-tab">
                            <div class="post-following-post">
                                <?php
                                    $user_uid = $user_uid ?? NULL;
                                    //$count_query_following_post = "SELECT count(*) as allcount FROM `stories` 
                                    //WHERE `post_status` = 'published' AND  `unlisted` = 'false'";
                                        $count_query_following_post = "SELECT count(*) as allcount, `stories`.*, `user_login`.`username`,`user_login`.`name`, `user_login`.`profile`FROM 
                                        `follow` LEFT JOIN `stories`ON (`stories`.`user_uid`='$user_uid' 
                                        OR `stories`.`user_uid` = `follow`.`followed_user_uid`) LEFT JOIN 
                                        `user_login` ON `stories`.`user_uid`=`user_login`.`user_uid`WHERE (`follow`.`following_user_uid`='$user_uid' OR `follow`.`following_user_uid`=NULL) 
                                        AND(`stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false') " ;

                                    $count_result_following_post = mysqli_query($link, $count_query_following_post);
                                    $count_fetch_following_post = mysqli_fetch_array($count_result_following_post);
                                    $postCountFollowingPost = $count_fetch_following_post['allcount'];
                                    
                                    $limitFollowingPost = 4;

                                    $query = "SELECT `stories`.*, `user_login`.`username`,`user_login`.`name`, `user_login`.`profile`FROM `follow` LEFT JOIN `stories`ON (`stories`.`user_uid`='$user_uid' 
                                    OR `stories`.`user_uid` = `follow`.`followed_user_uid`) LEFT JOIN `user_login` ON `stories`.`user_uid`=`user_login`.`user_uid`WHERE (`follow`.`following_user_uid`='$user_uid' OR `follow`.`following_user_uid`=NULL) AND(`stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false') ORDER BY post_id DESC LIMIT 0," . $limitFollowingPost;
                                    $result = mysqli_query($link, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $row = mysqli_fetch_assoc($result);
                                    ?>
                                <div class="card border-0 shadow-sm mb-3 card-reading-time overflow-auto">
                                    <div class="d-flex">
                                        <div class="card-img p-2">
                                            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                                                <?php
                                                            if ($row['featured_image'] == '') {
                                                                echo '<img src="assets/images/blogcms.com.png" alt="image" class="shadow" style="height: 100%;width:125px;   object-fit: cover;">';
                                                            } else {
                                                                echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" style="height: 100%;width:125px;   object-fit: cover;" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
                                                            }
                                                            ?>
                                            </a>
                                        </div>
                                        <div class="card-body px-2 w-75">
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
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="author d-flex justify-content-start">
                                                    <?php
                                                                if ($row['profile'] == '') {
                                                                    echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image2 img-fluid rounded-circle" title="' . $row['name'] . '" style="width:34px;height: 34px;"></canvas></a></div>';
                                                                } else {
                                                                    echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
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
                                                <div id="divReload"> <?php
                                                            $post_uid=$row['post_uid'];
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
                                <?php    }
                                    } else { ?>

                                <div class="my-5">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center">
                                            <img src="assets/images/no_data.svg" alt="" class="p-3"
                                                style="width: 200px;">
                                            <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no
                                                data</h6>
                                            <h6 class="text-center" style="color:var(--gray-color)"><a
                                                    href="create-story" class="text-link-3 fw-bold ">Write</a> a story
                                                or <a href="./" class="text-link-3 fw-bold ">read</a> on Blog CMS.</h6>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>

                            <div class="loadMoreFollowingPost text-center">
                                <?php
                                    if ($limitFollowingPost < $postCountFollowingPost) {
                                    ?>
                                <input type="button" class="loadBtn" id="loadBtnFollowingPost" value="Load More">
                                <?php } ?>
                                <input type="hidden" id="rowFollowingPost" value="0">
                                <input type="hidden" id="postCountFollowingPost"
                                    value="<?php echo $postCountFollowingPost; ?>">
                            </div>





                        </div>
                        <?php
                        } else {
                            echo '';
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['username'])) { ?>
                        <div class="tab-pane fade" id="recommended-post" role="tabpanel"
                            aria-labelledby="recommended-post-tab">
                            <div class="post-recommended-post">
                                <?php
                                    $user_uid = $user_uid ?? NULL;
                                    $queryfive = "SELECT * FROM `topic_follow` WHERE `user_uid` = '$user_uid'";
                                    $resultfive = mysqli_query($link, $queryfive);
                                    while ($rowfive = mysqli_fetch_assoc($resultfive)) {
                                        $topic_follow_user_uid = $rowfive['user_uid'];
                                        $tag5 = $rowfive['topic_follow'] ?? null;
                                        
                                    }
                                    $count_query_recommended_post = "SELECT count(*) as allcount FROM `stories` WHERE `post_status` = 'published' AND  `unlisted` = 'false'";
                                    $count_result_recommended_post = mysqli_query($link, $count_query_recommended_post);
                                    $count_fetch_recommended_post = mysqli_fetch_array($count_result_recommended_post);
                                    $postCountRecommendedPost = $count_fetch_recommended_post['allcount'];
                                    $limitRecommendedPost = 2;


                                    if (mysqli_num_rows($resultfive) > 0) {
                                        $query = "SELECT `stories`.*,`user_login`.`username`, 
                            `user_login`.`name`, `user_login`.`profile`
                             FROM `stories` INNER JOIN `user_login` 
                             ON `stories`.`user_uid` = `user_login`.`user_uid`
                              WHERE `post_status` = 'published' AND `unlisted` = 'false' 
                              AND `stories`.`post_tags` LIKE '%$tag5%'
                               ORDER BY post_id DESC LIMIT 0," . $limitRecommendedPost;
                                        $result = mysqli_query($link, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                <div class="card border-0 shadow-sm mb-3 card-reading-time overflow-auto">
                                    <div class="d-flex">
                                        <div class="card-img p-2">
                                            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                                                <?php
                                                                if ($row['featured_image'] == '') {
                                                                    echo '<img src="assets/images/blogcms.com.png" alt="image" class="shadow" style="height: 100%;width:125px;   object-fit: cover;">';
                                                                } else {
                                                                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" style="height: 100%;width:125px;   object-fit: cover;" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
                                                                }
                                                                ?>
                                            </a>
                                        </div>
                                        <div class="card-body px-2 w-75">
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
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="author d-flex justify-content-start">
                                                    <?php
                                                                    if ($row['profile'] == '') {
                                                                        echo '<div class="profile">
                                                    <a href="' . $row['username'] . '">
                                                    <canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" style="width:34px;height: 34px;"></canvas>

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
                                                <div id="divReload"><?php
                                                            $post_uid=$row['post_uid'];
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
                                <?php    }
                                        }
                                    } else { ?>

                                <div class="my-5">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center">
                                            <img src="assets/images/no_data.svg" alt="" class="p-3"
                                                style="width: 200px;">
                                            <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no
                                                data</h6>
                                            <h6 class="text-center" style="color:var(--gray-color)"><a
                                                    href="create-story" class="text-link-3 fw-bold ">Write</a> a story
                                                or <a href="./" class="text-link-3 fw-bold ">read</a> on Blog CMS.</h6>
                                        </div>
                                    </div>
                                </div>
                                <?php }  ?>

                            </div>

                            <div class="loadMoreRecommendedPost text-center">
                                <?php
                                    if ($limitRecommendedPost < $postCountRecommendedPost) {
                                    ?>
                                <input type="button" class="loadBtn" id="loadBtnRecommendedPost" value="Load More">
                                <?php } ?>
                                <input type="hidden" id="rowRecommendedPost" value="0">
                                <input type="hidden" id="postCountRecommendedPost"
                                    value="<?php echo $postCountRecommendedPost; ?>">
                            </div>



                        </div>
                        <?php
                        } else {
                            echo '';
                        }
                        ?>
                    </div>

                    <!-- <div class="heading mb-4">
                        <h2 class="fw-bold">Latest Post<span>.</span></h2>
                    </div>

                    <div class="post-latest-post">
                        <?php
                        $count_query_latest_post = "SELECT count(*) as allcount FROM `stories` WHERE `post_status` = 'published' AND  `unlisted` = 'false'";
                        $count_result_latest_post = mysqli_query($link, $count_query_latest_post);
                        $count_fetch_latest_post = mysqli_fetch_array($count_result_latest_post);
                        $postCountLatestPost = $count_fetch_latest_post['allcount'];
                        $limitLatestPost = 2;

                        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`
                        FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
                        WHERE `post_status` = 'published' AND `unlisted` = 'false' 
                        ORDER BY post_id DESC LIMIT 0," . $limitLatestPost;
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
                                                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
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
                                                        echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="40" height="40"></canvas></a></div>';
                                                    } else {
                                                        echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
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
                                                    <p class="icon-color mb-0"><i class="far fa-bookmark"></i></p>
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
                    <div class="loadmoreLatestPost text-center">
                        <?php
                        if ($limitLatestPost < $postCountLatestPost) {
                        ?>
                            <input type="button" class="loadBtn" id="loadBtnLatestPost" value="Load More">
                        <?php } ?>
                        <input type="hidden" id="rowLatestPost" value="0">
                        <input type="hidden" id="postCountLatestPost" value="<?php echo $postCountLatestPost; ?>">
                    </div> -->


                    <!-- recommended post -->
                    <!-- <div class="heading mb-4">
                        <h2 class="fw-bold">Recommended Post<span>.</span></h2>
                    </div>

                    <div class="post-recommended-post">
                        <?php
                        $user_uid = $user_uid ?? NULL;
                        $queryfive = "SELECT * FROM `topic_follow` WHERE `user_uid` = '$user_uid'";
                        $resultfive = mysqli_query($link, $queryfive);
                        while ($rowfive = mysqli_fetch_assoc($resultfive)) {
                            $topic_follow_user_uid = $rowfive['user_uid'];
                            $tag5 = $rowfive['topic_follow'] ?? null;
                        }
                        $count_query_recommended_post = "SELECT count(*) as allcount FROM `stories` WHERE `post_status` = 'published' AND  `unlisted` = 'false'";
                        $count_result_recommended_post = mysqli_query($link, $count_query_recommended_post);
                        $count_fetch_recommended_post = mysqli_fetch_array($count_result_recommended_post);
                        $postCountRecommendedPost = $count_fetch_recommended_post['allcount'];
                        $limitRecommendedPost = 2;


                        if (mysqli_num_rows($resultfive) > 0) {
                            $query = "SELECT `stories`.*,`user_login`.`username`, 
                            `user_login`.`name`, `user_login`.`profile`
                             FROM `stories` INNER JOIN `user_login` 
                             ON `stories`.`user_uid` = `user_login`.`user_uid`
                              WHERE `post_status` = 'published' AND `unlisted` = 'false' 
                              AND `stories`.`post_tags` LIKE '%$tag5%'
                               ORDER BY post_id DESC LIMIT 0," . $limitRecommendedPost;
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
                                                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
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
                                                        echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="40" height="40"></canvas></a></div>';
                                                    } else {
                                                        echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
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
                                                    <p class="icon-color mb-0"><i class="far fa-bookmark"></i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php }}
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
                            <div class="loadMoreRecommendedPost text-center">
                                <?php
                                if ($limitRecommendedPost < $postCountRecommendedPost) {
                                ?>
                                    <input type="button" class="loadBtn" id="loadBtnRecommendedPost" value="Load More">
                                <?php } ?>
                                <input type="hidden" id="rowRecommendedPost" value="0">
                                <input type="hidden" id="postCountRecommendedPost" value="<?php echo $postCountRecommendedPost; ?>">
                             </div> -->





                    <!-- Following Posts -->

                    <!--  <div class="heading mb-4">
                        <h2 class="fw-bold">Following Post<span>.</span></h2>
                    </div>

                    <div class="post-following-post">
                        <?php
                        $user_uid = $user_uid ?? NULL;
                        $count_query_following_post = "SELECT count(*) as allcount FROM `stories` 
                        WHERE `post_status` = 'published' AND  `unlisted` = 'false'";
                        $count_result_following_post = mysqli_query($link, $count_query_following_post);
                        $count_fetch_following_post = mysqli_fetch_array($count_result_following_post);
                        $postCountFollowingPost = $count_fetch_following_post['allcount'];
                        $limitFollowingPost = 2;

                        $query = "SELECT `stories`.*, `user_login`.`username`, 
                            `user_login`.`name`, `user_login`.`profile`
                            FROM `follow`   
                            LEFT JOIN `stories`ON (`stories`.`user_uid`='$user_uid' 
                            OR `stories`.`user_uid` = `follow`.`followed_user_uid`)
                            LEFT JOIN `user_login` ON `stories`.`user_uid`=`user_login`.`user_uid`  
                            WHERE (`follow`.`following_user_uid`='$user_uid' OR `follow`.`following_user_uid`=NULL) AND
                            (`stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false') LIMIT 0," . $limitFollowingPost;
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
                                                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
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
                                                        echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="40" height="40"></canvas></a></div>';
                                                    } else {
                                                        echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
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
                                                    <p class="icon-color mb-0"><i class="far fa-bookmark"></i></p>
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
                    <div class="loadmoreFollowingPost text-center">
                        <?php
                        if ($limitFollowingPost < $postCountFollowingPost) {
                        ?>
                            <input type="button" class="loadBtn" id="loadBtnFollowingPost" value="Load More">
                        <?php } ?>
                        <input type="hidden" id="rowFollowingPost" value="0">
                        <input type="hidden" id="postCountFollowingPost" value="<?php echo $postCountFollowingPost; ?>">
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
                            <?php
                                if (isset($_SESSION['username'])) {
                                ?>
                            <div class="topic-div mb-5">
                                <div class="heading mb-4">
                                    <h4 class="fw-bold">Recommended Topics<span>.</span></h4>
                                </div>
                                <div class="topic-card shadow d-flex flex-wrap justify-content-start px-3 py-4">
                                    <?php
                                            $query = "SELECT `user_login`.`user_uid`,`topic_follow`.* FROM `topic_follow` INNER JOIN `user_login` ON `topic_follow`.`user_uid`=`user_login`.`user_uid` WHERE `topic_follow`.`user_uid`='$user_uid' ORDER BY `topic_follow`.`topic_follow_id` ASC LIMIT 10";
                                            $result = mysqli_query($link, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                    <a href="topic/<?php echo $row['topic_follow']; ?>"
                                        class="btn topic-single ms-2 mb-2 px-3"><?php echo $row['topic_follow']; ?></a>
                                    <?php }
                                            } else { ?>
                                    <h6 style="color:var(--gray-color);">No data Found</h6>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php

                                } else {

                                ?> <div class="topic-div mb-5">
                                <div class="heading mb-4">
                                    <h4 class="fw-bold">Topics<span>.</span></h4>
                                </div>
                                <div class="topic-card shadow d-flex flex-wrap justify-content-start px-3 py-4">
                                    <?php
                                            $query = "SELECT * FROM `tags` LIMIT 10";
                                            $result = mysqli_query($link, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                    <a href="topic/<?php echo $row['tag_name']; ?>"
                                        class="btn topic-single ms-2 mb-2 px-3"><?php echo $row['tag_name']; ?></a>
                                    <?php }
                                            } else { ?>
                                    <h6 style="color:var(--gray-color);">No data Found</h6>
                                    <?php } ?>
                                </div>
                            </div><?php } ?>


                            <!-- newsletter -->
                            <!-- <div class="newsletter-div mb-5">
                                <div class="heading mb-4">
                                    <h4 class="fw-bold">Newsletter<span>.</span></h4>
                                </div>
                                <div class="newsletter-card shadow px-3 py-4">
                                    <p class="text-muted text-center">Make sure to subscribe to our newsletter and be the first to know the news.</p>
                                    <form action="#">
                                        <div class="form-group mb-3">
                                            <input type="email" class="form-control form-control-lg newsletter-input" placeholder="Email Address">
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button type="button" class="btn button-primary btn-lg">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
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
            var limit = 2;
            row = row + limit;
            $('#rowLatestPost').val(row);
            $("#loadBtnLatestPost").val('Loading...');

            $.ajax({
                type: 'POST',
                url: 'php/loadMoreLatestPost.php',
                data: 'row=' + row,
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
        $(document).on('click', '#loadBtnRecommendedPost', function() {
            var row = Number($('#rowRecommendedPost').val());
            var count = Number($('#postCountRecommendedPost').val());
            var limit = 2;
            row = row + limit;
            $('#rowRecommendedPost').val(row);
            $("#loadBtnRecommendedPost").val('Loading...');
            var user_uid = '<?php echo $user_uid ?>';

            $.ajax({
                type: 'POST',
                url: 'php/loadMoreRecommendedPost.php',
                data: {
                    'row': row,
                    'user_uid': user_uid
                },
                success: function(data) {
                    var rowCount = row + limit;
                    $('.post-recommended-post').append(data);
                    if (rowCount >= count) {
                        $('#loadBtnRecommendedPost').css("display", "none");
                    } else {
                        $("#loadBtnRecommendedPost").val('Load More');
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
    $(document).ready(function() {
        $(".avatar-image2").letterpic({
            colors: [
                "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60",
                "#2980b9", "#8e44ad", "#2c3e50",
                "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400",
                "#c0392b", "#bdc3c7", "#7f8c8d"
            ],
            font: 'Inter'
        });
        $(document).on('click', '#loadBtnFollowingPost', function() {
            var row = Number($('#rowFollowingPost').val());
            var count = Number($('#postCountFollowingPost').val());
            var limit = 4;
            row = row + limit;
            $('#rowFollowingPost').val(row);
            $("#loadBtnFollowingPost").val('Loading...');
            var user_uid = '<?php echo $user_uid ?>';


            $.ajax({
                type: 'POST',
                url: 'php/loadMoreFollowingPost.php',
                data: {
                    'row': row,
                    'user_uid': user_uid
                },
                success: function(data) {
                    var rowCount = row + limit;
                    $('.post-following-post').append(data);
                    if (rowCount >= count) {
                        $('#loadBtnFollowingPost').css("display", "none");
                    } else {
                        $("#loadBtnFollowingPost").val('Load More');
                    }
                    $(".avatar-image2").letterpic({
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