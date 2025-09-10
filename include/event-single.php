<?php
echo'
<section class="page-title">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Event single</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Event single</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
if (!empty(substr($_SERVER['REQUEST_URI'], 47))){
    $event_id = substr($_SERVER['REQUEST_URI'], 48);
    $sqllms  = mysqli_fetch_array($dblms->querylms("SELECT `event_manage_picture`, `event_manage_title`, `event_manage_msg`, `event_manage_start`, `event_manage_end`, `event_manage_adr`, `event_manage_org`, `event_manage_mail`
                            FROM ".EVENT_A." 
                            WHERE `event_manage_status` = '1' AND `event_manage_id` = '$event_id'
                            ORDER BY `event_manage_id` DESC"));
}else{
    header("location: index.php");
}
echo'
<section class="event-single-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-10 col-lg-offset-1">
                <div class="row">
                    <div class="col col-md-9">
                        <div class="event-single-img">
                            <img src="admin/images/event/'.$sqllms['event_manage_picture'].'" alt>
                        </div>
                    </div>
                    <div class="col col-md-3">
                        <div class="event-info">
                            <h3>Event info</h3>
                            <ul>
                                <li>
                                    <i class="fi flaticon-alarm"></i>
                                    <h5>Start time</h5>
                                    <p>'.$sqllms['event_manage_start'].'</p>
                                </li>
                                <li>
                                    <i class="fi flaticon-guarantee"></i>
                                    <h5>End Time</h5>
                                    <p>'.$sqllms['event_manage_end'].'</p>
                                </li>
                                <li>
                                    <i class="fi flaticon-down-arrow-3"></i>
                                    <h5>Address</h5>
                                    <p>'.$sqllms['event_manage_adr'].'</p>
                                </li>
                                <li>
                                    <i class="fi flaticon-like"></i>
                                    <h5>Organization</h5>
                                    <p>'.$sqllms['event_manage_org'].'</p>
                                </li>
                                <li>
                                    <i class="fi flaticon-envelope"></i>
                                    <h5>Contact</h5>
                                    <p>'.$sqllms['event_manage_mail'].'</p>
                                </li>
                            </ul>
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col col-lg-12">
                        <div class="event-text">
                            <h2>'.$sqllms['event_manage_title'].'</h2>
                            <p>'.$sqllms['event_manage_msg'].'</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
?>