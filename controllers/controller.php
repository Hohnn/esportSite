<?php 
require_once __DIR__.'/database.php';
require_once __DIR__.'/../models/user-model.php';
require_once __DIR__.'/upload_controller.php';
require_once __DIR__.'/login_controller.php';

if(!isset($_SESSION)) {
    session_start();
}

$User = new UserModel();

if (isset($_POST['submitSignin'])) {
    $username = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //random number for avatar
    $avatar = rand(1, 5);
    $user = $User->setUser($username, $email, $password, 1, $avatar);
    
    $_SESSION['user'] = $username;
    header('Location: ../index.php');
}

if (isset($_POST['submitLogin'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $user = $User->getUserByMail($mail);
    if ($user) {
        if (password_verify($password, $user['USER_PASSWORD'])) {
            $_SESSION['user'] = $user['USER_USERNAME'];
            $_SESSION['id'] = $user['USER_ID'];
            header('Location: ../index.php');
        } else {
            $errorPass = 'Ce mot de passe n’est pas correct.';
        }
    } else {
        $errorLog = 'Mauvaise adresse mail';
    }
}

if (isset($_POST['originId'])) {
    $User->setUserOriginID( $_SESSION['id'], $_POST['originId']);
}

$regexNickname = "/^[^0-9]\w+$/";
$regexTwitter = "/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/";
$regexYoutube = "/http(?:s)?:\/\/(?:www\.)?youtube\.com\/([a-zA-Z0-9_]+)/";
$regexTwitch = "/http(?:s)?:\/\/(?:www\.)?twitch\.tv\/([a-zA-Z0-9_]+)/";
/* function isValid($pattern, $subject){ //vérifie la regex puis renvoi vrai ou faux
    if (preg_match($pattern, $subject)) {
        return true;
    } else {
        return false;
    }
} */

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

/* $test = file_get_contents("https://battlefieldtracker.com/bfv/profile/origin/hohnn/overview");
var_dump($test); */
?> 