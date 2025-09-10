<?php
echo'
<footer class="site-footer" style="padding-top: -10px;">
    <div class="upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-lg-3 col-md-3 col-sm-6">
                    <div class="widget about-widget">
                        <div class="widget-title">
                            <h3>
                                <span class="hidden">About us</span>
                                <img src="'.SITE_URL.'assets/images/logo.png" alt>
                            </h3>
                        </div>
                        <p>'.SITE_BIO.'</p>
                        <div class="social-icons">
                            <ul>
                                <li><a target="blank" href="'.FB.'"><i class="ti-facebook"></i></a></li>
                                <li><a target="blank" href="'.YOUTUBE.'"><i class="fa-brands fa-youtube"></i></a></li>
                                <li><a target="blank" href="'.INSTA.'"><i class="ti-instagram"></i></a></li>
                                <!--li><a target="blank" href="'.PINTEREST.'" target="blank"><i class="ti-pinterest"></i></a></li-->
                                <li><a target="blank" href="'.TIKTOK.'"><i class="fa-brands fa-tiktok"></i></a></li>
                                <!--
                                <li><a target="blank" href="'.LINKEDIN.'"><i class="ti-linkedin"></i></a></li>
                                -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-md-3 col-sm-6">
                    <div class="widget contact-widget service-link-widget">
                        <div class="widget-title">
                            <h3>Address Location</h3>
                        </div>
                        <ul>
                            <li>'.SITE_ADDRESS.'</li>
                            <li>'.SITE_PHONE.'</li>
                            <li>'.SITE_WHATSAPP.'</li>
                            <li>'.SITE_EMAIL.'</li>
                        </ul>
                    </div>
                </div>
                <div class="col col-lg-3 col-md-3 col-sm-6">
                    <div class="widget link-widget">
                        <div class="widget-title">
                            <h3>Quick Links</h3>
                        </div>
                        <ul>
                            <li><a href="'.SITE_URL.'about">About us</a></li>
                            <li><a href="'.SITE_URL.'contact">Contact Us</a></li>
                            <li><a href="'.SITE_URL.'categories">Donations</a></li>
                            <li><a href="'.SITE_URL.'team">Meet team</a></li>
                            <li><a href="'.SITE_URL.'my-donations">My Donations</a></li>
                        </ul>
                        <ul>
                            <li><a href="'.SITE_URL.'projects">Projects</a></li>
                            <li><a href="'.SITE_URL.'events">Events</a></li>
                            <li><a href="'.SITE_URL.'faq">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-lg-3 col-md-3 col-sm-6">
                    <div class="widget newsletter-widget">
                        <div class="widget-title">
                            <h3>Newsletter</h3>
                        </div>
                        <p>You will be notified when somthing new will be appear.</p>
                        <form action="index" method="POST" id="newsletter_form">                                
                            <div class="input-1">
                                <input type="email" name="news_email" id="news_email" class="form-control" placeholder="Email Address *" required>
                            </div>
                            <div class="submit clearfix">
                                <button type="submit" name="submit_newsletter" id="newsletter"><i class="fi flaticon-paper-plane"></i></button>
                            </div>
                            <label class="text-info" id="newsletterEmailError"></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-footer">
        <div class="container">
            <div class="row">
                <div class="separator"></div>
                <div class="col col-xs-12">
                    <p class="copyright">'.SITE_NAME.' '.COPY_RIGHTS_ORG.'</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- 
this div closing is from header file which open the body tag
-->
</div>
<!-- 
endding
-->
<!-- end of page-wrapper -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="'.SITE_URL.'assets/js/bootstrap.min.js"></script>
<!-- Plugins for this template -->
<script src="'.SITE_URL.'assets/js/jquery-plugin-collection.js"></script>
<!-- Custom script for this template -->
<script src="'.SITE_URL.'assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

<!-- PNOTIFY NOTIFICATIONS JS -->
<script src="'.SITE_URL.'assets/vendor/pnotify/pnotify.custom.js"></script>


<div class="modal fade" id="show_modal" tabindex="-1" role="dialog" aria-labelledby="show_modal" aria-hidden="true"></div>';
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.phone').inputmask('9999-9999999');
        $('.date_mask').inputmask('99-99-9999');
        $('.cnic').inputmask('99999-9999999-9');
        
        const current_url = "'.$control.'";
        const menu_item = document.querySelectorAll(".check_links");
        const length = menu_item.length;
        for (let i = 0; i < length; i++) {
            let check = menu_item[i].firstElementChild.href.includes(current_url);
            if (check) {
                menu_item[i].classList.add("current-menu-parent");  
            }
        }
    });

    function showAjaxModalZoom(url) {
        jQuery('#show_modal').html('<div class="modal-dialog modal-dialog-centered text-center modal-lg" role="document"><div style="text-align:center; "><img src="assets/images/preloader.gif"/></div></div>');
        $.ajax({
            url: url,
            success: function ( response ) {
                jQuery('#show_modal').html(response);
                $("#show_modal").modal("show");
            }
        });
    }
    $("#newsletter").click(function(e) {
        e.preventDefault();
        function isValidEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        var newsletterEmail = $('#news_email').val();
        if (newsletterEmail == ""){
            $('#newsletterEmailError').html("Please Enter Your Email");
        } else {
            if (!isValidEmail(newsletterEmail)){
                $('#newsletterEmailError').html("Please Enter Valid Email");
            } else {
                $('#newsletterEmailError').html("");
                function loadData(email){
                    $.ajax({
                        url : "include/news_letter_validation.php",
                        type : "POST",
                        data : { 
                            email : newsletterEmail
                        },
                        success : function(data){
                            console.log(data);
                            if (data != "") {
                                $('#newsletterEmailError').html(data); 
                            }
                            $('form input[type="email"]').val('');
                        }
                    }); 
                }            
                loadData(newsletterEmail);
            }
        }
    });
</script>