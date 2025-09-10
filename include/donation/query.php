<?php
if(isset($_POST['fullname'])){
    include "../../dbsetting/classdbconection.php";
    include "../../dbsetting/lms_vars_config.php";
    $dblms = new dblms();
    include "../../functions/functions.php";

    $sqllms  = $dblms->querylms("INSERT INTO ".DONATIONS." (
                                                              status
                                                            , id_type
                                                            , id_pc_subcat
                                                            , dated
                                                            , fullname
                                                            , cnic
                                                            , phone
                                                            , email
                                                            , amount
                                                            , date_added
                                                        )
                                                        VALUES(
                                                              '1'
                                                            , '".$_POST['id_type']."'
                                                            , '".$_POST['id_pc_subcat']."'
                                                            , '".date('Y-m-d')."'
                                                            , '".$_POST['fullname']."'
                                                            , '".$_POST['cnic']."'
                                                            , '".$_POST['phone']."'
                                                            , '".$_POST['email']."'
                                                            , '".$_POST['amount']."'
                                                            , '".date('Y-m-d H:i:s')."'
                                                        )
                                ");
    if($sqllms){
        // return true;
        echo '1';
    }else{
        // return false;
        echo '0';
    }
}

elseif(isset($_POST['submit_donation'])){
    $sqllms  = $dblms->querylms("INSERT INTO ".DONATIONS." (
                                                              status
                                                            , id_type
                                                            , id_pc_subcat
                                                            , dated
                                                            , fullname
                                                            , cnic
                                                            , phone
                                                            , email
                                                            , amount
                                                            , date_added
                                                        )
                                                        VALUES(
                                                              '1'
                                                            , '3'
                                                            , '".$_POST['id_pc_subcat']."'
                                                            , '".date('Y-m-d')."'
                                                            , '".$_POST['full_name']."'
                                                            , '".$_POST['cnic']."'
                                                            , '".$_POST['phone']."'
                                                            , '".$_POST['email']."'
                                                            , '".$_POST['amount']."'
                                                            , '".date('Y-m-d H:i:s')."'
                                                        )
                                ");
    if($sqllms){
      $_SESSION['msg']['title'] 	= 'Successfully';
      $_SESSION['msg']['text'] 	= 'Record Successfully Added.';
      $_SESSION['msg']['type'] 	= 'success';
      header("Location: donation", true, 301);
      exit();
    }else{
      $_SESSION['msg']['title'] 	= 'Warning';
      $_SESSION['msg']['text'] 	= 'Record Not Added.';
      $_SESSION['msg']['type'] 	= 'error';
      header("Location: donation", true, 301);
      exit();
    }
}
?>