<?php
    require_once __DIR__.'/../../php/common/metaData.php';
    require_once __DIR__.'/../../php/audit/auditManager.php';
    $riskManager = new AuditManager();
    
    $allCompliances = $riskManager->getAllCompliances($companyId);
?>

        <label class="col-lg-3 col-form-label">Control Regulation:</label>
            <div class="col-lg-9">
              <select id="regulation"  class="form-control select2" onchange="getControls()" multiple=""style="width:100%;">
                  
                <?php foreach($allCompliances as $compliance){ ?>
                  <option value="<?php echo $compliance['id'] ?>"><?php echo $compliance['name'] ?></option>
                  <?php } ?>
               </select>  
            </div>
