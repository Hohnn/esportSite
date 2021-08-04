<?php

function isValid($pattern, $subject){ //vérifie la regex puis renvoi vrai ou faux
    if (preg_match($pattern, $subject)) {
        return true;
    } else {
        return false;
    }
}

$title = htmlspecialchars($_POST['title'] ?? '');
$date = htmlspecialchars($_POST['date'] ?? '');
$type = htmlspecialchars($_POST['type'] ?? '');
$author = htmlspecialchars($_POST['author'] ?? '');
$source = htmlspecialchars($_POST['source'] ?? '');
$desc = htmlspecialchars($_POST['desc'] ?? '');


$name = htmlspecialchars($_POST['name'] ?? 'Vide');
$firstname = htmlspecialchars($_POST['firstname'] ?? 'Vide');
$age = htmlspecialchars($_POST['age'] ?? 'Vide');
$zipCode = htmlspecialchars($_POST['zipCode'] ?? 'Vide');
$email = htmlspecialchars($_POST['email'] ?? 'Vide');
$nickname = htmlspecialchars($_POST['nickname'] ?? 'Vide');
$password = htmlspecialchars($_POST['password'] ?? 'Vide');
$confirm = htmlspecialchars($_POST['confirm'] ?? 'Vide');
$regexName = "/^[a-z ,.'-]+$/i";
$regexAge = "/^\d{1,2}$/";
$regexZipCode = "/^\d{5}$/";
$regexMail = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";
$regexPassword = "/^(?=.*?[A-Z])(?=.*?[a-z]).{5,}$/";
$regexNickname = "/^[^0-9]\w+$/";
$regexAll = "/./";
$regexUrl = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/";
$mailArray = ['julien@gmail.com', 'paul@gmail.com', 'habib@hotmail.fr'];

if (isset($_POST['submit'])) { //si submit est dans le post
    $count = 0;
    if (!isValid($regexAll, $title)) { // si la regex n'est pas valide        
        $errorTitle = 'Champ Obligatoire'; // mettre un message
        $count++; // incrémente un conter d'erreur
    }
    if (!isValid($regexAll, $date)) { 
        $errorDate = 'Ce champ est obligatoire'; 
        $count++;
    }
    if (!isValid($regexAll, $author)) { 
        $errorAuthor = 'Ce champ est obligatoire'; 
        $count++;
    }
    if (empty($source)) {
        $errorSource = 'Ce champ est obligatoire'; 
    } else if (!isValid($regexUrl, $source)) { 
        $errorSource = "Ce n'est pas un lien"; 
        $count++;
    }
    if (!isValid($regexAll, $desc)) { 
        $errorDesc = 'Ce champ est obligatoire'; 
        $count++;
    }

    if ($count == 0) { // le conteur est à 0
        /* header("Location: test.php"); // recharge la page */

    }
}

$pushToCookie = ['name', 'firstname', 'age', 'pseudo', 'zipCode', 'email'];

/* if (!empty($_POST)) {
    foreach ($pushToCookie as $key) {
        if (isset($_POST[$key])) {
            setcookie($key, $_POST[$key], time() + 24 * 60 * 60);
        }
    }
}

if (!empty($_COOKIE)) {
    $redirect = true;
    foreach ($pushToCookie as $cookieName) {
        if (!isset($_COOKIE[$cookieName])) {
            $redirect = false;
        }
    }
    if ($redirect) {
        header("Location: developpers.php"); // change de page avec le bonne url pour récupéré en GET
        exit(); // stop le script
    }
}
 */


?>