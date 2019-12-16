<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    // 4 is auditor role
    $allTechnology = $riskManager->getAllTechnology();
?>



   
     <label class="col-lg-3 col-form-label">Technology: </label>        
        <div class="col-lg-9"> 
 <select id="technology" name="technologyDropDown"  class="form-control select2" multiple="" >
             <option></option>    
    <?php foreach($allTechnology as $technology){ ?>
    <option value="<?php echo $technology['id'] ?>"><?php echo $technology['name'] ?></option>
    <?php } ?>
</select>
 </div>
            