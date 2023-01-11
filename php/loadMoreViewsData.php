<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['row'])) {
    $start = $_POST['row'];
    $user_uid=$_POST['user_uid'];
    $limit = 2;
    $query = "SELECT `stories`.*,`post_views`.*,`user_login`.* FROM `stories`   
    INNER JOIN `user_login`ON (`stories`.`user_uid` = `user_login`.`user_uid`)  
    INNER JOIN `post_views` ON (`stories`.`post_uid`=`post_views`.`post_uid`)
    WHERE (`stories`.`post_uid` = `post_views`.`post_uid`) AND
    (`stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false')
     AND(`stories`.`user_uid` = '$user_uid') LIMIT " . $start . "," . $limit;
    $result = mysqli_query($link, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="story-post-card shadow-sm d-flex justify-content-between align-items-center px-3 py-2 mb-3 gap-2">
<div>
<h5 class="fw-bold text-capitalize mb-1" style="color:var(--text-color); width:180px;
    white-space: nowrap;
    overflow:hidden !important;
    text-overflow: ellipsis;"><?php echo $row['post_title']; ?></h5>
</div>
<div class="d-flex justify-content-center align-items-center gap-2">
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="left:-10px;"></span>
<h5 class="fw-bold text-capitalize mb-1" style="color:var(--text-color);"><?php echo $row['post_per_day_views']; ?></h5>                                            
</div>
</div>
<?php }
    }
}
?>