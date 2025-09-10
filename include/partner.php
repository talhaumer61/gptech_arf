<?php
// $sqllms = $dblms->querylms("
//                                 SELECT 
//                                     `org_image` 
//                                 FROM ".ORGANIZATIONS." 
//                                 WHERE 
//                                     `org_status` =  '1' 
//                                     AND 
//                                     `is_deleted` = '0' 
//                             ");
// if (mysqli_num_rows($sqllms) > 0){
echo'
<section class="partner-section">
    <h2 class="hidden">Partners</h2>
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="partners-slider">';
                    // while ($valOrg = mysqli_fetch_array($sqllms)){
                    //     echo'
                    //     <div>
                    //         <img src="'.ADMIN_URL.'uploads/images/organizations/'.$valOrg['org_image'].'" width="150px">
                    //     </div>';
                    // }
                    echo'
                </div>
            </div>
        </div>
    </div>
</section>';
// }
?>