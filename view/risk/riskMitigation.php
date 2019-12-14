<?php require_once __DIR__.'/../header.php';
require_once __DIR__.'/../../php/risk/riskManager.php';
require_once __DIR__.'/../../php/risk/riskMitigationManager.php';
$GLOBALS['RiskId'] = $_GET['RiskId'];
$RiskId = $_GET['RiskId'];
$riskMitigationManager = new RiskMitigationManager();  
$allPlaningStrategy = $riskMitigationManager->getAllPlaningStrategy();
$allMitigationEffort = $riskMitigationManager->getAllMitigationEffort();
$allMitigationCost = $riskMitigationManager->getAllMitigationCost();
$riskScenarioDetails = $riskMitigationManager->getRiskScenario($RiskId);
$riskScoringDetails = $riskMitigationManager->getRiskScoring($RiskId);
$risksafguardDetails = $riskMitigationManager->getsafeguard($RiskId);
$riskManager = new RiskManager();    
$allTeam = $riskManager->getAllTeam();
$allUsers = $riskMitigationManager->getAllUser();
// $manager = new RiskManager();
$riskPlanReport = $riskManager->getRiskPlandata($RiskId);

?>
<!DOCTYPE html>

<html lang="en" >
 <head><!--begin::Base Path (base relative path for assets of this page) -->
<base href="/freshgrc/"><!--end::Base Path -->
        <meta charset="utf-8"/>

        <title>Freshgrc</title>
        <meta name="description" content="Base form control examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->
        <!--begin:: Global Mandatory Vendors -->
<link href="assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

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
<link href="assets/css/demo3/style.bundle.css" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon" href="assets/media/logos/fixnix.png" />
    </head>
    <?php 
      include '../siteHeader.php';
    ?>
<body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<div class="kt-grid kt-grid--hor kt-grid--root">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content -->

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid"style="margin-top: -14%;">
  <div class="" >
  <a class="flaticon2-arrow" data-toggle="collapse" data-target="#demo" style="font-size: 16px;">View Risk Summary</a><br><br>
  <div id="demo" class="collapse">
    <div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
RISK PLAN</h3>
</div>

</div> 
   <div class="panel-body">
      <!--     <div class="table-responsive"> -->
            <table class="table table-striped list-table table-bordered">
            <tr style="background-color: #f5f5f5;font-weight:100;font-size:12px;color:#333">
                <th style="font-size: 15px;" colspan="6">Plan</th>
            </tr>
            <tr>
              <td><label  class="col-sm-4">Plan Created Date:</label>
                <span><?php echo $riskPlanReport[0]['CreatedDate'];?></span>
              </td>
              <td><label class="col-sm-4">Subject:</label>
                <input type="hidden" name="RiskId" id="RiskId" value="<?php echo $RiskId;?>">
                <span><?php echo $riskPlanReport[0]['Subject'];?></span>
              </td>
                <td><label  class="col-sm-4">Risk Priority:</label>
                <span><?php 
                if ($riskPlanReport[0]['Risk_Status']==null){
                     $riskPlanReport[0]['Risk_Status']="1";
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
                    echo "<p class='btn'  style='width:114px; height:50% ; background-color:red; color:#fff; text-align:center;'>".$riskPlanReport[0]['Risk_Status']."</p>";
                  }
                  elseif($riskPlanReport[0]['Risk_Status']==0){
                    $riskPlanReport[0]['Risk_Status']="Low";
                    echo "<p class='btn'  style='width:114px; height:50% ; background-color:#5cb85c; color:#fff; text-align:center;'>".$riskPlanReport[0]['Risk_Status']."</p>";
                  }?></span>
              </td>
              
            </tr>
            <tr> 
              <td><label  class="col-sm-4">Category :</label>
                <span><?php echo $riskPlanReport[0]['Category'];?></span>
              </td>
            <td><label  class="col-sm-4">Location:</label>
                <span><?php echo $riskPlanReport[0]['Location'];?></span>
              </td>                        
              <td><label  class="col-sm-4">Control Number:</label>
                <span><?php echo $riskPlanReport[0]['ControlNumber'];?></span>
              </td>
              
              
            </tr>
            <tr>
            <td><label  class="col-sm-4">Affected Assets:</label>
                <span><?php echo $riskPlanReport[0]['AffectedAsset'];?></span>
              </td> 
            <td><label class="col-sm-4">Technology:</label>
                <span><?php echo $riskPlanReport[0]['Technology'];?></span>
              </td>                         
              <td><label  class="col-sm-4">Team:</label>
                <span><?php echo $riskPlanReport[0]['Team'];?></span>
              </td>
               
                                       
            </tr>
            <tr>
            <td><label class="col-sm-4">Risk Source:</label>
                <span><?php echo $riskPlanReport[0]['Source'];?></span>
              </td>    
            <td><label  class="col-sm-4">Risk Scoring Method:</label>
                <span><?php echo $riskPlanReport[0]['ScoringMethod'];?></span>
              </td>                      
              <td><label  class="col-sm-4">Owner:</label>
                <span><?php echo $riskPlanReport[0]['Owner'];?></span>
              </td>
              
              
            </tr> 
                  <tr>
                    <td><label  class="col-sm-4">Risk Assesment:</label>
                <span><?php echo $riskPlanReport[0]['RiskAssessment'];?></span>
              </td>
                  <td><label class="col-sm-4">Additional Notes:</label>
                <span><?php echo $riskPlanReport[0]['AdditionalNotes'];?></span>
              </td>                         
            </tr>    
            
          </table>
          <br>

        </div>
  </div>
