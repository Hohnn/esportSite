<?php
require __DIR__.'/../vendor/simple_html_dom.php';

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
    if (!file_get_contents("https://battlefieldtracker.com/bfv/profile/origin/$user/overview")) {
        return false;
    }
    $html = file_get_html("https://battlefieldtracker.com/bfv/profile/origin/$user/overview");
    
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

if ($User->getUserByUsername($_GET['nickname'])['USER_ORIGIN_ID']) {
    $user = $User->getUserByUsername($_GET['nickname'])['USER_ORIGIN_ID'];
    $scrap = displayStats($user);
    $showStats = '';
} else {
    $showInput = '';
}

$displayLifetime = $scrap[0] ?? '';
$displayTopStats = $scrap[1] ?? '';
?>