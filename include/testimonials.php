<?php
$sqllms  = $dblms->querylms("
                                SELECT 
                                    `testimonials_image`, 
                                    `testimonials_name`, 
                                    `testimonials_title`, 
                                    `testimonials_description`
                                FROM ".TESTIMONIALS."  
                                WHERE 
                                    testimonials_status = '1'
                                ORDER BY `testimonials_id` DESC");
if (mysqli_num_rows($sqllms) > 0){
    echo'
    <section class="testimoninals-funfact-section testimonials-pg-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <div class="section-title-s3">
                        <span>#Testimonials</span>
                        <h2>Client feedbacks</h2>
                        <p>Apportion Relief Foundation is working in this field as we want to leave nothing and give our all in to ensure everyone’s good. Hold our hand in these difficult times so we can hold some hands who look up to us and you! Make us your donations via our official website or mobile application.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="testimonials-slider-s2 testimonials-slider-area">';
                        while ($value_feedback = mysqli_fetch_array($sqllms)) {
                        echo'
                        <div class="grid">
                            <div class="author">
                                <div class="author-img">
                                    <img src="'.ADMIN_URL.'uploads/images/testimonials/'.$value_feedback['testimonials_image'].'">
                                </div>
                                <h5>'.$value_feedback['testimonials_name'].'</h5>
                                <span>'.$value_feedback['testimonials_title'].'</span>
                            </div>
                            <p class="line-clamp">'.html_entity_decode($value_feedback['testimonials_description']).'</p>
                        </div>';
                        }
                        echo'
                    </div>
                </div> 
            </div>
        </div>
    </section>';
}
?>