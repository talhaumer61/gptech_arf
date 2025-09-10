<?php
echo'
<section class="page-title">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>FAQs</h2>
                        <ol class="breadcrumb">
                            <li><a href="'.SITE_URL.'">Home</a></li>
                            <li>FAQs</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
$sql = $dblms->querylms("
                            SELECT 
                                `faq_id`, 
                                `faq_question`, 
                                `faq_answer` 
                            FROM ".FAQS." 
                            WHERE 
                                `faq_status` = '1' 
                                AND 
                                `is_deleted` = '0' 
                            ORDER BY faq_id ASC"
                        );
echo'
<section class="faq-pg-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="section-title-s3">
                    <div class="icon">
                        <i class="fi flaticon-suitcase"></i>
                    </div>
                    <span>FAQs</span>
                    <h2>Frequently Asked Question</h2>
                    <p>Mostly people ask us these question about domation and other charity.</p>
                </div>
            </div>
        </div>                        
        <div class="row">
            <div class="col col-xs-12">
                <div class="panel-group faq-accordion theme-accordion-s1" id="accordion">';
                    $flag = 0;
                    while ($value_faq = mysqli_fetch_array($sql)) {
                        $flag++;
                        echo'
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a '.($flag==1 ? '' : 'class="collapsed"').' data-toggle="collapse" data-parent="#accordion" href="#collapse-'.$value_faq['faq_id'].'" '.($flag==1 ? 'aria-expanded="true"' : '').'>'.$value_faq['faq_question'].'</a>
                            </div>
                            <div id="collapse-'.$value_faq['faq_id'].'" class="panel-collapse collapse '.($flag==1 ? 'in' : '').'">
                                <div class="panel-body">
                                    <p>'.$value_faq['faq_answer'].'</p>
                                </div>
                            </div>
                        </div>';
                    }
                    echo'
                </div>
            </div>
        </div>    
    </div>
</section>';
?>