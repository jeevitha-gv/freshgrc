<?php
    require_once __DIR__.'/../../php/common/metaData.php';

    $metaData = new MetaData();
    $allRoles = $metaData->getAllCategory();
?>
    <select id="category" name="category" class="form-control">
    <option>--Select Category--</option>    
    <?php foreach($allRoles as $category){ ?>
    <option value="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></option>
    <?php } ?>
</select>
