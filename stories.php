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
        $profile = $fetch_info['profile'];
        $userUid = $fetch_info['user_uid'];
        $user_uid = $userUid;
        $code = $fetch_info['code'];
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
$meta_title = 'Blog';
$category_description = 'Start curating your thoughts in a decentralized and autonomous environment for your communities to browse without perjury and risk of prosecution from anywhere around the globe.';
$meta_description = implode(' ', array_slice(explode(' ', $category_description), 0, 15)) . "\n";
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <meta property="og:image" itemprop="image" content="https://test.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
    <meta property="og:image:secure_url" itemprop="image" content="https://test.pinkpaper.xyz/assets/images/logo/logo_icon.png" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
    <script src="assets/feather/feather.min.js"></script>


    <!-- stylesheet -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="assets/toastr/toastr.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/medium.css" />
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/js/popr/popr.css">
    <link rel="stylesheet" href="assets/css/croudFundingUI.css">
    <style>
        #sort_article {
            width: 100%;
            display: flex;
            justify-content: end;
            align-items: center;
        }

        .div-width {
            width: 300px;
        }

        @media screen and (min-width: 1400px) {
            #sort_article {
                width: 100% !important;
            }

            .div-width {
                width: 300px !important;
            }
        }

        @media screen and (min-width: 1200px) and (max-width: 1400px) {
            #sort_article {
                width: 64% !important;
            }

            .div-width {
                width: 300px !important;
            }
        }

        @media screen and (min-width: 991px) and (max-width: 1200px) {
            #sort_article {
                width: 56% !important;
            }

            .div-width {
                width: 250px !important;
            }
        }

        @media screen and (min-width: 768px) and (max-width: 991px) {
            #sort_article {
                width: 42% !important;
            }

            .div-width {
                width: 220px !important;
            }
        }

        @media screen and (min-width: 576px) and (max-width: 768px) {
            #sort_article {
                width: 23% !important;
            }

            .div-width {
                width: 200px !important;
            }
        }

        @media screen and (max-width: 576px) {
            #sort_article {
                width: 100% !important;
            }

            .div-width {
                width: 200px !important;
            }
        }

        #sort_article>select {
            padding: 0.2rem 0.4rem;
            border-color: #dfdfdf;
            color: grey;
            border-radius: 10px;
            outline: none;
        }

        #draft_sort_id,
        #published_sort_id,
        #unlisted_sort_id,
        #chedule_sort_id {
            display: block;
        }

        .withdraw {
            background-color: #f44336;
            padding: 0.2rem 0.4rem;
            color: #fff;
            border-radius: 10px;
            font-size: 0.75rem;
        }
    </style>
</head>

