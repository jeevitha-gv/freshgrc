<?php 
require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/company/companyManager.php';
require_once __DIR__.'/../../php/compliance/complianceManager.php';
require_once __DIR__.'/../../php/incident/incidentManager.php';


$userRole = $_SESSION['user_role'];
$manager=new CompanyManager();
$id=$manager->getCompanyIdForUser($_SESSION['user_id']);
$companyId=$id[0]['id'];
$IncidentId = $_GET['IncidentId'];
// echo $IncidentId;
$metaData=new IncidentManager();
$allCategory = $metaData->getRiskCategory();


$assignee=$metaData->getIncidentRole(31);

?>


<!DOCTYPE html>
<html>

<head lang="en">
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Perform Diagnosis</title>
  <base href="/newtheme/">


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
       

    <script src="js/incident/incidentManagement.js"></script>
    
    <link href="assets/img/fixnix.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="assets/img/fixnix.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="assets/img/fixnix.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="assets/img/fixnix.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="assets/img/fixnix.png" rel="icon" type="image/png">
    <link href="assets/img/fixnix.ico" rel="shortcut icon">
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
</head>
<body  style="background-color: #f0f5f5">

    <?php 
        include '../siteHeader.php';
        $currentMenu = 'auditorAdmin';
        include '../../php/policy/left.php';
    ?>
<body>
  <div class="page-content-wrapper">                
    <div class="page-content">                  
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box green">
            <div class="portlet-title">
              <div class="caption">Diagnosis</div>                              
            </div>  
            <div class="portlet-body ">
              <form id="form1" style="margin: 3%;margin-top: -1%;">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                  <input type="hidden" class="form-control" id="auditId">
                  <input type="hidden" class="form-control" id="action" value="managed">
                  <input type="hidden" class="form-control" id="file_id" value="<?php echo 
                   $file_id?>">
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" value="<?php echo $IncidentId;?>" id="IncidentId">
                  </div>
                </div>
           <div class="row" style="margin-top: 20px;">
              <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                <div class="panel panel-default">
                  <div class="panel-heading"><b>Users</b></div>
                    <div class="panel-body">
                      <div class="col-md-6" >
                        <div class="form-group" >
                          <label>Assignee</label>
                         <div class="input-group select2-bootstrap-append">
                            <select id="assignee" class="form-control select2"  required >
                                <option></option>                                    
                                 <option value="<?php echo $assignee[0]['userId'] ?>"><?php echo $assignee[0]['lastName'] ?></option>       
                            </select>
                            <span class="input-group-btn">
                               <button class="btn btn-default" type="button" data-select2-open="multi-append">
                                  <span class="glyphicon glyphicon-search" style="height: 20px;
