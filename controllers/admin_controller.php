<?php

$Comp = new CompModel();

$allTeams = $Comp->getAllTeams();
$allMaps = $Comp->getAllMaps();
$allTournament = $Comp->getAllTournament();
$allMatches = $Comp->getAllMatches();

if (isset($_POST['submitMatch'])) {
    $match_id = $Comp->addMatch($_POST['team1'], $_POST['team2'], $_POST['match_date'], $_POST['link'], $_POST['event'], $_SESSION['id']);
    
    $Comp->addMatchScore($_POST['score1Team1'], $_POST['score1Team2'], $_POST['map'], $match_id);
    $Comp->addMatchScore($_POST['score2Team1'], $_POST['score2Team2'], $_POST['map2'], $match_id);

    if (strlen($_POST['score3Team1']) > 0 && strlen($_POST['score3Team2']) > 0) {
        $Comp->addMatchScore($_POST['score3Team1'], $_POST['score3Team2'], $_POST['map3'], $match_id);
    }

    $success = 'ajouté';
}

if (isset($_GET['match']) && $_GET['match'] == 'edit') {
    $match = $Comp->getMatchAllInfos($_GET['matchId']);
    $matchScore = $Comp->getMatchScore($_GET['matchId']);
}

if (isset($_POST['submitMatchUpdate'])) {
    $match_id = $_POST['submitMatchUpdate'];
    $Comp->updateMatch($match_id, $_POST['team1'], $_POST['team2'], $_POST['match_date'], $_POST['link'], $_POST['event'], $_SESSION['id']);

    $Comp->updateMatchScore($_POST['score1Team1'], $_POST['score1Team2'], $_POST['map'], $_POST['score1Id']);
    $Comp->updateMatchScore($_POST['score2Team1'], $_POST['score2Team2'], $_POST['map2'], $_POST['score2Id']);

    if (empty($_POST['score3Id'])) {
        if (strlen($_POST['score3Team1']) > 0 && strlen($_POST['score3Team2']) > 0) {
            $Comp->addMatchScore($_POST['score3Team1'], $_POST['score3Team2'], $_POST['map3'], $match_id);
        }
    } else {
        if (strlen($_POST['score3Team1']) > 0 && strlen($_POST['score3Team2']) > 0) {
            $Comp->updateMatchScore($_POST['score3Team1'], $_POST['score3Team2'], $_POST['map3'], $_POST['score3Id']);
        } else {
            $Comp->deleteMatchScore($_POST['score3Id']);
        }
    }
    $success = 'modifié';
}

if (isset($_POST['submitTournament'])) {
    $
    $Comp->addTournament($_POST['name'], $_FILES['logo']['name'], $_POST['format'], $_POST['date'], $_POST['status'], $_POST['teams'], $_SESSION['id']);
    /* var_dump($_POST, $_FILES['logo']['name']); */
}

if (isset($_GET['tournament']) && $_GET['tournament'] == 'edit') {
    $tournament = $Comp->getTournament($_GET['tournamentId']);
}

if (isset($_POST['submitTournamentUpdate'])) {
    if (empty($_FILES['logo']['name'])) {
        $logo = $_POST['tournamentOldLogo'];
    } else {
        $logo = $_FILES['logo']['name'];
    }
    $Comp->updateTournament($_POST['tournamentId'], $_POST['name'], $_FILES['logo']['name'], $_POST['format'], $_POST['date'], $_POST['status'], $_POST['teams'], $_SESSION['id']);
}



