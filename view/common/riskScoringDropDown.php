
<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    // 4 is auditor role
    $allRiskScore = $riskManager->getAllRiskScore();
?>
   

 <div class="panel panel-default">
<div class="panel-body"style="border: 1px solid #BABDBA;">

       <label style="text-align: center;" ><b>Risk Scoring Method</b></label>        
        <div class="input-group select2-bootstrap-prepend">
<!--             
            <select  id="riskScore" name="riskScoreDropDown" class="form-control select2" onchange="getScoringMethods()">
             <option></option>    
    <?php foreach($allRiskScore as $riskscore){ ?>
    <option value="<?php echo $riskscore['id'] ?>"><?php echo $riskscore['name'] ?></option>
    <?php } ?>
</select> -->
<div class="form-group" >
    <?php foreach($allRiskScore as $riskscore){ ?>
      <?php if($riskscore['id']==1){?>
   <!--  <input type="radio" id="riskScore" name="classic" value="1" data-toggle="modal" data-target="#classicScoring" onclick="getScoringMethods(this.value);" >Classic -->
       <button href="#classicScoring" id="riskScore" title="CLASSIC" value="1" class="btn btn-outline-primary" data-toggle="collapse" onclick="getScoringMethods(this.value);"><i class="flaticon-rocket" style="font-size: 24px; color:black;"></i></button>&nbsp;&nbsp;&nbsp;

<?php }?>

  <?php
if($riskscore['id']==2){?>

    <button href="#cvssScoring" id="riskScore" value="2" title="CVSS"  class="btn btn-outline-primary" data-toggle="collapse" onclick="getScoringMethods(this.value);"><i class="flaticon-map" style="font-size: 24px; color:black;"></i></button>&nbsp;&nbsp;&nbsp;
   
<?php }?>
  <?php
if($riskscore['id']==3){?>
  <button href="#dreadScoring" id="riskScore" value="3" title="DREAD" class="btn btn-outline-primary" data-toggle="collapse" onclick="getScoringMethods(this.value);"><i class="flaticon-responsive" style="font-size: 24px; color:black;"></i></button>&nbsp;&nbsp;&nbsp;
   
<?php }?>
<?php 
if($riskscore['id']==4){?>
     <button href="#owaspScoring" id="riskScore" value="4" title="OWASP" class="btn btn-outline-primary" data-toggle="collapse" onclick="getScoringMethods(this.value);"><i class="flaticon-network" style="font-size: 24px; color:black;"></i></button>&nbsp;&nbsp;&nbsp;
   
<?php }?>
<?php
if($riskscore['id']==5){?>
    <button href="#customScoring" id="riskScore" value="5" title="CUSTOM" class="btn btn-outline-primary" data-toggle="collapse" onclick="getScoringMethods(this.value);"><i class="flaticon-graph" style="font-size: 24px; color:black;"></i></button>&nbsp;&nbsp;&nbsp;
   
<?php }?>
<?php 
if($riskscore['id']==6){?>
   <button href="#assetscoring" id="riskScore" value="6" title="ASSET" class="btn btn-outline-primary" data-toggle="collapse" onclick="getScoringMethods(this.value);"><i class="flaticon-earth-globe" style="font-size: 24px; color:black;"></i></button>&nbsp;&nbsp;&nbsp;
   
<?php }?>

    <?php } ?>
 
           
<!-- 
                                <div class="col-md-4">
                                  <div class="form-group">     
                                    <div class="input-group select2-bootstrap-prepend" >          
                                      <label for="chkYes"> -->
                                    <!--   <input type="radio" id="chkYes" name="chkPassPort" data-toggle="collapse" data-target="#Qualitative"> -->
                                 <button href="#Qualitative" id="chkYes" title="QUALITATIVE" name="chkPassPort" class="btn btn-outline-primary" data-toggle="collapse"><i class="flaticon-dashboard" style="font-size: 24px; color:black;"></i></button>
                                  </label>&nbsp;&nbsp;&nbsp;
                                  <label for="chkNo">
                                      <!-- <input type="radio" id="chkNo" name="chkPassPort" data-toggle="collapse" data-target="#Quantitative"/>
                                      Quantitative -->
                                       <button href="#Quantitative" id="chkNo" title="QUANTITATIVE" name="chkPassPort" class="btn btn-outline-primary" data-toggle="collapse"><i class="flaticon-analytics"  style="font-size: 24px; color:black;"></i></button>
                                  </label>
                                <!-- </div>
                                  </div>
                                </div> -->
                              </div>
                            </div>
                          </div>
                        </div>
<style type="text/css">
  button:hover {
    transform: scale(1.05);
    -webkit-transform: scale(1.05);
    -moz-transform: scale(1.05);
    -ms-transform: scale(1.05);
    -o-transform: scale(1.05);
    transition: all .3s ease-in-out;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
  }
</style>