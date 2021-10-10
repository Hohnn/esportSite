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
                <section class="actu mt-0">
                    <h1>ADMINISTRATION</h1>
                    <div class="container-fluid my-4">
                        <div class="adminMenu">
                            <div class="card myCard <?= isset($_GET['news']) ? 'menuActive' : '' ?>">
                                <a href="?news"><i class="bi bi-newspaper me-2"></i>Article</a>
                            </div>
                            <div class="card myCard <?= isset($_GET['team']) ? 'menuActive' : '' ?>">
                                <a href="?team"><i class="bi bi-card-heading me-2"></i>Équipe</a>
                            </div>
                            <div class="card myCard <?= isset($_GET['tournament']) ? 'menuActive' : '' ?>">
                                <a href="?tournament"><i class="bi bi-trophy me-2"></i>Tournoi</a>
                            </div>
                            <div class="card myCard <?= isset($_GET['match']) ? 'menuActive' : '' ?>">
                                <a href="?match"><i class="bi bi-controller me-2"></i>Match</a>
                            </div>
                            <div class="card myCard <?= isset($_GET['user']) ? 'menuActive' : '' ?>">
                                <a href="?user"><i class="bi bi-person-square me-2"></i>Utilisateur</a>
                            </div>
                            <div class="card myCard">
                                <a  id="refresh"><i class="bi bi-bar-chart me-2"></i>Actualisé les stats</a>
                            </div>
                        </div>
                    </div>
