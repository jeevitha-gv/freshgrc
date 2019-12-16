<?php 
require_once __DIR__.'/../header.php';
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
$GLOBALS['PolicyId'] = $_GET['PolicyId'];
$PolicyId = $_GET['PolicyId'];
$policyManager = new PolicyManager();
$policyData = $policyManager->getPolicyDetails($PolicyId);
$policyReview = $policyManager->getPolicyReviewer($PolicyId);
$policyApprove = $policyManager->getPolicyApprover($PolicyId);
$allUsers = $policyManager->getAllUsersForMail();
$policyControls = $policyManager->getPolicyControls($PolicyId);
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
<script src="js/policy/policyManagement.js"></script>
<script src="js/policy/policyExpired.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/media/logos/fixnix.png" />
</head>
<?php 
include "../siteHeader.php";
?>
 <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" >

    <!-- begin:: Page -->


<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper" style="margin-top:-10%;">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
Edit Policy</h3>
</div>
</div>
            <div class="kt-portlet__body" style="overflow-x: scroll;">
            <div class="clearfix">   
              <a href="view/policy/policyImport.php"><button type="button" class="btn btn-success">Import</button></a>      </div> </br>    
              <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>General</b></div>
                    <div class="panel-body">
                      <div class="col-md-4 col-lg-4 ">
                        <div class="form-group">
                          <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                          <input type="hidden" class="form-control" id="policyId">
                          <input type="hidden" class="form-control" id="action">
                          <input type="hidden" value="<?php echo $companyId?>" id="company">                      
                          <label for="auditTitle">Title</label>
                          <input type="text" class="form-control" id="title" value="<?php echo $policyData[0]["Title"];?>"required>
                        </div>
                      </div> 
                      <div class="col-md-2"> 
                        <div class="form-group">   
                        <label>Organization</label>                                                 
                          <?php include '../policy/policyOraganizationTypeDropDown.php';?>             
                        </div> 
                      </div> 
                      <div class="col-md-2">   
                           <div class="form-group" >     
                           <label>Policy Type</label>                      
                          <?php include '../common/policyTypeDropDown.php';?>             
                        </div>
                      </div>
                      <div class="col-md-2" id="subPolicydropdown">           
                        <div class="form-group">
                          <label>SubPolicy</label>
                        <input type="hidden" id="oldSubPolicy" value="<?php echo $policyData[0]['subPolicy'];?>">
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
                      </div>                                                            <!-- panelbodycloses -->       
                    </div>                      
                  
            
              <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Scope</b></div>
                    <div class="panel-body">
                      <div class="col-md-4" >
                        <div class="form-group">
                          <label for="scope">Scope</label><br>
                          <textarea maxlength="5000" rows="2" class="form-control" id="scope"><?php echo $policyData[0]["scope"];?></textarea>
                        </div>         
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group">
                          <label for="purpose">Purpose</label><br>
                          <textarea maxlength="5000" rows="2" class="form-control" id="purpose" ><?php echo $policyData[0]["purpose"];?></textarea>
                        </div>          
                      </div>                    
                      <div class="col-md-4" >
                        <div class="form-group">
                          <label for="description">Description</label><br>
                          <textarea maxlength="5000" rows="2" class="form-control" id="description"><?php echo $policyData[0]["description"];?></textarea>
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
                    <div class="panel-heading"><b>Dates</b></div>
                    <div class="panel-body">
                    
                      <div class="col-md-3">
                        <div class="form-group">                        

                          <label class="control-label" >Policy Creation:</label>
                       <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="width: 180px!important;">                                                   <input type="text" id="effective_form"  class="form-control datepickerClass  notranslate" name="to" value="<?php echo $policyData[0]["effective_from"];?>"> 

                          <span class="input-group-addon">

                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                     
                          </div>

                          
                      </div>
                      
                      </div> 

                      
                    
                      <div class="col-md-3">
                        <div class="form-group">                        
                          <label class="control-label" >Expiry Date:</label>
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd">
                          
                          <input type="text" id="effective_till"  class="form-control datepickerClass  notranslate" name="to" value="<?php echo $policyData[0]["effective_till"];?>"> 
                          <span class="input-group-addon">

                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                     
                        </div>

                        </div>                    
                      </div> 
                      <div class="col-md-3">                        
                        <div class="form-group" >

                          <label class="control-label" >Expected Publish Date:</label>
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd">

                            <input type="text" id="expected_publish_date" class="form-control datepickerClass  notranslate" name="from" class="" value="<?php echo $policyData[0]["expected_publish_date"];?>">
                            <span class="input-group-addon">

                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                          </div>
                        </div>                       
                      </div> 
                      <div class="col-md-3">                      
                        <div class="form-group" >

                          <label class="control-label" >Review Within Date:</label>
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd">

                            <input type="text" id="review_within_date" class="form-control datepickerClass  notranslate" name="from" class="" value="<?php echo $policyData[0]["review_within_date"];?>">
                            <span class="input-group-addon">

                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
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
                                           
                                           
                      <div class="col-md-12">
                        <div class="form-group">

 <?php include 'PolicyClassificationDropdown.php';?>
                            
                      </div>                                                                                   
                    </div>                      
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Control</b></div>
                    <?php
                        foreach ($policyControls as $key => $control) {
                    ?>
                        <div style="padding-left: 16px; padding-top: 20px;"><p style="font-weight: bold;">Statement<?php echo $GLOBALS['itemNumber'] ?></p>
                        <div class="panel-body">               
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="auditTitle">Main Heading</label>
                                <input  type="text" class="form-control mainheading" value="<?php echo $control['main_heading'];?>" required>
                            </div>
                            </div>                       
                            <div class="col-md-4"  >
                            <div class="form-group">
                                <label for="auditTitle">Sub Heading</label>
                                <input  type="text" class="form-control subheading" value="<?php echo $control['sub_heading'];?>" required>
                            </div> 
                            </div>                     
                            <div class="col-md-4" >
                            <div class="form-group">
                                <label for="SecurityRecommendations">Description</label><br>
                                <textarea maxlength="5000" rows="2" class="form-control description"><?php echo $control['description'];?></textarea>
                            </div>          
                            </div>    
                        </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="row">
                      <div class="hidden">                        
                        <div class="example-template">
                          <div style="padding-left: 32px;"><p style="font-weight: bold;">Statement</p>
                            <div class="panel-body">               
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="auditTitle">Main Heading</label>
                                  <input  type="text" class="form-control mainheading" required>
                                </div>
                              </div>                       
                              <div class="col-md-4"  >
                                <div class="form-group">
                                  <label for="auditTitle">Sub Heading</label>
                                  <input  type="text" class="form-control subheading" required>
                                </div> 
                              </div>                     
                              <div class="col-md-4" >
                                <div class="form-group">
                                  <label for="SecurityRecommendations">Description</label><br>
                                  <textarea maxlength="5000" rows="2" class="form-control description" ></textarea>
                                </div>          
                              </div>    
                            </div>
                          </div>                          
                        </div>      
                      </div>
                      <div class="edit-area">                                                  
                        <div class="controls">
                          <button class="add" style="background-color: forestgreen; color: white; padding-top: 10px; padding-right: 10px; padding-left: 10px; padding-bottom: 10px;">+</button>
                          <button class="rem" style="background-color: darkred; color: white;padding-top: 10px; padding-right: 12px; padding-left: 10px; padding-bottom: 10px;">-</button>                          
                        </div>
                      </div> 
                    </div>                       
                  </div>
                </div>
              </div>
              <div class="kt-portlet__foot">

                <button type="button" id="manageButton" onclick="editPolicyData(<?php echo $PolicyId;?>)" data-dismiss="modal" class="btn btn-primary" style="background-color:#4285f4; float:right;margin-left:15px;">Submit</button>

                <button class="btn btn-primary" style="float:right;" onclick="goToPreviousPage()">Back</button>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
   

</html>
<script type="text/javascript">
     $(function() {
        $(".datepickerClass").datepicker();
        $('.ui-datepicker').addClass('notranslate');
    });
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