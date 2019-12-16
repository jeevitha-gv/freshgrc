<?php
 require_once __DIR__.'/../header.php';
  require_once __DIR__.'/../../php/asset/assetManager.php';
 $manager = new AssetManager();
    $userId = $_POST['userId'];
    $userRole = $_POST['userRole'];
    $allAssets = $manager->getAllreport($userId);
?>

<!DOCTYPE html>

<html lang="en" >
   <!-- begin::Head -->
    <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>freshGRC</title>
        <meta name="description" content="Buttons examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->

                    <!--begin::Page Vendors Styles(used by this page) -->
                            <link href="./assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
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
 <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
 <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
    </head>
   <?php 
   include '../siteHeader.php';
?>
  <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >

       
    <!-- begin:: Page -->


<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin-top:-14%">



<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
Report
</h3>
</div>

</div>

<div class="kt-portlet__body"style="overflow-x:scroll;">


<tbody>
            <?php if($_SESSION['user_role'] == 'auditor') {?>
               <!--  <div class="col-xs-2" id="create1">
                    <button class="btn btn-warning btn-block" style="background-color: #aa66ce" 
                    onclick="window.location.href='/freshgrc/view/audit/auditPlanCreate.php'"><i class="fa fa-user"></i> Create Audit</button>
                </div>
                <div class="col-xs-2" id="publishAudit">
                    <button class="btn btn-warning btn-block " style="background-color: #aa66ce" 
                    onclick="publishAuditList()"><i class="fa fa-user"></i>Published Audits</button>
                </div> -->
            <?php }?>
            
               <!--  <div class="col-xs-2" id="kickOffbtn">
                    <button class="btn btn btn-block" onclick="performAuditActions()" style="background: #42a8ff;"><i class="fa fa-file"></i>
                    Kick off</button>
                </div> -->
                <!-- <div class="col-xs-2" id="CheckForAuditorbtn">
                    <button class="btn  btn-block" onclick="performAuditActions()" style="background: #42a8ff;"><i class="fa fa-file"></i>
                    Review </button>
                </div> -->
              <?php if($_SESSION['user_role'] == 'auditor') {?>
                
                <!-- <div class="col-xs-2" id="auditeeDoPending">
                    <button class="btn  btn-block" onclick="performAuditActions()" style="background: #42a8ff;"><i class="fa fa-file"></i>
                     Response Pending</button>
                </div> -->
              <!--   <div class="col-xs-2" id="btnForApproved">
                    <button class="btn  btn-block" onclick="performAuditActions()" style="background: #42a8ff;"><i class="fa fa-file"></i>
                     Publish Audit</button>
                </div> -->
            <?php }?>
            <?php if($_SESSION['user_role'] == 'auditee') {?>
               <!--  <div class="col-xs-2" id="auditeeResponse" >
                    <button class="btn  btn-block" onclick="performAuditActions()" style="background: #42a8ff;"><i class="fa fa-file"></i>
                    Respond</button>
                </div>
                <div class="col-xs-2" id="btnForAct" >
                    <button class="btn  btn-block" onclick="performAuditActions()" style="background: #42a8ff;"><i class="fa fa-file"></i>
                    Follow Up</button>
                </div> -->
            <?php }?>
               <!--  <div class="clearfix" id="reportButton">
                    <button class="btn btn-primary" onclick="viewReport()" style="margin-left: 20px;margin-top: -8px;"><i class="fa fa-file"></i> Report</button>
                </div> -->
         
            <br/>
            <br/>

<!--begin: Datatable -->
<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
<thead>
  <tr>
  <th>ID</th>
  <th>Name</th>
  <th>Asset Group</th>
  <th>Retention Period</th>
  <th>Owner Name</th>
  <th>Company Name</th>
  <th>Asset Status</th>
 <th>Action</th>
  </tr>
</thead>

<tbody>
<?php foreach ($allAssets as $data) { ?>
                    <tr>
                    <td style="display: none;"><?php echo $data['assetId'];?></td>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo $data['assetGroup'];?></td>
                    <td><?php echo $data['retentionPeriod'];?></td>
                    <td><?php echo $data['ownerName'];?></td>
                    <td><?php echo $data['companyName'];?></td>
                    <td><?php echo $data['status'];?></td>
                    <td><button class="btn btn-success"><a href="/freshgrc/view/asset/assetReport.php?id=<?php echo $data['assetId']; ?>" style="color: white;">Report</a></button></td>
                   
                    </tr>
                  <?php } ?>
</tbody>


</table>
                                </div>
                            </div>
                       
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>    

<div>
<?php
include '../audit/sidemenu.php';
 ?>

        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
    
     
  <script src="js/asset/assetReportlistManagement.js"></script>
<script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="./assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="./assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="./assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="./assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="./assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

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

<script src="./assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>

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
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->
</html>
