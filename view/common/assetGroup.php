<?php
    require_once __DIR__.'/../../php/asset/assetManager.php';

$user = new AssetManager();
$asset_group = $user->getAssetGroup();


?>
<label class="col-lg-3 col-form-label">Asset Group: </label>
<div class="col-lg-9">
            <select  id="assetDrop" name="asset_groups" class="form-control" onchange="getAssetvalue()">
                             <option>...select...</option>
                             <?php
                            foreach ($asset_group as $assets) {
                             
                              ?>

                             <option value="<?php echo $assets['id'] ?>"><?php echo $assets['name'];?></option> 
                             <?php
                            }
                            ?>
                              
                            </select>
           
</div>

        
        

                                        
