<?php 
require_once __DIR__.'/../header.php';
// require_once __DIR__.'/../../php/audit/auditClauseManager.php';
// require_once __DIR__.'/../../php/compliance/complianceManager.php';
// require_once __DIR__.'/../../php/audit/auditManager.php';
// require '../../php/user/userManager.php';
require_once __DIR__.'/../../php/company/companyManager.php';
$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
$companyId=$id[0]['id'];
require_once __DIR__.'/../../php/policy/policyManager.php';
$policyManager = new PolicyManager();
$allSecurityClassification = $policyManager->getAllSecurityClassification();
$allInformationClassification = $policyManager->getAllPolicyClassification();
$allAudience = $policyManager->getAllAudience();
$allPolicyProcedure = $policyManager->getAllPolicyProcedure();
$GLOBALS['itemNumber']=1;

$companyId=$_SESSION['company'];
?>
<!DOCTYPE html>
<html lang="en" >
 <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>Freshgrc</title>
        <meta name="description" content="Base form control examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->
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
<link href="assets/toggleButton/bootstrap-toggle.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.4/jquery-ui.css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

                    <link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="assets/media/logos/fixnix.png" />
    </head>

<?php $userRole = $_SESSION['user_role']; 
include "../siteHeader.php";
?>

    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >


<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page" >

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top: -10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

<!--begin::Portlet-->
<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
New Policy
</h3>
</div>
</div>

<div class="kt-portlet__body">
<div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>General</b></div>
                    <div class="panel-body">
                    <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                          <input type="hidden" class="form-control" id="policyId">
                          <input type="hidden" class="form-control" id="action">
                          <input type="hidden" value="<?php echo $companyId?>" id="company">                      
                  <!-- </div> -->          
<div class="col-md-3">            
<label>Title</label>
<input type="text" class="form-control" name="title" id="title">
</div>

<div class="col-md-2">            
<div class="form-group"> 
<label>Organization</label>                                                  
<?php include '../policy/policyOraganizationTypeDropDown.php';?>             
</div> 
</div>

<div class="col-md-2">            
<label>Policy Type</label>
<?php include '../common/policyTypeDropDown.php';?>
</div> 
<div class="col-md-2"> 
  <label>SubPolicy</label>
<div class="form-group" id="subPolicydropdown">   
<?php include 'policysubpolicy.php';?> 
</div>
</div>

<div class="col-md-2">
 <label>Security</label>
  <div class="form-group">
 <?php include 'policySecurityClassification.php';?> 
</div>
</div>
</div>
<div class="form-group row" style="padding: 1%;">
  <div class="col-md-6">
    <label><b>Classification</b></label>
 <?php include 'InformationClassificationDropdown.php';?>  
</div>
 <div class="col-md-6">
  <label><b>Audience</b></label>
  <?php include 'policyAudience.php';?> 
