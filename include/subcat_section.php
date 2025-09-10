<?php
$sqlSubCat = $dblms->querylms("SELECT sc.subcat_id, sc.subcat_name, sc.subcat_image,sc.subcat_icon, sc.subcat_description
                                FROM ".CATEGORIES." c
                                INNER JOIN ".SUB_CATEGORIES." sc ON (
                                    sc.id_cat               = c.cat_id
                                    AND sc.subcat_status    = '1'
                                    AND sc.is_deleted       = '0'
                                    )
                                WHERE c.is_deleted    = '0'
                                ORDER BY sc.subcat_id DESC
                            ");
echo'
<section class="feature-section section-padding">
    <div class="container">
        <div class="section-title-s2">
            <span>#Donations</span>
            <h2>Popular  <span>Purposes</span></h2>
        </div>
        <div class="row">
            <div class="col col-xs-12">
                <div class="feature-grids">';
                    while ($valSubCat = mysqli_fetch_array($sqlSubCat)) {
                        echo'
                        <a onclick="showAjaxModalZoom(\''.SITE_URL.'include/donation/donation_form.php?id='.$category_value['subcat_id'].'&type=3\');">
                            <div class="grid grid-1">
                                <img class="pb-5" src="'.ADMIN_URL.'uploads/images/donation/subcategories/'.$valSubCat['subcat_image'].'" alt="">
                                <h5>'.$valSubCat['subcat_name'].'</h5>
                            </div>
                        </a>';
                    }
                    echo'
                </div>
            </div>
        </div>
    </div>
</section>';
?>