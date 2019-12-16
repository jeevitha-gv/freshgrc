<?php
    require_once __DIR__.'/../../php/risk/riskManager.php';
    $riskManager = new RiskManager();
    $id=$_POST['id'];
    // 4 is auditor role
    $allCategory = $riskManager->getAllSubCategory($id);
?>
    <label class="col-lg-3 col-form-label">Sub Category: </label> 
    <div class="col-lg-9"> 
<select  id="subCategory" name="categoryDropDown" class="form-control">
             <option></option>    
    <?php foreach($allCategory as $category){ ?>
    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
    <?php } ?>
</select>
</div>
