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

if($sort_by === 'name'){
    $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`
    FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
    WHERE `user_login`.`user_uid` = '$userUid' AND `post_status` = 'published' AND `unlisted` = 'false' 
    ORDER BY `post_title` LIMIT 0," . $limitPublished;
}else if($sort_by === 'date'){
    $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`
    FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
    WHERE `user_login`.`user_uid` = '$userUid' AND `post_status` = 'published' AND `unlisted` = 'false' 
    ORDER BY `post_id` ASC LIMIT 0," . $limitPublished;
}else{
    $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`
        FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid`
        WHERE `user_login`.`user_uid` = '$userUid' AND `post_status` = 'published' AND `unlisted` = 'false' 
        ORDER BY post_id DESC LIMIT 0," . $limitPublished;
}


$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="story-post-card shadow-sm d-flex justify-content-between align-items-center px-3 py-2 mb-3 gap-2">
    <div class="d-flex flex-column flex-lg-row">
        <div class="div-width">
            <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>" style="text-decoration: none;">
                <h5 class="fw-bold text-capitalize mb-1 text-truncate" style="color:var(--text-color);">
                    <?php echo $row['post_title']; ?></h5>
            </a>
            <p class="text-muted mb-0 articles-dot">
                <?php echo strip_tags($row['post_content']); ?></p>
        </div>
        <small class="mx-lg-5 px-lg-5"><?= trim($row['created_at'],"+0530") ?></small>
    </div>
    <div class="d-flex justify-content-center align-items-center gap-2">
        <?php
        if($row['is_croudfunded'] === 'true'){
        ?>
        <a href="withdraw-fund/<?php echo $row['post_uid']; ?>" class="text-link-2 mb-1" role="button"><span
                class="withdraw">withdraw</span></a>
        <?php } ?>
        <a href="edit-story/<?php echo $row['post_id']; ?>" class="text-link-2" role="button"><i
                class="icon-note"></i></a>
        <button class="btn text-link-2 p-0" role="button" onClick="del('<?php echo $row['post_uid']; ?>')"><i
                class="icon-trash"></i></button>
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
            <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story"
                    class="text-link-3 fw-bold ">Write</a> a story
                or <a href="./" class="text-link-3 fw-bold ">read</a> on Blog CMS.</h6>
        </div>
    </div>
</div>
<?php }} ?>