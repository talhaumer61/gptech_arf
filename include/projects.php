<?php
if (isset($zone) && !empty($zone)){
    $sqlzone = "AND pc.id_cat = $zone";
}else{
    $sqlzone = '';
}
$sqllms  = $dblms->querylms("SELECT pc.pc_id, pc.pc_title, pc.pc_href, pc.pc_image, pc.pc_amount, pc.pc_description,
                                IFNULL(SUM(d.amount), 0) AS raised_amount,
                                COUNT(d.id) AS no_of_donations
                                FROM ".PACKAGES_CAUSES." pc
                                LEFT JOIN ".DONATIONS." d ON (d.id_pc_subcat = pc.pc_id AND d.id_type = 2)
                                WHERE pc.pc_status = '1'
                                AND pc.is_deleted  = '0'    
                                AND pc.id_type     = '2'
                                $sqlzone
                                GROUP BY pc.pc_id 
                                ORDER BY pc.pc_id DESC
                            ");
echo'
<section class="causes-section section-padding">
    <!--
    <div class="container-fluid">
        <div class="section-title-s2">
            <span>#Projects</span>
            <h2>Popular  <span>Projects</span></h2>
        </div>
        <div class="content-area causes-slider">';
            while($value_causes = mysqli_fetch_array($sqllms)) {
                $donation = $value_causes['raised_amount'];
                $pcen = ($donation / $value_causes['pc_amount']) * 100;
                echo'
                <div class="item">
                    <div class="inner">
                        <div class="img-holder">
                            <img src="'.ADMIN_URL.'uploads/images/packages_causes/'.$value_causes['pc_image'].'">
                        </div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <div class="progress">
                                    <div class="progress-bar" data-percent="'.intval($pcen).'"></div>
                                </div>
                                <h3>
                                    <a href="'.SITE_URL.'project-detail/'.$value_causes['pc_href'].'">
                                        '.$value_causes['pc_title'].'
                                    </a>
                                </h3>
                                <div class="goal-raised">
                                    <span>Rs. '.$value_causes['pc_amount'].'</span>
                                    <span style="margin-left:1rem;">
                                        <a href="'.SITE_URL.'project-detail/'.$value_causes['pc_href'].'" class="donate-btn"><i class="fi flaticon-heart-1"></i>Donate</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            echo'
        </div>
    </div>
    -->
</section>';
?>