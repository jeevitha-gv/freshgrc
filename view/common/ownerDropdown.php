<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    // 11 is riskOwner role
    $allRiskOwner = $riskManager->getRiskRole(11);
?>
    <label class="col-lg-3 col-form-label">Owner: </label>       
         <div class="col-lg-9">   
      <select  id="riskOwner" name="riskOwnerDropDown" class="form-control" required>
        <option></option>    

        <?php foreach($allRiskOwner as $riskowner){ ?>
          <option value="<?php echo $riskowner['userId'] ?>"><?php echo $riskowner['lastName'] ?></option>
        <?php } ?>
      </select>
      </div>
