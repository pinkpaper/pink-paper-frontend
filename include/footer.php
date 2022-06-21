<footer class="footer">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-4 col-md-12 order-4 order-lg-1">
                <div class="text-align mb-3">
                    <img src="<?php echo $rowLogo['logo_image']; ?>"
                        width='151px' alt='logo' class="mb-1">
                    <h6 class="mb-3 text-muted small">&copy; 2021, All Rights Reserved.</h6>
                    <!-- <h6 class="fw-bold" style="color:var(--text-color);">Powered By <a href="#" class="footer-link" target="_blank">QuadBTech</a></h6> -->
                </div>
            </div>
            <div class="col-lg-4 col-md-12 order-2 order-lg-2">
                <div class="text-align mb-3">
                    <h6 class="fw-bold" style="color:var(--text-color);">Quick Links</h6>
                    <div class="d-flex flex-lg-column justify-content-center flex-wrap gap-2 ms-lg-3">
                    <a href="/" class="footer-link disabled">Home</a>
                        <a href="about" class="footer-link">About</a>
                        <a href="contact-us" class="footer-link">Contact</a>                        
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-12 order-3 order-lg-3">
                <div class="text-align mb-3">
                    <h6 class="fw-bold" style="color:var(--text-color);">Legal Stuff</h6>
                    <div class="d-flex flex-lg-column justify-content-center flex-wrap gap-2 ms-lg-3">
                        <a href="privacy-policy" class="footer-link">Privacy Policy</a>
                        <a href="cookies-policy" class="footer-link">Cookie Policy</a>
                        <a href="terms_of_use" class="footer-link disabled">Term of use</a>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-3 col-md-12 order-1 order-lg-4">
                <div class="text-align mb-3">
                    <h6 class="fw-bold" style="color:var(--text-color);">Social Media</h6>
                    <div class="d-flex flex-lg-column justify-content-center flex-wrap gap-2 ms-lg-3">
                    <?php
                                    $result2 = mysqli_query($link, 'SELECT * FROM `social_media` WHERE visibility = "true"');
                                    while ($row2 = mysqli_fetch_array($result2)) {
                                        
                                ?>
            <a href="<?php echo $row2['icon_link']; ?>" target="_blank" class="footer-link"
                title="<?php echo ucfirst($row2['icon_name']); ?>">
                <div class="d-flex align-items-center gap-2">
                    <i class="<?php echo $row2['icon_font']; ?>" style="color:<?php echo $row2['icon_color']; ?>;"></i> <span class="d-none d-lg-block"> <?php echo ucfirst($row2['icon_name']); ?></span>
                </div>              
            </a>
            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>