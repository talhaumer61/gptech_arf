<?php

include "../dbsetting/classdbconection.php";
include "../dbsetting/lms_vars_config.php";
include "../functions/functions.php";
$dblms = new dblms();
if (isset($_POST['email'])){
    $email = cleanvars($_POST['email']);
    $sqllms = $dblms->querylms("SELECT email
                                    FROM ".NEWSLETTER."
                                    WHERE email = '".$email."'
                                ");
    if (mysqli_num_rows($sqllms) > 0) {
        echo'<label>You are already subscribed.</label>';
    }elseif(mysqli_num_rows($sqllms) <= 0) {
        $sqllms = $dblms->querylms("INSERT INTO ".NEWSLETTER."(
                                                                  status 
                                                                , email 
                                                                , date
                                                            )
                                                            VALUES(
                                                                  '1'
                                                                , '".$email."'
                                                                , '".currentDate()."'
                                                            )
                                        ");
        if($sqllms){
            echo'<label class="text-info">Subscribed Successfully.</label>';
        }
    }
}

?>