<body onload="loader()">

    <!-- loader start-->
    <div class="loader-container">
        <div class="loadingio-spinner-ellipsis-tjmuel5ie5">
            <div class="ldio-g2ezeznggp">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- loader end-->

    <button id="back-to-top" class="btn btn-lg back-to-top text-white"><i class="fas fa-chevron-up"></i></button>

    <!-- stories content start -->
    <input type="hidden" name="userUid" value="<?= $userUid ?>" id="userUid">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 d-flex justify-content-center">
                <!-- side menu include here start -->
                <?php include('include/side-menu-medium-top.php'); ?>
                <?php include('include/side-menu-medium.php'); ?>
                <?php include('include/side-menu-medium-bottom.php'); ?>
                <!-- side menu include here end -->
            </div>
            <div class="col-lg-8 col-md-12 side-border">
                <div>
                    <div class="content-panel mt-5 m-lg-5 pt-4 pt-lg-0">
                        <div>
                            <div class="stories-top-panel-wrapper">
                                <div class="stories-top-panel-inner">
                                    <div class="stories-top-panel-div-wrapper">
                                        <div class="stories-top-panel-heading-div">
                                            <h1 class="stories-top-panel-heading">Your stories</h1>
                                        </div>
                                        <div class="stories-top-panel-div-second">
                                            <a class="stories-top-panel-div-second-anchor" href="create-story" rel="noopener follow">
                                                Write a story
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div style="overflow-x: auto;">
                                    <div class="stories-top-panel-heading-container-wrapper">
                                        <div class="stories-top-panel-heading-container-inner">
                                            <ul id="scroller-items" class="stories-top-panel-heading-container-inner-div nav nav-tabs d-flex flex-row flex-nowrap" role="tablist">
                                                <li class="stories-top-panel-heading-container-each-wrapper nav-item">
                                                    <a class="stories-top-panel-heading-container-each-anchor nav-link active border-none" id="drafts-tab" data-bs-toggle="tab" href="#drafts" role="tab" aria-controls="drafts" aria-selected="true">
                                                        <p class="stories-top-panel-para stories-top-panel-para-new-para">
                                                            <span class="stories-top-panel-para-span" id="drafts-tab">Drafts</span>
                                                        </p>
                                                    </a>
                                                </li>
                                                <li class="stories-top-panel-heading-container-each-wrapper nav-item">
                                                    <a class="stories-top-panel-heading-container-each-anchor nav-link border-none" id="published-tab" data-bs-toggle="tab" href="#published" role="tab" aria-controls="published" aria-selected="false">
                                                        <p class="stories-top-panel-para stories-top-panel-para-new-para">
                                                            <span class="stories-top-panel-para-span">Published</span>
                                                        </p>
                                                    </a>
                                                </li>
                                                <li class="stories-top-panel-heading-container-each-wrapper nav-item">
                                                    <a class="stories-top-panel-heading-container-each-anchor nav-link border-none" id="schedule-tab" data-bs-toggle="tab" href="#schedule" role="tab" aria-controls="schedule" aria-selected="false">
                                                        <p class="stories-top-panel-para stories-top-panel-para-new-para">
                                                            <span class="stories-top-panel-para-span">Schedule</span>
                                                        </p>
                                                    </a>
                                                </li>
                                                <li class="stories-top-panel-heading-container-each-wrapper nav-item">
                                                    <a class="stories-top-panel-heading-container-each-anchor nav-link border-none" id="unlisted-tab" data-bs-toggle="tab" href="#unlisted" role="tab" aria-controls="unlisted" aria-selected="false">
                                                        <p class="stories-top-panel-para stories-top-panel-para-new-para">
                                                            <span class="stories-top-panel-para-span">Unlisted</span>
                                                        </p>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="sort_panel w-100">
                                                <div id="sort_article flex-fill">
                                                    <select name="draft" id="draft_sort_id" onChange="sortDraftData()">
                                                        <option value="">Sort by</option>
                                                        <option value="name">Name</option>
                                                        <option value="date">Date</option>
                                                    </select>
                                                    <select name="published" id="published_sort_id" onChange="sortPublishedData()">
                                                        <option value="">Sort by</option>
                                                        <option value="name">Name</option>
                                                        <option value="date">Date</option>
                                                    </select>
                                                    <select name="schedule" id="schedule_sort_id" onChange="sortScheduleData()">
                                                        <option value="">Sort by</option>
                                                        <option value="name">Name</option>
                                                        <option value="date">Date</option>
                                                    </select>
                                                    <select name="unlisted" id="unlisted_sort_id" onChange="sortUnlistedData()">
                                                        <option value="">Sort by</option>
                                                        <option value="name">Name</option>
                                                        <option value="date">Date</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" role="tabpanel" id="drafts" aria-labelledby="drafts-tab">
                                    <!-- draft data write here -->
                                    <div class="post-draft">
                                    </div>
                                    <div class="loadmoreLatestPost text-center">
                                        <?php
                                        $count_query_draft = "SELECT count(*) as allcount FROM `stories` WHERE `user_uid` = '$userUid' AND `post_status` = 'draft' AND `unlisted` = 'false'";
                                        $count_result_draft = mysqli_query($link, $count_query_draft);
                                        $count_fetch_draft = mysqli_fetch_array($count_result_draft);
                                        $postCountDraft = $count_fetch_draft['allcount'];
                                        $limitDraft = 10;
                                        if ($limitDraft < $postCountDraft) {
                                        ?>
                                            <input type="button" class="audience-button px-5 my-4" id="loadBtnDraft" value="Load More">
                                        <?php } ?>
                                        <input type="hidden" id="rowDraft" value="0">
                                        <input type="hidden" id="postCountDraft" value="<?php echo $postCountDraft; ?>">
                                    </div>
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="published" aria-labelledby="published-tab">
                                    <!-- published data write here -->
                                    <div class="post-published">
                                    </div>
                                    <div class="loadmoreLatestPost text-center">
                                        <?php
                                        $count_query_published = "SELECT count(*) as allcount FROM `stories` WHERE `user_uid` = '$userUid' AND `post_status` = 'published' AND `unlisted` = 'false'";
                                        $count_result_published = mysqli_query($link, $count_query_published);
                                        $count_fetch_published = mysqli_fetch_array($count_result_published);
                                        $postCountPublished = $count_fetch_published['allcount'];
                                        $limitPublished = 10;
                                        if ($limitPublished < $postCountPublished) {
                                        ?>
                                            <input type="button" class="audience-button px-5 my-4" id="loadBtnPublished" value="Load More">
                                        <?php } ?>
                                        <input type="hidden" id="rowPublished" value="0">
                                        <input type="hidden" id="postCountPublished" value="<?php echo $postCountPublished; ?>">
                                    </div>
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="schedule" aria-labelledby="schedule-tab">
                                    <!-- schedule data write here -->
                                    <div class="post-schedule">
                                    </div>
                                    <div class="loadmoreSchedule text-center">
                                        <?php
                                        $count_query_schedule = "SELECT count(*) as allcount FROM `stories` WHERE `user_uid` = '$userUid' AND `post_status` = 'schedule' AND `unlisted` = 'false'";
                                        $count_result_schedule = mysqli_query($link, $count_query_schedule);
                                        $count_fetch_schedule = mysqli_fetch_array($count_result_schedule);
                                        $postCountSchedule = $count_fetch_schedule['allcount'];
                                        $limitSchedule = 10;
                                        if ($limitSchedule < $postCountSchedule) {
                                        ?>
                                            <input type="button" class="audience-button px-5 my-4" id="loadBtnSchedule" value="Load More">
                                        <?php } ?>
                                        <input type="hidden" id="rowSchedule" value="0">
                                        <input type="hidden" id="postCountSchedule" value="<?php echo $postCountSchedule; ?>">
                                    </div>
                                </div>
                                <div class="tab-pane fade" role="tabpanel" id="unlisted" aria-labelledby="unlisted-tab">
                                    <!-- unlisted data write here -->
                                    <div class="post-unlisted">
                                    </div>
                                    <div class="loadmoreUnlisted text-center">
                                        <?php
                                        $count_query_unlisted = "SELECT count(*) as allcount FROM `stories` WHERE `user_uid` = '$userUid' AND `post_status` = 'published' AND  `unlisted` = 'true'";
                                        $count_result_unlisted = mysqli_query($link, $count_query_unlisted);
                                        $count_fetch_unlisted = mysqli_fetch_array($count_result_unlisted);
                                        $postCountUnlisted = $count_fetch_unlisted['allcount'];
                                        $limitUnlisted = 10;
                                        if ($limitUnlisted < $postCountUnlisted) {
                                        ?>
                                            <input type="button" class="audience-button px-5 my-4" id="loadBtnUnlisted" value="Load More">
                                        <?php } ?>
                                        <input type="hidden" id="rowUnlisted" value="0">
                                        <input type="hidden" id="postCountUnlisted" value="<?php echo $postCountUnlisted; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block col-lg-3">
                <div class="h-100 position-relative d-inline-block">
                    <div class="sticky-top">
                        <div class="h-100">
                            <div class="search-wrapper">
                                <div class="am lz ma mb">
                                    <div class="cp" aria-hidden="false" aria-describedby="searchResults" aria-labelledby="searchResults"></div><span class="mg y"><svg width="25" height="25" viewBox="0 0 25 25" fill="rgba(8, 8, 8, 1)">
                                            <path d="M20.07 18.93l-4.16-4.15a6 6 0 1 0-.88.88l4.15 4.16a.62.62 0 1 0 .89-.89zM6.5 11a4.75 4.75 0 1 1 9.5 0 4.75 4.75 0 0 1-9.5 0z">
                                            </path>
                                        </svg></span>
                                    <input type="search" id="searchtext2" name="searchtext" class="ks mc bv bw bx ae md me by mf" placeholder="Search">
                                </div>
                            </div>
                            <div class="lw lx ly y">
                                <div class="tr y">
                                    <a class="ay az ba bb bc bd be bf bg bh bi bj bk bl bm" rel="noopener follow" href="trending-post">
                                        <h2 class="bv fh ec bx fk by"><span class="pointer"></span>Trending Post
                                        </h2>
                                    </a>
                                </div>
                                <!-- data set start -->
                                <?php
                                $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`,`post_views`.* FROM `stories` 
                    INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` 
                    INNER JOIN `post_views` ON `stories`.`post_uid`=`post_views`.`post_uid`  WHERE `stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false' GROUP BY `stories`.`post_uid` ORDER BY `post_views`.`post_per_day_views` DESC LIMIT 3";
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <div class="tw y">
                                            <div class="ae cx">
                                                <div class="hh y">
                                                    <div class="am bq ax">
                                                        <a rel="noopener follow" href="<?php echo $row['username']; ?>">
                                                            <div class="y cu">
                                                                <?php
                                                                if ($row['profile'] == '') {
                                                                    echo '<canvas class="avatar-image y co ni go gp en" title="' . $row['name'] . '" width="40" height="40"></canvas>';
                                                                } else {
                                                                    echo ' <img src="uploads/profile/' . $row['profile'] . '" alt="" class="y co ni go gp en" width="20" height="20" loading="lazy">';
                                                                }
                                                                ?>
                                                                <div class="nh ni y go gp nl ah"></div>
                                                            </div>
                                                        </a>
                                                        <div class="rb am bq er">
                                                            <a class="ay az ba bb bc bd be bf bg bh bi bj bk bl bm" rel="noopener follow" href="<?php echo $row['username']; ?>">
                                                                <h4 class="bv fh hw mx ct tx nn no np nq nr ns by ty mb-0 mx-2">
                                                                    <?php echo $row['name']; ?></h4>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tz y">
                                                    <a class="ay az ba bb bc bd be bf bg bh bi bj bk bl bm" rel="noopener follow" href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                                                        <h2 class="bv ph ec bx fk by"><?php echo $row['post_title']; ?></h2>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <!-- data set end -->
                                <p class="bv b hw bx jp"><a class="ay az ba bb bc bd be bf bg bh bi bj bk bl bm" rel="noopener follow" href="trending-post">See the full list</a></p>
                            </div>
                            <div class="lw lx ly y">
                                <div class="y">
                                    <div class="mo y pb-2">
                                        <h2 class="bv fh ec bx fk by">Recommended topics</h2>
                                    </div>
                                    <div class="inner-wrapper-tag">
                                        <!-- data set start -->
                                        <?php
                                        if (isset($_SESSION['username'])) {
                                        ?>
                                            <?php
                                            $query = "SELECT `user_login`.`user_uid`,`topic_follow`.* FROM `topic_follow` INNER JOIN `user_login` ON `topic_follow`.`user_uid`=`user_login`.`user_uid` WHERE `topic_follow`.`user_uid`='$user_uid' ORDER BY `topic_follow`.`topic_follow_id` ASC LIMIT 10";
                                            $result = mysqli_query($link, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <div class="wrapper-tag">
                                                        <a class="tag-style" rel="noopener follow" href="topic/<?php echo $row['topic_follow']; ?>">
                                                            <div class="tag-name-style"><?php echo $row['topic_follow']; ?></div>
                                                        </a>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <h6 style="color:var(--gray-color);">No data Found</h6>
                                            <?php } ?>

                                        <?php
                                        } else {
                                        ?>

                                            <?php
                                            $query = "SELECT * FROM `tags` LIMIT 10";
                                            $result = mysqli_query($link, $query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <div class="wrapper-tag">
                                                        <a class="tag-style" rel="noopener follow" href="topic/<?php echo $row['tag_name']; ?>">
                                                            <div class="tag-name-style"><?php echo $row['tag_name']; ?></div>
                                                        </a>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <h6 style="color:var(--gray-color);">No data Found</h6>
                                            <?php } ?>

                                        <?php } ?>
                                        <!-- date set end -->
                                    </div>
                                </div>
                            </div>
                            <div class="lw lx ly y">
                                <div class="y">
                                    <div class="y">
                                        <div class="y">
                                            <div class="y">
                                                <h2 class="follow-title">Top Writers</h2>
                                            </div>
                                        </div>
                                        <div class="y">
                                            <?php
                                            $query_follow = "SELECT * FROM `user_login` group by user_uid ORDER BY RAND() LIMIT 3";
                                            $result_follow = mysqli_query($link, $query_follow);
                                            if (mysqli_num_rows($result_follow) > 0) {
                                                while ($row_follow = mysqli_fetch_assoc($result_follow)) {
                                                    $profile_img_user = $row_follow['profile'];
                                                    $profile_user_uid_user = $row_follow['user_uid'];
                                                    $profile_name_user = $row_follow['name'];
                                                    $profile_username_user = $row_follow['username'];
                                                    $profile_bio_user = substr($row_follow['bio'], 0, 25) . '...';
                                            ?>
                                                    <div class="ae cx follow_reload">
                                                        <div class="follow-wrapper">
                                                            <div class="follow-wrapper-inner">
                                                                <a rel="noopener follow" href="<?= $profile_username_user ?>">
                                                                    <div class="y cu">
                                                                        <?php
                                                                        if ($profile_img_user == '') {
                                                                            echo '<canvas class="avatar-image rounded-circle y co ni py pz en" title="' . $profile_name_user . '" width="48" height="48"></canvas><div class="img-blank">';
                                                                        } else {
                                                                            echo '<img src="uploads/profile/' . $profile_img_user . '" alt="" class="y co ni py pz en" width="48" height="48" loading="lazy"><div class="img-blank">';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                            </div>
                                                            </a>
                                                            <div class="follow-wrapper-text">
                                                                <a class="follow-wrapper-text-inner" rel="noopener follow" href="<?= $profile_username_user ?>">
                                                                    <h2 class="follow-name"><?= $profile_name_user ?></h2>
                                                                    <div class="follow-desc">
                                                                        <p class="follow-para"><?= $profile_bio_user ?></p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!-- button set here start -->
                                                        <?php
                                                        $user_uid2 = $user_uid ?? null;
                                                        $sql20 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid2' AND followed_user_uid = '$profile_user_uid_user'";
                                                        $run_Sql20 = mysqli_query($link, $sql20);
                                                        $fetch_info20 = mysqli_fetch_assoc($run_Sql20);

                                                        $following_user_uid = $fetch_info20['following_user_uid'] ?? null;
                                                        $followed_user_uid = $fetch_info20['followed_user_uid'] ?? null;
                                                        if (!isset($_SESSION['username'])) {
                                                            echo '<button type="button" class="follow-button" onClick="login()">Follow</button>';
                                                        } else if ($user_uid2 == $profile_user_uid_user) {
                                                            //echo '';
                                                        } else if ($following_user_uid == $user_uid2 && $followed_user_uid == $profile_user_uid_user) {
                                                            echo '<button type="button" class="follow-button following-button" onClick="unfollow(\'' . $user_uid . '\',\'' . $profile_user_uid_user . '\')">Following</button>';
                                                        } else {
                                                            echo '<button type="button" class="follow-button" onClick="follow(\'' . $user_uid . '\',\'' . $profile_user_uid_user . '\')">Follow</button>';
                                                        }
                                                        ?>
                                                        <!-- button set here end -->
                                                    </div>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="more-text-wrapper">
                                    <p class="more-text-wrapper-innner">
                                        <a class="more-text-style" rel="noopener follow" href="all-writers">See
                                            more</a>
                                    </p>
                                </div>
                            </div>
                            <div class="lw lx ly y">
                                <div class="y">
                                    <h2 class="reading-list-heading">Reading list</h2>
                                    <div class="click-me-wrapper">
                                        <p class="click-me-para">Click the <svg width="25" height="25" viewBox="0 0 25 25" fill="none" class="ta tb">
                                                <path d="M18 2.5a.5.5 0 0 1 1 0V5h2.5a.5.5 0 0 1 0 1H19v2.5a.5.5 0 1 1-1 0V6h-2.5a.5.5 0 0 1 0-1H18V2.5zM7 7a1 1 0 0 1 1-1h3.5a.5.5 0 0 0 0-1H8a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V7z" fill="#292929"></path>
                                            </svg> on any story to easily add it to your reading list or a custom list
                                            that you
                                            can share.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="little-tag-wrapper">
                                <div class="little-tag">
                                    <a class="little-tag-anchor" href="https://discord.com/invite/NREkpnfM" rel="noopener follow" target="_blank">


                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-discord little-tag-para" viewBox="0 0 16 16">
                                            <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="little-tag">
                                    <a class="little-tag-anchor" href="https://twitter.com/Pinkpaperxyz" rel="noopener follow" target="_blank">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter little-tag-para" viewBox="0 0 16 16">
                                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="little-tag">
                                    <a class="little-tag-anchor" href="https://telegram.me/pinkpaperxyz" rel="noopener follow" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram little-tag-para" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="little-tag">
                                    <a class="little-tag-anchor" href="mailto:team@pinkpaper.xyz" rel="noopener follow" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill little-tag-para" viewBox="0 0 16 16">
                                            <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                            <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- stories content end -->


    <!-- script -->
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/sweetalert/sweetalert.min.js"></script>
    <script src="assets/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="assets/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/popr/popr.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <script type="text/javascript" src="assets/avatar/jquery.letterpic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#loadBtnDraft', function() {
                var row = Number($('#rowDraft').val());
                var count = Number($('#postCountDraft').val());
                var limit = 10;
                row = row + limit;
                $('#rowDraft').val(row);
                $("#loadBtnDraft").val('Loading...');
                const user_uids = $('#userUid').val();
                $.ajax({
                    type: 'POST',
                    url: 'php/loadMoreDraftData.php',
                    data: {
                        'row': row,
                        'user_uid': user_uids
                    },
                    success: function(data) {
                        var rowCount = row + limit;
                        $('.post-draft').append(data);
                        if (rowCount >= count) {
                            $('#loadBtnDraft').css("display", "none");
                        } else {
                            $("#loadBtnDraft").val('Load More');
                        }
                    }
                });
            });


            $(document).on('click', '#loadBtnSchedule', function() {
                var row = Number($('#rowPublished').val());
                var count = Number($('#postCountPublished').val());
                var limit = 10;
                row = row + limit;
                $('#rowPublished').val(row);
                const user_uids = $('#userUid').val();
                $("#loadBtnSchedule").val('Loading...');

                $.ajax({
                    type: 'POST',
                    url: 'php/loadMoreScheduleData.php',
                    data: {
                        'row': row,
                        'user_uid': user_uids
                    },
                    success: function(data) {
                        var rowCount = row + limit;
                        $('.post-schedule').append(data);
                        if (rowCount >= count) {
                            $('#loadBtnSchedule').css("display", "none");
                        } else {
                            $("#loadBtnSchedule").val('Load More');
                        }
                    }
                });
            });

            $(document).on('click', '#loadBtnPublished', function() {
                var row = Number($('#rowPublished').val());
                var count = Number($('#postCountPublished').val());
                var limit = 10;
                row = row + limit;
                $('#rowPublished').val(row);
                const user_uids = $('#userUid').val();
                $("#loadBtnPublished").val('Loading...');

                $.ajax({
                    type: 'POST',
                    url: 'php/loadMorePublishedData.php',
                    data: {
                        'row': row,
                        'user_uid': user_uids
                    },
                    success: function(data) {
                        var rowCount = row + limit;
                        $('.post-published').append(data);
                        if (rowCount >= count) {
                            $('#loadBtnPublished').css("display", "none");
                        } else {
                            $("#loadBtnPublished").val('Load More');
                        }
                    }
                });
            });



            $(document).on('click', '#loadBtnUnlisted', function() {
                var row = Number($('#rowUnlisted').val());
                var count = Number($('#postCountUnlisted').val());
                var limit = 2;
                row = row + limit;
                const user_uids = $('#userUid').val();
                $('#rowUnlisted').val(row);
                $("#loadBtnUnlisted").val('Loading...');

                $.ajax({
                    type: 'POST',
                    url: 'php/loadMoreUnlistedData.php',
                    data: {
                        'row': row,
                        'user_uid': user_uids
                    },
                    success: function(data) {
                        var rowCount = row + limit;
                        $('.post-unlisted').append(data);
                        if (rowCount >= count) {
                            $('#loadBtnUnlisted').css("display", "none");
                        } else {
                            $("#loadBtnUnlisted").val('Load More');
                        }
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

        function sortDraftData() {
            const sort_by = $('#draft_sort_id').val();
            const userUid = $('#userUid').val();
            $.ajax({
                url: "php/draft_article_sort.php",
                method: "POST",
                data: {
                    user_uid: userUid,
                    sort_by: sort_by,
                },
                success: function(data) {
                    $('.post-draft').html(data);
                }
            });
        }

        function sortPublishedData() {
            const sort_by = $('#published_sort_id').val();
            const userUid = $('#userUid').val();
            $.ajax({
                url: "php/pulished_article_sort.php",
                method: "POST",
                data: {
                    user_uid: userUid,
                    sort_by: sort_by,
                },
                success: function(data) {
                    $('.post-published').html(data);
                }
            });
        }

        function sortUnlistedData() {
            const sort_by = $('#unlisted_sort_id').val();
            const userUid = $('#userUid').val();
            $.ajax({
                url: "php/unlisted_article_sort.php",
                method: "POST",
                data: {
                    user_uid: userUid,
                    sort_by: sort_by,
                },
                success: function(data) {
                    $('.post-unlisted').html(data);
                }
            });
        }

        function sortScheduleData() {
            const sort_by = $('#schedule_sort_id').val();
            const userUid = $('#userUid').val();
            $.ajax({
                url: "php/schedule_article_sort.php",
                method: "POST",
                data: {
                    user_uid: userUid,
                    sort_by: sort_by,
                },
                success: function(data) {
                    $('.post-schedule').html(data);
                }
            });
        }

        sortDraftData();
        sortPublishedData();
        sortUnlistedData();
        sortScheduleData();

        function checkTabActive() {
            if ($('#drafts-tab').hasClass('active')) {
                $('#draft_sort_id').css('display', 'block');
            } else {
                $('#draft_sort_id').css('display', 'none');
            }

            if ($('#published-tab').hasClass('active')) {
                $('#published_sort_id').css('display', 'block');
            } else {
                $('#published_sort_id').css('display', 'none');
            }
            if ($('#schedule-tab').hasClass('active')) {
                $('#schedule_sort_id').css('display', 'block');
            } else {
                $('#schedule_sort_id').css('display', 'none');
            }
            if ($('#unlisted-tab').hasClass('active')) {
                $('#unlisted_sort_id').css('display', 'block');
            } else {
                $('#unlisted_sort_id').css('display', 'none');
            }
        }

        $('.nav-item').click(() => {
            checkTabActive();
        });
        checkTabActive();

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
        });


        // $('.stories-top-panel-para-span').on('click', function() {
        //     $('.stories-top-panel-para-span').removeClass('active-nav-panel');
        //     $(this).addClass('active-nav-panel');
        // })

        var clipboard = new ClipboardJS('#copy_url');

        clipboard.on('success', function(e) {
            toastr["error"]("url copied");

            e.clearSelection();
        });

        clipboard.on('error', function(e) {
            toastr["error"]("Error");
        });
    </script>
</body>

</html>