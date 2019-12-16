<?php
    require_once __DIR__.'/../../php/asset/assetManager.php';
$user = new AssetManager();
 $asset=$_POST['asset'];
$asset_group = $user->getAssets($asset);
   

?>

<label class="col-lg-3 col-form-label">Assets: </label>
<div class="col-lg-9">
  <select name="asset_group" class="form-control"  id="asset_groups" onchange="getAssetValuefromAsset()">
                             <option></option>
                             <?php
                            foreach ($asset_group as  $asset_groups) {
                              $name = $asset_groups['name'];
                              ?>

                             <option value="<?php echo $asset_groups['id'] ?>"><?php echo $name;?></option> 
                             <?php
                            }
                            ?>
                              
                            </select>
    
</div>



