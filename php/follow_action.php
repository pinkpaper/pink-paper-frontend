<?php



if (isset($_POST['unfollow'])) {
    $followed_user_uid= mysqli_real_escape_string($link, $_POST['followed_user_uid']);
    $follower_user_uid = mysqli_real_escape_string($link, $_POST['follower_user_uid']);
    //prepare statement
    $stmt = $link->prepare("DELETE FROM follow
WHERE follower_user_uid = ? AND followed_user_uid = ?");
    $stmt->bind_param("ss", $follower_user_uid, $followed_user_uid);
    if ($result = $stmt->execute()) {
        header('Location: '.$actual_link);
    } else {
        echo "failed to unfollow";
    }
}



if (isset($_POST['follow'])) {
    if(isset($_SESSION['username'])) {

        $followed_user_uid= mysqli_real_escape_string($link, $_POST['followed_user_uid']);
        $follower_user_uid = mysqli_real_escape_string($link, $_POST['follower_user_uid']);
        

        if ($followed_user_uid != $follower_user_uid) {
            $followed_user_uid = $followed_user_uid;
            $follower_user_uid = $follower_user_uid;

        
            //prepare statement
            $stmt = $link->prepare("INSERT INTO follow (follower_user_uid, followed_user_uid) VALUES (?, ?)");
            $stmt->bind_param("ss",$follower_user_uid,$followed_user_uid);
            if ($result = $stmt->execute()) {
                header('Location: '.$actual_link);
            } else {
                echo "Failed to follow";
            }
            
        } // users cant follow themselves

    } //if not logged in do this
    else {
        echo "<h1 style='clear:left;font-size:15px; color:red;'>You have to be logged in to follow</h1>";
    }
}





if (isset($_POST['unfollow_topic'])) {
    $topic_follow= mysqli_real_escape_string($link, $_POST['topic_follow']);
    $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
    //prepare statement
    $stmt = $link->prepare("DELETE FROM topic_follow
WHERE user_uid = ? AND topic_follow = ?");
    $stmt->bind_param("ss", $user_uid, $topic_follow);
    if ($result = $stmt->execute()) {
        header('Location: '.$actual_link);
    } else {
        echo "failed to unfollow";
    }
}



if (isset($_POST['follow_topic'])) {
    if(isset($_SESSION['username'])) {

        $topic_follow= mysqli_real_escape_string($link, $_POST['topic_follow']);
        $user_uid = mysqli_real_escape_string($link, $_POST['user_uid']);
        
            //prepare statement
            $stmt = $link->prepare("INSERT INTO topic_follow (user_uid, topic_follow) VALUES (?, ?)");
            $stmt->bind_param("ss",$user_uid,$topic_follow);
            if ($result = $stmt->execute()) {
                header('Location: '.$actual_link);
            } else {
                echo "Failed to follow";
            }
            

    } //if not logged in do this
    else {
        echo "<h1 style='clear:left;font-size:15px; color:red;'>You have to be logged in to follow</h1>";
    }
}