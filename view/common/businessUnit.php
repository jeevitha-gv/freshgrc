
<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../subscription.php';
require_once __DIR__.'/../../php/user/userManager.php';
$companyId=$_POST['companyId'];
    // error_log("userid".print_r($companyId,true));
    $manager = new UserManager();
    $allUsersArray = $manager->getAllUsers($companyId);
    $allcompanydata = $manager->companyprofiletable($companyId);
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
    case 'auditee':
    $feedMessage="New Audit is assigned for ";
    $isAuditor=2;
    break;
    case 'risk_owner':
    $feedMessage="New Risk is assigned for ";
    $isAuditor=3;
    break;
     case 'risk_mitigator':
    $feedMessage="New Risk is assigned for ";
    $isAuditor=4;
    break;
         case 'risk_reviewer':
    $feedMessage="New Risk is assigned for ";
    $isAuditor=5;
    break;
  default:
    # code...
    break;
}
$companyId=$id[0]['id'];
?>
<!DOCTYPE html>

<html lang="en" >
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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
 <!-- <script src="js/superAdmin/userManagement.js"></script> -->
    </head>
    <?php
    include '../siteHeader.php';
    ?>
  <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" style="background-color: #e0d9d9;">


<?php if($_SESSION['user_role']=="super_admin")
{
 ?> 
<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top:-9%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content"style="margin-top:-3%;">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>

<h3 class="kt-portlet__head-title" style="color: white; font-size: 20px;">
Business Unit
</h3>

</div>
<div>
  <button class="btn btn-success" style="float: right;"><a href="view/common/addadminuser.php" style="color:white;">Adduser</a></button>
   <button class="btn btn-danger" style=""><a href="view/common/bulkbusinessunit.php" style="color:white;">Add BusinessUnit</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
</div>


</div>

<div class="kt-portlet__body" style="overflow-x: scroll;">
<!--begin: Datatable --> 
<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
<thead>
  <tr>
                    <th>User Id</th>
                    <th>Category</th> 
                    <th>Address</th>                       
                    <th>Code</th>
                    <th>City</th>
                    <th>Team</th>
                    <th>Department</th>
                    <th>Action</th>
                    
  </tr>
</thead>

<tbody>
<?php foreach ($allcompanydata as $data) { ?>
                    <tr>
                    <td><?php echo $data['user_id'];?></td>
                    <td><?php echo $data['category'];?></td>
                    <td><?php echo $data['address'];?></td>
                    <td><?php echo $data['code'];?></td>
                    <td><?php echo $data['city'];?></td>
                    <td><?php echo $data['team'];?></td>
                    <td><?php echo $data['department']; ?></td>
                      <td><button class="btn btn-primary"><a href="/freshgrc/view/common/editbulkbussinessunit.php?userId=<?php echo $data['user_id']; ?>" style="color: white;">Edit</a></button></td>
                   </tr>
                    
                  <?php } ?>

</tbody>


</table> 
<!--end: Datatable -->
</div>
<?php } ?>



<?php
include '../audit/sidemenu.php';

 ?>
        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#374afb","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
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
