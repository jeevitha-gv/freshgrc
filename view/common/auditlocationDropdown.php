<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    // 4 is auditor role
    $allLocation = $riskManager->getAllLocation();
?>
<!-- <label>Location</label> -->
<select  id="location" name="locationDropDown"  class="form-control">
    <option>...select...</option> 
    <?php foreach($allLocation as $location){ ?>
        <option value="<?php echo $location['id'] ?>"><?php echo $location['name']; ?></option>
    <?php } ?>
</select>


