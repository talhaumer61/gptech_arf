<?php
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
                            <li><a href="'.SITE_URL.'events">Events</a></li>
                            <li>'.ucwords(str_replace('-', ' ', $zone)).'</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
if (empty($zone)) {
    header("location: ".SITE_URL);
}
$query = $dblms->querylms("SELECT e.*
                            FROM ".EVENTS." e
                            WHERE event_href = '".cleanvars($zone)."'");
$data = mysqli_fetch_array($query);

$sqlquery = $dblms->querylms("SELECT event_photo
                            FROM ".EVENT_PHOTOS."
                            WHERE id_event = '".cleanvars($data['event_id'])."'");
echo'
<section class="blog-single-section blog-pg-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-10 col-md-offset-1">
                <div class="blog-content">
                    <div class="post format-standard-image">
                        <div class="entry-media">';
                            if(mysqli_num_rows($sqlquery) > 0){
                                echo'
                                <section class="hero-slider hero-style-3">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">';
                                            while($dataPhoto = mysqli_fetch_array($sqlquery)) {
                                                echo'
                                                <div class="swiper-slide">
                                                    <div class="slide-inner slide-bg-image" data-background="'.ADMIN_URL.'uploads/images/events/'. $dataPhoto['event_photo'].'">
                                                    </div>
                                                </div>';
                                            }
                                            echo'
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="pagi-arrow">
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                    </div>
                                </section>';
                            } else {
                                echo'<img src="'.ADMIN_URL.'uploads/images/events/thumbnails/'.$data['event_thumbnail'].'"/>';
                            }
                            echo'
                        </div>
                        <div class="entry-details">
                            <div class="date">'.date("d M Y",strtotime($data['event_start_date'])).' - '.date("d M Y",strtotime($data['event_end_date'])).'</div>
                        </div>
                        <h3>'.$data['event_short_title'].'</h3>
                        <h4>'.$data['event_brief_title'].'</h4>
                        <div>'.html_entity_decode(html_entity_decode($data['event_description'])).'</div>';
                        if(!empty($data['event_youtube_link'])){
                            echo'
                            <br>
                            <iframe 
                                width="100%"
                                height="400"
                                src="https://www.youtube.com/embed/'.$data['event_youtube_link'].'" 
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen>
                            </iframe>';
                        }
                        echo'
                    </div>
                </div>                        
            </div>
        </div>
    </div>
</section>';
?>