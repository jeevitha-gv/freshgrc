<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/company/companyManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once '../../php/common/dashboard.php';
require_once __DIR__.'/../../php/incident/incidentManager.php';
 $incidentManager = new IncidentManager();
     $IncidentId = $_GET['IncidentId'];
 $incidentData = $incidentManager->getIncidentData($IncidentId);
 $ReportedBy = $incidentManager->getIncidentDataReportedBy($IncidentId);
 $Assignee = $incidentManager->getIncidentDataAssignee($IncidentId);
$resolution = $incidentManager->getIncidentDataResolution($IncidentId);
$closure = $incidentManager->getIncidentDataClosure($IncidentId);


?>

<!DOCTYPE html>

<html lang="en" >
    <!-- begin::Head -->
    <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>Incident List</title>
        <meta name="description" content="Buttons examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->

                    <!--begin::Page Vendors Styles(used by this page) -->
                            <link href="./assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
                        <!--end::Page Vendors Styles -->
        
        
        <!--begin:: Global Mandatory Vendors -->
<link href="assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
<link href="assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

     
  <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <!-- <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>  -->
      
    <!-- <script type="text/javascript" src="assets/DataTables/DataTables-1.10.12/js/jquery.dataTables.min.js"></script> -->
        <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/dataTables.buttons.min.js"></script> 
           <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.flash.min.js"></script> 
        <script type="text/javascript" src="../../assets/DataTables/pdfmake.min.js"></script>
        <script type="text/javascript" src="../../assets/DataTables/pdfmake-0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>  
  
    <script src="js/audit/auditCreateManagement.js"></script>
                    
   <link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
           
        <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
    </head>
   <?php
   include "../siteHeader.php";
   ?>
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >
  
    <!-- begin:: Page -->

<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<i class="fa fa-file-pdf" id="cmd" data-toggle="tooltip" title="PDF" style="font-size: 30px; float: right; color: #2a5aa8;"></i> <br><br>

<div class="kt-portlet" id="element-to-print">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;"> 
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color:white;">
Incident Report
</h3>
</div>

</div>

