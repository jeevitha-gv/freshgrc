<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    // 4 is auditor role
    $allTeam = $riskManager->getAllTeam();
?>


     <label class="col-lg-3 col-form-label">Affected Team: </label>        
        <div class="col-lg-9">            
            <select id="team" name="teamDropDown" class="form-control">
            <option></option>    
    <?php foreach($allTeam as $team){ ?>
    <option value="<?php echo $team['id'] ?>"><?php echo $team['name'] ?></option>
    <?php } ?>
</select>
 </div>
          