</div>
</div>
</div><br><br>
              <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Scope</b></div>
                    <div class="panel-body">
                      <div class="col-md-4">
                       <div class="form-group">
                          <label for="scope">Scope</label><br>
                          <textarea maxlength="5000" rows="2" class="form-control" id="scope"></textarea>
                        </div> 
                      </div> 
                      <div class="col-md-4">
                       <div class="form-group">
                          <label for="purpose">purpose</label><br>
                          <textarea maxlength="5000" rows="2" class="form-control" id="purpose"></textarea>
                        </div> 
                      </div>
                      <div class="col-md-4">
                       <div class="form-group">
                          <label for="description">description</label><br>
                          <textarea maxlength="5000" rows="2" class="form-control" id="description"></textarea>
                        </div> 
                      </div>                                
                    </div>                      
                  </div>
                </div>
              </div>

                 <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Users</b></div>
                    <div class="panel-body">
                       <?php include '../common/policyRoleDropDown.php';?>                                 
                    </div>                      
                  </div>
                </div>
              </div>


 
                 <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Date</b></div>
                    <div class="panel-body">
                      <div class="col-md-3">                        
                        <div class="form-group" >
                          <label class="control-label">Policy Creation Date:</label>
                          <div class="input-daterange input-group" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa flaticon-calendar-1"></i></span></div>
                            <input type="text" id="effective_form" name="sample-date1" placeholder="yyyy/mm/dd" class="form-control datepickerClass"  onchange="expirydaterror()" >
                          </div>
                        </div>                       
                      </div> 

                      <div class="col-md-3">                        
                        <div class="form-group" >
                          <label class="control-label" >Expiry Date:</label>
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa flaticon-calendar-1"></i></span></div>
                            <input type="text" id="effective_till" name="sample-date2" placeholder="yyyy/mm/dd" class="form-control datepickerClass"  onchange="expirydaterror()" >
                          </div>
                        </div>                       
                      </div> 

                      
                      <div class="col-md-3">                        
                        <div class="form-group" >
                          <label class="control-label" >Expected Publish Date:</label>
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa flaticon-calendar-1"></i></span></div>
                            <input type="text" id="expected_publish_date" name="sample-date3" placeholder="yyyy/mm/dd" class="form-control datepickerClass"  onchange="expirydaterror()" >
                       </div>
                     </div>                       
                    </div>


  <div class="col-md-3">                        
<div class="form-group" >
                          <label class="control-label" >Review Within Date:</label>
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa flaticon-calendar-1"></i></span></div>
                            <input type="text" id="review_within_date" name="sample-date4" placeholder="yyyy/mm/dd" class="form-control datepickerClass"  onchange="expirydaterror()" >
                          </div>
                        </div>                       
                      </div> 

                      </div>
                      </div>
                      </div>
                      </div> 

 
                  <div class="row">
                  <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Handlers</b></div>
                    <div class="panel-body">
                        <div class="form-group" >
                          <?php include 'PolicyClassificationDropdown.php';?>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
         

            <!--   <div class="row">
                  <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><b>General</b></div>
                      <div class="panel-body">
                        <div class="col-md-6">
                          <div class="form-group" >
                            <?php include '../common/regulationDropDown.php';?>
                           </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group" id="controlDrop">
                              <?php include '../common/controlsDropDown.php';?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
              
                 <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Control</b></div>
                    <div style="padding-left: 16px; padding-top: 20px;"><p style="font-weight: bold;">Statement<?php echo $GLOBALS['itemNumber'] ?></p>
                      <div class="panel-body">               
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="auditTitle">Main Heading</label>
                            <input id="mainheading" type="text" class="form-control mainheading" required>
                          </div>
                        </div>                       
                        <div class="col-md-4"  >
                          <div class="form-group">
                            <label for="auditTitle">Sub Heading</label>
                            <input id="subheading" type="text" class="form-control subheading" required>
                          </div> 
                        </div>                     
                        <div class="col-md-4" >
                          <div class="form-group">
                            <label for="SecurityRecommendations">Description</label><br>
                            <textarea id="description1" maxlength="5000" rows="2" class="form-control description" ></textarea>
                          </div>          
                        </div>    
                      </div>
                    </div>
                    <div class="row">
                      <div class="panel-body">
                        <div class="form-group">               
                          <div class="edit-area">                                                  
                            <div class="controls">
                              <button class="add"><i class="fa fa-plus"></i></button>
                              <button class="rem"><i class="fa fa-minus"></i></button>                          
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="hidden">                        
                        <div class="example-template">
                          <div style="padding-left: 32px;"><p style="font-weight: bold;">Statement</p>
                            <div class="panel-body">               
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="auditTitle">Main Heading</label>
                                  <input  id="mainheading" type="text" class="form-control mainheading" required>
                                </div>
                              </div>                       
                              <div class="col-md-4"  >
                                <div class="form-group">
                                  <label for="auditTitle">Sub Heading</label>
                                  <input  id="subheading"
                                  type="text" class="form-control subheading" required>
                                </div> 
                              </div>                     
                              <div class="col-md-4" >
                                <div class="form-group">
                                  <label for="SecurityRecommendations">Description</label><br>
                                  <textarea wrap="hard" id="description1" maxlength="5000" rows="2" class="form-control description" ></textarea>
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

