
<div class="kt-radio-list">
 <fieldset>
 <div class="row">
 <div class="col-md-2">
  <label class="kt-radio kt-radio--solid kt-radio--primary">
  <input type="radio" name="classification"  value="<?php echo $allPolicyProcedure[0]['id'] ?>" onclick="policyprocedure(<?php echo $allPolicyProcedure[0]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["policy_procedure"] == $allPolicyProcedure[0]['id']){
        echo "checked";
      }
    }?>><?php echo $allPolicyProcedure[0]['name'] ?> <span></span>
</label>
</div>

<div class="col-md-2">
 <label class="kt-radio kt-radio--solid kt-radio--danger">
<input type="radio" name="classification"  value="<?php echo $allPolicyProcedure[1]['id'] ?>" onclick="policyprocedure(<?php echo $allPolicyProcedure[1]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["policy_procedure"] == $allPolicyProcedure[1]['id']){
        echo "checked";
      }
    }?>><?php echo $allPolicyProcedure[1]['name'] ?><span></span>
  </label>
</div>
<div class="col-md-2">
  <label class="kt-radio kt-radio--solid kt-radio--success">
<input type="radio" name="classification"  value="<?php echo $allPolicyProcedure[2]['id'] ?>" onclick="policyprocedure(<?php echo $allPolicyProcedure[2]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["policy_procedure"] == $allPolicyProcedure[2]['id']){
        echo "checked";
      }
    }?>><?php echo $allPolicyProcedure[2]['name'] ?><span></span>
  </label>
</div>
<div class="col-md-2">
  <label class="kt-radio kt-radio--solid kt-radio--warning">
<input type="radio" name="classification"  value="<?php echo $allPolicyProcedure[2]['id'] ?>" onclick="policyprocedure(<?php echo $allPolicyProcedure[3]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["policy_procedure"] == $allPolicyProcedure[3]['id']){
        echo "checked";
      }
    }?>><?php echo $allPolicyProcedure[3]['name'] ?><span></span>
  </label>
</div>
<div class="col-md-2">
  <label class="kt-radio kt-radio--solid kt-radio--info">
  <input type="radio" name="classification"  value="<?php echo $allPolicyProcedure[2]['id'] ?>" onclick="policyprocedure(<?php echo $allPolicyProcedure[4]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["policy_procedure"] == $allPolicyProcedure[4]['id']){
        echo "checked";
      }
    }?>><?php echo $allPolicyProcedure[4]['name'] ?><span></span>
  </label>
</div>
</div>
</fieldset>


  <input type="hidden" id="policy_procedure" <?php if(isset($policyData)){echo "value='" . $policyData[0]["policy_procedure"] . "'";}?>>
</div>



