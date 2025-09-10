<?php
include "../dbsetting/lms_vars_config.php";
include "../dbsetting/classdbconection.php";
$dblms = new dblms();
include "../functions/functions.php";

if (isset($_POST['submit_cart']))
{
    if (isset($_SESSION['cart_box']))
    {
        foreach($_SESSION['cart_box'] as $key => $value)
        {
            $sqllms_1  = $dblms->querylms(
            "
                INSERT INTO `".PAYMENT."`
                (
                    `payment_status`, 
                    `payment_mail`, 
                    `payment_name`, 
                    `payment_card_number`, 
                    `payment_date_expiry`, 
                    `payment_card_cvv`, 
                    `payment_total_ammount`, 
                    `payment_case_key`
                ) 
                VALUES 
                (
                    '1',
                    '".cleanvars($_POST['card_mail'])."',
                    '".cleanvars($_POST['card_holder'])."',
                    '".cleanvars($_POST['card_number'])."',
                    '".cleanvars($_POST['card_exp'])."',
                    '".cleanvars($_POST['card_cvv'])."',
                    '".cleanvars($value['case_id'])."',
                    '".cleanvars($value['give_amount'])."'
                )
            "
            );

            $sqllms = mysqli_fetch_array($dblms->querylms(
            "
                SELECT `causes_raised`
                FROM `".CAUSES."`
                WHERE `causes_id` = '".cleanvars($value['case_id'])."'
            "
            ));

            $tmp_ammount = 0;
            $tmp_ammount = $value['give_amount'] + $sqllms['causes_raised'];

            $sqllms  = $dblms->querylms(
            "
                UPDATE `".CAUSES."` SET
                    `causes_raised` = '$tmp_ammount'
                WHERE 
                    `causes_id` = '".cleanvars($value['case_id'])."';
            "
            );
        }
        if ($sqllms)
        {
            $_SESSION['msg']['status'] = 'toastr.success("Donation Will Sended");';   
            unset($_SESSION['cart_box']);
            header("Location: ../cart", true, 301);
		    exit();    
        }
        else
        {
            $_SESSION['msg']['status'] = 'toastr.warnig("Donation Will Not Sended");';   
            header("Location: ../cart", true, 301);
            exit();
        }
    }
    else
    {
        $_SESSION['msg']['status'] = 'toastr.success("Cart Not To Be Empty");';   
        header("Location: ../cart", true, 301);
		exit();
    }
}
?>