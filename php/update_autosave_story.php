<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
	die("<script>console.log('There is a problem with mysql connection')</script>");
}

date_default_timezone_set("Asia/Calcutta");
$date_now = date("r");

$title =  addslashes(strip_tags($_POST['story_title']));
$content = addslashes($_POST['story_editor']);
$tags = strip_tags($_POST['tags']);
$unlisted = strip_tags($_POST['unlisted']);
$pin_story = strip_tags($_POST['pin_story']);
$published_status = strip_tags($_POST['published_status']);
$post_slug = strip_tags($_POST['post_slug']);
$featured_image_preset = strip_tags($_POST['featured_image_preset']);
$schedule_time = '';
if(isset($_POST['schedule_time'])) {
$schedule_time = strip_tags($_POST['schedule_time']);
}else{
$schedule_time = '';
}
$meta_title = $_POST['meta_title'];
$meta_description = $_POST['meta_description'];
$selected_theme = strip_tags($_POST['selected_theme']);
function create_slug($string)
{
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}

// $post_slug = create_slug($title).'-'.substr(md5(microtime()), 0, 10);

if (isset($_FILES["featured_image"]["name"])) {
	$target_dir = "../uploads/featuredImages/";
	$temp = explode(".", $_FILES["featured_image"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	$target_file = $target_dir . basename($newfilename);
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file);
	$image = mysqli_real_escape_string($link, basename($newfilename));
	$image = $image;
}else{
$image = $featured_image_preset;
}
	$post_id = $_POST['post_id'];

	$link->query("UPDATE `stories` SET `post_title` = '$title', `post_content` = '$content', `featured_image` = '$image', `post_tags`='$tags', `unlisted` = '$unlisted',`pin_story`='$pin_story', `post_slug`='$post_slug',`post_status` = '$published_status',`schedule_time`='$schedule_time',`meta_title`='$meta_title',`meta_description`='$meta_description', `updated_at`='$date_now',`theme`='$selected_theme' WHERE `post_id` = '$post_id'");