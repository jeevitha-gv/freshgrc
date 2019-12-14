<?php
    require_once __DIR__.'/../../php/bcpm/bcpmManager.php';
     $manager = new BcpmManager();
    $allAssetclass=$manager->getAllAssetTypes();
?>

<div class="form-group">
    <label>Asset Class</label>        
<!--         <div class="input-group select2-bootstrap-prepend">
 -->            
            <select id="assettype" name="assettypes" class="form-control select2"
                  onchange="getSubAssetClass()">
            
             <option></option>    
    <?php foreach($allAssetclass as $organization_type_id){ ?>
    <option value="<?php echo $organization_type_id['id']; ?>"><?php echo $organization_type_id['name']; ?></option>
    <?php } ?>
</select> 
        <!-- </div> -->
</div>
