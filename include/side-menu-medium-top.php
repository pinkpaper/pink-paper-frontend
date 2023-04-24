<div class="medium-top-panel-wrapper d-block d-lg-none">
    <div class="medium-top-panel-wrapper-inner">
        <a class="medium-top-panel-anchor" aria-label="Homepage" rel="noopener follow"
            href="/">
            <img src="assets/images/logo/favicon.ico">
        </a>
        <div class="medium-top-panel-text-wrapper">
            <div class="medium-top-panel-text-inner">
                <span class="medium-top-panel-text-span">
                    <a class="medium-top-panel-text-anchor"
                        href="https://rsci.app.link/?%24canonical_url=https%3A%2F%2Fmedium.com%2Fp%2F507ab35b659a&amp;%7Efeature=LoOpenInAppButton&amp;%7Echannel=ShowPostUnderCollection&amp;%7Estage=mobileNavBar&amp;source=---three_column_layout_nav----------------------------------"
                        rel="noopener follow">Open in app</a>
                </span>
            </div>
            <?php
                if(!isset($_SESSION['header_show'])){
            ?>
            <div class="medium-top-panel-text-wrapper">
                <div class="medium-top-panel-text-wrapper-span-div">
                    <span>
                        <a class="medium-top-panel-anchor" rel="noopener follow" href="login-user-mm">
                            <button class="medium-top-panel-anchor-button">Sign In</button></a>
                    </span>
                </div>
            </div>
            <?php } ?>
            <div class="nw y"></div>
            <?php
                if(isset($_SESSION['header_show'])){
            ?>
            <a class="bell-icon-wrapper" rel="noopener follow" href="#">
                <div class="bell-icon-inner">
                    <svg width="25" height="25" viewBox="-293 409 25 25" class="bell-icon-svg" onclick="window.location.replace('notifications')">
                        <path
                            d="M-273.33 423.67l-1.67-1.52v-3.65a5.5 5.5 0 0 0-6.04-5.47 5.66 5.66 0 0 0-4.96 5.71v3.41l-1.68 1.55a1 1 0 0 0-.32.74V427a1 1 0 0 0 1 1h3.49a3.08 3.08 0 0 0 3.01 2.45 3.08 3.08 0 0 0 3.01-2.45h3.49a1 1 0 0 0 1-1v-2.59a1 1 0 0 0-.33-.74zm-7.17 5.63c-.84 0-1.55-.55-1.81-1.3h3.62a1.92 1.92 0 0 1-1.81 1.3zm6.35-2.45h-12.7v-2.35l1.63-1.5c.24-.22.37-.53.37-.85v-3.41a4.51 4.51 0 0 1 3.92-4.57 4.35 4.35 0 0 1 4.78 4.33v3.65c0 .32.14.63.38.85l1.62 1.48v2.37z">
                        </path>
                    </svg>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
    <div class="nm y"></div>
</div>