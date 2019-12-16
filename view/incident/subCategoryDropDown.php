<?php
    require_once __DIR__.'/../../php/incident/incidentManager.php';
    $metaData = new IncidentManager();
    $id=$_POST['id'];
    // 4 is auditor role
    $allSubCategory = $metaData->getRiskSubCategory($id);
?>

<label >Sub Category</label>        

        <div class="input-group">
            
            <select  id="subCategory" name="categoryDropDown" class="form-control ">
             <option></option>    
    <?php foreach($allSubCategory as $category){ ?>
    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
    <?php } ?>
    <option value="Other">Other</option>
</select> 
        </div>
