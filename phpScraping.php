<?php
require ('simple_html_dom.php');
require './controllers/controller.php';


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

/* function displayLifetime($user){
    $html = file_get_html("https://battlefieldtracker.com/bfv/profile/origin/$user/overview");
    $list = $html->find('div[data-v-b632d9da]', 0);
    $span = $list->find('span[data-v-061dbdd2].playtime', 0)->plaintext;
    $s = $span;
    return strstr($s, 'H' , true) . ' ' . 'Heures';
}
function displayTopStats($user){
    $html = file_get_html("https://battlefieldtracker.com/bfv/profile/origin/$user/overview");
    $list = $html->find('div[data-v-b632d9da].main', 0);
    foreach ($list->find('.numbers') as $value) { ?>
        <?= $value ?>
    <?php
    }
} */

function displayStats($user){
    if (!file_get_html("https://battlefieldtracker.com/bfv/profile/origin/$user/overview")) {
        return false;
    }
    $html = file_get_html("https://battlefieldtracker.com/bfv/profile/origin/$user/overview");
    
    $targetTime = $html->find('div[data-v-9d8d0016]', 0);
    $time = $targetTime->find('span[data-v-9d8d0016].playtime', 0)->plaintext;
    $time = strstr($time, 'H' , true) . ' ' . 'Heures';
    $targetStats = $html->find('div[data-v-b632d9da].main', 0);
    $stats = []; 
    foreach ($targetStats->find('.numbers') as $value) {
        array_push($stats, $value);
    }
    $array = [$time, $stats];
    return $array;
}


$members = file_get_contents('./assets/json/members.json');
$membersList = json_decode($members)->members;
foreach($membersList as $member){
    if($member->nickname == $_GET['nickname']) {
        $user = $member->id_origin;
    }
}


if ($User->getUserByUsername($_GET['nickname'])['PROFIL_ORIGIN_ID']) {
    $user = '';
    $scrap = displayStats($user);
    $showStats = '';
} else {
    $showInput = '';
}



$displayLifetime = $scrap[0] ?? '';
$displayTopStats = $scrap[1] ?? '';
?>