<?php if (isset($_GET['team'])) { ?>
                    <div class="container-fluid mb-5 mt-3">
                        <div class="row g-4">
                            <div class="title"><?= $_GET['team'] == 'edit' ? 'Modifier une ' : 'Ajouter une ' ?>équipes</div>
                            <div class="col-12 col-xl-7">
                                <form class="row myCard needs-validation" action="" method="POST" enctype="multipart/form-data" novalidate>
                                    <div class="col-12">    
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="teamLogo">logo de l'équipe</label>
                                                <input type="hidden" id="oldLogo" name="teamOldLogo" value="<?= $team['TEAM_LOGO'] ?? '' ?>">
                                                <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control <?= !empty($verifUpload) ? 'is-invalid' : ''?>" name="logo" id="teamLogo" onchange="showPreviewTeamLogo(event);"  <?= isset($team['TEAM_LOGO']) ? '' : 'required' ?>>
                                                <div class="invalid-feedback "><?= $verifUpload[0] ?? '' ?></div>
                                            </div>
                                            <div class="col">
                                                <label for="teamName">Nom de l'équipe</label>
                                                <input type="hidden" id="playerCount" name="playerCount" value="">
                                                <input type="hidden" id="teamId" name="teamId" value="<?= $team['TEAM_ID'] ?? '' ?>">
                                                <input type="text" class="form-control <?= isset($errorTeamName) ? 'is-invalid' : '' ?>" name="name" id="teamName" value="<?= $team['TEAM_NAME'] ?? '' ?>" placeholder="Vitality..." required>
                                                <div class="invalid-feedback ">Champ obligatoire</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row mt-4">
                                            <div class="col">
                                                <label for="flagSelect">Drapeau</label>
                                            <select class="form-select myMaxFit " aria-label="Default select example" id="flagSelect" name="country" required >
                                <?php if ( $_GET['team'] != 'edit') { ?>
                                                <option selected hidden disabled>Choisir un drapeau</option> 
                                <?php } foreach($country as $tag => $countryName) { ?>
                                                <option <?= isset($team) ? ($tag == $team['TEAM_COUNTRY'] ? 'selected' : '') : '' ?> <?= isset($tournament['TOURNAMENT_STATUS']) ? ($tournament['TOURNAMENT_STATUS'] == 'A venir' ? 'selected' : '') : '' ?> value="<?= $tag ?>" ><?= $countryName ?></option>
                                <?php } ?>    
                                            </select>
                                            </div>
                                            <div class="col">
                                                <label for="tag">Tag de l'équipe</label>
                                                <input type="text" class="form-control" name="tag" id="tag" maxlength="6" value="<?= $team['TEAM_SHORTNAME']  ?? '' ?>" placeholder="VIT" required>
                                                <div class="invalid-feedback ">non valide</div>
                                            </div>
                                        </div>
                                        <div class="row mt-4 g-2" id="playersContainer">
                                            <div class="mb-2 text-white">Joueurs</div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-sm btn-primary bgYellowOutline pe-3 mw-25" id="plusPlayer"><i class="bi bi-plus me-2"></i>Ajouter un joueur</button>
                                            </div>
                                        </div>
                                    </div>                       
                                    <div class="col d-flex my-3">
                                        <a href="../views/comp.php" class="btn btn-sm btn-outline-secondary px-3" type="submit" name="submitMatch" >Annuler</a>
                                <?php if (isset($_GET['team']) && $_GET['team'] == 'edit') { ?>
                                        <button class="btn btn-sm btn-primary bgYellow px-3 ms-auto" type="submit" name="submitTeamUpdate" value="<?= $match['MATCH_ID'] ?? '' ?>" >Modifier</button>
                                <?php } else { ?>
                                        <button class="btn btn-sm btn-primary bgYellow px-3 ms-auto" type="submit" name="submitTeam">Ajouter</button>
                                <?php } ?>
                                    </div>
                                </form>
                            </div>
                            <!-- Preview TEAM -->
                            <div class="col teamCol" >
                                <div class="teamCard myCard">
                                    <div id="toggle" class="toggle"><i class="bi bi-plus-circle"></i></div>
                                    <header>
                                        <img id="backTeamLogo" class="teamLogoBack">
                                        <img id="teamLogoPreview" class="teamLogo">
                                        <div class="wrap">
                                            <h3 class="teamName" id="teamNamePreview">DAW esport</h3>
                                            <div class="wrapDesc d-flex align-items-center">
                                                <div class="flag">
                                                    <img id="teamCountryPreview" src="https://www.countryflags.io/fr/flat/64.png" alt="">
                                                </div>
                                                <div class="tag ms-3" id="teamTagPreview">[DAW]</div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="teamMembers small" id="teamPlayerContainer">
                                        
                                    </div>
                                </div>
                            </div>



<?php } if (isset($_GET['tournament'])) { ?>
                    <div class="container-fluid mb-5 mt-3">
                        <div class="row g-4">
                            <div class="col-12">
                            <div class="title"><?= $_GET['tournament'] == 'edit' ? 'Modifier un ' : 'Ajouter un ' ?>tournoi</div>
                                <form class="row myCard needs-validation" action="" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="col-12">    
                                <div class="row mt-2 gy-2">
                                    <div class="col myMaxFit minSet ">
                                        <label for="tournamentLogo">Logo du Tournoi</label>
                                        <input type="hidden" name="tournamentOldLogo" value="<?= $tournament['TOURNAMENT_LOGO'] ?? '' ?>">
                                        <input type="file"  class="form-control <?= !empty($verifUpload) ? 'is-invalid' : ''?>" name="logo" id="tournamentLogo" onchange="showPreview(event);"  required>
                                        <div class="invalid-feedback "><?= $verifUpload[0] ?? '' ?></div>
                                    </div>
                                    <div class="col minSet">
                                        <label for="tournamentName">Nom du Tournoi</label>
                                        <input type="hidden" name="tournamentId" value="<?= $tournament['TOURNAMENT_ID'] ?? '' ?>">
                                        <input type="text" class="form-control" name="name" id="tournamentName" value="<?= $tournament['TOURNAMENT_NAME'] ?? '' ?>" placeholder="Tournoi BSP" required>
                                        <div class="invalid-feedback ">non valide</div>
                                    </div>
                                    <div class="col minSet">
                                        <label for="format">Format</label>
                                        <input list="formats" type="text" class="form-control" name="format" id="format" value="<?= $tournament['TOURNAMENT_FORMAT']  ?? '' ?>" placeholder="6v6 conquête escoude" required>
                                        <datalist id="formats">
                                            <option value="6v6 conquête escoude"></option>
                                            <option value="6v6 domination"></option>
                                        </datalist>
                                        <div class="invalid-feedback ">non valide</div>
                                    </div>
                                    <div class="col myMaxFit">
                                        <label for="format">Début</label>
                                        <input type="date" class="form-control" name="date" id="tournamentDate" value="<?= $tournament['TOURNAMENT_START']  ?? '' ?>" required>
                                        <div class="invalid-feedback ">non valide</div>
                                    </div>
                                    <div class="col myMaxFit">
                                        <label for="statusSelect">Statu</label>
                                        <select class="form-select" aria-label="Default select example" id="statusSelect" name="status" required>
<?php if (isset($_GET['tournament']) && $_GET['tournament'] != 'edit') { ?>
                                            <option selected hidden disabled>Choisir</option> 
<?php } ?>    
                                            <option <?= isset($tournament['TOURNAMENT_STATUS']) ? ($tournament['TOURNAMENT_STATUS'] == 'A venir' ? 'selected' : '') : '' ?> >A venir</option>
                                            <option <?= isset($tournament['TOURNAMENT_STATUS']) ? ($tournament['TOURNAMENT_STATUS'] == 'En cours' ? 'selected' : '') : ''  ?> >En cours</option>
                                            <option <?= isset($tournament['TOURNAMENT_STATUS']) ? ($tournament['TOURNAMENT_STATUS'] == 'Terminé' ? 'selected' : '') : ''  ?> >Terminé</option>
                                        </select>
                                    </div>
                                    <div class="col minSet">
                                        <label for="link">URL</label>
                                        <input type="link" class="form-control" name="link" id="link" value="<?= $tournament['TOURNAMENT_LINK']  ?? '' ?>" placeholder="Lien du tournoi" required>
                                        <div class="invalid-feedback ">non valide</div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label class="mb-2 d-block">Equipe inscrite</label>
<?php  foreach ($allTeams as $team) { 
    if (!isset($_GET['tournament']) || $_GET['tournament'] != 'edit') { ?>
                                        <div class="d-inline-block fw-normal myCheckBox">
                                            <input class="form-check-input" type="checkbox" id="checkbox<?= $team['TEAM_ID'] ?>" name="teams[]" value="<?= $team['TEAM_ID'] ?>" require>
                                            <label class="form-check-label" for="checkbox<?= $team['TEAM_ID'] ?>"><?= $team['TEAM_NAME'] ?></label>
                                        </div>
<?php   } else { 
    $teamArray = explode(',', $tournament['TEAM_ID']);
    foreach ($teamArray as $teamId) {
        if ($teamId == $team['TEAM_ID']) {
            $checked = 'checked';
            break;
        } else {
            $checked = '';
        }
    } ?>
                                        <div class="d-inline-block fw-normal myCheckBox">
                                            <input class="form-check-input" type="checkbox" id="checkbox<?= $team['TEAM_ID'] ?>" name="teams[]" value="<?= $team['TEAM_ID'] ?>" <?= $checked ?? '' ?> require>
                                            <label class="form-check-label" for="checkbox<?= $team['TEAM_ID'] ?>"><?= $team['TEAM_NAME'] ?></label>
                                        </div>
<?php } } ?>
                                        
                                    </div>
                                    </div>
                                    </div>                       
                                    <div class="col d-flex mt-3 mb-2">
                                        <a href="../views/comp.php" class="btn btn-sm btn-outline-secondary px-3" type="submit" name="submitMatch" >Annuler</a>
<?php if (isset($_GET['tournament']) && $_GET['tournament'] != 'edit') { ?>
                                        <button class="btn btn-sm btn-primary bgYellow px-3 ms-auto" type="submit" name="submitTournament" >Ajouter</button>
<?php } else { ?>
                                        <button class="btn btn-sm btn-primary bgYellow px-3 ms-auto" type="submit" name="submitTournamentUpdate" value="<?= $match['MATCH_ID'] ?? '' ?>" >Modifier</button>
<?php } ?>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12" >
                                <div class="tournamentCard myCard">
                                    <div class="brand stuff">
                                        <img src="data:image/png;base64,<?= $tournament['TOURNAMENT_LOGO'] ?? '' ?>" id="tourLogo" alt="Logo" class="orgLogo">
                                        <h4 class="orgName" id="orgName"><?= $tournament['TOURNAMENT_NAME'] ?? 'Tournoi' ?></h4>
                                    </div>
                                    <div class="type stuff">
                                        <span>Format</span>
                                        <div id="formatPreview"><?= $tournament['TOURNAMENT_FORMAT'] ?? '' ?></div>
                                    </div>
                                    <div class="date stuff"> 
                                        <span>Début</span> 
                                        <div id="datePreview"><?= $tournament['DATE'] ?? '' ?></div>
                                    </div>
                                    <div class="status stuff">
                                        <span>Status</span> 
                                        <div id="statusPreview"><?= $tournament['TOURNAMENT_STATUS'] ?? '' ?></div>
                                    </div>
                                    <div class="teams stuff">
                                        <span>équipes</span> 
                                        <div class="teamsWrap">
<?php if (isset($_GET['tournament']) && $_GET['tournament'] == 'edit') {
$teamArray = explode(',', $tournament['TEAM_ID']);
foreach($teamArray as $teamId){ 
    $team = $Comp->getTeam($teamId);
?>
                                            <img src="data:image/png;base64,<?= $team['TEAM_LOGO'] ?>" alt="" class="teamLogo" data-team-id="<?= $team['TEAM_ID'] ?>">
<?php } }?>
                                        </div>
                                    </div>
                                    <a href="#" class="link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
<?php } ?>
<?php if (isset($_GET['match'])) { ?>
                    <div class="container-fluid mb-5">
                        <div class="row g-4">
                            <div class="title mb-0"><?= $_GET['match'] == 'edit' ? 'Modifier un ' : 'Ajouter un ' ?>match</div>
                            <div class="col-12 col-xl-7">                        
                        <form class="row pt-3 myCard needs-validation" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-sm-5">
                                <label for="team1">Équipe n°1</label>
                                <select class="form-select" aria-label="Default select example" name="team1" id="team1" required>
                                    <?php if ($_GET['match'] != 'edit') { ?>
                                    <option hidden value="">Choisir une équipe</option>
                                    <?php } ?>
<?php  foreach ($allTeams as $team) { 
    if ($_GET['match'] != 'edit') { ?>
                                    <option value="<?= $team['TEAM_ID'] ?>"><?= $team['TEAM_NAME'] ?></option>
<?php   } else { ?>
                                    <option <?= $match['TEAM1_ID'] == $team['TEAM_ID'] ? 'selected' : '' ?> value="<?= $team['TEAM_ID'] ?>"><?= $team['TEAM_NAME'] ?></option>
<?php } }?>
                                </select>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center align-items-end text-yellow py-2">VS</div>
                            <div class="col-sm-5">
                                <label for="team2">Équipe n°2</label>
                                <select class="form-select" aria-label="Default select example" name="team2" id="team2" required>
                                    <?php if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                    <option value="" hidden>Choisir une équipe</option>
                                    <?php } ?>
