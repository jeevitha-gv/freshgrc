<div class="kt-radio-list">
 <fieldset>
 <div class="row">
 <div class="col-md-2">
  <label class="kt-radio kt-radio--solid kt-radio--primary">
      <input type="radio" name="audience" value="<?php echo $allAudience[0]['id'] ?>" onclick="policyAudience(<?php echo $allAudience[0]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["audience"] == $allAudience[0]['name']){
        echo "checked";
        $val = $allAudience[0]['id'];
      }
    }?>>
    <?php echo $allAudience[0]['name'] ?><span></span>
</label>
</div>
<div class="col-md-2">
  <label class="kt-radio kt-radio--solid kt-radio--danger">
    
      <input type="radio" name="audience" value="<?php echo $allAudience[1]['id'] ?>" onclick="policyAudience(<?php echo $allAudience[1]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["audience"] == $allAudience[1]['name']){
        echo "checked";
        $val = $allAudience[1]['id'];
      }
    }?>>
    <?php echo $allAudience[1]['name'] ?><span></span>
</label>
</div>
<div class="col-md-2">
  <label class="kt-radio kt-radio--solid kt-radio--success">
    <input type="radio" name="audience" value="<?php echo $allAudience[2]['id'] ?>" onclick="policyAudience(<?php echo $allAudience[2]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["audience"] == $allAudience[2]['name']){
        echo "checked";
        $val = $allAudience[2]['id'];
      }
    }?>>
    <?php echo $allAudience[2]['name'] ?><span></span>
</label>
</div>
</div>
</fieldset>
    <input type="hidden" id="audience" <?php if(isset($policyData)){echo "value='" . $val . "'";}?>>
    </div>



