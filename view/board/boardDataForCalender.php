<?php 
require_once __DIR__.'/../../php/common/dashboard.php';
$board_calender=new  dashboard();
$boardCal=$board_calender->boardDataForCalendar();
echo json_encode($boardCal);

?>