<?php
require_once __DIR__.'/complianceManager.php';

switch ($_POST['action']) {
    
    case 'in_draft':
        $manager = new ComplianceManager();
            $complianceData = getDataFromRequest(); 
            $d=$manager->addstandard($complianceData);
            break;
            default;
            break;
      
}
   
function getDataFromRequest(){
    $complianceData = new stdClass();
    $complianceData->company_id =$_POST['company_id'];
    $complianceData->name =$_POST['name'];
    $complianceData->description =htmlspecialchars($_POST['description']);
    $complianceData->status ='in_draft';
    // $complianceData->action ='delete()';

    return $complianceData;
}
   

