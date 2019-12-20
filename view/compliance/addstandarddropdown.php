<?php
    require_once __DIR__.'/../../php/common/metaData.php';
    require_once __DIR__.'/../../php/audit/auditManager.php';
    $riskManager = new AuditManager();
    
    $allCompliances = $riskManager->getAllCompliances($_SESSION['company']);
?>
<div>
  <label class="control-label" style="font-size: 25px; "><strong>Add Standard</strong></label>
  <div class="row">
  <select id="comp_id" class="form-control" style="width: 45%; height: 40px; border-radius: 25px; margin-left: 25%;">
    <option>Select</option>
    <?php foreach($allCompliances as $compliance) { ?>
      <option value="<?php echo $compliance['id'] ?>"><?php echo $compliance['name'] ?></option>
    <?php } ?>
  </select>
  <button class="btn btn-outline-secondary" onclick=" addstand(), location.reload(true) " title="Add Checklists" style="cursor: pointer;height: 40px; border-radius: 25px; margin-left: 5px;"><span class="la la-plus-circle"></span></button>
  <a href="view/common/regulatoryTemplate.php" style="margin-left: 22%;"><img src="import.png" title="Import CheckLists" width="45" height="40"></a>
</div>
</div>
