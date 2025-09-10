<?php
// Cause
$sqllms  = mysqli_fetch_array($dblms->querylms("SELECT pc.pc_id, pc.pc_title, pc.pc_href, pc.pc_description, pc.pc_amount, pc.pc_image, pc.pc_start_date, pc.pc_end_date,
                                                    DATEDIFF(pc.pc_end_date, pc.pc_start_date) AS days_left,
                                                    IFNULL(SUM(d.amount), 0) AS raised_amount,
                                                    COUNT(d.id) AS no_of_donations
                                                    FROM ".PACKAGES_CAUSES." pc
                                                    LEFT JOIN ".DONATIONS." d ON (d.id_pc_subcat = pc.pc_id AND d.id_type = 2)
                                                    WHERE pc.is_deleted  = '0' 
                                                    AND pc.pc_status     = '1'
                                                    AND pc.id_type       = '2'
                                                    GROUP BY pc.pc_id 
                                                    ORDER BY IFNULL(SUM(d.amount), 0) DESC, pc.pc_amount DESC LIMIT 1;
                                                ")
                                );
if ($sqllms['pc_title'] != ""){
echo'
<section class="target-area section-padding" id="about">
    <div class="container">
        <div class="row">
            <div class="col col-md-5">
                <div class="img-holder">
                    <img src="'.ADMIN_URL.'uploads/images/packages_causes/'.$sqllms['pc_image'].'" width="100%" height="auto">
                </div>
            </div>
            <div class="col col-md-7">
                <div class="target-content">
                    <div class="section-title">
                        <span>#Target Project</span>
                        <a href="'.SITE_URL.'project-detail/'.$sqllms['pc_href'].'">
                            <h2>'.strip_tags(html_entity_decode(html_entity_decode($sqllms['pc_title']))).'!</h2>
                        </a>
                    </div>
                    <div class="content">
                        <p>'.getWordsFromStr(html_entity_decode($sqllms['pc_description']), 0, 50 ).'...</p>
                        <div class="goal-raised">
                            <div>
                                <span>Duration </span>
                                <h4><span>Start:</span> '.date('d F, Y' , strtotime($sqllms['pc_start_date'])).'</h4>
                                <h4><span>End:</span>  '.date('d F, Y' , strtotime($sqllms['pc_end_date'])).'</h4>
                            </div>
                            <div>
                                <span>Donation goal </span>
                                <h3>Rs. '.$sqllms['pc_amount'].'</h3>
                            </div>
                            <div>
                                <span>Raised </span>
                                <h3>Rs. '.$sqllms['raised_amount'].'</h3>
                            </div>
                        </div>
                        <button class="theme-btn-s3" onclick="showAjaxModalZoom(\'include/donation/donation_form.php?id='.$sqllms['pc_id'].'&type=2\');"><i class="fi flaticon-like"></i> Donate Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
}else{
    echo '<section class="section-padding"></section>';
}
?>