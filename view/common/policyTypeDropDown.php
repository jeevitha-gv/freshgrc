
<?php
    require_once __DIR__.'/../../php/policy/policyManager.php';
    $policyManager = new PolicyManager();
    $allPolicyTypes = $policyManager->getAllPolicyTypes();
?>
    
 
            <select id="policytype" name="policytypeDropDown" class="form-control" onchange="getSubPolicy()">
             <option></option>    
    <?php foreach($allPolicyTypes as $policytype){ ?>
    <option value="<?php echo $policytype['id'] ?>"<?php if(isset($policyData)){
        if($policyData[0]["policyType"] == $policytype['name']){
            echo "selected";
        }
    }
    ?>><?php echo $policytype['name'] ?></option>
    <?php } ?>
</select> 
     