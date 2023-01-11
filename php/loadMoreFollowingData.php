<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['row'])) {
    $start = $_POST['row'];
    $limit = 2;
    $query = "SELECT `user`.`username`,`user`.`name`,`user`.`profile`,`user`.`bio` FROM `user_login` AS user
    WHERE `user`.`user_uid` != '$user_uid2' AND `user`.`user_uid` IN (SELECT follow.followed_user_uid FROM follow AS follow WHERE `follow`.`follower_user_uid` = '$user_uid2' ORDER BY `follow`.`follow_id` DESC) LIMIT " . $start . "," . $limit;
    $result = mysqli_query($link, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
             <div class="follower-card shadow d-flex justify-content-between align-items-center px-3 py-2 mb-3 gap-2">
                                    <div class="d-flex justify-content-start align-items-center gap-2">
                                        <?php
                                        if ($row['profile'] == '') {
                                            echo '<div class="text-center"><a href="profile?username='.$row['username'].'"><canvas class="avatar-image text-center p-1 shadow-sm" title="'.$row['name'].'"></canvas></a></div>';
                                        } else {
                                            echo '<div class="text-center"><a href="profile?username='.$row['username'].'"><img src="uploads/profile/' . $row['profile'] . '" alt="" class="text-center p-1 shadow-sm"></a></div>';
                                        }
                                        ?>
                                        <div>
                                            <a href="profile?username=<?php echo $row['username']; ?>">
                                                <h5 class="fw-bold text-capitalize mb-1" style="color:var(--text-color);"><?php echo $row['name']; ?></h5>
                                            </a>
                                            <p class="text-muted mb-0"><?php echo $row['bio']; ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="follow" class="btn button-follow fw-bold" role="button">Follow</a>
                                    </div>
                                </div>
<?php }
    }
}
?>