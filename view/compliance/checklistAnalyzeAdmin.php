<?php

require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/compliance/clauseManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';

$complianceId = $_GET['complianceId'];
$userRole = $_SESSION['user_role'];
$complianceManager = new ComplianceManager();
$complianceData = $complianceManager->getComplianceData($complianceId, $userRole);
$complianceName = $complianceData['complianceName'];
$version = $complianceData['version'];
$clauseManager = new ClauseManager();
$allClauses = $clauseManager->getAllClauses($complianceData);
$accordionId = $complianceId;
$isViewOnly = $complianceData['isViewOnly'];
$isActive = $complianceData['isActive'];
$complStatus = $complianceData['status'];
$GLOBALS['workingStatus'] = $complianceData['workingStatus'];
error_log("all clauses".print_r($GLOBALS['workingStatus'],true));
function tabledata($clause){ 
     error_log("clause: ".print_r($clause,true));
     ?>     


    
    
       <?php  
        if($clause['subClauses']!=null){
            ?>
             <tr>
            <td hidden></td>
           <td ><?php echo $clause['clauseName'] ?></td>
           
           <td></td>
           <td></td>
           <td></td>
                
                
            </tr>
                               
           
            
           
            
            
        
        <?php 
            foreach($clause['subClauses'] as $subClause)
            {
        tabledata($subClause);            
        } }

        else{
            /*array_push($GLOBALS['allClausesArray'],$clause['clauseId']);*/
            foreach($clause['checklists'] as $checklist){
            ?>
                <tr>
            <td hidden></td>
            <td></td>
            <td><?php echo $checklist['checklistDesc'] ?></td>
            <td><?php echo $checklist['checklistScore'] ?></td> 
            <td>
            <div class="col-xs-2" style="width: 180px" >
                        <button class="btn btn-error btn-block" onclick="analyzeClause(<?php echo $checklist['checklistId'] ?>)"><i class="fa fa-list"></i>Analyze</button>
                    </div>
            </td>
                  
                   
            </tr>
            <!-- /////////////////////////////////////// -->
            

  <!-- Modal -->
  
  

           
            

          
          
               
        
 <?php   }
    }
}
    

 
?>
<!DOCTYPE html>
<html>

      <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>freshgrc</title>
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

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper"style="margin-top:-10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

<div class="kt-portlet__body">
 <div >
            <div class="panel panel-primary" style="background: ">
                <div class="panel-heading">
                    <h3 class="panel-title pull-left"> Compliance Clauses for
                        <?php echo $complianceName?> -
                        <?php echo $version?> - <?php echo $complStatus?></h3>
                    <div class="pull-right">
<button class="btn btn-danger" style="float:right; margin-bottom: 19px;" onclick="saveComplStatus(false)" <?php if($workingStatus!="prepare pending") echo "style='display:none'" ?>><i class="fa fa-file"></i> Complete</button>
                    </div>
                    <div class="clearfix"></div>                    
                </div>
            </div>    
            <div>
 <div class="kt-portlet-body " style="overflow-x:scroll;">

   <table id="kt_table_1" class="table table-striped table-bordered table-hover table-checkable">

            
                
                <?php
                error_log("all clause".print_r($allClauses,true)); 
                
                foreach($allClauses as $clauses)
                {
                    ?>
                    <thead>
                       
                    
                    <tr>
                        <th hidden>Control Id</th>
                        <th>Control Set </th>
                        <th>Control</th>
                        <th>Control Weightage</th>
                        <th>Analyze</th>                       
                     

                       
                       </tr>
                      </thead> 

                <tbody>    
                    
                <?php
                    
               
                 tabledata($clauses);
                }
            

            ?>

            
                </tbody>
            </table>
        </div>

</div>
</div>
</div>
</div>
<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-gift"></i>Compliance Package item info</h4>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <form id="form1" style="margin: 3%;margin-top: -1%;">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                    <input type="hidden" class="form-control" id="auditId">
                    <input type="hidden" class="form-control" id="action" value="create">
                    <input type="hidden" class="form-control" id="currentWorkingStatus" value="published">
                    <input type="hidden" class="form-control" id="complianceId" value="<?php echo $complianceId ?>">
                    <input type="hidden" class="form-control" id="complianceId" value="<?php echo $complianceId ?>">
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" value="<?php echo $companyId?>" id="company">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12" >
                    <div class="form-group " >
                      <label for="auditTitle" >Treatment Strategy</label>
                      

                        <div class="btn-group" id="treatmentStrategy">
                          <button type="button" id="Compliant"   class="btn btn-success" onclick="treat('Compliant')" value="Compliant">Compliant</button>
                          <button type="button" id="Non Compliant" class="btn btn-danger" onclick="treat('Non Compliant')" value="Non Compliant">Non Compliant</button>
                          <button type="button" id="Not Applicable" class="btn btn-info" onclick="treat('Not Applicable')" value="Not Applicable">Not Applicable</button>
                        </div>
                        
                      
                    </div>          
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12" >
                    <div class="form-group " >
                      <label for="auditTitle" ><br>Compliance Efficacy:<br><br></label>
                      <!-- <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span> -->
                        <?php $score=50; ?>

                   <div class="slidecontainer">
                      <input type="range" style="display: block;width: 41%;margin-top: -6px;margin-left: 98px;"  min="1" max="100"  value="50" class="slider" id="complianceEfficacy" name="auditorScoreDropDown" class="form-control"  onchange="<?php echo 'updateScore()'?>">
                    <p id="scoreAnalyze"  style="margin-top: -7px;margin-left: 108px;"><?php echo $score ?></p>
                   </div> 
                    </div>             
                  </div>
              </div>
              <div class="row">
              <div class="col-md-12">
                  <div class="col-md-6" >
                    <div class="form-group " >
                      <!-- <label for="auditTitle" >Standards:</label> -->
                        <?php include '../compliance/mitigationControlComplianceDropDown.php';?>
                    </div>          
                  </div>
               
                  <div class="col-md-6">
                    
                 <div class="form-group" >
                      <!-- <label for="auditDesc">Compliance Exceptions</label> -->
                      <?php include '../common/projectDropDown.php' ?>
                    </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
      
                  <div class="form-group" id="controlsDrop" >
                 
                      <?php include '../common/controlsDropDown.php' ?>
                   
                </div>
               
                  <!-- <div class="col-md-6"> -->
                   
                  <!-- </div> -->
              </div>
          </div>
                </form>
                </div>
                
               
              <div class="modal-footer" style="border-top: 1px solid #eef1f5;">
                <button type="button" class="btn purple mt-ladda-btn ladda-button btn-outline" data-style="slide-down" data-spinner-color="#333" onclick="analyze()">
                  <span class="ladda-label">
                      <i class="fa fa-save"></i> Save  </span>
                  <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                </button>
                 
              </div>  
          <input type="hidden" id="checklistId" value="<?php echo $checklistId ?>">  
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
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
   <script src="js/compliance/checklistAnalyzeManagement.js"></script>
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

            </body>
    <!-- end::Body -->
</html>


     