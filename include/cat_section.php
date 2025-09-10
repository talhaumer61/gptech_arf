<?php
$sqllms  = $dblms->querylms("SELECT cat_id, cat_name, cat_href, cat_icon, cat_description
                                FROM ".CATEGORIES."
                                WHERE cat_status    = '1'
                                AND is_deleted      = '0'
                                LIMIT 6
                            ");
echo'
<section class="feature-section">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="feature-grids">';
                    while ($category_value = mysqli_fetch_array($sqllms)) {
                        echo'
                        <a href="'.SITE_URL.'categories/'.$category_value['cat_href'].'">
                            <div class="grid">
                                <img class="pb-5" src="'.ADMIN_URL.'uploads/images/donation/categories/icons/'.$category_value['cat_icon'].'" alt="">
                                <h5 class="line-clamp-2">'.html_entity_decode(html_entity_decode($category_value['cat_name'])).'</h5>
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