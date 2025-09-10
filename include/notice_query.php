<?php
echo '<pre>';
print_r($_POST['flag']);
if (isset($_POST['flag']))
{

    include "../dbsetting/classdbconection.php";

    include "../dbsetting/lms_vars_config.php";

    $dblms = new dblms();

    include "../functions/functions.php";

    $sqllms = mysqli_fetch_array($dblms->querylms(
        "
        SELECT 
            `announcement_title`,
            `announcement_msg`
        FROM 
            ".ANNOUNCEMENT."
        WHERE
            `announcement_status` = '1'
        ORDER BY `announcement_id` DESC LIMIT 1
        "
    ));

    echo 
    '
    <div class="modal" style="display: block; padding-top: 10%;" id="staticBackdrop">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="staticBackdropLabel">
                        '.$sqllms['announcement_title'].'
                    </h5>
                </div>
                <div class="modal-body">
                    '.$sqllms['announcement_msg'].'
                </div>
                <div class="modal-footer">
                    <button type="button" id="notice_close" class="btn btn-warning">Understood</button>
                </div>
            </div>
        </div>
    </div>
    ';

}
?>