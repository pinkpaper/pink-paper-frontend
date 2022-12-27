<?php
require_once 'link.php';
if (mysqli_connect_error()) {
    die("<script>console.log('There is a problem with mysql connection')</script>");
}
$chart_data = array();
$donut_chart = array();
$data = array();
if (isset($_POST['drawchart'])) {
    session_start();
    $query = "SELECT * FROM `user_login`";
    $result = mysqli_query($link, $query) or die("SQL Query Failed");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $date = $row['created_at'];
            $uniqueVisitor = $row['name'];
            $oldVisitor = $row['username'];
            $chart_data[] = array("date" => "$date", "oldVisitor" => "$oldVisitor", "uniqueVisitor" => "$uniqueVisitor");
        }
    }
    $query2 = "SELECT `like_id`,`total_like` FROM `post_like` WHERE 1 ORDER BY `like_id` DESC LIMIT 7";
    $result2 = mysqli_query($link, $query2) or die("SQL Query Failed");
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_array($result2)) {
            $like_id = $row2['like_id'];
            $total_like = $row2['total_like'];
            $donut_chart[] = array("like_id" => "$like_id","total_like" => "$total_like");
        }
    }
    $data['status'] = 201;
    $data['chart'] = $chart_data;
    $data['donut_chart'] = $donut_chart;
    echo json_encode($data);
} else {
    $data['status'] = 301;
    echo json_encode($data);
}