<?php
    require_once __DIR__.'/../../php/common/metaData.php';
    require_once __DIR__.'/../../php/audit/auditManager.php';
    $riskManager = new AuditManager();
    
    $allCompliances = $riskManager->getAllCompliances($_SESSION['company']);
?>
   
   

        
 <label class="col-lg-3 col-form-label">Compliance </label>
  <div class="col-lg-9">
         

      <select id="compliance" class="form-control select" onchange="getControls()" multiple="">
        <!-- <option></option> -->
        <?php foreach($allCompliances as $compliance){ ?>
         <option value="<?php echo $compliance['id'] ?>"><?php echo $compliance['name'] ?></option>
        <?php } ?>                                     
      </select>
   
     </div>
    </div>

 <!-- <script src="metronic/theme/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script> -->
       