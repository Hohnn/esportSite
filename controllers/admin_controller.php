<?php

$Comp = new CompModel();
$User = new UserModel();
$News = new NewsModel();

$allTeams = $Comp->getAllTeams();
$allMaps = $Comp->getAllMaps();
$allTournament = $Comp->getAllTournament();
$allMatches = $Comp->getAllMatches();
$allUsers = $User->getAllUser();

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

if (isset($_POST['submitTeam'])) {
    $verifUpload = uploadLogo($_FILES['logo']);
    if (empty($verifUpload)) {
        $logoEncode = base64_encode(file_get_contents($_FILES['logo']['tmp_name']));   
        $lastId = $Comp->setTeam($_POST['name'], $logoEncode, $_POST['country'], $_SESSION['id'], $_POST['tag']);
        $playerCount = $_POST['playerCount'];

        for ($i=1; $i <= $playerCount; $i++) { 
            if (!empty($_POST['playerName'.$i])) {
                $Comp->setPlayer($_POST['playerName'.$i], $lastId, $_POST['userId'.$i]);   
            } else {
                $userName = $User->getUserById($_POST['userId'.$i])['USER_USERNAME'];
                $Comp->setPlayer($userName, $lastId, $_POST['userId'.$i]);   
            }
        }

        $success = 'L\'équipe a été ajoutée avec succès !';
    }
}

if (isset($_GET['team']) || empty($_GET)) {
    if (isset($_GET['teamId'])) {
        $team = $Comp->getTeam($_GET['teamId']);
        $allPlayers = $Comp->getAllplayerByTeam($_GET['teamId']);
    }
    $country = json_decode(file_get_contents('../assets/json/country.json'));
}

$defaultLogoBase64 = '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';

if (isset($_POST['submitTeamUpdate'])) {
    if (empty($_FILES['logo']['name'])) {
        $logoEncode = $_POST['teamOldLogo'];
    } else {
        $verifUpload = uploadLogo($_FILES['logo']);
        $logoEncode = base64_encode(file_get_contents($_FILES['logo']['tmp_name']));
    }
    if (empty($verifUpload)) {
        $Comp->updateTeam($_POST['teamId'], $_POST['name'], $logoEncode, $_POST['country'], $_POST['tag'], $_SESSION['id']);
        $team = $Comp->getTeam($_GET['teamId']);
        $playerCount = $_POST['playerCount'];
        $Comp->deletePlayerByTeam($_GET['teamId']);

        for ($i=1; $i <= $playerCount; $i++) { 
            if (!isset($_POST['userId'.$i])) {
                continue;
            }
            if (!empty($_POST['playerName'.$i])) {
                $Comp->setPlayer($_POST['playerName'.$i], $_POST['teamId'], $_POST['userId'.$i]);   
            } else {
                $userName = $User->getUserById($_POST['userId'.$i])['USER_USERNAME'];
                $Comp->setPlayer($userName, $_POST['teamId'], $_POST['userId'.$i]);   
            }
        }

        $success = 'Le tournoi a été modifié avec succès !';
    }
}

// register new article
if (isset($_POST['submitNews'])) {
    $title = htmlspecialchars($_POST['title']);
    $subTitle = htmlspecialchars($_POST['subTitle']);
    $type = htmlspecialchars($_POST['type']);
    $source = htmlspecialchars($_POST['source']);
    $verifUpload = uploadLogo($_FILES['img'], 'image', 10000000);
    if (empty($verifUpload)) {
        $img_file = $_FILES['img'];
        $uid = uniqid();
        $uid = $_SESSION['user'] . $uid;
        $ext = pathinfo($img_file["name"])["extension"];
        if ($News->setNews($_SESSION['id'], "$uid.$ext", $title, $subTitle, $type, $source)) {
            move_uploaded_file($img_file["tmp_name"], "../assets/images/news_images/" . $uid . "." . $ext);
            $success = 'L\'article à bien été ajouté !';
            $color = 'bg-success';
        } else {
            $success = 'Une erreur est survenue !';
            $color = 'bg-danger';
        }
    } else {
        $errorUploadNews = $verifUpload[0];
    }
}

if (isset($_GET['news'])) {
    if (isset($_GET['newsId'])) {
        $singleNews = $News->getNewsById($_GET['newsId']);
    }
}

if (isset($_POST['submitNewsUpdate'])) {
    $title = htmlspecialchars($_POST['title']);
    $subTitle = htmlspecialchars($_POST['subTitle']);
    $type = htmlspecialchars($_POST['type']);
    $source = htmlspecialchars($_POST['source']);
    $newsId = htmlspecialchars($_POST['newsId']);
    $oldImage = $_POST['oldImage'];
    if (empty($_FILES['img']['name'])) {
        $imgEncode = $_POST['oldImage'];
    } else {
        $verifUpload = uploadLogo($_FILES['img'], 'image', 10000000);
        $img_file = $_FILES['img'];
        $uid = uniqid();
        $uid = $_SESSION['user'] . $uid;
        $ext = pathinfo($img_file["name"])["extension"];
        $imgEncode = "$uid.$ext";
        if (empty($verifUpload)) {
            move_uploaded_file($img_file["tmp_name"], "../assets/images/news_images/" . $uid . "." . $ext);
            $dir = scandir("../assets/images/news_images");
            if (in_array($oldImage, $dir)) {
                unlink("../assets/images/news_images/$oldImage");
            }
        }
    }
    if (empty($verifUpload)) {
        if ($News->updateNews($_SESSION['id'], $imgEncode, $title, $subTitle, $type, $source, $newsId)) {
            $success = 'L\'article à bien été modifié !';
            $color = 'bg-success';
            $singleNews = $News->getNewsById($_GET['newsId']);
        } else {
            $success = 'Une erreur est survenue !';
            $color = 'bg-danger';
        }
    } else {
        $errorUploadNews = $verifUpload[0];
    }
}
