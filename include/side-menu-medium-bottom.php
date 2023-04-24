<?php
 $current_page_data =  $_SERVER['REQUEST_URI'];
?>
<div class="medium-mobile-panel-bottom-wrapper d-block d-lg-none">
    <div class="medium-mobile-panel-bottom-inner">
        <div class="medium-mobile-panel-bottom-div">
            <div class="medium-mobile-panel-bottom-div-div">
                <a class="medium-mobile-panel-bottom-anchor" rel="noopener follow" href="/">
                    <?php
                    if($current_page_data === '/home' || $current_page_data === '/'){
                    ?>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Home">
                        <path
                            d="M4.5 21.25V10.87c0-.07.04-.15.1-.2l7.25-5.43a.25.25 0 0 1 .3 0l7.25 5.44c.06.04.1.12.1.2v10.37c0 .14-.11.25-.25.25h-4.5a.25.25 0 0 1-.25-.25v-5.5a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25v5.5c0 .14-.11.25-.25.25h-4.5a.25.25 0 0 1-.25-.25z"
                            fill="currentColor" stroke="currentColor" stroke-linejoin="round"></path>
                        <path d="M22 9l-9.1-6.83a1.5 1.5 0 0 0-1.8 0L2 9" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                    <?php
                    }else{
                    ?>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Home"
                        onclick="window.location.replace('home')">
                        <path
                            d="M4.5 10.75v10.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-5.5c0-.14.11-.25.25-.25h3.5c.14 0 .25.11.25.25v5.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-10.5M22 9l-9.1-6.83a1.5 1.5 0 0 0-1.8 0L2 9"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <?php } ?>
                </a>
                <div class="medium-mobile-panel-bottom-anchor" rel="noopener follow" onclick="openSearchNav()">
                    <svg width="25" height="24" fill="none" aria-label="search">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4.8 10.69a6.95 6.95 0 1 1 13.9 0 6.95 6.95 0 0 1-13.9 0zm6.95-8.05a8.05 8.05 0 1 0 5.13 14.26l3.75 3.75a.56.56 0 1 0 .79-.79l-3.73-3.73a8.05 8.05 0 0 0-5.94-13.5z"
                            fill="#A8A8A8"></path>
                    </svg>
                </div>
                <a class="medium-mobile-panel-bottom-anchor" rel="noopener follow" href="reading-list">
                    <?php
                        if($current_page_data === '/reading-list'){
                        ?>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Lists">
                        <path
                            d="M4.5 6.25V21c0 .2.24.32.4.2l5.45-4.09a.25.25 0 0 1 .3 0l5.45 4.09c.16.12.4 0 .4-.2V6.25a.25.25 0 0 0-.25-.25H4.75a.25.25 0 0 0-.25.25z"
                            fill="currentColor" stroke="currentColor" stroke-linecap="round"></path>
                        <path d="M8 6V3.25c0-.14.11-.25.25-.25h11.5c.14 0 .25.11.25.25V16.5" stroke="currentColor"
                            stroke-linecap="round"></path>
                    </svg>
                    <?php
                        }else{
                        ?>
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" class="kq" aria-label="Reading list">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10 3a2 2 0 0 0-2 2v1H6a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4V8a2 2 0 0 0-2-2H9V5a1 1 0 0 1 1-1h9a1 1 0 0 1 1 1v12a.5.5 0 1 0 1 0V5a2 2 0 0 0-2-2h-9zM5 8a1 1 0 0 1 1-1h9a1 1 0 0 1 1 1v12.98l-5.2-4a.5.5 0 0 0-.6 0l-5.2 4V8z"
                            fill="#757575"></path>
                    </svg>
                    <?php } ?>
                </a>
                <?php
                if(isset($_SESSION['header_show'])){
            ?>
                <button class="medium-mobile-panel-bottom-button" aria-expanded="false" aria-controls="launchpadMenu"
                    aria-describedby="launchpadMenu" aria-labelledby="launchpadMenu" onclick="toggleMenuButtonMobile()">
                    <div class="medium-mobile-panel-bottom-button-div">
                        <div class="medium-mobile-panel-bottom-button-div">
                            <?php 
                            if($profile == ''){
                            ?>
                            <canvas class="avatar-image medium-mobile-panel-bottom-button-img" title="<?= $name ?>"
                                width="24" height="24"></canvas>
                            <?php
                            }else{
                            ?>
                            <img src="uploads/profile/<?= $profile ?>" alt="<?= $profile ?>"
                                class="medium-mobile-panel-bottom-button-img" width="24" height="24" loading="lazy">
                            <?php
                            }
                            ?>

                            <div class="medium-mobile-panel-bottom-button-img-div"></div>
                        </div>
                    </div>
                </button>
                <?php } ?>
            </div>
        </div>
        <div class="mobile-full-screen-menu-wrapper d-none" id="mobile_full_screen_menu">
            <div id="launchpadMenu" class="mobile-full-screen-menu-inner">
                <div class="mobile-full-screen-menu-div">
                    <a class="mobile-full-screen-menu-div-anchor" aria-label="Homepage" rel="noopener follow"
                        href="/">
                        <img src="assets/images/logo/favicon.ico">
                    </a>
                    <div class="mobile-full-screen-menu-outer-div">
                        <div class="mobile-full-screen-menu-div-text">
                            <div>
                                <a class="mobile-full-screen-menu-div-div-anchor" rel="noopener follow"
                                    href="logout">Sign Out</a>
                            </div>
                        </div>
                        <div class="mobile-full-screen-menu-blank-div"></div>
                    </div>
                </div>
                <div class="mobile-full-screen-menu-blank-div-new"></div>
                <ul>
                    <ul>
                        <div class="mobile-full-screen-menu-list-wrapper">
                            <li class="mobile-full-screen-menu-list-inner">
                                <div class="mobile-full-screen-menu-list-wrapper">
                                    <p class="mobile-full-screen-menu-list-para-head"><?= '@'.$username; ?></p>
                                    <p class="mobile-full-screen-menu-list-para-text"><?= $name; ?></p>
                                </div>
                                <a class="mobile-full-screen-menu-list-anchor" rel="noopener follow"
                                    href="<?php echo $username; ?>">
                                    <div class="mobile-full-screen-menu-div-text">View profile</div>
                                </a>
                            </li>
                        </div>
                    </ul>
                    <hr class="mobile-full-screen-menu-hr" aria-hidden="true">
                    <ul>
                        <li class="mobile-full-screen-menu-list-inner">
                            <a class="mobile-full-screen-menu-list-inner-anchor" rel="noopener follow" href="notifications">
                                <p class="mobile-full-screen-menu-list-inner-para">
                                    <div class="mobile-full-screen-menu-outer-div">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            class="mobile-full-screen-menu-list-inner-svg" aria-hidden="true">
                                            <path d="M15 18.5a3 3 0 1 1-6 0" stroke="currentColor"
                                                stroke-linecap="round"></path>
                                            <path
                                                d="M5.5 10.53V9a6.5 6.5 0 0 1 13 0v1.53c0 1.42.56 2.78 1.57 3.79l.03.03c.26.26.4.6.4.97v2.93c0 .14-.11.25-.25.25H3.75a.25.25 0 0 1-.25-.25v-2.93c0-.37.14-.71.4-.97l.03-.03c1-1 1.57-2.37 1.57-3.79z"
                                                stroke="currentColor" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                        <div class="mobile-full-screen-menu-list-inner-text">Notifications</div>
                                    </div>
                                </p>
                            </a>
                        </li>
                        <li class="mobile-full-screen-menu-list-inner">
                            <a class="mobile-full-screen-menu-list-inner-anchor" rel="noopener follow" href="stories">
                                <p class="mobile-full-screen-menu-list-inner-para">
                                    <div class="mobile-full-screen-menu-outer-div">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            class="mobile-full-screen-menu-list-inner-svg" aria-hidden="true">
                                            <path
                                                d="M4.75 21.5h14.5c.14 0 .25-.11.25-.25V2.75a.25.25 0 0 0-.25-.25H4.75a.25.25 0 0 0-.25.25v18.5c0 .14.11.25.25.25z"
                                                stroke="currentColor"></path>
                                            <path d="M8 8.5h8M8 15.5h5M8 12h8" stroke="currentColor"
                                                stroke-linecap="round"></path>
                                        </svg>
                                        <div class="mobile-full-screen-menu-list-inner-text">Stories</div>
                                    </div>
                                </p>
                            </a>
                        </li>
                        <li class="mobile-full-screen-menu-list-inner">
                            <a class="mobile-full-screen-menu-list-inner-anchor" href="user-stats"
                                rel="noopener follow">
                                <p class="mobile-full-screen-menu-list-inner-para">
                                    <div class="mobile-full-screen-menu-outer-div">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            class="mobile-full-screen-menu-list-inner-svg" aria-hidden="true">
                                            <path
                                                d="M2.75 19h4.5c.14 0 .25-.11.25-.25v-6.5a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25v6.5c0 .14.11.25.25.25zM9.75 19h4.5c.14 0 .25-.11.25-.25V8.25a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25v10.5c0 .14.11.25.25.25zM16.75 19h4.5c.14 0 .25-.11.25-.25V4.25a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25v14.5c0 .14.11.25.25.25z"
                                                stroke="currentColor"></path>
                                        </svg>
                                        <div class="mobile-full-screen-menu-list-inner-text">Stats</div>
                                    </div>
                                </p>
                            </a>
                        </li>
                    </ul>
                    <hr class="mobile-full-screen-menu-hr" aria-hidden="true">
                    <ul>
                        <li class="mobile-full-screen-menu-list-inner">
                            <a class="mobile-full-screen-menu-list-inner-anchor" rel="noopener follow"
                                href="user-settings">
                                <p class="mobile-full-screen-menu-list-inner-para">Settings</p>
                            </a>
                        </li>
                        <li class="mobile-full-screen-menu-list-inner">
                            <button class="mobile-full-screen-menu-list-inner-anchor"
                                onclick="window.location.replace('logout')">
                                <p class="mobile-full-screen-menu-list-inner-para">Sign out</p>
                            </button>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
    </div>
</div>