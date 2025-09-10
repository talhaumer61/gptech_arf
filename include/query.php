<?php

if (!empty($_POST['querys_email']))
{

    $sqllms = $dblms->querylms(
        "
        SELECT 
            `querys_email`
        FROM 
            ".WEB_QUERY."
        WHERE
            `querys_email` = '".$_POST['querys_email']."'
        "
    );
    if (mysqli_num_rows($sqllms) < 1)
    {
        $sqllms = $dblms->querylms(
            "
            INSERT INTO ".WEB_QUERY." 
            (
                `querys_status`,
                `querys_name`, 
                `querys_email`, 
                `querys_contact`, 
                `querys_msg`
            ) VALUES 
            (
                '1',
                '".cleanvars($_POST['querys_name'])."', 
                '".cleanvars($_POST['querys_email'])."', 
                '".cleanvars($_POST['querys_contact'])."', 
                '".cleanvars($_POST['querys_msg'])."' 
            )
            "
        );
        if ($sqllms)
            echo true;
    }
    else
        echo false;
}
?>