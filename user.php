<?php
    require './controllers/controller.php';
    include 'phpScraping.php';
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
                        <div class="row g-3">
                            <div class="col-12 col-xl-6">
                                <div class="profilDesc myCard">
                                    <div class="title">Compte 
<?php if(isset($_SESSION['user']) == $_GET['nickname']){ ?>
                                        <i id="edit" class="bi bi-pencil-square"></i>
<?php }?>
                                    </div>
                                    <div class="wrap">
                                        <form id="descEdit" class="edit <?= isset($goodUpload) && $goodUpload == false ? '' : 'd-none' ?>" action="" method="POST" enctype="multipart/form-data" >
                                            <div>
                                                <i class="bi bi-person me-3"></i>
                                                <input type="text" name="username" value="<?= $user['USER_USERNAME'] ?>">
                                                <div class="logInvalid"><?= $errorUsername ?? '' ?></div>
                                            </div>
                                            <div>
                                                <img class="me-3" src="https://img.icons8.com/fluent/48/000000/origin.png"/> 
                                                <input type="text" name="originId" placeholder="ID origin" value="<?= $user['USER_ORIGIN_ID'] ?? '' ?>"> 
                                                <div class="logInvalid"><?= $errorOriginId ?? '' ?></div>
                                            </div>
                                            <div>
                                                <i class="bi bi-twitter me-3"></i> 
                                                <input type="text" placeholder="lien twitter" name="twitter" value="<?= $user['USER_TWITTER'] ?? '' ?>"> 
                                                <div class="logInvalid"><?= $errorTwitter ?? '' ?></div>
                                            </div>
                                            <div>
                                                <i class="bi bi-youtube me-3"></i> 
                                                <input type="text" placeholder="lien youtube" name="youtube" value="<?= $user['USER_YOUTUBE'] ?? '' ?>"> 
                                                <div class="logInvalid"><?= $errorYoutube ?? '' ?></div>
                                            </div>
                                            <div>
                                                <i class="bi bi-twitch me-3"></i> 
                                                <input type="text" placeholder="lien twitch" name="twitch" value="<?= $user['USER_TWITCH'] ?? '' ?>"> 
                                                <div class="logInvalid"><?= $errorTwitch ?? '' ?></div>
                                            </div>
                                            <div>
                                                <i class="bi bi-person-circle me-3"></i>
                                                <label for="fileToUpload" class="upload">Parcourir...</label>
                                                <input class="form-control d-none" id="fileToUpload" type="file" name="logo" accept="image/png, image/jpg, image/jpeg">
                                                <div class="logInvalid"><?= $uploaded[0] ?? '' ?></div>
                                            </div>
                                            <div class="d-flex align-items-start mt-4">
                                                <button class="bgYellow" type="submit" name="submitEdit">Confirmer</button>
                                                <button class="btn ms-auto cancel" id="cancel">Annuler</button>
                                            </div>
                                        </form>
<?php if (isset($_GET['nickname'])) {
        if ($User->getUserByUsername($_GET['nickname'])) { 
            $user = $User->getUserByUsername($_GET['nickname']);
?>
                                        <div id="desc" class="infos <?= isset($goodUpload) && $goodUpload == false ? 'd-none' : '' ?>">
                                            <ul>
                                                <li><i class="bi bi-person me-3"></i><?= $user['USER_USERNAME'] ?></li>
                                                <li><img class="me-3" src="https://img.icons8.com/fluent/48/000000/origin.png"/><?= $user['USER_ORIGIN_ID'] ?? 'Inconnu' ?></li>
                                                <li><i class="bi bi-person-bounding-box me-3"></i><?= $user['STATUS_ROLE'] ?></li>
                                                <li class="social">
                                                    <a class="<?= $user['USER_TWITTER'] ? '' : 'none' ?>" href="<?= $user['USER_TWITTER'] ?? '' ?>"><i class="bi bi-twitter"></i></a>
                                                    <a class="<?= $user['USER_YOUTUBE'] ? '' : 'none' ?>" href="<?= $user['USER_YOUTUBE'] ?? '' ?>"><i class="bi bi-youtube"></i></a>
                                                    <a class="<?= $user['USER_TWITCH'] ? '' : 'none' ?>" href="<?= $user['USER_TWITCH'] ?? '' ?>"><i class="bi bi-twitch"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mx-auto logoContainer d-none d-sm-flex">
                                            <img src="./assets/images/<?= $user['USER_LOGO'] ? 'user_logo/' . $user['USER_LOGO'] : 'default_user/' . $user['DEFAULTLOGO_NAME'] ?>" class="profilLogoDesc" id="profilLogoDesc" alt="profil logo">
                                        </div>
<?php   }
    }  
?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="topStats myCard">
<?php if(isset($_SESSION['user']) == $_GET['nickname']){ ?>
                                    <form class="noOrigin <?= $showInput ?? 'd-none' ?>" action="" method="POST">
                                        <p class="desc">Enter votre Origin ID pour compléter votre profil</p>
                                        <input type="text" name="originId" placeholder="Origin ID">
                                    </form>
<?php } elseif (!$user['USER_ORIGIN_ID']) { ?>
                                    <div class="noOrigin">L'utilisateur n'a pas renseigné sont origin id</div>
<?php } ?>
                                    <div class="<?= $showStats ?? 'd-none' ?>">
                                        <div class="heures ps-2 text-white">
                                            Temps de jeu : <?= $displayLifetime ?> 
                                        </div>
                                        <div class="row mygrid">
<?php foreach ($displayTopStats as $key => $value) { ?>
                                                    <?= $value ?>
<?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="topWeapon myCard d-none">
                                    <div class="title">Arme favorite</div>
                                    <div class="mostUsed">
                                        <?php statsWeapon($user) ?>
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

