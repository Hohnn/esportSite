<?php
require_once __DIR__.'/../controllers/controller.php';

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
    <link rel="stylesheet" href="../assets/sass/about.css">
    <title>DAW esport</title>
</head>
<?php require  __DIR__.'/../components/header.php' ?>
                <section class="about" id="about">
                    
                    <div class="container  mt-5">
                        <div class="row g-3">
                            <div class="col " >
                                <div class="header">
                                    <h1><span>DAW</span> eSport</h1>
                                    <div class="subtitle">Une équipe compétitive mais pas que ...</div>
                                    <p class="tag">Rester informé sur l'actualité et la compétition sur Battlefield. <br> Faite vous connaitre grâce à votre profil.</p>
                                    <a href="login.php" class="btn bgYellow text-white">Créer un compte</a>
                                <img class="floatImg d-none d-xl-block" src="../assets/images/head.png" alt="twisted">
                                    
                            </div>
                        </div>
                    </div>
                    <div class="fullImg">
                        <h2>L'essentiel regroupé pour un meilleur suivi !</h2>
                        <p>les compétions eSport sont souvent difficile à suivre, 
                        les matchs et événements sont la plupart du temps organisé 
                        sur différente plate-forme</p>
                    </div>
                        <div class="row g-5">
                            <div class="col " >
                                <div class="descCard myCard mx-auto">
                                    <div class="icon">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                    <h4 class="">Actualités</h4>
                                    <p>Nous sélectionnons 3 articles qui nous semble pertinent pour les fans de la franchise.</p>
                                </div>
                            </div>
                            <div class="col " >
                                <div class="descCard myCard mx-auto">
                                    <div class="icon">
                                        <i class="bi bi-twitch"></i>
                                    </div>
                                    <h4>Twitch</h4>
                                    <p>Découvrez ou redécouvrez les streamers en live actuellement sur le jeu.</p>
                                </div>
                            </div>
                            <div class="col " >
                                <div class="descCard myCard mx-auto">
                                    <div class="icon">
                                        <i class="bi bi-youtube"></i>
                                    </div>
                                    <h4>Youtube</h4>
                                    <p>Une sélection du meilleur contenu créer par la communauté pour les joueurs.</p>
                                </div>
                            </div>
                            <div class="col " >
                                <div class="descCard myCard mx-auto">
                                    <div class="icon">
                                        <i class="bi bi-shield-shaded"></i>
                                    </div>
                                    <h4>équipes</h4>
                                    <p>Les équipes les plus active seront répertorié avec leur joueurs les plus actifs.</p>
                                </div>
                            </div>
                            <div class="col" >
                                <div class="descCard myCard mx-auto">
                                    <div class="icon">
                                        <i class="bi bi-window-sidebar"></i>
                                    </div>
                                    <h4>Tournois</h4>
                                    <p>Un aperçu des derniers tournois répertorié avec les équipes qui y participe.</p>
                                </div>
                            </div>
                            <div class="col " >
                                <div class="descCard myCard mx-auto">
                                    <div class="icon">
                                        <i class="bi bi-window-sidebar"></i>
                                    </div>
                                    <h4>Matchs</h4>
                                    <p>Les derniers matchs avec toutes les informations et la possibilité de revoir le match.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row knows mt-5">
                            <div class="d-none d-sm-block col-sm-2  col-md-4 col-xl-5 position-relative">
                                <img src="../assets/images/dev.jpg" alt="twisted">
                            </div>
                            <div class="col" >
                                <div class="step">
                                    <h3>Faite vous connaitre !</h3>
                                    <div class="wrap">
                                        <span>01</span>
                                        <div>
                                            <div class="title">Créer votre compte</div>
                                            <div class="desc">Indispensable pour profiter des déférentes fonctionnalités.</div>
                                        </div>

                                    </div>
                                    <div class="wrap">
                                        <span>02</span>
                                        <div>
                                            <div class="title">Personnalisé votre profil</div>
                                            <div class="desc">Ajouter  votre compte de jeu et vos réseaux sociaux pour une expérience optimale.</div>
                                        </div>
                                    </div>
                                    <div class="wrap">
                                        <span>03</span>
                                        <div>
                                            <div class="title">Profiter d'une visibilité accru</div>
                                            <div class="desc">Votre équipe, vos matchs, vos states et vos réseaux sont maintenant regroupé et visible de tous.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <footer>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore consectetur quidem asperiores nulla nostrum distinctio dicta amet necessitatibus quis minima debitis eum aspernatur enim ad laboriosam, sint fugiat nisi molestias libero optio sed esse inventore! Inventore, minima. Praesentium voluptatibus nam vel sequi adipisci non mollitia dignissimos culpa, consequuntur veniam sed iure quos quidem fugit facere atque repellendus illo iusto voluptas hic. Illo, placeat, itaque iure quae sapiente dignissimos, cum officiis labore eum omnis optio minima dolore praesentium quidem. Dolores velit eius, nam, enim quam quos dolorem culpa possimus mollitia quo omnis harum totam atque nemo officiis! Illo quasi laudantium doloribus?</p>
                        </footer>
                </section>

            </main>
        </div>
    </div>

    


    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- page -->


</body>
</html>