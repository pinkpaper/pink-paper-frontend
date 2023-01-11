<?php


require_once 'connection.php';
if (mysqli_connect_error()) {
	die("<script>console.log('There is a problem with mysql connection')</script>");
}


	$sql = "SELECT tag_name FROM tags 
			WHERE tag_name LIKE '%".$_GET['query']."%'
			LIMIT 10"; 


	$result = $link->query($sql);


	$json = [];
	while($row = $result->fetch_assoc()){
	     $json[] = $row['tag_name'];
	}


	echo json_encode($json);
?>