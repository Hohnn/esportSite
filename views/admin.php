<?php 
    require_once __DIR__.'/../controllers/controller.php';
    require_once __DIR__.'/../controllers/admin_controller.php';

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
    <link rel="stylesheet" href="../assets/sass/admin.css">
    <link rel="stylesheet" href="../assets/sass/comp.css">
    <title>DAW esport</title>
</head>
<?php require __DIR__.'/../components/header.php' ?>
                <section class="actu">
                    <h1>ADMINISTRATION</h1>
<?php if (isset($_GET['match']) || empty($_GET)) { ?>
                    <div class="container-md">
                        <div class="row g-4">
                            <div class="col-12 col-xl-7">
                        
                        <form class="row pt-3 myCard needs-validation" action="" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="col-sm-5">
                                <select class="form-select" aria-label="Default select example" name="team1" required>
                                    <?php if ($_GET['match'] != 'edit') { ?>
                                    <option selected hidden>équipe n°1</option>
                                    <?php } ?>
<?php  foreach ($allTeams as $team) { 
    if ($_GET['match'] != 'edit') { ?>
                                    <option value="<?= $team['TEAM_ID'] ?>"><?= $team['TEAM_NAME'] ?></option>
<?php   } else { ?>
                                    <option <?= $match['TEAM1_ID'] == $team['TEAM_ID'] ? 'selected' : '' ?> value="<?= $team['TEAM_ID'] ?>"><?= $team['TEAM_NAME'] ?></option>
<?php } }?>
                                </select>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center align-items-center text-yellow">VS</div>
                            <div class="col-sm-5">
                                <select class="form-select" aria-label="Default select example" name="team1" required>
                                    <?php if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                    <option selected hidden>équipe n°1</option>
                                    <?php } ?>
<?php  foreach ($allTeams as $team) { 
    if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                    <option value="<?= $team['TEAM_ID'] ?>"><?= $team['TEAM_NAME'] ?></option>
<?php   } else { ?>
                                    <option <?= $match['TEAM2_ID'] == $team['TEAM_ID'] ? 'selected' : '' ?> value="<?= $team['TEAM_ID'] ?>"><?= $team['TEAM_NAME'] ?></option>
<?php } }?>
                                </select>
                            </div>   
                            <div class="col-12 g-3 mb-0">
                                <div class="row g-3">
                                    <div class="col minSet">
                                        <div class="row g-2">
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score1Team1" id="score1Team1" value="<?= $matchScore[0]['SCORE_TEAM1'] ?? '' ?>" placeholder="Score T1" required>
                                                <div class="invalid-feedback ">non valide</div>
                                            </div>
                                            <div class="col-2 d-flex justify-content-center align-items-center text-yellow">/</div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score1Team2" id="score1Team2" value="<?= $matchScore[0]['SCORE_TEAM2'] ?? '' ?>" placeholder="Score T2" required>
                                                <div class="invalid-feedback ">non valide</div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example" name="map" required>
                                                <?php if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                                    <option selected hidden>Carte n°1</option>
                                                <?php } ?>    
