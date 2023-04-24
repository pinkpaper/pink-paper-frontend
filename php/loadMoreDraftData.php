<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['row'])) {
    $start = $_POST['row'];
    $limit = 10;
    $userUid = $_POST['user_uid'];
    $query = "SELECT * FROM `stories` WHERE `user_uid` = '$userUid' AND `post_status` = 'draft' AND `unlisted` = 'false' ORDER BY post_id DESC LIMIT " . $start . "," . $limit;
    $result = mysqli_query($link, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="stories-top-panel-heading-container-div-wrapper">
    <div class="stories-top-panel-heading-container-div-inner">
        <h3 class="stories-top-panel-heading-container-div-heading">
            <a rel="noopener follow"><?php echo $row['post_title']; ?></a>
        </h3>
        <div class="stories-top-panel-heading-container-div-div">
            <h3 class="stories-top-panel-heading-container-div-div-heading">
                <a rel="noopener follow"><?php echo strip_tags($row['post_content']); ?></a>
            </h3>
        </div>
    </div>
    <div class="stories-panel-date-wrapper">
        <div class="stories-panel-date-inner">
            <div class="stories-panel-date-div">
                <span class="stories-panel-date-div-span"><?= trim($row['created_at'],"+0530") ?></span>
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
            <div class="stories-panel-date-button-inner mx-2" aria-hidden="false"
                aria-describedby="yourStoryActionsMenu" aria-labelledby="yourStoryActionsMenu">
                <a href="edit-story/<?php echo $row['post_id']; ?>" class="text-link-2" role="button">
                    <i class="icon-note"></i>
                </a>
            </div>
            <div class="stories-panel-date-button-inner mx-2" aria-hidden="false"
                aria-describedby="yourStoryActionsMenu" aria-labelledby="yourStoryActionsMenu">
                <button class="stories-panel-date-button-inner-button" aria-controls="yourStoryActionsMenu"
                    aria-expanded="false" onClick="del('<?php echo $row['post_uid']; ?>')">
                    <i class="icon-trash"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<?php }
    }
}
?>