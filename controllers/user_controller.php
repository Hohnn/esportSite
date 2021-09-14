<?php

if (isset($_POST['submitNewMail'])) {
    $newMail = $_POST['newMail'];
    $password = $_POST['password'];
    $User = new UserModel();
    $userPass = $User->getUserPassword($_SESSION['userId']);
    if (password_verify($password, $userPass)) {
        $User->updateMail($newMail, $_SESSION['userId']);
    }
}