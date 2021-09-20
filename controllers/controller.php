<?php 
require_once __DIR__.'/database.php';
require_once __DIR__.'/../models/user-model.php';
require_once __DIR__.'/../models/comp-model.php';
require_once __DIR__.'/../models/news-model.php';
require_once __DIR__.'/upload_controller.php';
require_once __DIR__.'/login_controller.php';
require_once __DIR__.'/signin_controller.php';

$access = 'd-none';
if(isset($_SESSION['user'])) {
    $user = $User->getUserByUsername($_SESSION['user']);
    if($user['STATUS_ROLE'] == 'administrateur'){
        $access = '';
    }
}


if(!isset($_SESSION)) {
    session_start();
}

$regexMail = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";
$regexPassword = "/^(?=.*?[A-Z])(?=.*?[a-z]).{5,}$/";
$regexNickname = "/^[^0-9]\w+$/";
$regexText = "/./";
$regexUrl = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/";

function isValid($pattern, $subject){ //vérifie la regex puis renvoi vrai ou faux
    if (preg_match($pattern, $subject)) {
        return true;
    } else {
        return false;
    }
}

function mailExist($element, $array){ //compart le mail avec les mails existant et renvoi vrai si elle n'est pas trouvé
    if (in_array($element, $array)) {
        return false;
    } else {
        return true;
    }
}

function isSame($value1, $value2){ //compart si les mdp sont identique
    if ($value1 == $value2) {
        return true;
    }
}

$User = new UserModel();


$regexNickname = "/^[^0-9]\w+$/";
$regexTwitter = "/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/";
$regexYoutube = "/http(?:s)?:\/\/(?:www\.)?youtube\.com\/([a-zA-Z0-9_]+)/";
$regexTwitch = "/http(?:s)?:\/\/(?:www\.)?twitch\.tv\/([a-zA-Z0-9_]+)/";

if (isset($_POST['submitEdit'])) {
    $username = htmlspecialchars($_POST['username'] ?? '');
    $originId = htmlspecialchars($_POST['originId'] ?? '');
    $twitter = htmlspecialchars($_POST['twitter'] ?? '');
    $youtube = htmlspecialchars($_POST['youtube'] ?? '');
    $twitch = htmlspecialchars($_POST['twitch'] ?? '');
    $count = 0;
    if (!isValid($regexNickname, $username)) {
        $count++;
        $classUsername = 'is-invalid';
        $errorUsername = 'Ce pseudo n’est pas valide.'; 
    }
    if ($originId) {
        if (!isValid($regexNickname, $originId)) {
            $count++;
            $classOriginId = 'is-invalid';
            $errorOriginId = 'Ce pseudo n’est pas valide.'; 
        }
    }
    if ($twitter) {
        if (!isValid($regexTwitter, $twitter)) {
            $count++;
            $classTwitter = 'is-invalid';
            $errorTwitter = 'Ce lien n’est pas valide.';
        }
    }
    if ($youtube) {
        if (!isValid($regexYoutube, $youtube)) {
            $count++;
            $classYoutube = 'is-invalid';
            $errorYoutube = 'Ce lien n’est pas valide.';

        }
    }
    if ($twitch) {
        if (!isValid($regexTwitch, $twitch)) {
            $count++;
            $classTwitch = 'is-invalid';
            $errorTwitch = 'Ce lien n’est pas valide.';
        }
    }

    if ($count == 0) {
        $User->setUpdateUser($_SESSION['id'], $username, $originId, $twitter, $youtube, $twitch);
        $uploaded = upload("logo");
        var_dump($uploaded);
        if (empty($uploaded)) {
            $goodUpload = true;
        } else {
            $goodUpload = false;
        }
    } else {
        $goodUpload = false;
    }
        

}

function displayLogError($errorLog) {
    if (count($errorLog) > 0) {
        echo '<div class="alert alert-danger">';
        foreach ($errorLog as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}


?> 