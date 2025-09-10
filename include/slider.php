<?php
$sqllms  = $dblms->querylms("SELECT slider_img, slider_title, slider_description, slider_btn_href, slider_btn_text
                                FROM ".SLIDER."
                                WHERE slider_status = '1'
                                AND is_deleted      = '0'
                                ORDER BY slider_id DESC
                            ");
echo'
<section class="hero-slider hero-style-1">
    <div class="swiper-container">
        <div class="swiper-wrapper">';
            while($value_slider = mysqli_fetch_array($sqllms)) {
                echo'
                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="'.ADMIN_URL.'uploads/images/slider/'. $value_slider['slider_img'].'">
                        <div class="container">
                            <div data-swiper-parallax="300" class="slide-title">
                                <h2>'.html_entity_decode($value_slider['slider_title'],ENT_QUOTES).'.</h2>
                            </div>
                            <div data-swiper-parallax="400" class="slide-text">
                                <p>'.$value_slider['slider_description'].'</p>
                            </div>
                            <div class="clearfix"></div>
                            <div data-swiper-parallax="500" class="slide-btns">
                                <a href="#" class="theme-btn-s2" onclick="showAjaxModalZoom(\'include/donation/donation_form.php?type=3\');">'. $value_slider['slider_btn_text'].'<i class="fi flaticon-heart-1"></i></a> 
                            </div>
                            <!--
                            <div class="video-btns">
                                <a href="https://www.youtube.com/embed/'. $value_slider['slider_btn_href'].'" class="video-btn" data-type="iframe" tabindex="0"><i class="fi flaticon-play-1"></i></a> 
                            </div>
                            -->
                        </div>
                    </div> 
                </div>';
            }
            echo'
        </div>
        <div class="swiper-pagination"></div>
        <div class="container">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="social">
            <ul>
                <li><a href="'.FB.'" target="blank"><i class="ti-facebook"></i></a></li>
                <li><a href="'.YOUTUBE.'"><i class="fa-brands fa-youtube"></i></a></li>
                <li><a href="'.INSTA.'"><i class="ti-instagram"></i></a></li>
                <li><a href="'.PINTEREST.'" target="blank"><i class="ti-pinterest"></i></a></li>
                <li><a href="'.TIKTOK.'"><i class="fa-brands fa-tiktok"></i></a></li>
                <!--
                <li><a href="'.LINKEDIN.'" target="blank"><i class="ti-linkedin"></i></a></li>
                -->
            </ul>
        </div>
        <div class="scroll">
            <a href="#about" id="scroll"><i class="fi flaticon-down-arrow-2"></i></a>
        </div>
    </div>
</section>';
?>