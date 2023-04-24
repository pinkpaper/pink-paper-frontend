<div class="container">
    <div class="row">
        <div class="col-lg-1 d-flex justify-content-center">
            <!-- side menu include here start -->
            <?php include('include/side-menu-medium-top.php'); ?>
            <?php include('include/side-menu-medium.php'); ?>
            <?php include('include/side-menu-medium-bottom.php'); ?>
            <!-- side menu include here end -->
        </div>
        <div class="col-lg-8 col-md-12 side-border">
            <div>
                <header class="header-wrapper px-2">
                    <div class="d-lg-flex header-wrapper-inner">
                        <div class="header-inner">
                            <div class="header-div-new">
                                <?php
                                if ($profile2 == '') {
                                    echo '<a class="header-anchor" rel="noopener follow" href="' . $username2 . '">
                                                <div class="header-anchor-div">
                                                <canvas class="avatar-image img-fluid rounded-circle single-canvas-image" title="' . $name2 . '" loading="lazy"></canvas><div class="header-anchor-div-img-div"></div></div>
                                            </a>';
                                } else {
                                    echo '<a class="header-anchor" rel="noopener follow" href="' . $username2 . '">
                                                <div class="header-anchor-div">
                                                <img src="uploads/profile/' . $profile2 . '" alt="" class="img-fluid rounded-circle" width="48" height="48" loading="lazy"><div class="header-anchor-div-img-div"></div></div>
                                                </a>';
                                }
                                ?>
                            </div>
                            <div class="y">
                                <div class="header-text-wrapper">
                                    <div class="header-text-wrapper-inner">
                                        <div>
                                            <div class="cp" aria-hidden="false" aria-describedby="2565" aria-labelledby="2565">
                                                <a class="ay az ba bb bc bd be bf bg bh bi bj bk bl bm" rel="noopener follow" href="<?php echo $username2; ?>"><?php echo $name2; ?></a>
                                            </div>
                                        </div>
                                        <div class="follow-text-wrapper"><button class="follow-text-inner">Follow</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-text-below">
                                    <p class="pw-published-date bv b bw bx hj">
                                        <span><?php echo date('M j, Y', strtotime($created_at2)); ?></span>
                                    </p>
                                    <div class="published-dot" aria-hidden="true">
                                        <span class="y" aria-hidden="true">
                                            <span class="published-dot-inner">·</span>
                                        </span>
                                    </div>
                                    <div class="pw-reading-time bv b bw bx hj"><?php
                                                                                $mycontent = $post_content2;
                                                                                $word = str_word_count(strip_tags($mycontent));
                                                                                $m = floor($word / 200);
                                                                                $s = floor($word % 200 / (200 / 60));
                                                                                //$readtime = $m . ' min' . ($m == 1 ? '' : 's') . ', ' . $s . ' sec' . ($s == 1 ? '' : 's');
                                                                                if ($m >= '1') {
                                                                                    echo $m . ' min' . ($m == 1 ? '' : 's') . ' read';
                                                                                } else if ($m <= '1') {
                                                                                    echo $s . ' sec' . ($s == 1 ? '' : 's') . ' read';
                                                                                }
                                                                                ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="social-share-wrapper">
                            <div class="social-share-wrapper-inner">
                                <div class="social-share">
                                    <div>
                                        <div class="cp" aria-hidden="false" aria-describedby="2566" aria-labelledby="2566">
                                            <a href="https://twitter.com/share?url=<?php echo $post_link; ?>&text=<?php echo $post_title2; ?>" class="social-share-button" aria-label="Share on twitter" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><span class="social-share-button-span"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M20 5.34c-.67.41-1.4.7-2.18.87a3.45 3.45 0 0 0-5.02-.1 3.49 3.49 0 0 0-1.02 2.47c0 .28.03.54.07.8a9.91 9.91 0 0 1-7.17-3.66 3.9 3.9 0 0 0-.5 1.74 3.6 3.6 0 0 0 1.56 2.92 3.36 3.36 0 0 1-1.55-.44V10c0 1.67 1.2 3.08 2.8 3.42-.3.06-.6.1-.94.12l-.62-.06a3.5 3.5 0 0 0 3.24 2.43 7.34 7.34 0 0 1-4.36 1.49l-.81-.05a9.96 9.96 0 0 0 5.36 1.56c6.4 0 9.91-5.32 9.9-9.9v-.5c.69-.49 1.28-1.1 1.74-1.81-.63.3-1.3.48-2 .56A3.33 3.33 0 0 0 20 5.33" fill="#A8A8A8">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="social-share">
                                    <div>
                                        <div class="cp" aria-hidden="false" aria-describedby="2567" aria-labelledby="2567">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_link; ?>&t=<?php echo $post_title2; ?>" class="social-share-button" aria-label="Share on facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><span class="social-share-button-span"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M19.75 12.04c0-4.3-3.47-7.79-7.75-7.79a7.77 7.77 0 0 0-5.9 12.84 7.77 7.77 0 0 0 4.69 2.63v-5.49h-1.9v-2.2h1.9v-1.62c0-1.88 1.14-2.9 2.8-2.9.8 0 1.49.06 1.69.08v1.97h-1.15c-.91 0-1.1.43-1.1 1.07v1.4h2.17l-.28 2.2h-1.88v5.52a7.77 7.77 0 0 0 6.7-7.71" fill="#A8A8A8">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="social-share">
                                    <div>
                                        <div class="cp" aria-hidden="false" aria-describedby="2568" aria-labelledby="2568">
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_link; ?>&t=<?php echo $post_title2; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Linkedin" class="social-share-button" aria-label="Share on linkedin">
                                                <span class="social-share-button-span">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M19.75 5.39v13.22a1.14 1.14 0 0 1-1.14 1.14H5.39a1.14 1.14 0 0 1-1.14-1.14V5.39a1.14 1.14 0 0 1 1.14-1.14h13.22a1.14 1.14 0 0 1 1.14 1.14zM8.81 10.18H6.53v7.3H8.8v-7.3zM9 7.67a1.31 1.31 0 0 0-1.3-1.32h-.04a1.32 1.32 0 0 0 0 2.64A1.31 1.31 0 0 0 9 7.71v-.04zm8.46 5.37c0-2.2-1.4-3.05-2.78-3.05a2.6 2.6 0 0 0-2.3 1.18h-.07v-1h-2.14v7.3h2.28V13.6a1.51 1.51 0 0 1 1.36-1.63h.09c.72 0 1.26.45 1.26 1.6v3.91h2.28l.02-4.43z" fill="#A8A8A8">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if($ipfs_link !== '' && $ipfs_link){
                                ?>
                                <div class="social-share">
                                    <div>
                                        <div class="cp" aria-hidden="false" aria-describedby="2568" aria-labelledby="2568">
                                            <a href="<?php echo $ipfs_link ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="IPFS url" class="social-share-button" aria-label="Share on linkedin">
                                                <span class="social-share-button-span px-1">
                                                    <img src="assets/images/box.svg" alt="box" width="17" height="17">
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="social-share-other">
                                    <div>
                                        <div class="cp" aria-hidden="false" aria-describedby="2569" aria-labelledby="2569">
                                            <button class="social-share-button copy-link" data-clipboard-text="<?php echo $post_link; ?>" title="Copy link">
                                                <span class="social-share-button-span">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.57 14.67c0-.57.13-1.11.38-1.6l.02-.02v-.02l.02-.02c0-.02 0-.02.02-.02.12-.26.3-.52.57-.8L7.78 9v-.02l.01-.02c.44-.41.91-.7 1.44-.85a4.87 4.87 0 0 0-1.19 2.36A5.04 5.04 0 0 0 8 11.6L6.04 13.6c-.19.19-.32.4-.38.65a2 2 0 0 0 0 .9c.08.2.2.4.38.57l1.29 1.31c.27.28.62.42 1.03.42.42 0 .78-.14 1.06-.42l1.23-1.25.79-.78 1.15-1.16c.08-.09.19-.22.28-.4.1-.2.15-.42.15-.67 0-.16-.02-.3-.06-.45l-.02-.02v-.02l-.07-.14s0-.03-.04-.06l-.06-.13-.02-.02c0-.02 0-.03-.02-.05a.6.6 0 0 0-.14-.16l-.48-.5c0-.04.02-.1.04-.15l.06-.12 1.17-1.14.09-.09.56.57c.02.04.08.1.16.18l.05.04.03.06.04.05.03.04.04.06.1.14.02.02c0 .02.01.03.03.04l.1.2v.02c.1.16.2.38.3.68a1 1 0 0 1 .04.25 3.2 3.2 0 0 1 .02 1.33 3.49 3.49 0 0 1-.95 1.87l-.66.67-.97.97-1.56 1.57a3.4 3.4 0 0 1-2.47 1.02c-.97 0-1.8-.34-2.49-1.03l-1.3-1.3a3.55 3.55 0 0 1-1-2.51v-.01h-.02v.02zm5.39-3.43c0-.19.02-.4.07-.63.13-.74.44-1.37.95-1.87l.66-.67.97-.98 1.56-1.56c.68-.69 1.5-1.03 2.47-1.03.97 0 1.8.34 2.48 1.02l1.3 1.32a3.48 3.48 0 0 1 1 2.48c0 .58-.11 1.11-.37 1.6l-.02.02v.02l-.02.04c-.14.27-.35.54-.6.8L16.23 15l-.01.02-.01.02c-.44.42-.92.7-1.43.83a4.55 4.55 0 0 0 1.23-3.52L18 10.38c.18-.21.3-.42.35-.65a2.03 2.03 0 0 0-.01-.9 1.96 1.96 0 0 0-.36-.58l-1.3-1.3a1.49 1.49 0 0 0-1.06-.42c-.42 0-.77.14-1.06.4l-1.2 1.27-.8.8-1.16 1.15c-.08.08-.18.21-.29.4a1.66 1.66 0 0 0-.08 1.12l.02.03v.02l.06.14s.01.03.05.06l.06.13.02.02.01.02.01.02c.05.08.1.13.14.16l.47.5c0 .04-.02.09-.04.15l-.06.12-1.15 1.15-.1.08-.56-.56a2.3 2.3 0 0 0-.18-.19c-.02-.01-.02-.03-.02-.04l-.02-.02a.37.37 0 0 1-.1-.12c-.03-.03-.05-.04-.05-.06l-.1-.15-.02-.02-.02-.04-.08-.17v-.02a5.1 5.1 0 0 1-.28-.69 1.03 1.03 0 0 1-.04-.26c-.06-.23-.1-.46-.1-.7v.01z" fill="#A8A8A8">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="social-share-other-new">
                                    <div>
                                        <div class="social-share-other-new-wrapper" aria-hidden="false" aria-describedby="83" aria-labelledby="83">
                                            <div class="social-share-other-new-wrapper-inner" aria-hidden="false" id="divProfileReload">
                                                <?php
                                                $user_uid2 = $user_uid ?? null;
                                                $sql12 = "SELECT * FROM post_list WHERE post_uid = '$post_uid' AND user_uid = '$user_uid2'";
                                                $run_Sql12 = mysqli_query($link, $sql12);
                                                $fetch_info12 = mysqli_fetch_assoc($run_Sql12);

                                                $list_user_uid = $fetch_info12['user_uid'] ?? null;
                                                $list_post_uid = $fetch_info12['post_uid'] ?? null;
                                                if (!isset($_SESSION['username'])) {
                                                    echo '<p class="icon-color mb-0 save-reload" onClick="login()"><i class="far fa-bookmark"></i></p>';
                                                } else if ($list_user_uid == $user_uid2 && $list_post_uid == $post_uid) {
                                                    echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                                    aria-label="Add to list bookmark button"
                                                    class="social-share-other-new-wrapper-inner-button save-reload" onClick="unsave(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        class="vt">
                                                        <path
                                                            d="M7.5 3.75a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-14a2 2 0 0 0-2-2h-9z"
                                                            fill="#000"></path>
                                                    </svg>
                                                </button>';
                                                } else {
                                                    echo '<button aria-controls="addToCatalogBookmarkButton" aria-expanded="false"
                                                    aria-label="Add to list bookmark button"
                                                    class="social-share-other-new-wrapper-inner-button save-reload" onClick="save(\'' . $user_uid . '\',\'' . $post_uid . '\')">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        class="social-button-inner">
                                                        <path
                                                            d="M17.5 1.25a.5.5 0 0 1 1 0v2.5H21a.5.5 0 0 1 0 1h-2.5v2.5a.5.5 0 0 1-1 0v-2.5H15a.5.5 0 0 1 0-1h2.5v-2.5zm-11 4.5a1 1 0 0 1 1-1H11a.5.5 0 0 0 0-1H7.5a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-8.5a.5.5 0 0 0-1 0v7.48l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V5.75z"
                                                            fill="#000"></path>
                                                    </svg>
                                                </button>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', 'Test@Pinkpaper2323', 'demo_pinkpaper');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the post with the specified post_uid from the stories table
$sql = "SELECT post_status FROM stories WHERE post_uid='$post_uid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($post = mysqli_fetch_assoc($result)) {
        // If the post status is "published"
        if ($post['post_status'] == 'published') {
    ?>
      <section class="content-panel m-lg-5">
                    <div class="card-body">
                        <h2 class="fw-bold mb-4" style="color:var(--text-color);"><?php echo $post_title2; ?></h2>
                        <?php
                        if ($featured_image2 !== '') {
                        ?>
                            <div class="mb-3">
                                <?php
                                if ($featured_image2 == '') {
                                    echo '<img src="https://test.pinkpaper.xyz/assets/images/blogcms.com.png" alt="image" class="shadow img-fluid" style="border-radius:15px;">';
                                } else {
                                    echo '<img src="uploads/featuredImages/' . $featured_image2 . '" alt="image" class="shadow img-fluid" style="border-radius:15px;" onError="this.onerror=null;this.src=\'https://test.pinkpaper.xyz/assets/images/blogcms.com.png\';">';
                                }
                                ?>
                            </div>
                        <?php } ?>
                        <div class="mb-2 post-content" style="color:var(--gray-color);">
                            <?php echo $post_content2; ?>
                        </div>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <?php
                            $tag_name = explode(",", $post_tags2);
                            foreach ($tag_name as $key => $val) {
                                echo '<a href="topic/' . $val . '" class="topic fw-bold py-1 px-3">' . $val . '</a>';
                            }
                            ?>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center" id="social-style">
                            <div class="d-flex gap-4 mb-2 mb-lg-0 mb-md-0" id="divReload">
                                <?php
                                $user_uid2 = $user_uid ?? null;
                                $sql10 = "SELECT * FROM post_like WHERE post_uid = '$post_uid' AND user_uid = '$user_uid2'";
                                $run_Sql10 = mysqli_query($link, $sql10);
                                $fetch_info10 = mysqli_fetch_assoc($run_Sql10);

                                $run_Sql11 = mysqli_query($link, "SELECT * FROM post_like WHERE post_uid = '$post_uid'");
                                $count_like = mysqli_num_rows($run_Sql11);

                                $like_user_uid = $fetch_info10['user_uid'] ?? null;
                                $like_post_uid = $fetch_info10['post_uid'] ?? null;
                                if (!isset($_SESSION['username'])) {
                                    echo '<p class="icon-color mb-0 like-reload" onClick="login()"><i class="far fa-heart"></i> ' . $count_like . '</p>';
                                } else if ($like_user_uid == $user_uid2 && $like_post_uid == $post_uid) {
                                    echo '<p class="icon-color mb-0 like-reload" onClick="unlike(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="fas fa-heart"></i> ' . $count_like . '</p>';
                                } else {
                                    echo '<p class="icon-color mb-0 like-reload" onClick="like(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="far fa-heart"></i> ' . $count_like . '</p>';
                                }
                                ?>


                                <p class="icon-color mb-0" data-bs-toggle="modal" data-bs-target="#commentRightModal"><i class="far fa-comment"></i></p>


                                <?php
                                $user_uid2 = $user_uid ?? null;
                                $sql12 = "SELECT * FROM post_list WHERE post_uid = '$post_uid' AND user_uid = '$user_uid2'";
                                $run_Sql12 = mysqli_query($link, $sql12);
                                $fetch_info12 = mysqli_fetch_assoc($run_Sql12);

                                $list_user_uid = $fetch_info12['user_uid'] ?? null;
                                $list_post_uid = $fetch_info12['post_uid'] ?? null;
                                if (!isset($_SESSION['username'])) {
                                    echo '<p class="icon-color mb-0 save-reload" onClick="login()"><i class="far fa-bookmark"></i></p>';
                                } else if ($list_user_uid == $user_uid2 && $list_post_uid == $post_uid) {
                                    echo '<p class="icon-color mb-0 save-reload" onClick="unsave(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="fas fa-bookmark"></i></p>';
                                } else {
                                    echo '<p class="icon-color mb-0 save-reload" onClick="save(\'' . $user_uid . '\',\'' . $post_uid . '\')"><i class="far fa-bookmark"></i></p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
<?php
    } else if ($post['post_status'] == 'schedule') {
        echo '<div class="text-center font-weight-bold">
    <p class="text-warning fs-3 fw-bold">This post is schedule and will be published soon.</p>
</div>';
    } 
    else if($post['post_status'] == 'deleted'){
        echo '<div class="text-center font-weight-bold">
    <p class="text-danger fs-3 fw-bold">This post has been deleted.</p>
</div>';
    }
}
} else {
echo "No post found with the specified post_uid";
}

