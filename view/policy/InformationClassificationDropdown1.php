<!DOCTYPE html>
<html>
<head>
  <title></title>
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
</head>
<body>

<div class="row">
<label class="col-md-12" style="margin-left:-20px;margin-top:5px"> Classification</label><br>
</div>



  <div class="col-md-12">


<div class="col-md-2" style="width:150px;margin-left:-50px;"title="Public" data-toggle="popover" data-trigger="hover" data-content="Materials exposed to general view.">

    <label class="radio-inline form-control" style="background: #75b1e5;color:white;" >
  <input type="radio"  name="classificationinformation"  value="<?php echo $allInformationClassification[0]['id'] ?>" onclick="policyClasification(<?php echo $allInformationClassification[0]['id'] ?>)" <?php if(isset($policyData)){
      if($policyData[0]["policyClassification"] == $allInformationClassification[0]['name']){
        echo "checked";
        $val = $allInformationClassification[0]['id'];
      }
    }?>><?php echo $allInformationClassification[0]['name'] ?>
</label>
</div>

<div class="col-md-2" style="width:150px;margin-left:-20px;" title="Confidential" data-toggle="popover" data-trigger="hover" data-content="Priveliged information accessible by authorized personnels. ">

    <label class="radio-inline form-control" style="background:  #85e185;color:white;" >
  <input type="radio" name="classificationinformation"  value="<?php echo $allInformationClassification[1]['id'] ?>" onclick="policyClasification(<?php echo $allInformationClassification[1]['id'] ?>)" <?php if(isset($policyData)){
      if($policyData[0]["policyClassification"] == $allInformationClassification[1]['name']){
        echo "checked";
        $val = $allInformationClassification[1]['id'];
      }
    }?>><?php echo $allInformationClassification[1]['name'] ?></label></div>



  <div class="col-md-2" style="width:150px;margin-left:210px;margin-top:-35px;"title="Restricted" data-toggle="popover" data-trigger="hover" data-content="Also know as private information shared with limited audience.">

    <label class="radio-inline form-control" style="background:   #5bc0de;color:white;" >
  <input type="radio" name="classificationinformation"  value="<?php echo $allInformationClassification[2]['id'] ?>" onclick="policyClasification(<?php echo $allInformationClassification[2]['id'] ?>)" <?php if(isset($policyData)){
      if($policyData[0]["policyClassification"] == $allInformationClassification[2]['name']){
        echo "checked";
        $val = $allInformationClassification[2]['id'];
        
      }
    }?>><?php echo $allInformationClassification[2]['name'] ?></label></div>


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
</div>

</body>
</html>



