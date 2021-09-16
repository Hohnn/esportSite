<?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['user'] == $_GET['nickname']) {
        $showModif = true;
        $user = $User->getUserById($_SESSION['id']);
    }
    if (isset($_POST['submitNewMail']) && !empty($_POST['newMail'])) {
        $newMail = $_POST['newMail'];
        $password = $_POST['password'];
        $userPass = $User->getUserPassword($_SESSION['id'])[0];
        if (password_verify($password, $userPass)) {
            if ($User->updateMail($newMail, $_SESSION['id'])) {
                $succes = 'Votre email a été modifié avec succès !';
                $toastColor = 'bg-success';
            }
        }
        else {
            $error = 'is-invalid';
            $succes = 'le mot de passe est incorrect';
            $toastColor = 'bg-danger';
        }
    }
    if (isset($_POST['submitNewPassword']) && !empty($_POST['password'])) {
        $oldPassword = $_POST['oldPassword'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $userPass = $User->getUserPassword($_SESSION['id'])[0];
        if (password_verify($oldPassword, $userPass)) {
            if (isSame($password, $confirmPassword)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                if ($User->updatePassword($password, $_SESSION['id'])) {
                    $succes = 'Votre mot de passe a été modifié avec succès !';
                    $toastColor = 'bg-success';
                } else {
                    $succes = 'Une erreur est survenu lors de l\'enregistrement!';
                    $toastColor = 'bg-danget';
                }           
            } else {
                $errorConf = 'is-invalid';
                $succes = 'le mot de passe et sa confirmation ne sont pas identiques';
                $toastColor = 'bg-danger';
            }
        } else {
            $errorOld = 'is-invalid';
            $succes = 'l\'ancien mot de passe est incorrect';
            $toastColor = 'bg-danger';
        }
    }
}
