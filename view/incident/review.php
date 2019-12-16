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


<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;"> 
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color:white;">
Incident List
</h3>
</div>

</div>

<div class="kt-portlet__body" style="overflow-x: scroll;">
<!--begin: Datatable -->
 <div class="form-group row ">



                <table class="table table-bordered">
                        <tbody>
                         <tr style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333">
                           <td><b>Incident Requested Details<b></b></b></td><td>
                           </td><td></td>
                         </tr>
                         <tr>                          
                             <td><label class="col-sm-4">Title:</label>
                             <input type="hidden" name="IncidentTitle" id="IncidentTitle" value="<?php echo $IncidentTitle;?>">
                            <span><?php echo $incidentData[0]["Incident"];?></span>
                           </td>                             
                           <td><label class="col-sm-4">Category:</label>
                             <input type="hidden" name="IncidentCategory" id="IncidentCategory" value="<?php echo $IncidentCategory;?>">
                             <span><?php echo $incidentData[0]["Incident_Category"];?></span>
                           </td>
                            <td><label class="col-sm-4">Sub-Category:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Incident_subCategory"];?></span>
                           </td>
                         </tr>   
                        <tr>           
                            <td><label class="col-sm-4">Date of Filling:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Date_of_Reported"];?></span>
                           </td>
                           <td><label class="col-sm-4">Date of Occuring:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Date_of_Occured"];?></span>
                           </td>
                           <td><label class="col-sm-4">Request Type:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Request_Type"];?></span>
                           </td>
                         </tr> 
                         <tr>                            
                             <td><label class="col-sm-4">Contact No:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Phone"];?></span>
                           </td>
                           <td><label class="col-sm-4">Urgency:</label>
                             <input type="hidden" name="Urgency" id="Urgency" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Urgency"];?></span>
                           </td>
                           <td><label class="col-sm-4">Impact:</label>
                             <input type="hidden" name="Impact" id="Impact" value="<?php echo $Impact;?>">
                             <span><?php echo $incidentData[0]["Impact"];?></span>
                           </td>
                         </tr>        
                        <tr>                 
                             
                             <td><label class="col-sm-4">Priority:</label>
                             <input type="hidden" name="Priority" id="Priority" value="<?php echo $Priority;?>">
                             <span><?php echo $incidentData[0]["Priority"];?></span>
                           </td>
                           <td><label class="col-sm-4">Reported By:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $ReportedBy[0]["Reportedby"];?></span>
                           </td>
                            <td><label class="col-sm-4">Recorded By:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["RecordedBy"];?></span>
                           </td>
                         </tr> 
                         <tr>                
                             <td><label class="col-sm-4">Response Team:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Incidentresponseteam"];?></span>
                           </td>
                           <td><label class="col-sm-4">Description of Event:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Description_of_Event"];?></span>
                           </td>
                           <td><label class="col-sm-4">Impacted Department:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Impacted_Department"];?></span>
                           </td>
                         </tr>
                         <tr>                
                             <td><label class="col-sm-4">Line of Business:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Line_of_Business"];?></span>
                           </td>
                           <td><label class="col-sm-4">Channel Impacted:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Channel_Impacted"];?></span>
                           </td>
                           <td><label class="col-sm-4">Assignee:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $Assignee[0]["Assignee"];?></span>
                           </td>
                         </tr>
                         <tr>                
                             <td><label class="col-sm-4">Esclation Users:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Esclation_User"];?></span>
                           </td>
                           <td><label class="col-sm-4">Risk Category:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["IncidentManager_Category"];?></span>
                           </td>
                           <td><label class="col-sm-4">Risk SubCategory:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["IncidentManager_SubCategory"];?></span>
                           </td>
                         </tr>
                         <tr>                
                             <td><label class="col-sm-4">Risk Category2:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Manager_Category2"];?></span>
                           </td>
                           <td><label class="col-sm-4">Quantified Loss:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Quantified_Loss"];?></span>
                           </td>
                           <td><label class="col-sm-4">Realised Loss:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Currency"];?> <?php echo $incidentData[0]["Realised_Loss"];?></span>
                           </td>
                         </tr>
                         <tr>                
                             <td><label class="col-sm-4">Policies Impacted:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $incidentData[0]["Policies_Impacted"];?></span>
                           </td>
                           <td><label class="col-sm-4">Course Classification:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $resolution[0]["course_classification"];?></span></td>
                           <td><label class="col-sm-4">Resolution Comment:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $resolution[0]["comment"];?></span></td>
                         </tr>
                         <tr>                
                             <td><label class="col-sm-4">Action Taken:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $resolution[0]["actiontaken"];?></span>
                           </td>
                           <td><label class="col-sm-4">Management Action Plan Member:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $resolution[0]["managementactionplan"];?></span></td>
                           <td><label class="col-sm-4">Impact Status:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $resolution[0]["selectimapctstatus"];?></span></td>
                         </tr>
                         <tr>                
                             <td><label class="col-sm-4">Litigation:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $resolution[0]["litigationstatus"];?></span>
                           </td>
                           <td><label class="col-sm-4">Root Cause:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $closure[0]["root_cause"];?></span></td>
                           <td><label class="col-sm-4">Evaluate:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $closure[0]["evaluate"];?></span></td>
                         </tr>
                         <tr>                
                             <td><label class="col-sm-4">Closure Status:</label>
                             <input type="hidden" name="PolicyId" id="PolicyId" value="<?php echo $PolicyId;?>">
                             <span><?php echo $closure[0]["review_status"];?></span>
                           </td>
                           <td></td>
                           <td></td>
                         </tr>
                        </tbody>
                       </table>
                       <div class="panel ">
                        <div class="panel-heading"  style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333"><b>Status</b></div>
                        <div class="reportdata"><?php echo $incidentData[0]["Status"];?></div>
                       </div>                
                       <div class="panel ">
                        <div class="panel-heading" style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333"><b>Comment</b></div>
                        <div class="reportdata"><?php echo $incidentData[0]["Comment"];?></div>
                       </div>
                       <div class="panel ">
                        <div class="panel-heading" style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333"><b>Summary</b></div>
                        <div class="reportdata"><?php echo $incidentData[0]["Summary"];?></div>
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
