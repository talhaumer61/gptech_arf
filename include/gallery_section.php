<?php
$sqllms  = $dblms->querylms("
                                SELECT 
                                    `gal_image_video`, 
                                    `gal_href`
                                FROM ".GALLERY." 
                                WHERE 
                                    `gal_status` = '1'  
                                    AND 
                                    `id_file_type` = '1' 
                                    AND 
                                    `is_deleted` = '0'
                                ORDER BY RAND() LIMIT 10");
if (mysqli_num_rows($sqllms) > 0){   
    if ($control != "cart"){                                         
        echo'
        <section class="instagram-section">
            <h2 class="hidden">Instagran</h2>
            <div class="instagram-grids">';
                while ($value_insta = mysqli_fetch_array($sqllms)){
                echo'
                <div class="grid">
                    <a>
                        <div class="ll" style="background-image: url('.ADMIN_URL.'uploads/images/gallery/'.$value_insta['gal_image_video'].');"> </div>
                    </a>
                </div>';
                }
                echo'
            </div>
        </section>';
    }
}
?>