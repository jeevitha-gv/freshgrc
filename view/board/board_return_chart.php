<?php
    require_once __DIR__.'/../../php/common/dashboard.php';
   $meetingsreturnData = new dashboard();
   $meetingsreturncount = $meetingsreturnData->returnchart();
   echo json_encode($meetingsreturncount);
    
?>