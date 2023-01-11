<section class="latest-post my-5">
    <div class="container">
        <div class="row">
            <div
                class="col-lg-3 col-md-12 order-2 order-lg-1 style-position-2 d-flex justify-content-center align-items-center">
                <div class="sidebar-item w-100">
                    <div class="">
                        <!-- user details -->
                        <div class="profile-div mb-4">
                            <div
                                class="profile-card shadow d-flex flex-column justify-content-center px-3 py-3 text-center">
                                <?php
                                    if ($profile2 == '') {
                                        echo '<div class="text-center"><canvas class="avatar-image rounded-circle text-center p-1 shadow-sm" title="' . $name2 . '" style="width:60px;height:60px;"></canvas></div>';
                                    } else {
                                        echo '<div class="text-center"><img src="uploads/profile/' . $profile2 . '" alt="" class="text-center p-1 shadow-sm" style="width:60px;height:60px;"></div>';
                                    }
                                    ?>
                                <h6 class="fw-bold text-capitalize mb-1" style="color:var(--text-color);">
                                    <?php echo $name2; ?></h6>
                                <!-- <p class="text-muted mb-2">@<?php echo $username2; ?></p> -->
                                <p class="text-muted small mb-2 show-read-more-2"><?php echo $bio2; ?></p>
                                <?php $user2uid = $user_uid_follow; ?>

                                <div class="d-grid" id="follow_reload">
                                    <?php
                                        $user_uid2 = $user_uid ?? null;
                                        $sql20 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid2' 
                                        AND followed_user_uid = '$user_uid_follow'";
                                        $run_Sql20 = mysqli_query($link, $sql20);
                                        $fetch_info20 = mysqli_fetch_assoc($run_Sql20);

                                        $following_user_uid = $fetch_info20['following_user_uid'] ?? null;
                                        $followed_user_uid = $fetch_info20['followed_user_uid'] ?? null;

                                        if (!isset($_SESSION['username'])) {
                                            echo '<button type="button" class="btn button-follow fw-bold" onClick="login()">Follow</button>';
                                        } else if ($user_uid2 == $user_uid_follow) {
                                            //echo '';
                                        } else if ($following_user_uid == $user_uid2 && $followed_user_uid == $user_uid_follow) {
                                            echo '<button type="button" class="btn button-follow fw-bold" onClick="unfollow(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Following</button>';
                                        } else {
                                            echo '<button type="button" class="btn button-follow fw-bold" onClick="follow(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Follow</button>';
                                        }
                                        ?>
                                </div>
                                <div class="d-flex gap-2 social-icon-post justify-content-center">
                                    <?php 
                                        if($twitter_url !== '' && $twitter_url !== null){
                                        ?>
                                    <a class="mt-2" href='<?php echo $twitter_url; ?>'
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Follow me on Twitter"><i class="fab fa-twitter"></i></a>
                                    <?php } ?>

                                    <?php 
                                        if($instagram_url !== '' && $instagram_url !== null){
                                        ?>
                                    <a class="mt-2" href='<?php echo $instagram_url; ?>'
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Follow me on Instagram"><i
                                            class="fab fa-instagram"></i></a>
                                    <?php } ?>

                                    <?php 
                                        if($linkedin_url !== '' && $linkedin_url !== null){
                                        ?>
                                    <a class="mt-2" href='<?php echo $linkedin_url; ?>'
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Follow me on Linkedin"><i
                                            class="fab fa-linkedin-in"></i></a>
                                    <?php } ?>

                                    <?php 
                                        if($facebook_url !== '' && $facebook_url !== null){
                                        ?>
                                    <a class="mt-2" href='<?php echo $facebook_url; ?>'
                                        onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                        target="_blank" title="Follow me on Facebook"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <?php } ?>
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
                                        echo '<div class="tx o"><button class="btn tip-button-2 fw-bold  mt-3 w-100 d-flex justify-content-center align-items-center" onClick="login()"><img src="assets/images/Idriss.png" style="width:25px;height:25px;"><span class="ms-2"><span class="text-truncate d-block" style="font-size:0.9rem;">' . $Idriss_username . '</span></span></button></div>';
                                    }
                                } else if ($user_uid2 == $user_uid_follow) {
                                    echo '';
                                } else {
                                    $query33 = "SELECT * FROM `metamask_details` WHERE `user_uid` = '$user_uid_follow'";
                                    $result33 = mysqli_query($link, $query33);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row33 = mysqli_fetch_assoc($result33)) {
                                            if ($row33['eth_metamask_address'] !== '' && $row33['eth_metamask_address']) {
                                                echo '<button class="btn tip-button-2 fw-bold  mt-3" data-bs-toggle="modal" data-bs-target="#metamaskDonateModal"><img src="https://test.pinkpaper.xyz/assets/images/metamask-fox.svg"><span class="ms-2">Donate<span class="d-lg-none">with MetaMask </span></span></button>';
                                            }
                                            if ($row33['neo_address'] !== '' && $row33['neo_address']) {
                                                echo '<button class="btn tip-button-2 fw-bold  mt-3" data-bs-toggle="modal" data-bs-target="#neoDonateModal"><img src="assets/images/n.png"><span class="ms-2">Donate<span class="d-lg-none">with MetaMask </span></span></button>';
                                            }
                                            if ($row33['Idriss_username'] !== '' && $row33['Idriss_username']) {
                                                echo '<div class="tx o"><button class="btn tip-button-2 fw-bold  mt-3 w-100 d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#IdrissDonateModal"><img src="assets/images/Idriss.png" style="width:25px;height:25px;"><span class="ms-2"><span class="text-truncate d-block" style="font-size:0.9rem;">' . $Idriss_username . '</span></span></button></div>';
                                            }
                                        }
                                    }
                                ?>
                                <?php
                                    }
                                    ?>
                                <div class="message text-muted"></div>
                            </div>
                        </div>
                        <div class="d-none d-lg-block">
                            <div class="profile-div mb-5">
                                <div class="profile-card shadow  p-3">
                                    <div class="d-flex justify-content-around gap-4" id="divProfileReload">
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
                                        <p class="icon-color mb-0" data-bs-toggle="modal"
                                            data-bs-target="#commentRightModal"><i class="far fa-comment"></i></p>

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
                        </div>
                    </div>
                    <div class="make-me-sticky">
                        <div class="mb-2">
                            <div class="profile-div mb-3">
                                <div class="mb-4 heading-right">
                                    <h4 class="fw-bold">More Post<span>.</span></h4>
                                </div>
                                <div class="profile-card shadow p-2">
                                    <?php

                                        $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile` FROM `stories` INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` WHERE `post_status` = 'published' AND `unlisted` = 'false' AND `user_login`.`user_uid`='$user_uid_follow' AND `stories`.`post_uid`!='$post_uid' ORDER BY post_id DESC LIMIT 5";
                                        $result = mysqli_query($link, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                    <div class="more-posts py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0" style="width:80px;border-radius:15px;">
                                                <?php
                                                            if ($row['featured_image'] == '') {
                                                                echo '<a href="' . $row['username'] . '/' . $row['post_slug'] . '"><img src="https://test.pinkpaper.xyz/assets/images/blogcms.com.png" alt="image" class="shadow-sm img-fluid" style="border-radius:5px;"></a>';
                                                            } else {
                                                                echo '<a href="' . $row['username'] . '/' . $row['post_slug'] . '"><img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class="shadow-sm img-fluid" onError="this.onerror=null;this.src=\'https://test.pinkpaper.xyz/assets/images/blogcms.com.png\';" style="border-radius:5px;"></a>';
                                                            }
                                                            ?>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>"
                                                    class="articles-dot ">
                                                    <h6 class="fw-bold"><?php echo $row['post_title'] ?></h6>
                                                </a>
                                                <p class="small mb-0">
                                                    <?php echo date('M j, Y', strtotime($row['created_at'])); ?></p>
                                            </div>
                                        </div>

                                    </div>

                                    <?php }
                                        } else { ?>

                                    <div class="my-5">
                                        <div class="row justify-content-center">
                                            <div class="col-12 text-center">
                                                <img src="https://test.pinkpaper.xyz/assets/images/no_data.svg" alt=""
                                                    class="p-3" style="width: 200px;">
                                                <h6 class="fw-bold text-center" style="color:var(--gray-color)">You
                                                    have no data</h6>

                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="profile-div mb-3">
                                <div class="heading-right mb-4">
                                    <h4 class="fw-bold">Recent Contributor<span>.</span></h4>
                                </div>
                                <?php
                                                    $query = "SELECT count(`post_uid`) as total_count FROM `donate_eth` WHERE `post_uid` = '$post_uid'";
                                                    $result = mysqli_query($link, $query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $total_contributors = $row['total_count'];
                                                        ?>
                                <small class="d-flex justify-content-start align-items-center ml-4 mb-2"
                                    style="color:#6c757d !important">Total Contributor:&nbsp;<h6 class="m-0">
                                        <?php echo $row['total_count'] ?>

                                    </h6></small>
                                <?php 
                                        if($total_contributors !== '0'){
                                            ?>
                                <div class="profile-card shadow p-2">
                                    <table class="table table-hover table-responsive"
                                        style="color:#6c757d;font-size:14px;">
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
                                                        $i=1;
                                                        while ($row = mysqli_fetch_assoc($result)) {  
                                                        if($row['user_address_url']){                                                          
                                                    ?>
                                            <tr class="py-5">
                                                <th scope="row"><?php echo $i ?></th>
                                                <td class="text-truncate" title=<?php echo $row['from_user_address'] ?>
                                                    style="cursor:pointer">
                                                    <a href="<?php echo $row['user_address_url'] ?><?php echo $row['from_user_address'] ?>"
                                                        style="text-decoration: none;color: inherit;"><img
                                                            src="./assets/images/user.png" alt="user-img" height="20"
                                                            width="20"
                                                            class="mx-1"><img><?php echo substr($row['from_user_address'], 0, 5) ?>...<?php echo substr($row['from_user_address'], -5) ?></a>
                                                </td>
                                                <td><?php echo $row['eth_price'] ?>&nbsp;<?php echo $row['current_coin_symble'] ?>
                                                </td>
                                            </tr>
                                            <?php 
                                                $i = $i+1;
                                            }} }?>
                                        </tbody>
                                    </table>

                                </div>
                                <?php }}} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 order-1 order-lg-2 style-position-2">
                <div class="card border-0 shadow-sm mb-4 w-100">
                    <div class="card-body">
                        <h2 class="fw-bold mb-3" style="color:var(--text-color);"><?php echo $post_title2; ?></h2>
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                            <div class="author d-flex justify-content-start">
                                <?php
                                    if ($profile2 == '') {
                                        echo '<div class="profile"><a href="' . $username2 . '"><canvas class="avatar-image img-fluid rounded-circle" title="' . $name2 . '" width="40" height="40"></canvas></a></div>';
                                    } else {
                                        echo '<div class="profile"><a href="' . $username2 . '"><img src="uploads/profile/' . $profile2 . '" alt="" class="img-fluid rounded-circle"></a></div>';
                                    }
                                    ?>
                                <div class="author-name ms-2">
                                    <a href="<?php echo $username2; ?>" class="author-link">
                                        <h6 class="fw-bold mb-0" style="font-size:14px;"><?php echo $name2; ?></h6>
                                    </a>
                                    <span class="text-muted"
                                        style="font-size:12px;"><?php echo date('M j, Y', strtotime($created_at2)); ?></span>
                                    <span class="text-muted">&bull;</span> <span class="text-muted"
                                        style="font-size:12px;">
                                        <?php
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
                                            ?>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex gap-2 social-icon-post">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_link; ?>&t=<?php echo $post_title2; ?>"
                                    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                    target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>

                                <a href="https://twitter.com/share?url=<?php echo $post_link; ?>&text=<?php echo $post_title2; ?>"
                                    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                    target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a>

                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_link; ?>&t=<?php echo $post_title2; ?>"
                                    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                    target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                <?php 
                                        if($ipfs_link !== ''){
                                            ?>
                                <a href="<?php echo $ipfs_link ?>"
                                    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                    target="_blank" title="IPFS url"><img
                                        src="https://test.pinkpaper.xyz/assets/images/ipfs.svg" alt=""
                                        style="height:auto;width:60%;"></a>
                                <?php
                                        }
                                        ?>

                                <a href="whatsapp://send?text=<?php echo $post_link; ?>"
                                    data-action="share/whatsapp/share"
                                    onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                    target="_blank" title="Share on whatsapp"><i class="fab fa-whatsapp"></i></a>

                                <p class="copy-link" data-clipboard-text="<?php echo $post_link; ?>" title="Copy link">
                                    <i class="fas fa-link"></i>
                                </p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <?php
                                if ($featured_image2 == '') {
                                    echo '<img src="https://test.pinkpaper.xyz/assets/images/blogcms.com.png" alt="image" class="shadow img-fluid" style="border-radius:15px;">';
                                } else {
                                    echo '<img src="uploads/featuredImages/' . $featured_image2 . '" alt="image" class="shadow img-fluid" style="border-radius:15px;" onError="this.onerror=null;this.src=\'https://test.pinkpaper.xyz/assets/images/blogcms.com.png\';">';
                                }
                                ?>
                        </div>
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


                                <p class="icon-color mb-0" data-bs-toggle="modal" data-bs-target="#commentRightModal"><i
                                        class="far fa-comment"></i></p>


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
                            <div class="d-flex justify-content-center align-items-center gap-2 social-icon-post">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_link; ?>&t=<?php echo $post_title2; ?>"
                                    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                    target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>

                                <a href="https://twitter.com/share?url=<?php echo $post_link; ?>&text=<?php echo $post_title2; ?>"
                                    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                    target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a>

                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_link; ?>&t=<?php echo $post_title2; ?>"
                                    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                    target="_blank" title="Share on Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                <?php 
                                        if($ipfs_link !== ''){
                                            ?>
                                <a href="<?php echo $ipfs_link ?>"
                                    onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                    target="_blank" title="IPFS url"><img
                                        src="https://test.pinkpaper.xyz/assets/images/ipfs.svg" alt=""
                                        style="height:auto;width:60%;"></a>
                                <?php
                                        }
                                        ?>

                                <a href="whatsapp://send?text=<?php echo $post_link; ?>"
                                    data-action="share/whatsapp/share"
                                    onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                                    target="_blank" title="Share on whatsapp"><i class="fab fa-whatsapp"></i></a>

                                <p class="copy-link mb-0" data-clipboard-text="<?php echo $post_link; ?>"
                                    title="Copy link"><i class="fas fa-link"></i></p>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>