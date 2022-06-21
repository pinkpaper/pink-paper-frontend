<div class="profile-div mb-5">
    <div class="profile-card shadow d-flex flex-column justify-content-center px-3 py-4 text-center">
        <?php
        if ($profile2 == '') {
            echo '<div class="text-center"><canvas class="avatar-image rounded-circle text-center p-1 shadow-sm mb-2" title="' . $name2 . '"></canvas></div>';
        } else {
            echo '<div class="text-center"><img src="' . $profile2 . '" alt="" class="text-center p-1 shadow-sm mb-2"></div>';
        }
        ?>
        <h4 class="fw-bold text-capitalize mb-0" style="color:var(--text-color);"><?php echo $name2; ?></h4>
        <p class="text-muted mb-2">@<?php echo $username2; ?></p>
        <p class="text-muted mb-3"><?php echo $bio2; ?></p>


        <?php
        //if the user is not logged in just display a button that send him/her to the login page if clicked
        $sql6 = "SELECT * FROM follow WHERE followed_user_uid = '$user_uid2'";
        $run_Sql6 = mysqli_query($link, $sql6);
        $fetch_info6 = mysqli_fetch_array($run_Sql6);
        $follower_user_uid2 = $fetch_info6['follower_user_uid'] ?? null;
        
        $user_uid_follow=$user_uid2;
        ?>
        <div class="d-grid" id="follow_relo">
        <?php
        $user_uid2 = $user_uid ?? null;
        $sql20 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid2' 
        AND followed_user_uid = '$user_uid_follow'";
        $run_Sql20 = mysqli_query($link, $sql20);
        $fetch_info20 = mysqli_fetch_assoc($run_Sql20);

        $following_user_uid = $fetch_info20['following_user_uid'] ?? null;
        $followed_user_uid = $fetch_info20['followed_user_uid'] ?? null;

        
        if (!isset($_SESSION['email'])) {
            echo '<button type="button" class="btn button-follow fw-bold" onClick="login()">Follow</button>';
        } else if ($user_uid2 == $user_uid_follow) {
            //echo '';
        }else if ($following_user_uid == $user_uid2 && $followed_user_uid == $user_uid_follow) {
            echo '<button type="button" class="btn button-follow fw-bold" onClick="unfollow(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Following</button>';
        } else {
            echo '<button type="button" class="btn button-follow fw-bold" onClick="follow(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Follow</button>';
        }
        ?>
    </div>


        <div class="d-flex justify-content-center align-items-center gap-3"><a href="followers.php?username=<?php echo $username2; ?>" class="text-link-2"><?php echo $follower_count . ' Follower' . ($follower_count == 1 ? '' : 's') ?></a>
            <a href="about/<?php echo $username2; ?>" class="text-link-2">About</a>
        </div>
    </div>
</div>