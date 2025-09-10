<?php
$condition = array ( 
                     'select'       => 't.full_name, t.profile_image, d.des_name'
                    ,'join'         => 'INNER JOIN '.DESIGNATIONS.' d ON d.des_id = t.id_des'
                    ,'where' 	    =>  [
                                             't.is_deleted' =>  0
                                            ,'t.status'     =>  1
                                        ]
                    ,'order_by'     => 't.ordering ASC'
                    ,'return_type'  => 'all' 
                   ); 
$TEAM_MEMBERS = $dblms->getRows(TEAM_MEMBERS.' t', $condition);
echo'
<section class="page-title">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Team</h2>
                        <ol class="breadcrumb">
                            <li><a href="'.SITE_URL.'">Home</a></li>
                            <li>Team</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="team-section section-padding">
    <div class="content-area text-center">
        <div class="section-title">
            <span>#Team</span>
            <h2>Our Team Members</h2>
        </div>
        <br>
        <div class="container">
            <div class="row">';	
				$sjs= 0;
                foreach ($TEAM_MEMBERS as $key => $val){ 
					$sjs++;
                    echo'
                    <div class="col-md-4">
                        <div class="grid" style="margin-bottom: 3rem;">
                            <div class="img-holder">
                                <img src="'.ADMIN_URL.'uploads/images/team_members/'.$val['profile_image'].'" style="border-radius: 50%; width: 250px; height: 250px;">
                            </div>
                            <div class="member-info">
                                <h4>'.$val['full_name'].'</h4>
                                <p>'.$val['des_name'].'</p>
                            </div>
                        </div>
                    </div>';
					if($sjs == 3) {
						echo '<div style="clear:both;"></div>';
						$sjs = 0;
					}
                }
                echo'
            </div>
        </div>
    </div>
</section>';