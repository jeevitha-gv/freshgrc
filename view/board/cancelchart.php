<?php
    require_once __DIR__.'/../../php/common/dashboard.php';
   $totalmeetingscancelData = new dashboard();
   $totalmeetingscancelcount = $totalmeetingscancelData->cancelchart();
   echo json_encode($totalmeetingscancelcount);
    
?>