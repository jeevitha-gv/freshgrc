<?php
    require_once __DIR__.'/../../php/bcpm/bcpmManager.php';    

    $manager = new BcpmManager();
      $id=$_POST['t'];

    
    
    // 4 is auditor role
    $allSubAssetClass = $manager->getAllSubAssetClass($id);
?>

 <label>Assets</label>        

        <div class="form-group">
            
            <select  id="subPolicy" name="subPolicy" class="form-control select2">
             <option></option>    
    <?php foreach($allSubAssetClass as $Policy){ ?>
    <option value="<?php echo $Policy['id'] ?>"><?php echo $Policy['name'] ?></option>

    <?php } ?>
</select>
</div>