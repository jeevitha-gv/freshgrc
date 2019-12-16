
<style>
button#restricted:focus
{
    background:olive;
}
button#confidential:focus
{
    background:olive;
}
button#public:focus
{
    background:olive;
}
.color-1{
background-color: #2ecc71;
}
</style>
    <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>


<div class="row">

<label class="col-md-12" style="margin-left:-20px;margin-top:5px">Policy Classification</label><br>
</div>




  <div class="col-md-12">


<div class="col-md-2" style="width:150px;margin-left:-50px;" data-toggle="popover" data-trigger="hover" data-content="Policies are formal statements produced and supported by senior management.">
    <label class="radio-inline form-control" style="background: #75b1e5;color:white;" >
  <input type="radio"  
          
  name="classification"  value="<?php echo $allPolicyProcedure[0]['id'] ?>" onclick="policyprocedure(<?php echo $allPolicyProcedure[0]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["policy_procedure"] == $allPolicyProcedure[0]['id']){
        echo "checked";
      }
    }?>><?php echo $allPolicyProcedure[0]['name'] ?> 
</label>
</div>


<div class="col-md-2" style="width:150px;margin-left:-20px;"
data-toggle="popover" data-trigger="hover" data-content="Procedures are detailed step by step instructions to achieve a given goal or mandate.">
    <label class="radio-inline form-control" style="background:  #85e185;color:white;" >
  <input type="radio" name="classification"  value="<?php echo $allPolicyProcedure[1]['id'] ?>" onclick="policyprocedure(<?php echo $allPolicyProcedure[1]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["policy_procedure"] == $allPolicyProcedure[1]['id']){
        echo "checked";
      }
    }?>><?php echo $allPolicyProcedure[1]['name'] ?></label>
</div>


<div class="col-md-2" style="width:150px;margin-left:-5px;margin-top:-1px;"
data-toggle="popover" data-trigger="hover" data-content="Standards are mandatory actions or rules that give formal policies support and direction">
    <label class="radio-inline form-control" style="background:   #5bc0de;color:white;" >
  <input type="radio" name="classification"  value="<?php echo $allPolicyProcedure[2]['id'] ?>" onclick="policyprocedure(<?php echo $allPolicyProcedure[2]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["policy_procedure"] == $allPolicyProcedure[2]['id']){
        echo "checked";
      }
    }?>><?php echo $allPolicyProcedure[2]['name'] ?></label>
</div>

<div class="col-md-2" style="width:150px;margin-left:-15px;margin-top:-1px"
data-toggle="popover" data-trigger="hover" data-content="A point in time that is used as a comparison for future changes

">
    <label class="radio-inline form-control" style="background:   #ec971f; color:white; " >
  <input type="radio" name="classification"  value="<?php echo $allPolicyProcedure[2]['id'] ?>" onclick="policyprocedure(<?php echo $allPolicyProcedure[3]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["policy_procedure"] == $allPolicyProcedure[3]['id']){
        echo "checked";
      }
    }?>><?php echo $allPolicyProcedure[3]['name'] ?></label>
</div>

<div class="col-md-2" style="width:150px;margin-left:-5px;margin-top:-1px"
data-toggle="popover" data-trigger="hover" data-content="Guidelines are designed to streamline certain processes according to what the best practices are.">
    <label class="radio-inline form-control" style="background:    #f47673; color:white;" >
  <input type="radio" name="classification"  value="<?php echo $allPolicyProcedure[2]['id'] ?>" onclick="policyprocedure(<?php echo $allPolicyProcedure[4]['id'] ?>)"<?php if(isset($policyData)){
      if($policyData[0]["policy_procedure"] == $allPolicyProcedure[4]['id']){
        echo "checked";
      }
    }?>><?php echo $allPolicyProcedure[4]['name'] ?></label>
</div>

  <input type="hidden" id="policy_procedure" <?php if(isset($policyData)){echo "value='" . $policyData[0]["policy_procedure"] . "'";}?>>
</div>
</div>


