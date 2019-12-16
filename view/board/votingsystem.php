<?php
    require_once __DIR__.'/../../php/common/dashboard.php';
   $votingData = new dashboard();
   $votingcount = $votingData->votingsystem();
   echo json_encode($votingcount);
    
?>