<?php require_once "php/controllerUserData.php"; ?>
<?php require_once "php/schedule_cron.php"; ?>
<?php
if (isset($_SERVER['HTTP_REFERER'])) {
    $referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);
}

if (isset($_SESSION['userAddress'])) {
    header("Location: /");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Pink Paper </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="icon" href="assets/images/logo/favicon.ico">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- icons pack -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />

    <!-- stylesheet -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/loader.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/medium.css" />

    <!-- Css for view password icon starts -->
    <style type="text/css">
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }

        .st-line-style {
            width: 4rem;
            height: 0.1rem;
            background: #adb5bd;
        }
    </style>
    <!-- Css for view password icon ends -->

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>

    <script type="text/javascript" src="https://unpkg.com/web3modal@1.9.0/dist/index.js"></script>
    <script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider@1.2.1/dist/umd/index.min.js">
    </script>
</head>

<body onload="loader()">

    <!-- loader start-->
    <div class="loader-container">
        <div class="loadingio-spinner-ellipsis-tjmuel5ie5">
            <div class="ldio-g2ezeznggp">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- loader end-->

    <?php
    $result = mysqli_query($link, 'SELECT * FROM `logo`');
    $rowLogo = mysqli_fetch_assoc($result);
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="d-none d-lg-block col-lg-8 login-content-panel-img-wrapper position-relative px-5 pt-5">
                <div class="login-content-panel-img">
                    <div class="home-panel">
                        <span onclick="window.location.replace('home');">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Home">
                                <path d="M4.5 21.25V10.87c0-.07.04-.15.1-.2l7.25-5.43a.25.25 0 0 1 .3 0l7.25 5.44c.06.04.1.12.1.2v10.37c0 .14-.11.25-.25.25h-4.5a.25.25 0 0 1-.25-.25v-5.5a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25v5.5c0 .14-.11.25-.25.25h-4.5a.25.25 0 0 1-.25-.25z" fill="currentColor" stroke="currentColor" stroke-linejoin="round"></path>
                                <path d="M22 9l-9.1-6.83a1.5 1.5 0 0 0-1.8 0L2 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="arrow-panel my-3">
                        <span>
                            <?php
                            if (!empty($referer)) {
                                echo '<a href="' . $referer . '" title="Return to the previous page"><img src="assets/images/arrow.png"></a>';
                            } else {
                                echo '<a href="javascript:history.go(-1)" title="Return to the previous page"><img src="assets/images/arrow.png"></a>';
                            }
                            ?>
                        </span>
                    </div>
                    <div class="content-image-panel">
                        <span><img src="assets/images/login-bg.png"></span>
                    </div>
                    <div class="bottom-panel-img my-3">
                        <span><img src="assets/images/pinkpaper-white-logo.png" onclick="window.location.replace('home');"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center align-items-center h-100 auto-height-set-panel flex-lg-row flex-column pt-3 pt-lg-0">
                <div class="d-lg-none position-relative header-top-panel d-flex justify-content-between align-items-center w-100">
                    <div class="header-first-element">
                        <div class="arrow-panel my-3 arrow-span-new">
                            <span>
                                <?php
                                if (!empty($referer)) {
                                    echo '<a href="' . $referer . '" title="Return to the previous page"><img src="assets/images/arrow2.png"></a>';
                                } else {
                                    echo '<a href="javascript:history.go(-1)" title="Return to the previous page"><img src="assets/images/arrow2.png"></a>';
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="header-second-element">
                        <img class="main-logo-style" src="assets/images/logo/logo.png" onclick="window.location.replace('home');" style="width:8rem;">
                    </div>
                    <div class="header-third-element">
                        <div class="home-panel home-panel-new">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="#fff" aria-label="Home" onclick="window.location.replace('home')">
                                    <path d="M4.5 10.75v10.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-5.5c0-.14.11-.25.25-.25h3.5c.14 0 .25.11.25.25v5.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-10.5M22 9l-9.1-6.83a1.5 1.5 0 0 0-1.8 0L2 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="login-content-panel-text px-4 pt-3 pt-lg-0">
                    <p class="left-side-content-panel-heading">
                        <span class="left-side-content-panel-heading-1">log in to</span><br>
                        <span class="left-side-content-panel-heading-2">continue</span>
                    </p>
                    <div class="d-flex justify-content-center align-items-center my-3">
                        <span class="st-line-style" style="width:34%;"></span>&nbsp;login/create with&nbsp;<span class="st-line-style" style="width:34%;"></span>
                    </div>
                    <!-- msg box start -->
                    <p id='userWallet' class='text-truncate'></p>
                    <div id="needMetamask" style="display:none;color: #1a8917;" class="user-login-msg">
                        To login, first install a Web3 wallet like the <a href="https://metamask.io/" style="color:#1a8917" target="_blank">MetaMask</a> browser extension or mobile
                        app
                    </div>
                    <div id="needLogInToMetaMask" style="display:none;color: #1a8917;" class="user-login-msg">
                        Log in to your wallet account first!
                    </div>
                    <div id="signTheMessage" style="display:none;color: #1a8917;" class="user-login-msg">
                        Sign the message with your wallet to authenticate
                    </div>
                    <div id="loggedIn" style="display:none;color: #1a8917;" class="user-login-msg">
                        Successful authentication for address:<br><span id="ethAddress" style="word-break: break-all;"></span>
                    </div>
                    <!-- msg box end -->
                    <p>If you want to access an earlier created account please use the wallet you had used to create it.
                    </p>
                    <div class="d-grid mb-2">
                        <button id="buttonText" onclick="userLoginOut()" class="btn button-primary button-text-metamask">
                            <img src="./assets/images/metamask.png" alt="metamask" class="img-responsive button-image">
                        </button>
                    </div>
                    <p>install&nbsp;<a href="https://metamask.io/" target="_blank" class="button-text-metamask-anchor">MetaMask</a></p>
                    <div class="d-grid mb-2 mt-4">
                        <button id="neoConnection" onclick="neoLogin()" class="btn button-primary button-text-metamask">
                            <img src="./assets/images/neo.png" alt="metamask" class="img-responsive button-image">
                        </button>
                    </div>
                    <p>install&nbsp;<a href="https://chrome.google.com/webstore/detail/neoline/cphhlgmgameodnhkjdmkpanlelnlohao?hl=en" target="_blank" class="button-text-metamask-anchor">Neo</a>
                    </p>
                    <div class="d-grid mb-2 mt-4">
                        <button id="neoConnection" onclick="loginWithArgent()" class="btn button-primary button-text-metamask">
                            <img src="./assets/images/argent.png" alt="argent" class="img-responsive button-image">
                        </button>
                    </div>
                    <p>install&nbsp;<a href="https://chrome.google.com/webstore/detail/argent-x/dlcobpjiigpikoobohmabehhmhfoodbb" target="_blank" class="button-text-metamask-anchor">Argent X</a>
                    </p>
                    <div class="d-grid mb-2 mt-4">
                        <button id="neoConnection" onclick="login()" class="btn button-primary button-text-metamask">
                            <img src="./assets/images/unstoppable.png" alt="unstoppable" class="img-responsive button-image">
                        </button>
                    </div>
                    <p class="mt-1">After clicking on the above options you will be redirected to your wallet's
                        respecting signature
                        pages, please sign the message to continue with the login process.</p>
                    <div class="bottom-panel-login-page">
                        <h5 class="bottom-panel-login-page-heading">if you need help contact here:</h5>
                        <ul class="bottom-panel-login-page-list-wrapper">
                            <li>
                                <a href="https://telegram.me/pinkpaperxyz" class="element-social-link">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z" />
                                        </svg>
                                    </span>
                                    <span class="mx-2">Pink Paper</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/Pinkpaperxyz" class="element-social-link">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg>
                                    </span>
                                    <span class="mx-2">@Pinkpaperxyz</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:team@pinkpaper.xyz" class="element-social-link">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                        </svg>
                                    </span>
                                    <span class="mx-2">team@pinkpaper.xyz</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/popr/popr.js"></script>
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <script src="frontend/web3-login.js?v=009"></script>
    <script src="frontend/web3-modal.js?v=001"></script>
    <script type="text/javascript" src="assets/js/neoLogin.js"></script>
    <script src="./dist/index.5baa4167.js" defer=""></script>
</body>

</html>