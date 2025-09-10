<?php
if (!empty($control) && $control == "packages"){
    echo'
    <section class="page-title">
        <div class="page-title-container">
            <div class="page-title-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <h2>Packages</h2>
                            <ol class="breadcrumb">
                                <li><a href="'.SITE_URL.'">Home</a></li>
                                <li>Packages</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';
}
$sqllms = $dblms->querylms("SELECT pc_id, pc_title, pc_href, pc_image, pc_amount
                                FROM ".PACKAGES_CAUSES."
                                WHERE pc_status = '1' 
                                AND is_deleted  = '0'    
                                AND id_type     = '1'
                                AND is_deleted  = '0'
                                ORDER BY pc_id DESC
                            ");

echo'
<section class="events-section target-area section-padding '.((!empty($control) && $control == "packages") ? 'events-pg-section' : '').'">
    <div class="container">
        <div class="row">
            <div class="col col-md-5">
                <div class="section-title">
                    <span>#Packages</span>
                    <h2><span>Fundraising </span></h2>
                </div>
                <div class="about-details">
                    <p>Empowering society, reducing dependency & improving lives</p>
                    <p>We sincerely hope to be in touch with you in the days to come, and if you would like to help anytime in the future, you are most warmly welcome.</p>
                    <p>Together we are making a difference! Your continued support of our mission is deeply gratifying to us, and we hope it is the same for you. We were honored to see that you have trusted us with your donations. Your gift has already been routed to the specific cause you gave it for.</p>
                </div>
            </div>
            <div class="col col-md-7">
                <div class="events-slider-holder">
                    <div class="events-slider">';
                        while ($value_manage_event = mysqli_fetch_array($sqllms)) {
                            echo'
                            <div class="events-slider-item">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="'.ADMIN_URL.'uploads/images/packages_causes/'.$value_manage_event['pc_image'].'" width="100%" alt>
                                    </div>
                                    <div class="details">
                                        <div class="inner">
                                            <!--<h3><a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">'.$value_manage_event['pc_title'].'</a></h3>-->
                                            <h3><a href="'.SITE_URL.'package-detail/'.$value_manage_event['pc_href'].'">'.$value_manage_event['pc_title'].'</a></h3>
                                            <p>Rs. '.$value_manage_event['pc_amount'].'.00 That Is The Packeage Ammount</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';                        
                        }
                        echo'
                    </div>
                    <div class="events-slider-nav">
                        <div class="events-slider-arrows">
                            <div class="slider-prev"><i class="fi flaticon-back"></i></div>
                            <div class="slider-next"><i class="fi flaticon-next"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
?>