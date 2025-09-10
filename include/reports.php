<?php
echo'
<section class="page-title">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>'.moduleName($control).'</h2>
                        <ol class="breadcrumb">
                            <li><a href="'.SITE_URL.'">Home</a></li>
                            <li>'.moduleName($control).'</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
if($control == 'reports'){
    $type = '1';
} else if($control == 'downloads'){
    $type = '2';
}
$condition = array ( 
                    'select' 	=> "id, status, type, file",
                    'where' 	=> array( 
                                        'is_deleted' => 0 ,
                                        'status' => 1 ,
                                        'type' => $type ,
                                    ), 
                    'order_by' 		=> 'id ASC',
                    'return_type' 	=> 'all' 
                   ); 
$REPORTS_DOWNLOADS = $dblms->getRows(REPORTS_DOWNLOADS, $condition);
echo'
<section class="team-section section-padding">
    <div class="content-area">
        <div class="section-title text-center">
            <span>#downloadable</span>
            <h2>'.moduleName($control).'</h2>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <table class="table table-bordered table-responsive table-striped table-bordered shadow">
                    <thead>
                        <tr>
                            <th width="50" class="text-center">Sr.</th>
                            <th>Type</th>
                            <th>File</th>
                            <th width="100" class="text-center">Status</th>
                            <th width="100" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                        foreach ($REPORTS_DOWNLOADS as $key => $row) {
                            echo'
                            <tr>
                                <td class="text-center">'.($key+1).'</td>
                                <td>'.get_report_type($row['type']).'</td>
                                <td>'.$row['file'].'</td>
                                <td class="text-center">'.get_status($row['status']).'</td>
                                <td class="text-center">
                                    <a class="btn btn-danger btn-xs" href="'.ADMIN_URL.'uploads/files/reports/'.$row['file'].'" target="_blank"><i class="fas fa-download"></i></a>
                                </td>
                            </tr>';
                        }
                        echo'
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>';
?>