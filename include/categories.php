<?php
echo'
<style>
#line-clamp {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
#line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
<section class="page-title section-padding">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">';
                        if (isset($zone) && !empty($zone)){
                            echo'
                            <h2>'.ucwords(str_replace('-', ' ', $zone)).'</h2>
                            <ol class="breadcrumb">
                                <li><a href="'.SITE_URL.'">Home</a></li>
                                <li><a href="'.SITE_URL.'projects">Projects</a></li>
                                <li>'.ucwords(str_replace('-', ' ', $zone)).'</li>
                            </ol>';
                        } else {
                            echo'
                            <h2>
                                Projects
                            </h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="'.SITE_URL.'"> Home</a>
                                </li>
                                <li> Projects</li>
                            </ol>';
                        }
                        echo'
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding">
<section class="mission-vision-section">
    <div class="container">';
        if (isset($zone) && !empty($zone)){
            // cat
            $sqllms  = $dblms->querylms("SELECT cat_id, cat_name, cat_image, cat_description
                                            FROM ".CATEGORIES."
                                            WHERE cat_href    = '".cleanvars($zone)."'
                                            AND cat_status    = '1'
                                            AND is_deleted    = '0'
                                            LIMIT 1");
            $valCat = mysqli_fetch_array($sqllms);

            // sub cat
            $sqllms  = $dblms->querylms("SELECT sc.subcat_id, sc.subcat_name, sc.subcat_image,sc.subcat_icon, sc.subcat_description
                                            FROM ".SUB_CATEGORIES." sc
                                            WHERE sc.is_deleted     = '0'
                                            AND sc.subcat_status    = '1'
                                            AND sc.id_cat           = '".$valCat['cat_id']."'
                                            ORDER BY sc.subcat_id DESC
                                        ");
            echo'
            <div class="row">
                <div class="col col-xs-12">
                    <h4>'.$valCat['cat_name'].'</h4>
                    <div class="section-details">
                        '.html_entity_decode(html_entity_decode($valCat['cat_description'])).'
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="'.SITE_URL.'gallery" class="theme-btn-s7"><i class="fi flaticon-like"></i>Gallery</a>
                        <a href="'.SITE_URL.'events" class="theme-btn-s7"><i class="fi flaticon-like"></i>Events</a>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="mission-vision-grids clearfix">';
                        while ($valSubCat = mysqli_fetch_array($sqllms)) {
                            echo'
                            <a onclick="showAjaxModalZoom(\''.SITE_URL.'include/donation/donation_form.php?id='.$valSubCat['subcat_id'].'&type=3\');">
                                <div class="grid">
                                    <div class="overlay"></div>
                                    <center>
                                        <img class="pb-5" src="'.ADMIN_URL.'uploads/images/donation/subcategories/icons/'.$valSubCat['subcat_icon'].'" alt="">
                                    </center>
                                    <br>
                                    <center>
                                        <h3 id="line-clamp-1">'.html_entity_decode(html_entity_decode($valSubCat['subcat_name'])).'</h3>
                                        <p id="line-clamp">'.html_entity_decode(html_entity_decode($valSubCat['subcat_description'])).'</p>
                                        <a onclick="showAjaxModalZoom(\''.SITE_URL.'include/donation/donation_form.php?id='.$valSubCat['subcat_id'].'&type=3\');" class="theme-btn-s2 cursor-pointer" >Donate Now</i></a> 
                                    </center>
                                </div>
                            </a>';
                        }
                        echo'
                    </div>
                </div>
            </div>';
        } else {
            $sqllms  = $dblms->querylms("SELECT c.cat_id, c.cat_name, c.cat_href, c.cat_icon, c.cat_description, sc.id_cat
                                            FROM ".CATEGORIES." c
                                            LEFT JOIN ".SUB_CATEGORIES." sc ON c.cat_id = sc.id_cat 
                                            WHERE c.cat_status  = '1'
                                            AND c.is_deleted    = '0'
                                            GROUP BY c.cat_id
                                            ORDER BY cat_id DESC
                                        ");
            echo'
            <div class="section-title-s2">
                <span>#Projects</span>    
                <h2>Popular<span> Projects</span></h2>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="mission-vision-grids clearfix">';
                        while ($category_value = mysqli_fetch_array($sqllms)) {
                            if (!empty($category_value['id_cat'])){
                                echo'<a href="'.SITE_URL.'categories/'. $category_value['cat_href'].'">';
                            }
                            echo'
                            <div class="grid">
                                <div class="overlay"></div>
                                <center>
                                    <img class="pb-5" src="'.ADMIN_URL.'uploads/images/donation/categories/icons/'.$category_value['cat_icon'].'" alt="">
                                </center>
                                <br>
                                <center>
                                    <h3 id="line-clamp-1">'.html_entity_decode(html_entity_decode($category_value['cat_name'])).'</h3>
                                    <p id="line-clamp">'.html_entity_decode(html_entity_decode($category_value['cat_description'])).'</p>
                                    <a href="'.SITE_URL.'categories/'.$category_value['cat_href'].'" class="theme-btn-s2" >Read More</i></a> 
                                </center>
                            </div>';
                            if (!empty($category_value['id_cat'])) {
                            echo'
                        </a>';
                    }
                }
        }
        echo'
        </div>
            </div>
        </div>
    </div> 
</section>  
</section>
</section>';
?>