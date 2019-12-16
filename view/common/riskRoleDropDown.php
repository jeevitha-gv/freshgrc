<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    // 13 is riskReviewer role
    $allRiskReviewer = $riskManager->getRiskRole(13);
?>

    <label class="col-lg-3 col-form-label">Reviewer:</label>       
      <div class="col-lg-9">
      <select  id="riskReviewer" name="riskReviewerDropDown" class="form-control" required>
       <option></option>    
      <?php foreach($allRiskReviewer as $riskreviewer){ ?>
      <option value="<?php echo $riskreviewer['userId'] ?>"><?php echo $riskreviewer['lastName'] ?></option>
      <?php } ?>
  </select>
        </div>
