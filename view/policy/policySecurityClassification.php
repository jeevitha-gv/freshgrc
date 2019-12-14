
        
       <input id="securityClassification" type="checkbox" data-toggle="toggle" data-on="Internal" data-off="External" data-onstyle="success" data-offstyle="warning" onchange="securityClasification()" <?php if(isset($policyData)){if($policyData[0]["securityClassification"] == "Internal"){echo "checked";$val="1";}}?>>
<input type="hidden" id="security_classification" <?php if(isset($val)){echo "value='" . $val . "'";}?>>

 


 