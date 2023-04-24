<section class="latest-post my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 order-1 order-lg-1 style-position-2">
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
            <div class="col-lg-3 col-md-12 order-2 order-lg-2 style-position-2">
                <div class="sidebar-item">
                    <div class="make-me-sticky">
                        <div class="mb-2">
                            <div class="profile-div mb-3" style="color:var(--text-color);">
                                <div class="heading mb-4">
                                    <h4 class="fw-bold">All Contributor<span>.</span></h4>
                                </div>
                                <div class="profile-card shadow p-3" style="border-radius:10px;">
                                    <div class="progress-panel">
                                        <div class="get-view-wrapper" style="font-size: 0.9rem;font-weight: 800;"><span
                                                id="crowd_query_total_pay_view">0,000</span>&nbsp;<span
                                                class="amount_in_view">ETH</span></div>
                                        <div class="progress">
                                            <div class="progress-bar d-inline" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100"><span
                                                    id="span_percentage_view">0</span>%</div>
                                        </div>
                                        <div class="target-view-wrapper">
                                            <div style="font-size: 0.9rem;">
                                                <span style="font-weight: 800;">
                                                    <span id="percentage_view">0</span>%</span>&nbsp;Collected
                                            </div>
                                            <div style="font-size: 0.9rem;"><span
                                                    style="font-size: 0.9rem;font-weight: 800;"><span
                                                        id="target_amount_view">0,000</span>&nbsp;<span
                                                        id="amount_in_view"
                                                        class="amount_in_view">ETH</span></span>&nbsp;Target</div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                     $get_view = "SELECT distinct user_address FROM crowd_fund WHERE `post_uid`='$post_uid';";
                                    $result_view_22 = mysqli_query($link, $get_view);
                                    if (mysqli_num_rows($result_view_22) > 0) { ?>
                                <div class="profile-card shadow p-3 mt-3" style="border-radius:10px;">
                                    <div class="top-panel">
                                        <div
                                            class="top-panel-heading d-flex justify-content-between align-items-center">
                                            <?php
                                                $get_view_query_2 = "SELECT count(distinct user_address) as total_contributor FROM crowd_fund WHERE `post_uid`='$post_uid';";
                                                $result_view_2 = mysqli_query($link, $get_view_query_2);
                                                if (mysqli_num_rows($result_view_2) > 0) {
                                                while($row_view_2 = mysqli_fetch_array($result_view_2)){
                                                ?>
                                            <div class="_heading-section" onclick="viewContribution();"
                                                style="cursor:pointer;">
                                                <span><?= $row_view_2['total_contributor'] ?></span>&nbsp;Contributor
                                            </div>
                                            <?php }} ?>
                                            <div class="_heading-section"
                                                style="color: rgb(0, 125, 255);cursor:pointer;"
                                                onclick="viewContribution();">View</div>
                                        </div>
                                        <div class="top-panel-img-group my-4" onclick="viewContribution();"
                                            style="cursor:pointer;">
                                            <div class="img_group img_group_row_1">
                                                <!-- user-2 -->
                                                <?php
                                                $get_user_query_2 = "SELECT user_address, post_uid, sum(pay_amount) as total_pay,project_address FROM crowd_fund  WHERE `post_uid`='$post_uid' GROUP BY user_address, post_uid,project_address ORDER by total_pay DESC limit 1,1;";
                                                $result_query_2 = mysqli_query($link, $get_user_query_2);
                                                if (mysqli_num_rows($result_query_2) > 0) {
                                                while($row_query_2 = mysqli_fetch_array($result_query_2)){
                                                ?>
                                                <div class="img_group_row_1-inner position-relative">
                                                    <div class="img_group_row_1-inner-in">
                                                        <span class="span-1">
                                                            <span class="span-2">
                                                                <img alt="" aria-hidden="true"
                                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2772%27%20height=%2772%27/%3e">
                                                            </span>
                                                            <img src="https://i.pravatar.cc/100?u=<?= $row_query_2['user_address'] ?>"
                                                                alt="img-1">
                                                        </span>

                                                    </div>
                                                    <div class="top-panel-text" style="bottom: -0.5em;">
                                                        <div class="top-panel-text-inner" style="font-size: 14px;">
                                                            <div class="top-panel-text-inner_in">#2</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }} ?>
                                                <!-- user-1 -->
                                                <?php
                                                $get_user_query_1 = "SELECT user_address, post_uid, sum(pay_amount) as total_pay,project_address FROM crowd_fund  WHERE `post_uid`='$post_uid' GROUP BY user_address, post_uid,project_address ORDER by total_pay DESC limit 0,1;";
                                                $result_query_1 = mysqli_query($link, $get_user_query_1);
                                                if (mysqli_num_rows($result_query_1) > 0) {
                                                while($row_query_1 = mysqli_fetch_array($result_query_1)){
                                                ?>
                                                <div class="img_group_row_1-inner position-relative"
                                                    style="height:100px;width:100px;">
                                                    <div class="img_group_row_1-inner-in">
                                                        <span class="span-1" style="height:100%;width:100%;">
                                                            <span class="span-2">
                                                                <img alt="" aria-hidden="true"
                                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2772%27%20height=%2772%27/%3e">
                                                            </span>
                                                            <img src="https://i.pravatar.cc/100?u=<?= $row_query_1['user_address'] ?>"
                                                                alt="img-1">
                                                        </span>

                                                    </div>
                                                    <div class="top-panel-text" style="bottom: -0.5em;">
                                                        <div class="top-panel-text-inner" style="font-size: 14px;">
                                                            <div class="top-panel-text-inner_in">#1</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }} ?>
                                                <!-- user-3 -->
                                                <?php
                                                $get_user_query_3 = "SELECT user_address, post_uid, sum(pay_amount) as total_pay,project_address FROM crowd_fund  WHERE `post_uid`='$post_uid' GROUP BY user_address, post_uid,project_address ORDER by total_pay DESC limit 2,1;";
                                                $result_query_3 = mysqli_query($link, $get_user_query_3);
                                                if (mysqli_num_rows($result_query_3) > 0) {
                                                while($row_query_3 = mysqli_fetch_array($result_query_3)){
                                                ?>
                                                <div class="img_group_row_1-inner position-relative">
                                                    <div class="img_group_row_1-inner-in">
                                                        <span class="span-1">
                                                            <span class="span-2">
                                                                <img alt="" aria-hidden="true"
                                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2772%27%20height=%2772%27/%3e">
                                                            </span>
                                                            <img src="https://i.pravatar.cc/100?u=<?= $row_query_3['user_address'] ?>"
                                                                alt="img-1">
                                                        </span>

                                                    </div>
                                                    <div class="top-panel-text" style="bottom: -0.5em;">
                                                        <div class="top-panel-text-inner" style="font-size: 14px;">
                                                            <div class="top-panel-text-inner_in">#3</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }} ?>
                                            </div>
                                            <div class="img_group img_group_row_2 mt-3">
                                                <!-- user-4 -->
                                                <?php
                                                $get_user_query_4 = "SELECT user_address, post_uid, sum(pay_amount) as total_pay,project_address FROM crowd_fund  WHERE `post_uid`='$post_uid' GROUP BY user_address, post_uid,project_address ORDER by total_pay DESC limit 3,1;";
                                                $result_query_4 = mysqli_query($link, $get_user_query_4);
                                                if (mysqli_num_rows($result_query_4) > 0) {
                                                while($row_query_4 = mysqli_fetch_array($result_query_4)){
                                                ?>
                                                <div class="img_group_row_1-inner position-relative"
                                                    style="height:56px;width:56px;">
                                                    <div class="img_group_row_1-inner-in">
                                                        <span class="span-1">
                                                            <span class="span-2">
                                                                <img alt="" aria-hidden="true"
                                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2772%27%20height=%2772%27/%3e">
                                                            </span>
                                                            <img src="https://i.pravatar.cc/100?u=<?= $row_query_4['user_address'] ?>"
                                                                alt="img-1">
                                                        </span>

                                                    </div>
                                                </div>
                                                <?php }} ?>
                                                <!-- user-5 -->
                                                <?php
                                                $get_user_query_5 = "SELECT user_address, post_uid, sum(pay_amount) as total_pay,project_address FROM crowd_fund  WHERE `post_uid`='$post_uid' GROUP BY user_address, post_uid,project_address ORDER by total_pay DESC limit 4,1;";
                                                $result_query_5 = mysqli_query($link, $get_user_query_5);
                                                if (mysqli_num_rows($result_query_5) > 0) {
                                                while($row_query_5 = mysqli_fetch_array($result_query_5)){
                                                ?>
                                                <div class="img_group_row_1-inner position-relative"
                                                    style="height:56px;width:56px;">
                                                    <div class="img_group_row_1-inner-in">
                                                        <span class="span-1">
                                                            <span class="span-2">
                                                                <img alt="" aria-hidden="true"
                                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2772%27%20height=%2772%27/%3e">
                                                            </span>
                                                            <img src="https://i.pravatar.cc/100?u=<?= $row_query_5['user_address'] ?>"
                                                                alt="img-1">
                                                        </span>

                                                    </div>
                                                </div>
                                                <?php }} ?>
                                                <!-- user-6 -->
                                                <?php
                                                $get_user_query_6 = "SELECT user_address, post_uid, sum(pay_amount) as total_pay,project_address FROM crowd_fund  WHERE `post_uid`='$post_uid' GROUP BY user_address, post_uid,project_address ORDER by total_pay DESC limit 5,1;";
                                                $result_query_6 = mysqli_query($link, $get_user_query_6);
                                                if (mysqli_num_rows($result_query_6) > 0) {
                                                while($row_query_6 = mysqli_fetch_array($result_query_6)){
                                                ?>
                                                <div class="img_group_row_1-inner position-relative"
                                                    style="height:56px;width:56px;">
                                                    <div class="img_group_row_1-inner-in">
                                                        <span class="span-1">
                                                            <span class="span-2">
                                                                <img alt="" aria-hidden="true"
                                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2772%27%20height=%2772%27/%3e">
                                                            </span>
                                                            <img src="https://i.pravatar.cc/100?u=<?= $row_query_6['user_address'] ?>"
                                                                alt="img-1">
                                                        </span>

                                                    </div>
                                                </div>
                                                <?php }} ?>
                                            </div>
                                        </div>
                                        <div class="top-panel-button">
                                            <?php 
                                                if($amount_in === 'ETH'){                                               
                                                ?>
                                            <div class="d-flex form-row align-items-center row mb-1">
                                                <div class="col-md-12">
                                                    <h6 class="text-danger transition-error"
                                                        style="font-size:12px;font-weight:800;display:none;"
                                                        id="show_input_required_error_eth">Error:&nbsp; min
                                                        contribution required.</h6>
                                                    <h6 class="text-danger transition-error"
                                                        style="font-size:12px;font-weight:800;display:none;"
                                                        id="show_input_amount_error_eth">Error:&nbsp; amount should
                                                        not be less than min contribution.</h6>
                                                    <h6 class="my-2"
                                                        style="font-size:12px;font-weight:800;color:var(--text-color);">
                                                        * Min
                                                        Contribution &nbsp;<span
                                                            style="color:var(--gray-color);"><?= $crowd_min_amount ?>&nbsp;<?= $amount_in ?></span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="sr-only" for="min_donation_in_eth">Min
                                                        Donation</label>
                                                    <div class="input-group mb-2">
                                                        <input type="number" class="form-control"
                                                            id="min_donation_in_eth" placeholder="Contribution" min="0">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">ETH</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn button-primary"
                                                style="width:100%;height:2.7rem;"
                                                onclick="startProjectFunding('<?= $crowd_min_amount ?>', '<?= $project_address ?>');">Contribute</button>
                                            <?php }else if($amount_in === 'MATIC'){ ?>
                                            <div class="d-flex form-row align-items-center row mb-1">
                                                <div class="col-md-12">
                                                    <h6 class="text-danger transition-error"
                                                        style="font-size:12px;font-weight:800;display:none;"
                                                        id="show_input_required_error_matic">Error:&nbsp; min
                                                        contribution required.</h6>
                                                    <h6 class="text-danger transition-error"
                                                        style="font-size:12px;font-weight:800;display:none;"
                                                        id="show_input_amount_error_matic">Error:&nbsp; amount should
                                                        not be less than min contribution.</h6>
                                                    <h6 class="my-2"
                                                        style="font-size:12px;font-weight:800;color:var(--text-color);">
                                                        * Min
                                                        Contribution &nbsp;<span
                                                            style="color:var(--gray-color);"><?= $crowd_min_amount ?>&nbsp;<?= $amount_in ?></span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="sr-only" for="min_donation_in_matic">Min
                                                        Donation</label>
                                                    <div class="input-group mb-2">
                                                        <input type="number" class="form-control"
                                                            id="min_donation_in_matic" placeholder="Contribution"
                                                            min="0">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">MATIC</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn button-primary"
                                                style="width:100%;height:2.7rem;"
                                                onclick="startProjectFundingMatic('<?= $crowd_min_amount ?>', '<?= $project_address ?>');">Contribute</button>
                                            <?php
                                            }else{  ?>
                                            <button type="button" class="btn button-primary"
                                                style="width:100%;height:2.7rem;">Wait ...</button>
                                            <?php }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <!-- if no data start -->
                                <div class="profile-card shadow p-3 mt-3" style="border-radius:10px;">
                                    <div class="top-panel">
                                        <div class="top-panel-img-group my-4" style="cursor:pointer;">
                                            <div class="img_group img_group_row_1">
                                                <!-- user-1 -->
                                                <div class="img_group_row_1-inner position-relative"
                                                    style="height:80px;width:80px;">
                                                    <div class="img_group_row_1-inner-in">
                                                        <span class="span-1"
                                                            style="height:100%;width:100%;background:lightgrey">
                                                            <span class="span-2">
                                                                <img alt="" aria-hidden="true"
                                                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2772%27%20height=%2772%27/%3e">
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="top-panel-text" style="bottom: -0.5em;">
                                                        <div class="top-panel-text-inner" style="font-size: 14px;">
                                                            <div class="top-panel-text-inner_in">#1</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-center my-3" style="color:var(--text-color)">Become the first
                                                contributor</p>
                                            <p class="text-center px-2" style="font-size:0.8rem;">Support the author of
                                                this entry… and become the first contributor.</p>
                                        </div>
                                        <div class="top-panel-button">
                                            <?php 
                                                if($amount_in === 'ETH'){                                               
                                                ?>
                                            <div class="d-flex form-row align-items-center row mb-1">
                                                <div class="col-md-12">
                                                    <h6 class="text-danger transition-error"
                                                        style="font-size:12px;font-weight:800;display:none;"
                                                        id="show_input_required_error_eth">Error:&nbsp; min
                                                        contribution required.</h6>
                                                    <h6 class="text-danger transition-error"
                                                        style="font-size:12px;font-weight:800;display:none;"
                                                        id="show_input_amount_error_eth">Error:&nbsp; amount should
                                                        not be less than min contribution.</h6>
                                                    <h6 class="my-2"
                                                        style="font-size:12px;font-weight:800;color:var(--text-color);">
                                                        * Min
                                                        Contribution &nbsp;<span
                                                            style="color:var(--gray-color);"><?= $crowd_min_amount ?>&nbsp;<?= $amount_in ?></span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="sr-only" for="min_donation_in_eth">Min
                                                        Donation</label>
                                                    <div class="input-group mb-2">
                                                        <input type="number" class="form-control"
                                                            id="min_donation_in_eth" placeholder="Contribution" min="0">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">ETH</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn button-primary"
                                                style="width:100%;height:2.7rem;"
                                                onclick="startProjectFunding('<?= $crowd_min_amount ?>', '<?= $project_address ?>');">Contribute</button>
                                            <?php }else if($amount_in === 'MATIC'){ ?>
                                            <div class="d-flex form-row align-items-center row mb-1">
                                                <div class="col-md-12">
                                                    <h6 class="text-danger transition-error"
                                                        style="font-size:12px;font-weight:800;display:none;"
                                                        id="show_input_required_error_matic">Error:&nbsp; min
                                                        contribution required.</h6>
                                                    <h6 class="text-danger transition-error"
                                                        style="font-size:12px;font-weight:800;display:none;"
                                                        id="show_input_amount_error_matic">Error:&nbsp; amount should
                                                        not be less than min contribution.</h6>
                                                    <h6 class="my-2"
                                                        style="font-size:12px;font-weight:800;color:var(--text-color);">
                                                        * Min
                                                        Contribution &nbsp;<span
                                                            style="color:var(--gray-color);"><?= $crowd_min_amount ?>&nbsp;<?= $amount_in ?></span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="sr-only" for="min_donation_in_matic">Min
                                                        Donation</label>
                                                    <div class="input-group mb-2">
                                                        <input type="number" class="form-control"
                                                            id="min_donation_in_matic" placeholder="Contribution"
                                                            min="0">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">MATIC</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn button-primary"
                                                style="width:100%;height:2.7rem;"
                                                onclick="startProjectFundingMatic('<?= $crowd_min_amount ?>', '<?= $project_address ?>');">Contribute</button>
                                            <?php
                                            }else{  ?>
                                            <button type="button" class="btn button-primary"
                                                style="width:100%;height:2.7rem;">Wait ...</button>
                                            <?php }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- if no data end -->
                                <?php } ?>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="profile-div mb-3">
                                <div class="heading mb-4">
                                    <h4 class="fw-bold">More Post<span>.</span></h4>
                                </div>
                                <div class="profile-card shadow p-2" style="border-radius:10px;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>