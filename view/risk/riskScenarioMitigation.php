<?php 
$id=$riskScenarioDetails[0]['id'];
 $riskManager = new RiskManager();
$allScenario = $riskManager->getAllScenarioMitigation($id); 
?>


    <div class="form-group">
    
    <label ><strong>Risk Scenario Mitigation</strong></label>        
        <div class="">
            
            <select id="scenarioMitigation" name="scenarioDropDown" class="form-control">
             <option>--Select Risk Scenario Mitigation--</option>    
    <?php foreach($allScenario as $scenario){ ?>
    <option value="<?php echo $scenario['id'] ?>"><?php echo $scenario['name'] ?></option>
    <?php } ?>
</select>
        </div>
    
</div>


