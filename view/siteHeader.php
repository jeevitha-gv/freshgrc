<?php
    require_once '../../php/common/dashboard.php';

    $manager=new dashboard();
    $auditcount=$manager->getAuditCount();
    $auditeecount=$manager->getAuditeeCount();
    $plan=$manager->getAuditNotifysum();
    $kickoff=$manager->getAuditeeNotifysum();
    $admin=$manager->getAllAuditsum();
    $adminaudit=$manager->getAuditNotifyForAdmin();

    // $review=$manager->getAuditNotifyinperformed();
    // $followup=$manager->getAuditNotifyinfollowup();
    // $reports=$manager->getAuditNotifyinreports();
    // $auditriview=$manager->getAuditNotifyinReview();
    // echo count($plan);
?>

<!DOCTYPE html>

<html lang="en" >
    <!-- begin::Head -->
    <head>
<base href="/freshgrc/">
        <meta charset="utf-8"/>

        <title>Metronic | Dashboard</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->

                    <!--begin::Page Vendors Styles(used by this page) -->
                            <link href="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
                        <!--end::Page Vendors Styles -->
       
       
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
   

    </head>
  <!--  <style type="text/css">
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
a
{
  color: white;
}
</style> -->
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >

<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed " >
<div class="kt-header-mobile__logo">
<img alt="Logo" src="./assets/media/logos/fixnix-sm.png"/>
</div>
<div class="kt-header-mobile__toolbar">
<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>

<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
</div>
</div>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>


<!-- begin:: Header -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
      <!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>


      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
        <!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " >
      <!-- begin: Header Menu -->
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
 
</div>
<!-- end: Header Menu --> <!-- begin:: Header Topbar -->
<div class="kt-header__topbar">
<?php  
 if($_SESSION['user_role']=='risk_owner'|| $_SESSION['user_role']=='risk_mitigator' || $_SESSION['user_role']=='risk_reviewer' || $_SESSION['user_role']=='auditor' || $_SESSION['user_role']=='auditee' || $_SESSION['user_role']=='compliance_author' || $_SESSION['user_role']=='compliance_reviewer' ||$_SESSION['user_role']=='comp_analyst'|| $_SESSION['user_role']=='companyadmin' ||$_SESSION['user_role']=='policy_owner' || $_SESSION['user_role']=='policy_reviewer' || $_SESSION['user_role']=='policy_approver' || $_SESSION['user_role']=='asset_owner' || $_SESSION['user_role']=='asset_custodian' || $_SESSION['user_role']=='asset_reviewer' || $_SESSION['user_role']=='disaster_owner' || $_SESSION['user_role']=='disaster_tester' || $_SESSION['user_role']=='disaster_trainer' || $_SESSION['user_role']=='bcpm_planner' || $_SESSION['user_role']=='bcpm_maintainer' || $_SESSION['user_role']=='bcpm_tester' || $_SESSION['user_role']=='bcpm_implementer' || $_SESSION['user_role']=='incident_analyst' || $_SESSION['user_role']=='incident_manager' || $_SESSION['user_role']=='incident_resolver' || $_SESSION['user_role']=='incident_reviewer'||$_SESSION['user_role']=='whistle_investigator'||$_SESSION['user_role']=='whistle_reviewer') { ?>
    
   <div class="kt-header__topbar-item dropdown kt-header__topbar-item--langs">
 

           <a  href="view/common/overview.php" class="kt-header__topbar-icon" title="Business Unit"><i class="flaticon2-group" ></i>
           <span class="kt-hidden kt-badge kt-badge--dot kt-badge--notify kt-badge--sm"></span></a>
         </div>


        <div class="kt-header__topbar-item dropdown kt-header__topbar-item--langs">
         <a href="view/common/addadminuser.php" class="kt-header__topbar-icon" title="Add User">
           <i class="flaticon2-user"></i><span class="kt-hidden kt-badge kt-badge--dot kt-badge--notify kt-badge--sm"></span></a>
         </div>


           <div class="kt-header__topbar-item dropdown kt-header__topbar-item--langs">
            <a href="view/common/project.php" class="kt-header__topbar-icon" title="Project & Task">
           <i class="kt-menu__link-icon flaticon2-analytics-2"></i>
           <span class="kt-hidden kt-hiddenbadge kt-badge--dot kt-badge--notify kt-badge--sm"></span></a>
         </div>
   <div class="kt-header__topbar-item dropdown kt-header__topbar-item--langs">
           <a href="view/common/timeline.php" class="kt-header__topbar-icon" title="Timeline">
           <i class="flaticon-time"></i>
           <span class="kt-hidden kt-badge kt-badge--dot kt-badge--notify kt-badge--sm"></span></a>
         </div>


<?php } ?>
<?php 
if($_SESSION['user_role']=='super_admin')
{
  ?>
   <div class="kt-header__topbar-item dropdown kt-header__topbar-item--langs">
 

           <a  href="view/common/businessUnit.php" class="kt-header__topbar-icon" title="Business Unit"><i class="flaticon2-group" ></i>
           <span class="kt-hidden kt-badge kt-badge--dot kt-badge--notify kt-badge--sm"></span></a>
         </div>


        <div class="kt-header__topbar-item dropdown kt-header__topbar-item--langs">
         <a href="view/common/addadminuser.php" class="kt-header__topbar-icon" title="Add User">
           <i class="flaticon2-user"></i><span class="kt-hidden kt-badge kt-badge--dot kt-badge--notify kt-badge--sm"></span></a>
         </div>


           <div class="kt-header__topbar-item dropdown kt-header__topbar-item--langs">
            <a href="view/common/project.php" class="kt-header__topbar-icon" title="Project & Task">
           <i class="kt-menu__link-icon flaticon2-analytics-2"></i>
           <span class="kt-hidden kt-hiddenbadge kt-badge--dot kt-badge--notify kt-badge--sm"></span></a>
         </div>
   <div class="kt-header__topbar-item dropdown kt-header__topbar-item--langs">
           <a href="view/common/timeline.php" class="kt-header__topbar-icon" title="Timeline">
           <i class="flaticon-time"></i>
           <span class="kt-hidden kt-badge kt-badge--dot kt-badge--notify kt-badge--sm"></span></a>
         </div>


      <div class="kt-header__topbar-item dropdown kt-header__topbar-item--langs">
           <a href="view/policy/ModuleSelection.php?i=1" class="kt-header__topbar-icon" title="Setup Guide">
           <i class="flaticon-globe"></i><span class="kt-hidden kt-badge kt-badge--dot kt-badge--notify kt-badge--sm"></span></a>
       <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">

   </div>
 </div>
<?php } ?>

         <!--  <div class="kt-header__topbar-item dropdown kt-header__topbar-item--langs">
           <a href="view/common/paymentoverview.php" class="kt-header__topbar-icon" title="Payment">
           <i class="flaticon2-shopping-cart-1"></i><span class="kt-hidden kt-badge kt-badge--dot kt-badge--notify kt-badge--sm"></span></a>
            </div>
 -->
