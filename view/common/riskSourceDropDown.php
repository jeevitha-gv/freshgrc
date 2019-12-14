<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    // 4 is auditor role
    $allRiskSource = $riskManager->getAllRiskSource();
?>


<label class="col-lg-3 col-form-label">Risk Source: </label>
<div class="col-lg-9">
  <select id="riskSource" name="riskSourceDropDown" class="form-control">
    <option></option>    


    <?php foreach($allRiskSource as $risksource){ ?>
    <option value="<?php echo $risksource['id'] ?>"><?php echo $risksource['name'] ?></option>
    <?php } ?>
  </select>
  
</div>
