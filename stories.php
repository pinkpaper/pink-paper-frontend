<?php require_once "php/controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];

if ($email != false) {
    $sql = "SELECT * FROM user_login WHERE email = '$email'";
    $run_Sql = mysqli_query($link, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['email_status'];
        $name = $fetch_info['name'];
        $username = $fetch_info['username'];
        $profile = $fetch_info['profile'];
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
    <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="assets/toastr/toastr.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">


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


    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1 class="fw-bold text-capitalize mb-0 text-align" style="color:var(--text-color);">Your Stories</h1>
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
                            <a class="nav-link" id="unlisted-tab" data-bs-toggle="tab" href="#unlisted" role="tab" aria-controls="unlisted" aria-selected="false">Unlisted</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="drafts" role="tabpanel" aria-labelledby="drafts-tab">
                            <div class="post-draft">
                                <?php
                                $count_query_draft = "SELECT count(*) as allcount FROM `stories` WHERE `post_status` = 'draft' AND `unlisted` = 'false'";
                                $count_result_draft = mysqli_query($link, $count_query_draft);
                                $count_fetch_draft = mysqli_fetch_array($count_result_draft);
                                $postCountDraft = $count_fetch_draft['allcount'];
                                $limitDraft = 2;

                                $query = "SELECT * FROM `stories` WHERE `post_status` = 'draft' AND `unlisted` = 'false' ORDER BY post_id DESC LIMIT 0," . $limitDraft;
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                        <div class="story-post-card shadow-sm d-flex justify-content-between align-items-center px-3 py-2 mb-3 gap-2">
                                            <div>
                                                <h5 class="fw-bold text-capitalize mb-1" style="color:var(--text-color);"><?php echo $row['post_title']; ?></h5>
                                                <p class="text-muted mb-0 articles-dot"><?php echo strip_tags($row['post_content']); ?></p>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="edit-story/<?php echo $row['post_id']; ?>" class="text-link-2" role="button"><i class="icon-note"></i></a>
                                                <button class="btn text-link-2 p-0" role="button" onClick="del('<?php echo $row['post_uid']; ?>')"><i class="icon-trash"></i></button>
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
                            <div class="loadmoreDraft text-center">
                                <?php
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
                                <?php
                                $count_query_published = "SELECT count(*) as allcount FROM `stories` WHERE `post_status` = 'published' AND `unlisted` = 'false'";
                                $count_result_published = mysqli_query($link, $count_query_published);
                                $count_fetch_published = mysqli_fetch_array($count_result_published);
                                $postCountPublished = $count_fetch_published['allcount'];
                                $limitPublished = 2;

                                $query = "SELECT * FROM `stories` WHERE `post_status` = 'published' AND `unlisted` = 'false' ORDER BY post_id DESC LIMIT 0," . $limitPublished;
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                        <div class="story-post-card shadow-sm d-flex justify-content-between align-items-center px-3 py-2 mb-3 gap-2">
                                            <div>
                                                <h5 class="fw-bold text-capitalize mb-1" style="color:var(--text-color);"><?php echo $row['post_title']; ?></h5>
                                                <p class="text-muted mb-0 articles-dot"><?php echo strip_tags($row['post_content']); ?></p>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="edit-story/<?php echo $row['post_id']; ?>" class="text-link-2" role="button"><i class="icon-note"></i></a>
                                                <button class="btn text-link-2 p-0" role="button" onClick="del('<?php echo $row['post_uid']; ?>')"><i class="icon-trash"></i></button>
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
                                <input type="hidden" id="postCountPublished" value="<?php echo $postCountPublished; ?>">
                            </div>
                        </div>


                        <div class="tab-pane fade" id="unlisted" role="tabpanel" aria-labelledby="unlisted-tab">
                            <div class="post-unlisted">
                                <?php
                                $count_query_unlisted = "SELECT count(*) as allcount FROM `stories` WHERE `post_status` = 'published' AND  `unlisted` = 'true'";
                                $count_result_unlisted = mysqli_query($link, $count_query_unlisted);
                                $count_fetch_unlisted = mysqli_fetch_array($count_result_unlisted);
                                $postCountUnlisted = $count_fetch_unlisted['allcount'];
                                $limitUnlisted = 2;

                                $query = "SELECT * FROM `stories` WHERE `post_status` = 'published' AND `unlisted` = 'true' ORDER BY post_id DESC LIMIT 0," . $limitUnlisted;
                                $result = mysqli_query($link, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                        <div class="story-post-card shadow-sm d-flex justify-content-between align-items-center px-3 py-2 mb-3 gap-2">
                                            <div>
                                                <h5 class="fw-bold text-capitalize mb-1" style="color:var(--text-color);"><?php echo $row['post_title']; ?></h5>
                                                <p class="text-muted mb-0 articles-dot"><?php echo strip_tags($row['post_content']); ?></p>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a href="edit-story/<?php echo $row['post_id']; ?>" class="text-link-2" role="button"><i class="icon-note"></i></a>
                                                <button class="btn text-link-2 p-0" role="button" onClick="del('<?php echo $row['post_uid']; ?>')"><i class="icon-trash"></i></button>
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
                            <div class="loadmoreUnlisted text-center">
                                <?php
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