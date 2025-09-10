<?php
include_once ('donation/query.php');
$Fields = array(
  "full_name" =>  array(      "title" => "Full Name",         "type" => "text",     "placeholder" => "Name",                "req_text" => '<span class="text text-danger"> * </span>',      "is_required" => "required",    "error_msg" => "error_1", "class" => "",        "col" => "fullwidth"  ),
  "cnic"      =>  array(      "title" => "CNIC",              "type" => "text",     "placeholder" => "12345-1234567-1",     "req_text" => ' ',      "is_required" => "",    "error_msg" => "error_2", "class" => "cnic",    "col" => ""  ),
  "phone"     =>  array(      "title" => "Phone Number",      "type" => "text",     "placeholder" => "0300-0000000",        "req_text" => '<span class="text text-danger"> * </span>',      "is_required" => "required",    "error_msg" => "error_3", "class" => "phone",   "col" => ""  ),
  "email"     =>  array(      "title" => "Email Address",     "type" => "text",     "placeholder" => "abc@gmail.com",       "req_text" => '<span class="text text-danger"> * </span>',      "is_required" => "required",    "error_msg" => "error_4", "class" => "",        "col" => ""  ),
  "amount"    =>  array(      "title" => "Donation (Rs.)",    "type" => "number",   "placeholder" => "",                    "req_text" => '<span class="text text-danger"> * </span>',      "is_required" => "required",    "error_msg" => "error_5", "class" => "",        "col" => ""  )
);
echo'
<style>
label{
  font-weight: 600;
  font-size: 14px;
}
.msg_danger{
  border: 1px solid red;
}
.display_none{
  display: none;
}
</style>

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
                        <h2>Donations</h2>
                        <ol class="breadcrumb">
                            <li><a href="'.SITE_URL.'">Home</a></li>
                            <li>Donations</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="section-title-s3">
                    <span>#Donation</span>
                    <h2>Donate to change lives!</h2>
                    <p>Join us in our journey as we work towards a Pakistan where compassion, dignity, and opportunity are available to all. Together, we can make a difference, one life at a time.</p>
                </div>
            </div>
            <div class="col-lg-12 text-center ">
                <strong class="fw-bold" style="font-size:24px;">" مَنْ يُنفِقُ مَالَهُ فِي سَبِيلِ اللَّهِ فَيُعْطَى اللَّهُ لَهُ أَكْثَرَ مِنْهُ "</strong>
                <p style="font-size:18px;">جو شخص اپنا مال اللہ کے راستے میں خرچ کرتا ہے، اللہ اسے اس سے زیادہ بدلہ دیتا ہے۔( صحیح بخاری 5352)</p>';
                /*
                echo'
                <ul>';
                    $DonationSteps = get_DonationSteps();
                    foreach ($DonationSteps as $key => $value):
                        echo'
                        <li style="font-size: 1.3rem;"><span class="text-danger">'.$key.':</span> '.$value.'</li>';
                    endforeach;
                    echo'
                </ul>';
                */
                echo'
            </div>
        </div>

        <div class="contact-form-area">
            <div class="row">
                <div class="col col-md-12">
                    <span style="color: green;" id="submitError"><b></b></span>
                    <div class="contact-form">
                        <div id="form_message"></div>
                        <form method="POST" action="'.SITE_URL.'PayFast/index.php" class="" id="donation_form">
                            <input type="hidden" name="id_type" id="id_type" value="3">';
                            foreach ($Fields as $key => $value) {
                                echo'
                                <div>
                                    <label for="">'.$value['title'].' '.$value['req_text'].'</label>
                                    <input type="'.$value['type'].'" class="form-control '.$value['class'].'" id="'.$key.'" name="'.$key.'" placeholder="'.$value['placeholder'].'" '.$value['is_required'].'>
                                    <span class="text text-danger" id="'.$value['error_msg'].'"></span>
                                </div>';
                            }
                            echo'
                            <div class="form-group">
                                <label>Purpose <span class="text-danger" id="error_6">*</span></label>
                                <select class="form-control" name="id_pc_subcat" id="id_pc_subcat" required>
                                    <option value=""> -- Select -- </option>';
                                    $sqllms  = $dblms->querylms("SELECT subcat_id, subcat_name
                                                                    FROM ".SUB_CATEGORIES." 
                                                                    WHERE subcat_status = '1'
                                                                    AND is_deleted      = '0'
                                                                    ORDER BY id_cat DESC
                                                                ");
                                    while ($valSubCat = mysqli_fetch_array($sqllms)){
                                        echo '<option value="'.$valSubCat['subcat_id'].'">'.$valSubCat['subcat_name'].'</option>';
                                    }
                                    echo'
                                </select>
                            </div>
                            <div class="submit-area">
                                <button type="submit" id="submit_donation" name="submit_donation" class="theme-btn-s6" ><i class="fi flaticon-like"></i> Submit It Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-map-section">
  <h2 class="hidden">Contact map</h2>
  <div class="contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1701.938234355221!2d74.30114780676183!3d31.4450676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sTransit%20stations!5e0!3m2!1sen!2s!4v1680501959020!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>';
?>