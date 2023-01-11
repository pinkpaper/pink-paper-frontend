<?php
error_reporting(E_ALL);

$con =mysqli_connect('localhost','ether_cms','WL02XE056L5j','ether_cms');
$stories = $con->query("SELECT post_slug,user_uid FROM stories");
$username=$con->query("SELECT username,user_uid FROM user_login");
$baseUrl = "https://content.pinkpaper.xyz/";
$notification="https://content.pinkpaper.xyz/login-user-mm";
$reading_list="https://content.pinkpaper.xyz/topic/Blockchain";

header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

$create_story="https://content.pinkpaper.xyz/create-story";
$all_writer="https://content.pinkpaper.xyz/about-us";
$tranding_post="https://content.pinkpaper.xyz/contact-us";
$datetime = new DateTime('now', new DateTimeZone('Asia/Calcutta'));

    $datetime = $datetime->format(DateTime::ATOM); // output: '2021-01-03T02:30:00+01:00'


    echo '<url>' . PHP_EOL;
        echo '<loc>' . $baseUrl . '</loc>' . PHP_EOL;
        echo '<lastmod>'.$datetime.'</lastmod>' . PHP_EOL;
        echo '<priority>1.00</priority>'.PHP_EOL;
        echo '</url>' . PHP_EOL;

    $tags = $con->query("SELECT * FROM `tags` where 1");

    if ($tags->num_rows > 0) {
    while ($story = $tags->fetch_assoc()) {
    $topics = $story['tag_name'];
    // Generate a unique URL for the story
    $url = $baseUrl .'topic/'. "$topics";
    // Output the URL for the story
    echo '<url>' . PHP_EOL;
        echo '<loc>' . $url . '</loc>' . PHP_EOL;
        echo '<lastmod>'.$datetime.'</lastmod>' . PHP_EOL;
        echo '<priority>0.80</priority>'.PHP_EOL;
        echo '</url>' . PHP_EOL;
    }
    } else {
    // If no rows are returned, output an error message
    echo 'Error: No rows returned from the database';
    }


    $stories = $con->query("SELECT s.post_slug, u.username, u.user_uid FROM stories s INNER JOIN user_login u ON
    s.user_uid = u.user_uid");

    if ($stories->num_rows > 0) {
    while ($story = $stories->fetch_assoc()) {
    $slug = $story['post_slug'];
    $userName = $story['username'];
    $user_id = $story['user_uid'];

    // Generate a unique URL for the story
    $url = $baseUrl . "$userName/$slug";
    // Output the URL for the story
    echo '<url>' . PHP_EOL;
        echo '<loc>' . $url . '</loc>' . PHP_EOL;
        echo '<lastmod>'.$datetime.'</lastmod>' . PHP_EOL;
        echo '<priority>0.60</priority>'.PHP_EOL;
        echo '</url>' . PHP_EOL;
    }
    } else {
    // If no rows are returned, output an error message
    echo 'Error: No rows returned from the database';
    }

    $users = $con->query("SELECT * FROM user_login where 1");

    if ($users->num_rows > 0) {
    while ($story = $users->fetch_assoc()) {
    $userName = $story['username'];
    $user_id = $story['user_uid'];

    // Generate a unique URL for the story
    $url = $baseUrl . "$userName";
    // Output the URL for the story
    echo '<url>' . PHP_EOL;
        echo '<loc>' . $url . '</loc>' . PHP_EOL;
        echo '<lastmod>'.$datetime.'</lastmod>' . PHP_EOL;
        echo '<priority>0.40</priority>'.PHP_EOL;
        echo '</url>' . PHP_EOL;
    }
    } else {
    // If no rows are returned, output an error message
    echo 'Error: No rows returned from the database';
    }
    echo '<url>' . PHP_EOL;
        echo '<loc>' . $create_story . '</loc>' . PHP_EOL;
        echo '<lastmod>'.$datetime.'</lastmod>' . PHP_EOL;
        echo '<priority>0.20</priority>'.PHP_EOL;
        echo '</url>' . PHP_EOL;
    echo '<url>' . PHP_EOL;
        echo '<loc>' . $all_writer . '</loc>' . PHP_EOL;
        echo '<lastmod>'.$datetime.'</lastmod>' . PHP_EOL;
        echo '<priority>0.20</priority>'.PHP_EOL;
        echo '</url>' . PHP_EOL;
    echo '<url>' . PHP_EOL;
        echo '<loc>' . $tranding_post . '</loc>' . PHP_EOL;
        echo '<lastmod>'.$datetime.'</lastmod>' . PHP_EOL;
        echo '<priority>0.20</priority>'.PHP_EOL;
        echo '</url>' . PHP_EOL;
    echo '<url>' . PHP_EOL;
        echo '<loc>' . $notification . '</loc>' . PHP_EOL;
        echo '<lastmod>'.$datetime.'</lastmod>' . PHP_EOL;
        echo '<priority>0.20</priority>'.PHP_EOL;
        echo '</url>' . PHP_EOL;
    echo '<url>' . PHP_EOL;
        echo '<loc>' . $reading_list . '</loc>' . PHP_EOL;
        echo '<lastmod>'.$datetime.'</lastmod>' . PHP_EOL;
        echo '<priority>0.20</priority>'.PHP_EOL;
        echo '</url>' . PHP_EOL;
    echo '</urlset>' . PHP_EOL;
