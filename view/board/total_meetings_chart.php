<?php
    require_once __DIR__.'/../../php/common/dashboard.php';
   $totalmeetingsData = new dashboard();
   $totalmeetingscount = $totalmeetingsData->totalmeetingschart();
   echo json_encode($totalmeetingscount);
    
?>