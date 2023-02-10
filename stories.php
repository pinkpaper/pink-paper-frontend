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
    <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="assets/toastr/toastr.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">

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
                width: 68% !important;
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
            display: none;
        }
    </style>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TNWHRNG');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body onload="loader()">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNWHRNG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
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
    <input type="hidden" name="userUid" value="<?= $userUid ?>" id="userUid">
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Your
                            Stories</h1>
                        <a href="create-story" class="btn button-outline-primary">Write Story</a>
                    </div>


                    <ul class="nav nav-tabs nav-pills mb-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="drafts-tab" data-bs-toggle="tab" href="#drafts" role="tab" aria-controls="drafts" aria-selected="true">Drafts</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="published-tab" data-bs-toggle="tab" href="#published" role="tab" aria-controls="published" aria-selected="false">Published</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="schedule-tab" data-bs-toggle="tab" href="#schedule" role="tab" aria-controls="schedule" aria-selected="false">Schedule</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="unlisted-tab" data-bs-toggle="tab" href="#unlisted" role="tab" aria-controls="unlisted" aria-selected="false">Unlisted</a>
                        </li>
                        <li class="nav-item" id="sort_article" role="presentation">
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
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="drafts" role="tabpanel" aria-labelledby="drafts-tab">
                            <div class="post-draft">
                                <!-- draft data write here -->
                            </div>
                            <div class="loadmoreDraft text-center">
                                <?php
                                $count_query_draft = "SELECT count(*) as allcount FROM `stories` WHERE `user_uid` = '$userUid' AND `post_status` = 'draft' AND `unlisted` = 'false'";
                                $count_result_draft = mysqli_query($link, $count_query_draft);
                                $count_fetch_draft = mysqli_fetch_array($count_result_draft);
                                $postCountDraft = $count_fetch_draft['allcount'];
                                $limitDraft = 10;
                                if ($limitDraft < $postCountDraft) {
                                ?>
                                    <input type="button" class="loadBtn" id="loadBtnDraft" value="Load More">
                                <?php } ?>
                                <input type="hidden" id="rowDraft" value="0">
                                <input type="hidden" id="postCountDraft" value="<?php echo $postCountDraft; ?>">
                            </div>
                        </div>


                        <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
                            <div class="post-published">
                                <!-- published data write here -->
                            </div>
                            <div class="loadmorePublished text-center">
                                <?php
                                $count_query_published = "SELECT count(*) as allcount FROM `stories` WHERE `user_uid` = '$userUid' AND `post_status` = 'published' AND `unlisted` = 'false'";
                                $count_result_published = mysqli_query($link, $count_query_published);
                                $count_fetch_published = mysqli_fetch_array($count_result_published);
                                $postCountPublished = $count_fetch_published['allcount'];
                                $limitPublished = 10;
                                if ($limitPublished < $postCountPublished) {
                                ?>
                                    <input type="button" class="loadBtn" id="loadBtnPublished" value="Load More">
                                <?php } ?>
                                <input type="hidden" id="rowPublished" value="0">
                                <input type="hidden" id="postCountPublished" value="<?php echo $postCountPublished; ?>">
                            </div>
                        </div>


                        <div class="tab-pane fade" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">
                            <div class="post-schedule">
                                <!-- schedule data write here -->
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
                                    <input type="button" class="loadBtn" id="loadBtnSchedule" value="Load More">
                                <?php } ?>
                                <input type="hidden" id="rowSchedule" value="0">
                                <input type="hidden" id="postCountSchedule" value="<?php echo $postCountSchedule; ?>">
                            </div>
                        </div>


                        <div class="tab-pane fade" id="unlisted" role="tabpanel" aria-labelledby="unlisted-tab">
                            <div class="post-unlisted">
                                <!-- unlisted data write here -->
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
                                    <input type="button" class="loadBtn" id="loadBtnUnlisted" value="Load More">
                                <?php } ?>
                                <input type="hidden" id="rowUnlisted" value="0">
                                <input type="hidden" id="postCountUnlisted" value="<?php echo $postCountUnlisted; ?>">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#loadBtnDraft', function() {
                var row = Number($('#rowDraft').val());
                var count = Number($('#postCountDraft').val());
                var limit = 2;
                row = row + limit;
                $('#rowDraft').val(row);
                $("#loadBtnDraft").val('Loading...');

                $.ajax({
                    type: 'POST',
                    url: 'php/loadMoreDraftData.php',
                    data: 'row=' + row,
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


            $(document).on('click', '#loadBtnPublished', function() {
                var row = Number($('#rowPublished').val());
                var count = Number($('#postCountPublished').val());
                var limit = 2;
                row = row + limit;
                $('#rowPublished').val(row);
                $("#loadBtnPublished").val('Loading...');

                $.ajax({
                    type: 'POST',
                    url: 'php/loadMorePublishedData.php',
                    data: 'row=' + row,
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
                $('#rowUnlisted').val(row);
                $("#loadBtnUnlisted").val('Loading...');

                $.ajax({
                    type: 'POST',
                    url: 'php/loadMoreUnlistedData.php',
                    data: 'row=' + row,
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

            $(document).on('click', '#loadBtnSchedule', function() {
                var row = Number($('#rowSchedule').val());
                var count = Number($('#postCountSchedule').val());
                var limit = 2;
                row = row + limit;
                $('#rowSchedule').val(row);
                $("#loadBtnSchedule").val('Loading...');

                $.ajax({
                    type: 'POST',
                    url: 'php/loadMoreScheduleData.php',
                    data: 'row=' + row,
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

        var clipboard = new ClipboardJS('#copy_url');

        clipboard.on('success', function(e) {
            toastr["error"]("url copied.");
            e.clearSelection();
        });

        clipboard.on('error', function(e) {
            toastr["error"]("error");
        });
    </script>
</body>

</html>