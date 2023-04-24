<?php

require_once("./router.php");

// ##################################################
// ##################################################
// ##################################################

//
// ──────────────────────────────────────────────────────────────────────── II ──────────
//   :::::: L O C A L   R O U T E   D A T A : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────
//


get('./', 'home.php');
get('./home', 'home.php');
get('./register', 'signup-user.php');
get('./login-user', 'login-user.php');
get('./login-user-mm', 'login-user-mm.php');
get('./logout', 'logout-user.php');
get('./reset-code', 'reset-code.php');
 get('./user-otp', 'user-otp.php');
get('./inbox', 'inbox.php');
// get('./logout', 'logout-user.php');
get('./forgot-password', 'forgot-password.php');
get('./create-story', 'create-story.php');
get('./stories', 'stories.php');
get('./user-stats', 'user-stats.php');
get('./audience-stats', 'audience-stats.php');
get('./reading-list', 'reading-list.php');
get('./user-settings', 'user-settings.php');
get('./about-us', 'about-us.php');
get('./contact-us', 'contact-us.php');
get('./edit-story/$edit_req', 'edit-story.php');
get('./withdraw-fund/$edit_req', 'withdraw-fund.php');
get('./privacy-policy', 'privacy-policy.php');
get('./cookies-policy', 'cookies-policy.php');
get('./terms_of_use', 'terms_of_use.php');
get('./trending-post', 'trending-post.php');
get('./all-post', 'all-post.php');
get('./all-writers', 'all-writers.php');
get('./notifications', 'notifications.php');
//dashboard
get('./dashboard/', 'dashboard/index.php');
get('./dashboard/login', 'dashboard/login.php');
get('./dashboard/logout', 'dashboard/logout.php');
get('./dashboard/allpost', 'dashboard/allpost.php');
get('./dashboard/trash-stories', 'dashboard/trash-stories.php');
get('./dashboard/all-tags', 'dashboard/all-tags.php');
get('./dashboard/add-tag', 'dashboard/add-tag.php');
get('./dashboard/all-users', 'dashboard/all-users.php');
get('./dashboard/add-user', 'dashboard/add-user.php');
get('./dashboard/addpost', 'dashboard/addpost.php');
get('./dashboard/followusers', 'dashboard/followusers.php');
get('./dashboard/postlike', 'dashboard/postlike.php');
get('./dashboard/savepost', 'dashboard/savepost.php');
get('./dashboard/newsletter', 'dashboard/newsletter.php');
get('./dashboard/comments', 'dashboard/comments.php');
get('./dashboard/viewlogo', 'dashboard/viewlogo.php');
get('./dashboard/nav', 'dashboard/nav.php');
get('./dashboard/social', 'dashboard/social.php');
get('./dashboard/editor', 'dashboard/editor.php');
get('./dashboard/contactus', 'dashboard/contactus.php');
get('./dashboard/aboutus', 'dashboard/aboutus.php');
get('./dashboard/aboutus', 'dashboard/privacy-policy.php');
get('./dashboard/aboutus', 'dashboard/cookies-policy.php');
get('./dashboard/aboutus', 'dashboard/terms.php');
get('./dashboard/metamask', 'dashboard/metamask.php');
get('./dashboard/change-password', 'dashboard/change-password.php');
get('./about/$about_req', 'about.php');
get('./topic/$topic_req', 'topic.php');
get('./search/$search_req', 'search.php');
get('./$username_profile', 'profile.php');
get('./$username_post/$post_slug', 'single-post.php');

any('./404','404.php');


//
// ────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: L I V E   R O U T E   D A T A : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────────
//

// get('./', 'home.php');
// get('./home', 'home.php');
// get('./register', 'signup-user.php');
// get('./login-user', 'login-user.php');
// get('./login-user-mm', 'login-user-mm.php');
// get('./logout', 'logout-user.php');
// get('./reset-code', 'reset-code.php');
//  get('./user-otp', 'user-otp.php');
// // get('./logout', 'logout-user.php');
// get('./forgot-password', 'forgot-password.php');
// get('./create-story', 'create-story.php');
// get('./stories', 'stories.php');
// get('./user-stats', 'user-stats.php');
// get('./audience-stats', 'audience-stats.php');
// get('./reading-list', 'reading-list.php');
// get('./user-settings', 'user-settings.php');
// get('./about-us', 'about-us.php');
// get('./contact-us', 'contact-us.php');
// get('./edit-story/$edit_req', 'edit-story.php');
// get('./privacy-policy', 'privacy-policy.php');
// get('./cookies-policy', 'cookies-policy.php');
// get('./terms_of_use', 'terms_of_use.php');
// //dashboard
// get('./dashboard/', 'dashboard/index.php');
// get('./dashboard/login', 'dashboard/login.php');
// get('./dashboard/logout', 'dashboard/logout.php');
// get('./dashboard/allpost', 'dashboard/allpost.php');
// get('./dashboard/trash-stories', 'dashboard/trash-stories.php');
// get('./dashboard/all-tags', 'dashboard/all-tags.php');
// get('./dashboard/add-tag', 'dashboard/add-tag.php');
// get('./dashboard/all-users', 'dashboard/all-users.php');
// get('./dashboard/add-user', 'dashboard/add-user.php');
// get('./dashboard/addpost', 'dashboard/addpost.php');
// get('./dashboard/followusers', 'dashboard/followusers.php');
// get('./dashboard/postlike', 'dashboard/postlike.php');
// get('./dashboard/savepost', 'dashboard/savepost.php');
// get('./dashboard/newsletter', 'dashboard/newsletter.php');
// get('./dashboard/comments', 'dashboard/comments.php');
// get('./dashboard/viewlogo', 'dashboard/viewlogo.php');
// get('./dashboard/nav', 'dashboard/nav.php');
// get('./dashboard/social', 'dashboard/social.php');
// get('./dashboard/editor', 'dashboard/editor.php');
// get('./dashboard/contactus', 'dashboard/contactus.php');
// get('./dashboard/aboutus', 'dashboard/aboutus.php');
// get('./dashboard/aboutus', 'dashboard/privacy-policy.php');
// get('./dashboard/aboutus', 'dashboard/cookies-policy.php');
// get('./dashboard/aboutus', 'dashboard/terms.php');
// get('./dashboard/metamask', 'dashboard/metamask.php');
// get('./dashboard/change-password', 'dashboard/change-password.php');
// get('./about/$about_req', 'about.php');
// get('./topic/$topic_req', 'topic.php');
// get('./search/$search_req', 'search.php');
// get('./$username_profile', 'profile.php');
// get('./$username_post/$post_slug', 'single-post.php');
// any('/404','404.php');
