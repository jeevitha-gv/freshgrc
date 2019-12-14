<?php
    require_once __DIR__.'/../../php/common/dashboard.php';
   $actionmeetingsData = new dashboard();
   $actionmeetingscount = $actionmeetingsData->actionitems();
   echo json_encode($actionmeetingscount);
    
?>