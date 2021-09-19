<?php
$User = new UserModel();
$email = htmlspecialchars($_POST['email'] ?? 'Vide');
$username = htmlspecialchars($_POST['nickname'] ?? 'Vide');
$password = htmlspecialchars($_POST['password'] ?? 'Vide');
$confirm = htmlspecialchars($_POST['confirm'] ?? 'Vide');
$regexZipCode = "/^\d{5}$/";
$regexMail = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";
$regexPassword = "/^(?=.*?[A-Z])(?=.*?[a-z]).{5,}$/";
$regexNickname = "/^[^0-9]\w+$/";
$mailArray = $User->getAllUserMail();
$mailArray2 = [];
foreach ($mailArray as $mail) {
    array_push($mailArray2, $mail[0]);
}
//verify regex
if (isset($_POST['submitSignin'])) {
    $count = 0;

    if (!isValid($regexMail, $email)) {
        $errorMail = 'Mail incorrect';
        $count++;
        $classMail = 'is-invalid';
    }
    if (!mailExist($email, $mailArray2)) {
        $errorMail = 'Ce mail est déja inscrit';
        $count++;
        $classMail = 'is-invalid';
    }
    if (!isValid($regexNickname, $username)) {
        $errorNickname = 'Pseudo incorrect';
        $count++;
        $classNickname = 'is-invalid';
    }
    if (!isValid($regexPassword, $password)) {
        $errorMdp = 'Minimum 5 caractère, 1 majuscule, 1 minuscule, 1 chiffre';
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
    }
    if ($count == 0) { // le conteur est à 0
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        //random number for avatar
        $avatar = rand(1, 5);
        $avatar = "default/default_".$avatar.".png";
        $user = $User->setUser($username, $email, $passHash, 1, $avatar);
        $_SESSION['user'] = $username;
        $user = $User->getUserByMail($email);
        $_SESSION['id'] = $user['USER_ID'];
        header('Location: ../index.php');
    }
}

/* if (isset($_POST['submitSignin'])) {
    $username = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passHash = password_hash($password, PASSWORD_DEFAULT);
    //random number for avatar
    $avatar = rand(1, 5);
    $avatar = "default_".$avatar.".png";
    $user = $User->setUser($username, $email, $passHash, 1, $avatar);
    $_SESSION['user'] = $username;
    $user = $User->getUserByMail($email);
    $_SESSION['id'] = $user['USER_ID'];
    header('Location: ../index.php');
} */


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