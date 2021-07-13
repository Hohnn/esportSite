<?php
session_start();
$members = file_get_contents('./assets/json/members.json');
$membersList = json_decode($members)->members;

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    foreach($membersList as $member) {
        if ($login == $member->mail) {
            if (password_verify($password, $member->password)) {
                $_SESSION['id'] = $member->id;
                $_SESSION['lastname'] = $member->nom;
                $_SESSION['firstname'] = $member->prenom;
                $_SESSION['nickname'] = $member->nickname;
                $_SESSION['mail'] = $member->mail;
                $_SESSION['age'] = $member->age;
                $_SESSION['image'] = $member->image;
                $_SESSION['role'] = $member->role;
                header('location: index.php');
            } else {
                $errorPass = 'Ce mot de passe n’est pas correct. Veuillez réessayer.';
            }
        } else {
            $errorLog = 'Nous n’avons pas trouvé de compte avec cette adresse électronique.';
        }
    }
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
}
?>
  