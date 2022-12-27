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


get('./pinkpaper-testnet/', 'home.php');
get('./pinkpaper-testnet/home', 'home.php');
get('./pinkpaper-testnet/register', 'signup-user.php');
get('./pinkpaper-testnet/login-user', 'login-user.php');
get('./pinkpaper-testnet/login-user-mm', 'login-user-mm.php');
get('./pinkpaper-testnet/logout', 'logout-user.php');
get('./pinkpaper-testnet/reset-code', 'reset-code.php');
 get('./pinkpaper-testnet/user-otp', 'user-otp.php');
// get('./pinkpaper-testnet/logout', 'logout-user.php');
get('./pinkpaper-testnet/forgot-password', 'forgot-password.php');
get('./pinkpaper-testnet/create-story', 'create-story.php');
get('./pinkpaper-testnet/stories', 'stories.php');
get('./pinkpaper-testnet/user-stats', 'user-stats.php');
get('./pinkpaper-testnet/audience-stats', 'audience-stats.php');
get('./pinkpaper-testnet/reading-list', 'reading-list.php');
get('./pinkpaper-testnet/user-settings', 'user-settings.php');
get('./pinkpaper-testnet/about-us', 'about-us.php');
get('./pinkpaper-testnet/contact-us', 'contact-us.php');
get('./pinkpaper-testnet/edit-story/$edit_req', 'edit-story.php');
get('./pinkpaper-testnet/withdraw-fund/$edit_req', 'withdraw-fund.php');
get('./pinkpaper-testnet/privacy-policy', 'privacy-policy.php');
get('./pinkpaper-testnet/cookies-policy', 'cookies-policy.php');
get('./pinkpaper-testnet/terms_of_use', 'terms_of_use.php');
//dashboard
get('./pinkpaper-testnet/dashboard/', 'dashboard/index.php');
get('./pinkpaper-testnet/dashboard/login', 'dashboard/login.php');
get('./pinkpaper-testnet/dashboard/logout', 'dashboard/logout.php');
get('./pinkpaper-testnet/dashboard/allpost', 'dashboard/allpost.php');
get('./pinkpaper-testnet/dashboard/trash-stories', 'dashboard/trash-stories.php');
get('./pinkpaper-testnet/dashboard/all-tags', 'dashboard/all-tags.php');
get('./pinkpaper-testnet/dashboard/add-tag', 'dashboard/add-tag.php');
get('./pinkpaper-testnet/dashboard/all-users', 'dashboard/all-users.php');
get('./pinkpaper-testnet/dashboard/add-user', 'dashboard/add-user.php');
get('./pinkpaper-testnet/dashboard/addpost', 'dashboard/addpost.php');
get('./pinkpaper-testnet/dashboard/followusers', 'dashboard/followusers.php');
get('./pinkpaper-testnet/dashboard/postlike', 'dashboard/postlike.php');
get('./pinkpaper-testnet/dashboard/savepost', 'dashboard/savepost.php');
get('./pinkpaper-testnet/dashboard/newsletter', 'dashboard/newsletter.php');
get('./pinkpaper-testnet/dashboard/comments', 'dashboard/comments.php');
get('./pinkpaper-testnet/dashboard/viewlogo', 'dashboard/viewlogo.php');
get('./pinkpaper-testnet/dashboard/nav', 'dashboard/nav.php');
get('./pinkpaper-testnet/dashboard/social', 'dashboard/social.php');
get('./pinkpaper-testnet/dashboard/editor', 'dashboard/editor.php');
get('./pinkpaper-testnet/dashboard/contactus', 'dashboard/contactus.php');
get('./pinkpaper-testnet/dashboard/aboutus', 'dashboard/aboutus.php');
get('./pinkpaper-testnet/dashboard/aboutus', 'dashboard/privacy-policy.php');
get('./pinkpaper-testnet/dashboard/aboutus', 'dashboard/cookies-policy.php');
get('./pinkpaper-testnet/dashboard/aboutus', 'dashboard/terms.php');
get('./pinkpaper-testnet/dashboard/metamask', 'dashboard/metamask.php');
get('./pinkpaper-testnet/dashboard/change-password', 'dashboard/change-password.php');
get('./pinkpaper-testnet/about/$about_req', 'about.php');
get('./pinkpaper-testnet/topic/$topic_req', 'topic.php');
get('./pinkpaper-testnet/search/$search_req', 'search.php');
get('./pinkpaper-testnet/$username_profile', 'profile.php');
get('./pinkpaper-testnet/$username_post/$post_slug', 'single-post.php');
any('./pinkpaper-testnet/404','404.php');


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
