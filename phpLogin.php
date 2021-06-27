<?php
session_start();
$members = file_get_contents('./assets/json/members.json');
$membersList = json_decode($members)->members;

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    foreach($membersList as $member) {
        if ($login == $member->mail && password_verify($password, $member->password)) {
            $_SESSION['id'] = $member->id;
            $_SESSION['lastname'] = $member->nom;
            $_SESSION['firstname'] = $member->prenom;
            $_SESSION['nickname'] = $member->nickname;
            $_SESSION['mail'] = $member->mail;
            $_SESSION['age'] = $member->age;
            $_SESSION['image'] = $member->image;
            
        } else {
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        }
    }
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
}
?>