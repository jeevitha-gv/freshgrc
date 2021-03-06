<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../subscription.php';
require_once __DIR__.'/../../php/user/userManager.php';
$companyId=$_POST['companyId'];
    // error_log("userid".print_r($companyId,true));
    $manager = new UserManager();
    $allUsersArray = $manager->getAllUsers($companyId);
 require_once '../../php/common/dashboard.php';
require_once '../../php/common/feedManager.php';
require_once __DIR__.'/timelinemanager.php';
//timeline
$timeManager = new TimeManager();
$users = $timeManager->users(); //user choice
$chats = $timeManager->timeLine(); //chat retrive
$manager = new dashboard();
$completedTasksForUsers=$manager->getCompletedTaskForUser($_SESSION['user_id']);
$pendingTasksForUsers=$manager->getPendingTaskForUser($_SESSION['user_id']);
 // $allTasksForUsers=$manager->getAllTaskForUser(1);
$allUsers = $manager->getAllUsersForTicket();
// $userSocialMedias = $manager->getUserSocialMedias($_SESSION['user_id']);
 $userSocialMedias = $manager->getUserSocialMedias(1);
 $userImage = $manager->getUserImage(1);

$usermail = $manager->mail($_SESSION['user_id']);

$projectId = $_SESSION['user_id'];
$getAllSupportTickets=$manager->getAllSupportTickets($projectId);
// echo $_SESSION['user_id'];
$feedManager=new FeedManager();
$loggedInUser=$_SESSION['user_id'];
$feeds=$feedManager->getFeeds($loggedInUser,$_SESSION['user_role']);
// $feeds=$feedManager->getFeeds(1,$_SESSION['user_role']);
require_once __DIR__.'/../../php/company/companyManager.php';
$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
switch ($_SESSION['user_role']) {
  case 'super_admin':
    $feedMessage="New Compliance Library is created by";
    $isAuditor=0;
    break;
  case 'auditor':
    $feedMessage="New Audit is assigned for";
    $isAuditor=1;
    break;
  default:
    # code...
    break;
}
$companyId=$id[0]['id'];
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
<link href="./assets/css/demo2/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
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
 <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
<link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
  }, 'google_translate_element');
        document.querySelector('.goog-te-gadget').setAttribute('style', 'font-size: 0','width:100');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    </head>
 <style type="text/css">
    .goog-logo-link, .goog-logo-link:link, .goog-logo-link:visited, .goog-logo-link:hover, .goog-logo-link:active{
        visibility: hidden;
    }
    .goog-te-gadget{
            margin-top: 20px;
    }
    #demo1{
        cursor:pointer;
    }
    .goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
body {
    top: 0px !important; 
    }
  