// Close connection
mysqli_close($conn);
?>
      
            </div>
        </div>
        <div class="col-lg-3 pb-5 pb-lg-0">
            <div class="h-100 position-relative d-inline-block">
                <div class="sticky-lg-top">
                    <div class="h-100 w-100">
                        <div class="search-wrapper">
                            <div class="am lz ma mb">
                                <div class="cp" aria-hidden="false" aria-describedby="searchResults" aria-labelledby="searchResults"></div><span class="mg y"><svg width="25" height="25" viewBox="0 0 25 25" fill="rgba(8, 8, 8, 1)">
                                        <path d="M20.07 18.93l-4.16-4.15a6 6 0 1 0-.88.88l4.15 4.16a.62.62 0 1 0 .89-.89zM6.5 11a4.75 4.75 0 1 1 9.5 0 4.75 4.75 0 0 1-9.5 0z">
                                        </path>
                                    </svg></span>
                                <input type="search" id="searchtext2" name="searchtext" class="ks mc bv bw bx ae md me by mf" placeholder="Search">
                            </div>
                        </div>
                        <div class="user-profile-wrapper">
                            <a class="user-profile-inner" href="<?php echo $username2; ?>" rel="noopener follow">
                                <div class="user-profile-div">
                                    <?php
                                    if ($profile2 == '') {
                                        echo '<canvas class="avatar-image img-fluid rounded-circle user-profile-img" title="' . $name2 . '" width="88" height="88"></canvas>';
                                    } else {
                                        echo '<img src="uploads/profile/' . $profile2 . '" alt="" class="user-profile-img" width="88" height="88" loading="lazy">';
                                    }
                                    ?>
                                    <div class="user-profile-inner-div"></div>
                                </div>
                            </a>
                            <div class="tt l"></div>
                            <a class="user-profile-inner" href="<?php echo $username2; ?>" rel="noopener follow">
                                <h2 class="pw-author-name"><span class="il"><?php echo $name2; ?></span></h2>
                            </a>
                            <div class="tu l"></div>
                            <span class="pw-follower-count">
                                <a href="<?php echo $username2; ?>" class="user-profile-inner-button">
                                    <?php
                                    $sql5 = "SELECT * FROM follow WHERE followed_user_uid = '$user_uid_follow'";
                                    $run_Sql5 = mysqli_query($link, $sql5);
                                    $follower_count = mysqli_num_rows($run_Sql5);
                                    ?>
                                    <?= $follower_count ?> Followers
                                </a>
                            </span>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="social-share-wrapper-inner">
                                    <?php
                                    if ($twitter_url !== '' && $twitter_url !== null) {
                                    ?>
                                        <div class="social-share">
                                            <div>
                                                <div class="cp" aria-hidden="false" aria-describedby="2566" aria-labelledby="2566">
                                                    <a href='<?php echo $twitter_url; ?>' onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Follow me on Twitter">
                                                        <span class="social-share-button-span social-share-button-author"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M20 5.34c-.67.41-1.4.7-2.18.87a3.45 3.45 0 0 0-5.02-.1 3.49 3.49 0 0 0-1.02 2.47c0 .28.03.54.07.8a9.91 9.91 0 0 1-7.17-3.66 3.9 3.9 0 0 0-.5 1.74 3.6 3.6 0 0 0 1.56 2.92 3.36 3.36 0 0 1-1.55-.44V10c0 1.67 1.2 3.08 2.8 3.42-.3.06-.6.1-.94.12l-.62-.06a3.5 3.5 0 0 0 3.24 2.43 7.34 7.34 0 0 1-4.36 1.49l-.81-.05a9.96 9.96 0 0 0 5.36 1.56c6.4 0 9.91-5.32 9.9-9.9v-.5c.69-.49 1.28-1.1 1.74-1.81-.63.3-1.3.48-2 .56A3.33 3.33 0 0 0 20 5.33" fill="#A8A8A8">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($facebook_url !== '' && $facebook_url !== null) {
                                    ?>
                                        <div class="social-share">
                                            <div>
                                                <div class="cp" aria-hidden="false" aria-describedby="2567" aria-labelledby="2567">
                                                    <a href='<?php echo $facebook_url; ?>' onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Follow me on Facebook"><span class="social-share-button-span social-share-button-author"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M19.75 12.04c0-4.3-3.47-7.79-7.75-7.79a7.77 7.77 0 0 0-5.9 12.84 7.77 7.77 0 0 0 4.69 2.63v-5.49h-1.9v-2.2h1.9v-1.62c0-1.88 1.14-2.9 2.8-2.9.8 0 1.49.06 1.69.08v1.97h-1.15c-.91 0-1.1.43-1.1 1.07v1.4h2.17l-.28 2.2h-1.88v5.52a7.77 7.77 0 0 0 6.7-7.71" fill="#A8A8A8">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($linkedin_url !== '' && $linkedin_url !== null) {
                                    ?>
                                        <div class="social-share">
                                            <div>
                                                <div class="cp" aria-hidden="false" aria-describedby="2568" aria-labelledby="2568">
                                                    <a href='<?php echo $linkedin_url; ?>' onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Follow me on Linkedin">
                                                        <span class="social-share-button-span social-share-button-author">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M19.75 5.39v13.22a1.14 1.14 0 0 1-1.14 1.14H5.39a1.14 1.14 0 0 1-1.14-1.14V5.39a1.14 1.14 0 0 1 1.14-1.14h13.22a1.14 1.14 0 0 1 1.14 1.14zM8.81 10.18H6.53v7.3H8.8v-7.3zM9 7.67a1.31 1.31 0 0 0-1.3-1.32h-.04a1.32 1.32 0 0 0 0 2.64A1.31 1.31 0 0 0 9 7.71v-.04zm8.46 5.37c0-2.2-1.4-3.05-2.78-3.05a2.6 2.6 0 0 0-2.3 1.18h-.07v-1h-2.14v7.3h2.28V13.6a1.51 1.51 0 0 1 1.36-1.63h.09c.72 0 1.26.45 1.26 1.6v3.91h2.28l.02-4.43z" fill="#A8A8A8">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($instagram_url !== '' && $instagram_url !== null) {
                                    ?>
                                        <div class="social-share">
                                            <div>
                                                <div class="cp" aria-hidden="false" aria-describedby="2568" aria-labelledby="2568">
                                                    <a href='<?php echo $instagram_url; ?>' onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Follow me on Instagram">
                                                        <span class="social-share-button-span px-1 social-share-button-author2">
                                                            <img src="assets/images/insta.svg" alt="box" width="17" height="17">
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="tv l"></div>
                            <p class="user-profile-para">
                                <span class="user-profile-para-desc"><?php echo $bio2; ?></span>
                            </p>
                            <div class="tx o w-100" id="follow_reload" style="flex-direction:column;gap:1rem;">
                                <?php
                                $user_uid2 = $user_uid ?? null;
                                $sql20 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid2' 
                                        AND followed_user_uid = '$user_uid_follow'";
                                $run_Sql20 = mysqli_query($link, $sql20);
                                $fetch_info20 = mysqli_fetch_assoc($run_Sql20);

                                $following_user_uid = $fetch_info20['following_user_uid'] ?? null;
                                $followed_user_uid = $fetch_info20['followed_user_uid'] ?? null;

                                if (!isset($_SESSION['username'])) {
                                    echo '<button type="button" class="user-profile-follow-button w-100" onClick="login()">Follow</button>';
                                } else if ($user_uid2 == $user_uid_follow) {
                                    //echo '';
                                } else if ($following_user_uid == $user_uid2 && $followed_user_uid == $user_uid_follow) {
                                    echo '<button type="button" class="user-profile-follow-button w-100 following-button" onClick="unfollow(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Following</button>';;
                                    if ((strpos($user_address_new, '0x') === 0) && (($user_address_new !== $author_current_address) && (strpos($author_current_address, '0x') === 0))) {
                                    echo '<button type="button" class="user-profile-follow-button w-100" onClick="window.location.replace(\'inbox?user='.$author_current_address.'\')">Start Chat</button>';
                                    }
                                } else {
                                    echo '<button type="button" class="user-profile-follow-button w-100" onClick="follow(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Follow</button>';
                                }
                                ?>
                            </div>
                            <?php
                            if (!isset($_SESSION['username'])) {
                                if ($metamask_author !== '' && $metamask_author) {
                                    echo '<div class="tx o"><button class="btn tip-button-2 fw-bold  mt-3 w-100" onClick="login()"><img src="https://test.pinkpaper.xyz/assets/images/metamask-fox.svg"><span class="ms-2">Donate<span class="d-lg-none"> with MetaMask</span></span></button></div>';
                                }
                                if ($neo_author !== '' && $neo_author) {
                                    echo '<div class="tx o"><button class="btn tip-button-2 fw-bold  mt-3 w-100" onClick="login()"><img src="assets/images/n.png" style="width:25px;height:25px;"><span class="ms-2">Donate<span class="d-lg-none"> with Neo</span></span></button></div>';
                                }
                                if ($Idriss_username !== '' && $Idriss_username) {
                                    echo '<div class="tx o"><button class="btn tip-button-2 fw-bold  mt-3 w-100 d-flex justify-content-center align-items-center" onClick="login()"><img src="assets/images/Idriss.png" style="width:25px;height:25px;"><span class="ms-2"><span class="text-truncate d-block">' . $Idriss_username . '</span></span></button></div>';
                                }
                            } else if ($user_uid2 == $user_uid_follow) {
                                echo '';
                            } else {
                                $query33 = "SELECT * FROM `metamask_details` WHERE `user_uid` = '$user_uid_follow'";
                                $result33 = mysqli_query($link, $query33);
                                if (mysqli_num_rows($result33) > 0) {
                                    while ($row33 = mysqli_fetch_assoc($result33)) {
                                        if ($row33['eth_metamask_address'] !== '' && $row33['eth_metamask_address']) {
                                            echo '<div class="tx o"><button class="btn tip-button-2 fw-bold  mt-3 w-100" data-bs-toggle="modal" data-bs-target="#metamaskDonateModal"><img src="https://test.pinkpaper.xyz/assets/images/metamask-fox.svg"><span class="ms-2">Donate<span class="d-lg-none">with MetaMask </span></span></button></div>';
                                        }
                                        if ($row33['neo_address'] !== '' && $row33['neo_address']) {
                                            echo '<div class="tx o"><button class="btn tip-button-2 fw-bold  mt-3 w-100" data-bs-toggle="modal" data-bs-target="#neoDonateModal"><img src="assets/images/n.png"><span class="ms-2">Donate<span class="d-lg-none">with Neo </span></span></button></div>';
                                        }
                                        if ($row33['Idriss_username'] !== '' && $row33['Idriss_username']) {
                                            echo '<div class="tx o"><button class="btn tip-button-2 fw-bold  mt-3 w-100 d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#IdrissDonateModal"><img src="assets/images/Idriss.png" style="width:25px;height:25px;"><span class="ms-2"><span class="text-truncate d-block">' . $Idriss_username . '</span></span></button></div>';
                                        }
                                    }
                                }
                            ?>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- user donation start -->
                        <div class="lw lx ly y">
                            <div class="y">
                                <div class="y">
                                    <div class="py-3 y">
                                        <div class="y">
                                            <h2 class="follow-title">All Contributor</h2>
                                        </div>
                                    </div>
                                    <div class="y">
                                        <?php
                                        $query = "SELECT count(`post_uid`) as total_count FROM `donate_eth` WHERE `post_uid` = '$post_uid'";
                                        $result = mysqli_query($link, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $total_contributors = $row['total_count'];
                                        ?>
                                                <small class="d-flex justify-content-start align-items-center ml-4 mb-2" style="color:#6c757d !important">Total Contributor:&nbsp;<h6 class="m-0">
                                                        <?php echo $row['total_count'] ?>

                                                    </h6></small>
                                                <?php
                                                if ($total_contributors !== '0') {
                                                ?>
                                                    <div class="profile-card shadow p-2">
                                                        <table class="table table-hover table-responsive" style="color:#6c757d;font-size:14px;">
                                                            <thead class="thead-light text-start">
                                                                <tr class="py-5">
                                                                    <th scope="col">#</th>
                                                                    <th scope="col mx-5">User address</th>
                                                                    <th scope="col">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-left">
                                                                <?php
                                                                $query = "SELECT * FROM `donate_eth` WHERE `post_uid` = '$post_uid' ORDER BY donate_id DESC";
                                                                $result = mysqli_query($link, $query);
                                                                if (mysqli_num_rows($result) > 0) {
                                                                    $i = 1;
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        if ($row['user_address_url']) {
                                                                ?>
                                                                            <tr class="py-5">
                                                                                <th scope="row"><?php echo $i ?></th>
                                                                                <td class="text-truncate" title=<?php echo $row['from_user_address'] ?> style="cursor:pointer">
                                                                                    <a href="<?php echo $row['user_address_url'] ?><?php echo $row['from_user_address'] ?>" style="text-decoration: none;color: inherit;" class="d-flex justify-content-center">
                                                                                        <?php
                                                                                        $coming_user_address = $row['from_user_address'];
                                                                                        $query_follow = "SELECT * FROM `user_login` Where `metamask_address` = '$coming_user_address'";
                                                                                        $result_follow = mysqli_query($link, $query_follow);
                                                                                        if (mysqli_num_rows($result_follow) > 0) {
                                                                                            while ($row_follow = mysqli_fetch_assoc($result_follow)) {
                                                                                                $profile_img_user = $row_follow['profile'];
                                                                                                $profile_user_uid_user = $row_follow['user_uid'];
                                                                                                $profile_name_user = $row_follow['name'];
                                                                                                $profile_username_user = $row_follow['username'];
                                                                                                if ($profile_img_user == '') {
                                                                                                    echo '<canvas class="avatar-image img-fluid rounded-circle mx-1" title="' . $profile_name_user . '" width="20" height="20" style="border-radius:50%;width:20px;height:20px;"></canvas>';
                                                                                                } else {
                                                                                                    echo '<img src="uploads/profile/' . $profile_img_user . '" alt="user-img" height="20" width="20" class="mx-1" style="border-radius:50%;" loading="lazy">';
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                        <?php echo substr($row['from_user_address'], 0, 5) ?>...<?php echo substr($row['from_user_address'], -5) ?></a>
                                                                                </td>
                                                                                <td><?php echo $row['eth_price'] ?>&nbsp;<?php echo $row['current_coin_symble'] ?>
                                                                                </td>
                                                                            </tr>
                                                                <?php
                                                                            $i = $i + 1;
                                                                        }
                                                                    }
                                                                } ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                        <?php }
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- user donation end -->
                        <div class="lw lx ly y">
                            <div class="y">
                                <div class="y">
                                    <div class="py-3 y">
                                        <div class="y">
                                            <h2 class="follow-title">More Post</h2>
                                        </div>
                                    </div>
                                    <div class="y">
                                        <!-- data set here start -->
                                        <?php
                                        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` WHERE `post_status` = 'published' AND `unlisted` = 'false' AND `user_login`.`user_uid`='$user_uid_follow' AND `stories`.`post_uid`!='$post_uid' ORDER BY post_id DESC LIMIT 4";
                                        $result = mysqli_query($link, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <div class="more-from-wrapper">
                                                    <div class="more-from-wrapper-inner">
                                                        <div class="more-from-card">
                                                            <div class="more-from-card-inner">
                                                                <div class="more-from">
                                                                    <div class="more-from-text-wrapper">
                                                                        <div class="more-from-inner-div">
                                                                            <a class="more-from-anchor" href="<?php echo $username2; ?>" rel="noopener follow">
                                                                                <div class="more-from-anchor-div">
                                                                                    <?php
                                                                                    if ($profile2 == '') {
                                                                                        echo '<canvas class="avatar-image img-fluid rounded-circle more-from-anchor-img-one" title="' . $name2 . '" width="20" height="20"></canvas>';
                                                                                    } else {
                                                                                        echo '<img src="uploads/profile/' . $profile2 . '" alt="" class="more-from-anchor-img-one" width="20" height="20" loading="lazy">';
                                                                                    }
                                                                                    ?>
                                                                                    <div class="more-from-anchor-div-div"></div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <div class="more-from-innner-div-second">
                                                                            <div>
                                                                                <div class="more-from-second-div" aria-hidden="false" aria-describedby="103" aria-labelledby="103">
                                                                                    <div class="more-from-second-div-anchor-wrapper">
                                                                                        <a class="more-from-second-anchor" href="<?php echo $username2; ?>">
                                                                                            <p class="more-from-para">
                                                                                                <?php echo $name2; ?></p>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>" rel="noopener follow">
                                                                        <h2 class="more-from-heading">
                                                                            <div><?php echo $row['post_title'] ?></div>
                                                                        </h2>
                                                                    </a>
                                                                </div><a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>" rel="noopener follow">
                                                                    <div class="more-from-img-wrapper">
                                                                        <div class="more-from-img-wrapper-inner">
                                                                            <div class="more-from-img-inner-div">
                                                                                <?php
                                                                                if ($row['featured_image'] == '') {
                                                                                    echo '<img src="https://test.pinkpaper.xyz/assets/images/blogcms.com.png" alt="image" class="more-from-img" width="56" loading="lazy" role="presentation">';
                                                                                } else {
                                                                                    echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="more-from-img" onError="this.onerror=null;this.src=\'https://test.pinkpaper.xyz/assets/images/blogcms.com.png\';" width="56" loading="lazy" role="presentation">';
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                            ?>
                                            <p class="bv b hw bx jp"><a class="ay az ba bb bc bd be bf bg bh bi bj bk bl bm" rel="noopener follow" href="<?php echo $username2; ?>">See the full
                                                    list</a></p>
                                        <?php
                                        } else { ?>
                                            <div class="my-5">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 text-center">
                                                        <img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
                                                        <h6 class="fw-bold text-center" style="color:var(--gray-color)">You
                                                            have no data</h6>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- data set here end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="little-tag-wrapper">
                            <div class="little-tag">
                                <a class="little-tag-anchor" href="https://discord.com/invite/NREkpnfM" rel="noopener follow" target="_blank">


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-discord little-tag-para" viewBox="0 0 16 16">
                                        <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="little-tag">
                                <a class="little-tag-anchor" href="https://twitter.com/Pinkpaperxyz" rel="noopener follow" target="_blank">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter little-tag-para" viewBox="0 0 16 16">
                                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="little-tag">
                                <a class="little-tag-anchor" href="https://telegram.me/pinkpaperxyz" rel="noopener follow" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram little-tag-para" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="little-tag">
                                <a class="little-tag-anchor" href="mailto:team@pinkpaper.xyz" rel="noopener follow" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill little-tag-para" viewBox="0 0 16 16">
                                        <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                        <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>