<?php
 $current_page_data =  $_SERVER['REQUEST_URI'];
$user_address_new = '';
if (isset($_SESSION['userAddress'])) {
$user_address_new = $_SESSION['userAddress'];
}else{
$user_address_new = '';
}
?>
<div class="d-none d-lg-block  position-fixed large-screen-menu-show h-100">
    <div class="main-container p-3">
        <div class="py-5">
            <img class="main-logo-style" src="assets/images/logo/favicon.ico"
                onclick="window.location.replace('home');">
        </div>
        <div>
            <div class="menu-section">
                <ul>
                    <li>
                        <?php
                        if($current_page_data === '/home' || $current_page_data === '/'){
                        ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Home"
                            onclick="window.location.replace('home')" data-toggle="tooltip" data-placement="right" title="Home">
                            <path
                                d="M4.5 21.25V10.87c0-.07.04-.15.1-.2l7.25-5.43a.25.25 0 0 1 .3 0l7.25 5.44c.06.04.1.12.1.2v10.37c0 .14-.11.25-.25.25h-4.5a.25.25 0 0 1-.25-.25v-5.5a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25v5.5c0 .14-.11.25-.25.25h-4.5a.25.25 0 0 1-.25-.25z"
                                fill="currentColor" stroke="currentColor" stroke-linejoin="round"></path>
                            <path d="M22 9l-9.1-6.83a1.5 1.5 0 0 0-1.8 0L2 9" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <?php
                        }else{
                        ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Home"
                            onclick="window.location.replace('home')" data-toggle="tooltip" data-placement="right" title="Home">
                            <path
                                d="M4.5 10.75v10.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-5.5c0-.14.11-.25.25-.25h3.5c.14 0 .25.11.25.25v5.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-10.5M22 9l-9.1-6.83a1.5 1.5 0 0 0-1.8 0L2 9"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <?php } ?>
                    </li>
                    <li>
                        <?php
                        if($current_page_data === '/notifications'){
                        ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Notifications"
                            onclick="window.location.replace('notifications')" data-toggle="tooltip" data-placement="right" title="Notification">
                            <path d="M15 18.5a3 3 0 1 1-6 0" stroke="currentColor" stroke-linecap="round"></path>
                            <path
                                d="M5.5 10.53V9a6.5 6.5 0 0 1 13 0v1.53c0 1.42.56 2.78 1.57 3.79l.03.03c.26.26.4.6.4.97v2.93c0 .14-.11.25-.25.25H3.75a.25.25 0 0 1-.25-.25v-2.93c0-.37.14-.71.4-.97l.03-.03c1-1 1.57-2.37 1.57-3.79z"
                                fill="currentColor" stroke="currentColor" stroke-linejoin="round"></path>
                        </svg>

                        <?php
                        }else{
                        ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Notifications"
                            onclick="window.location.replace('notifications')" data-toggle="tooltip" data-placement="right" title="Notification">
                            <path d="M15 18.5a3 3 0 1 1-6 0" stroke="currentColor" stroke-linecap="round">
                            </path>
                            <path
                                d="M5.5 10.53V9a6.5 6.5 0 0 1 13 0v1.53c0 1.42.56 2.78 1.57 3.79l.03.03c.26.26.4.6.4.97v2.93c0 .14-.11.25-.25.25H3.75a.25.25 0 0 1-.25-.25v-2.93c0-.37.14-.71.4-.97l.03-.03c1-1 1.57-2.37 1.57-3.79z"
                                stroke="currentColor" stroke-linejoin="round"></path>
                        </svg>
                        <?php } ?>
                    </li>
                    <li>
                        <?php
                        if($current_page_data === '/reading-list'){
                        ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Lists"
                            onclick="window.location.replace('reading-list')" data-toggle="tooltip" data-placement="right" title="Reading List">
                            <path
                                d="M4.5 6.25V21c0 .2.24.32.4.2l5.45-4.09a.25.25 0 0 1 .3 0l5.45 4.09c.16.12.4 0 .4-.2V6.25a.25.25 0 0 0-.25-.25H4.75a.25.25 0 0 0-.25.25z"
                                fill="currentColor" stroke="currentColor" stroke-linecap="round"></path>
                            <path d="M8 6V3.25c0-.14.11-.25.25-.25h11.5c.14 0 .25.11.25.25V16.5" stroke="currentColor"
                                stroke-linecap="round"></path>
                        </svg>
                        <?php
                        }else{
                        ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Lists"
                            onclick="window.location.replace('reading-list')" data-toggle="tooltip" data-placement="right" title="Reading List">
                            <path
                                d="M4.5 6.25V21c0 .2.24.32.4.2l5.45-4.09a.25.25 0 0 1 .3 0l5.45 4.09c.16.12.4 0 .4-.2V6.25a.25.25 0 0 0-.25-.25H4.75a.25.25 0 0 0-.25.25z"
                                stroke="currentColor" stroke-linecap="round"></path>
                            <path d="M8 6V3.25c0-.14.11-.25.25-.25h11.5c.14 0 .25.11.25.25V16.5" stroke="currentColor"
                                stroke-linecap="round"></path>
                        </svg>
                        <?php } ?>
                    </li>
                    <li>

                        <?php
                        if($current_page_data === '/stories'){
                        ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Stories"
                            onclick="window.location.replace('stories')" data-toggle="tooltip" data-placement="right" title="Stories">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4 2.75c0-.41.34-.75.75-.75h14.5c.41 0 .75.34.75.75v18.5c0 .41-.34.75-.75.75H4.75a.75.75 0 0 1-.75-.75V2.75zM7 8.5c0-.28.22-.5.5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 7c0-.28.22-.5.5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zM7 12c0-.28.22-.5.5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 7 12z"
                                fill="currentColor"></path>
                        </svg>
                        <?php
                        }else{
                        ?>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Stories"
                            onclick="window.location.replace('stories')" data-toggle="tooltip" data-placement="right" title="Stories">
                            <path
                                d="M4.75 21.5h14.5c.14 0 .25-.11.25-.25V2.75a.25.25 0 0 0-.25-.25H4.75a.25.25 0 0 0-.25.25v18.5c0 .14.11.25.25.25z"
                                stroke="currentColor"></path>
                            <path d="M8 8.5h8M8 15.5h5M8 12h8" stroke="currentColor" stroke-linecap="round">
                            </path>
                        </svg>
                        <?php } ?>
                    </li>
                    <?php
                    if ((strpos($user_address_new, '0x') === 0)){
                    ?>
                    <li>
                        <?php
                        if($current_page_data === '/inbox'){
                        ?>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0.125 0.125 23.75 23.75" height="22" width="22" stroke-width="0.75" onclick="window.location.replace('inbox')" data-toggle="tooltip" data-placement="right" title="Messages" id="chat"><path stroke="#060606" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M8.5 14.5H4.5L0.5 18.5V1.5H18.5V9.5"></path><path stroke="#060606" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M22.5 11.5H10.5V20.5H19.5L22.5 23.5V11.5Z"></path></svg>
                        <?php
                        }else{
                        ?>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0.125 0.125 23.75 23.75" height="22" width="22" stroke-width="0.75" onclick="window.location.replace('inbox')" data-toggle="tooltip" data-placement="right" title="Messages" id="chat"><path stroke="#060606" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M8.5 14.5H4.5L0.5 18.5V1.5H18.5V9.5"></path><path stroke="#060606" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M22.5 11.5H10.5V20.5H19.5L22.5 23.5V11.5Z"></path></svg>
                        <?php } ?>
                    </li>
                    <?php } ?>
                    <li class="w-100 pb-2">
                        <div class="hr-container">
                            <hr class="hr-css">
                        </div>
                    </li>
                    <li>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Write"
                            onclick="window.location.replace('create-story')" data-toggle="tooltip" data-placement="right" title="Create Story">
                            <path
                                d="M14 4a.5.5 0 0 0 0-1v1zm7 6a.5.5 0 0 0-1 0h1zm-7-7H4v1h10V3zM3 4v16h1V4H3zm1 17h16v-1H4v1zm17-1V10h-1v10h1zm-1 1a1 1 0 0 0 1-1h-1v1zM3 20a1 1 0 0 0 1 1v-1H3zM4 3a1 1 0 0 0-1 1h1V3z"
                                fill="currentColor"></path>
                            <path
                                d="M17.5 4.5l-8.46 8.46a.25.25 0 0 0-.06.1l-.82 2.47c-.07.2.12.38.31.31l2.47-.82a.25.25 0 0 0 .1-.06L19.5 6.5m-2-2l2.32-2.32c.1-.1.26-.1.36 0l1.64 1.64c.1.1.1.26 0 .36L19.5 6.5m-2-2l2 2"
                                stroke="currentColor"></path>
                        </svg>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <?php
                if(isset($_SESSION['header_show'])){
            ?>
            <div class="profile my-3" style="height:2rem;width:2rem;">
                <div style="cursor:pointer;" id="menu_toggle_click_button" class="popr" data-id="1" data-mode="top">
                    <?php 
                    if($profile == ''){
                    ?>
                    <canvas class="avatar-image img-fluid rounded-circle" title="<?= $name ?>" width="34"
                        height="34"></canvas>
                    <?php
                    }else{
                    ?>
                    <img src="uploads/profile/<?= $profile ?>" alt="<?= $profile ?>" class="img-fluid rounded-circle">
                    <?php
                    }
                    ?>
                </div>
                <div class="menu-upper-wrapper popr-box" id="menu-uppper-toggle-layer" data-box-id="1">
                    <div class="menu-upper-inner" style="overflow-y: auto; max-height: 567px;">
                        <div class="menu-upper-inner-div"><span tabindex="0"></span>
                            <div class="menu-upper-before-ul">
                                <ul>
                                    <ul>
                                        <li>
                                            <a class="menu-upper-inner-anchor y" href="create-story"
                                                rel="noopener follow">
                                                <div class="menu-list-inner-uppper">
                                                    <p class="menu-uppper-name-title">Publish new story</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="menu-upper-inner-anchor y" href="stories" rel="noopener follow">
                                                <div class="menu-list-inner-uppper">
                                                    <p class="menu-uppper-name-title">Stories</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="kn hz ia gh" aria-hidden="true">
                                    <ul>
                                        <li>
                                            <a class="menu-upper-inner-anchor y" rel="noopener follow" href="logout">
                                                <div class="menu-list-inner-uppper">
                                                    <p class="menu-uppper-name-title">Sign out</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        <li>
                                            <a class="menu-upper-inner-anchor y" rel="noopener follow"
                                                href="user-stats">
                                                <div class="menu-list-inner-uppper">
                                                    <p class="menu-uppper-name-title">Stats</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="menu-upper-inner-anchor y" href="reading-list"
                                                rel="noopener follow">
                                                <div class="menu-list-inner-uppper">
                                                    <p class="menu-uppper-name-title">Reading list</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li><a class="menu-upper-inner-anchor y" rel="noopener follow"
                                                href="user-settings">
                                                <div class="menu-list-inner-uppper">
                                                    <p class="menu-uppper-name-title">Settings</p>
                                                </div>
                                            </a></li>
                                    </ul>
                                    <hr class="kn hz ia gh" aria-hidden="true">
                                    <ul>
                                        <li class="menu-uppper-bottom-panel-wrapper">
                                            <div class="menu-uppper-bottom-panel-inner">
                                                <p class="menu-uppper-bottom-panel-inner-para"><?= '@'.$username; ?></p>
                                                <p class="menu-uppper-bottom-panel-inner-para-small"><?= $name; ?></p>
                                            </div>
                                            <a class="menu-uppper-name-title-back" rel="noopener follow"
                                                href="<?php echo $username; ?>">
                                                <div class="view-profile-back">View profile</div>
                                            </a>
                                        </li>
                                    </ul>
                                </ul>
                            </div><span tabindex="0"></span>
                        </div>
                        <div class="nn tm tn to tp tq tr ts tt tu tv tw"
                            style="position: absolute; left: 0px; transform: translate(133px, 0px);"></div>
                    </div>
                </div>
            </div>
            <?php
                }else{
                ?>
            <a class="medium-top-panel-anchor" rel="noopener follow" href="login-user-mm">
                <button class="medium-top-panel-anchor-button">Sign In</button>
            </a>
            <?php
                } 
            ?>
        </div>
    </div>
