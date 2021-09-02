<?php

$Comp = new CompModel();

$allTeams = $Comp->getAllTeams();
$allMaps = $Comp->getAllMaps();
$allTournament = $Comp->getAllTournament();
$allMatches = $Comp->getAllMatches();

if (isset($_POST['submitMatch'])) {
/*     $match_id = $Comp->addMatch($_POST['team1'], $_POST['team2'], $_POST['match_date'], $_POST['link'], $_POST['event'], $_SESSION['id']);
    
    $Comp->addMatchScore($_POST['score1Team1'], $_POST['score1Team2'], $_POST['map'], $match_id);
    $Comp->addMatchScore($_POST['score2Team1'], $_POST['score2Team2'], $_POST['map2'], $match_id);

    if (strlen($_POST['score3Team1']) > 0 && strlen($_POST['score3Team2']) > 0) {
        $Comp->addMatchScore($_POST['score3Team1'], $_POST['score3Team2'], $_POST['map3'], $match_id);
    } */
}


