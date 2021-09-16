<?php
    require_once __DIR__.'/../controllers/controller.php';
    require __DIR__.'/../controllers/scraping_controller.php';
    require __DIR__.'/../controllers/user_controller.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/sass/style.css">
    <link rel="stylesheet" href="../assets/sass/user.css">
    <link rel="stylesheet" href="../assets/sass/scraping.css">
    <title>DAW esport</title>
</head>
<?php require __DIR__.'/../components/header.php' ?>
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
                                            <img src="../assets/images/<?= $user['USER_LOGO'] ? 'user_logo/' . $user['USER_LOGO'] : 'default_user/' . $user['DEFAULTLOGO_NAME'] ?>" class="profilLogoDesc" id="profilLogoDesc" alt="profil logo">
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
<?php if (isset($showModif) && $showModif == true) { ?>
                                
                            <div class="col-12">
                                <p>
                                    <a class="btn btn-primary btn-sm btn-dark" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Modifier l'adresse mail</a>
                                    <button class="btn btn-primary btn-sm btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Modifier le mot de passe</button>
                                </p>
                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <div class="card myCard p-3 profilDesc">
                                                <div class="title">Modification de l'adresse mail</div>
                                                <form action="" method="POST" class="row fw-normal g-3">
                                                    <div class="mailInput col-12">
                                                        <label for="mail">Nouvelle adresse mail</label>
                                                        <input type="text" class="form-control" name="newMail" id="mail" value="<?= $user['USER_MAIL'] ?? '' ?>" placeholder="Macron@gmail.com" required>
                                                        <div class="invalid-feedback ">non valide</div>
                                                    </div>
                                                    <div class="mailInput col-12">
                                                        <label for="password">Mot de passe</label>
                                                        <input type="password" class="form-control <?= $error ?? '' ?>" name="password" id="password" placeholder="" required>
                                                        <div class="invalid-feedback ">non valide</div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" name="submitNewMail" class="btn btn-sm btn-primary bgYellow px-3 text-dark">Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                                            <div class="card myCard p-3 profilDesc">
                                                    <div class="title">Modification du mot de passe</div>
                                                    <form action="" method="POST" class="row fw-normal g-3">
                                                        <div class="mailInput col-12">
                                                            <label for="oldPassword">Ancien mot de passe</label>
                                                            <input type="password" class="form-control <?= $errorOld ?? '' ?>" name="oldPassword" id="oldPassword"  placeholder="" required>
                                                            <div class="invalid-feedback ">non valide</div>
                                                        </div>
                                                        <div class="mailInput col-12">
                                                            <label for="password">Nouveau mot de passe</label>
                                                            <input type="password" class="form-control <?= $errorPass ?? '' ?>" name="password" id="password" placeholder="" required>
                                                            <div class="invalid-feedback ">non valide</div>
                                                        </div>
                                                        <div class="mailInput col-12">
                                                            <label for="confirmPassword">Confirmer le nouveau mot de passe</label>
                                                            <input type="password" class="form-control <?= $errorConf ?? '' ?>" name="confirmPassword" id="confirmPassword" placeholder="" required>
                                                            <div class="invalid-feedback ">non valide</div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit" name="submitNewPassword" class="btn btn-sm btn-primary bgYellow px-3 text-dark">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php } ?>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Toast -->
<div class="position-fixed bottom-0 end-0 p-3 myToast" style="z-index: 110">
    <div id="liveToast" class="toast align-items-center text-white <?= $toastColor ?? '' ?> border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            <?= $succes ?? '' ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

    <!-- Script -->
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="../assets/js/user.js"></script>
    <?php if(isset($succes)){ ?>
        <script>
        let myToast =  new bootstrap.Toast(document.getElementById('liveToast'))
        myToast.show()
        </script>
    <?php } ?>
    
</body>
</html>