<div class="kt-portlet__body">
<!--begin: Datatable -->
 <div class="" style="margin-top:50px;">
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Title</label>
<span id="IncidentTitle" class="form-control"><?php echo $incidentData[0]["Incident"];?></span> 
</div> 
<div class="col-md-4 input_val">
<label>Category</label>
<span id="IncidentCategory" class="form-control"><?php echo $incidentData[0]["Incident_Category"];?></span> 
</div> 
<div class="col-md-4 input_val">
<label>Sub-Category</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Incident_subCategory"];?></span> 
</div> 
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Date of Filling</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Date_of_Reported"];?></span> 
</div> 
<div class="col-md-4 input_val">
<label>Date of Occuring</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Date_of_Occured"];?></span> 
</div> 
<div class="col-md-4 input_val">
<label>Request Type</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Request_Type"];?></span> 
</div> 
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Contact No</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Phone"];?></span> 
</div> 
<div class="col-md-4 input_val">
<label>Urgency</label>
<span id="Urgency" class="form-control"><?php echo $incidentData[0]["Urgency"];?></span> 
</div> 
<div class="col-md-4 input_val">
<label>Impact</label>
<span id="Impact" class="form-control"><?php echo $incidentData[0]["Impact"];?></span> 
</div> 
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Priority</label>
<span id="Priority" class="form-control"><?php echo $incidentData[0]["Priority"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Reported By</label>
<span id="PolicyId" class="form-control"><?php echo $ReportedBy[0]["Reportedby"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Recorded By</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["RecordedBy"];?></span> 
</div>
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Response Team</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Incidentresponseteam"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Description of Event</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Description_of_Event"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Impacted Department</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Impacted_Department"];?></span> 
</div>
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Line of Business</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Line_of_Business"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Channel Impacted</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Channel_Impacted"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Assignee</label>
<span id="PolicyId" class="form-control"><?php echo $Assignee[0]["Assignee"];?></span> 
</div>
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Esclation Users</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Esclation_User"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Risk Category</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["IncidentManager_Category"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Risk SubCategory</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["IncidentManager_SubCategory"];?></span> 
</div>
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Risk Category2</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Manager_Category2"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Quantified Loss</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Quantified_Loss"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Realised Loss</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Currency"];?> <?php echo $incidentData[0]["Realised_Loss"];?></span> 
</div>
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Policies Impacted</label>
<span id="PolicyId" class="form-control"><?php echo $incidentData[0]["Policies_Impacted"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Course Classification</label>
<span id="PolicyId" class="form-control"><?php echo $resolution[0]["course_classification"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Resolution Comment</label>
<span id="PolicyId" class="form-control"><?php echo $resolution[0]["comment"];?></span> 
</div>
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Action Taken</label>
<span id="PolicyId" class="form-control"><?php echo $resolution[0]["actiontaken"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Management Action Plan Member</label>
<span id="PolicyId" class="form-control"><?php echo $resolution[0]["managementactionplan"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Impact Status</label>
<span id="PolicyId" class="form-control"><?php echo $resolution[0]["selectimapctstatus"];?></span> 
</div>
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Litigation</label>
<span id="PolicyId" class="form-control"><?php echo $resolution[0]["litigationstatus"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Root Cause</label>
<span id="PolicyId" class="form-control"><?php echo $closure[0]["root_cause"];?></span> 
</div>
<div class="col-md-4 input_val">
<label>Evaluate</label>
<span id="PolicyId" class="form-control"><?php echo $closure[0]["evaluate"];?></span> 
</div>
</div>
<div class="row form-group">
<div class="col-md-4 input_val">
<label>Closure Status</label>
<span id="PolicyId" class="form-control"><?php echo $closure[0]["review_status"];?></span> 
</div>
</div>
<!-- <div class="row form-group">
<div class="col-md-4 input_val">
 <div class="panel ">
<div class="panel-heading"  style="background-color: #f5f5f5;font-weight:100;font-size:12px;"><b>Status</b></div>
<span class="reportdata" class="form-control"><?php echo $incidentData[0]["Status"];?></span> 
</div>
</div>
<div class="col-md-4 input_val">
 <div class="panel ">
<div class="panel-heading"  style="background-color: #f5f5f5;font-weight:100;font-size:12px;"><b>Comment</b></div>
<span class="reportdata" class="form-control"><?php echo $incidentData[0]["Comment"];?></span> 
</div>
</div>
<div class="col-md-4 input_val">
 <div class="panel ">
<div class="panel-heading"  style="background-color: #f5f5f5;font-weight:100;font-size:12px;"><b>Summary</b></div>
<span class="reportdata" class="form-control"><?php echo $incidentData[0]["Summary"];?></span> 
</div>
</div>
</div> -->
</div>

                                               
                                    
                                                   
                                      
                             
                                        
                                     
                                      
                                      
                         
                         
                        
                       
                       
</div>
</div>
 </div>  

<!--       <button class="btn btn-circle danger" id="cmd" style="background-color: #ed6b75;color: #fff;border: none;margin-left: 70%;margin-top: -40px;"><i class="fa fa-file-pdf-o" aria-hidden="true" style="padding-right: 10px;"></i>Download PDF</button>
          <button class="btn btn-circle green" style="background-color: #337ab7;color: #fff;border: none;margin-top: -78px;margin-left: 84%;"><i class="fa fa-file-zip-o" aria-hidden="true" style="padding-right: 10px;"></i>Download Zip</button>  
 -->
</div>
</div>
</div>

</div>
</div>

        <!-- begin::Global Config(global config for global JS sciprts) -->
        <!-- <script src="js/audit/auditprepareManagement.js"></script> -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
    <script type="text/javascript"></script>
<script src="assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
<script type="text/javascript" src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>
<!--end:: Global Mandatory Vendors -->


<!--begin::Global Theme Bundle(used by all pages) -->
          
      <script src="assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
<!--end::Global Theme Bundle -->

                    <!--begin::Page Vendors(used by this page) -->
                            <script src="assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
                        <!--end::Page Vendors -->
         
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
            </body>
    <!-- end::Body -->
</html>
<?php 
include "../audit/sidemenu.php";

 ?> 
 <script type="text/javascript">
     $(function() {
        $(".datepickerClass").datepicker();
        $('.ui-datepicker').addClass('notranslate');
    });

 $('#cmd').click(function() {
var element = document.getElementById('element-to-print');
html2pdf(element, {
  margin:       0,
  filename:     'IncidentReport.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { dpi: 192, letterRendering: true },
  jsPDF:        { unit: 'in', format: 'a3', orientation: 'portrait' }
});
});

</script>
