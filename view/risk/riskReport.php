<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/risk/riskManager.php';
require_once __DIR__.'/../../php/risk/riskMitigationManager.php';
require_once __DIR__.'/../../php/risk/riskReviewManager.php';
$GLOBALS['RiskId'] = $_GET['RiskId'];
$RiskId = $_GET['RiskId'];
$manager = new RiskManager();
$riskPlanReport = $manager->getRiskPlanReport($RiskId);
$manager = new RiskMitigationManager();
$riskMitigationReport = $manager->getRiskMitigationReport($RiskId);
$manager = new RiskReviewManager();
$riskReviewReport = $manager->getRiskReviewReport($RiskId);

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
    <script src="js/risk/riskManagement.js"></script>
    <!-- <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>  -->
      
    <!-- <script type="text/javascript" src="assets/DataTables/DataTables-1.10.12/js/jquery.dataTables.min.js"></script> -->
        <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/dataTables.buttons.min.js"></script> 
        <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.flash.min.js"></script> 
        <script type="text/javascript" src="../../assets/DataTables/pdfmake.min.js"></script>
        <script type="text/javascript" src="../../assets/DataTables/pdfmake-0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="../../assets/DataTables/Buttons-1.2.1/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>  
       <script type="text/javascript" src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>
                    
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
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper"style="margin-top: -13%;">
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<i class="fa fa-file-pdf" id="cmd" data-toggle="tooltip" title="PDF" style="font-size: 30px; float: right; color: #2a5aa8;margin-left:7px;margin-top:85px; "></i>

  

     <div>
        <p style="margin-left: 45%;"><img src="./assets/media/logos/fixnix.png" class="img-responsive" alt="fixnix" style="width:75px;"></p>

      <h3 style="margin-left:43%;color:#333;margin-top:-2%;"> <span><?php echo $riskPlanReport[0]['Subject'];?></span></h3>
    </div><br>
     
         
      <div class="row" style="margin-left: 10%;color:#333">
   
    <div class="col-md-4">
      <div>
        <p for="lname"><b>Report Creator:</b>&nbsp;&nbsp;&nbsp;Risk Mitigator</p>
      </div>
    </div>
    <div class="col-md-4">
      <div>
        <?php
          $dt = new DateTime();
        ?>
         <p for="date"><b>Report Created Date:</b>&nbsp;&nbsp;&nbsp;<?php echo $dt->format('Y-m-d') ?></p>
      </div>
    </div>
    <div class="col-md-4">
      <div>
        <?php
          $dt = new DateTime();
        ?>
         <p for="time"><b>Report Created Time: </b>&nbsp;&nbsp;&nbsp;<?php echo $dt->format('H:i:s') ?></p>
      </div>
    </div>
    </div> 

<div class="kt-portlet"  id="element-to-print">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
REPORT
</h3>
</div>

