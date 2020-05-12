
<?php 
session_start();
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/user/userManager.php';
require_once '../../php/common/dashboard.php';
// $companyId=$_POST['companyId'];

    // error_log("userid".print_r($companyId,true));
    $manager = new UserManager(); 
   // echo $var;
    $allUsersArray = $manager->getAllUser($userid);
    // echo json_encode($allUsersArray);   
    $manager = new dashboard();
// $userSocialMedias = $manager->getUserSocialMedias($_SESSION['user_id']);
 $userSocialMedias = $manager->getUserSocialMedias(1);
// $userImage = $manager->getUserImage($_SESSION['user_id']);
 $userImage = $manager->getUserImage(1);
 $usermail = $manager->mail($_SESSION['user_id']);

 // $allTasksForUsers=$manager->getAllTaskForUser(1);
$allUsers = $manager->getAllUsersForTicket();

?>

<!DOCTYPE html>

<html lang="en" >
    <!-- begin::Head -->
    <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>freshGRC</title>
        <meta name="description" content="Add user example">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">        <!--end::Fonts -->

        
                    <!--begin::Page Custom Styles(used by this page) -->
                             <link href="./assets/css/demo2/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
                        <!--end::Page Custom Styles -->
        
        <!--begin:: Global Mandatory Vendors -->
<link href="./assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="./assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
 <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon" href="./assets/media/logos/favicon.ico" />
 <link href="./assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/general/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

    </head>

 <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
    </head>
    <body>
      <?php 
           
      $userRole = $_SESSION['user_role'];
      $userid = $_SESSION['user_id'];
    ?>
    <?php if($_SESSION['user_role'] == 'super_admin') {?>      
    <?php }?>
  </body>
  <?php
  include '../siteHeader.php';
  ?>
  <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" style="background-color: #e0d9d9;">


  <div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">
        
        <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
         <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
              
