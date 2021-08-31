<?php

function displayMembers(){
    $User = new UserModel();
    $membersList = $User->getAllUser();
    foreach($membersList as $member){
        if($member['STATUS_ID'] >= 3 ){
            $color = 'red'; 
        } else {
            $color = 'yellow';
        }    
?>
        <div class="col">
            <div class="myCard d-flex flex-column">
                <a href="member.php?nickname=<?= $member['USER_USERNAME'] ?>" class="profil text-center">
                    <img class="rounded-circle border_<?= $color ?? '' ?>" src="../assets/images/<?= $member['USER_LOGO'] ? 'user_logo/' . $member['USER_LOGO'] : 'default_user/' . $member['DEFAULTLOGO_NAME'] ?>" alt="Logo">
                    <div class="desc">
                        <h3 class="text-white fs-5 mt-2 mb-1"><?= $member['USER_USERNAME'] ?></h3>
                        <span><?= $member['STATUS_ROLE'] ?></span>
                    </div>
                </a> 
            </div>
        </div>
<?php
    }
}
?>
