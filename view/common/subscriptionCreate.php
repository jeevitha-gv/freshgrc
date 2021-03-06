<?php 
//require_once __DIR__.'/../header.php';
  require __DIR__.'/../../php/risk/riskManager.php';
//$amount=$_POST['TOTAL']*100;
//$manager=new UserManager();
//$userDetails=$manager->getUserNameById($_SESSION['user_id']);
//error_log("amount total".print_r($userDetails,true)); 
$firstname=$_POST['firstname'];
$email=$_POST['email'];
$plan=$_POST['plan_name'];
$manager=new RiskManager();
$planDetails=$manager->getPlan($plan);
$companyDetails=$manager->getCompanyDetails($email);
error_log("plan details".print_r($companyDetails[0]['id'],true));


?>
<!DOCTYPE html>
<html>
    <head lang="en">
      <meta charset="UTF-8">

      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Fresh GRC Admin</title>
      <base href="/freshgrc/">

      <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
      <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
      <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>    
      <link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.4/jquery-ui.css" />      
        <!-- <script src="metronic/theme/assets/global/plugins/jquery.min.js" type="text/javascript"></script> --><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!-- Bootstrap core CSS -->
      <link href="assets/DataTables/Bootstrap-3.3.6/css/bootstrap.css" rel="stylesheet">
      <link href="assets/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
      <link href="assets/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
      <link href="assets/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
      <link href="assets/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
      <link href="assets/img/favicon.png" rel="icon" type="image/png">
      <link href="assets/img/favicon.ico" rel="shortcut icon">


        <link rel="stylesheet" href="assets/css/lib/font-awesome/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/main.css">
      <link rel="stylesheet" href="assets/css/custom.css">
      <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
      <script type="text/javascript" src="js/common/stripeManagement.js"></script>


  </head>
<body class="with-side-menu-compact">

      <?php 
          include '../siteHeader.php';
          $currentMenu = 'auditorAdmin';
          include '../common/leftMenu.php';
      ?>
<style>
    .payment-container{
      max-width: 400px;
      max-height: 200px;
      border-radius: 10px !important;
      margin: auto;
      background: url(/freshgrc/assets/images/paymentbg.jpg)no-repeat;
      background-size: cover;
      color: #000;
      padding: 20px;
      font-weight: bold;
      -webkit-box-shadow: 0 8px 6px -6px #888;
     -moz-box-shadow: 0 8px 6px -6px #888;
      box-shadow: 0 8px 6px -6px #888;
    }
    .payment-header span{
      font-weight: 400;
      font-size: 36px;
      float: left;
    }
    .payment-header img{
      width: 100px;
      float: right;
      padding-top: 10px;
    }
    .payment-container input{
      background: transparent;
      border: none;
      outline: none;
      width: 100%;
      color: #000;
      padding-left: 5px;
      border-radius: 0px !important;
    }
    label{
      font-weight: 400;
      margin: 3px 0;
      font-size: 11px;
    }
    .payment-errors{
      color: red;
      padding: 10px;
      display: block;
      text-align: center;
    }
  </style>
  <body class="">
  <form name="payment" id="payment-form" style="margin-top: 200px;">
  	<h3 class="text-center">Welcome to freshgrc <?php echo $firstname ?>.Please Enter Your details for <?php echo $planDetails[0]['stripe_plan_id'] ?> plan</h3>
    <h3 class="text-center">Credit-Card Details</h3>
    <h3 class="text-center">Pay <?php echo $planDetails[0]['amount']/100 ?>$</h3>
    <input type="hidden" id="plan" value="<?php echo $planDetails[0]['stripe_plan_id'] ?>">
    <input type="hidden" id="email" value="<?php echo $email ?>">
    <input type="hidden" id="company" value="<?php echo $companyDetails[0]['id'] ?>">
    <input type="hidden" id="planId" value="<?php echo $planDetails[0]['id'] ?>">
    <span class="payment-errors"></span>
    <div class="payment-container" >
      <div class="payment-header">
        <!-- <span>100$</span> -->
        <img src="assets/img/logo.png">
      </div>
      <div class="row">

        <div class="col-md-12">
          <label for="cardnumber">Card Number</label>
          <input type="number" id="number" placeholder="1111-1111-1111-1111"  data-stripe="number" pattern="[0-9]" maxlength="16" inputmode="numeric" max="9999999999999999" min="1111111111111111">
        </div>
     <!--  </div>
      <div class="row">  -->
        <div class="col-md-12">
          <label>Expiration(MM/YY)</label>
        </div>
     <!--  </div>
      <div class="row"> -->
      <div id="date">
        <div class="col-md-4 col-sm-4 col-xs-4">
          <input type="number" placeholder="mm" maxlength="2" max="12" min="1" data-stripe="exp_month">
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
          <input type="number" placeholder="yy" maxlength="2" data-stripe="exp_year" min="18" max="99">
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4">
          <input type="number" placeholder="ccv" maxlength="4" data-stripe="cvc" min="001" max="9999">
        </div>
        </div>
     <!--  </div>
      <div class="row"> -->
        <!-- <div class="col-md-6">
          <label>Billing Zip Code</label>
          <input type="number" placeholder="zip code" id="zipcode" size="6" data-stripe="address_zip">
        </div> -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <button class="btn btn-primary" style="margin-top: 30px;" onclick="creaditCardDetails()">Submit</button>
      </div>
    </div>
  </form>

  
  </body>
<script>
  
  /*response_from_stripe = Stripe::Customer.create(email: @user.email, description: "Created from freshgrc", source: @stripe_token, plan: "full_package", quantity: users_quantity)*/  
</script>
  </body>
  </html>
