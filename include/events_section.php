<?php
$sql = $dblms->querylms("SELECT *
                            FROM ".EVENTS." 
                            WHERE event_status  = '1' 
                            AND is_deleted      = '0' 
                            ORDER BY RAND() LIMIT 3 
                        ");
if (mysqli_num_rows($sqllms) > 1){   
    echo'
    <section class="blog-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="section-title-s2">
                        <span>#Upcoming</span>
                        <h2>News  <span>& Events</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="blog-grids">';
                        while ($data = mysqli_fetch_assoc($sql)) {
                            echo'
                            <div class="grid">
                                <div class="entry-media">                                
                                    <img src="'.ADMIN_URL.'uploads/images/events/thumbnails/'.$data['event_thumbnail'].'" alt>
                                </div>
                                <div class="entry-details">
                                    <h3><a href="'.SITE_URL.'event-detail/'.$data['event_href'].'">'.$data['event_short_title'].'</a></h3>
                                    <p class="date">'.date("Y M d",strtotime($data['event_start_date'])).' - '.date("Y M d",strtotime($data['event_end_date'])).'</p>
                                </div>
                            </div> ';
                        }
                        echo'
                    </div>
                </div>
            </div>
        </div>
    </section>';
}
?>