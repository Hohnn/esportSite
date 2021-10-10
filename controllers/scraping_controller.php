<?php
require_once __DIR__.'/database.php';
require_once __DIR__.'/../models/user-model.php';
require __DIR__.'/../vendor/simple_html_dom.php';

if(!isset($_SESSION)) {
    session_start();
}

function statsWeapon($user) {
    if (!file_get_html("https://battlefieldtracker.com/bfv/profile/origin/$user/weapons")) {
        echo 'error';
        return false;
    }
    $html = file_get_html("https://battlefieldtracker.com/bfv/profile/origin/$user/weapons");
    
    $list = $html->find('div[data-v-526226f2].content', 0);
    $div = $list->find('div.weapon-preview', 0);
    $stats = $list->find('div[data-v-b632d9da].stats', 0);
    echo $div;
    echo $stats;
}

function displayStats($user){
    $html = @file_get_html("https://battlefieldtracker.com/bfv/profile/origin/$user/overview");
    if ($html === false) {
        return false;
    }
    
    $targetTime = $html->find('div[data-v-9d8d0016]', 0);
    $time = $targetTime->find('span[data-v-9d8d0016].playtime', 0)->plaintext;
    $time = strstr($time, 'h' , true) . ' ' . 'Heures';
    $targetStats = $html->find('div[data-v-b632d9da].main', 0);
    $stats = []; 
    foreach ($targetStats->find('.numbers') as $value) {
        array_push($stats, $value);
    }
    $array = [$time, $stats];
    return $array;
}


$User = new UserModel();
if (isset($_GET['action']) && $_GET['action'] == 'refreshAll') {
    $allUser = $User->getAllUser();
    foreach($allUser as $user){
        if ($user['USER_ORIGIN_ID'] != NULL) {
            $scrap = displayStats($user['USER_ORIGIN_ID']);
            $stats = [$scrap[0], implode('|', $scrap[1])];
            $statsString = implode('|', $stats);
            $User->setUserStats($user['USER_ID'], $statsString);
        }
        echo 'ok';
    }
}

if (isset($_POST['originId'])) {
    $originId = htmlspecialchars($_POST['originId']);
    $userId = $_SESSION['id'];
    if (!empty($originId)) {
        $scrap = displayStats($originId);
        if ($scrap) {
            $validInput = true;
            $stats = [$scrap[0], implode('|', $scrap[1])];
            $statsString = implode('|', $stats);
            $User->setUserStats($userId, $statsString);
        } else {
            $validInput = false;
        }
    } else {
        $validInput = false;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'refreshSingle') {
    $userId = $_SESSION['id'];
    $user = $User->getUserById($userId);
    $originId = $user['USER_ORIGIN_ID'];
    if (!empty($originId) && displayStats($originId)) {
        $validInput = true;
        $scrap = displayStats($originId);
        $stats = [$scrap[0], implode('|', $scrap[1])];
        $statsString = implode('|', $stats);
        $User->setUserStats($userId, $statsString);
    }
}



?>