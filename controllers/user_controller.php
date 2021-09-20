<?php

if ($User->getUserByUsername($_GET['nickname'])['USER_ORIGIN_ID']) {
    $user = $User->getUserByUsername($_GET['nickname'])['USER_ORIGIN_ID'];
    $showStats = '';
} else {
    $showInput = '';
}

$User = new UserModel();
$userStats = $User->getUserStats($_GET['nickname']);
$userStats = explode('|', $userStats[0]);

if (isset($_SESSION['user'])) {
    if ($_SESSION['user'] == $_GET['nickname']) {
        $showModif = true;
        $user = $User->getUserById($_SESSION['id']);
    }
    if (isset($_POST['submitNewMail']) && !empty($_POST['newMail'])) {
        $newMail = htmlspecialchars($_POST['newMail']);
        $password = htmlspecialchars($_POST['password']);
        $userPass = $User->getUserPassword($_SESSION['id'])[0];
        if (isValid($regexMail, $newMail)) {
            if (password_verify($password, $userPass)) {
                if ($User->updateMail($newMail, $_SESSION['id'])) {
                    $succes = 'Votre email a été modifié avec succès !';
                    $toastColor = 'bg-success';
                }
            }
            else {
                $errorPass = 'is-invalid';
                $succes = 'le mot de passe est incorrect';
                $toastColor = 'bg-danger';
            }
        } else {
            $errorMail = 'is-invalid';
            $succes = 'L\'email est invalide';
            $toastColor = 'bg-danger';
        }
    }
    if (isset($_POST['submitNewPassword']) && !empty($_POST['password'])) {
        $oldPassword = htmlspecialchars($_POST['oldPassword']);
        $password = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
        $userPass = $User->getUserPassword($_SESSION['id'])[0];
        if (isValid($regexPassword, $password)) {
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
        } else {
            $errorPass = 'is-invalid';
            $succes = 'le mot de passe est invalide';
            $toastColor = 'bg-danger';
        }
    }
}

$User = new UserModel();

if (isset($_POST['originId'])) {
    $originId = htmlspecialchars($_POST['originId']); 
    $User->setUserOriginID( $_SESSION['id'], $originId);
}
