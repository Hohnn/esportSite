<?php
    include 'phpScraping.php';
    include 'phpLogin.php';

    $members = file_get_contents('./assets/json/members.json');
    $membersList = json_decode($members)->members;
    foreach($membersList as $member){
        if($member->nickname== $_GET['nickname']) {
            $user = $member->id_origin;
        }
    }
function displayProfil(){
    $members = file_get_contents('./assets/json/members.json');
    $membersList = json_decode($members)->members;
    foreach($membersList as $member){ 
        if (isset($_GET['nickname'])) {
            if ($_GET['nickname'] == $member->nickname) { ?>
            <div class="infos">
                <ul>
                    <li><?= $member->nom ?></li>
                    <li><?= $member->prenom ?></li>
                    <li><?= $member->nickname ?></li>
                    <li><?= $member->mail ?></li>
                    <li><?= $member->age ?> ans</li>
                    <li><?= $member->role ?></li>
                </ul>
            </div>
            <img src="./assets/images/<?= $member->image ?>" class="profilLogo" id="profilLogo" alt="profil logo">
            <?php

            }
        }
     }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/sass/style.css">
    <link rel="stylesheet" href="./assets/sass/user.css">
    <link rel="stylesheet" href="./assets/sass/scraping.css">
    <title>DAW esport</title>
</head>
<?php include './components/header.php' ?>
                <section class="actu">
                    <h1>PROFIL <span><span class="text-uppercase"><?= $_GET['nickname'] ?? '' ?></span></span></h1>
                    <div class="container-fluid  mt-5">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <div class="profilDesc">
                                    <div class="title">Compte</div>
                                    <div class="wrap">
                                        <?= displayProfil() ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 topStats">
                                <div class="heures ps-2 text-white">Temps de jeu : <?= displayLifetime($user) ?> </div>
                                <div class="row mygrid c"><?= displayTopStats($user) ?> </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="topWeapon">
                                    <div class="title">Arme favorite</div>
                                    <div class="mostUsed">
                                        <?php statsWeapon($user) ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>


    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>
</body>
</html>