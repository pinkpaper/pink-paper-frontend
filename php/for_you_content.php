<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
	die("<script>console.log('There is a problem with mysql connection')</script>");
}
$user_uid = '';

if (isset($_POST['panel'])) {
if (isset($_POST['user_address'])) {
    $userAddress = $_POST['user_address'];
    if ($userAddress != '') {
        $sql = "SELECT * FROM user_login  WHERE metamask_address = '$userAddress'";
        $run_Sql = mysqli_query($link, $sql);
        if ($run_Sql) {
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $user_uid = $fetch_info['user_uid'];
        }
    }
}
$coming_data = $_POST['panel'];
$topic_req = trim($coming_data," ");
if($coming_data === 'For you'){
$count_query_latest_post = "SELECT count(*) as allcount FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` WHERE `post_status` = 'published' AND  `unlisted` = 'false'";
$count_result_latest_post = mysqli_query($link, $count_query_latest_post);
$count_fetch_latest_post = mysqli_fetch_array($count_result_latest_post);
$postCountLatestPost = $count_fetch_latest_post['allcount'];
$limitLatestPost = 10;
$start = $_POST['row'];


$query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`
FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
WHERE `post_status` = 'published' AND `unlisted` = 'false' 
ORDER BY created_at DESC LIMIT $start," . $limitLatestPost;
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="card border-0 border-bottom mb-3 card-reading-time overflow-auto for_you" style="position: inherit;">
    <?php
    if($row['is_croudfunded'] === 'true') {
    ?>
    <small class="mb-2 mx-3"><b style="color:#1a8917">crowdfunding status</b></small>
    <div class="progress_bar_panel px-3 mb-3">
        <?php
            // croud funding data get start 
                $row_post_uid = $row['post_uid'];
                $crowd_query_1 = "SELECT `post_uid`, sum(pay_amount) as total_pay,`project_address` FROM `crowd_fund` WHERE `post_uid`='$row_post_uid' GROUP BY `post_uid`,`project_address` ORDER by total_pay DESC;";

                $crowd_run_1 = mysqli_query($link, $crowd_query_1);
                if (mysqli_num_rows($crowd_run_1) > 0) {
                    $crowd_query_result = mysqli_fetch_assoc($crowd_run_1);
                    $crowd_query_post_uid = $crowd_query_result['post_uid'];
                    $crowd_query_total_pay = $crowd_query_result['total_pay'];
                    $crowd_query_project_address = $crowd_query_result['project_address'];
                }else{
                    $crowd_query_post_uid = '';
                    $crowd_query_total_pay = 0;
                    $crowd_query_project_address = '';
                }
                $number = $row['target_amount'];
                $percentage_pay = number_format(((number_format($crowd_query_total_pay,5) * 100) / number_format($number,5)),2);
                // croud funding data get end
        ?>
        <div class="progress-panel">
            <div class="get-view-wrapper" style="font-size: 0.9rem;font-weight: 800;"><span
                    id="crowd_query_total_pay_view"><?= number_format($crowd_query_total_pay,5) ?></span>&nbsp;<span
                    class="amount_in_view"><?= $row['amount_in']; ?></span></div>
            <div class="progress">
                <div class="progress-bar d-inline" role="progressbar"
                    aria-valuenow="<?= number_format($percentage_pay,0); ?>"
                    aria-valuemin="<?= number_format($percentage_pay,0); ?>" aria-valuemax="100"
                    style="width:<?= number_format($percentage_pay,0); ?>%;">
                    <span id="span_percentage_view"><?= number_format($percentage_pay,0); ?></span>%
                </div>
            </div>
            <div class="target-view-wrapper">
                <div style="font-size: 0.9rem;">
                    <span style="font-weight: 800;">
                        <span id="percentage_view"><?= $percentage_pay; ?></span>%</span>&nbsp;Collected
                </div>
                <div style="font-size: 0.9rem;"><span style="font-size: 0.9rem;font-weight: 800;"><span
                            id="target_amount_view"><?= number_format($row['target_amount'],3); ?></span>&nbsp;<span
                            id="amount_in_view"
                            class="amount_in_view"><?= $row['amount_in']; ?></span></span>&nbsp;Target
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="d-flex">
        <div class="card-body py-4 w-75">
            <div class="author d-flex justify-content-start pb-2">
                <?php
                    if ($row['profile'] == '') {
                        echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="20" height="20" style="width:25px;height:25px;"></canvas></a></div>';
                    } else {
                        echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
                    }
                    ?>
                <div class="author-name ms-2 d-flex justify-content-center align-items-center">
                    <a href="<?php echo $row['username']; ?>" class="author-link">
                        <h6 class="fw-lighter mb-0" style="font-size:14px;">
                            <?php echo $row['name']; ?></h6>
                    </a>
                    <span class="mx-1">·</span>
                    <span class="text-muted"
                        style="font-size:12px;"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></span>
                </div>
            </div>
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>"
                class="title-link articles-dot mb-0">
                <h4 class="fw-bold"><?php echo $row['post_title']; ?></h4>
            </a>
            <p class="text-muted articles-dot small mb-2">
                <?php echo strip_tags($row['post_content']); ?></p>

            <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                <div class="author d-flex justify-content-start">
                    <div class="author-name d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-wrap gap-2">
                            <?php
                                $tag_name = explode(",", $row['post_tags']);
                                foreach ($tag_name as $key => $val) {
                                    echo '<a href="topic/' . $val . '" class="topic py-0 px-2">' . $val . '</a>';
                                }
                            ?>
                        </div>
                        <span class="text-muted mx-2" style="font-size:12px;">
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
                    if (($user_uid) === '') {
                            echo '<p class="icon-color mb-0 save-reload" onClick="login()"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="social-button-inner">
                                    <path
                                        d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                        fill="#000"></path>
                                </svg></p>';
                        } else if ($list_user_uid == $user_uid2 && $list_post_uid == $post_uid) {
                            echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                aria-label="Add to list bookmark button"
                                class="social-share-other-new-wrapper-inner-button save-reload" onClick="unsave(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="vt">
                                    <path
                                        d="M7.5 3.75a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-14a2 2 0 0 0-2-2h-9z"
                                        fill="#000"></path>
                                </svg>
                            </button>';
                        } else {
                            echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                aria-label="Add to list bookmark button"
                                class="social-share-other-new-wrapper-inner-button save-reload" onClick="save(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="social-button-inner">
                                    <path
                                        d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                        fill="#000"></path>
                                </svg>
                            </button>';
                        }
                        ?>
                </div>
            </div>
        </div>
        <?php 
        if($row['featured_image'] !== ''){
        ?>
        <div class="card-img p-2 w-25">
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                <?php
                if ($row['featured_image'] == '') {
                    echo '<img src="assets/images/blogcms.com.png" alt="image" class="shadow" style="height: 112px;width:112px;   object-fit: cover;">';
                } else {
                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" style="height: 112px;width:112px;   object-fit: cover;" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
                }
                ?>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<?php 
    }}else{
    if($start ==0){
        ?>
<div class="my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
            <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data
            </h6>
            <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story or <a href="./" class="text-link-3 fw-bold ">read</a>
                on Blog CMS.</h6>
        </div>
    </div>
</div>
<?php
    }
}
?>
<div class="loadmoreLatestPost text-center">
    <?php
        if ($start < $postCountLatestPost) {
    ?>
    <input type="button" class="audience-button px-5" id="loadBtnLatestPost" value="Load More">
    <?php } ?>
    <input type="hidden" id="rowLatestPost" value="0">
    <input type="hidden" id="clickedpanelId" value="<?= $coming_data ?>">
    <input type="hidden" id="postCountLatestPost" value="<?php echo $postCountLatestPost; ?>">
</div>
<?php
}else if($coming_data === 'Crowdfunding'){
$count_query_latest_post = "SELECT count(*) as allcount FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
WHERE `post_status` = 'published' AND `is_croudfunded` = 'true' AND `unlisted` = 'false'";
$count_result_latest_post = mysqli_query($link, $count_query_latest_post);
$count_fetch_latest_post = mysqli_fetch_array($count_result_latest_post);
$postCountLatestPost = $count_fetch_latest_post['allcount'];
$limitLatestPost = 10;
$start = $_POST['row'];

$query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`
FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
WHERE `post_status` = 'published' AND `is_croudfunded` = 'true' AND `unlisted` = 'false' 
ORDER BY created_at DESC LIMIT 0," . $limitLatestPost;
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="card border-0 border-bottom mb-3 card-reading-time overflow-auto" style="position: inherit;">
    <?php
    if($row['is_croudfunded'] === 'true') {
    ?>
    <small class="mb-2 mx-3"><b style="color:#1a8917">crowdfunding status</b></small>
    <div class="progress_bar_panel px-3 mb-3">
        <?php
            // croud funding data get start 
                $row_post_uid = $row['post_uid'];
                $crowd_query_1 = "SELECT `post_uid`, sum(pay_amount) as total_pay,`project_address` FROM `crowd_fund` WHERE `post_uid`='$row_post_uid' GROUP BY `post_uid`,`project_address` ORDER by total_pay DESC;";

                $crowd_run_1 = mysqli_query($link, $crowd_query_1);
                if (mysqli_num_rows($crowd_run_1) > 0) {
                    $crowd_query_result = mysqli_fetch_assoc($crowd_run_1);
                    $crowd_query_post_uid = $crowd_query_result['post_uid'];
                    $crowd_query_total_pay = $crowd_query_result['total_pay'];
                    $crowd_query_project_address = $crowd_query_result['project_address'];
                }else{
                    $crowd_query_post_uid = '';
                    $crowd_query_total_pay = 0;
                    $crowd_query_project_address = '';
                }
                $number = $row['target_amount'];
                $percentage_pay = number_format(((number_format($crowd_query_total_pay,5) * 100) / number_format($number,5)),2);
                // croud funding data get end
        ?>
        <div class="progress-panel">
            <div class="get-view-wrapper" style="font-size: 0.9rem;font-weight: 800;"><span
                    id="crowd_query_total_pay_view"><?= number_format($crowd_query_total_pay,5) ?></span>&nbsp;<span
                    class="amount_in_view"><?= $row['amount_in']; ?></span></div>
            <div class="progress">
                <div class="progress-bar d-inline" role="progressbar"
                    aria-valuenow="<?= number_format($percentage_pay,0); ?>"
                    aria-valuemin="<?= number_format($percentage_pay,0); ?>" aria-valuemax="100"
                    style="width:<?= number_format($percentage_pay,0); ?>%;">
                    <span id="span_percentage_view"><?= number_format($percentage_pay,0); ?></span>%
                </div>
            </div>
            <div class="target-view-wrapper">
                <div style="font-size: 0.9rem;">
                    <span style="font-weight: 800;">
                        <span id="percentage_view"><?= $percentage_pay; ?></span>%</span>&nbsp;Collected
                </div>
                <div style="font-size: 0.9rem;"><span style="font-size: 0.9rem;font-weight: 800;"><span
                            id="target_amount_view"><?= number_format($row['target_amount'],3); ?></span>&nbsp;<span
                            id="amount_in_view"
                            class="amount_in_view"><?= $row['amount_in']; ?></span></span>&nbsp;Target
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="d-flex">
        <div class="card-body py-4 w-75">
            <div class="author d-flex justify-content-start pb-2">
                <?php
                    if ($row['profile'] == '') {
                        echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="20" height="20" style="width:25px;height:25px;"></canvas></a></div>';
                    } else {
                        echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
                    }
                    ?>
                <div class="author-name ms-2 d-flex justify-content-center align-items-center">
                    <a href="<?php echo $row['username']; ?>" class="author-link">
                        <h6 class="fw-lighter mb-0" style="font-size:14px;">
                            <?php echo $row['name']; ?></h6>
                    </a>
                    <span class="mx-1">·</span>
                    <span class="text-muted"
                        style="font-size:12px;"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></span>
                </div>
            </div>
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>"
                class="title-link articles-dot mb-0">
                <h4 class="fw-bold"><?php echo $row['post_title']; ?></h4>
            </a>
            <p class="text-muted articles-dot small mb-2">
                <?php echo strip_tags($row['post_content']); ?></p>

            <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                <div class="author d-flex justify-content-start">
                    <div class="author-name d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-wrap gap-2">
                            <?php
                                $tag_name = explode(",", $row['post_tags']);
                                foreach ($tag_name as $key => $val) {
                                    echo '<a href="topic/' . $val . '" class="topic py-0 px-2">' . $val . '</a>';
                                }
                            ?>
                        </div>
                        <span class="text-muted mx-2" style="font-size:12px;">
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
                    if (($user_uid) === '') {
                            echo '<p class="icon-color mb-0 save-reload" onClick="login()"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="social-button-inner">
                                    <path
                                        d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                        fill="#000"></path>
                                </svg></p>';
                        } else if ($list_user_uid == $user_uid2 && $list_post_uid == $post_uid) {
                            echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                aria-label="Add to list bookmark button"
                                class="social-share-other-new-wrapper-inner-button save-reload" onClick="unsave(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="vt">
                                    <path
                                        d="M7.5 3.75a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-14a2 2 0 0 0-2-2h-9z"
                                        fill="#000"></path>
                                </svg>
                            </button>';
                        } else {
                            echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                aria-label="Add to list bookmark button"
                                class="social-share-other-new-wrapper-inner-button save-reload" onClick="save(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="social-button-inner">
                                    <path
                                        d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                        fill="#000"></path>
                                </svg>
                            </button>';
                        }
                        ?>
                </div>
            </div>
        </div>
        <?php 
        if($row['featured_image'] !== ''){
        ?>
        <div class="card-img p-2 w-25">
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                <?php
                if ($row['featured_image'] == '') {
                    echo '<img src="assets/images/blogcms.com.png" alt="image" class="shadow" style="height: 112px;width:112px;   object-fit: cover;">';
                } else {
                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" style="height: 112px;width:112px;   object-fit: cover;" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
                }
                ?>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<?php
}}else{
    if($start ==0){
        ?>
<div class="my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
            <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data
            </h6>
            <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story or <a href="./" class="text-link-3 fw-bold ">read</a>
                on Blog CMS.</h6>
        </div>
    </div>
</div>
<?php
    }
}
?>
<div class="loadmoreLatestPost text-center">
    <?php
        if ($start < $postCountLatestPost) {
    ?>
    <input type="button" class="audience-button px-5" id="loadBtnLatestPost" value="Load More">
    <?php } ?>
    <input type="hidden" id="rowLatestPost" value="0">
    <input type="hidden" id="clickedpanelId" value="<?= $coming_data ?>">
    <input type="hidden" id="postCountLatestPost" value="<?php echo $postCountLatestPost; ?>">
</div>
<?php
}else if($coming_data === 'Following'){
$user_uid = $user_uid ?? NULL;
$count_query_following_post = "SELECT count(*) as allcount FROM `follow` LEFT JOIN `stories`ON (`stories`.`user_uid`='$user_uid' 
    OR `stories`.`user_uid` = `follow`.`followed_user_uid`)
    LEFT JOIN `user_login` ON `stories`.`user_uid`=`user_login`.`user_uid`  
    WHERE (`follow`.`following_user_uid`='$user_uid' OR `follow`.`following_user_uid`=NULL) AND
    (`stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false')";
$count_result_following_post = mysqli_query($link, $count_query_following_post);
$count_fetch_following_post = mysqli_fetch_array($count_result_following_post);
$postCountFollowingPost = $count_fetch_following_post['allcount'];
$limitFollowingPost = 10;
$start = $_POST['row'];

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
<div class="card border-0 border-bottom mb-3 card-reading-time overflow-auto" style="position: inherit;">
    <?php
    if($row['is_croudfunded'] === 'true') {
    ?>
    <small class="mb-2 mx-3"><b style="color:#1a8917">crowdfunding status</b></small>
    <div class="progress_bar_panel px-3 mb-3">
        <?php
            // croud funding data get start 
                $row_post_uid = $row['post_uid'];
                $crowd_query_1 = "SELECT `post_uid`, sum(pay_amount) as total_pay,`project_address` FROM `crowd_fund` WHERE `post_uid`='$row_post_uid' GROUP BY `post_uid`,`project_address` ORDER by total_pay DESC;";

                $crowd_run_1 = mysqli_query($link, $crowd_query_1);
                if (mysqli_num_rows($crowd_run_1) > 0) {
                    $crowd_query_result = mysqli_fetch_assoc($crowd_run_1);
                    $crowd_query_post_uid = $crowd_query_result['post_uid'];
                    $crowd_query_total_pay = $crowd_query_result['total_pay'];
                    $crowd_query_project_address = $crowd_query_result['project_address'];
                }else{
                    $crowd_query_post_uid = '';
                    $crowd_query_total_pay = 0;
                    $crowd_query_project_address = '';
                }
                $number = $row['target_amount'];
                $percentage_pay = number_format(((number_format($crowd_query_total_pay,5) * 100) / number_format($number,5)),2);
                // croud funding data get end
        ?>
        <div class="progress-panel">
            <div class="get-view-wrapper" style="font-size: 0.9rem;font-weight: 800;"><span
                    id="crowd_query_total_pay_view"><?= number_format($crowd_query_total_pay,5) ?></span>&nbsp;<span
                    class="amount_in_view"><?= $row['amount_in']; ?></span></div>
            <div class="progress">
                <div class="progress-bar d-inline" role="progressbar"
                    aria-valuenow="<?= number_format($percentage_pay,0); ?>"
                    aria-valuemin="<?= number_format($percentage_pay,0); ?>" aria-valuemax="100"
                    style="width:<?= number_format($percentage_pay,0); ?>%;">
                    <span id="span_percentage_view"><?= number_format($percentage_pay,0); ?></span>%
                </div>
            </div>
            <div class="target-view-wrapper">
                <div style="font-size: 0.9rem;">
                    <span style="font-weight: 800;">
                        <span id="percentage_view"><?= $percentage_pay; ?></span>%</span>&nbsp;Collected
                </div>
                <div style="font-size: 0.9rem;"><span style="font-size: 0.9rem;font-weight: 800;"><span
                            id="target_amount_view"><?= number_format($row['target_amount'],3); ?></span>&nbsp;<span
                            id="amount_in_view"
                            class="amount_in_view"><?= $row['amount_in']; ?></span></span>&nbsp;Target
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="d-flex">
        <div class="card-body py-4 w-75">
            <div class="author d-flex justify-content-start pb-2">
                <?php
                    if ($row['profile'] == '') {
                        echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="20" height="20" style="width:25px;height:25px;"></canvas></a></div>';
                    } else {
                        echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
                    }
                    ?>
                <div class="author-name ms-2 d-flex justify-content-center align-items-center">
                    <a href="<?php echo $row['username']; ?>" class="author-link">
                        <h6 class="fw-lighter mb-0" style="font-size:14px;">
                            <?php echo $row['name']; ?></h6>
                    </a>
                    <span class="mx-1">·</span>
                    <span class="text-muted"
                        style="font-size:12px;"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></span>
                </div>
            </div>
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>"
                class="title-link articles-dot mb-0">
                <h4 class="fw-bold"><?php echo $row['post_title']; ?></h4>
            </a>
            <p class="text-muted articles-dot small mb-2">
                <?php echo strip_tags($row['post_content']); ?></p>

            <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                <div class="author d-flex justify-content-start">
                    <div class="author-name d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-wrap gap-2">
                            <?php
                                $tag_name = explode(",", $row['post_tags']);
                                foreach ($tag_name as $key => $val) {
                                    echo '<a href="topic/' . $val . '" class="topic py-0 px-2">' . $val . '</a>';
                                }
                            ?>
                        </div>
                        <span class="text-muted mx-2" style="font-size:12px;">
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
                    if (($user_uid) === '') {
                            echo '<p class="icon-color mb-0 save-reload" onClick="login()"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="social-button-inner">
                                    <path
                                        d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                        fill="#000"></path>
                                </svg></p>';
                        } else if ($list_user_uid == $user_uid2 && $list_post_uid == $post_uid) {
                            echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                aria-label="Add to list bookmark button"
                                class="social-share-other-new-wrapper-inner-button save-reload" onClick="unsave(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="vt">
                                    <path
                                        d="M7.5 3.75a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-14a2 2 0 0 0-2-2h-9z"
                                        fill="#000"></path>
                                </svg>
                            </button>';
                        } else {
                            echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                aria-label="Add to list bookmark button"
                                class="social-share-other-new-wrapper-inner-button save-reload" onClick="save(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="social-button-inner">
                                    <path
                                        d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                        fill="#000"></path>
                                </svg>
                            </button>';
                        }
                        ?>
                </div>
            </div>
        </div>
        <?php 
        if($row['featured_image'] !== ''){
        ?>
        <div class="card-img p-2 w-25">
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                <?php
                if ($row['featured_image'] == '') {
                    echo '<img src="assets/images/blogcms.com.png" alt="image" class="shadow" style="height: 112px;width:112px;   object-fit: cover;">';
                } else {
                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" style="height: 112px;width:112px;   object-fit: cover;" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
                }
                ?>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<?php
}}else{
    if($start ==0){
        ?>
<div class="my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
            <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data
            </h6>
            <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story or <a href="./" class="text-link-3 fw-bold ">read</a>
                on Blog CMS.</h6>
        </div>
    </div>
</div>
<?php
    }
}
?>
<div class="loadmoreLatestPost text-center">
    <?php
        if ($start < $postCountFollowingPost) {
    ?>
    <input type="button" class="audience-button px-5" id="loadBtnLatestPost" value="Load More">
    <?php } ?>
    <input type="hidden" id="rowLatestPost" value="0">
    <input type="hidden" id="clickedpanelId" value="<?= $coming_data ?>">
    <input type="hidden" id="postCountLatestPost" value="<?php echo $postCountFollowingPost; ?>">
</div>
<?php
}else if($coming_data === 'Recommended'){
$user_uid = $user_uid ?? NULL;
$queryfive = "SELECT * FROM `topic_follow` WHERE `user_uid` = '$user_uid'";
$resultfive = mysqli_query($link, $queryfive);
while ($rowfive = mysqli_fetch_assoc($resultfive)) {
    $topic_follow_user_uid = $rowfive['user_uid'];
    $tag5 = $rowfive['topic_follow'] ?? null;
    
}
$count_query_recommended_post = "SELECT count(*) as allcount FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` WHERE `post_status` = 'published' AND `unlisted` = 'false' AND `stories`.`post_tags` LIKE '%$tag5%'";
$count_result_recommended_post = mysqli_query($link, $count_query_recommended_post);
$count_fetch_recommended_post = mysqli_fetch_array($count_result_recommended_post);
$postCountRecommendedPost = $count_fetch_recommended_post['allcount'];
$limitRecommendedPost = 10;
$start = $_POST['row'];

if (mysqli_num_rows($resultfive) > 0) {
    $query = "SELECT `stories`.*,`user_login`.`username`, 
`user_login`.`name`, `user_login`.`profile`
FROM `stories` INNER JOIN `user_login` 
ON `stories`.`user_uid` = `user_login`.`user_uid`
WHERE `post_status` = 'published' AND `unlisted` = 'false' 
AND `stories`.`post_tags` LIKE '%$tag5%'
ORDER BY created_at DESC LIMIT 0," . $limitRecommendedPost;
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="card border-0 border-bottom mb-3 card-reading-time overflow-auto" style="position: inherit;">
    <?php
    if($row['is_croudfunded'] === 'true') {
    ?>
    <small class="mb-2 mx-3"><b style="color:#1a8917">crowdfunding status</b></small>
    <div class="progress_bar_panel px-3 mb-3">
        <?php
            // croud funding data get start 
                $row_post_uid = $row['post_uid'];
                $crowd_query_1 = "SELECT `post_uid`, sum(pay_amount) as total_pay,`project_address` FROM `crowd_fund` WHERE `post_uid`='$row_post_uid' GROUP BY `post_uid`,`project_address` ORDER by total_pay DESC;";

                $crowd_run_1 = mysqli_query($link, $crowd_query_1);
                if (mysqli_num_rows($crowd_run_1) > 0) {
                    $crowd_query_result = mysqli_fetch_assoc($crowd_run_1);
                    $crowd_query_post_uid = $crowd_query_result['post_uid'];
                    $crowd_query_total_pay = $crowd_query_result['total_pay'];
                    $crowd_query_project_address = $crowd_query_result['project_address'];
                }else{
                    $crowd_query_post_uid = '';
                    $crowd_query_total_pay = 0;
                    $crowd_query_project_address = '';
                }
                $number = $row['target_amount'];
                $percentage_pay = number_format(((number_format($crowd_query_total_pay,5) * 100) / number_format($number,5)),2);
                // croud funding data get end
        ?>
        <div class="progress-panel">
            <div class="get-view-wrapper" style="font-size: 0.9rem;font-weight: 800;"><span
                    id="crowd_query_total_pay_view"><?= number_format($crowd_query_total_pay,5) ?></span>&nbsp;<span
                    class="amount_in_view"><?= $row['amount_in']; ?></span></div>
            <div class="progress">
                <div class="progress-bar d-inline" role="progressbar"
                    aria-valuenow="<?= number_format($percentage_pay,0); ?>"
                    aria-valuemin="<?= number_format($percentage_pay,0); ?>" aria-valuemax="100"
                    style="width:<?= number_format($percentage_pay,0); ?>%;">
                    <span id="span_percentage_view"><?= number_format($percentage_pay,0); ?></span>%
                </div>
            </div>
            <div class="target-view-wrapper">
                <div style="font-size: 0.9rem;">
                    <span style="font-weight: 800;">
                        <span id="percentage_view"><?= $percentage_pay; ?></span>%</span>&nbsp;Collected
                </div>
                <div style="font-size: 0.9rem;"><span style="font-size: 0.9rem;font-weight: 800;"><span
                            id="target_amount_view"><?= number_format($row['target_amount'],3); ?></span>&nbsp;<span
                            id="amount_in_view"
                            class="amount_in_view"><?= $row['amount_in']; ?></span></span>&nbsp;Target
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="d-flex">
        <div class="card-body py-4 w-75">
            <div class="author d-flex justify-content-start pb-2">
                <?php
                    if ($row['profile'] == '') {
                        echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="20" height="20" style="width:25px;height:25px;"></canvas></a></div>';
                    } else {
                        echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
                    }
                    ?>
                <div class="author-name ms-2 d-flex justify-content-center align-items-center">
                    <a href="<?php echo $row['username']; ?>" class="author-link">
                        <h6 class="fw-lighter mb-0" style="font-size:14px;">
                            <?php echo $row['name']; ?></h6>
                    </a>
                    <span class="mx-1">·</span>
                    <span class="text-muted"
                        style="font-size:12px;"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></span>
                </div>
            </div>
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>"
                class="title-link articles-dot mb-0">
                <h4 class="fw-bold"><?php echo $row['post_title']; ?></h4>
            </a>
            <p class="text-muted articles-dot small mb-2">
                <?php echo strip_tags($row['post_content']); ?></p>

            <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                <div class="author d-flex justify-content-start">
                    <div class="author-name d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-wrap gap-2">
                            <?php
                                $tag_name = explode(",", $row['post_tags']);
                                foreach ($tag_name as $key => $val) {
                                    echo '<a href="topic/' . $val . '" class="topic py-0 px-2">' . $val . '</a>';
                                }
                            ?>
                        </div>
                        <span class="text-muted mx-2" style="font-size:12px;">
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
                    if (($user_uid) === '') {
                            echo '<p class="icon-color mb-0 save-reload" onClick="login()"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="social-button-inner">
                                    <path
                                        d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                        fill="#000"></path>
                                </svg></p>';
                        } else if ($list_user_uid == $user_uid2 && $list_post_uid == $post_uid) {
                            echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                aria-label="Add to list bookmark button"
                                class="social-share-other-new-wrapper-inner-button save-reload" onClick="unsave(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="vt">
                                    <path
                                        d="M7.5 3.75a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-14a2 2 0 0 0-2-2h-9z"
                                        fill="#000"></path>
                                </svg>
                            </button>';
                        } else {
                            echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                aria-label="Add to list bookmark button"
                                class="social-share-other-new-wrapper-inner-button save-reload" onClick="save(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="social-button-inner">
                                    <path
                                        d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                        fill="#000"></path>
                                </svg>
                            </button>';
                        }
                        ?>
                </div>
            </div>
        </div>
        <?php 
        if($row['featured_image'] !== ''){
        ?>
        <div class="card-img p-2 w-25">
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                <?php
                if ($row['featured_image'] == '') {
                    echo '<img src="assets/images/blogcms.com.png" alt="image" class="shadow" style="height: 112px;width:112px;   object-fit: cover;">';
                } else {
                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" style="height: 112px;width:112px;   object-fit: cover;" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
                }
                ?>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<?php
}}else{
    if($start ==0){
        ?>
<div class="my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
            <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data
            </h6>
            <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story or <a href="./" class="text-link-3 fw-bold ">read</a>
                on Blog CMS.</h6>
        </div>
    </div>
</div>
<?php
    }
}
?>
<div class="loadmoreLatestPost text-center">
    <?php
        if ($start < $postCountRecommendedPost) {
    ?>
    <input type="button" class="audience-button px-5" id="loadBtnLatestPost" value="Load More">
    <?php } ?>
    <input type="hidden" id="rowLatestPost" value="0">
    <input type="hidden" id="clickedpanelId" value="<?= $coming_data ?>">
    <input type="hidden" id="postCountLatestPost" value="<?php echo $postCountRecommendedPost; ?>">
</div>
<?php
}}else{
$count_query_latest_post = "SELECT count(*) as allcount FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` WHERE `post_status` = 'published' AND `unlisted` = 'false' AND `post_tags` LIKE '%$topic_req%'";
$count_result_latest_post = mysqli_query($link, $count_query_latest_post);
$count_fetch_latest_post = mysqli_fetch_array($count_result_latest_post);
$postCountLatestPost = $count_fetch_latest_post['allcount'];
$limitLatestPost = 10;
$start = $_POST['row'];

$query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` WHERE `post_status` = 'published' AND `unlisted` = 'false' AND `post_tags` LIKE '%$topic_req%' ORDER BY created_at DESC LIMIT 0," . $limitLatestPost;
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="card border-0 border-bottom mb-3 card-reading-time overflow-auto" style="position: inherit;">
    <?php
    if($row['is_croudfunded'] === 'true') {
    ?>
    <small class="mb-2 mx-3"><b style="color:#1a8917">crowdfunding status</b></small>
    <div class="progress_bar_panel px-3 mb-3">
        <?php
            // croud funding data get start 
                $row_post_uid = $row['post_uid'];
                $crowd_query_1 = "SELECT `post_uid`, sum(pay_amount) as total_pay,`project_address` FROM `crowd_fund` WHERE `post_uid`='$row_post_uid' GROUP BY `post_uid`,`project_address` ORDER by total_pay DESC;";

                $crowd_run_1 = mysqli_query($link, $crowd_query_1);
                if (mysqli_num_rows($crowd_run_1) > 0) {
                    $crowd_query_result = mysqli_fetch_assoc($crowd_run_1);
                    $crowd_query_post_uid = $crowd_query_result['post_uid'];
                    $crowd_query_total_pay = $crowd_query_result['total_pay'];
                    $crowd_query_project_address = $crowd_query_result['project_address'];
                }else{
                    $crowd_query_post_uid = '';
                    $crowd_query_total_pay = 0;
                    $crowd_query_project_address = '';
                }
                $number = $row['target_amount'];
                $percentage_pay = number_format(((number_format($crowd_query_total_pay,5) * 100) / number_format($number,5)),2);
                // croud funding data get end
        ?>
        <div class="progress-panel">
            <div class="get-view-wrapper" style="font-size: 0.9rem;font-weight: 800;"><span
                    id="crowd_query_total_pay_view"><?= number_format($crowd_query_total_pay,5) ?></span>&nbsp;<span
                    class="amount_in_view"><?= $row['amount_in']; ?></span></div>
            <div class="progress">
                <div class="progress-bar d-inline" role="progressbar"
                    aria-valuenow="<?= number_format($percentage_pay,0); ?>"
                    aria-valuemin="<?= number_format($percentage_pay,0); ?>" aria-valuemax="100"
                    style="width:<?= number_format($percentage_pay,0); ?>%;">
                    <span id="span_percentage_view"><?= number_format($percentage_pay,0); ?></span>%
                </div>
            </div>
            <div class="target-view-wrapper">
                <div style="font-size: 0.9rem;">
                    <span style="font-weight: 800;">
                        <span id="percentage_view"><?= $percentage_pay; ?></span>%</span>&nbsp;Collected
                </div>
                <div style="font-size: 0.9rem;"><span style="font-size: 0.9rem;font-weight: 800;"><span
                            id="target_amount_view"><?= number_format($row['target_amount'],3); ?></span>&nbsp;<span
                            id="amount_in_view"
                            class="amount_in_view"><?= $row['amount_in']; ?></span></span>&nbsp;Target
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="d-flex">
        <div class="card-body py-4 w-75">
            <div class="author d-flex justify-content-start pb-2">
                <?php
                    if ($row['profile'] == '') {
                        echo '<div class="profile"><a href="' . $row['username'] . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="20" height="20" style="width:25px;height:25px;"></canvas></a></div>';
                    } else {
                        echo '<div class="profile"><a href="' . $row['username'] . '"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle"></a></div>';
                    }
                    ?>
                <div class="author-name ms-2 d-flex justify-content-center align-items-center">
                    <a href="<?php echo $row['username']; ?>" class="author-link">
                        <h6 class="fw-lighter mb-0" style="font-size:14px;">
                            <?php echo $row['name']; ?></h6>
                    </a>
                    <span class="mx-1">·</span>
                    <span class="text-muted"
                        style="font-size:12px;"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></span>
                </div>
            </div>
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>"
                class="title-link articles-dot mb-0">
                <h4 class="fw-bold"><?php echo $row['post_title']; ?></h4>
            </a>
            <p class="text-muted articles-dot small mb-2">
                <?php echo strip_tags($row['post_content']); ?></p>

            <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
                <div class="author d-flex justify-content-start">
                    <div class="author-name d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-wrap gap-2">
                            <?php
                                $tag_name = explode(",", $row['post_tags']);
                                foreach ($tag_name as $key => $val) {
                                    echo '<a href="topic/' . $val . '" class="topic py-0 px-2">' . $val . '</a>';
                                }
                            ?>
                        </div>
                        <span class="text-muted mx-2" style="font-size:12px;">
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
                    if (($user_uid) === '') {
                            echo '<p class="icon-color mb-0 save-reload" onClick="login()"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="social-button-inner">
                                    <path
                                        d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                        fill="#000"></path>
                                </svg></p>';
                        } else if ($list_user_uid == $user_uid2 && $list_post_uid == $post_uid) {
                            echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                aria-label="Add to list bookmark button"
                                class="social-share-other-new-wrapper-inner-button save-reload" onClick="unsave(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="vt">
                                    <path
                                        d="M7.5 3.75a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-14a2 2 0 0 0-2-2h-9z"
                                        fill="#000"></path>
                                </svg>
                            </button>';
                        } else {
                            echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                aria-label="Add to list bookmark button"
                                class="social-share-other-new-wrapper-inner-button save-reload" onClick="save(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="social-button-inner">
                                    <path
                                        d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                        fill="#000"></path>
                                </svg>
                            </button>';
                        }
                        ?>
                </div>
            </div>
        </div>
        <?php 
        if($row['featured_image'] !== ''){
        ?>
        <div class="card-img p-2 w-25">
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                <?php
                if ($row['featured_image'] == '') {
                    echo '<img src="assets/images/blogcms.com.png" alt="image" class="shadow" style="height: 112px;width:112px;   object-fit: cover;">';
                } else {
                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow" style="height: 112px;width:112px;   object-fit: cover;" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
                }
                ?>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<?php
}}else{
    if($start ==0){
        ?>
<div class="my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
            <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data
            </h6>
            <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story or <a href="./" class="text-link-3 fw-bold ">read</a>
                on Blog CMS.</h6>
        </div>
    </div>
</div>
<?php
    }
}
?>
<div class="loadmoreLatestPost text-center">
    <?php
        if ($start < $postCountLatestPost) {
    ?>
    <input type="button" class="audience-button px-5" id="loadBtnLatestPost" value="Load More">
    <?php } ?>
    <input type="hidden" id="rowLatestPost" value="0">
    <input type="hidden" id="clickedpanelId" value="<?= $coming_data ?>">
    <input type="hidden" id="postCountLatestPost" value="<?php echo $postCountLatestPost; ?>">
</div>
<?php
}}?>

<script>
$('.loadmoreLatestPost').click(function() {
    $(this).addClass('d-none');
});
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
</script>