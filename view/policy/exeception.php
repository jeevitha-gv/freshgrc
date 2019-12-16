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
<html>

<head lang="en">
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Fresh GRC Admin</title>
  <base href="/freshgrc/">

<!-- ... -->

 

    <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css" />
    <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.4/jquery-ui.css"/>
    <link href="metronic/theme/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    
    <script src="metronic/theme/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="metronic/theme/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>     
    <script src="assets/multiselectDropdown/bootstrap-multiselect.js" type="text/javascript"></script>  
    <link rel="stylesheet" type="text/css" href="assets/multiselectDropdown/bootstrap-multiselect.css">
    <script src="metronic/theme/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="metronic/theme/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <script src="metronic/theme/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
    <link href="assets/toggleButton/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="assets/toggleButton/bootstrap-toggle.min.js"></script>
    <script src="js/policy/policyManagement.js"></script>
    
    <script src="js/policy/policyExpired.js"></script>
    <link href="assets/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="assets/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="assets/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="assets/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="assets/img/favicon.png" rel="icon" type="image/png">
    <link href="assets/img/favicon.ico" rel="shortcut icon">
     <link rel="stylesheet" href="assets/css/lib/font-awesome/font-awesome.min.css">
    <link href="metronic/theme/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="metronic/theme/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="metronic/theme/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="metronic/theme/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="metronic/theme/assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="metronic/theme/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <style>

        </style>
</head>
<body  style="background-color: #f0f5f5">

     <?php 
        include '../siteHeader.php';
        $currentMenu = 'riskAdmin';
        include '../common/leftMenu.php';
        $userRole = $_SESSION['user_role'];
    ?> 
  <body>
    <div class="page-content-wrapper" >      <!-- BEGIN CONTENT BODY -->
      <div class="page-content" >
        <div class="col-md-12">
          <div class="portlet box green">
            <div class="portlet-title"><div class="caption">Exeception</div></div>      
            <div class="portlet-body">
              <div class="row" style="margin-left: 12px;margin-right: 12px;">
                
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>General</b></div>
                    <div class="panel-body">
                      <div class="row col-lg-12 col-md-12 col-xs-12">
                      <div class="col-md-4 col-lg-4 ">
                        <div class="form-group">
                          <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                          <input type="hidden" class="form-control" id="policyId">
                          <input type="hidden" class="form-control" id="action">
                          <input type="hidden" value="<?php echo $companyId?>" id="company">                      
                          <label style="margin-left:-20px;" for="auditTitle">Title</label>
                          <input type="text" style="margin-left:-20px;width:150px;" class="form-control" id="title" value="<?php echo $policyData[0]["Title"];?>"required>
                        </div>
                      </div> 
                         
                       <div class="col-md-4 col-lg-4"> 
                        <div class="form-group">                                                   
                          <?php include '../policy/policyOraganizationTypeDropDown.php';?>             
                        </div> 
                      </div> 
                       <div class="col-md-4 col-lg-4"> 
                            <div class="form-group">                            
                          <?php include 'policySecurityClassification.php';?>       </div>
                      </div>

                    </div>
              
                      <div class="row col-lg-12 col-md-12 col-xs-12">
                      <div class="col-md-4 col-lg-4">   
                           <div class="form-group" >                           
                        <?php include '../common/policyTypeDropDown.php';?>             </div>
                      </div>
                      
                      <div class="col-md-4 col-lg-4" id="subPolicydropdown">           <div class="form-group">
                        <input type="hidden" id="oldSubPolicy" value="<?php echo $policyData[0]['subPolicy'];?>">
                        <?php include 'policysubpolicy.php';?> 
                        </div>            
                      </div>
                      <div class="col-md-4 col-lg-4" >
                        <button style="width:130px;margin-top:25px;" class="btn btn-primary btn-md">Import</button>
                      </div>
                      
                     

                      </div>
                      
                      <div class="row col-lg-12 col-md-12 col-xs-12">
                        <div class="col-md-6 col-lg-6">   
                           <div class="form-group" >                           
                        <?php include 'InformationClassificationDropdown.php';?>  
                      </div>

                      </div>
                       <div class="col-md-6 col-lg-6">   
                           <div class="form-group" >  
                           <?php include 'policyAudience.php';?>                            
                      </div>

                      </div>


                      </div>                                                            <!-- panelbodycloses -->       
                    </div>                      
                  
                </div>
            
              <div class="row" style="margin-left: 14px;margin-right: 14px;">
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
              <div class="row" style="margin-left: 14px;margin-right: 14px;">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Users</b></div>
                    <div class="panel-body">
                       <?php include '../common/policyRoleDropDown.php';?>                                 
                    </div>                      
                  </div>
                </div>
              </div>
              <div class="row" style="margin-left: 14px;margin-right: 14px;">
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
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="width: 180px!important;">
                          
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
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="width:180px !important;">

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
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="yyyy/mm/dd" style="width:180px !important;">

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

              <div class="row" style="margin-left: 14px;margin-right: 14px;">
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
              
              <div class="row" style="margin-left: 14px;margin-right: 14px;">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Control</b></div>
                    <?php
                        foreach ($policyControls as $key => $control) {
                    ?>
                        <div style="padding-left: 16px; padding-top: 20px;"><p style="font-weight: bold;">   Statement<?php echo $GLOBALS['itemNumber'] ?></p>
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
                        <div class="controls" style="margin-left: 950px; margin-top: 20px;margin-bottom: 4px;">
                          <button class="add" style="background-color: forestgreen; color: white; padding-top: 10px; padding-right: 10px; padding-left: 10px; padding-bottom: 10px;">+</button>
                          <button class="rem" style="background-color: darkred; color: white;padding-top: 10px; padding-right: 12px; padding-left: 10px; padding-bottom: 10px;">-</button>                          
                        </div>
                      </div> 
                    </div>                       
                  </div>
                </div>
              </div>
              <div style="border-top: 1px solid #eef1f5;">
              	 <!-- <div class="example-template"> -->
                          <div style="padding-left: 32px;"><p style="font-weight: bold;">Statement</p>
                            <div class="panel-body">               
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="auditTitle">Employee Name</label>
                                  <input  type="text" id="EmployeeName" class="form-control mainheading" required>
                                </div>
                              </div>                       
                              <div class="col-md-6"  >
                                <div class="form-group">
                                  <label for="auditTitle">Place</label>
                                  <input  type="text" id="place" class="form-control subheading" required>
                                </div> 
                              </div>                     
                              <div class="col-md-6" >
                                <div class="form-group">
                                  <label for="SecurityRecommendations">Description</label><br>
                                  <textarea maxlength="5000" id="Description" rows="2" class="form-control description" ></textarea>
                                </div>          
                              </div>
                              <div class="col-md-6" >
                                <div class="form-group">
                                  <label for="SecurityRecommendations">Date</label><br>
                                  <input  type="date" id="date" class="form-control datepickerClass  notranslate" required>
                                </div>          
                              </div>      
                           
                            <div class="col-md-6" >
                                <div class="form-group">
                                  <label for="SecurityRecommendations">Attachment</label><br>
                                  <input  type="file" id="Attachment" class="form-control datepickerClass  notranslate" required>
                                </div>          
                              </div> 
                               </div>                         </div>                          
                        <!-- </div>     -->

</div>

              <div class="modal-footer" style="border-top: 1px solid #eef1f5;">

                <button type="button"  onclick="toexeception()" data-dismiss="modal" class="btn btn-primary" style="background-color:#4285f4; float:right;margin-left:15px;">Exeception</button>

                <button class="btn btn-primary" style="float:right;" onclick="goToPreviousPage()">Back</button>
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