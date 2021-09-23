<?php
if(!isset($_SESSION['user'])) {
    header('Location: ../index.php');
}

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

/**
 * Verify image upload
 *
 * @param array $img_file
 * @param string $type
 * @param integer $size
 * @return string error message
 */
function uploadLogo($img_file, $type = "image", $size = 1000000)
{
    $type = "/$type/"; // prepare regex
    $msgArray = []; // array to store error messages
    
    if ($img_file && $img_file["error"] == 0) { // check if file is uploaded
        if (!preg_match($type, mime_content_type($img_file["tmp_name"]))) { // if file type is not image
            $msgArray[] = "Votre fichier n'est pas une image";
        } elseif ($img_file["size"] > $size) { // if file size is too big
            $msgArray[] = "Le fichier doit faire moins de 1 Mo";
        }
    } elseif ($img_file["error"] == 4) { // if no file is uploaded
        $msgArray[] = "Veuillez séléctionner un fichier";
    } else {
        $msgArray[] = "Veuillez séléctionner un fichier moins volumineux";
    }
    return $msgArray;
}

if (isset($_POST['submitTeam'])) { // if submit button is clicked
    $verifUpload = uploadLogo($_FILES['logo']); // verify image upload
    $name = htmlspecialchars($_POST['name']); // prepare name
    $tag = htmlspecialchars($_POST['tag']); // prepare tag
    $count = 0; // count number of errors
    if (!isValid($regexText, $name)) { // if name is not valid
        $errorTeamName = 'Champ obligatoire';
        $count++;
    }
    if (!isValid($regexText, $tag)) {  // if tag is not valid
        $errorTeamTag = 'Champ obligatoire';
        $count++;
    }
    if (empty($verifUpload) && $count == 0) { // if no error
        $logoEncode = base64_encode(file_get_contents($_FILES['logo']['tmp_name'])); // encode image   
        $lastId = $Comp->setTeam($_POST['name'], $logoEncode, $_POST['country'], $_SESSION['id'], $_POST['tag']); // add team
        $playerCount = $_POST['playerCount']; // get number of players

        for ($i=1; $i <= $playerCount; $i++) { // for each player
            if (!empty($_POST['playerName'.$i])) { // if player name is not empty 
                $player = htmlspecialchars($_POST['playerName'.$i]); // get player name                                         
                $Comp->setPlayer($player, $lastId, $_POST['userId'.$i]); // add player   
            } else { // if player name is empty, a user is selected
                $userName = $User->getUserById($_POST['userId'.$i])['USER_USERNAME']; // get user name
                $Comp->setPlayer($userName, $lastId, $_POST['userId'.$i]); // add player  
            }
        }
        $success = 'L\'équipe a été ajoutée avec succès !'; // success message
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

if (isset($_POST['submitTeamUpdate'])) { // if the form has been submitted
    $name = htmlspecialchars($_POST['name']); // sanitize the input field
    $tag = htmlspecialchars($_POST['tag']); // sanitize the input field
    $count = 0; // initialize the counter
    if (!isValid($regexText, $name)) { // if the input field is not valid
        $errorTeamName = 'Champ obligatoire';
        $count++;
    }
    if (!isValid($regexText, $tag)) { // if the input field is not valid
        $errorTeamTag = 'Champ obligatoire';
        $count++;
    }
    if (empty($_FILES['logo']['name'])) { // if the input field is empty
        $logoEncode = $_POST['teamOldLogo']; // get the old logo
    } else {
        $verifUpload = uploadLogo($_FILES['logo']); // verify the upload of the file
        $logoEncode = base64_encode(file_get_contents($_FILES['logo']['tmp_name'])); // encode the file
    }
    if ($count == 0 && empty($verifUpload)) { // if the input field is valid and the file is valid
        $Comp->updateTeam($_POST['teamId'], $name, $logoEncode, $_POST['country'], $tag, $_SESSION['id']); // update the team
        $team = $Comp->getTeam($_POST['teamId']); // get the team to display it
        $playerCount = $_POST['playerCount']; // get the number of players
        $Comp->deletePlayerByTeam($_POST['teamId']); // delete all the players of the team
        for ($i=1; $i <= $playerCount; $i++) { // for each player
            if (!isset($_POST['userId'.$i])) { // if the player has been deleted
                continue;
            }
            if (!empty($_POST['playerName'.$i])) { // if the player has a name
                $player = htmlspecialchars($_POST['playerName'.$i]); // get player name
                $Comp->setPlayer($player, $_POST['teamId'], $_POST['userId'.$i]); // set the player  
            } else {
                $userName = $User->getUserById($_POST['userId'.$i])['USER_USERNAME']; // get the player name
                $Comp->setPlayer($userName, $_POST['teamId'], $_POST['userId'.$i]);  // set the player  
            }
        }
        $success = 'Le tournoi a été modifié avec succès !'; // display a success message
    }
}

// register new article
if (isset($_POST['submitNews'])) {
    $title = htmlspecialchars($_POST['title']);
    $subTitle = htmlspecialchars($_POST['subTitle']);
    $type = htmlspecialchars($_POST['type']);
    $source = htmlspecialchars($_POST['source']);
    $verifUpload = uploadLogo($_FILES['img'], 'image', 10000000);
    $count = 0;

    if (!isValid($regexText, $title)) {
        $errorTitle = 'Champ obligatoire';
        $count++;
    }
    if (!isValid($regexText, $subTitle)) {
        $errorSubTitle = 'Champ obligatoire';
        $count++;
    }
    if (!isValid($regexUrl, $source)) {
        $errorSource = 'Lien invalide';
        $count++;
    }
        if (empty($verifUpload)) {
            $img_file = $_FILES['img'];
            $uid = uniqid();
            $uid = $_SESSION['user'] . $uid;
            $ext = pathinfo($img_file["name"])["extension"];
            if ($count == 0 && $News->setNews($_SESSION['id'], "$uid.$ext", $title, $subTitle, $type, $source)) {
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
    $count = 0;

    if (!isValid($regexText, $title)) {
        $errorTitle = 'Champ obligatoire';
        $count++;
    }
    if (!isValid($regexText, $subTitle)) {
        $errorSubTitle = 'Champ obligatoire';
        $count++;
    }
    if (!isValid($regexUrl, $source)) {
        $errorSource = 'Lien invalide';
        $count++;
    }
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
    if ($count == 0 && empty($verifUpload)) {
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

if (isset($_GET['user'])) {
    $allStatus = $User->getAllStatus();
}

if (isset($_POST['updateRole'])) {
    $userId = htmlspecialchars($_POST['userId']);
    $author = $User->getUserById($_SESSION['id']);
    if ($author['STATUS_ID'] > $_POST['updateRole'] && $author['USER_ID'] != $userId) {
        if ($User->setUpdateUserStatus($userId, $_POST['updateRole'])) {
            $allUsers = $User->getAllUser();
            $success = 'Le rôle a bien été modifié !';
            $color = 'bg-success';
        } else {
            $success = 'Une erreur est survenue !';
            $color = 'bg-danger';
        }
    } else {
        $success = 'Vous ne disposer pas des droits nécessaire !';
        $color = 'bg-danger';
    }
}

if (isset($_POST['submitDeleteUser'])) {
    $userId = htmlspecialchars($_POST['userId']);
    if ($User->deleteUser($userId)) {
        $allUsers = $User->getAllUser();
        $success = 'L\'utilisateur a bien été supprimé !';
        $color = 'bg-success';
    } else {
        $success = 'Une erreur est survenue !';
        $color = 'bg-danger';
    }
}