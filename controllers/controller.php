<?php 
require './controllers/database.php';
require './models/user-model.php';

$User = new UserModel();

if (isset($_POST['submitSignin'])) {
    $username = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $User->setUser($username, $email, $password, 1);
    
    $_SESSION['user'] = $username;
    header('Location: ../index.php');
}

if (isset($_POST['submitLogin'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $user = $User->getUserByMail($mail);
    var_dump($user);
    if ($user) {
        if (password_verify($password, $user['USER_PASSWORD'])) {
            $_SESSION['user'] = $user['USER_USERNAME'] ;
            header('Location: ../index.php');
        } else {
            $errorPass = 'Ce mot de passe n’est pas correct.';
        }
    } else {
        $errorLog = 'Mauvaise adresse mail';
    }
}

?>