.form-popup {
  display: none;
  position: fixed;
  
}
.goog-te-combo  { margin: 0; border:1px solid #D5DAD9; border-radius:4px; padding: 5px 0px 5px 35px; background: #fff url(images/google-logo.gif) no-repeat 10px center; -moz-appearance: none; appearance: none; -webkit-appearance: none;width:488px;height:40px; }
a
{
  color: white;
}
</style>
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
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step" data-ktwizard-state="current" onclick="showvalue()">
                <div class="kt-wizard-v4__nav-body">
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
                </div>
            </a>
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step" onclick="showvalue()">
                <div class="kt-wizard-v4__nav-body">
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
                </div>
            </a>
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step" onclick="showvalue()">
                <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number">
                        3
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title">
                            Address
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            User's  Address
                        </div>
                    </div>
                </div>
            </a>
            <a class="kt-wizard-v4__nav-item nav-item"  data-ktwizard-type="step" onclick="showvalue()">
                <div class="kt-wizard-v4__nav-body">
                    <div class="kt-wizard-v4__nav-number">
                        4
                    </div>
                    <div class="kt-wizard-v4__nav-label">
                        <div class="kt-wizard-v4__nav-label-title">
                            Submission
                        </div>
                        <div class="kt-wizard-v4__nav-label-desc">
                            Review and Submit
                        </div>
                    </div>
                </div>
            </a>
             
        </div>
    </div>
 

    <div class="kt-portlet">
         
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-grid">
                <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">
                   
                    <form class="kt-form" id="kt_user_add_form">
                        <!--begin: Form Wizard Step 1-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                <a href="view/common/bulkinvite.php" class="btn btn-danger" style="margin-left: 80%;">Bulk Invite</a>
                            <div class="kt-heading kt-heading--md">User's Profile Details:</div>
                            <div class="kt-section kt-section--first">
                                <div class="kt-wizard-v4__form">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="kt-section__body">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Logo</label>
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
                                                     
                                                    <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control" type="text" id="firstName" required>
                                                    </div>
                                                </div>
                                                     
                              <div class="form-group">
                       
                            <input type="hidden" class="form-control" id="userId">
                            <input type="hidden" class="form-control" id="action" value="create">
                            <input type="hidden" class="form-control" id="companyId" value="<?php echo $companyId ?>">
                            <input type="hidden" class="form-control" id="company" value="7">
                        </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control" type="text" id="lastName">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group">
                                                            
                                                            <input type="text" class="form-control" id="email" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Role</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <?php include '../common/roleMultiSelect.php';?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="phone_no" placeholder="Phone" aria-describedby="basic-addon1" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">                           
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
                                                    <div class="col-lg-12 col-xl-9">
                                                       <div id="google_translate_element" style="margin-top:-15px;margin-left:0px; width: 250px;"></div>
                                                    </div>
                                                </div>
<!-- 
                                                 <div class="form-group row" style="margin-left:4%;">
                    <label class="col-xs-1 col-form-label">Subject: </label>
                    <div class="col-xs-11">
                  <input type="text" class="form-control" id="riskSubject">
                </div>
               </div> -->
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
                                                

                                            

                                            
                                            

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                           <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Setup Your Address</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v4__form">
                                     <div class="form-group row col 13">
                                                    <label>Category</label>
                                                    
                                                        <?php include '../common/dropdownCategory.php';?>
                                                    
                                                </div>
                                    <div class="form-group">
                                        <label>Address Line </label>
                                        <input type="text" class="form-control" id="address1" placeholder="Address Line 1">
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Postcode</label>
                                                <input type="text" class="form-control" id="postcode" placeholder="Postcode">
                                                
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" id="city" placeholder="City">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" id="state" placeholder="State" >
                                                
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                            <label>Country:</label>
                                            <select name="country" class="form-control" id="country">
                                                <option value="">Select</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia, Plurinational State of</option>
                                                <option value="Bonaire">Bonaire</option>
                                               <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                               <option value="Botswana">Botswana</option>
                                               <option value="Brazil">Brazil</option>
                                               <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                               <option value="Brunei">Brunei</option>
                                               <option value="Bulgaria">Bulgaria</option>
                                               <option value="Burkina Faso">Burkina Faso</option>
                                               <option value="Burundi">Burundi</option>
                                               <option value="Cambodia">Cambodia</option>
                                               <option value="Cameroon">Cameroon</option>
                                               <option value="Canada">Canada</option>
                                               <option value="Canary Islands">Canary Islands</option>
                                               <option value="Cape Verde">Cape Verde</option>
                                               <option value="Cayman Islands">Cayman Islands</option>
                                               <option value="Central African Republic">Central African Republic</option>
                                               <option value="Chad">Chad</option>
                                               <option value="Channel Islands">Channel Islands</option>
                                               <option value="Chile">Chile</option>
                                               <option value="China">China</option>
                                               <option value="Christmas Island">Christmas Island</option>
                                               <option value="Cocos Island">Cocos Island</option>
                                               <option value="Colombia">Colombia</option>
                                               <option value="Comoros">Comoros</option>
                                               <option value="Congo">Congo</option>
                                               <option value="Cook Islands">Cook Islands</option>
                                               <option value="Costa Rica">Costa Rica</option>
                                               <option value="Cote DIvoire">Cote DIvoire</option>
                                               <option value="Croatia">Croatia</option>
                                               <option value="Cuba">Cuba</option>
                                               <option value="Curaco">Curacao</option>
                                               <option value="Cyprus">Cyprus</option>
                                               <option value="Czech Republic">Czech Republic</option>
                                               <option value="Denmark">Denmark</option>
                                               <option value="Djibouti">Djibouti</option>
                                               <option value="Dominica">Dominica</option>
                                               <option value="Dominican Republic">Dominican Republic</option>
                                               <option value="East Timor">East Timor</option>
                                               <option value="Ecuador">Ecuador</option>
                                               <option value="Egypt">Egypt</option>
                                               <option value="El Salvador">El Salvador</option>
                                               <option value="Equatorial Guinea">Equatorial Guinea</option>
                                               <option value="Eritrea">Eritrea</option>
                                               <option value="Estonia">Estonia</option>
                                               <option value="Ethiopia">Ethiopia</option>
                                               <option value="Falkland Islands">Falkland Islands</option>
                                               <option value="Faroe Islands">Faroe Islands</option>
                                               <option value="Fiji">Fiji</option>
                                               <option value="Finland">Finland</option>
                                               <option value="France">France</option>
                                               <option value="French Guiana">French Guiana</option>
                                               <option value="French Polynesia">French Polynesia</option>
                                               <option value="French Southern Ter">French Southern Ter</option>
                                               <option value="Gabon">Gabon</option>
                                               <option value="Gambia">Gambia</option>
                                               <option value="Georgia">Georgia</option>
                                               <option value="Germany">Germany</option>
                                               <option value="Ghana">Ghana</option>
                                               <option value="Gibraltar">Gibraltar</option>
                                               <option value="Great Britain">Great Britain</option>
                                               <option value="Greece">Greece</option>
                                               <option value="Greenland">Greenland</option>
                                               <option value="Grenada">Grenada</option>
                                               <option value="Guadeloupe">Guadeloupe</option>
                                               <option value="Guam">Guam</option>
                                               <option value="Guatemala">Guatemala</option>
                                               <option value="Guinea">Guinea</option>
                                               <option value="Guyana">Guyana</option>
                                               <option value="Haiti">Haiti</option>
                                               <option value="Hawaii">Hawaii</option>
                                               <option value="Honduras">Honduras</option>
                                               <option value="Hong Kong">Hong Kong</option>
                                               <option value="Hungary">Hungary</option>
                                               <option value="Iceland">Iceland</option>
                                               <option value="Indonesia">Indonesia</option>
                                               <option value="India">India</option>
                                               <option value="Iran">Iran</option>
                                               <option value="Iraq">Iraq</option>
                                               <option value="Ireland">Ireland</option>
                                               <option value="Isle of Man">Isle of Man</option>
                                               <option value="Israel">Israel</option>
                                               <option value="Italy">Italy</option>
                                               <option value="Jamaica">Jamaica</option>
                                               <option value="Japan">Japan</option>
                                               <option value="Jordan">Jordan</option>
                                               <option value="Kazakhstan">Kazakhstan</option>
                                               <option value="Kenya">Kenya</option>
                                               <option value="Kiribati">Kiribati</option>
                                               <option value="Korea North">Korea North</option>
                                               <option value="Korea Sout">Korea South</option>
                                               <option value="Kuwait">Kuwait</option>
                                               <option value="Kyrgyzstan">Kyrgyzstan</option>
                                               <option value="Laos">Laos</option>
                                               <option value="Latvia">Latvia</option>
                                               <option value="Lebanon">Lebanon</option>
                                               <option value="Lesotho">Lesotho</option>
                                               <option value="Liberia">Liberia</option>
                                               <option value="Libya">Libya</option>
                                               <option value="Liechtenstein">Liechtenstein</option>
                                               <option value="Lithuania">Lithuania</option>
                                               <option value="Luxembourg">Luxembourg</option>
                                               <option value="Macau">Macau</option>
                                               <option value="Macedonia">Macedonia</option>
                                               <option value="Madagascar">Madagascar</option>
                                               <option value="Malaysia">Malaysia</option>
                                               <option value="Malawi">Malawi</option>
                                               <option value="Maldives">Maldives</option>
                                               <option value="Mali">Mali</option>
                                               <option value="Malta">Malta</option>
                                               <option value="Marshall Islands">Marshall Islands</option>
                                               <option value="Martinique">Martinique</option>
                                               <option value="Mauritania">Mauritania</option>
                                               <option value="Mauritius">Mauritius</option>
                                               <option value="Mayotte">Mayotte</option>
                                               <option value="Mexico">Mexico</option>
                                               <option value="Midway Islands">Midway Islands</option>
                                               <option value="Moldova">Moldova</option>
                                               <option value="Monaco">Monaco</option>
                                               <option value="Mongolia">Mongolia</option>
                                               <option value="Montserrat">Montserrat</option>
                                               <option value="Morocco">Morocco</option>
                                               <option value="Mozambique">Mozambique</option>
                                               <option value="Myanmar">Myanmar</option>
                                               <option value="Nambia">Nambia</option>
                                               <option value="Nauru">Nauru</option>
                                               <option value="Nepal">Nepal</option>
                                               <option value="Netherland Antilles">Netherland Antilles</option>
                                               <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                               <option value="Nevis">Nevis</option>
                                               <option value="New Caledonia">New Caledonia</option>
                                               <option value="New Zealand">New Zealand</option>
                                               <option value="Nicaragua">Nicaragua</option>
                                               <option value="Niger">Niger</option>
                                               <option value="Nigeria">Nigeria</option>
                                               <option value="Niue">Niue</option>
                                               <option value="Norfolk Island">Norfolk Island</option>
                                               <option value="Norway">Norway</option>
                                               <option value="Oman">Oman</option>
                                               <option value="Pakistan">Pakistan</option>
                                               <option value="Palau Island">Palau Island</option>
                                               <option value="Palestine">Palestine</option>
                                               <option value="Panama">Panama</option>
                                               <option value="Papua New Guinea">Papua New Guinea</option>
                                               <option value="Paraguay">Paraguay</option>
                                               <option value="Peru">Peru</option>
                                               <option value="Phillipines">Philippines</option>
                                               <option value="Pitcairn Island">Pitcairn Island</option>
                                               <option value="Poland">Poland</option>
                                               <option value="Portugal">Portugal</option>
                                               <option value="Puerto Rico">Puerto Rico</option>
                                               <option value="Qatar">Qatar</option>
                                               <option value="Republic of Montenegro">Republic of Montenegro</option>
                                               <option value="Republic of Serbia">Republic of Serbia</option>
                                               <option value="Reunion">Reunion</option>
                                               <option value="Romania">Romania</option>
                                               <option value="Russia">Russia</option>
                                               <option value="Rwanda">Rwanda</option>
                                               <option value="St Barthelemy">St Barthelemy</option>
                                               <option value="St Eustatius">St Eustatius</option>
                                               <option value="St Helena">St Helena</option>
                                               <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                               <option value="St Lucia">St Lucia</option>
                                               <option value="St Maarten">St Maarten</option>
                                               <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                               <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                               <option value="Saipan">Saipan</option>
                                               <option value="Samoa">Samoa</option>
                                               <option value="Samoa American">Samoa American</option>
                                               <option value="San Marino">San Marino</option>
                                               <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                               <option value="Saudi Arabia">Saudi Arabia</option>
                                               <option value="Senegal">Senegal</option>
                                               <option value="Seychelles">Seychelles</option>
                                               <option value="Sierra Leone">Sierra Leone</option>
                                               <option value="Singapore">Singapore</option>
                                               <option value="Slovakia">Slovakia</option>
                                               <option value="Slovenia">Slovenia</option>
                                               <option value="Solomon Islands">Solomon Islands</option>
                                               <option value="Somalia">Somalia</option>
                                               <option value="South Africa">South Africa</option>
                                               <option value="Spain">Spain</option>
                                               <option value="Sri Lanka">Sri Lanka</option>
                                               <option value="Sudan">Sudan</option>
                                               <option value="Suriname">Suriname</option>
                                               <option value="Swaziland">Swaziland</option>
                                               <option value="Sweden">Sweden</option>
                                               <option value="Switzerland">Switzerland</option>
                                               <option value="Syria">Syria</option>
                                               <option value="Tahiti">Tahiti</option>
                                               <option value="Taiwan">Taiwan</option>
                                               <option value="Tajikistan">Tajikistan</option>
                                               <option value="Tanzania">Tanzania</option>
                                               <option value="Thailand">Thailand</option>
                                               <option value="Togo">Togo</option>
                                               <option value="Tokelau">Tokelau</option>
                                               <option value="Tonga">Tonga</option>
                                               <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                               <option value="Tunisia">Tunisia</option>
                                               <option value="Turkey">Turkey</option>
                                               <option value="Turkmenistan">Turkmenistan</option>
                                               <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                               <option value="Tuvalu">Tuvalu</option>
                                               <option value="Uganda">Uganda</option>
                                               <option value="United Kingdom">United Kingdom</option>
                                               <option value="Ukraine">Ukraine</option>
                                               <option value="United Arab Erimates">United Arab Emirates</option>
                                               <option value="United States of America">United States of America</option>
                                               <option value="Uraguay">Uruguay</option>
                                               <option value="Uzbekistan">Uzbekistan</option>
                                               <option value="Vanuatu">Vanuatu</option>
                                               <option value="Vatican City State">Vatican City State</option>
                                               <option value="Venezuela">Venezuela</option>
                                               <option value="Vietnam">Vietnam</option>
                                               <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                               <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                               <option value="Wake Island">Wake Island</option>
                                               <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                               <option value="Yemen">Yemen</option>
                                               <option value="Zaire">Zaire</option>
                                               <option value="Zambia">Zambia</option>
                                               <option value="Zimbabwe">Zimbabwe</option>
                                    
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Form Wizard Step 3-->

                        <!--begin: Form Wizard Step 4-->
                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Review your Details and Submit</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v4__review">
                                    <div class="kt-wizard-v4__review-item">
                                        <div class="kt-wizard-v4__review-title">
                                            Your Account Details
                                        </div>
                                        <div class="kt-wizard-v4__review-content">
                                          <label><b>FirstName:</b></label><p id="result1"></p>
                                           <label><b>LastName:</b></label><p id="result2"></p>
                                           <label><b>Email:</b></label><p id="result3"></p>
                                           <label><b>phone:</b></label><p id="result4"></p>
                                           <label><b>Address:</b></label><p id="result5"></p>
                                           <label><b>PostCode:</b></label><p id="result6"></p>
                                           <label><b>City:</b></label><p id="result7"></p>

                                           <label><b>State:</b></label><p id="result8"></p>
                                           <label><b>Country:</b></label><p id="result9"></p>
                                        </div>
                                    </div>
                             
                                 
                                </div>
                            </div>
                        </div>
                        <!--end: Form Wizard Step 4-->

                        <!--begin: Form Actions -->
                        <div class="kt-form__actions">
                            <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                Previous
                            </div>
                            <div class="btn btn-success btn-md btn-tall btn-wide kt-font-bold " data-ktwizard-type="action-submit" id="managerUserButton" onclick="manageUser()">
                                Submit
                            </div>
                            <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next" onclick="showvalue()">
                                Next Step
                            </div>
                        </div>
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
<?php if($_SESSION['user_role']=="super_admin")
{
 ?>  
	<div class="kt-grid kt-grid--hor kt-grid--root" style="margin-top: -100px;">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>

<h3 class="kt-portlet__head-title" style="color: white;">
USER MANAGEMENT
</h3>

</div>
<div style="margin: 5px;">
  <button class="btn btn-success" style="float: right;"><a href="view/common/addadminuser.php" style="color:white;">Add User</a></button>
   <button class="btn btn-danger" ><a href="view/common/bulkinvite.php" style="color:white;">Bulk Invite</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
</div>


</div>

<div class="kt-portlet__body" style="overflow-x: scroll;">
<!--begin: Datatable -->
<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
<thead>
  <tr>
                    <th>User Id</th>
                    <th>First Name</th> 
                    <th>Last Name</th>                       
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Created_Date</th>
                    <th>Company</th>

                    <th>Action</th>
                    
  </tr>
</thead>

<tbody>
<?php foreach ($allUsersArray as $data) { ?>
                    <tr>
                    <td><?php echo $data['id'];?></td>
                    <td><?php echo $data['firstName'];?></td>
                    <td><?php echo $data['lastName'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><?php echo $data['role'];?></td>
                    <td><?php echo $data['created_at'];?></td>
                    <td><?php echo $data['company_id']; ?></td>
                
                       <td><button class="btn btn-primary"><a href="/freshgrc/view/common/edituserprofile.php?userId=<?php echo $data['id']; ?>" style="color: white;">Edit</a></button></td>
                       <!-- <td><button class="btn btn-danger"><a href="/freshgrc/view/common/addadminuser.php" style="color: white;">New</a></button></td> -->
                   
                    </tr>
                  <?php } ?>
</tbody>


</table>
<!--end: Datatable -->
</div>
</div>

</div>  

</div>
</div>
</div>
<?php } ?>
<?php
include '../audit/sidemenu.php';

 ?>
        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#374afb","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->
<script src="js/superAdmin/userManagement.js"></script>
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

      <script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>

                            <script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
      
                            <script src="./assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
		    	   <script src="./assets/js/demo2/scripts.bundle.js" type="text/javascript"></script>
				<!--end::Global Theme Bundle -->

        
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="./assets/js/demo2/pages/custom/user/add-user.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->
</html>
<script type="text/javascript">
    function showvalue()
    {
        var firstName=document.getElementById('firstName').value;
        document.getElementById('result1').innerHTML=firstName;
        var lastName=document.getElementById('lastName').value;
        document.getElementById('result2').innerHTML=lastName;
           var email=document.getElementById('email').value;
        document.getElementById('result3').innerHTML=email;
         var phone=document.getElementById('phone').value;
        document.getElementById('result4').innerHTML=phone;
         var address1=document.getElementById('address1').value;
        document.getElementById('result5').innerHTML=address1;
         var postcode=document.getElementById('postcode').value;
        document.getElementById('result6').innerHTML=postcode;
        var city=document.getElementById('city').value;
        document.getElementById('result7').innerHTML=city;
        var state=document.getElementById('state').value;
        document.getElementById('result8').innerHTML=state;
        var country=document.getElementById('country').value;
        document.getElementById('result9').innerHTML=country;

    } 
 </script>