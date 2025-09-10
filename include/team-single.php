<!-- start page-title -->
<section class="page-title">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Team single</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>Team single</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
    </div>
</section>
<!-- end page-title -->
<?php
$sqllms  = $dblms->querylms("
                            SELECT 
                                `team_id`, 
                                `team_name`
                            FROM 
                                ".TEAMS." 
                            WHERE 
                                    `team_status`   = '1'
                                AND 
                                    `is_deleted`    = '0'
                            ORDER BY `team_id` DESC
                            ");
?>
<!-- start team-sigle-section -->
<section class="team-sigle-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <div class="team-single-sidebar">
                    <div class="widget attorney-widget">
                        <h3>Our Attorneys</h3>
                        <ul>
                            <?php
                            while($value_team = mysqli_fetch_array($sqllms)) 
                            {
                                if ($value_team['team_id'] == $zone)
                                    echo '<li class="current"><a href="'.SITE_URL.'team-single/'.$value_team['team_id'].'">'.$value_team["team_name"].'</a></li>';
                                else
                                    echo '<li><a href="'.SITE_URL.'team-single/'.$value_team['team_id'].'">'.$value_team["team_name"].'</a></li>';
                            }                            
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
$sqllms  = mysqli_fetch_array($dblms->querylms("
                                                SELECT 
                                                    `team_id`, 
                                                    `team_img`, 
                                                    `team_name`, 
                                                    `team_designation`, 
                                                    `team_fb`,
                                                    `team_twitter`,
                                                    `team_linkedin`,
                                                    `team_insta`
                                                FROM 
                                                    ".TEAMS." 
                                                WHERE 
                                                        `team_status`   = '1'
                                                    AND 
                                                        `is_deleted`    = '0'
                                                    AND
                                                        `team_id`   = '".$zone."'
                                                ORDER BY `team_id` DESC
                                                "));
?>
            <div class="col col-md-8">
                <div class="attorney-single-content">
                    <div class="attorney">
                        <div class="row">  
                            <div class="img-holder col col-md-6">
                                <img src="<?= SITE_URL ?>admin/images/team/<?= $sqllms['team_img']; ?>" alt>
                            </div>
                            <div class="attorney-single-info col col-md-6">
                                <div class="info">
                                    <h3><?= $sqllms['team_name']; ?></h3>
                                    <span><?= $sqllms['team_designation']; ?></span>
                                    <ul>
                                        <li><i class="ti-mobile"></i><span>Phone: </span>658-85851-8747</li>
                                        <li><i class="ti-email"></i><span>Email: </span>demo@hotmail.com</li>
                                        <li><i class="ti-timer"></i><span>Experience: </span>11 Years</li>
                                        <li><i class="ti-location-pin"></i><span>Address: </span>35 jain deow street, bang dreen home</li>
                                    </ul>
                                </div>
                                <div class="social">
                                    <ul>
                                        <li><a href="<?= $sqllms['team_fb']; ?>"><i class="ti-facebook"></i></a></li>
                                        <li><a href="<?= $sqllms['team_twitter']; ?>"><i class="ti-twitter-alt"></i></a></li>
                                        <li><a href="<?= $sqllms['team_linkedin']; ?>"><i class="ti-linkedin"></i></a></li>
                                        <li><a href="<?= $sqllms['team_insta']; ?>"><i class="ti-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="attorney-details">
                        <h2>About Me</h2>
                        <p>Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather</p>
                        <h2>Experience</h2>
                        <p>Above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                        <h2>Education</h2>
                        <p>Above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa</p>
                        <h2>Achievements</h2>
                        <ul>
                            <li>- Best volunteer award 2017</li>
                            <li>- Volunteer award 2017</li>
                            <li>- It showed a lady fitted</li>
                            <li>- With a fur hat in USA</li>
                        </ul>
                        <h2>Skills</h2>
                        <div class="skills">
                            <div class="skill">
                                <h6>Volunteer about</h6>
                                <div class="progress">
                                    <div class="progress-bar" data-percent="85"></div>
                                </div>
                            </div>
                            <div class="skill">
                                <h6>Dedicated bang</h6>
                                <div class="progress">
                                    <div class="progress-bar" data-percent="95"></div>
                                </div>
                            </div>
                            <div class="skill">
                                <h6>Donation collection</h6>
                                <div class="progress">
                                    <div class="progress-bar" data-percent="92"></div>
                                </div>
                            </div>
                            <div class="skill">
                                <h6>Others</h6>
                                <div class="progress">
                                    <div class="progress-bar" data-percent="95"></div>
                                </div>
                            </div>
                        </div>   
                        <h2>Contact Me</h2>
                        <div class="contact-form">
                            <form method="post">
                                <div>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name*">
                                </div>
                                <div>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                                </div>
                                <div class="fullwidth">
                                    <textarea class="form-control" name="note"  id="note" placeholder="Case Description..."></textarea>
                                </div>
                                <div class="submit-area">
                                    <button type="submit" class="theme-btn-s8">Submit It Now</button>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end team-sigle-section -->