"></span>
                                </button>
                            </span>
                         </div>
                        </div>       
                      </div>
                      <div class="col-md-6" >
                      <div class="form-group" >
                        <label >Escalation Users</label>
                          <div class="input-group select2-bootstrap-append">
                            <select id="escalation_users" class="form-control select2" multiple >
                              <option></option>
                              <option>Level 01</option>
                              <option>Level 02</option>
                              <option>Level 03</option>
                            </select>
                            <span class="input-group-btn">
                               <button class="btn btn-default" type="button" data-select2-open="multi-append">
                                  <span class="glyphicon glyphicon-search" style="height: 20px;"></span>
                                </button>
                            </span>
                           </div>
                        </div>      
                      </div>                                      
                    </div>         
                </div>
              </div>
            </div>
           <div class="row" style="margin-top: 20px;">
                  <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><b>Risk Category 1</b></div>
                      <div class="panel-body">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label >Category</label>
                            <div class="input-group select2-bootstrap-prepend">
                              <select  id="category" name="categoryDropDown" class="form-control select2" onchange="SubCategory();" >
                                <option></option>    
                                <?php foreach($allCategory as $category){ ?>
                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                <?php } ?>
                              </select>
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button" data-select2-open="single-prepend-text">
                                  <span class="glyphicon glyphicon-search"></span>
                                </button>
                              </span> 
                            </div>
                          </div>
                        </div>
                        <script>
                             function SubCategory(){
                              var modalDetails= {'id':$('#category').val()};
                               $.ajax({
                              type: "POST",
                              url: "/freshgrc/view/incident/subCategoryDropDown.php",
                              data: modalDetails,
                              success:function(data){
                                  $('#subCategoryDropDown').html(data);
                              
                              }
                          });
                          }
                        </script>
                        <div class="col-md-6">
                          <div class="form-group" id="subCategoryDropDown">
                            <?php include '../incident/subCategoryDropDown.php'; ?>
                          </div>
                        </div>
                                                
                      </div>
                    </div>
                  </div> 
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><b>Risk Category 2</b></div>
                      <div class="panel-body">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label >Category</label>
                            <div class="input-group select2-bootstrap-prepend">
                              <select  id="category2" name="categoryDropDown2" class="form-control select2">
                                <option></option>    
                                <option value="Financial">Financial</option>
                                <option value="Reputational">Reputational</option>
                                <option value="Compliance">Compliance</option>
                              </select>
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button" data-select2-open="single-prepend-text">
                                  <span class="glyphicon glyphicon-search"></span>
                                </button>
                              </span> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><b>Loss Occured</b></div>
                      <div class="panel-body">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label >Quantified loss</label>
                            <div class="input-group select2-bootstrap-prepend">
                              <select  id="quantified_loss" name="quantified_loss" class="form-control select2">
                                <option></option>    
                                <option value="Direct">Direct</option>
                                <option value="Indirect">Indirect</option>
                                
                              </select>
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button" data-select2-open="single-prepend-text">
                                  <span class="glyphicon glyphicon-search"></span>
                                </button>
                              </span> 
                            </div>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="form-group">
                            <label>Currency</label>
                            <div class="input-group select2-bootstrap-prepend">
                            <select class="form-control select2" id="currency" name="currency">
                              <option></option>
                              <option value="$">$</option>
                              <option value="£">£</option>
                              <option value="₹">₹</option>
                              <option value="€">€</option>
                              <option value="¢">¢</option>
                              <option value="¥">¥</option>
                            </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>Realised Loss</label>
                            <input type="number" name="realised_loss" id="realised_loss" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>
                <div class="row" style="margin-top: 20px;">
                  <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                    <div class="panel panel-default">
                      <div class="panel-heading"><b>Impact</b></div>
                      <div class="panel-body">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label >Policies Impacted Count</label>
                            <input type="number" name="policies_impacted" id="policies_impacted" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>
          <div class="row" style="margin-top: 20px;">
              <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                <div class="panel panel-default">
                  <div class="panel-heading"><b>Scoring Matrix</b></div>
                    <div class="panel-body">

                      <div class="col-sm-6" style="margin-left: -16px;"> 
                       <label style="margin-left: 14px;">Urgency</label> 
                        <div class="form-group">
                          <div class="col-sm-4">
                          <label class="radio-inline form-control" style="background: #85e185" >
                            <input type="radio" id="high" name="Urgency" value="high" class="deselectRadioButton" onclick="diagonsisUrgency('high')">High
                          </label>
                          </div>   
                           <div class="col-sm-4">
                            <label class="radio-inline form-control" style="background: #ec971f" >
                              <input type="radio" id="medium" name="Urgency" value="medium" class="deselectRadioButton" onclick="diagonsisUrgency('high')">Medium
                            </label>
                          </div>
                          <div class="col-sm-4">
                            <label class="radio-inline form-control" style="background: #f47673" >
                              <input type="radio" id="low" name="Urgency" value="low" class="deselectRadioButton" onclick="diagonsisUrgency('low')">Low
                            </label>
                          </div>  
                            <input type="hidden" id="diagonsisurgency">
                        </div>  
                        </div>

                         <div class="col-sm-6" > 

                       <label style="margin-left: 14px;">Impact</label> 
                        <div class="form-group">
                          <div class="col-sm-4">
                          <label class="radio-inline form-control" style="background: #85e185" >
                            <input type="radio" id="high1" name="Impact" value="high" class="deselectRadioButton" onclick="diagonsisImpact('high')">High
                          </label>
                          </div>   
                           <div class="col-sm-4">
                            <label class="radio-inline form-control" style="background: #ec971f" >
                              <input type="radio" id="medium1" name="Impact" value="medium" class="deselectRadioButton"  onclick="diagonsisImpact('medium')">Medium
                            </label>
                          </div>
                          <div class="col-sm-4">
                            <label class="radio-inline form-control" style="background: #f47673" >
                              <input type="radio" id="low1" name="Impact" value="low" class="deselectRadioButton" onclick="diagonsisImpact('low')">Low
                            </label>
                          </div>  
                            <input type="hidden" id="diagonsisimpact">
                        </div>  
                        </div>              
                      <div class="col-md-6" style="margin-top: 15px;">
                      <div class="form-group">
                       <label for="assignedto">Priority</label>
                        <select id="manager_priority" name="assignedtoDropDown" class="form-control">
                          <option></option>
                          <option>P1</option>
                          <option>P2</option>
                          <option>P3</option>
                          <option>P4</option> 
                        </select>       
                      </div>
                       </div>         
                      <div class="col-md-6" style="margin-top: 15px;">
                      <div class="form-group">
                         <label for="assignedto">Incident Response Team</label>
                        <select id="manager_sla" name="assignedtoDropDown" class="form-control">
                          <option></option>
                          <option>L1</option>
                          <option>L2</option>
                          <option>L3</option>  
                        </select>
                      </div>          
                      </div>                     
              </div>
            </div>
            </div>
            </div>

<div class="modal-footer" style="border-top: 1px solid #eef1f5;">
                <button type="button" class="btn green mt-ladda-btn ladda-button btn-outline" data-style="slide-down" data-spinner-color="#333">
                  <span class="ladda-label" onclick="savediagnosis(<?php echo $IncidentId;?>)">
                      <i class="icon-present"></i> Save </span>
                  <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                </button>
                
              </div>  
            
              </form>   
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
</script>
