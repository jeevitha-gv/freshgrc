<?php
require_once __DIR__.'/assetManager.php';

function fetchAll(){
    $manager = new AssetManager();
    $userId = $_POST['userId'];
    $userRole = $_POST['userRole'];
    $allAssets = $manager->getAllreport($userId);
    echo json_encode($allAssets);
}

fetchAll();