<?php  foreach ($allTeams as $team) { 
    if (!isset($_GET['match']) || $_GET['match'] != 'edit') { ?>
                                    <option value="<?= $team['TEAM_ID'] ?>"><?= $team['TEAM_NAME'] ?></option>
<?php   } else { ?>
                                    <option <?= $match['TEAM2_ID'] == $team['TEAM_ID'] ? 'selected' : '' ?> value="<?= $team['TEAM_ID'] ?>"><?= $team['TEAM_NAME'] ?></option>
<?php } }?>
                                </select>
                            </div>   
                            <div class="col-12 g-3 mb-0">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <label for="team1">Tour n°1</label>
                                            <div class="col mb-2 minSet">
                                                <div class="row">
                                            <div class="col">
                                                <input type="hidden" name="score1Id" value="<?= $matchScore[0]['SCORE_ID'] ?? '' ?>">
                                                <input type="number" max="500" class="form-control" name="score1Team1" id="score1Team1" value="<?= $matchScore[0]['SCORE_TEAM1'] ?? '' ?>" placeholder="Score n°1" required>
                                                <div class="invalid-feedback ">non valide</div>
                                            </div>
                                            <div class="col-1 d-flex justify-content-center align-items-center text-yellow">/</div>
                                            <div class="col">
                                                <input type="number" max="500" class="form-control" name="score1Team2" id="score1Team2" value="<?= $matchScore[0]['SCORE_TEAM2'] ?? '' ?>" placeholder="Score n°2" required>
                                                <div class="invalid-feedback ">non valide</div>
                                            </div>
                                        </div>
                                        </div>
                                            <div class="col minSet">
                                                <select class="form-select myMaxFit" aria-label="Default select example" name="map" id="map1" required>
                                                <?php if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                                    <option value="" hidden>Carte n°1</option>
                                                <?php } ?>    
