<?php
if(isset($_POST['submit_my_donations'])){
    $sqllms = $dblms->querylms("SELECT id, fullname, dated, amount, cnic
                                FROM ".DONATIONS." WHERE cnic = '".$_POST['cnic']."' 
                                ORDER BY dated DESC
                            ");
}
echo'
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

<style>
@keyframes spinner {
  to {transform: rotate(360deg);}
}

.spinner:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 80%;
  left: 3%;
  width: 50px;
  height: 50px;
  margin-top: -10px;
  margin-left: -10px;
  border-radius: 50%;
  border: 5px solid #c01f1b;
  border-top-color: #fff;
  animation: spinner .6s linear infinite;
}
.display-none{
  animation-duration: 1s;
  opacity: 0;
    
}
</style>
<section class="page-title">
    <div class="page-title-container">
        <div class="page-title-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>My Donations</h2>
                        <ol class="breadcrumb">
                            <li><a href="'.SITE_URL.'">Home</a></li>
                            <li>My Donations</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="section-title-s3">
                    <span>#My Donation</span>
                    <h2>Donate to change lives!</h2>
                    <p>'.SITE_BIO.'</p>
                </div>
            </div>
        </div>

        <div class="contact-form-area">
            <div class="row">
                <div class="col col-md-12">
                    <span style="color: green;" id="submitError"><b></b></span>
                    <div class="contact-form">
                        <form method="POST" actions style="display:flex; flex-direction:column; align-items:center;">
                            <div class="form-group col">
                                <label for="cnic" style="width:100%; text-align:center; font-size:16px;">CNIC</label>
                                <input type="text" class="form-control" name="cnic" placeholder="12345-1234567-1" id="cnic" required>
                            </div>
                            <div class="submit-area" style="display:flex; justify-content:center;">
                                <button type="submit" id="submit_my_donations" name="submit_my_donations" class="theme-btn-s6" ><i class="fi flaticon-like"></i> Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    if(isset($_POST['submit_my_donations'])){
    if (mysqli_num_rows($sqllms) > 0) {
    echo '
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col col-md-12">
                <div class="section-title-s3">
                    <span>#My Donations Details</span>
                    <h2>Your Donations Details</h2>
                </div>
                <div class="contact-form-area">
                    <div class="row">
                        <div class="col col-md-12">
                            <div class="contact-form">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">CNIC</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount (PKR)</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        $counter = 1;
                                        while ($donation = mysqli_fetch_assoc($sqllms)) {
                                            echo '
                                                <tr>
                                                    <th scope="row">'.$counter++.'</th>
                                                    <td>'.$donation['fullname'].'</td>
                                                    <td>'.$donation['cnic'].'</td>
                                                    <td>'.$donation['dated'].'</td>
                                                    <td>'.$donation['amount'].'</td>
                                                </tr>';
                                        }

                                        echo '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    } else {
        echo '<h1 class="text-center text-danger p-3 rounded">No donations found!</h1>';
    }
}
    echo'
</section>';
?>