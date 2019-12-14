<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    // 12 is riskMitigator role
    $allRiskMitigator = $riskManager->getRiskRole(12);
?>
    <label class="col-lg-3 col-form-label">Mitigator:</label>       
    <div class="col-lg-9">
      <select  id="riskMitigator" name="riskMitigatorDropDown" class="form-control" required>
        <option></option>    

        <?php foreach($allRiskMitigator as $riskmitigator){ ?>
          <option value="<?php echo $riskmitigator['userId'] ?>"><?php echo $riskmitigator['lastName'] ?></option>
        <?php } ?>
      </select> 
     </div>
