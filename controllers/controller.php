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
    if($user['STATUS_ROLE'] == 'administrateur' || $user['STATUS_ROLE'] == 'modérateur'){
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