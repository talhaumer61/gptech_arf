<?php 
$cart_count = (isset($_SESSION['cart_box']))?count($_SESSION['cart_box']):0;
if (!empty($control))
{
?>
<style>
section {
    background-image: url("admin/images/slider/bg.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: white;
}

.cart{
    background-color: #fff;
    padding: 4vh 5vh;
    border-radius: 1rem;
    margin-left: 10%;
    margin-right: 1%;
    width: 50%;
}
.summary{
    background-color: #ddd;
    padding: 4vh;
    color: rgb(65, 65, 65);
    border-radius: 1rem;
    width: 25%;
    margin-left: 1%;
    margin-right: 10%;
}
.title b{
    font-size: 1.5rem;
}
.main{
    margin: 0;
    padding: 2vh 0;
    width: 100%;
}
.col-2, .col{
    padding: 0 1vh;
}
.text-muted{
    color: #000;
}
input{
    border: 0;
    outline: none;
    width:100%;
}
</style>
<section class="target-area section-padding" id="about" >
    <div class="" style="margin: 5%;">
        <div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Donation Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted"><?php echo $cart_count; ?> items</div>
                        </div>
                    </div>    
                    <div class="row border-top border-bottom">
                        <hr>
                        <?php
                        if ($total != 0)
                        {
                            foreach ($_SESSION['cart_box'] as $key => $value)
                            {
                        ?>
                        <div class="row main align-items-center">
                            <div class="col-md-2">
                                <img class="img-fluid" src="admin/images/causes/<?php echo $value['causes_picture']; ?>">
                            </div>
                            <div class="col-md-6">
                                <h2 class="row text-muted"><?php echo $value['causes_title']; ?></h2>
                            </div>
                            <div class="col-md-2">
                                <label for="" class="text-muted">Changable</label>
                                <h2 class="row text-muted"><input type="text" name="ammount_from_cart" value="$<?php echo $value['give_amount']; ?>"></h2>
                            </div>
                            <div class="col-md-1">
                                <form action="<?php echo SITE_URL;?>cart" method="POST">
                                    <input type="hidden" value="<?php echo $value['case_id'];?>" name="case_id">
                                    <h2 class="row text-muted"><button type="submit" name="remove_items" class="theme-btn-s6">DELETE</button></h2>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <?php
                            }
                        }
                        if ($total == 0)
                        {
                        ?>
                        <div class="row main align-items-center">
                            <div class="col-md-12" style="color: #000;"><center><h1>No Item In Cart</h1></center></div>
                        </div>
                        <hr>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="back-to-shop"><a href="index.php">&leftarrow;</a><span class="text-muted">Back to Home</span></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS <?php echo $cart_count; ?></div>
                        <div class="col text-right">$<?php echo $total; ?>.00</div>
                    </div>
                    <form action="include/payment.php" method="POST">
                        <br>
                        <label for="">Card Holder Mail<span style="color: red;">*</span></label>
                        <input type="email" class="form-control" name="card_mail" placeholder="Card Holder Mail*" required>
                        <br>
                        <label for="">Card Holder name<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="card_holder" placeholder="Card Holder name*" required>
                        <br>
                        <label for="">Card Number<span style="color: red;">*</span></label>
                        <input type="number" class="form-control" name="card_number" placeholder="Card Number*" required>
                        <div class="row">
                            <div class="col col-md-6">
                            <br>
                            <label for="">Card Date Expiry<span style="color: red;">*</span></label>
                                <input type="number" class="form-control" name="card_exp" placeholder="Card Number*" required>
                            </div>
                            <div class="col col-md-6">
                            <br>
                            <label for="">Card CVV<span style="color: red;">*</span></label>
                                <input type="number" class="form-control" name="card_cvv" placeholder="Card Number*" required>
                            </div>
                        </div>
                    
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <br>
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">$<?php echo $total; ?>.00</div>
                        <!-- <input type="hidden" name="total_donation" value="<?php echo $total; ?>"> -->
                    </div>
                    <?php 
                    if ($total != 0)
                    {
                    ?>
                        <button type="submit" name="submit_cart" class="theme-btn-s6"> Check Out </button>
                    <?php
                    }
                    ?>
                    </form>
                </div>
            </div>
            
        </div>
    </div> <!-- end container -->
</section>
<?php
}
?>