<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/disaster/disasterManager.php';
  $disasterManager = new DisasterManager();
  $id = $_REQUEST['id'];     
  $allReport = $disasterManager->getReport($id);
  $scope =  $allReport[0]['scope'];
  $summary=  $allReport[0]['summary'];
  $purpose= $allReport[0]['purpose'];
  $disaster_definition= $allReport[0]['disaster_definition'];
  $areawide_disaster= $allReport[0]['areawide_disaster'];
  $company_name= $allReport[0]['company_name'];
  $contracted_name = $allReport[0]['contracted_name'];
  $covered_system_name =$allReport[0]['covered_system_name'];
  $internal_name = $allReport[0]['internal_name'];
  $internal_email = $allReport[0]['internal_email'];
  $internal_system =$allReport[0]['internal_system'];
  $internal_phone= $allReport[0]['internal_phone'];
  $external_name = $allReport[0]['external_name'];
  $external_phone= $allReport[0]['external_phone'];
  $external_email = $allReport[0]['external_email'];
  $external_system =$allReport[0]['external_system'];
  $system_name= $allReport[0]['system_name'];
  $backup_backup = $allReport[0]['backup_backup'];
  $backup_company_name=$allReport[0]['backup_company_name'];
  $backup_offsite_location =$allReport[0]['backup_offsite_location'];
  $backup_contractor_name = $allReport[0]['backup_contractor_name'];
  $training_date =$allReport[0]['training_date'];
  $summary_of_changes= $allReport[0]['summary_of_changes'];
  $approval_date =$allReport[0]['approval_date'];
  $approver_name_and_sign=$allReport[0]['approver_name_and_sign'];
?>
<!DOCTYPE html>

<html lang="en" >
    <!-- begin::Head -->
    <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>Fresh GRC Admin</title>
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
  
                    
   <link href="./assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
    
        <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
</head>
<?php 
        include '../siteHeader.php';
        ?>

<body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" >

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
<h3 class="kt-portlet__head-title" style="color: white;">
DISASTER RECOVERY REPORT
</h3>
</div>

</div>
<div class="panel-body">
<div class="form-group row">                      
<div class="col-md-4">
<label >Summary</label>
<input class="form-control" type="text" value="<?php echo $summary ?>" readonly>
</div>
<div class="col-md-4">
<label >Scope</label>
<input class="form-control" type="text" value="<?php echo $scope ?>" readonly>
</div>
<div class="col-md-4">
<label >Purpose</label>
 <input class="form-control" type="text" value="<?php echo $purpose ?>" readonly>
</div>
</div>                                      
<div class="form-group row">
<div class="col-md-4">
<label >Disaster Defination</label>
<input class="form-control" type="text" value="<?php echo $disaster_definition ?>" readonly>
</div>
<div class="col-md-4">
<label >Areawide Disaster</label>
 <input class="form-control" type="text" value="<?php echo $areawide_disaster ?>" readonly>
</div>
</div> 
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333"><b>Contractual Agreement</b></div>
<div class="form-group row" style="margin: 20px">                      
<div class="col-md-4">
<label >Company Name</label> 
<input class="form-control" type="text" value="<?php echo $company_name ?>" readonly> 
</div>                                                            
<div class="col-md-4">
<label >Contractor Name</label> 
<input class="form-control" type="text" value="<?php echo $contracted_name ?>" readonly> 
</div>                                                           
<div class="col-md-4">
<label >Covered System Name</label> 
<input class="form-control" type="text" value="<?php echo $covered_system_name ?>" readonly> 
</div>                                       
</div>  
</div>
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333"><b>POC Internal</b></div>
<div class="form-group row" style="margin: 20px">                      
<div class="col-md-4">
<label >Name</label> 
<input class="form-control" type="text" value="<?php echo $internal_name ?>" readonly> 
</div>                                                            
<div class="col-md-4">
<label >Contact No</label> 
<input class="form-control" type="text" value="<?php echo $internal_phone ?>" readonly> 
</div>                                                           
<div class="col-md-4">
<label >Email</label> 
<input class="form-control" type="text" value="<?php echo $internal_email ?>" readonly> 
</div>                                       
</div>  
</div>
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333"><b>POC External</b></div>
<div class="form-group row" style="margin: 20px">                      
<div class="col-md-4">
<label >Name</label> 
<input class="form-control" type="text" value="<?php echo $external_name ?>" readonly>
</div>                                                            
<div class="col-md-4">
<label >Contact No</label> 
<input class="form-control" type="text" value="<?php echo $external_phone ?>" readonly> 
</div>                                                           
<div class="col-md-4">
<label >Email</label> 
<input class="form-control" type="text" value="<?php echo $external_email ?>" readonly>
</div>                                       
</div>  
</div> 
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333"><b>BackUp & Storage Information</b></div>
<div class="form-group row" style="margin: 20px">                      
<div class="col-md-4">
<label >System Name</label> 
<input class="form-control" type="text" value="<?php echo $system_name ?>" readonly>
</div>                                                            
<div class="col-md-4">
<label >Backup</label> 
<input class="form-control" type="text" value="<?php echo $external_phone ?>" readonly> 
</div>                                                           
<div class="col-md-4">
<label >Company Name</label> 
<input class="form-control" type="text" value="<?php echo $backup_backup ?>" readonly>
</div>                                       
</div> 
<div class="form-group row" style="margin: 20px">                      
<div class="col-md-4">
<label >Offsite Location</label> 
<input class="form-control" type="text" value="<?php echo $backup_offsite_location ?>" readonly>
</div> 
<div class="col-md-4">
<label >Contractor Name</label> 
<input class="form-control" type="text" value="<?php echo $backup_contractor_name ?>" readonly>
</div>     
</div>  
</div> 
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333"><b>Review&Approval</b></div>
<div class="form-group row" style="margin: 20px">                      
<div class="col-md-4">
<label >Review Date</label> 
<input class="form-control" type="text" value="<?php echo $training_date ?>" readonly>
</div>                                                            
<div class="col-md-4">
<label >Summary Of Changes</label> 
<input class="form-control" type="text" value="<?php echo $summary_of_changes ?>" readonly>
</div>                                                           
<div class="col-md-4">
<label >Approver Name</label> 
<input class="form-control" type="text" value="<?php echo $approver_name_and_sign ?>" readonly>
</div>                                       
</div> 
<div class="form-group row" style="margin: 20px">                      
<div class="col-md-4">
<label >Approver Date</label> 
<input class="form-control" type="text" value="<?php echo $approval_date ?>" readonly>
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
        $currentMenu = 'auditorAdmin';
        include '../audit/sidemenu.php';
         $userRole = $_SESSION['user_role'];

    ?>
<!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
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
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
          
      <script src="./assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
      <script type="text/javascript" src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>
<!--end::Global Theme Bundle -->

                    <!--begin::Page Vendors(used by this page) -->
                            <script src="./assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
                        <!--end::Page Vendors -->
         
                    <!--begin::Page Scripts(used by this page) -->
                            <script src="./assets/js/demo3/pages/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
    </body>
    
</html>
<script type="text/javascript">
  $('#cmd').click(function() {
    var element = document.getElementById('element-to-print');
      html2pdf(element, {
        margin:       0,
        filename:     'DisasterReport.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'in', format: 'a3', orientation: 'portrait' }
    });
  });
</script>  