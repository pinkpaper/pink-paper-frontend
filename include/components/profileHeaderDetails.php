<div class="container-fluid header-div-profile">
        <div class="container" style="padding-top:50px;">
            <div class="row py-5">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="mb-5" style="margin-top:6rem">
                        <h1 class="display-4 fw-bold mb-2 text-capitalize" style="color:var(--text-color);"><?php echo $name2; ?></h1>
                        <p class="text-muted mb-3"><?php echo $bio2; ?></p>
                        <div class="d-flex justify-content-center align-items-center gap-3">

                            <?php
                            //if the user is not logged in just display a button that send him/her to the login page if clicked
                            $sql7 = "SELECT * FROM follow WHERE followed_user_uid = '$user_uid2'";
                            $run_Sql7 = mysqli_query($link, $sql7);
                            $fetch_info7 = mysqli_fetch_array($run_Sql7);
                            $follower_user_uid = $fetch_info7['following_user_uid']?? null;
                            $user_uid_follow=$user_uid2;
                            
                            ?>
                            <div class="d-grid" id="follow_reload">
                            <?php
                            $user_uid2 = $user_uid ?? null;
                           
                            $sql20 = "SELECT * FROM follow WHERE following_user_uid = '$user_uid2' 
                            AND followed_user_uid = '$user_uid_follow'";
                            $run_Sql20 = mysqli_query($link, $sql20);
                            $fetch_info20 = mysqli_fetch_assoc($run_Sql20);

                            $following_user_uid = $fetch_info20['following_user_uid'] ?? null;
                            $followed_user_uid = $fetch_info20['followed_user_uid'] ?? null;

                            if (!isset($_SESSION['email'])) {
                                echo '<button type="button" class="btn button-follow fw-bold" onClick="login()">Follow</button>';
                            } else if ($user_uid2 == $user_uid_follow) {
                                //echo '';
                            } else if ($following_user_uid == $user_uid2 && $followed_user_uid == $user_uid_follow) {
                                echo '<button type="button" class="btn button-follow fw-bold" onClick="unfollow(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Following</button>';
                            } else {
                                echo '<button type="button" class="btn button-follow fw-bold" onClick="follow(\'' . $user_uid . '\',\'' . $user_uid_follow . '\')">Follow</button>';
                            }
                            $user_uid2=$user_uid_follow;
                            
                           ?>
                        </div>
                            
                            <a href="followers.php?username=<?php echo $username2; ?>" class="text-link-2"><?php echo '<span class=" follower_add">' . $follower_count . '</span> Follower' . ($follower_count == 1 ? '' : 's') ?></a>
                            <a href="about/<?php echo $username2; ?>" class="text-link-2">About</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
         function follow(following_user_uid, followed_user_uid) {
            $.ajax({
                url: "php/followUser.php",
                method: "POST",
                dataType: "json",
                data: {
                    following_user_uid: following_user_uid,
                    followed_user_uid: followed_user_uid
                },
                beforeSend: function() {
                    $("#follow_reload").html('<div class="d-flex.justify-content-center" style="color:var(--text-color);"><div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                    $("#follow_relo").html('<div class="d-flex.justify-content-center" style="color:var(--text-color);"><div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 201) {
                        // if(data.link!=""){
                        // window.location.replace("all-tags");
                        // }else{
                        //     window.location.replace("./);
                        // }
                        //window.location.reload();
                        //$("#divProfileReload").load(location.href + " #divProfileReload");
                        $("#follow_reload").load(location.href + " #follow_reload");
                        $("#follow_relo").load(location.href + " #follow_relo");

                    } else if (data.status == 301) {
                        console.log(data.error);
                        //swal("error");
                        // $('#contact-success').css('display', 'none');
                        // $('#contact-form').css('display', 'block');
                        // swal('success'); 
                    } else {
                        //     swal("problem with query");
                    }
                }
            });


        }

        function unfollow(following_user_uid, followed_user_uid) {
            $.ajax({
                url: "php/unfollowUser.php",
                method: "POST",
                dataType: "json",
                data: {
                    following_user_uid: following_user_uid,
                    followed_user_uid: followed_user_uid
                },
                beforeSend: function() {
                    $("#follow_reload").html('<div class="d-flex.justify-content-center" style="color:var(--text-color);"><div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                    $("#follow_relo").html('<div class="d-flex.justify-content-center" style="color:var(--text-color);"><div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div></div>');
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 201) {
                        // if(data.link!=""){
                        // window.location.replace("all-tags");
                        // }else{
                        //     window.location.replace("./);
                        // }
                        //window.location.reload();
                        $("#follow_reload").load(location.href + " #follow_reload");
                        $("#follow_relo").load(location.href + " #follow_relo");

                    } else if (data.status == 301) {
                        console.log(data.error);
                        //swal("error");
                        // $('#contact-success').css('display', 'none');
                        // $('#contact-form').css('display', 'block');
                        // swal('success'); 
                    } else {
                        //     swal("problem with query");
                    }
                }
            });


        }


    </script>