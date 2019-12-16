<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';

    $riskManager = new RiskManager();

    $allimpact = $riskManager->getAllImpact();
?>
    <label for="impact">Impact</label>
    
	    <select id="impact" name="impactDropDown" class="form-control">
		    <option></option>
		    <?php foreach($allimpact as $impact){ ?>
		    <option value="<?php echo $impact['id'] ?>"><?php echo $impact['name'] ?></option>
		    <?php } ?>
	   </select>
	 