<!-- Auditor Notification -->
 <?php if($_SESSION['user_role']=='auditor') { ?>
<div class="kt-header__topbar-item dropdown">
          <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="true">
              <span class="kt-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i><p style="font-size: 15px;color: red">

              <span class="kt-badge--dot kt-badge--notify kt-badge--sm">
    <?php foreach ($plan as $value) {
      ?>
      <?php echo $value['total'];?>
      <?php 
    }
    ?>
  </span>
</p>
    </span>
          </div>
          <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
              <form>
                  <!--begin: Head -->
    <div class="kt-head kt-head--skin-light kt-head--fit-x kt-head--fit-b">
        <h3 class="kt-head__title">
            User Notifications
            &nbsp;
            <!-- <span class="btn btn-label-primary btn-sm btn-bold btn-font-md"><?php echo count($plan)?></span> -->
        </h3>
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
            </li>
         
        </ul>
    </div>
<!--end: Head -->

<div class="tab-content">
    <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
        <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
          <?php
          foreach ($auditcount as $create) {
            if($create['notification_status']==1)
            {

         ?>
            <a href="view/audit/auditCreateAdmin.php" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-line-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                    <?php echo $create['title']; ?> - has been created
                    </div>
                    <div class="kt-notification__item-time">
                      <?php echo $create['updated_time']; ?>
                    </div>
                </div>
            </a>
         <?php
       }
     }
       ?>
        <?php
          foreach ($auditcount as $create) {
            if($create['respond_notification_status']==1)
            {

         ?>
            <a href="view/audit/auditPerformAdmin.php" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-line-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                    <?php echo $create['title']; ?> - has been Responded
                    </div>
                    <div class="kt-notification__item-time">
                      <?php echo $create['updated_time']; ?>
                    </div>
                </div>
            </a>
         <?php
       }
     }
       ?>
         <?php
          foreach ($auditcount as $create) {
            if($create['review_notification_status']==1)
            {

         ?>
            <a href="view/audit/auditPublished.php" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-line-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                    <?php echo $create['title']; ?> - has been Reviewed
                    </div>
                    <div class="kt-notification__item-time">
                      <?php echo $create['updated_time']; ?>
                    </div>
                </div>
            </a>
         <?php
       }
     }
       ?>

         
        </div>
    </div>

</div>
              </form>
          </div>
      </div>
      <?php
    }
    ?>
    <!-- Auditee Notification -->
 <?php if($_SESSION['user_role']=='auditee') { ?>
<div class="kt-header__topbar-item dropdown">
          <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="true">
                <span class="kt-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i><p style="font-size: 15px;color: red">

              <span class="kt-badge--dot kt-badge--notify kt-badge--sm">
    <?php foreach ($kickoff as $value) {
      ?>
      <?php echo $value['total'];?>
      <?php 
    }
    ?>
  </span>
</p>
    </span>
          </div>
          <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
   
                  <!--begin: Head -->
    <div class="kt-head kt-head--skin-light kt-head--fit-x kt-head--fit-b">
        <h3 class="kt-head__title">
            User Notifications
            &nbsp;
            <!-- <span class="btn btn-label-primary btn-sm btn-bold btn-font-md"><?php echo count($plan)?></span> -->
        </h3>
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
            </li>
         
        </ul>
    </div>
<!--end: Head -->

<div class="tab-content">
    <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
        <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
          <?php
          foreach ($auditeecount as $create) {
           if($create['kickoff_notification_status']==1)
           {
         ?>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-line-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                    <?php echo $create['title']; ?> - has been scheduled
                    </div>
                    <div class="kt-notification__item-time">
                      <?php echo $create['updated_time']; ?>
                    </div>
                </div>
            </a>
         <?php
       }
     }
       ?>
         
        </div>
    </div>

</div>
             
          </div>
      </div>
      <?php
    }
    ?>
    <!-- superadmin notification from audit -->
     <?php if($_SESSION['user_role']=='super_admin') { ?>
<div class="kt-header__topbar-item dropdown">
          <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="true">
              <span class="kt-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i><p style="font-size: 15px;color: red">

              <span class="kt-badge--dot kt-badge--notify kt-badge--sm">
    <?php foreach ($admin as $value) {
      ?>
      <?php echo $value['total'];?>
      <?php 
    }
    ?>
  </span>
</p>
    </span>
          </div>
          <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
              <form>
                  <!--begin: Head -->
    <div class="kt-head kt-head--skin-light kt-head--fit-x kt-head--fit-b">
        <h3 class="kt-head__title">
            User Notifications
            &nbsp;
            <!-- <span class="btn btn-label-primary btn-sm btn-bold btn-font-md"><?php echo count($plan)?></span> -->
        </h3>
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
            </li>
         
        </ul>
    </div>
<!--end: Head -->

<div class="tab-content">
    <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
        <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
          <?php
          foreach ($adminaudit as $create) {
            if($create['notification_status']==1)
            {

         ?>
            <a href="view/audit/auditCreateAdmin.php" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-line-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                    <?php echo $create['title']; ?> - has been created
                    </div>
                    <div class="kt-notification__item-time">
                      <?php echo $create['updated_time']; ?>
                    </div>
                </div>
            </a>
         <?php
       }
     }
       ?>
        <?php
          foreach ($adminaudit as $create) {
            if($create['kickoff_notification_status']==1)
            {

         ?>
            <a href="view/audit/auditPerformAdmin.php" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-line-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                    <?php echo $create['title']; ?> -has been Scheduled
                    </div>
                    <div class="kt-notification__item-time">
                      <?php echo $create['updated_time']; ?>
                    </div>
                </div>
            </a>
         <?php
       }
     }
       ?>
        <?php
          foreach ($adminaudit as $create) {
            if($create['respond_notification_status']==1)
            {

         ?>
            <a href="view/audit/auditPerformAdmin.php" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-line-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                    <?php echo $create['title']; ?>- has been Responded
                    </div>
                    <div class="kt-notification__item-time">
                      <?php echo $create['updated_time']; ?>
                    </div>
                </div>
            </a>
         <?php
       }
     }
       ?>
         <?php
          foreach ($adminaudit as $create) {
            if($create['review_notification_status']==1)
            {

         ?>
            <a href="view/audit/auditPublished.php" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-line-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                    <?php echo $create['title']; ?> -has been Reviewed
                    </div>
                    <div class="kt-notification__item-time">
                      <?php echo $create['updated_time']; ?>
                    </div>
                </div>
            </a>
         <?php
       }
     }
       ?>

         
        </div>
    </div>

</div>
              </form>
          </div>
      </div>
      <?php
    }
    ?>

<!-- <div id="google_translate_element"></div> -->
<div class="kt-header__topbar-item kt-header__topbar-item--langs">
   <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
     <span class="kt-header__topbar-icon" title="Logout" onclick="logout();">
 <img src="./assets/media/icons/logout.svg" alt="" />
</span>
   </div>
</div>

</div>

<!-- end:: Header Topbar -->
</div>
</div>
</div>
</div>
</div>

</div>


<script type="text/javascript">
    function logout(){
                debugger
                 $.ajax({
                        dataType: "json",
                        type: "POST",
                        url: "/freshgrc/logout.php"
                         });
                 window.location="/freshgrc/logout.php";
            }
</script>

        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
<script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="./assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<!-- <script src="./assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script> -->
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
<!--end::Global Theme Bundle -->

                    <!--begin::Page Vendors(used by this page) -->
                            <script src="./assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
                            <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
                            <script src="./assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
                        <!--end::Page Vendors -->
         
                    <!--begin::Page Scripts(used by this page) -->
                            <!-- <script src="./assets/js/demo3/pages/dashboard.js" type="text/javascript"></script> -->
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->
</html>