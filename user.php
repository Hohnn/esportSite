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
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <aside class="col-3">
                    <div class="brand">DAW <span class="d-none d-lg-block">esport</span></div>
                    <nav>
                        <a href="#" class="d-flex"><i class="bi bi-newspaper"></i><div class="ms-3 d-none d-lg-block">ACTUALITÉ</div></a>
                        <a href="#" class="d-flex"><i class="bi bi-mouse2"></i><div class="ms-3 d-none d-lg-block">COMPÉTITION</div></a>
                        <a href="#" class="d-flex"><i class="bi bi-trophy"></i><div class="ms-3 d-none d-lg-block">LEAGUE</div></a>
                        <a href="#" class="d-flex"><i class="bi bi-people"></i><div class="ms-3 d-none d-lg-block">MEMBRES</div></a>
                    </nav>
            </aside>
            <main class="col">
                <header>
                    <input type="search" placeholder="Recherche" class="d-none d-md-block">
                    <i class="bi bi-bell mx-3"></i>
                    <i class="bi bi-chat-left-text"></i>
                    <div class="lightMode ms-auto"></div>
                    <button class="<?= isset($_SESSION['nickname']) ? 'd-none' : 'd-block' ?>" type="button" data-bs-toggle="modal" data-bs-target="#connectionModal">Se connecter</button>
                    <button class="userName <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>" id="userName"><?= $_SESSION['nickname'] ?? '' ?></button>
                    <img src="./assets/images/<?= $_SESSION['image'] ?? '' ?>" class="profilLogo <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>" id="profilLogo" alt="">
                    <div class="profilMenu">
                        <button type="button">Profil</button>
                        <form method="post">
                            <button name="logout" value="logout">Déconnexion</button>
                        </form>                        
                    </div>
                </header>
                <section class="actu">
                <div class="container-fluid topStats">
                    <div class="row ">  <?= displayLifetime() ?> </div>
                    <div class="row mygrid"><?= displayTopStats() ?> </div>
                </div>
                    <div class="title">Arme favorite</div>
                    <div class="mostUsed">
                        <div data-v-526226f2="" data-v-b632d9da="" class="weapon-preview"><img data-v-526226f2="" data-v-b632d9da="" src="https://eaassets-a.akamaihd.net/battlelog/battlebinary/gamedata/Casablanca/55/66/ZK383-374279ef.png">
                            <h3 data-v-526226f2="" data-v-b632d9da="">ZK-383</h3>
                        </div>
                        <div data-v-526226f2="" data-v-b632d9da="" class="stats">
                            <div data-v-74e21cc0="" data-v-526226f2="" class="stat" data-v-b632d9da="">

                                <div data-v-74e21cc0="" class="numbers"><span data-v-74e21cc0="" class="name">Kills</span> <span data-v-74e21cc0="" class="value">16,405</span>
                                    <div data-v-74e21cc0="" class="bottom">

                                    </div>
                                </div>
                            </div>
                            <div data-v-74e21cc0="" data-v-526226f2="" class="stat" data-v-b632d9da="">

                                <div data-v-74e21cc0="" class="numbers"><span data-v-74e21cc0="" class="name">Kills/min</span> <span data-v-74e21cc0="" class="value">3.11</span>
                                    <div data-v-74e21cc0="" class="bottom">
                                    </div>
                                </div>
                            </div>
                            <div data-v-74e21cc0="" data-v-526226f2="" class="stat collapse" data-v-b632d9da="">

                                <div data-v-74e21cc0="" class="numbers"><span data-v-74e21cc0="" class="name">Time Played</span> <span data-v-74e21cc0="" class="value">87h 57m</span>
                                    <div data-v-74e21cc0="" class="bottom">

                                    </div>
                                </div>
                            </div>
                            <div data-v-74e21cc0="" data-v-526226f2="" class="stat" data-v-b632d9da="">

                                <div data-v-74e21cc0="" class="numbers"><span data-v-74e21cc0="" class="name">Shots Fired</span> <span data-v-74e21cc0="" class="value">353,715</span>
                                    <div data-v-74e21cc0="" class="bottom">

                                    </div>
                                </div>
                            </div>
                            <div data-v-74e21cc0="" data-v-526226f2="" class="stat collapse" data-v-b632d9da="">
                                <div data-v-74e21cc0="" class="numbers"><span data-v-74e21cc0="" class="name">Shots Hit</span> <span data-v-74e21cc0="" class="value">88,701</span>
                                    <div data-v-74e21cc0="" class="bottom">
                                    </div>
                                </div>
                            </div>
                            <div data-v-74e21cc0="" data-v-526226f2="" class="stat" data-v-b632d9da="">
                                <div data-v-74e21cc0="" class="numbers"><span data-v-74e21cc0="" class="name">Shots Accuracy</span> <span data-v-74e21cc0="" class="value">25.08</span>
                                    <div data-v-74e21cc0="" class="bottom">
                                    </div>
                                </div>
                            </div>
                            <div data-v-74e21cc0="" data-v-526226f2="" class="stat" data-v-b632d9da="">
                                <div data-v-74e21cc0="" class="numbers"><span data-v-74e21cc0="" class="name">Headshots</span> <span data-v-74e21cc0="" class="value">2,917</span>
                                    <div data-v-74e21cc0="" class="bottom">
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