<div class="kt-portlet__foot" style="float: right;">
<div class="kt-form__actions">
 <div class="btn-group btn-group-justifiedr" style="border-top: 1px solid #eef1f5;float:right;">
 <a href="#" onclick="viewPolicymodelDetails()" data-toggle='modal' data-target='#myModal' class="btn btn-primary">plan</a>
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
</div>

           <div class="container-fluid">
      <div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
  <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:blue;">Create New Policy Details</h4>
        </div>
        <div class="modal-body">
          <table cclass="table table-striped- table-bordered table-hover table-checkable">  

                   <tr>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Title:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Organization-Type:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Security:</b><p></p> </td>
                  </tr>
                  <tr>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #bbc6d2"><b>Policy Type:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #bbc6d2"><b>Sub Policy:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #bbc6d2"><b>Information Classification:</b><p></p></td>
                  </tr>
                   <tr>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Audience Classification:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Scope:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Purpose :</b><p></p></td>
                  </tr>
                  <tr>
                 
                  <tr>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #bbc6d2"><b>Description :</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;table-layout:fixed;word-wrap: break-word;background-color: #bbc6d2"><b>Owner:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #bbc6d2"><b>Reviewer: </b><p></p></td>
                  
                  </tr> 
                  <tr>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Approver:</b><p></p></td>
                    <td valign="top" valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Policy Creation:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Expiry Date: </b><p></p></td>
                    
                  </tr> 
                  <tr>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #bbc6d2"><b>Expected Publish Date:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #bbc6d2"><b>Review with Date:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;table-layout:fixed;word-wrap: break-word;background-color: #bbc6d2;"><b>Policy Classification:</b><p></p></td>
                   
                  </tr> 
                  <tr>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Main Heading:</b><p></p></td>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Sub Heading: </b><p></p></td>
                    <td valign="top" style="table-layout:fixed;word-wrap: break-word;background-color: #619ccc"><b>Description:</b><p></p></td>
                  </tr> 

                </table>
    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
     
        <button type="button" onclick="savePolicyPlan()" class="btn btn-success" data-dismiss="modal">Submit</button>
      </div>
</div>
</div>
</div>
</div>

 

<script type="text/javascript">
    
     (function($) {
 
    "use strict";
    
    var itemTemplate = $('.example-template').detach(),
        editArea = $('.edit-area'),
        itemNumber = 1;
    
      $(document).on('click', '.edit-area .add', function(event) {    
     
         var statementNo=document.getElementById("statementNo");
        var item = itemTemplate.clone();      
        ++itemNumber;
        var statement = itemNumber;   
        item.find("p").html("Statement"+itemNumber);
       
        item.appendTo(editArea);
          // var a = addArrayControls(statement)
      });
      
      $(document).on('click', '.edit-area .rem', function(event) {
       
        editArea.children('.example-template').last().remove();
      });
      
      $(document).on('click', '.edit-area .del', function(event) {
        var target = $(event.target),
            row = target.closest('.example-template');
        row.remove();
      });
  }(jQuery));
</script>
<?php 
include "../audit/sidemenu.php";

 ?>
 <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
 </script>
 <script src="js/policy/policyManagement.js"></script>
<script src="assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
<script src="assets/vendors/custom/jquery-ui/jquery-ui.bundle.min.js" type="text/javascript"></script>
<link href="assets/vendors/custom/jquery-ui/jquery-ui.bundle.min.css">
<script src="assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/dropzone.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
         <script src="./assets/js/demo3/pages/crud/forms/widgets/select2.js" type="text/javascript"></script> 
      <script src="assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
      <script src="assets/toggleButton/bootstrap-toggle.min.js"></script>
      <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>  

      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
            </body>
    <!-- end::Body -->
</html>

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
<script type="text/javascript">
     $(function() {
        $(".datepickerClass").datepicker();
        $('.ui-datepicker').addClass('notranslate');
    });
  </script>
