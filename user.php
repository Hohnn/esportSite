<?php
include 'phpScraping.php';

    include 'phpLogin.php';
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
                    <h1>PROFIL <span><span class="text-uppercase"><?= $_SESSION['nickname'] ?? '' ?></span></span></h1>
                    <div class="container-fluid  mt-5">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <div class="profilDesc">
                                    <div class="title">Compte</div>
                                    <div class="wrap">
                                        <div class="infos">
                                            <ul>
                                                <li><?= $_SESSION['lastname'] ?? '' ?></li>
                                            </ul>
                                            <ul>
                                                <li><?= $_SESSION['firstname'] ?? '' ?></li>
                                            </ul>
                                            <ul>
                                                <li><?= $_SESSION['nickname'] ?? '' ?></li>
                                            </ul>
                                            <ul>
                                                <li><?= $_SESSION['mail'] ?? '' ?></li>
                                            </ul>
                                            <ul>
                                                <li><?= $_SESSION['age'] ?? '' ?> ans</li>
                                            </ul>
                                            <ul>
                                                <li><?= $_SESSION['role'] ?? '' ?></li>
                                            </ul>
                                        </div>
                                        <img src="./assets/images/<?= $_SESSION['image'] ?? '' ?>" class="profilLogo <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>" id="profilLogo" alt="profil logo">
                                    </div>
                                    

                                </div>
                            </div>
                            <div class="col-12 col-xl-6 topStats">
                                <div class="heures ps-2 text-white">Temps de jeu : <?= displayLifetime() ?> </div>
                                <div class="row mygrid c"><?= displayTopStats() ?> </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="topWeapon">
                                    <div class="title">Arme favorite</div>

                                    <div class="mostUsed">
                                        <?= statsWeapon() ?>
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
    <script src="./assets/js/script.js"></script>
</body>
</html>