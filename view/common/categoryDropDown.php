<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    // 4 is auditor role
    $allCategory = $riskManager->getAllCategory();
?>

<label class="col-lg-3 col-form-label">Category: </label> 
<div class="col-lg-9">       
 <select  id="category" name="categoryDropDown" class="form-control" onchange="getSubCategory()">
             <option></option>    
    <?php foreach($allCategory as $category){ ?>
    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
    <?php } ?>
</select>

 </div>
