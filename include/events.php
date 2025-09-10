<?php
echo'
<section class="page-title">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Events</h2>
                        <ol class="breadcrumb">
                            <li><a href="'.SITE_URL.'">Home</a></li>
                            <li>Events</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-pg-section section-padding">
    <div class="container">
        <div class="section-title-s2">
            <span>#Events</span>
            <h2><span>Events</span></h2>
        </div>
        <div class="row">
            <div class="col col-md-12">
                <div class="blog-content">
                    <div class="row">';
                        $total = mysqli_num_rows($dblms->querylms("
                                SELECT 
                                    `event_id` 
                                FROM ".EVENTS." 
                                WHERE 
                                    `event_status` = '1'  
                                    AND 
                                    `is_deleted` = '0' 
                                ORDER BY event_id DESC
                        "));
                        $total_temp = $total;
                        $Limit = 6;
                        $start = ($current_page-1) * $Limit;
                        $prev = $current_page - 1;
                        $next = $current_page + 1;
                        $sql = $dblms->querylms("
                                SELECT *
                                FROM ".EVENTS." 
                                WHERE `event_status` = '1' 
                                AND is_deleted = '0'
                                ORDER BY event_id DESC LIMIT $start, $Limit
                        ");
                        while ($data = mysqli_fetch_assoc($sql)){
                            echo'
                            <div class="col col-md-4">
                                <div class="post format-standard-image">
                                    <div class="entry-media">
                                        <img src="'.ADMIN_URL.'uploads/images/events/thumbnails/'.$data['event_thumbnail'].'" alt>
                                    </div>
                                    <div class="entry-details">
                                        <div class="date">'.date("d M Y",strtotime($data['event_start_date'])).' - '.date("d M Y",strtotime($data['event_end_date'])).'</div>
                                        <br>
                                        <h3><a href="'.SITE_URL.'event-detail/'.$data['event_href'].'">'.$data['event_short_title'].'</a></h3>
                                        <div class="line-clamp" style="margin-bottom: 1rem;">'.html_entity_decode(html_entity_decode($data['event_description'])).'</div>
                                        <a href="'.SITE_URL.'event-detail/'.$data['event_href'].'" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </div> ';
                        }
                        echo'
                    </div>
                </div>';
                if ($Limit<$total){
                    echo'
                    <div class="pagination-wrapper pagination-wrapper-left">
                        <ul class="pg-pagination">
                            <li>';
                            if ($current_page > 1) {
                                echo'
                                <a href="'.SITE_URL.'events/page/'.$prev.'" aria-label="Previous">
                                    <i class="fi flaticon-back"></i>
                                </a> ';
                            }
                            echo'
                            </li>';
                            $sr = 1;
                            while ($total_temp > 0) {
                                echo '<li class="';if($sr==$current_page) {echo "active";}echo '"><a href="'.SITE_URL.'events/page/'.$sr.'/">'.$sr.'</a></li>';
                                $sr++;
                                $total_temp -= $Limit;
                            }
                            echo'
                            <li>';
                            if ($current_page < --$sr) {
                                echo '
                                <a href="'.SITE_URL.'events/page/'.$next.'" aria-label="Next">
                                    <i class="fi flaticon-next"></i>
                                </a>
                                ';
                            }
                            echo'
                            </li>
                        </ul>
                    </div>';
                }
                echo'
            </div>
        </div>
    </div>
</section>';
?>