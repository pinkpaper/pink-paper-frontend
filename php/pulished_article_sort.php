<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}

if (isset($_POST['user_uid'])) {
    $userUid = mysqli_real_escape_string($link, $_POST['user_uid']);
    $sort_by = mysqli_real_escape_string($link, $_POST['sort_by']);

    $count_query_published = "SELECT count(*) as allcount FROM `stories` WHERE `user_uid` = '$userUid' AND `post_status` = 'published' AND `unlisted` = 'false'";
    $count_result_published = mysqli_query($link, $count_query_published);
    $count_fetch_published = mysqli_fetch_array($count_result_published);
    $postCountPublished = $count_fetch_published['allcount'];
    $limitPublished = 10;

    if ($sort_by === 'name') {
        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`
    FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
    WHERE `user_login`.`user_uid` = '$userUid' AND `post_status` = 'published' AND `unlisted` = 'false' 
    ORDER BY `post_title` LIMIT 0," . $limitPublished;
    } else if ($sort_by === 'date') {
        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`
    FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
    WHERE `user_login`.`user_uid` = '$userUid' AND `post_status` = 'published' AND `unlisted` = 'false' 
    ORDER BY `post_id` ASC LIMIT 0," . $limitPublished;
    } else {
        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`
        FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
        WHERE `user_login`.`user_uid` = '$userUid' AND `post_status` = 'published' AND `unlisted` = 'false' 
        ORDER BY post_id DESC LIMIT 0," . $limitPublished;
    }

    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $trim_url = (explode("/", $_SERVER['REQUEST_URI']));
            $copy_url = $actual_link . "/" . $row['username'] . "/" . $row['post_slug'];
?>
            <div class="stories-top-panel-heading-container-div-wrapper">
                <div class="stories-top-panel-heading-container-div-inner">
                    <h3 class="stories-top-panel-heading-container-div-heading">
                        <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>" rel="noopener follow"><?php echo $row['post_title']; ?></a>
                    </h3>
                    <div class="stories-top-panel-heading-container-div-div">
                        <h3 class="stories-top-panel-heading-container-div-div-heading">
                            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>" rel="noopener follow"><?php echo strip_tags($row['post_content']); ?></a>
                        </h3>
                    </div>
                </div>
                <div class="stories-panel-date-wrapper">
                    <div class="stories-panel-date-inner">
                        <div class="stories-panel-date-div">
                            <span class="stories-panel-date-div-span"><?= trim($row['created_at'], "+0530") ?></span>
                        </div>
                        <div class="stories-panel-date-dot" aria-hidden="true">
                            <span class="stories-panel-date-dot-span" aria-hidden="true">
                                <span class="stories-panel-date-div-span">·</span>
                                <span class="stories-panel-date-div-span">
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
                            </span>
                        </div>
                    </div>
                    <div class="stories-panel-date-button-wrapper">
                        <?php
                        if ($row['is_croudfunded'] === 'true') {
                        ?>
                            <div class="stories-panel-date-button-inner mx-2" aria-hidden="false" aria-describedby="yourStoryActionsMenu" aria-labelledby="yourStoryActionsMenu">
                                <a href="withdraw-fund/<?php echo $row['post_uid']; ?>" class="text-link-2 mb-1" role="button">
                                    <span class="withdraw">withdraw</span>
                                </a>
                            </div>
                        <?php } ?>
                        <div class="stories-panel-date-button-inner mx-2" aria-hidden="false" aria-describedby="yourStoryActionsMenu" aria-labelledby="yourStoryActionsMenu">
                            <a id="copy_url" data-clipboard-text="<?= $copy_url ?>" class="text-link-2" role="button">
                                <i class="icon-docs"></i>
                            </a>
                        </div>
                        <div class="stories-panel-date-button-inner mx-2" aria-hidden="false" aria-describedby="yourStoryActionsMenu" aria-labelledby="yourStoryActionsMenu">
                            <a href="edit-story/<?php echo $row['post_id']; ?>" class="text-link-2" role="button">
                                <i class="icon-note"></i>
                            </a>
                        </div>
                        <div class="stories-panel-date-button-inner mx-2" aria-hidden="false" aria-describedby="yourStoryActionsMenu" aria-labelledby="yourStoryActionsMenu">
                            <button class="stories-panel-date-button-inner-button" aria-controls="yourStoryActionsMenu" aria-expanded="false" onClick="del('<?php echo $row['post_uid']; ?>')">
                                <i class="icon-trash"></i>
                            </button>
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
                    <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no
                        data</h6>
                    <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story
                        or <a href="./" class="text-link-3 fw-bold ">read</a> on Blog CMS.</h6>
                </div>
            </div>
        </div>
<?php }
} ?>