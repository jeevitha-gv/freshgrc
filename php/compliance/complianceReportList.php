<?php

require_once __DIR__.'/complianceManager.php';

function fetchAll(){
    $manager = new ComplianceManager();
    session_start();
    $allData = $manager->getAllForReport($_SESSION['company']);
    echo json_encode($allData);
}

fetchAll();
