
<?php
    require_once __DIR__.'/../../php/policy/policyManager.php';    

    $policyManager = new PolicyManager();
      $id=$_POST['id'];
      $oldSubPolicy=$_POST['oldSubPolicy'];
    
    // 4 is auditor role
    $allsubPolicy = $policyManager->getAllSubPolicy($id);
?>
<div>
 <select id="subPolicy" name="subPolicy" class="form-control">
             <option></option>    
    <?php foreach($allsubPolicy as $Policy){ ?>
    <option value="<?php echo $Policy['id'] ?>"<?php
        if($oldSubPolicy == $Policy['id']){
          
        }
    ?>><?php echo $Policy['Name'] ?></option>

    <?php } ?>
</select>
</div>
