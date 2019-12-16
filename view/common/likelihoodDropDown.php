<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';

    $riskManager = new RiskManager();
    
    $allLikelihood = $riskManager->getAllLikelihood();
?>
<label for="likelihood">Likelihood</label>

    <select id="likelihood" name="likelihoodDropDown" class="form-control">
	      <option></option>
	    <?php foreach($allLikelihood as $likelihood){ ?>
	    <option value="<?php echo $likelihood['id'] ?>"><?php echo $likelihood['name'] ?></option>
	    <?php } ?>
    </select>



