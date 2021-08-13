<?php


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
    <link rel="stylesheet" href="./assets/sass/comp.css">
    <title>DAW esport</title>
</head>
<?php include './components/header.php' ?>
                <section class="team">
                    <h1 class="text-uppercase">équipes</h1>
                    <div class="container-fluid  mt-5">
                        <div class="row g-3" data-masonry='{"percentPosition": true }'>
                            <div class="col teamCol" >
                                <div class="teamCard myCard">
                                    <div id="toggle" class="toggle"><i class="bi bi-plus-circle"></i></div>
                                    <header>
                                        <img src="./assets/images/teamLogo/daw.png" alt="" class="teamLogo">
                                        <div class="wrap">
                                            <h3 class="teamName">Daw </h3>
                                            <img src="" alt="" class="flag">
                                        </div>
                                    </header>
                                    <div class="teamMembers small">
                                        <a href="#">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="memberLogo">
                                            <h5 class="memberName">Hohnn</h5>
                                        </a>                                        
                                        <a href="#">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="memberLogo">
                                            <h5 class="memberName">Hohnn</h5>
                                        </a>                                        
                                        <a href="#">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="memberLogo">
                                            <h5 class="memberName">Hohnn</h5>
                                        </a>                                        
                                        <a href="#">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="memberLogo">
                                            <h5 class="memberName">Hohnn</h5>
                                        </a>                                        
                                        <a href="#">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="memberLogo">
                                            <h5 class="memberName">Hohnn</h5>
                                        </a>                                        
                                        <a href="#">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="memberLogo">
                                            <h5 class="memberName">Hohnn</h5>
                                        </a>                                      
                                        
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>    
                </section>
                <section class="tournament mt-5">
                    <h1 class="text-uppercase">tournois</h1>
                    <div class="container-fluid  mt-5">
                        <div class="row g-3">
                            <div class="col-12" >
                                <div class="tournamentCard myCard">
                                    <div class="brand">
                                        <img src="./assets/images/teamLogo/daw.png" alt="" class="orgLogo">
                                        <h4 class="orgName">Tournoi BSP</h4>
                                    </div>
                                    <div class="type">
                                        <span>Format</span> 
                                        6 vs 6 Conquète escoude
                                    </div>
                                    <div class="date"> 
                                        <span>Début</span> 
                                        13/10/2016
                                    </div>
                                    <div class="status">
                                        <span>Status</span> 
                                        En cours
                                    </div>
                                    <div class="teams">
                                        <span>équipes</span> 
                                        <div class="teamsWrap">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="teamLogo">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="teamLogo">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="teamLogo">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="teamLogo">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="teamLogo">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="teamLogo">
                                            <img src="./assets/images/hohnn_logo.jpg" alt="" class="teamLogo">
                                        </div>
                                    </div>
                                    <a href="#" class="link"></a>
                                </div>
                            </div>
                        
                        </div>
                    </div>    
                </section>
                <section class="tournament mt-5">
                    <h1 class="text-uppercase">Matchs <span>récent<span></span></span></h1>
                    <div class="container-fluid  mt-5">
                        <div class="row g-3">
                            <div class="col matchCol" >
                                <div class="matchCard myCard">
                                    <div class="imgBack">
                                        <img class="maps" src="./assets/images/1.jpg" alt="">
                                        <img class="maps" src="./assets/images/2.jpg" alt="">
                                        <img class="maps" src="./assets/images/3.jpg" alt="">
                                    </div>
                                    <header>
                                        <div class="teamWrap">
                                            <img src="./assets/images/teamLogo/daw.png" alt="team logo" class="teamLogo">
                                            <span>DAW</span>
                                        </div>
                                        <div class="scoreWrap">
                                            <div class="score">
                                                <span>25</span>
                                                <span>/</span>
                                                <span>0</span>
                                            </div>
                                            <div class="score">
                                                <span>250</span>
                                                <span>/</span>
                                                <span>0</span>
                                            </div>
                                            <div class="score">
                                                <span>25</span>
                                                <span>/</span>
                                                <span>0</span>
                                            </div>
                                        </div>
                                        <div class="teamWrap">
                                            <img src="./assets/images/teamLogo/daw.png" alt="team logo" class="teamLogo">
                                            <span>DAW</span>
                                        </div>
                                    </header>
                                    <footer>
                                        
                                        <div class="typeWrap">
                                            <span>Tournoi BSP</span>
                                            <div class="date">25 mai</div>
                                        </div>
                                        <div class="vodWrap">
                                            <span>VOD Twitch</span>
                                            <a href="#" class="btn bgTwitch"></a>
                                        </div>
                                    </footer>
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
    <!-- Masonry -->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <!-- page -->
    <script src="./assets/js/comp.js"></script>

</body>
</html>