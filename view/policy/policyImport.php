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
            <div class="portlet-title"><div class="caption">Import Policies </div></div>      
            <div class="portlet-body">
              <div class="row" style="margin-left: 12px;margin-right: 12px;">
                
                  <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                      
              
                      <div class="row col-lg-12 col-md-12 col-xs-12">
                      <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">   
                           <div class="form-group" >                           
                        <?php include '../common/policyTypeDropDown.php';?>             </div>
                      </div>
                      
                      <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3" id="subPolicydropdown">           <div class="form-group">

                        <?php include 'policysubpolicy.php';?> 
                        </div>            
                      </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6"  id="subPolicydropdown">           <div class="form-group">

                      
                  <?php include '../common/policyRoleDropDown.php';?>  
                  <input type="hidden" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">   
                    </div>
                  </div>
                      </div>
                      
                                                                                  <!-- panelbodycloses -->       
                    </div>                      
                  
                </div>
            
                       
              
              
              
                       
                    </div>                       
                  </div>
                  <div class="modal-footer" style="border-top: 1px solid #eef1f5; background: #ffff">
                <label for="policyCsv" aria-hidden="true">
                                <i class="btn btn-danger btn-block fa fa-file-excel-o">  Import Policy</i>
                      <input type="file" style="display:none" onchange= "importPolicyCsv()" id="policyCsv"/>

                </label>
              </div>   
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