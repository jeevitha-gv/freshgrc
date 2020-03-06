<?php
    require_once __DIR__.'/../../php/common/metaData.php';
    require_once __DIR__.'/../../php/audit/auditManager.php';
    $riskManager = new AuditManager();
    
    $allCompliances = $riskManager->getAllCompliances($_SESSION['company']);
?>
<div style="margin-top: -4%;">
  <label class="control-label" style="font-size: 25px;"><strong>Add Standard</strong></label>
  <div class="row">
  <select id="comp_id" class="form-control" style="width: 45%; height: 40px; border-radius: 25px; margin-left: 25%;">
    <option>Select</option>
    <?php foreach($allCompliances as $comp) { ?>
      <option value="<?php echo $comp['id'] ?>"><?php echo $comp['name'] ?></option>
    <?php } ?>
  </select>
  <button class="btn btn-outline-secondary" onclick="addstand()" title="Add Checklists" style="cursor: pointer; border-radius: 20px; margin-left: 5px; margin-top: -5px;"><span class="fa fa-plus-circle fa-2x"></span></button>
 
</div>
</div>
