<section class="editor-choice my-5">
    <div class="container">
        <div class="heading mb-4">
            <h2 class="fw-bold">Editor's Choice<span>.</span></h2>
        </div>
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
                <?php
                $query = "SELECT `stories`.*,`user_login`.`username`, `user_login`.`name`, `user_login`.`profile`,`editor_choice`.* FROM `stories` 
INNER JOIN `user_login` ON `stories`.`user_uid` = `user_login`.`user_uid` 
INNER JOIN `editor_choice` ON `stories`.`post_uid`=`editor_choice`.`post_uid`  WHERE `stories`.`post_status` = 'published' AND `stories`.`unlisted` = 'false'  ORDER BY `editor_choice`.`ec_id` DESC LIMIT 10";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="swiper-slide">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="d-flex">
                                    <div class="card-img p-2">
                                        <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>">
                                            <?php
                                            if ($row['featured_image'] == '') {
                                                echo '<img src="assets/images/blogcms.com.png" alt="image" class=" shadow" style="height: 100%;width:100px;   object-fit: cover">';
                                            } else {
                                                echo '<img src="uploads/featuredImages/' . $row['featured_image'] . '" alt="image" class=" shadow" style="height: 100%;width:100px;    object-fit: cover" onError="this.onerror=null;this.src=\'assets/images/blogcms.com.png\';">';
                                            }
                                            ?>
                                        </a>
                                        <?php
                                        $topic_name = explode(",", $row['post_tags']);
                                        foreach ($topic_name as $key => $val) {
                                            echo '<a href="topic/' . $val . '" class="topic fw-bold py-0 px-3">' . $val . '</a>';
                                        }
                                        ?>
                                    </div>
                                    <div class="card-body px-2">
                                        <a href="<?php echo $row['username']; ?>/<?php echo $row['post_slug']; ?>" class="title-link articles-dot mb-0" class="title-link articles-dot mb-0">
                                            <h6 class="fw-bold"><?php echo $row['post_title']; ?></h6>
                                        </a>
                                        <p class="text-muted articles-dot small mb-3"><?php echo strip_tags($row['post_content']); ?>
                                        </p><div class="d-flex justify-content-between align-items-center">
                       
                                        <div class="author d-flex justify-content-start">
                                            <?php
                                            if ($row['profile'] == '') {
                                                echo '<div class="profile">
<a href="' . $row['username'] . '">
    <canvas class="avatar-image img-fluid rounded-circle" title="' . $row['name'] . '" width="40" height="40"></canvas>
</a></div>';
                                            } else {
                                                echo '<div class="profile">
<a href="' . $row['username'] . '">
<img src="uploads/profile/' . $row['profile'] . '" alt="" class="img-fluid rounded-circle">
</a>
</div>';
                                            }
                                            ?>
                                            <div class="author-name ms-2">
                                                <a href="<?php echo $row['username']; ?>" class="author-link">
                                                    <h6 class="fw-bold mb-0" style="font-size:14px;"><?php echo $row['name']; ?></h6>
                                                </a>
                                                <span class="text-muted" style="font-size:12px;"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></span> <span class="text-muted">&bull;</span> <span class="text-muted" style="font-size:12px;">
                                                    <?php
                                                    $mycontent = $row['post_content'];
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
                                            <div id="divReload">
                                                            <?php
                                                            $post_uid=$row['post_uid'];
                                            $user_uid2 = $user_uid ?? null;
                                            $sql12 = "SELECT * FROM post_list WHERE post_uid = '$post_uid' AND user_uid = '$user_uid2'";
                                            $run_Sql12 = mysqli_query($link, $sql12);
                                            $fetch_info12 = mysqli_fetch_assoc($run_Sql12);

                                            $list_user_uid = $fetch_info12['user_uid'] ?? null;
                                            $list_post_uid = $fetch_info12['post_uid'] ?? null;
                                            if (!isset($_SESSION['email'])) {
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
                        </div>
                    <?php }
                } else { ?>
                    <div class="my-5">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <img src="assets/images/no_data.svg" alt="" class="p-3" style="width: 200px;">
                                <h6 class="fw-bold text-center" style="color:var(--gray-color)">You have no data</h6>
                                <h6 class="text-center" style="color:var(--gray-color)"><a href="create-story" class="text-link-3 fw-bold ">Write</a> a story or
                                    <a href="./"class="text-link-3 fw-bold ">read</a> on Blog CMS.
                                </h6>

                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
        <div class="swiper-button">
            <div class="swiper-button-next swiper-button-next-2 shadow"></div>
            <div class="swiper-button-prev swiper-button-prev-2 shadow"></div>
        </div>
    </div>
</section>