</div>

        <div class="panel-body" style="overflow-x:scroll; "><br>
        <!--   <div class="table-responsive"> -->
             <div class="panel-body" style="border:1px solid #CEE0DD;">
            <h4>Plan:</h4>
            <div class="row form-group">
              <div class="col-sm-4 input_val"> 
            <label>Created Date:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['CreatedDate'];?></span>
             </div>
             <div class="col-sm-4 input_val"> 
              <label>Subject:</label>
                <input type="hidden" name="RiskId" id="RiskId" value="<?php echo $RiskId;?>">
                <span class="form-control"><?php echo $riskPlanReport[0]['Subject'];?></span>
              </div>
              <div class="col-sm-4 input_val"> 
                <label>Risk Priority:</label><br>
                <?php 
                if ($riskPlanReport[0]['Risk_Status']==null){
                     $riskPlanReport[0]['Risk_Status']="None";
                    echo $riskPlanReport[0]['Risk_Status'];
                  }
                  elseif ($riskPlanReport[0]['Risk_Status']==1) {
                    $riskPlanReport[0]['Risk_Status']="Medium";
                    echo "<p class='btn'  style='width:114px; height:50% ; background-color:#7bea4e; color:#fff; text-align:center;'>".$riskPlanReport[0]['Risk_Status']."</p>";

                  }
                  elseif ($riskPlanReport[0]['Risk_Status']==2) {
                    $riskPlanReport[0]['Risk_Status']="High";
                    echo "<p class='btn'  style='width:114px; height:50% ; background-color:#ee5151; color:#fff; text-align:center;'>".$riskPlanReport[0]['Risk_Status']."</p>";
                  }
                  elseif ($riskPlanReport[0]['Risk_Status']==3) {
                    # code...
                    $riskPlanReport[0]['Risk_Status']="Extreme";
                    echo "<p class='btn'  style='width:90px;  background-color:red; color:#fff; text-align:center;margin-left:20px;'>".$riskPlanReport[0]['Risk_Status']."</p>";
                  }
                  elseif($riskPlanReport[0]['Risk_Status']==0){
                    $riskPlanReport[0]['Risk_Status']="Low";
                    echo "<p class='btn'  style='width:114px; height:50% ; background-color:#5cb85c; color:#fff; text-align:center;'>".$riskPlanReport[0]['Risk_Status']."</p>";
                  }?>
             </div>
           </div>
           <div class="row form-group">
              <div class="col-sm-4 input_val">
            <label>Category :</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['Category'];?></span>
             </div>
              <div class="col-sm-4 input_val">
            <label>Location:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['Location'];?></span>
             </div>
              <div class="col-sm-4 input_val">                       
             <label>Control Number:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['ControlNumber'];?></span>
            </div> 
            </div>
              
            
           <div class="row form-group">
              <div class="col-sm-4 input_val"> 
           <label>Affected Assets:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['AffectedAsset'];?>
              </span>
             </div> 
             <div class="col-sm-4 input_val"> 
           <label>Technology:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['Technology'];?></span>
               </div>   
             <div class="col-sm-4 input_val">                       
              <label>Team:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['Team'];?></span>
              </div>
            </div><br>
                                       
           <div class="row form-group">
              <div class="col-sm-4 input_val">  
           <label>Risk Source:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['Source'];?></span>
               </div> 
                <div class="col-sm-4 input_val">    
            <label>Risk Scoring Method:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['ScoringMethod'];?></span>
              </div>
               <div class="col-sm-4 input_val">                     
              <label>Owner:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['Owner'];?></span>
              </div>
              </div><br>
                
               <div class="row form-group">
              <div class="col-sm-4 input_val">   
                <label>Risk Assesment:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['RiskAssessment'];?></span>
              </div>
               <div class="col-sm-4 input_val">   
              <label>Additional Notes:</label>
                <span class="form-control"><?php echo $riskPlanReport[0]['AdditionalNotes'];?></span>
              </div>
             </div>
          
        </div><br><br>
        

           <div class="panel-body"  style="border:1px solid #CEE0DD;">
              <h4>Mitigate:</h4><br>
            <div class="row form-group">
              <div class="col-sm-4 input_val"> 
            <label>Planned Mitigation Date:</label>
                <span  class="form-control"><?php echo $riskMitigationReport[0]['PlannedMitigationDate'];?></span>
             </div>
             <div class="col-sm-4 input_val"> 
            <label>Planning strategy:</label>
                <span  class="form-control"><?php echo $riskMitigationReport[0]['PlanningStratergy'];?></span>
              </div>
              <div class="col-sm-4 input_val"> 
           <label>Mitigation Effort:</label>
                <span  class="form-control"><?php echo $riskMitigationReport[0]['MitigationEffort'];?></span>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-sm-4 input_val"> 
            <label>Mitigation Team:</label>
                <span  class="form-control"><?php echo $riskMitigationReport[0]['MitigationTeam'];?></span>
              </div>
             <div class="col-sm-4 input_val">  
             <label>Mitigation Cost:</label>
                <span  class="form-control"><?php echo $riskMitigationReport[0]['MitigationCost'];?></span>
              </div>
              <div class="col-sm-4 input_val"> 
             <label>Mitigation Owner:</label>
                <span  class="form-control"><?php echo $riskMitigationReport[0]['MitigationOwner'];?></span>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-sm-4 input_val"> 
            <label>Mitigation Percent:</label>
                <span class="form-control"><?php echo $riskMitigationReport[0]['MitigationPercent'];?></span>
              </div>
              <div class="col-sm-4 input_val">  
              <label>Security Recommendations:</label>
                <span class="form-control"><?php echo $riskMitigationReport[0]['SecurityRecomendation'];?></span>
             </div>
              <div class="col-sm-4 input_val"> 
              <label>Current Solution:</label>
                <span class="form-control"><?php echo $riskMitigationReport[0]['CurrentSolution'];?></span>
             </div>                         
           </div>

              <div class="col-sm-4 input_val" style="margin-left:-15px;"> 
                <label>Security Requirements:</label>
                <span class="form-control"><?php echo $riskMitigationReport[0]['SecurityRequirements'];?></span>
              </div>
             
         </div>
      </div>   
      <!--   </div> -->
        </div>
      
    <?php 
        include '../audit/sidemenu.php';
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
        filename:     'reportgenerator.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { dpi: 192, letterRendering: true },
        jsPDF:        { unit: 'in', format: 'a3', orientation: 'portrait' }
    });
  });
</script>