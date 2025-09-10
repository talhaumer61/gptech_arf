<?php
if (isset($_POST['submit_donate']))
{
    if (isset($_SESSION['cart_box']))
    {
        $myArray = array_column($_SESSION['cart_box'], "case_id");
        if (!in_array($_POST['case_id'], $myArray))
        {
            $count = count($_SESSION['cart_box']);
            $_SESSION['cart_box'][$count] = array
            (
                "causes_picture"    => $_POST['causes_picture'],
                "causes_title"      => $_POST['causes_title'],
                "case_id"           => $_POST['case_id'],
                "give_amount"       => $_POST['give_amount']
            );  
            $_SESSION['msg']['status'] = 'toastr.success("Donation Added In Cart");';
            header("location: case-single?cause_id=".$_POST['case_id']."");
            exit();
        }
        else
        {
            $_SESSION['msg']['status'] = 'toastr.warning("Donation Already In Cart");';
            header("location: case-single?cause_id=".$_POST['case_id']."");
            exit();
        }
    }
    else
    {
        $_SESSION['cart_box'][0] = array
        (
            "causes_picture"    => $_POST['causes_picture'],
            "causes_title"      => $_POST['causes_title'],
            "case_id"           => $_POST['case_id'],
            "give_amount"       => $_POST['give_amount']
        );
        $_SESSION['msg']['status'] = 'toastr.success("Donation Added In Cart");';
        header("location: case-single?cause_id=".$_POST['case_id']."");
        exit();
    }
}
if (isset($_POST['remove_items']))
{
    foreach($_SESSION['cart_box'] as $key => $value)
    {
        if($value['case_id'] == $_POST['case_id'])
        {
            unset($_SESSION['cart_box'][$key]);
            $_SESSION['cart_box'] = array_values($_SESSION['cart_box']);
            $_SESSION['msg']['status'] = 'toastr.success("Donation Remove From Cart");';
            header("Location: cart", true, 301);
            exit();
            
        }
    }
}
?>