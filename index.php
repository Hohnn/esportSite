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
                <section class="actu">
                    <h1>L'ACTUALITÉ <br> <span>BATTLEFIELD <span>PC</span></span></h1>
                    <div class="container-fluid mt-4 phone">
                        <div class="d-flex justify-content-end position-relative">
                            <div id="plusSug" class="plusSug d-none">
                                <a href="suggestion.php" class="fs-6 fw-light">Proposer un article</a>
                            </div>
                            <i id="plusArticle" class="bi bi-three-dots"></i>
                            

                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <div class="card ">
                                    <div class="desc text-white">
                                        <h2 class="title">Death Stranding</h2>
                                        <div class="date">25/05/1992</div>
                                        <div class="sujet">News</div>
                                        <div class="auteur">Hohnn</div>
                                        <a href="" target="_blank" type="button">Voir</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
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
                    <h1>L'ACTUALITÉ <span>TWITCH <span>BF</span></span></h1>
                    <nav>
                        <ul>
                            <li>
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
                    <h1>L'ACTUALITÉ <span>YOUTUBE <span>BF</span></span></h1>
                    <nav>
                        <ul>
                            <li>
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
                    <h1>LES <span>MEMBRES <span>DAW</span></span></h1>
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