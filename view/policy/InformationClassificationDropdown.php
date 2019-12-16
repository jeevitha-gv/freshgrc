<div class="kt-radio-list">
 <fieldset>
 <div class="row">
 <div class="col-md-2">
  <label class="kt-radio kt-radio--solid kt-radio--primary">
<input type="radio"  name="classificationinformation"  value="<?php echo $allInformationClassification[0]['id'] ?>" onclick="policyClasification(<?php echo $allInformationClassification[0]['id'] ?>)" <?php if(isset($policyData)){
      if($policyData[0]["policyClassification"] == $allInformationClassification[0]['name']){
        echo "checked";
        $val = $allInformationClassification[0]['id'];
      }
    }?>><?php echo $allInformationClassification[0]['name'] ?>      <span></span>
    </label>
  </div>
  <div class="col-md-3">
  <label class="kt-radio kt-radio--solid kt-radio--danger">
<input type="radio" name="classificationinformation"  value="<?php echo $allInformationClassification[1]['id'] ?>" onclick="policyClasification(<?php echo $allInformationClassification[1]['id'] ?>)" <?php if(isset($policyData)){
      if($policyData[0]["policyClassification"] == $allInformationClassification[1]['name']){
        echo "checked";
        $val = $allInformationClassification[1]['id'];
      }
    }?>><?php echo $allInformationClassification[1]['name'] ?><span></span>
    </label>
  </div>
   <div class="col-md-2">
  <label class="kt-radio kt-radio--solid kt-radio--success">
<input type="radio" name="classificationinformation"  value="<?php echo $allInformationClassification[2]['id'] ?>" onclick="policyClasification(<?php echo $allInformationClassification[2]['id'] ?>)" <?php if(isset($policyData)){
      if($policyData[0]["policyClassification"] == $allInformationClassification[2]['name']){
        echo "checked";
        $val = $allInformationClassification[2]['id'];
        
      }
    }?>><?php echo $allInformationClassification[2]['name'] ?><span></span>
    </label>
  </div>
</div>
</fieldset>




<!-- <div class="col-md-2" style="width:150px;margin-left:340px;margin-top:-35px"  title="Secret" data-toggle="popover" data-trigger="hover" data-content="Unauthorized disclosure of information may result in serious damage.">

    <label class="radio-inline form-control" style="background:   #ec971f; color:white; " >
  <input type="radio" name="classificationinformation"  value="<?php echo $allInformationClassification[3]['id'] ?>" onclick="policyClasification(<?php echo $allInformationClassification[3]['id'] ?>)" <?php if(isset($policyData)){
      if($policyData[0]["policyClassification"] == $allInformationClassification[3]['name']){
        echo "checked";
        $val = $allInformationClassification[3]['id'];
      }
    }?>><?php echo $allInformationClassification[3]['name'] ?></label></div> -->

  

  <!-- <div class="col-md-2" style="width:150px;margin-left:470px;margin-top:-35px"  title="Top secret" data-toggle="popover" data-trigger="hover" data-content="Highest degree of protection for information.">

    <label class="radio-inline form-control" style="background:    #f47673; color:white;" >
  <input type="radio" name="classificationinformation"  value="<?php echo $allInformationClassification[4]['id'] ?>" onclick="policyClasification(<?php echo $allInformationClassification[4]['id'] ?>)" <?php if(isset($policyData)){
      if($policyData[0]["policyClassification"] == $allInformationClassification[4]['name']){
        echo "checked";
        $val = $allInformationClassification[4]['id'];
      }
    }?>><?php echo $allInformationClassification[4]['name'] ?></label></div> -->

  <input type="hidden" id="policy_classification" <?php if(isset($policyData)){echo "value='" . $val . "'";}?>>

</div>

