<?php
    require_once __DIR__.'/../../php/common/appConfig.php';
    $allAuditFreqs = AppConfig::getAllConfigValues('audit_freq');
?>


<style>
button#Monthly:focus
{
    background:olive;
}
button#Quarterly:focus
{
    background:olive;
}
button#yearly:focus
{
    background:olive;
}
button#weekly:focus
{
    background:olive;
}
</style>
<div class="kt-radio-list">
 <fieldset id="frequency">
 <div class="row">

  <div class="col-md-2">
  <label class="kt-radio kt-radio--solid kt-radio--primary">
<input type="radio" id="high1"  name="Impact" onclick="diagonsisImpact('high')" value="high" class="deselectRadioButton">High  
      <span></span>
    </label>
  </div>
  <div class="col-md-2">
      <label class="kt-radio kt-radio--solid kt-radio--danger">
      <input type="radio" id="medium1" name="Impact" value="medium" class="deselectRadioButton" onclick="diagonsisImpact('medium')">Medium
      <span></span>
    </label>
  </div>
  <div class="col-md-2">
     <label class="kt-radio kt-radio--solid kt-radio--warning">
      <input type="radio" id="low1" name="Impact" value="low" class="deselectRadioButton" onclick="diagonsisImpact('low')">Low
      <span></span>
    </label>
  </div>
<input type="hidden" id="diagonsisimpact">

</div>
</fieldset>
</div>