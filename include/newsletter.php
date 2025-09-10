<?php
if (isset($_POST['submit_newsletter']))
{
    $date = date("Y-m-d");
    $sqllms = $dblms->querylms(
        "
        INSERT INTO ".NEWSLETTER." 
        (
            `status`, 
            `email`, 
            `date`
        ) VALUES 
        (
            '1', 
            '".$_POST['news_email']."', 
            '".$date."' 
        )
        "
    );
    if ($sqllms)
    {
        $_SESSION['msg']['status'] = 'toastr.success("Your Newsletter has been sended");';
        header("location: index");
        exit();
    }
}
?>