<?php  foreach ($allMaps as $map) { 
    if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                                    <option value="<?= $map['MAPS_ID'] ?>"><?= $map['MAPS_NAME'] ?></option>
<?php   } else { ?>
                                                    <option <?= $matchScore[0]['MAPS_ID'] == $map['MAPS_ID'] ? 'selected' : '' ?> value="<?= $map['MAPS_ID'] ?>"><?= $map['MAPS_NAME'] ?></option>
<?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col minSet">
                                        <div class="row g-2">
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score2Team1" id="score2Team1" value="<?= $matchScore[1]['SCORE_TEAM1'] ?? '' ?>" placeholder="Score T1" required>
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                            <div class="col-2 d-flex justify-content-center align-items-center text-yellow">/</div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score2Team2" id="score2Team2" value="<?= $matchScore[1]['SCORE_TEAM2'] ?? '' ?>" placeholder="Score T2" required>
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example" name="map" required>
                                                <?php if ($_GET['match'] != 'edit') { ?>
                                                    <option selected hidden>Carte n°2</option>
                                                <?php } ?>    
<?php  foreach ($allMaps as $map) { 
    if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                                    <option value="<?= $map['MAPS_ID'] ?>"><?= $map['MAPS_NAME'] ?></option>
<?php   } else { ?>
                                                    <option <?= $matchScore[1]['MAPS_ID'] == $map['MAPS_ID'] ? 'selected' : '' ?> value="<?= $map['MAPS_ID'] ?>"><?= $map['MAPS_NAME'] ?></option>
<?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col minSet">
                                        <div class="row g-2">
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score3Team1" id="score3Team1" value="<?= $matchScore[2]['SCORE_TEAM1'] ?? '' ?>" placeholder="Score T1" required>
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                            <div class="col-2 d-flex justify-content-center align-items-center text-yellow">/</div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score3Team2" id="score3Team2" value="<?= $matchScore[2]['SCORE_TEAM2'] ?? '' ?>" placeholder="Score T2" required>
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-2">
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example" name="map" required>
                                                <?php if (isset($_GET['match']) && $_GET['match'] != 'edit' || empty($matchScore[2])) { ?>
                                                    <option selected hidden>Carte n°3</option>
                                                <?php } ?>    
<?php  foreach ($allMaps as $map) { 
    if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                                    <option value="<?= $map['MAPS_ID'] ?>"><?= $map['MAPS_NAME'] ?></option>
<?php   } else { ?>
                                                    <option <?= !empty($matchScore[2]['MAPS_ID']) ? ($matchScore[2]['MAPS_ID'] == $map['MAPS_ID'] ? 'selected' : '') : '' ?> value="<?= $map['MAPS_ID'] ?>"><?= $map['MAPS_NAME'] ?></option>
<?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>  

                                <div class="col-12 g-3">
                                    <div class="row g-3">
                                    <div class="col minSet">
                                        <select class="form-select" aria-label="Default select example" name="event" required>
                                            <?php if ($_GET['match'] != 'edit') { ?>
                                            <option selected hidden>Evènement</option>
                                            <?php } ?>
<?php  foreach ($allTournament as $tournament) {
    if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                            <option value="<?= $tournament['TOURNAMENT_ID'] ?>"><?= $tournament['TOURNAMENT_NAME'] ?></option>
<?php   } else { ?>
                                            <option <?= !empty($match['TOURNAMENT_ID']) ? ($match['TOURNAMENT_ID'] == $tournament['TOURNAMENT_ID'] ? 'selected' : '') : '' ?> value="<?= $tournament['TOURNAMENT_ID'] ?>"><?= $tournament['TOURNAMENT_NAME'] ?></option>
<?php } }?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="match_date" id="match_date" value="<?= $match['MATCH_DATE'] ?? '' ?>" placeholder="Date" required>
                                        <div class="invalid-feedback ">Nom invalide</div>
                                    </div>
                                    <div class="col minSet">
                                        <input type="link" class="form-control" name="link" id="link" value="<?= $match['MATCH_LINK_VOD'] ?? '' ?>" placeholder="Lien" required>
                                        <div class="invalid-feedback ">Nom invalide</div>
                                    </div>
                                </div>  
                            </div> 
                                
                            <div class="col d-flex mt-2">
<?php if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                <button class="btn btn-sm btn-primary bgYellow px-3" type="submit" name="submitMatch" >Ajouter</button>
<?php } else { ?>
                                <button class="btn btn-sm btn-primary bgYellow px-3" type="submit" name="submitMatchUpdate" >Modifier</button>
<?php } ?>
                            </div>
                        </form>
                        </div>
                        <div class="col matchCol">
                            <div class="matchCard myCard">
                                    <div class="imgBack">
                                        <img class="maps" id="map1"  alt="">
                                        <img class="maps" id="map2"  alt="">
                                        <img class="maps" id=map3  alt="">
                                    </div>
                                    <header>
                                        <div class="teamWrap">
                                            <img id="logoTeam1"  class="teamLogo">
                                            <span id="nameTeam1">DAW</span>
                                        </div>
                                        <div class="scoreWrap">
                                            <div class="score">
                                                <span id="score1map1">0</span>
                                                <span>/</span>
                                                <span id="score2map1">0</span>
                                            </div>
                                            <div class="score">
                                                <span id="score1map2">0</span>
                                                <span>/</span>
                                                <span id="score2map2">0</span>
                                            </div>
                                            <div class="score">
                                                <span id="score1map3">0</span>
                                                <span>/</span>
                                                <span id="score2map3">0</span>
                                            </div>
                                        </div>
                                        <div class="teamWrap">
                                            <img id="logoTeam2"  class="teamLogo">
                                            <span id="nameTeam2">DAW</span>
                                        </div>
                                    </header>
                                    <footer>
                                        <div class="typeWrap">
                                            <span id="event">Tournoi BSP</span>
                                            <div id="dateEvent" class="date">25 mai</div>
                                        </div>
                                        <div class="vodWrap">
                                            <span id="vod">VOD Twitch</span>
                                            <a id="vodColor" href="#" class="btn bgTwitch"></a>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
<?php } if(empty($_GET)) { ?>
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="title">News n°1</div>
                            <div class="col">
                                <div class="card " id="backImage">
                                    <div class="desc text-white">
                                        <h2 class="title" id="titlePreview">Death Stranding</h2>
                                        <div class="date" id="datePreview">25/05/1992</div>
                                        <div class="sujet" id="typePreview">News</div>
                                        <div class="auteur" id="authorPreview">Hohnn</div>
                                        <button type="button">Voir</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col d-flex mt-3 mt-sm-0">
                                <form action="admin.php" method="POST">
                                    <input class="form-control form-control-sm" id="title" type="text" placeholder="Titre">
                                    <div class="wrap d-flex mt-2">
                                        <input class="form-control form-control-sm" id="date" type="text" placeholder="Date">
                                        <input class="form-control form-control-sm" id="type" type="text" placeholder="Type">
                                        <input class="form-control form-control-sm" id="author" type="text" placeholder="Auteur">
                                    </div>
                                    <input class="form-control form-control-sm mt-2" id="Source" type="text" placeholder="Lien source">
                                    <input class="form-control form-control-sm mt-2" id="fileToUpload" type="file">
                                    <div class="w-100 d-flex mt-2">
                                        <button class="btn btn-sm btn-primary ms-auto bgYellow px-3" type="submit">Valider</button>
                                    </div>
                        
                                </form>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="title">News n°2</div>
                            <div class="col d-flex">
                                <form action="">
                                    <input class="form-control form-control-sm" id="title2" type="text" placeholder="Titre">
                                    <div class="wrap d-flex mt-2">
                                        <input class="form-control form-control-sm" id="date2" type="text" placeholder="Date">
                                        <input class="form-control form-control-sm" id="type2" type="text" placeholder="Type">
                                        <input class="form-control form-control-sm" id="author2" type="text" placeholder="Auteur">
                                    </div>
                                    <input class="form-control form-control-sm mt-2" id="Source2" type="text" placeholder="Lien source">
                                    <input class="form-control form-control-sm mt-2" id="fileToUpload2" type="file">
                                    <div class="w-100 d-flex mt-2">
                                        <button class="btn btn-sm btn-primary ms-auto bgYellow px-3" type="submit">Valider</button>
                                    </div>
                        
                                </form>
                            </div>
                            <div class="col  mt-3 mt-sm-0">
                                <div class="card Mini">
                                    <div class="image" id="backImage2"></div>
                                    <div class="desc text-white">
                                        <h3 class="title" id="titlePreview2">Death Stranding</h3>
                                        <div class="date" id="datePreview2">25/05/1992</div>
                                        <div class="sujet" id="typePreview2">News</div>
                                        <div class="auteur" id="authorPreview2">Hohnn</div>
                                        <button type="button">Voir</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="title">News n°3</div>
                            <div class="col d-flex">
                                <form action="">
                                    <input class="form-control form-control-sm" id="title3" type="text" placeholder="Titre">
                                    <div class="wrap d-flex mt-2">
                                        <input class="form-control form-control-sm" id="date3" type="text" placeholder="Date">
                                        <input class="form-control form-control-sm" id="type3" type="text" placeholder="Type">
                                        <input class="form-control form-control-sm" id="author3" type="text" placeholder="Auteur">
                                    </div>
                                    <input class="form-control form-control-sm mt-2" id="Source3" type="text" placeholder="Lien source">
                                    <input class="form-control form-control-sm mt-2" id="fileToUpload3" type="file">
                                    <div class="w-100 d-flex mt-2">
                                        <button class="btn btn-sm btn-primary ms-auto bgYellow px-3" type="submit">Valider</button>
                                    </div>
                        
                                </form>
                            </div>
                            <div class="col  mt-3 mt-sm-0">
                                <div class="card Mini">
                                    <div class="image" id="backImage3"></div>
                                    <div class="desc text-white">
                                        <h3 class="title" id="titlePreview3">Death Stranding</h3>
                                        <div class="date" id="datePreview3">25/05/1992</div>
                                        <div class="sujet" id="typePreview3">News</div>
                                        <div class="auteur" id="authorPreview3">Hohnn</div>
                                        <button type="button">Voir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php } ?>
                </section>
            </main>
        </div>
    </div>


<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 110">
    <div id="liveToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            Le match a été ajouté avec succès !
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <?php if(isset($mailSuccess)){ ?>
        <script>
        let myToast =  new bootstrap.Toast(document.getElementById('liveToast'))
        myToast.show()
        
        </script>
    <?php } ?>
    
        <!--    <script src="../assets/js/admin.js"></script> -->
</body>
</html>