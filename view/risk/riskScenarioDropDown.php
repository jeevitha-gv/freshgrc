<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    $allScenario = $riskManager->getAllScenario();
?>
 


    
    <label class="col-lg-3 col-form-label">Scenario: </label>        
            <div class="col-lg-9">
            <select  id="scenario" name="scenarioDropDown" class="form-control">
             <option></option>    
    <?php foreach($allScenario as $scenario){ ?>
    <option value="<?php echo $scenario['id'] ?>"><?php echo $scenario['name'] ?></option>
    <?php } ?>
</select>
</div>