</div>

<div id="searchHeader" class="search-header">
    <a href="javascript:void(0)" class="closebtn2" onclick="closeSearchNav()">&times;</a>
    <div class="search-div d-flex flex-column justify-content-center">
        <h2 class="fw-bold text-capitalize">Press ESC to close</h2>
        <div class="mt-3 d-flex">
            <input type="search" name="searchtext" id="searchtext" class="form-control form-control-lg search-input"
                placeholder="Search and press enter ...">
            <button type="button" id="search" onclick="search(document.getElementById('searchtext').value)"
                class="btn btn-lg px-4 search-button"><i class="icon-magnifier"></i></button>

        </div>

    </div>
</div>
<script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function() {
    var slug;
    $('#zero-conf').DataTable();
    $('#search').on('click', function(e) {
        e.preventDefault();
        var error = "";
        var formData = new FormData();
        if ($('#searchtext').val() == "") {
            error = error + 'searchtext';
        } else {
            formData.append('searchtext', $('#searchtext').val());
        }
        if (error == "") {
            console.log(formData);
            $.ajax({
                url: "php/search.php",
                type: "POST",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                data: formData,

                success: function(data) {
                    console.log(data);
                    if (data.status == 201) {
                        window.location.replace("index");
                    } else if (data.status == 301) {
                        console.log(data.error);
                        swal("error");
                    } else if (data.status == 601) {
                        console.log(data.error);
                        swal("error");
                    } else if (data.status == 603) {
                        console.log(data.error);
                        swal("error");
                    } else {
                        console.log("problem with query");
                    }
                }
            });
        } else {}
    });
});
</script>