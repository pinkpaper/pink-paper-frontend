<?php
require_once "php/schedule_cron.php";
$result = mysqli_query($link, 'SELECT * FROM `logo`');
$rowLogo = mysqli_fetch_assoc($result);
?>


<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar-2">
        <div class="container py-2"><a href="./"
                class="navbar-brand text-uppercase font-weight-bold"><img src="<?php echo $rowLogo['logo_image']; ?>"
                    width='151px' alt='logo'></a>

            

                <div id="navbarSupportedContent" class="">
                

                    <ul class="navbar-nav mx-auto text-center d-flex flex-row">
                        <li class="nav-item">
                            <a href="././" class="btn nav-button d-flex justify-content-center align-items-center"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home"><i class="icon-home"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <?php 
                                if(isset($_SESSION['userAddress'])){
                            ?>
                                <a href="#" class="btn nav-button d-flex justify-content-center align-items-center" id="dropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" ><i class="icon-user"></i></a>
                                <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <div class="d-flex justify-content-center pb-1 pt-2" style="width:100%;">
                                            <a href="<?php echo $username; ?>">
                                                <?php 
                                                    if($profile == ''){
                                                        echo '<canvas class="header-avatar-image img-fluid rounded-circle text-center p-1 shadow-sm dropdown-profile" title="'.$name.'"></canvas>';
                                                    }else{
                                                        echo '<img src="uploads/profile/' . $profile. '" alt="'.$name.'" class="text-center p-1 shadow-sm dropdown-profile">';
                                                    }
                                                ?>
                                            </a>
                                        </div>   
                                    </li>
                                    <li><a class="dropdown-item text-center text-truncate" href="<?php echo $username; ?>"><?php echo '@'.$username; ?></a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="create-story">Publish new  story</a></li>
                                    <li><a class="dropdown-item" href="stories">Stories</a></li>
                                    <li><a class="dropdown-item" href="user-stats">Stats</a></li>
                                    <li><a class="dropdown-item" href="reading-list">Reading List</a></li>
                                    <li><a class="dropdown-item" href="user-settings">Settings</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="logout">Logout</a></li>
                                </ul>
                            <?php        
                                }else{
                                    echo '<a href="login-user" class="btn nav-button d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login"><i class="icon-login"></i></a>';
                                }
                            ?>
                        </li>
                        <li class="nav-item">
                            <button class="btn nav-button" onclick="openSearchNav()" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search"><i class="icon-magnifier"></i></button>
                        </li>
                        <li class="nav-item">
                            <button class="btn nav-button burger-icon" onclick="openNav()">
                                <div> </div>
                                <div> </div>   
                            </button>
                        </li>    
                    </ul>
                    
                    
                </div>
            
            <!-- <div class="right-header d-flex justify-content-between align-items-center">
                <div class="theme-switch form-check form-switch ms-2" for="checkbox">
                    <input class="form-check-input" type="checkbox" id="checkbox" />
                </div>
                <div class="d-none d-lg-block">
                    <a href="#" class="btn btn-outline-dark" role="button">Login</a>
                    <a href="#" class="btn btn-dark" role="button">Get Started</a>
                </div>
                <div class="d-lg-none position-relative ">
                    <div class="header-right-button">
                        <button class="btn" onclick="openSearchNav()"><i class="fas fa-search"></i></button>
                        <button class="btn burger-icon" onclick="openNav()">
                            <div></div>
                            <div></div>
                        </button>


                    </div>
                </div>
                

            </div> -->

        </div>
    </nav>

</header>

<div id="mySidenav" class="sidenav shadow-lg">
    <div class="d-flex justify-content-between">
        <div class="d-flex theme-btn">
            <h6 class="mb-0" style="margin-top: 3px;">Light/Dark</h6>
            <div class="theme-switch form-check form-switch ms-2" for="checkbox">
                <input class="form-check-input" type="checkbox" id="checkbox" />
            </div>
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    </div>
            
    <div class="d-flex flex-column align-content-around p-4">
        <div class="mb-5">
            <a href="https://govtjobkaro.com" class="navbar-brand text-uppercase font-weight-bold">
                <img src="<?php echo $rowLogo['logo_image']; ?>" width='151px' alt='logo'>
            </a>
        </div>

        <div class="mb-5 sidenav-link">
            <?php
                        $result2 = mysqli_query($link, 'SELECT * FROM `header-settings`');
                        while ($row2 = mysqli_fetch_array($result2)) {
                            $nav_link = $row2['nav-link'];
                            $nav_name = $row2['nav-name'];
                        ?>
            <a href="<?php echo $nav_link; ?>"
                class="text-capitalize px-0 py-2 mb-2" style="border-bottom:1px solid var(--gray-color-50);"><?php echo $nav_name; ?></a>
            <?php } ?>
            
            
        </div>


        <div class="social-icon d-flex justify-content-start flex-wrap ">
            <?php
                                    $result2 = mysqli_query($link, 'SELECT * FROM `social_media` WHERE visibility = "true"');
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                        
                                ?>
            <a href="<?php echo $row2['icon_link']; ?>" target="_blank" class="text-center px-2"
                title="<?php echo ucfirst($row2['icon_name']); ?>">
                <i class="<?php echo $row2['icon_font']; ?>"></i>
            </a>
            <?php } ?>
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
            <button type="button" id="search" onclick="search(document.getElementById('searchtext').value)" class="btn btn-lg px-4 search-button"><i class="icon-magnifier"></i></button>
                                                            
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
            var slug;
            $('#zero-conf').DataTable();
            
            $('#search').on('click', function(e) {


                e.preventDefault();
                var error = "";

                var formData = new FormData();
                if ($('#searchtext').val() == "") {
                    // sweetAlert("Warning", "Please enter all fields", "warning");
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
                                // if(data.link!=""){
                                window.location.replace("index");
                                // }else{
                                //     window.location.replace("/");
                                // }

                            } else if (data.status == 301) {
                                console.log(data.error);
                                swal("error");
                                // $('#contact-success').css('display', 'none');
                                // $('#contact-form').css('display', 'block');
                                // swal('success'); 
                            } else if (data.status == 601) {
                                console.log(data.error);
                                swal("error");
                                // $('#contact-success').css('display', 'none');
                                // $('#contact-form').css('display', 'block');
                                // swal('success'); 
                            } else if (data.status == 603) {
                                console.log(data.error);
                                swal("error");
                                // $('#contact-success').css('display', 'none');
                                // $('#contact-form').css('display', 'block');
                                // swal('success'); 
                            } else {
                                //     swal("problem with query");
                            }
                        }
                    });
                } else {

                }
            });


        });
</script>


<script>
    function search() {
            var a=$('#searchtext').val();
    window.location.href="search/"+a;          
    }
        
</script>
        