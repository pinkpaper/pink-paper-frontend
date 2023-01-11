<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['row'])) {
    $username_req = $_POST['username'];
    $start = $_POST['row'];
    $limit = 2;
    $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` WHERE `post_status` = 'published' AND `unlisted` = 'false' AND `username`='$username_req' ORDER BY post_id DESC LIMIT " . $start . "," . $limit;
    $result = mysqli_query($link, $query);
    if ($result->num_rows > 0) {
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
                        <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>" class="title-link articles-dot mb-0">
                            <h5 class="fw-bold"><?php echo $row['post_title']; ?></h5>
                        </a>
                        <p class="text-muted articles-dot small mb-3"><?php echo strip_tags($row['post_content']); ?></p>

                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <?php
                            $tag_name = explode(",", $row['post_tags']);
                            foreach ($tag_name as $key => $val) {
                                echo '<a href="topic?slug=' . $val . '" class="topic fw-bold py-0 px-3">' . $val . '</a>';
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
                                                    <a href="' . $row['username'] . '>
                                                        <img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle">
                                                    </a>
                                                </div>';
                            }
                            ?>


                            <div class="author-name ms-2">
                                <a href="<?php echo $row['username']; ?>" class="author-link">
                                    <h6 class="fw-bold mb-0" style="font-size:14px;"><?php echo $row['name']; ?></h6>
                                </a>
                                <span class="text-muted" style="font-size:12px;"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></span>
                                <span class="text-muted">&bull;</span> <span class="text-muted" style="font-size:12px;">
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
    }
}
?>
<script>

$(document).on('click', '#loadBtnProfilePost', function() {
                var row = Number($('#rowProfilePost').val());
                var count = Number($('#postCountProfilePost').val());
                var username = $('#usernameId').val();
                var limit = 2;
                row = row + limit;
                $('#rowProfilePost').val(row);
                $("#loadBtnProfilePost").val('Loading...');
});
</script>