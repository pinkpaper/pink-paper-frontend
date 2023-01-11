<?php
require_once 'connection.php';
if (mysqli_connect_error()) {
	die("<script>console.log('There is a problem with mysql connection')</script>");
}

date_default_timezone_set("Asia/Calcutta");
$date_now = date("r");
$from_ip = $_SERVER['REMOTE_ADDR'];
$from_browser = $_SERVER['HTTP_USER_AGENT'];


function guidv4($data)
{
	assert(strlen($data) == 16);

	$data[6] = chr(ord($data[6]) && 0x0f | 0x40); // set version to 0100
	$data[8] = chr(ord($data[8]) && 0x3f | 0x80); // set bits 6-7 to 10

	return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
$post_uid = guidv4(openssl_random_pseudo_bytes(16));


$user_uid =  strip_tags($_POST['user_uid']);
$title =  addslashes(strip_tags($_POST['story_title']));
$content = addslashes($_POST['story_editor']);
$tags = strip_tags($_POST['tags']);
$unlisted = strip_tags($_POST['unlisted']);
$pin_story = strip_tags($_POST['pin_story']);
$selected_theme = strip_tags($_POST['selected_theme']);
$meta_title = $_POST['meta_title'];
$meta_description = $_POST['meta_description'];

function create_slug($string)
{
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}

$post_slug = create_slug($title).'-'.substr(md5(microtime()), 0, 10);

//image upload
if (isset($_FILES["featured_image"]["name"])) {
	$target_dir = "../uploads/featuredImages/";
	$temp = explode(".", $_FILES["featured_image"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	$target_file = $target_dir . basename($newfilename);
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file);
	$image = mysqli_real_escape_string($link, basename($newfilename));
	$image = $image;
} else {
	$image = '';
}


if ($_POST['post_id'] == "") {

	$link->query("INSERT INTO `stories`(`post_uid`,`user_uid`,`post_title`, `post_content`,`featured_image`,`post_tags`,`unlisted`,`pin_story`, `post_status`,`post_slug`,`meta_title`,`meta_description`,`from_ip`,`from_browser`,`created_at`,`theme`) VALUE('$post_uid','$user_uid','$title', '$content','$image','$tags','$unlisted','$pin_story', 'draft',	'$post_slug','$meta_title','$meta_description', '$from_ip', '$from_browser', '$date_now','$selected_theme')");
	echo $link->insert_id;
} else {
	$post_id = $_POST['post_id'];


	/* $sql = "SELECT * FROM `stories` WHERE post_id = '$post_id'";
    $run_Sql = mysqli_query($link, $sql);
    $fetch_info = mysqli_fetch_assoc($run_Sql);
	if($fetch_info > 0){
	$old_image = $fetch_info['featured_image'];
	//echo $old_image;
	
	if($old_image == ''){
		echo $old_image;
	}else{
		echo $target_dir.$old_image;
		unlink($target_dir.$old_image);
		
	}
	} */

	$link->query("UPDATE `stories` SET `post_title` = '$title', `post_content` = '$content',/* `featured_image` = '$image', */ `post_tags`='$tags', `unlisted` = '$unlisted',`pin_story`='$pin_story', `post_slug`='$post_slug',`meta_title`='$meta_title',`meta_description`='$meta_description', `updated_at`='$date_now',`theme`='$selected_theme' WHERE `post_id` = '$post_id' && `post_status` = 'draft'");
}