</div>
</div>
<br>

<div class="kt-portlet">
<div class="kt-portlet__head kt-portlet__head--lg" style="background-color:#2a5aa8;">
<div class="kt-portlet__head-label">
<span class="kt-portlet__head-icon">
<i class="kt-font-brand flaticon2-line-chart"></i>
</span>
<h3 class="kt-portlet__head-title" style="color: white;">
RISK MITIGATION</h3>
</div>

</div> 
              <div class="kt-portlet__body">
                <div class="risk-session overview clearfix">
                  <div class="portlet-body ">
                <?php if($riskScoringDetails[0]['scoring_methods'] == 1 || $riskScoringDetails[0]['scoring_methods'] == 5 || $riskScoringDetails[0]['scoring_methods'] == 3){?>
                <div class="risk-session overview clearfix">
                  <div class="row-fluid">
                    <div class="score--wrapper">
                      <?php if($riskScoringDetails[0]['calculated_risk_status'] == "0"){ ?>
                      <div class="score " style="background-color: rgb(132, 183, 97);">Inherent Risk<br>
                      <?php } else if ($riskScoringDetails[0]['calculated_risk_status'] == "1") {  ?>
                    <div class="score " style="background-color:#7bea4e;">Inherent Risk<br>
                      <?php } else if ($riskScoringDetails[0]['calculated_risk_status'] == "2") {?>
                      <div class="score " style="background-color:#ee5151;">Inherent Risk<br>
                        <?php } else if ($riskScoringDetails[0]['calculated_risk_status'] == "3") {?>
                          
                                          
                            </div>
                            <div class="details--wrapper">
                              <div class="row-fluid">
                                                    
                             <!--  </div>
                              <div class="row-fluid border-top"> -->
                                <div class="span12">
                                  <div id="static-subject" class="static-subject">
                                    <div class="col-xs-4">
                                    <label><strong>Subject:</strong>
                                      <span class="large-text"><?php echo $riskScoringDetails[0]['subject'];?></span>                            
                                    </label> </div>                         
                                <!--   </div>                        
                                </div>  -->
                             <!--    <div class="span5"> -->
                               <div class="col-xs-4">
                                  <label><strong>Status:</strong>
                                    <span class="large-text status-text">Created</span>
                                  </label></div>                       
                           <!--      </div>  -->                      
                              <!-- </div>  -->
                             <!--  <div class="row-fluid border-top"> --><!-- 
                                <div class="span12">
                                  <div id="static-subject" class="static-subject"> -->
                                     <div class="col-xs-4">
                                    <label><strong>Scenario:</strong>
                                      <span class="large-text"><?php echo $riskScenarioDetails[0]['name'];?></span>                            
                                    </label>  </div>                        
                                  </div>                        
                                </div>                      
                              </div> <br><br>
                           <!--  <div class="row-fluid"> -->
                             <div class="span12" style="margin-top: 10px;">
                               <div id="static-subject" class="static-subject">
                                 <div class="col-xs-4">
                                  <label><strong>Likelihood:</strong>
                                    <span class="large-text">    <?php echo $riskScoringDetails[0]['likelihood']; ?><!-- (<?php echo $riskScoringDetails[0]['likelihood_id'];?>) -->  </span>  
                                  </label></div>
                               <!--  </div>  -->
                             <!--   </div>    -->                   
                             <!--  </div>  --> 

                              <!-- <div class="row-fluid border-top"> -->
                            <!--  <div class="span12"> -->
                              <!--  <div id="static-subject" class="static-subject"> -->
                                 <div class="col-xs-4">
                                  <label><strong>Impact:</strong>
                                    <span class="large-text">    <?php echo $riskScoringDetails[0]['impact']; ?><!-- (<?php echo $riskScoringDetails[0]['impact_id'];?>)  --> </span>  
                                  </label>
                                  </div> </div>
                                </div>  </div>  

                             <div class="score " style="background-color:red;">Inherent Risk<br>
                            <?php } ?>
                            <br>
                            <?php if($riskScoringDetails[0]['calculated_risk_status'] == "0"){
                            echo "Low";
                            }
                            else if ($riskScoringDetails[0]['calculated_risk_status'] == "1") {
                            echo "Medium";
                            }
                            else if ($riskScoringDetails[0]['calculated_risk_status'] == "2") {
                            echo "High";
                            }
                            else if ($riskScoringDetails[0]['calculated_risk_status'] == "3") {
                            echo "Extreme";
                            }?>                                          
                        </div>

                            <!--   </div>  -->
                            </div>                  
                        
                          
                          <div class="row-fluid">
                            
                            <div class="row-fluid score-container">
                              <div id="scoredetails" class="scoredetails" style="display: none;">
                                <?php                       
                                 $Likelihood = array("","Remote", "Unlikely", "Credible","Likely","Almost Certain");
                                $Impact = array("","Insignificant","Minor","Moderate","Major","Extreme/Catastrophic");
                                if($riskScoringDetails[0]['scoring_methods'] == 1)
                                {                        
                                ?>
                                <div class="well">                        
                                  <table class="score--table" cellpadding="0" cellpadding="0" style="border:none;width:100%;">
                                    <tbody>
                                      <tr>
                                        <td colspan="3">
                                          <h4 style="font-size: 17.5px;line-height: 20px;margin: 10px 0;">Classic Risk Scoring</h4>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="180">Likelihood:</td>
                                        <td width="30"><?php echo "[" .$riskScoringDetails[0]['CLASSIC_likelihood'] ."]"; ?></td>
                                        <td><?php echo $Likelihood[$riskScoringDetails[0]['CLASSIC_likelihood']];?></td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td width="180">Impact:</td>
                                        <td width="30"><?php echo "[" .$riskScoringDetails[0]['CLASSIC_impact'] ."]"; ?></td>
                                        <td><?php echo $Impact[$riskScoringDetails[0]['CLASSIC_impact']];?></td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td colspan="4">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td colspan="4"><b>RISK = ( Likelihood x Impact ) x ( 10 / 25 ) = <?php echo $riskScoringDetails[0]['calculated_risk'];?></b></td>
                                      </tr>
                                    </tbody>                          
                                  </table> 
                                </div>
                                <?php }?>

                                <?php                
                                  
                                  if($riskScoringDetails[0]['scoring_methods'] == 5)
                                  {                        
                                  ?>
                                <div class="well">                        
                                  <table class="score--table" cellpadding="0" cellpadding="0" style="border:none;width:100%;">
                                    <tbody>
                                      <tr>
                                        <td colspan="3">
                                          <h4 style="font-size: 17.5px;line-height: 20px;margin: 10px 0;">Custom Risk Scoring</h4>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="180">Manually Entered Value:</td>                              
                                        <td><?php echo $riskScoringDetails[0]['calculated_risk'];?></td>
                                        <td>&nbsp;</td>
                                      </tr>                   
                                    </tbody>                          
                                  </table> 
                                </div>
                                <?php }?> 
                                 <?php                
                                  if($riskScoringDetails[0]['scoring_methods'] == 3)
                                  {                        
                                  ?>
                                <div class="well">                        
                                  <table class="score--table" cellpadding="0" cellpadding="0" style="border:none;width:100%;">
                                    <tbody>
                                      <tr>
                                        <td colspan="3">
                                          <h4 style="font-size: 17.5px;line-height: 20px;margin: 10px 0;">DREAD Risk Scoring</h4>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="180">Damage Potential:</td>                              
                                        <td><?php echo $riskScoringDetails[0]['DREAD_DamagePotential'];?></td>
                                        <td>&nbsp;</td>
                                      </tr>  
                                      <tr>
                                        <td width="180">Reproducibility:</td>                              
                                        <td><?php echo $riskScoringDetails[0]['DREAD_Reproducibility'];?></td>
                                        <td>&nbsp;</td>
                                      </tr> 
                                      <tr>
                                        <td width="180">Exploitability:</td>                              
                                        <td><?php echo $riskScoringDetails[0]['DREAD_Exploitability'];?></td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td width="180">Affected Users:</td>                              
                                        <td><?php echo $riskScoringDetails[0]['DREAD_AffectedUsers'];?></td>
                                        <td>&nbsp;</td>
                                      </tr> 
                                      <tr>
                                        <td width="180">Discoverability:</td>                              
                                        <td><?php echo $riskScoringDetails[0]['DREAD_Discoverability'];?></td>
                                        <td>&nbsp;</td>
                                      </tr> 
                                       <tr>
                                        <td colspan="4"><b>RISK = ( <?php echo $riskScoringDetails[0]['DREAD_DamagePotential'];?> + <?php echo $riskScoringDetails[0]['DREAD_Reproducibility'];?> + <?php echo $riskScoringDetails[0]['DREAD_Exploitability'];?> + <?php echo $riskScoringDetails[0]['DREAD_AffectedUsers'];?> + <?php echo $riskScoringDetails[0]['DREAD_Discoverability'];?>  ) / 5 = <?php echo $riskScoringDetails[0]['calculated_risk'];?></b></td>
                                      </tr>                  
                                    </tbody>                          
                                  </table> 
                                </div>
                                <?php }?>                   
                              </div>                    
                            </div>
                            <div class="row-fluid score-overtime-container" style="display: none;">
                                <div class="well">
                                    <div id="socre-overtime-chart" class="socre-overtime-chart"></div>
                                </div>
                            </div>                  
                          </div>               
                        </div>
                        <?php }?>
                      
                      <form id="form1">
                          <div class="row">
                            <div class="form-group">
                              <input type="hidden" class="form-control" id="loggedInUser" value="<?php echo $_SESSION['user_id'] ?>">
                              <input type="hidden" class="form-control" id="riskId">
                              <input type="hidden" class="form-control" id="action">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                <label for="PlanningStrategy">Planned Mitigation Date</label> 
                        <div class="input-daterange input-group">
                        <input type="text" id="PlannedMitigationDate" class="form-control datepickerClass" autocomplete="off" placeholder="yyyy/mm/dd">
                        </div>
                      </div>
                    </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="PlanningStrategy">Planning Strategy</label>       
                                <div class="input-group">
                                  <select id="PlanningStrategy" name="PlanningStrategyDropDown" class="form-control">
                                    <!-- onchange="planing_mitigate()" -->
                                   <option>--Select Planning Strategy--</option>    
                                      <?php foreach($allPlaningStrategy as $strategy){ ?>
                                    <option value="<?php echo $strategy['id'] ?>"><?php echo $strategy['name'] ?></option>
                                      <?php } ?>
                                  </select>
                                 
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="MitigationEffort">Mitigation Effort</label>       
                                <div class="input-group">
                                  <select id="MitigationEffort" name="MitigationEffortDropDown" class="form-control">
                                    <option>--Select Mitigation Effort--</option>
                                    <?php foreach($allMitigationEffort as $mitigationeffort){ ?>
                                    <option value="<?php echo $mitigationeffort['id'] ?>"><?php echo $mitigationeffort['name'] ?></option>
                                      <?php } ?>
                                  </select>
                                  
                                </div>
                              </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class=col-md-4>
                              <div class="form-group">
                                <label for="MitigationCost">Mitigation Cost</label>       
                                <div class="input-group">
                                  <select id="MitigationCost" name="MitigationCostDropDown" class="form-control">
                                    <option>--Select Mitigation Cost--</option>    
                                    <?php foreach($allMitigationCost as $mitigationcost){ ?>
                                    <option value="<?php echo $mitigationcost['id'] ?>"><?php echo $mitigationcost['pricing'] ?></option>
                                    <?php } ?>
                                  </select>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="MitigationOwner">Mitigation Owner</label>       
                                <div class="input-group">
                                  <select id="MitigationOwner" name="MitigationOwnerDropDown" class="form-control">
                                    <option>--Select Mitigation Owner--</option>    
                                    <?php foreach($allUsers as $user){ ?>
                                    <option value="<?php echo $user['id'] ?>"><?php echo $user['last_name'] ?></option>
                                    <?php } ?>
                                  </select>
                                 
                                </div>
                              </div>
                            </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="SecurityRecommendations">Security Recommendations</label>
                                  <div class="input-group">
                                  <textarea class="form-control" maxlength="5000" rows="1" id="SecurityRecommendations" placeholder="--Type Recommendation--"></textarea>
                                </div>
                              </div>
                              </div>
                             </div>
                            <div class="row">
                            <div class="col-md-4"> 
                              <div class="form-group">
                                <label for="MitigationPercent">Mitigation Percent</label>
                                <input type="number" class="form-control" id="MitigationPercent" min="1" max="100" onblur="mitigation_reviwer()" placeholder="--Type Percentage% --">
                                <input type="hidden" id="impact" value="<?php echo $riskScoringDetails[0]['impact_id'];?>" >
                                <input type="hidden" id="likelihood" value="<?php echo $riskScoringDetails[0]['likelihood_id']?>">
                             </div> 
                             </div> 
                             <div class="col-md-4">        
                              <div class="form-group">
                                <?php include "riskScenarioMitigation.php"; ?>
                                <input maxlength="5000" rows="3" class="form-control" id="CurrentSolution" type="hidden" style="visibility: none"/>
                              </div>
                              </div>  
                              <div class="col-md-4">                         
                              <div class="form-group">
                                <label for="SecurityRequirements">Security Requirements</label><br>
                                <textarea maxlength="5000" rows="1" class="form-control" id="SecurityRequirements" placeholder="--Type Security Requirements --"></textarea>
                              </div>
                              </div>
                            </div>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                                <label for="MitigationTeam">Mitigation Team</label>
                                <div class="input-group">
                                  <select id="MitigationTeam" name="MitigationTeamDropDown" class="form-control">
                                    <option>--Select Mitigation Team--</option>    
                                    <?php foreach($allTeam as $team){ ?>
                                    <option value="<?php echo $team['id'] ?>"><?php echo $team['name'] ?></option>
                                    <?php } ?>
                                  </select>
                                  <!-- <div class="input-group-prepend"><span class="input-group-text"><i class="la la-search"></i></span></div> -->
                                </div>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                              <div class="input-group">
                                <label for="SupportingDocumentation">Supporting Documentation</label>
                                <input type="file" name="SupportingDocumentation" id="SupportingDocumentation">
                              </div>
                            </div>
                        </div>
                    </div>
                        </form>
                        <div class="modal-footer" style="border-top: 2px solid #eef1f5;">
                         <button type="button" class="btn btn-default" data-dismiss="modal" onclick="rejectRisk(<?php echo $RiskId ?>,'reject')">Reject Risk</button>
                          <button type="button" data-dismiss="modal" class="btn btn-primary" onclick="saveRiskMitigation(<?php echo $RiskId ?>,'Mitigated')">Accept</button>
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
    </div>
    <div id="Aftersafecard" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
                <div class="modal-content" style="border: 1px solid #32c5d2;">
                   <h4 class="panel-heading text-center" style=" background-color: #32c5d2;margin-top: 0px; color: #fff;" id="myModalLabel">Quantitative Analysis</h4>
                    <div class="modal-body">
                     <form id="form1">
                <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Before Safeguard</b></div>
                    <div class="panel-body">
                      <div class="col-md-4" >
                         <div class="form-group">
                            <label>Exposure Factor (EF) <b>*</b></label>
                            <input type="number" class="form-control" id="Exposure_Asset_Before_Safeguard" value="<?php echo $risksafguardDetails[0][Exposure_Asset_Before_Safeguard]?>" onblur="SingleLossExpectancyBeforeSafeguard()" readonly >
                          </div>       
                      </div>
                      <div class="col-md-4" >
                        <div class="form-group">
                                 <label>Asset Value (AV)</label>
                                 <input type="number" value="<?php echo $risksafguardDetails[0][Asset_Value_Before_Safeguard]?>" va class="form-control" id="Asset_Value_Before_Safeguard" onblur="SingleLossExpectancyBeforeSafeguard()"  readonly>
                              </div>         
                      </div>                    
                      <div class="col-md-4" >
                        <div class="form-group">
                               <label for="sale">Single Loss Expectancy (SLE)</label>
                               <input type="number" value="<?php echo $risksafguardDetails[0][Single_Loss_Expectancy_Before_Safeguard]?>" class="form-control" id="Single_Loss_Expectancy_Before_Safeguard" value="" readonly>
                              </div>         
                      </div> 
                        <div class="col-md-6" >
                      <div class="form-group">
                               <label for="">Anualized Rate Of Ocurance (ARO)</label>
                               <input type="number" value="<?php echo $risksafguardDetails[0][Anulaized_Rate_Of_Ocurance_Before_Safeguard]?>" class="form-control" id="Anulaized_Rate_Of_Ocurance_Before_Safeguard" onblur="AnulaizedlossExpectionPrior()" readonly>
                              </div>        
                      </div>  
                       <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="sale">Anualized Loss Expection (Prior)</label><input type="text" class="form-control"  id="Anualized_Loss_Expection_Before_Safeguard" value="<?php echo $risksafguardDetails[0][Anualized_Loss_Expection_Before_Safeguard]?>"  readonly >
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
                    <div class="panel-heading"><b>After Safeguard</b></div>
                    <div class="panel-body">
                     <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">Exposure Factor (EF) <b>*</b></label>
                                <input type="number" class="form-control"  id="Exposure_Asset_After_Safeguard"  onblur="SingleLossExpectancy()">
                              </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                  <label for="">Anualized Rate Of Ocurance (ARO)</label>
                                  <input type="number" class="form-control" id="Anulaized_Rate_Of_Ocurance_After_Safeguard" onblur="AnualizedLossExpectionpost()">
                               </div>
                            </div>
                             <div class="col-md-4">
                              <div class="form-group">
                                 <label for="sale">Single Loss Expectancy (SLE)</label><input type="text" class="form-control" id="Single_Loss_Expectancy_After_Safeguard" value = ""  onblur="AnualizedLossExpectionpost()" readonly >
                              </div>
                            </div>
                          </div>                   
                     
                       <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="sale">Anualized Loss Expection (Post)</label><input type="text" class="form-control"  id="Anualized_Loss_Expection_After_Safeguard" value = ""   readonly >
                              </div>
                            </div>
                       <div class="col-md-6">
                              <div class="form-group">
                               <label for="">Safeguard Value (SV)</label>
                               <input type="number" class="form-control" id="Safeguard" onblur ="NetRiskReductionBenifit()" >
                              </div>
                            </div>   
                           </div>  
                  
                    </div>         
                  </div>
                </div>
              </div> 
                          <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Net Risk Reduction Benefit (NRRB)<b></b></label>
                                <input type="number" class="form-control"  id="Net_Risk_Reduction_Benifit"  readonly>
                              </div>
                            </div>
                          <p><b>* Note:values in percentage </b></p>
                      
                      </form>
                    </div>
                    <div class="modal-footer">
                     <button type="button" class="btn" data-dismiss="modal" style="background: #32c5d2; color: #fff">Submit</button>
                  </div>
                  </div>
                </div>
             
            </div>
<?php 
        include '../audit/sidemenu.php';
    ?>

      <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
<script src="assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<!-- <script src="assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script> -->
<script src="assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
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
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
          
      <script src="assets/js/demo3/scripts.bundle.js" type="text/javascript"></script>
      <script src="assets/toggleButton/bootstrap-toggle.min.js"></script>
      <script type="text/javascript" src="assets/jquery-ui-1.11.4/jquery-ui.js"></script>  
 <script src="js/risk/riskManagement.js"></script>
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
