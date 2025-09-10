<?php
if($control == 'project-detail'){
    $title = 'Project';
    $link = 'projects';
    $type = '2';
    $sql = "AND pc.id_type = '2'";
}elseif($control == 'package-detail'){
    $title = 'Package';
    $link = 'packages';
    $type = '1';
    $sql = "AND pc.id_type = '1'";
}
echo'
<section class="page-title">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>'.ucwords(str_replace('-', ' ', $zone)).'</h2>
                        <ol class="breadcrumb">
                            <li><a href="'.SITE_URL.'">Home</a></li>
                            <li><a href="'.SITE_URL.''.$link.'">'.ucwords($link).'</a></li>
                            <li>'.ucwords(str_replace('-', ' ', $zone)).'</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
$sqlCause  = mysqli_fetch_array($dblms->querylms("SELECT pc.*, o.org_name, o.org_email, o.org_phone,
                                                    IFNULL(SUM(d.amount), 0) AS raised_amount,
                                                    COUNT(d.id) AS no_of_donations
                                                    FROM ".PACKAGES_CAUSES." pc
                                                    INNER JOIN ".ORGANIZATIONS." o ON o.org_id = pc.id_org
                                                    LEFT JOIN ".DONATIONS." d ON (d.id_pc_subcat = pc.pc_id AND d.id_type = 2)
                                                    WHERE pc.pc_status  = '1' 
                                                    AND pc.pc_href      = '$zone'  
                                                    AND pc.is_deleted   = '0'
                                                    GROUP BY pc.pc_id 
                                                    ORDER BY pc.pc_id DESC
                                                ")
                            );
$donation = $sqlCause['raised_amount'];
$pcen = ($donation / $sqlCause['pc_amount']) * 100;
echo'
<section class="case-single-section section-padding">
    <div class="container">
        <div class="section-title-s2">
            <span>#'.$title.'s</span>
            <h2>'.$title.'  <span>Detail</span></h2>
        </div>
        <div class="row">
            <div class="col col-lg-6 col-md-6">
                <div class="img-holder big-img">
                    <img src="'.ADMIN_URL.'uploads/images/packages_causes/'.$sqlCause['pc_image'].'" class="img-fluid" width="100%" alt>
                </div>
            </div>
            <div class="col col-lg-6 col-md-6">
                <div class="case-info-area">
                    <h3>'.$sqlCause['pc_title'].'
                        <div style="font-size: 1rem; margin-top: 1rem;"> Organization: '.$sqlCause['org_name'].'</div>
                        <div style="font-size: 1rem; margin-top: 1rem;"> Email: '.$sqlCause['org_email'].'</div>
                        <div style="font-size: 1rem; margin-top: 1rem;"> Phone: '.$sqlCause['org_phone'].'</div>
                    </h3>
                    <br>
                    <div class="goal-raised">';
                        if($sqlCause['id_duration_type'] != '0'){
                            echo'<div> Duration: <span style="font-size: 0.9375rem !important;"><u>'.$sqlCause['pc_duration'].' '.get_DurationTypes($sqlCause['id_duration_type']).'</u></span></div>';
                        }else{
                            echo'
                            <div> From: <span style="font-size: 0.9375rem !important;"><u>'.date('d M, Y',strtotime($sqlCause['pc_start_date'])).'</u></span></div>
                            <div> To: <span style="font-size: 0.9375rem !important;"><u>'.date('d M, Y',strtotime($sqlCause['pc_end_date'])).'</u></span></div>';
                        }
                        echo'
                    </div>
                    <div class="goal-raised">
                        '.($control=='cause-detail' ? '<div>Raised: <span>Rs.'.$donation.'<span></div>' : '').'
                        <div>Goal: <span>Rs.'.$sqlCause['pc_amount'].'<span></div>
                    </div>';
                    if ($control == 'cause-detail') {
                        echo'
                        <div class="progress">
                            <div class="progress-bar" data-percent="'.intval($pcen).'"></div>
                        </div>';
                    }else{
                        echo'<br><br>';
                    }
                    echo'
                </div>
                <div class="donate-area-wrapper">
                    <fieldset class="give-donation-submit">
                        <div class="give-submit-button-wrap give-clearfix">
                            <button class="theme-btn-s3" onclick="showAjaxModalZoom(\''.SITE_URL.'include/donation/donation_form.php?id='.$sqlCause['pc_id'].'&type='.$type.'\');"><i class="fi flaticon-like"></i> Donate Now</button>
                            <span class="give-loading-animation"></span>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row donate-area-bottom">
            <div class="col col-md-8">
                <div class="case-info-area">
                    <div class="donate-area-wrapper">
                        <ul id="give-donation-level-button-wrap" class="give-donation-levels-wrap give-list-inline">
                            <li>';
                                $array = explode (",", $sqlCause['pc_meta_keywords']);
                                foreach ($array as $key => $value){
                                    echo' <button type="button" data-price-id="'.$key.'" class="give-donation-level-btn give-btn give-btn-level-0 give-default-level">'.$value.'</button>';
                                }
                                echo'
                            </li>
                        </ul>
                    </div>
                    <br>
                    <h3>Description:</h3>
                    <div>'.html_entity_decode(html_entity_decode($sqlCause['pc_description'])).'</div>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="case-single-sidebar">
                    <div class="widget contact-widget">
                        <div>
                            <p>Our phone number:</p>
                            <h4>'.SITE_PHONE.'</h4>
                        </div>
                        <div>
                            <p>Our email address:</p>
                            <h4>'.SITE_EMAIL.'</h4>
                        </div>
                    </div>
                    <div class="widget urgent-case-widget">
                        <div class="cases">';
                            $sqllms  = $dblms->querylms("SELECT pc.pc_id, pc.pc_title, pc.pc_href, pc.pc_image, pc.pc_amount, pc.pc_description,
                                                            IFNULL(SUM(d.amount), 0) AS raised_amount,
                                                            COUNT(d.id) AS no_of_donations
                                                            FROM ".PACKAGES_CAUSES." pc
                                                            LEFT JOIN ".DONATIONS." d ON (d.id_pc_subcat = pc.pc_id AND d.id_type = 2)
                                                            WHERE pc.pc_status = '1' 
                                                            AND pc.is_deleted  = '0'
                                                            $sql
                                                            AND pc.pc_id != '".cleanvars($sqlCause['pc_id'])."'
                                                            GROUP BY pc.pc_id
                                                            ORDER BY RAND() LIMIT 5
                                                        ");
                            while($value_causes = mysqli_fetch_array($sqllms)){
                            echo'
                            <div class="case">
                                <div class="img-holder">
                                    <img src="'. ADMIN_URL.'uploads/images/packages_causes/'.$value_causes['pc_image'].'" alt="">
                                </div>
                                <div class="details">
                                    <h4>
                                        <a href="'.SITE_URL.''.$control.'/'.$value_causes['pc_href'].'">
                                            '.$value_causes['pc_title'].'
                                        </a>
                                    </h4>
                                    <h4><span>Goal: Rs.'.$value_causes['pc_amount'].' '.($control=='cause-detail' ? 'Raised: Rs.'.$value_causes['raised_amount'].'' : '').'</span></h4>';
                                    if($sqlCause['id_duration_type'] != '0'){
                                        echo'<h4> Duration: <span><u>'.$sqlCause['pc_duration'].' '.get_DurationTypes($sqlCause['id_duration_type']).'</u></span></h4>';
                                    }else{
                                        echo'
                                        <h4>
                                            <span><u>'.date('d/m/Y',strtotime($sqlCause['pc_start_date'])).'</u></span>
                                             to <span><u>'.date('d/m/Y',strtotime($sqlCause['pc_start_date'])).'</u></span>
                                        </h4>';
                                    }
                                    echo'
                                </div>
                            </div>';
                            }
                            echo'
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
?>
