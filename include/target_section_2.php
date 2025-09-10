<?php
// package
$sqlPackage  = $dblms->querylms("SELECT *
                                FROM ".PACKAGES_CAUSES." 
                                WHERE `is_deleted`  = '0' 
                                AND `pc_status`     = '1'
                                AND `id_type`       = '1'
                                ORDER BY `pc_amount` DESC LIMIT 1
                            ");
if(mysqli_num_rows($sqlPackage) > 0){   
    $valPackage = mysqli_fetch_array($sqlPackage);
    echo'
    <section class="cta-s1-section">
        <div class="container">
            <div class="row">
                <div class="col col-lg-5 col-md-5">
                    <div class="img-holder">
                        <img src="'.ADMIN_URL.'uploads/images/packages_causes/'.$valPackage['pc_image'].'" width="100%" alt>
                    </div>
                </div>
                <div class="col col-lg-6 col-lg-offset-1 col-md-7">
                    <div class="info-col">
                        <div class="section-title">
                            <span>#Target Package</span>
                            <a href="'.SITE_URL.'cause-detail/'.$valPackage['pc_href'].'">
                                <h2>'.str_replace('<br>','',html_entity_decode(html_entity_decode($sqllms['pc_title']))).'!</h2>
                            </a>
                            <h4> Duration: <span><u>'.$valPackage['pc_duration'].' '.get_DurationTypes($valPackage['id_duration_type']).'</u></span></h4>
                            <h4> Goal: <span>Rs.'.$valPackage['pc_amount'].'</span></h4>
                        </div>

                        <div class="details">
                            <p>'.(html_entity_decode(html_entity_decode($valPackage['pc_description']))).'</p>
                            <button class="theme-btn-s3" onclick="showAjaxModalZoom(\'include/donation/donation_form.php?id='.$valPackage['pc_id'].'&type=1\');"><i class="fi flaticon-like"></i> Donate Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';
}
?>