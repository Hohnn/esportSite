<?php
include ('simple_html_dom.php');

function displayTable(){
    $html = file_get_html("https://battlefieldtracker.com/bfv/profile/origin/Hohnn/overview");
    $list = $html->find('table[data-v-3504b6eb]', 0);
    foreach($list->find('tr') as $key => $tr){
        if ($key <= 3 || $key == 9 || $key == 11 || $key >= 16) { ?>
            <tr> <?php
            foreach($tr->find('td') as $td){ ?>
            <td><?= $td->plaintext ?></td> <?php
        } ?>
        </tr> <?php
        }
    }
}

function statsWeapon() {
    $html = file_get_html("https://battlefieldtracker.com/bfv/profile/origin/Hohnn/weapons");
    $list = $html->find('div[data-v-526226f2].content', 0);
    $div = $list->find('div.weapon-preview', 0);
    $stats = $list->find('div[data-v-b632d9da].stats', 0);
    echo $div;
    echo $stats;
}

function displayLifetime(){
    $html = file_get_html("https://battlefieldtracker.com/bfv/profile/origin/Hohnn/overview");
    $list = $html->find('div[data-v-b632d9da]', 0);
    $span = $list->find('span[data-v-061dbdd2].playtime', 0)->plaintext;
    $s = $span;
    return strstr($s, 'H' , true) . ' ' . 'Heures';
}
function displayTopStats(){
    $html = file_get_html("https://battlefieldtracker.com/bfv/profile/origin/Hohnn/overview");
    $list = $html->find('div[data-v-b632d9da].main', 0);
    foreach ($list->find('.numbers') as $value) { ?>
        <?= $value ?>
    <?php
}
}
?>