<?php  foreach ($allMaps as $map) { 
    if (!isset($_GET['match']) || $_GET['match'] != 'edit') { ?>
                                                    <option value="<?= $map['MAPS_ID'] ?>"><?= $map['MAPS_NAME'] ?></option>
<?php   } else { ?>
                                                    <option <?= $matchScore[0]['MAPS_ID'] == $map['MAPS_ID'] ? 'selected' : '' ?> value="<?= $map['MAPS_ID'] ?>"><?= $map['MAPS_NAME'] ?></option>
<?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                        <label>Tour n°2</label>
                                            <div class="col mb-2 minSet">
                                                <div class="row">

                                            <div class="col">
                                                <input type="hidden" name="score2Id" value="<?= $matchScore[1]['SCORE_ID'] ?? '' ?>">
                                                <input type="number" max="500" class="form-control" name="score2Team1" id="score2Team1" value="<?= $matchScore[1]['SCORE_TEAM1'] ?? '' ?>" placeholder="Score n°1" required>
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                            <div class="col-1 d-flex justify-content-center align-items-center text-yellow">/</div>
                                            <div class="col">
                                                <input type="number" max="500" class="form-control" name="score2Team2" id="score2Team2" value="<?= $matchScore[1]['SCORE_TEAM2'] ?? '' ?>" placeholder="Score n°2" required>
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                        </div>
                                        </div>
                                            <div class="col minSet">
                                                <select class="form-select myMaxFit"  aria-label="Default select example" name="map2" id="map2" required>
                                                <?php if ($_GET['match'] != 'edit') { ?>
                                                    <option value="" hidden>Carte n°2</option>
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
                                    <div class="col-12">
                                        <div class="row">
                                            <label>Tour n°3</label>
                                            <div class="col mb-2 minSet">
                                                <div class="row">
 
                                            <div class="col">
                                                <input type="hidden" name="score3Id" value="<?= $matchScore[2]['SCORE_ID'] ?? '' ?>">
                                                <input type="number" max="500" class="form-control" name="score3Team1" id="score3Team1" value="<?= $matchScore[2]['SCORE_TEAM1'] ?? '' ?>" placeholder="Score n°1">
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                            <div class="col-1 d-flex justify-content-center align-items-center text-yellow">/</div>
                                            <div class="col">
                                                <input type="number" max="500" class="form-control" name="score3Team2" id="score3Team2" value="<?= $matchScore[2]['SCORE_TEAM2'] ?? '' ?>" placeholder="Score n°2">
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                                                                               
                                            </div>
                                            </div>
                                        
                                            <div class="col minSet">
                                                <select class="form-select myMaxFit" aria-label="Default select example" name="map3" id="map3">
                                                <?php if (isset($_GET['match']) && $_GET['match'] != 'edit' || empty($matchScore[2])) { ?>
                                                    <option hidden>Carte n°3</option>
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
                                    <div class="col myMaxFit">
                                        <label for="selectTournament">Événement</label>
                                        <select class="form-select" aria-label="Default select example" name="event" id="selectTournament" required>
                                            <?php if ($_GET['match'] != 'edit') { ?>
                                            <option value="" hidden>Choisir</option>
                                            <?php } ?>
                                            <option value="0">Scrim</option>
<?php  foreach ($allTournament as $tournament) {
    if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                            <option value="<?= $tournament['TOURNAMENT_ID'] ?>"><?= $tournament['TOURNAMENT_NAME'] ?></option>
<?php   } else { ?>
                                            <option <?= !empty($match['TOURNAMENT_ID']) ? ($match['TOURNAMENT_ID'] == $tournament['TOURNAMENT_ID'] ? 'selected' : '') : '' ?> value="<?= $tournament['TOURNAMENT_ID'] ?>"><?= $tournament['TOURNAMENT_NAME'] ?></option>
<?php } }?>
                                        </select>
                                    </div>
                                    <div class="col myMaxFit">
                                        <label for="match_date">Date</label>
                                        <input type="date" class="form-control  " name="match_date" id="match_date" value="<?= $match['MATCH_DATE'] ?? '' ?>" placeholder="Date" required>
                                        <div class="invalid-feedback ">Nom invalide</div>
                                    </div>
                                    <div class="col">
                                        <label for="link">URL</label>
                                        <input type="link" class="form-control" name="link" id="link" value="<?= $match['MATCH_LINK_VOD'] ?? '' ?>" placeholder="VOD du match">
                                        <div class="invalid-feedback ">Nom invalide</div>
                                    </div>
                                </div>  
                            </div> 
                                
                            <div class="col d-flex mt-3 mb-2">
                            <a href="../views/comp.php" class="btn btn-sm btn-outline-secondary px-3" type="submit" name="submitMatch" >Annuler</a>
<?php if (isset($_GET['match']) && $_GET['match'] != 'edit') { ?>
                                <button class="btn btn-sm btn-primary bgYellow px-3 ms-auto" type="submit" name="submitMatch" >Ajouter</button>
<?php } else { ?>
                                <button class="btn btn-sm btn-primary bgYellow px-3 ms-auto" type="submit" name="submitMatchUpdate" value="<?= $match['MATCH_ID'] ?? '' ?>" >Modifier</button>
<?php } ?>
                            </div>
                        </form>
                        </div>
                        <div class="col matchCol">
                            <div class="matchCard myCard">
                                    <div class="imgBack">
                                        <img <?= isset($matchScore[0]['MAPS_IMAGE']) ? 'src="../assets/images/maps/' . $matchScore[0]['MAPS_IMAGE'] . '"' : '' ?> class="<?= isset($matchScore[2]['MAPS_IMAGE']) ? 'maps' : 'maps2' ?>" id="map1Preview" >
                                        <img <?= isset($matchScore[1]['MAPS_IMAGE']) ? 'src="../assets/images/maps/' . $matchScore[1]['MAPS_IMAGE'] . '"' : '' ?> class="<?= isset($matchScore[2]['MAPS_IMAGE']) ? 'maps' : 'maps2' ?>" id="map2Preview" >
                                        <img <?= isset($matchScore[2]['MAPS_IMAGE']) ? 'src="../assets/images/maps/' . $matchScore[2]['MAPS_IMAGE'] . '"' : '' ?> class="<?= isset($matchScore[2]['MAPS_IMAGE']) ? 'maps' : 'maps d-none' ?>" id="map3Preview" >
                                    </div>
                                    <header>
                                        <div class="teamWrap">
                                            <img <?= isset($match['TEAM1_LOGO']) ? 'src="data:image/png;base64,' . $match['TEAM1_LOGO'] . '"' : '' ?> id="logoTeam1"  class="teamLogo">
                                            <span id="nameTeam1"><?= $match['TEAM1_SHORTNAME'] ?? 'TAG' ?></span>
                                        </div>
                                        <div class="scoreWrap">
                                            <div class="score">
                                                <span id="score1map1"><?= $matchScore[0]['SCORE_TEAM1'] ?? '0' ?></span>
                                                <span>/</span>
                                                <span id="score2map1"><?= $matchScore[0]['SCORE_TEAM2'] ?? '0' ?></span>
                                            </div>
                                            <div class="score">
                                                <span id="score1map2"><?= $matchScore[1]['SCORE_TEAM1'] ?? '0' ?></span>
                                                <span>/</span>
                                                <span id="score2map2"><?= $matchScore[1]['SCORE_TEAM2'] ?? '0' ?></span>
                                            </div>
                                            <div id="score3" class="score <?= isset($matchScore[2]['SCORE_TEAM1']) ? '' : 'd-none' ?>">
                                                <span id="score1map3"><?= $matchScore[2]['SCORE_TEAM1'] ?? '0' ?></span>
                                                <span>/</span>
                                                <span id="score2map3"><?= $matchScore[2]['SCORE_TEAM2'] ?? '0' ?></span>
                                            </div>
                                        </div>
                                        <div class="teamWrap">
                                            <img <?= isset($match['TEAM2_LOGO']) ? 'src="data:image/png;base64,' . $match['TEAM2_LOGO'] . '"' : '' ?> id="logoTeam2"  class="teamLogo">
                                            <span id="nameTeam2"><?= $match['TEAM1_SHORTNAME'] ?? 'TAG' ?></span>
                                        </div>
                                    </header>
                                    <footer>
                                        <div class="typeWrap">
                                            <span id="event"><?= $match['TOURNAMENT_NAME'] ?? 'Tournoi' ?></span>
                                            <div id="datePreview" class="date"><?= $match['MATCH_DATEFORMAT'] ?? 'Date' ?></div>
                                        </div>
                                        <div class="vodWrap">
                                            <span id="vod"><?= $vod ?? '' ?></span>
                                            <a id="vodColor" href="#" class="btn <?= $vodClass ?? '' ?>"></a>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
<?php } if(isset($_GET['news'])) { ?>
                    <div class="container-fluid">
                    <div class="row fw-normal">
                        <div class="title"><?= $_GET['news'] == 'edit' ? 'Modifier un ' : 'Ajouter un ' ?>article</div>
                            <div class="col-12 mt-3 mt-sm-0 myCard p-3 col-xl-6">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="title" >Titre de l'article</label>
                                        <input type="hidden" name="newsId" value="<?= $singleNews['ARTICLE_ID'] ?? '' ?>">
                                        <input type="text" class="form-control <?=isset($errorTitle) ? 'is-invalid' : ''?>" id="newsTitle" name="title" placeholder="titre" value="<?= isset($_POST['title']) ? $_POST['title'] : ( $singleNews['ARTICLE_TITLE'] ?? '' ) ?>">
                                        <div class="form-text text-danger"><?=$errorTitle ?? '' ?></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subTitle">Sous-titre</label>
                                        <input type="text" class="form-control <?=isset($errorSubTitle) ? 'is-invalid' : ''?>" id="newsSubTitle" name="subTitle" placeholder="Sous-titre" value="<?= isset($_POST['subTitle']) ? $_POST['subTitle'] : ( $singleNews['ARTICLE_SUBTITLE'] ?? '' ) ?>" require>
                                        <div class="form-text text-danger"><?=$errorSubTitle ?? '' ?></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingSelect">Type d'article</label>
                                        <select class="form-select maxContent" id="type" name="type">
                                            <option selected value="Article">Article</option>
                                            <option <?= isset($singleNews['ARTICLE_TYPE']) ? ( $singleNews['ARTICLE_TYPE'] == 'Test' ? 'selected' : '' ) : '' ?> value="Test">Test</option>
                                            <option <?= isset($singleNews['ARTICLE_TYPE']) ? ( $singleNews['ARTICLE_TYPE'] == 'Actu' ? 'selected' : '' ) : '' ?> value="Actu">Actu</option>
                                            <option <?= isset($singleNews['ARTICLE_TYPE']) ? ( $singleNews['ARTICLE_TYPE'] == 'Promo' ? 'selected' : '' ) : '' ?> value="Promo">Promo</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="source" >Lien de l'article</label>
                                        <input type="url" class="form-control <?=isset($errorSource) ? 'is-invalid' : ''?>"" id="newsSource" name="source" value="<?= isset($_POST['source']) ? $_POST['source'] : ( $singleNews['ARTICLE_LINK'] ?? '' ) ?>" placeholder="Source" require>
                                        <div class="form-text text-danger"><?=$errorSource ?? '' ?></div>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="fileToUpload">Image d'illustration</label>
                                        <input type="hidden" name="oldImage" value="<?= $singleNews['ARTICLE_IMAGE'] ?? '' ?>">
                                        <input type="file" name="img" class="form-control maxContent <?= isset($errorUploadNews) ? 'is-invalid' : '' ?>" id="fileToUpload" accept="image/png, image/jpg, image/jpeg" require>
                                        <div class="form-text text-danger"><?=$errorUploadNews ?? '' ?></div>
                                    </div>

                                    <div class="w-100 d-flex mt-4">
                                        <a href="../views/comp.php" class="btn btn-sm btn-outline-secondary px-3" type="submit" name="submitMatch" >Annuler</a>
<?php if (isset($_GET['news']) && $_GET['news'] != 'edit') { ?>
                                        <button class="btn btn-sm btn-primary ms-auto bgYellow px-3" type="submit" id="newsSubmit" name="submitNews" data-submit="<?= isset($count) && $count == 0 ? "valid" : "invalid" ?>">Valider</button>
<?php } else { ?>
                                        <button class="btn btn-sm btn-primary ms-auto bgYellow px-3" type="submit" name="submitNewsUpdate" value="<?= $singleNews['ARTICLE_ID'] ?? '' ?>" >Modifier</button>
<?php } ?>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-xl-6 mt-3 mt-xl-0">
                                <!-- Preview Carousel -->
                            <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"><img id="previewNewsMiniImage" src="../assets/images/news_images/<?= $singleNews['ARTICLE_IMAGE'] ?? '1.jpg' ?>" alt=""></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img id="previewNewsBigImage" src="../assets/images/news_images/<?= $singleNews['ARTICLE_IMAGE'] ?? '1.jpg' ?>" class="d-block w-100" alt="...">
                                        <div class="carousel-caption myTextShadow">
                                            <h2 id="previewNewstitle">First slide label</h2>
                                            <p id="previewNewsSubtitle">Some representative placeholder content for the first slide.</p>
                                            <a href="<?= $singleNews['ARTICLE_LINK'] ?? '' ?>" class="btn bgYellow text-white" target="_blank">Afficher <i class="bi bi-box-arrow-in-right"></i></a>
                                        </div>
                                        <div class="carousel-caption mycaption-top">
                                            <p id="previewNewsType"><i class="bi bi-bookmark-fill"></i> TEST</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row fw-normal mt-4 g-3">
                            <div class="title">Propositions d'articles</div>
<?php foreach($allProposal as $proposal){ 
    $user = $User->getUserById($proposal['USER_ID']);
    ?>
                            <div class="col proposalCol">
                                <div class="myCard proposalCard position-relative p-3">
                                    <div class="admin">
                                        <a data-add class="btn bg-success text-white"><i class="bi bi-plus-square"></i></a>
                                        <button type="button" id="deleteTeam" value="<?= $proposal['PROPOSAL_ID'] ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#proposalModal"><i class="bi bi-x-square"></i></button>
                                    </div>
                                    <header>
                                        <img src="../assets/images/user_logo/<?= $user['USER_LOGO'] ?>" alt="user_logo">
                                        <div class="username"><?= $user['USER_USERNAME'] ?></div>
                                        <div class="date"><?= $proposal['DATEFORMAT'] ?></div>
                                    </header>
                                    <p class="articleTitle"><?= $proposal['PROPOSAL_TITLE'] ?></p>
                                    <div class="link">  <a href="<?= $proposal['PROPOSAL_LINK'] ?>" target="_blank"><?= $proposal['PROPOSAL_LINK'] ?></a> </div>
                                    <p class="content"><?= $proposal['PROPOSAL_DESC'] ?></p>
                                </div>
                            </div>
<?php } ?>  
                        </div>  
                        </div>
<?php } if(isset($_GET['user'])) { ?>
                        <div class="container-fluid">
                            <div class="row fw-normal">
                                <div class="title d-flex justify-content-between align-items-end fw-bold">Gestion des utilisateurs 
                                    <form class="searchMember" action="" method="POST">
                                        <input type="text" id="searchMember" name="searchMember" placeholder="Recherche">
                                    </form>
                                </div>
                                <div class="table-responsive">
                                <table class="table table-dark table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Pseudo</th>
                                            <th scope="col">Statut</th>
                                            <th scope="col">Adresse mail</th>
                                            <th scope="col">Origin ID</th>
                                            <th scope="col">Réseaux</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php foreach($allUserManager as $user){ ?>
                                        <tr data-href="../views/user.php?nickname=<?= $user['USER_USERNAME'] ?>">
                                            <th scope="row"><?= $user['USER_ID'] ?></th>
                                            <td><img src="../assets/images/user_logo/<?= $user['USER_LOGO'] ?>" alt="user logo"></td>
                                            <td class="name"><?= $user['USER_USERNAME'] ?></td>
                                            <td> 
                                                <form class="roleSelect" action="" method="post" class="form-horizontal">
                                                    <input type="hidden" name="userId" value="<?= $user['USER_ID'] ?>">
                                                    <select class="form-select" name="updateRole">
<?php foreach($allStatus as $status){ ?>
                                                        <option <?= $user['STATUS_ID'] == $status['STATUS_ID'] ? 'selected' : '' ?> value="<?= $status['STATUS_ID'] ?>"><?= $status['STATUS_ROLE'] ?></option>
<?php } ?>
                                                    </select>
                                                </form>
                                            </td>
                                            <td><?= $user['USER_MAIL'] ?></td>
                                            <td><?= $user['USER_ORIGIN_ID'] ?></td>
                                            <td>
                                                <div class="social">
                                                    <div><?= empty($user['USER_TWITTER']) ? '' : '<i class="bi bi-twitter me-2"></i>'?> <div class="twitter d-none"><?= $user['USER_TWITTER'] ?? '' ?></div></div> 
                                                    <div><?= empty($user['USER_YOUTUBE']) ? '' : '<i class="bi bi-youtube me-2"></i>' ?><div class="youtube d-none"><?= $user['USER_YOUTUBE'] ?? '' ?></div></div> 
                                                    <div><?= empty($user['USER_TWITCH']) ? '' : '<i class="bi bi-twitch me-2"></i>' ?><div class="twitch d-none"><?= $user['USER_twitch'] ?? '' ?></div></div>
                                                </div> 
                                            </td>
                                            <td class="d-flex justify-content-end">
                                                <button type="button" value="<?= $user['USER_ID'] ?? '' ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#userModal"><i class="bi bi-x-square"></i></button>
                                            </td>
                                        </tr>
<?php } ?>
                                    </tbody>
                                </table>
                                </div>
                        </div>

<?php } ?>
                </section>
            </main>
        </div>
    </div>

<!-- Toast -->
<div class="position-fixed top-0 end-0 p-3 myToast" style="z-index: 110">
    <div id="liveToast" class="toast align-items-center text-white <?= $color ?? 'bg-success' ?> border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            <?= $success ?? '' ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

    <!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Vous êtes sur le point de supprimer un compte utilisateur.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
        <form action="" method="POST">
            <input type="hidden" id="userIdDelete" name="userId" value="">
            <button type="submit" name="submitDeleteUser" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Modal -->
<div class="modal fade" id="proposalModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Vous êtes sur le point de supprimer une proposition d'article.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
        <form action="" method="POST">
            <input type="hidden" id="proposalIdDelete" name="proposalId" value="">
            <button type="submit" name="submitDeleteProposal" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <?php if(isset($success)){ ?>
        <script>
        let myToast =  new bootstrap.Toast(document.getElementById('liveToast'))
        myToast.show()
        
        </script>
    <?php } ?>
        <script type='text/javascript'> var allUsers = <?= json_encode($allUsers) ?>;  </script>
        <script src="../assets/js/admin.js"></script>
        <?php if ( isset($_GET['match'])) { ?>
        <script src="../assets/js/adminMatch.js"></script>
<?php } ?>
        <?php if ( isset($_GET['tournament'])) { ?>
        <script src="../assets/js/adminTournament.js"></script>
<?php } ?>
        <?php if ( isset($_GET['team'])) { ?>
        <script src="../assets/js/adminTeam.js"></script>
<?php } ?>
        <?php if ( isset($_GET['news'])) { ?>
        <script src="../assets/js/adminNews.js"></script>
<?php } ?>
        <?php if ( isset($_GET['user'])) { ?>
        <script src="../assets/js/adminUser.js"></script>
<?php } ?>

</body>
</html>