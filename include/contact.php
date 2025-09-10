<?php
echo'
<style>
@keyframes spinner {
  to {transform: rotate(360deg);}
}

.spinner:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 80%;
  left: 3%;
  width: 50px;
  height: 50px;
  margin-top: -10px;
  margin-left: -10px;
  border-radius: 50%;
  border: 5px solid #c01f1b;
  border-top-color: #fff;
  animation: spinner .6s linear infinite;
}
.display-none{
    animation-duration: 1s;
    opacity: 0;
    
}
</style>
<section class="page-title">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Contact us</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Contact us</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
    </div>
</section>
<section class="contact-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="section-title-s3">
                    <span>#Contact with us</span>
                    <h2>Lets get in touch!</h2>
                    <p>'.SITE_BIO.'</p>
                </div>
            </div>
            <div class="col col-xs-12">
                <div class="contact-info-grids">
                    <div class="col-lg-4">
                        <i class="fi flaticon-house"></i>
                        <h4>'.SITE_NAME.'</h4>
                        <p>'.SITE_ADDRESS.'</p>
                    </div>
                    <div class="col-lg-4">
                        <i class="fi flaticon-email"></i>
                        <h4>Email Address</h4>
                        <p>Send your query at:</p>
                        <p>'.SITE_EMAIL.'</p>
                    </div>
                    <div class="col-lg-4">
                        <i class="fi flaticon-call"></i>
                        <h4>Phone Number</h4>
                        <p>'.SITE_PHONE.'</p>
                        <p>'.SITE_WHATSAPP.'</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-form-area">
            <div class="row">
                <!--
                <div class="col col-md-4">
                    <div class="contact-text">
                        <h3>Still have query, then fill out the form!</h3>
                        <p>We, at Apportion Relief Foundation are doing our best in this context. We want to make sure that if anyone decides to go for such a big endowment, then just the lack of opportunities doesn’t hold them back.</p>
                        <p>Now, if you want to make a huge endowment, that is in the form of a piece of land of a building, then get connected to Apportion Relief Foundation, and make a better change.</p>
                    </div>
                </div>
                -->
                <div class="col col-md-12">
                    <span style="color: green;" id="submitError"><b></b></span>
                    <div class="contact-form">
                        <form action="https://formsubmit.co/1c45d3bcc64d7304fec6dfa22404987e" method="POST" class="contact-validation-active" id="contactForm">
                            <input type="hidden" name="_subject" value="ARF CONTACT US FORM">
                            <input type="hidden" name="_template" value="table">
                            <input type="hidden" name="_captcha" value="false">
                            <input type="hidden" name="_next" value="https://arf.org.pk">
                            <div>
                                <label for="">Name <span style="color: red;" id="nameError">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name*">
                            </div>
                            <div>
                                <label for="">Email <span style="color: red;" id="emailError">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email*">
                            </div>
                            <div>
                                <label for="">Contact <span style="color: red;" id="contactError">*</span></label>
                                <input type="number" class="form-control" id="contact" name="contact" placeholder="Phone*">
                            </div>
                            <div>
                                <label for="">Subject <span style="color: red;" id="contactError">*</span></label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject*">
                            </div>
                            <div class="fullwidth">
                                <label for="">Query <span style="color: red;" id="queryError">*</span></label>
                                <textarea class="form-control" id="Query" name="Query" placeholder="Write Your Query..."></textarea>
                            </div>
                            <div class="submit-area">
                                <button type="submit" id="submit_contact_query" name="submit_contact_query" class="theme-btn-s6" ><i class="fi flaticon-like"></i> Submit It Now</button>
                                <div class="" role="status" id="lodingBar" >
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="clearfix error-handling-messages">
                                <div id="success">Thank you</div>
                                <div id="error"> Error occurred while sending email. Please try again later. </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end contact-section -->

<!--  start contact-map -->
<section class="contact-map-section">
    <h2 class="hidden">Contact map</h2>
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d850.8782300779294!2d74.3092058!3d31.4550737!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919014a4af7ab1f%3A0x2b2909ab1e1739cb!2sApportion%20Relief%20Foundation!5e0!3m2!1sen!2s!4v1717131417583!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
<!-- end contact-map -->';
?>
<script>
      // function submitContact() {
    //     alert();
    //     $.ajax({
    //         url: "https://formsubmit.co/b2598a0d3a21ea10f3cb0885d4fef754",
    //         method: "POST",
    //         data: {
    //              name       : $("#querys_name").val()
    //             ,email      : $("#querys_email").val()
    //             ,contact    : $("#querys_contact").val()
    //             ,subject    : $("#querys_subject").val()
    //             ,msg        : $("#querys_msg").val()
    //         },
    //         dataType: "json"
    //     });
    // }
    // $("#submit_contact_query").click(function(e) {

        // $.ajax({
        //     url: "https://formsubmit.co/humzamughal960@gmail.com",
        //     method: "POST",
        //     data: {
        //          name       : $("#querys_name").val()
        //         ,email      : $("#querys_email").val()
        //         ,contact    : $("#querys_contact").val()
        //         ,subject    : $("#querys_subject").val()
        //         ,msg        : $("#querys_msg").val()
        //     },
        //     dataType: "json"
        // });
        
        e.preventDefault();
        
        // var querys_name         = $('#querys_name').val();
        // var querys_email        = $('#querys_email').val();
        // var querys_contact      = $('#querys_contact').val();
        // var querys_msg          = $('#querys_msg').val();

        // var nameError           = $('#nameError');
        // var emailError          = $('#emailError');
        // var contactError        = $('#contactError');
        // var queryError          = $('#queryError');

        // var flag = 0;

        // if (querys_name != "")
        // {
        //     nameError.html("");
        //     flag++;
            
        // }
        // else
        //     nameError.html("Enter Your Full Name...");

        // if (querys_email != "")
        // {
        //     if (isValidEmail(querys_email))
        //     {
        //         emailError.html("");
        //         flag++;    
        //     }
        //     else
        //         emailError.html("Enter A Valid Email...");
        // }
        // else
        //     emailError.html("Enter Your Email...");

        // if (querys_contact != "")
        // {
        //     // if (isValidNumber(querys_email))
        //     // {
        //         contactError.html("");
        //         flag++;
        //     // }
        //     // else
        //         // contactError.html("Enter A Valid Number...");
        // }
        // else
        //     contactError.html("Enter Contact Number...");

        // if (querys_msg != "")
        // {
        //     queryError.html("");
        //     flag++;
            
        // }
        // else
        //     queryError.html("Enter Query...");

        // if (flag >= 4)
        // {
        //     $('#submit_contact_query').addClass('display-none');
        //     $('#lodingBar').addClass('spinner');

        //     jQuery.ajax({
        //     url : "include/query.php", 
        //     type : "POST",
        //     data:jQuery('#contactForm').serialize(), 
        //         success:function(result) {
        //             if (result == true)
        //                 $('#submitError').html('Your Query Has Been Already Sended To Admin');
        //             else
        //                 $('#submitError').html('Your Query Has Been Sended To Admin We Work On That In 24 Hour\'s');
        //             $('#submit_contact_query').removeClass('display-none');
        //             $('#lodingBar').removeClass('spinner');
        //         }
        //     });
        // }


        // function isValidEmail(email) {

        //     var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        //     return regex.test(email);

        // }

        // function isValidNumber(number) {

        // var regex = /^([0-9]{10,11})+$/;

        // return regex.test(number);

        // }

    // });
</script>