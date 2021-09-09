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

    $success = 'Le match a été ajouté avec succès !';
}

if (isset($_GET['match']) && $_GET['match'] == 'edit') {
    $match = $Comp->getMatchAllInfos($_GET['matchId']);
    $matchScore = $Comp->getMatchScore($_GET['matchId']);
    $team1Loose = 0;
    $team2Loose = 0;
    foreach ($matchScore as $round) {
        if ($round['SCORE_TEAM1'] - $round['SCORE_TEAM2'] < 0) {
            $team1Loose ++;
        } else {
            $team2Loose ++;
        }
    }
    $looseCount = $team1Loose - $team2Loose;
    $regexYoutube = "/http(?:s)?:\/\/(?:www\.)?youtube\.com\/([a-zA-Z0-9_]+)/";
    $regexTwitch = "/http(?:s)?:\/\/(?:www\.)?twitch\.tv\/([a-zA-Z0-9_]+)/";
    if (isValid($regexTwitch, $match['MATCH_LINK_VOD'])) {
        $vod = 'VOD Twitch';
        $vodClass = 'bgTwitch';
    } elseif (isValid($regexYoutube, $match['MATCH_LINK_VOD'])) {
        $vod = 'VOD Youtube';
        $vodClass = 'bgYoutube';
    } else {
        $vod = 'No VOD';
    }
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
    $match = $Comp->getMatchAllInfos($_GET['matchId']);
    $matchScore = $Comp->getMatchScore($_GET['matchId']);
    $success = 'Le match a été modifié avec succès !';
}

if (isset($_POST['submitTournament'])) {
    $verifUpload = uploadLogo($_FILES['logo']);
    if (empty($verifUpload)) {
        $logoEncode = base64_encode(file_get_contents($_FILES['logo']['tmp_name']));   
        $teams = implode(',', $_POST['teams']);
        $Comp->addTournament($_POST['name'], $logoEncode, $_POST['format'], $_POST['date'], $_POST['status'], $_POST['link'], $teams, $_SESSION['id']);
        $success = 'Le tournoi a été ajouté avec succès !';
    }

}

if (isset($_GET['tournament']) && $_GET['tournament'] == 'edit') {
    $tournament = $Comp->getTournament($_GET['tournamentId']);
}

if (isset($_POST['submitTournamentUpdate'])) {
    if (empty($_FILES['logo']['name'])) {
        $logoEncode = $_POST['tournamentOldLogo'];
    } else {
        $verifUpload = uploadLogo($_FILES['logo']);
        $logoEncode = base64_encode(file_get_contents($_FILES['logo']['tmp_name']));
    }
    if (empty($verifUpload)) {
        $teams = implode(',', $_POST['teams']);
        $Comp->updateTournament($_POST['tournamentId'], $_POST['name'], $logoEncode, $_POST['format'], $_POST['date'], $_POST['status'], $_POST['link'], $teams, $_SESSION['id']);
        $tournament = $Comp->getTournament($_GET['tournamentId']);
        $success = 'Le tournoi a été modifié avec succès !';
    }
}

function uploadLogo($img_file, $type = "image", $size = 1000000)
{
   /*  $img_file = $_FILES[$img_file] ?? false; # on "identifie" $img_file */
    $type = "/$type/"; # on prépare la regex
    $msgArray = []; # notre liste de messages
    
    if ($img_file && $img_file["error"] == 0) {
        if (!preg_match($type, mime_content_type($img_file["tmp_name"]))) { # si c'est pas une image
            $msgArray[] = "Votre fichier n'est pas une image";
        } elseif ($img_file["size"] > $size) { # si le fichier est plus grand que 1Mo
            $msgArray[] = "Le fichier doit faire moins de 1 Mo";
        }
    } else {
        $msgArray[] = "Veuillez séléctionner un fichier";
    }
    return $msgArray;
}



