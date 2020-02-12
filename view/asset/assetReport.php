<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/audit/auditClauseManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once __DIR__.'/../../php/asset/assetManager.php';
require_once __DIR__.'/../../php/company/companyManager.php';
$assetId = $_GET['id'];
$user = new AssetManager();
$lastname = $user->getAlluser();
$classification = $user->getClassfication();
$asset_group = $user->getAssetGroup();
$assetDetails = $user->getAssetDetails($assetId);
$assetAssesmentDetails = $user->getAssetAssement($assetId);
$assetActionDetails = $user->getAssetAction($assetId);
$assetReviewDetails = $user->getAssetReview($assetId);

// print_r($assetReviewDetails);

$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
$companyId=$id[0]['id'];
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
<script type="text/javascript" src="../../assets/DataTables/pdfmake.min.js"></script>
<script type="text/javascript" src="../../assets/DataTables/pdfmake-0.1.18/build/vfs_fonts.js"></script>
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
  <style type="text/css">
    td{ height: 50px; }
    td,th { padding: 15px; }
    table { width: 100%; }
  </style>
</head>
   <?php 
   include '../siteHeader.php';
?>
  <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" style="background-color: #efefef;" >

       
    <!-- begin:: Page -->


<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="margin-top: -13%">
<i class="fa fa-file-pdf" id="cmd" data-toggle="tooltip" title="PDF" style="font-size: 30px; float: right; color: #2a5aa8;"></i> <br><br>

<div class="kt-portlet" id="element-to-print">
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

<div class="kt-portlet__body">

     
                  <div class="row form-group" >
                          <div class="col-md-6">
                               <label>Display Name</label><br>
                                   <span id="Displayname" class="form-control"> <p><?php echo $assetDetails[0]['name']; ?></p></span>
                              </div>
                              <div class="col-md-6">
                                   <label>Asset Group</label><br>
                                      <span id="Group" class="form-control" > <p><?php echo $assetDetails[0]['assetGroup']; ?></p></span>
                                     </div>
                                    </div>  
                  <div class="row form-group" >
                     <div class="col-md-6">
                       <label>Status</label><br>
                           <span id="status" class="form-control"><p><?php echo $assetDetails[0]['status']; ?></p></span>
                         </div>
                         <div class="col-md-6">
                           <label>Compliance Name</label><br>
                                  <span id="name" class="form-control" >  <p><?php echo $assetDetails[0]['complianceName']; ?></p></span>
                                  </div>


                                       </div>  

            
                 
                   <h5><b>Assignment / Security / CIA Information</b></h5><br><br>
                  
                                      <div class="row form-group" >
<div class="col-md-6">
<label>Owner</label><br>
<span id="Owner" class="form-control"> <p><?php echo $assetDetails[0]['custodianName']; ?></p></span>
</div>
<div class="col-md-6">
<label>Custodian</label><br>
<span id="Custodian" class="form-control" > <p><?php echo $assetDetails[0]['custodianName']; ?></p></span>
</div>


</div> 
                                      <div class="row form-group" >
<div class="col-md-6">
<label>Identifier</label><br>
<span id="Owner" class="form-control"> <p><?php echo $assetDetails[0]['ReviewerName']; ?></p></span>
</div>
<div class="col-md-6">
<label>Evaluator/CIO</label><br>
<span id="description" class="form-control" > <?php echo $assetDetails[0]['description']; ?></p></span>
</div>


</div> 
                                      <div class="row form-group" >
<div class="col-md-6">
<label>Location</label><br>
<span id="locationname" class="form-control"> <?php echo $assetDetails[0]['locationname']; ?></p></span>
</div>
<div class="col-md-6">
<label>Department</label><br>
<span id="departmentname" class="form-control" > <?php echo $assetDetails[0]['departmentname']; ?></p></span>
</div>


</div> 
                                      <div class="row form-group" >
<div class="col-md-6">
<label>Confidentiality</label><br>
<span id="confidentiality" class="form-control"> <p><?php echo $assetDetails[0]['confidentiality']; ?></p></span>
</div>
<div class="col-md-6">
<label>Integrity</label><br>
<span id="integrity" class="form-control" > <p><?php echo $assetDetails[0]['integrity']; ?></p></span>
</div>


</div> 
                                      <div class="row form-group" >
<div class="col-md-6">
<label>Availability</label><br>
<span id="availability" class="form-control"> <p><?php echo $assetDetails[0]['availability']; ?></p></span>
</div>
<div class="col-md-6">
<label>Personal Data </label><br>
<span id="personal_data" class="form-control" > <p><?php echo $assetDetails[0]['personal_data']; ?></p></span>
</div>


</div> 
                                      <div class="row form-group" >
<div class="col-md-6">
<label>Sensitive Data </label><br>
<span id="sensitive_data" class="form-control"> <p><?php echo $assetDetails[0]['sensitive_data']; ?></p></span>
</div>
<div class="col-md-6">
<label>Customer Data</label><br>
<span id="customer_data" class="form-control" > <p><?php echo $assetDetails[0]['customer_data']; ?></p></span>
</div>


</div> 
 <div class="row form-group" >
        <div class="col-md-12">
<label>Classification</label><br>
<span id="name" class="form-control" > <p><?php echo $assetDetails[0]['name']; ?></p></span>
</div>
</div>
      
            <div style="text-align: center;font-size: 15px;font-weight: bold; margin: 15px;">Asset Properties</div>  
             <div style="text-align: center;font-size: 15px;font-weight: bold; margin: 15px;">Current Level Of Production</div>         
            <table class="table table-striped list-table table-bordered" style="border-color:#A1E6EA" >
              <tr >
                  <th>When Info Is In Rest</th>
                  <th>When Info Is Moved</th>
              </tr>
              <tr>
                <td><?php echo $assetDetails[0]['at_origin']; ?></td>
                <td><?php echo $assetDetails[0]['info_moved']; ?></td>
              </tr>      
            </table>
            <div class="panel panel-default" style="border-color:#A1E6EA">             
              <div class="panel-body"  >
                                                      <div class="row form-group" >
<div class="col-md-6">
<label><b>Assessment</b> </label><br>
<span id="assessment" class="form-control"> <p><?php echo $assetAssesmentDetails[0]['assessment']; ?></p></span>
</div>
<div class="col-md-6">
<label><b>Review Decision</b> </label><br>
<span id="asset_decision" class="form-control" > <p><?php echo $assetReviewDetails[0]['asset_decision']; ?></p></span>
</div>
            

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
    
     
    <script src="js/compliance/complianceCreateManagement.js"></script>
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
<script type="text/javascript" src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>
<script src="./assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->
</html>
<script type="text/javascript">
  $('#cmd').click(function() {
    var element = document.getElementById('element-to-print');
      html2pdf(element, {
        margin:       0,
        filename:     'AssetReport.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'in', format: 'a3', orientation: 'portrait' }
    });
  });
</script> 