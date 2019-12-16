
<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    $allLocation = $riskManager->getAllCategoryrisk();
?>

 
      <div class="form-group">
        <label for="multi-append" class="control-label">Risk Catgories</label>        
       <div class="input-group select2-bootstrap-append">
            
            <select  id="riskcategory" name="categorydropdown" class="form-control">
              <option></option>    

    <?php foreach($allLocation as $location){ ?>
    <option value="<?php echo $location['id'] ?>"><?php echo $location['name']; ?></option>
    <?php } ?>
</select>
        
        </div>
        </div>
