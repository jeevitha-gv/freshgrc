<?php
require_once __DIR__.'/complianceManager.php';

switch ($_POST['action']) {
    
    case 'in_draft':
        $manager = new ComplianceManager();
            $complianceData = getDataFromRequest(); 
            $d=$manager->addstandard($complianceData);
      
}
   
function getDataFromRequest(){
    $complianceData = new stdClass();
    $complianceData->company_id =$_POST['company_id'];
    $complianceData->comp_id =$_POST['comp_id'];
    $complianceData->status ='in_draft';
    // $complianceData->action ='delete()';

    return $complianceData;
}
   