<!-- begin:: Content -->
  <div class="kt-container  kt-grid__item kt-grid__item--fluid">
    <div class="kt-wizard-v4" id="kt_user_add_user" data-ktwizard-state="step-first">
    <!--begin: Form Wizard Nav -->
    <div class="kt-wizard-v4__nav">
        <div class="kt-wizard-v4__nav-items nav">
            <!--doc: Replace A tag with SPAN tag to disable the step link click -->
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step" data-ktwizard-state="current">
             <!--    <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number">
                        1
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title">
                            Profile
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            User's Personal Information
                        </div>
                    </div>
                </div> -->
            </a>
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step">
            <!--     <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number">
                        2
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title">
                            Account
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            User's Account & Settings
                        </div>
                    </div>
                </div> -->
            </a>
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step">
               <!--  <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number">
                        3
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title">
                           support channels
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                          support channels
                        </div>
                    </div>
                </div> -->
            </a>
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step">
               <!--  <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number">
                        4
                    </div>
                    
                </div> -->
            </a>
             
        </div>
    </div>
 

    <div class="kt-portlet">
        
        <div class="kt-portlet__body kt-portlet__body--fit" style="overflow-x: scroll;">
            <div class="kt-grid">
                <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">
                   
                    <form class="kt-form" id="kt_user_add_form">
                        <!--begin: Form Wizard Step 1-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                            
                            <div class="kt-heading kt-heading--md">BusinessUnit Profile Details:</div>
                            <div class="kt-section kt-section--first">
                                <div class="kt-wizard-v4__form">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="kt-section__body">
                                       <!--          <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                            <div class="kt-avatar__holder" style="background-image: url(lg.png); width: 150px;"></div>
                                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" name="kt_user_add_user_avatar">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="Cancel avatar">
                                <i class="fa fa-times"></i>
                              </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                      -->
                                                    <div class="form-group">
                              <input type="hidden" class="form-control" id="loggedInUser" value=<?php echo $userid;?>>                                        
                            </div>
                                                    <div class="form-group row">
                                                  <!--   <label class="col-xl-3 col-lg-3 col-form-label">First Name</label> -->
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control" type="hidden" id="firstname">
                                                    </div>
                                                
                                                </div>
                           
                                                <div class="form-group row">
                                                   <!--  <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label> -->
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control" type="hidden" id="lastname">
                                                    </div>
                                                  
                                                </div>
                                                       <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Location</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                     <select class="form-control" id="location" style="border: 1px solid #b2abab;">
                                                          <option>San Francisco</option>
                                                          <option>Washington, D.C.</option>
                                                          <option>Seattle</option>
                                                          <option>Boston</option>
                                                          <option>New York</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                                    <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Business Unit</label>
                                                     
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control" type="text" id="category" style="border: 1px solid #b2abab;">
                                                    </div>
                                                </div>
                                                     
                                                
                        
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control" type="text" id="address" style="border: 1px solid #b2abab;">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">City</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" class="form-control" id="city" style="border: 1px solid #b2abab;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">ZipCode</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                      <input type="text" class="form-control" id="code" style="border: 1px solid #b2abab;">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend" style="border: 1px solid #b2abab;"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                            <input type="text" class="form-control" value="+45678967456" placeholder="Phone" aria-describedby="basic-addon1" style="border: 1px solid #b2abab;">
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Team</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                         <select id="team" style="border: 1px solid #b2abab;"  class="form-control select2" multiple="">
                           <option>--Select User--</option>   
                          <?php foreach($allUsers as $users){ ?>

                          <option value="<?php echo $users['last_name'] ?>"><?php echo htmlspecialchars($users['last_name']) ?></option>
                          <?php } ?>
                        </select>
                                                       
                                                    </div>
                                                </div>
                                               
                                                     <div class="kt-form__actions" style="float: right;">
                            <!-- <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                Previous
                            </div> -->
                            <div class="btn btn-success btn-md btn-tall btn-wide kt-font-bold " data-ktwizard-type="action" id="managerUserButton" onclick="saveUserProfileChanges()">
                                Submit
                            </div>
                           <!--  <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                Next Step
                            </div> -->
                        </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                       <!--  <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">                           
                            <div class="kt-section kt-section--first">
                                <div class="kt-wizard-v4__form">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="kt-section__body">
                                                <div class="form-group row">                                                     
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-md">User's Account Details</h3>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Language</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <select class="form-control">
                                                            <option>Select Language...</option>
                                                            <option value="id">Bahasa Indonesia - Indonesian</option>
                                                            <option value="msa">Bahasa Melayu - Malay</option>
                                                            <option value="ca">Català - Catalan</option>
                                                            <option value="cs">Čeština - Czech</option>
                                                            <option value="da">Dansk - Danish</option>
                                                            <option value="de">Deutsch - German</option>
                                                            <option value="en" selected="">English</option>
                                                            <option value="en-gb">English UK - British English</option>
                                                     
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Time Zone</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <select class="form-control">
                                                            <option data-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
                                                            <option data-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
                                                            <option data-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
                                                            <option data-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
                                                            <option data-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
                                                            <option data-offset="-25200" value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option>
                                                            <option data-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
                                                            <option data-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
                                                            <option data-offset="-21600" value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option>
                                                            <option data-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua</option>
                                                            <option data-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
                                                            <option data-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                                            <option data-offset="-21600" value="Central America">(GMT-06:00) Central America</option>
                                                            <option data-offset="-18000" value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option>
                                                            <option data-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara</option>
                                               
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-last row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Communication</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="kt-checkbox-inline">
                                                            <label class="kt-checkbox">
                                                                <input type="checkbox" checked=""> Email
                                                                <span></span>
                                                            </label>
                                                            <label class="kt-checkbox">
                                                                <input type="checkbox" checked=""> SMS
                                                                <span></span>
                                                            </label>
                                                            <label class="kt-checkbox">
                                                                <input type="checkbox"> Phone
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>

                                                
                                                
                                              

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                        <!-- <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
              <div class="kt-heading kt-heading--md">Details</div>
              <div class="kt-form__section kt-form__section--first">
                <div class="kt-wizard-v2__form">
                <div class="row">
                  <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                      
                      <i class="fab fa-facebook-f" title="Facebook" style="background-color: #3B5997;border-radius: 50%;padding:10px;color: white;"></i>&nbsp;&nbsp;<input type="text" class="form-control" value="www.facebook.com" id="facebook">
                      
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                      
                      <i class="fab fa-twitter" title="Twitter" style="background-color: #3EA1F2;border-radius: 50%;padding:10px;color: white;"></i>&nbsp;&nbsp;<input type="text" class="form-control" value="www.twitter.com" id="twitter">
                      
                    </div>
                  </div>
                </div>
                                
                <div class="row">
                  <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                      
                      <i class="fab fa-google" title="Twitter" style="background-color:red;border-radius: 50%;padding:10px;color: white;"></i>&nbsp;&nbsp;<input type="text" class="form-control" value="www.fixnix.co" id="site">
                      
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                      <i class="fab fa-times" title="Twitter" style="background-color: green;border-radius: 50%;padding:10px;color: white;"></i>&nbsp;&nbsp;
                      <input type="text" class="form-control" name="loccity"  value="9715905449" id="mobileno">
                      
                    </div>
                  </div>
                </div>
                 <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                            <div class="kt-avatar__holder" style="background-image: url(lg.png); width: 150px;"></div>
                                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" name="kt_user_add_user_avatar">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="Cancel avatar">
                                                                <i class="fa fa-times"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                <div class="form-group" style="margin-left:680px;">
                                    <a href="./demo2/custom/pages/wizard/add.html" class="btn btn-info btn-lg" title="Add">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a> -->
                <!--                 </div>
                
              </div>
              </div>
            </div> --> 
                        <!--end: Form Wizard Step 3-->

                        <!--begin: Form Wizard Step 4-->
                       <!--  <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Review your Details and Submit</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v4__review">
                                    <div class="kt-wizard-v4__review-item">
                                        <div class="kt-wizard-v4__review-title">
                                            Your Account Details
                                        </div>
                                        <div class="kt-wizard-v4__review-content">
                                            John Wick
                                            <br/> Phone: +61412345678
                                            <br/> Email: johnwick@reeves.com
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v4__review-item">
                                        <div class="kt-wizard-v4__review-title">
                                            Your Address Details
                                        </div>
                                        <div class="kt-wizard-v4__review-content">
                                            Address Line 1
                                            <br/> Address Line 2
                                            <br/> Melbourne 3000, VIC, Australia
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v4__review-item">
                                        <div class="kt-wizard-v4__review-title">
                                            Payment Details
                                        </div>
                                        <div class="kt-wizard-v4__review-content">
                                            Card Number: xxxx xxxx xxxx 1111
                                            <br/> Card Name: John Wick
                                            <br/> Card Expiry: 01/21
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!--end: Form Wizard Step 4-->

                        <!--begin: Form Actions -->
                     
                        <!--end: Form Actions -->
                    </form>
                    <!--end: Form Wizard Form-->
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
  
<?php
include '../audit/sidemenu.php';

 ?>
        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#374afb","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->
  <script src="js/common/userProfile.js"></script> 
<script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="./assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="./assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="./assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="./assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="./assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="./assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="./assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="./assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="./assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="./assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/dropzone.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="./assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="./assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="./assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="./assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="./assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="./assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="./assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="./assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="./assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="./assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
<script src="./assets/js/demo3/pages/crud/forms/widgets/select2.js" type="text/javascript"></script> 
             <script src="./assets/js/demo2/scripts.bundle.js" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->

        
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="./assets/js/demo2/pages/custom/user/add-user.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->
</html>
