<?php

/* function isValid($pattern, $subject){ //vérifie la regex puis renvoi vrai ou faux
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
 */
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
$mailArray = ['julien@gmail.com', 'paul@gmail.com', 'habib@hotmail.fr'];

if (isset($_POST['submit'])) { //si submit est dans le post
    $count = 0;
   /*  if (!isValid($regexName, $name)) { // si la regex n'est pas valide
        $errorName = 'Nom incorrect, exemple : Macron'; // mettre un message
        $count++; // incrémente un conter d'erreur
        $className = 'is-invalid';
    }
    if (!isValid($regexName, $firstname)) {
        $errorFirstname = 'Prénom incorrect, exemple : Emmanuel';
        $count++;
        $classFirstname = 'is-invalid';
    }
    if (!isValid($regexAge, $age)) {
        $errorAge = 'Age incorrect, exemple : 25';
        $count++;
        $classAge = 'is-invalid';
    }
    if (!isValid($regexZipCode, $zipCode)) {
        $errorZipCode = 'Code postal incorrect, exemple : 50310';
        $count++;
        $classZipCode = 'is-invalid';
    } */



    /* if (!isValid($regexMail, $email)) {
        $errorMail = 'Mail incorrect, exemple : john@gmail.com';
        $count++;
        $classMail = 'is-invalid';
    } elseif (!mailExist($email, $mailArray)) {
        $errorMail = 'Ce mail est déja inscrit';
        $count++;
        $classMail = 'is-invalid';
    }
    if (!isValid($regexNickname, $nickname)) {
        $errorNickname = 'Pseudo incorrect, exemple : Tinz50';
        $count++;
        $classNickname = 'is-invalid';
    }
    if (!isValid($regexPassword, $password)) {
        $errorMdp = 'Minimum 5 caractère, 1 majuscule, 1 minuscule, 1 chiffre, ex : jhgkK25';
        $count++;
        $classMdp = 'is-invalid';
    }
    if (!isSame($password, $confirm)) {
        $errorPassword =  'Le mot de passe ne correspond pas';
        $count++;
        $classPassword = 'is-invalid';
    }
    if(empty($_POST["g-recaptcha-response"])){
        $errorCaptcha = 'Veuillez respondre à la question de securité';
        $count++;
    }
    if(!isset($_POST["cgu"])){
        $count++;
        $errorCgu = 'Veuillez accépter les CGU';
    } */
    /* if ($count == 0) { // le conteur est à 0
        header("Location: login.php"); // recharge la page
    } */
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