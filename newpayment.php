
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="newpayment.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

    

   
</head>
<body>
    <div class="content py-5  bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                        <span class="anchor" id="formPayment"></span>
                        <hr class="my-5">
                        <div class="card card-outline-secondary">
                            <div class="card-body">
                                <h3 class="text-center">Bkash/Rocket Payment</h3>
                                <hr>
                                <form class="form" role="form" autocomplete="off" action="payment-check.php" method="post">
                                    <div class="form-group">
                                        <label for="cc_name">Holder's Name</label><br>
                                            <?php if (isset($_GET['hname'])) { ?>
                                                <input
                                                    type="text" class="form-control input-field" id="cc_name" pattern="\w+ \w+.*"
                                                    title="First and last name" placeholder="Enter Your full name"
                                                    required="required" maxlength="20" 
                                                    value="<?php echo $_GET['hname']; ?>">
                                                     <br>  
                                            <?php }else{ ?>
                                                    <input type="text" 
                                                            name="hname" 
                                                            placeholder="Enter Your full name"><br>
                                            <?php }?>
                                    </div>

                                    <div class="form-group">
                                        <label>Account No.</label> <br>
                                            <?php if (isset($_GET['accNo'])) { ?>
                                                <input type="text" class="form-control" autocomplete="off" maxlength="20" pattern="\d{16}" title="Credit card number" placeholder=" Enter Account number"required=""
                                                value="<?php echo $_GET['accNo']; ?>"> <br>
                                        <?php }else{ ?>
                                            <input type="text" 
                                                            name="accNo" 
                                                            placeholder="Enter Account number"><br>
                                            <?php }?>

                                    </div>
                                    <div class="form-group">
                                        <label>Pin</label>
                                        <input type="text" class="form-control" autocomplete="off" maxlength="20"  title="Credit card number" placeholder=" Enter Pin number"required="">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-6">Medicine Name</label>
                                            
                                        <div class="col-md-6">
                                            <?php if (isset($_GET['medName'])) { ?>

                                            <input type="text" class="form-control input-field" autocomplete="off" maxlength="40" pattern="\d{16}" title="Credit card number" placeholder=" Enter Medicine name"required=""
                                            value="<?php echo $_GET['medName']; ?>"> <br>
                                            <?php }else{ ?>
                                                <input type="text" 
                                                            name="medName" 
                                                            placeholder="Enter Medicine name"><br>
                                            <?php }?>

                                        </div>
                                        <label class="col-md-6">Number of medicine</label>
                                        <div class="col-md-6 mt-1">
                                        <?php if (isset($_GET['medNo'])) { ?>
                                            <select class="form-control"  name="cc_exp_yr" size="0"  value="<?php echo $_GET['medNo']; ?>"> <br>>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                            <?php }else{ ?>
                                                    <select class="form-control"  name="cc_exp_yr" size="0">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-12">Amount</label>
                                    </div>
                                    <div class="form-inline">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                            <input type="text" class="form-control text-right" id="exampleInputAmount" placeholder="39">
                                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <button type="reset" class="btn btn-default btn-lg btn-block">Cancel Payment</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success btn-lg btn-block">Confirm Payment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
</body>
</html>