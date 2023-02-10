<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
if (isset($_POST['row'])) {
    $start = $_POST['row'];
    $limit = 2;
    $query = "SELECT * FROM `stories` WHERE `post_status` = 'published' AND `unlisted` = 'true' ORDER BY post_id DESC LIMIT " . $start . "," . $limit;
    $result = mysqli_query($link, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
            <div class="story-post-card shadow-sm d-flex justify-content-between align-items-center px-3 py-2 mb-3 gap-2 flex-column flex-lg-row">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="div-width">
                        <h5 class="fw-bold text-capitalize mb-1" style="color:var(--text-color);">
                            <?php echo $row['post_title']; ?></h5>
                        <p class="text-muted mb-0 articles-dot">
                            <?php echo strip_tags($row['post_content']); ?></p>
                    </div>
                    <small class="mx-lg-5 px-lg-5 d-flex justify-content-center align-items-center"><?= trim($row['created_at'],"+0530") ?></small>
                </div>
                <div class="d-flex gap-2">
                    <a href="edit-story/<?php echo $row['post_uid']; ?>" class="text-link-2" role="button"><i class="icon-note"></i></a>
              
                    <button class="btn text-link-2 p-0" role="button" onClick="del('<?php echo $row['post_uid']; ?>')"><i class="icon-trash"></i></button>
                </div>
            </div>
<?php }
    }
}
?>