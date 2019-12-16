<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/company/companyManager.php';
$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);

$companyId=$id[0]['id'];
?>
<!DOCTYPE html>
<html>

<head lang="en">
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Fresh GRC Admin</title>
  <base href="/freshgrc/">


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
       
    <script src="js/bcpm/bcpmAdmin.js"></script>
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
        <link rel="shortcut icon" href="./assets/media/logos/fixnix.png" />
</head>
<body  style="background-color: #f0f5f5">

    <?php 
        include '../siteHeader.php';
        $currentMenu = 'auditorAdmin';
        include '../common/leftMenu.php';
    ?>
  <body>
    <div class="page-content-wrapper" >
      <!-- BEGIN CONTENT BODY -->
      <div class="page-content" >
        <div class="portlet box green">
          <div class="portlet-title"><div class="caption">BCPM Planner</div></div>
           <div class="portlet-body">

               

                  
                    
                    
        <div class="col-xs-12 col-md-12 col-lg-12 form-group" style="margin-top: 0px;">
                <div class="panel-body">
                <div class="row">
                <div class="form-group" >
                    <div class="col-xl-12" style="margin-left: 87% !important;">
                      <label for="auditTitle" >Date:</label>
                       <span  id="dateDefault"></span>             
                    </div>          
                  </div>
                   
             <div class="col-md-4">
                         <div class="form-group">
                          <label for="auditTitle">BCPM Plan Name:</label>
                            <input  type="text" class="form-control" id="bcpm_plan_name" required>
                        </div>          
                     </div>
           <div class="col-md-4" >
                     <div class="form-group " >
                       <?php include '../common/regulationDropDown.php';?>
                    </div>          
                    </div>
                      <div class="col-md-4" >
                      <div class="form-group " id="controlDrop">
                              <?php include '../common/controlsDropDown.php';?>
                      </div>          
                    </div>
                    </div>
                    <div class="row">
            <div class="col-md-4" style="margin-top: 10px;">
                         <div class="form-group">
                      
                          <?php include 'bcpmAssetClassDropdown.php';?> 
                      
                         </div>
                       </div>
            <div class="col-md-4" style="margin-top: 10px;">
                          <div class="form-group" id="bcpmSubAsset" >
                            <?php include 'bcpmSubAssetClass.php';?> 
                        </div>
                      </div>

            <div class="col-md-4" style="margin-top: 10px;">
                        <div class="form-group">
                          <label class="control-label" >Function/Process:</label>
                            <input type="text" id="function_process" class="form-control">
                       </div>
                      </div>
                      </div>
             <div class="row">         
            <div class="col-md-4" style="margin-top: 10px;">
                            <?php include '../common/locationDropdown.php';?> 
                    </div>
          <div class="col-md-4" style="margin-top: 10px;">
                      <div class="form-group">
                      
                          <?php include '../common/userDropdown.php';?> 

                     </div>
                    </div>
           <div class="col-md-4" style="margin-top: 10px;">
                      <div class="form-group">
                     
                          <?php include '../common/userDropdown.php';?> 
                     </div>
                    </div>
         </div>
               </div>
              </div>
            
              <div class="modal-footer" style="border-top: 1px solid #eef1f5;">
                <button type="button" id="manageButton" onclick="manageModal()" data-dismiss="modal" class="btn btn-primary" style="background-color:#4285f4;margin-right: 10px;">plan</button>
              
              </div> 
           </div>
          </div>
        </div>
      </div>

 
 
   
                
                
    </body>
   

</html>

<style type="text/css">
  .ui-datepicker-title {
    border: 1px solid #1c94c4;
    background: #ffffff !important url(images/ui-bg_gloss-wave_35_f6a828_500x100.png) 50% 50% repeat-x;
     color: black !important; 
    font-weight: bold;
};
    .ui-datepicker-header  {
    border: 1px solid #e78f08;
    background: #ffffff !important url(images/ui-bg_gloss-wave_35_f6a828_500x100.png) 50% 50% repeat-x;
    font-weight: bold;
}
.ui-datepicker .ui-datepicker-header {
    position: relative;
    padding: .2em 0;
    background: #1c94c4;
}
</style>   


