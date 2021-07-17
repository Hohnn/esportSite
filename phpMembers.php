<?php

function displayMembers(){
    $members = file_get_contents('./assets/json/members.json');
    $membersList = json_decode($members)->members;
    foreach($membersList as $member){
        if($member->role == 'admin' || $member->role == 'member'){
            $color = 'red'; 
        } else {
            $color = 'yellow';
        }    
?>
        <div class="col">
            <a href="user.php?nickname=<?= $member->nickname?>" class="profil text-center">
                <img class="rounded-circle border_<?= $color ?? '' ?>" src="./assets/images/<?= $member->image?>" alt="Logo">
                <div class="desc">
                    <h3 class="text-white fs-5 mt-2 mb-1"><?= $member->nickname?></h3>
                    <p><?= $member->role?></p>
                </div>
            </a> 
        </div>
<?php
    }
}
?>
                  