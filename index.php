<?php
    include 'phpRSS.php';
    include 'phpMembers.php';
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
    <title>DAW esport</title>
</head>
<?php include './components/header.php' ?>
            <div class="container-fluid">
                <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"><img src="assets\images\1.jpg" alt=""></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"><img src="assets\images\2.jpg" alt=""></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"><img src="assets\images\3.jpg" alt=""></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets\images\1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <h2>First slide label</h2>
                            <p>Some representative placeholder content for the first slide.</p>
                            <a href="#" class="btn bgYellow text-white">Afficher <i class="bi bi-box-arrow-in-right"></i></a>
                        </div>
                        <div class="carousel-caption mycaption-top">
                            <p><i class="bi bi-bookmark-fill"></i> TEST</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets\images\2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <h2>Second slide label</h2>
                            <p>Some representative placeholder content for the second slide.</p>
                            <a href="#" class="btn bgYellow text-white">Afficher <i class="bi bi-box-arrow-in-right"></i></a>
                        </div>
                        <div class="carousel-caption mycaption-top">
                            <p><i class="bi bi-bookmark-fill"></i> TEST</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets\images\3.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <h2>Third slide label</h2>
                            <p>Some representative placeholder content for the third slide.</p>
                            <a href="#" class="btn bgYellow text-white">Afficher <i class="bi bi-box-arrow-in-right"></i></a>
                        </div>
                        <div class="carousel-caption mycaption-top">
                            <p><i class="bi bi-bookmark-fill"></i> TEST</p>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                
                <section class="actu">
                    <h1>L'ACTU <span>battlefield</span></h1>
                    <div class="container-fluid mt-4 phone">
                        <div class="d-flex justify-content-end position-relative">
                            <div id="plusSug" class="plusSug d-none">
                                <a href="suggestion.php" class="fs-6 fw-light">Proposer un article</a>
                            </div>
                            <i id="plusArticle" class="bi bi-three-dots"></i>
                        </div>


                        <div class="row g-3">
                            <div class="col">
                            <blockquote class="twitter-tweet"><p lang="en" dir="ltr">NEW WORLD RECORD 196 KILLS on Conquest Underground (HIGHLIGHT KILL) <a href="https://t.co/3Wa9B8l4P1">https://t.co/3Wa9B8l4P1</a> via <a href="https://twitter.com/YouTube?ref_src=twsrc%5Etfw">@YouTube</a> <a href="https://twitter.com/EAFrance?ref_src=twsrc%5Etfw">@EAFrance</a> <a href="https://twitter.com/BattlefieldEAFR?ref_src=twsrc%5Etfw">@BattlefieldEAFR</a> <a href="https://twitter.com/BF_CommuFR?ref_src=twsrc%5Etfw">@BF_CommuFR</a> <a href="https://twitter.com/Battlefield?ref_src=twsrc%5Etfw">@Battlefield</a> <a href="https://twitter.com/BF_Nation?ref_src=twsrc%5Etfw">@BF_Nation</a> <a href="https://twitter.com/hashtag/WorldRecord?src=hash&amp;ref_src=twsrc%5Etfw">#WorldRecord</a> <a href="https://twitter.com/hashtag/BATTLEFIELD2042?src=hash&amp;ref_src=twsrc%5Etfw">#BATTLEFIELD2042</a> <a href="https://twitter.com/hashtag/Battlefield?src=hash&amp;ref_src=twsrc%5Etfw">#Battlefield</a> <a href="https://twitter.com/hashtag/BattlefieldV?src=hash&amp;ref_src=twsrc%5Etfw">#BattlefieldV</a> <a href="https://twitter.com/hashtag/twitch?src=hash&amp;ref_src=twsrc%5Etfw">#twitch</a> <a href="https://twitter.com/hashtag/clips?src=hash&amp;ref_src=twsrc%5Etfw">#clips</a> <a href="https://t.co/RoTtwAg0VX">pic.twitter.com/RoTtwAg0VX</a></p>&mdash; Chiv3rs (@Chiv3rs_) <a href="https://twitter.com/Chiv3rs_/status/1423965202811338760?ref_src=twsrc%5Etfw">August 7, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                            <div class="col">
                            <blockquote class="twitter-tweet"><p lang="fr" dir="ltr">Il y a 2 ans je jouais Gewehr 1-5, Thompson à la mire, Suomi et sur Panzerstorm 😱 ça a bien changé 😄<a href="https://twitter.com/hashtag/Battlefield?src=hash&amp;ref_src=twsrc%5Etfw">#Battlefield</a> <a href="https://t.co/nIOGWFUJAS">https://t.co/nIOGWFUJAS</a></p>&mdash; H∅hnn! (@HohenJ) <a href="https://twitter.com/HohenJ/status/1415824826288201728?ref_src=twsrc%5Etfw">July 16, 2021</a></blockquote>
                                <div class="card Mini">
                                    <div class="image"></div>
                                    <div class="desc text-white">
                                        <h3 class="title">Death Stranding</h3>
                                        <div class="date">25/05/1992</div>
                                        <div class="sujet">News</div>
                                        <div class="auteur">Hohnn</div>
                                        <a href="" target="_blank" type="button">Voir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="twitch">
                    <h1>L'ACTU <span>TWITCH</span></h1>
                    <nav>
                        <ul>
                            <li class="active">
                                <a href="#">Tous</a>
                            </li>
                            <li>
                                <a href="#">DAW</a>
                            </li>
                            <li>
                                <a href="#">Caster</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="container-fluid cont">
                        <div id="next" class="nav"><i class="bi bi-arrow-right-circle-fill"></i></div>
                        <div id="prev" class="nav d-none"><i class="bi bi-arrow-left-circle-fill"></i></div>
                        <div id="myscroll" class="row g-3 scroll">
                            <!-- API twitch -->
                        </div>
                    </div>
                </section>
                <section class="twitch">
                    <h1>L'ACTU <span>YOUTUBE</span></h1>
                    <nav>
                        <ul>
                            <li class="active">
                                <a href="#">Tous</a>
                            </li>
                            <li>
                                <a href="#">DAW</a>
                            </li>
                            <li>
                                <a href="#">Caster</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="container-fluid cont">
                        <div id="next2" class="nav"><i class="bi bi-arrow-right-circle-fill"></i></div>
                        <div id="prev2" class="nav d-none"><i class="bi bi-arrow-left-circle-fill"></i></div>
                        <div id="myscroll2" class="row g-3 scroll">
                            <!-- API youtube -->
                        </div>
                    </div>
                </section>
                <section class="twitch topMembers">
                    <h1>MEMBRES <span>DAW</span></h1>
                    <div class="container-fluid cont">
                        <div id="next3" class="nav"><i class="bi bi-arrow-right-circle-fill"></i></div>
                        <div id="prev3" class="nav d-none"><i class="bi bi-arrow-left-circle-fill"></i></div>
                        <div id="myscroll3" class="row scroll d-flex">
                            <!-- members -->
                            <?= displayMembers() ?>
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
    <script src="./assets/js/test.js"></script>
    <script src="./assets/js/apiTwitch.js"></script>
</body>
</html>