<?php
echo'
<section class="page-title">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Gallery</h2>
                        <ol class="breadcrumb">
                            <li><a href="'.SITE_URL.'">Home</a></li>
                            <li>Gallery</li>
                            '.(!empty($zone) ? '<li>'.moduleName($zone).'</li>' : '').'
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';

if(!empty($zone)){
    $sqllms  = $dblms->querylms("SELECT gp.*
                                    FROM ".GALLERY_PHOTOS." gp
                                    INNER JOIN ".GALLERY." g ON g.gal_id = gp.id_gal AND g.gal_href = '".$zone."'
                                    WHERE gp.photo_status   = '1'
                                    AND gp.is_deleted       = '0'
                                    ORDER BY gp.id ASC");
    echo'
    <section class="team-section section-padding">
        <div class="content-area text-center">
            <div class="section-title">
                <span>#Gallery</span>
                <h2>Picture for <span>'.moduleName($zone).'</span></h2>
            </div>
            <br>
            <div class="container">
                <div class="row">';
                    while ($valGal = mysqli_fetch_array($sqllms)){
                        echo'
                        <div class="col-md-4" style="margin-bottom: 1rem;">
                            <div class="grid" style="border: 1px solid #f2f2f2;">
                                <div class="img-holder">
                                    <img src="'.ADMIN_URL.'uploads/images/gallery/'.$valGal['gal_photo'].'" width="100%">
                                </div>
                            </div>
                        </div>';
                    }
                    echo'
                </div>
            </div>
        </div>
    </section>';

} else {
    $sqllms  = $dblms->querylms("SELECT g.gal_image_video, g.gal_title, g.gal_href, g.id_place, ds.place_address
                                    FROM ".GALLERY." g
                                    INNER JOIN ".DISTRIBUTION_PLACES." ds ON ds.place_id = g.id_place
                                    WHERE g.gal_status    = '1'
                                    AND g.is_deleted      = '0'
                                    ORDER BY g.gal_id DESC");
    echo'
    <section class="team-section section-padding">
        <div class="content-area text-center">
            <div class="section-title">
                <span>#Gallery</span>
                <h2>Picture <span>& Videos</span></h2>
            </div>
            <br>
            <div class="container">
                <div class="row">';
                    while ($valGal = mysqli_fetch_array($sqllms)){
                        echo'
                        <div class="col-md-4" style="margin-bottom: 1rem;">
                            <div class="grid">
                                <a href="'.SITE_URL.$control.'/'.$valGal['gal_href'].'">
                                    <div class="img-holder">
                                        <img src="'.ADMIN_URL.'uploads/images/gallery/thumbnails/'.$valGal['gal_image_video'].'" width="100%">
                                    </div>
                                    <div class="member-info">
                                        <h4>'.$valGal['gal_title'].'</h4>
                                        <p>'.$valGal['place_address'].'</p>
                                    </div>
                                </a>
                            </div>
                        </div>';
                    }
                    echo'
                </div>
            </div>
        </div>
    </section>';
}
?>