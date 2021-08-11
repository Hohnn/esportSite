<?php
    include 'phpScraping.php';

function displayProfil(){
    $members = file_get_contents('./assets/json/members.json');
    $membersList = json_decode($members)->members;
    foreach($membersList as $member){ 
        if (isset($_GET['nickname'])) {
            if ($_GET['nickname'] == $member->nickname) { ?>
            <div id="desc" class="infos">
                <ul>
                    <li><i class="bi bi-person me-3"></i><?= $member->nickname ?></li>
                    <li class="<?= isset($member->id_origin) ? '' : 'none' ?>"><img class="me-3" src="https://img.icons8.com/fluent/48/000000/origin.png"/><?= $member->id_origin ?? 'ID origin' ?></li>
                    <li><i class="bi bi-person-bounding-box me-3"></i><?= $member->role ?></li>
                    <li class="social">
                        <a class="<?= isset($member->twitter) ? 'd-block' : 'none' ?>" href="<?= $member->twitter ?? '' ?>"><i class="bi bi-twitter"></i></a>
                        <a class="<?= isset($member->youtube) ? 'd-block' : 'none' ?>" href="<?= $member->youtube ?? '' ?>"><i class="bi bi-youtube"></i></a>
                        <a class="<?= isset($member->twitch) ? 'd-block' : 'none' ?>" href="<?= $member->twitch ?? '' ?>"><i class="bi bi-twitch"></i></a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto logoContainer d-none d-sm-flex">
                <img src="./assets/images/<?= $member->image ?>" class="profilLogoDesc" id="profilLogoDesc" alt="profil logo">
            </div>
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
                                <div class="profilDesc myCard">
                                    <div class="title">Compte <i id="edit" class="bi bi-pencil-square"></i></div>
                                    <div class="wrap">
                                        <from id="descEdit" class="edit d-none">
                                            <div><i class="bi bi-person me-3"></i> <input type="text" value="<?= $member->nickname ?>"> </div>
                                            <div><img class="me-3" src="https://img.icons8.com/fluent/48/000000/origin.png"/> <input type="text" placeholder="ID origin" value="<?= $member->id_origin ?? '' ?>"> </div>
                                            <div><i class="bi bi-twitter me-3"></i> <input type="text" placeholder="lien twitter" value="<?= $member->twitter ?? '' ?>"> </div>
                                            <div><i class="bi bi-youtube me-3"></i> <input type="text" placeholder="lien youtube" value="<?= $member->youtube ?? '' ?>"> </div>
                                            <div><i class="bi bi-twitch me-3"></i> <input type="text" placeholder="lien twitch" value="<?= $member->twitch ?? '' ?>"> </div>
                                            <div>
                                                <i class="bi bi-person-circle me-3"></i>
                                                <label for="fileToUpload" class="upload">Parcourir...</label>
                                                <input class="form-control d-none" id="fileToUpload" type="file">
                                            </div>
                                            <div class="d-flex align-items-start mt-4">
                                                <button class="bgYellow" type="submit">Confirmer</button>
                                                <button class="btn ms-auto cancel" id="cancel">Annuler</button>
                                            </div>
                                        </from>
                                        <?= displayProfil() ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="topStats myCard">
                                    <div class="heures ps-2 text-white">
                                        Enter votre origin ID
                                        <!-- Temps de jeu : <?= $displayLifetime ?>  -->
                                    </div>
                                    <div class="noOrigin">
                                        <input type="text" placeholder="Origin ID">
                                    </div>
                                    <div class="row mygrid">
                                        <?php foreach ($displayTopStats as $key => $value) { ?>
                                                <?= $value ?>
                                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="topWeapon myCard">
                                    <div class="title">Arme favorite</div>
                                    <div class="mostUsed">
                                        <?php /* statsWeapon($user) */ ?>
                                    </div>
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
    <script src="./assets/js/user.js"></script>
</body>
</html>