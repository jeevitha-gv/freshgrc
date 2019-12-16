<?php 
require_once __DIR__.'/riskManager.php';
$riskManager=new RiskManager();
$riskCal=$riskManager->boardDataForCalendar();
echo json_encode($riskCal);

?>
