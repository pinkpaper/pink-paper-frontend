<div class="page-sidebar">
    <div class="logo-box"><a href="#" class="logo-text">QuadbTech</a><a href="#" id="sidebar-close"><i
                class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i
                class="material-icons">adjust</i><i
                class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li class="<?php if($currentPage == 'dashboard'){echo 'active-page';}?>">
                <a href="./" class="active"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
            <li class="<?php if($currentPage == 'stories'){echo 'active-page';}?>">
                <a href="#"><i class="material-icons">text_format</i>Stories<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="allpost" class="<?php if($currentPageSub =='all-stories'){echo 'active';}?>" >All Posts</a>
                    </li>
                    <li>
                        <a href="trash-stories" class="<?php if($currentPageSub =='trash-stories'){echo 'active';}?>" >Trash Stories</a>
                    </li>
                    <li>
                        <a href="all-tags" class="<?php if($currentPageSub =='tags'){echo 'active';}?>">Tags</a>
                    </li>
                </ul>
            </li>
            <li class="<?php if($currentPage == 'users'){echo 'active-page';}?>">
                <a href="#"><i class="material-icons-outlined">account_circle</i>Users<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="all-users" class="<?php if($currentPageSub =='all-users'){echo 'active';}?>">All Users</a>
                    </li>
                    <li>
                        <a href="add-user" class="<?php if($currentPageSub =='add-user'){echo 'active';}?>">Add New User</a>
                    </li>
                </ul>
            </li>
            <!-- <li class="<?php if($currentPage == 'comments'){echo 'active-page';}?>">
                <a href="#"><i class="material-icons-outlined">create</i>Comments<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="add_comments_home" class="<?php if($currentPageSub =='all-comments'){echo 'active';}?>">All Comments</a>
                    </li>
                </ul>
            </li> -->
            <li class="<?php if($currentPage == 'followers'){echo 'active-page';}?>">
                <a href="#"><i class="material-icons">class</i>Followers<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="followusers" class="<?php if($currentPageSub =='followusers'){echo 'active';}?>" >All Followers</a>
                    </li>
                    <li>
                        <a href="postlike" class="<?php if($currentPageSub =='postlike'){echo 'active';}?>" >Likes</a>
                    </li>
                    <li>
                        <a href="savepost" class="<?php if($currentPageSub =='savepost'){echo 'active';}?>">Saved Posts</a>
                    </li>
                    <li>
                        <a href="newsletter" class="<?php if($currentPageSub =='newsletter'){echo 'active';}?>">Newsletter</a>
                    </li>
                </ul>
            </li>
            <li class="<?php if($currentPage == 'comments'){echo 'active-page';}?>">
                <a href="#"><i class="material-icons">comment</i>Comments<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="comments" class="<?php if($currentPageSub =='allcomments'){echo 'active';}?>" >All Comments</a>
                    </li>
                    
                </ul>
            </li>
            <li class="<?php if($currentPage == 'settings'){echo 'active-page';}?>">
                <a href="#"><i class="material-icons">settings</i>Settings<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="viewlogo" class="<?php if($currentPageSub =='logo'){echo 'active';}?>">Logo</a>
                    </li>
                    <li>
                        <a href="nav" class="<?php if($currentPageSub =='nav-menu'){echo 'active';}?>">Nav menu</a>
                    </li>
                
                    <li>
                        <a href="social" class="<?php if($currentPageSub =='social'){echo 'active';}?>">Social Media</a>
                    </li>
                    <li>
                        <a href="metamask" class="<?php if($currentPageSub =='metamask'){echo 'active';}?>">Metamask Details</a>
                    </li>
                    
</ul>
</li>
            <li class="<?php if($currentPage == 'others'){echo 'active-page';}?>">
                <a href="#"><i class="material-icons">settings</i>Others<i
                        class="material-icons has-sub-menu">add</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="contactus" class="<?php if($currentPageSub =='contactus'){echo 'active';}?>">Contacts</a>
                    </li>
                    <li>
                        <a href="editor" class="<?php if($currentPageSub =='editor'){echo 'active';}?>">Editor Choices</a>
                    </li>
                
                    <li>
                        <a href="aboutus" class="<?php if($currentPageSub =='aboutus'){echo 'active';}?>">About us</a>
                    </li>
                    <li>
                        <a href="privacy-policy.php" class="<?php if($currentPageSub =='privacy-policy'){echo 'active';}?>">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="cookies-policy.php" class="<?php if($currentPageSub =='cookies-policy'){echo 'active';}?>">Cookies Policy</a>
                    </li>
                    <li>
                        <a href="terms.php" class="<?php if($currentPageSub =='terms'){echo 'active';}?>">Terms Of Use</a>
                    </li>
                    
</ul>
</li>
</ul>
    </div>
</div>