<?php
    require_once __DIR__.'/../../php/common/dashboard.php';
   $meetingapproveData = new dashboard();
   $meetingapprovecount= $meetingapproveData->approvechart();
   echo json_encode($meetingapprovecount);
    
?>