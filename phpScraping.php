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

?>