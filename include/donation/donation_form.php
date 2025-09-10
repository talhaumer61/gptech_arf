<?php
include "../../dbsetting/classdbconection.php";
include "../../dbsetting/lms_vars_config.php";
$dblms = new dblms();
include "../../functions/functions.php";

$Fields = array(
    "fullname"  =>  array(      "title" => "Full Name",         "type" => "text",   "placeholder" => "Name",                "req_text" => '<span class="text text-danger"> * </span>',      "is_required" => "required",    "error_msg" => "error_1",   "col" => "col-md-12"  ),
    "cnic"      =>  array(      "title" => "CNIC",              "type" => "text",   "placeholder" => "12345-1234567-1",     "req_text" => '',      "is_required" => "",    "error_msg" => "error_2",   "col" => "col-md-6"  ),
    "phone"     =>  array(      "title" => "Phone Number",      "type" => "text",   "placeholder" => "0300-0000000",        "req_text" => '<span class="text text-danger"> * </span>',      "is_required" => "required",    "error_msg" => "error_3",   "col" => "col-md-6"  ),
    "email"     =>  array(      "title" => "Email Address",     "type" => "text",   "placeholder" => "abc@gmail.com",       "req_text" => '<span class="text text-danger"> * </span>',      "is_required" => "required",    "error_msg" => "error_4",   "col" => "col-md-6"  ),
    "amount"    =>  array(      "title" => "Donation (Rs.)",    "type" => "text",   "placeholder" => "",                    "req_text" => '<span class="text text-danger"> * </span>',      "is_required" => "required",    "error_msg" => "error_5",   "col" => "col-md-6"  )
);
echo'
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"><i class="glyphicon glyphicon-gift"></i> Donate Now</h5>
        </div>
        <div class="modal-body" id="transfer_modal_1">
            <form method="POST" id="donationForm">
                <input type="hidden" name="id_type" id="id_type" value="'.$_GET['type'].'">
                <div class="row">';
                    foreach ($Fields as $key => $value) {
                        echo'
                        <div class="form-group '.$value['col'].'">
                            <label>'.$value['title'].' '.$value['req_text'].'</label>
                            <input type="'.$value['type'].'" class="form-control" id="'.$key.'" name="'.$key.'" placeholder="'.$value['placeholder'].'" '.$value['is_required'].'>
                            <span class="text text-danger" id="'.$value['error_msg'].'"></span>
                        </div>';
                    }
                    echo'
                </div>';
                if($_GET['type']==3 && !isset($_GET['id'])){
                    echo'
                    <div class="form-group">
                        <label>Purpose <span class="text-danger" id="error_6">*</span></label>
                        <select class="form-control" name="id_pc_subcat" id="id_pc_subcat">
                            <option value=""> -- Select -- </option>';
                            $sqllms  = $dblms->querylms("SELECT subcat_id, subcat_name
                                                            FROM ".SUB_CATEGORIES." 
                                                            WHERE subcat_status = '1'
                                                            AND is_deleted      = '0'
                                                            ORDER BY id_cat DESC
                                                        ");
                            while ($valSubCat = mysqli_fetch_array($sqllms)){
                                echo '<option value="'.$valSubCat['subcat_id'].'">'.$valSubCat['subcat_name'].'</option>';
                            }
                            echo'
                        </select>
                    </div>';
                }else{
                    echo' <input type="hidden" name="id_pc_subcat" id="id_pc_subcat" value="'.$_GET['id'].'">';
                }
                echo'
            </form>
        </div>
        <div class="modal-body display_none" id="transfer_modal_2">
            <div class="form-group">
                <p class="text-success" id="success_msg"></p>
                <p>';
                    $DonationSteps = get_DonationSteps();
                    foreach ($DonationSteps as $key => $value):
                        echo'
                        <span class="text-danger" id="error_6">'.$key.':</span> '.$value.'
                        <br>';
                    endforeach;
                    echo'
                </p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger" name="submit_donation" id="submit_donation">Donate</button>
        </div>
    </div>
</div>
<style>
label{
    font-weight: 600;
    font-size: 14px;
}
.msg_danger{
    border: 1px solid red;
}
.display_none{
    display: none;
}
</style>
<script>
$(document).ready(function() {
    $("#submit_donation").click(function(e) {
        
        e.preventDefault();
        
        var fullname        = $("#fullname");
        var cnic            = $("#cnic");
        var phone           = $("#phone");
        var email           = $("#email");
        var amount          = $("#amount");
        var id_type         = $("#id_type");
        var id_pc_subcat    = $("#id_pc_subcat");

        var error_1              = $("#error_1");
        var error_2              = $("#error_2");
        var error_3              = $("#error_3");
        var error_4              = $("#error_4");
        var error_5              = $("#error_5");
        var error_6              = $("#error_6");

        var success_msg          = $("#success_msg");
        var transfer_msg         = $("#transfer_msg");

        var transfer_modal_1     = $("#transfer_modal_1");
        var transfer_modal_2     = $("#transfer_modal_2");

        var submit_donation      = $("#submit_donation");

        var flag = 0;

        if (fullname.val() != "") {
            fullname.removeClass("msg_danger");
            flag++;
        } else {
            fullname.addClass("msg_danger");
        }
            
        if (cnic.val() != "") {
            if (validateCNIC(cnic.val())) {
                cnic.removeClass("msg_danger");
                flag++;    
            } else {
                cnic.addClass("msg_danger");
            }
        } else {
            cnic.addClass("msg_danger");
        }

        if (phone.val() != "") {
            if (validatePHONE(phone.val())) {
                phone.removeClass("msg_danger");
                flag++;    
            } else {
                phone.addClass("msg_danger");
            }
        } else {
            phone.addClass("msg_danger");
        }

        if (email.val() != "") {
            if (isValidEmail(email.val())) {
                email.removeClass("msg_danger");
                flag++;    
            } else {
                email.addClass("msg_danger");
            }
        } else {
            email.addClass("msg_danger");
        }

        if (amount.val() != "") {
            if (isValidNumber(amount.val())) {
                amount.removeClass("msg_danger");
                flag++;    
            } else {
                amount.addClass("msg_danger");
            }
        } else {
            amount.addClass("msg_danger");
        }

        if (id_pc_subcat.val() != "") {
            id_pc_subcat.removeClass("msg_danger");
            flag++;
        } else {
            id_pc_subcat.addClass("msg_danger");
        }

        if (flag >= 6) {
            $("#submit_donation").addClass("display-none");
            $("#submit_donation").addClass("spinner");

            jQuery.ajax({
            url : "'.SITE_URL.'include/donation/query.php",
            type : "POST",
            data:jQuery("#donationForm").serialize(),
                success:function(result) {
                    console.log(result);
                    if (result == "1") {
                        success_msg.html("Donation Record Has Been Added Now Transfer Funds From Mobile App");
                        transfer_modal_1.addClass("display_none");
                        transfer_modal_2.removeClass("display_none");
                        submit_donation.addClass("display_none");
                    }
                }
            });
        }

        function isValidEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        
        function isValidNumber(number) {
            var regex = /^([0-9+])+$/;
            return regex.test(number);
        }

        function validateCNIC(cnic) {
            var regex = /^[0-9+]{5}-[0-9+]{7}-[0-9]{1}$/; // CNIC format: 12345-1234567-1
            return regex.test(cnic);
        }

        function validatePHONE(phone) {
            var regex = /^[0-9+]{4}-[0-9+]{7}$/; // Phone format: 0300-0000000
            return regex.test(phone);
        }
    });
});
</script>';
?>