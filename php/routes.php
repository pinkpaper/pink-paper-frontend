<?php

require_once("./router.php");

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
//user panel
get('./cms-medium/', 'home.php');
get('./cms-medium/home', 'home.php');
get('./cms-medium/register', 'signup-user.php');
get('./cms-medium/login-user', 'login-user.php');
get('./cms-medium/logout', 'logout-user.php');
get('./cms-medium/reset-code', 'reset-code.php');
 get('./cms-medium/user-otp', 'user-otp.php');
 get('./cms-medium/password-changed', 'password-changed.php');
// get('./cms-medium/logout', 'logout-user.php');
get('./cms-medium/forgot-password', 'forgot-password.php');
get('./cms-medium/create-story', 'create-story.php');
get('./cms-medium/stories', 'stories.php');
get('./cms-medium/user-stats', 'user-stats.php');
get('./cms-medium/audience-stats', 'audience-stats.php');
get('./cms-medium/reading-list', 'reading-list.php');
get('./cms-medium/user-settings', 'user-settings.php');
get('./cms-medium/about-us', 'about-us.php');
get('./cms-medium/contact-us', 'contact-us.php');
get('./cms-medium/edit-story/$edit_req', 'edit-story.php');
get('./cms-medium/privacy-policy', 'privacy-policy.php');
get('./cms-medium/cookies-policy', 'cookies-policy.php');
get('./cms-medium/terms_of_use', 'terms_of_use.php');
//dashboard
get('./cms-medium/dashboard/', 'dashboard/index.php');
get('./cms-medium/dashboard/login', 'dashboard/login.php');
get('./cms-medium/dashboard/logout', 'dashboard/logout.php');
get('./cms-medium/dashboard/allpost', 'dashboard/allpost.php');
get('./cms-medium/dashboard/trash-stories', 'dashboard/trash-stories.php');
get('./cms-medium/dashboard/all-tags', 'dashboard/all-tags.php');
get('./cms-medium/dashboard/add-tag', 'dashboard/add-tag.php');
get('./cms-medium/dashboard/all-users', 'dashboard/all-users.php');
get('./cms-medium/dashboard/add-user', 'dashboard/add-user.php');
get('./cms-medium/dashboard/addpost', 'dashboard/addpost.php');
get('./cms-medium/dashboard/followusers', 'dashboard/followusers.php');
get('./cms-medium/dashboard/postlike', 'dashboard/postlike.php');
get('./cms-medium/dashboard/savepost', 'dashboard/savepost.php');
get('./cms-medium/dashboard/newsletter', 'dashboard/newsletter.php');
get('./cms-medium/dashboard/comments', 'dashboard/comments.php');
get('./cms-medium/dashboard/viewlogo', 'dashboard/viewlogo.php');
get('./cms-medium/dashboard/nav', 'dashboard/nav.php');
get('./cms-medium/dashboard/social', 'dashboard/social.php');
get('./cms-medium/dashboard/editor', 'dashboard/editor.php');
get('./cms-medium/dashboard/contactus', 'dashboard/contactus.php');
get('./cms-medium/dashboard/aboutus', 'dashboard/aboutus.php');
get('./cms-medium/dashboard/aboutus', 'dashboard/privacy-policy.php');
get('./cms-medium/dashboard/aboutus', 'dashboard/cookies-policy.php');
get('./cms-medium/dashboard/aboutus', 'dashboard/terms.php');
get('./cms-medium/dashboard/metamask', 'dashboard/metamask.php');
get('./cms-medium/dashboard/change-password', 'dashboard/change-password.php');

get('./cms-medium/about/$about_req', 'about.php');
get('./cms-medium/topic/$topic_req', 'topic.php');
get('./cms-medium/search/$search_req', 'search.php');
get('./cms-medium/$username_profile', 'profile.php');


get('./cms-medium/$username_post/$post_slug', 'single-post.php');

//get('./cms-medium/$username_post/$post_slug', 'extra.php');




// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
//get('/user/$id', 'user.php');

// Dynamic GET. Example with 2 variables
// The $name will be available in user.php
// The $last_name will be available in user.php
//get('/user/$name/$last_name', 'user.php');

// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
//get('/product/$type/color/:color', 'product.php');

// Dynamic GET. Example with 1 variable and 1 query string
// In the URL -> http://localhost/item/car?price=10
// The $name will be available in items.php which is inside the views folder
//get('/item/$name', 'views/items.php');


// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','404.php');
