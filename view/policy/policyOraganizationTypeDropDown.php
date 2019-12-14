<?php
    require_once __DIR__.'/../../php/policy/policyManager.php';
    $policyManager = new PolicyManager();
    $allOrganizationTypes=$policyManager->getAllOrganizationTypes();
?>
    
            <select id="organization_type_id" name="organization_type_id" class="form-control">
             <option></option>    
    <?php foreach($allOrganizationTypes as $organization_type_id){ ?>
    <option value="<?php echo $organization_type_id['id'] ?>" <?php if(isset($policyData)){
        if($policyData[0]["organization_type_id"] == $organization_type_id['id']){
            echo "selected";
        }
    }
    ?>><?php echo $organization_type_id['name'] ?></option>
    <?php } ?>
</select> 
      
   