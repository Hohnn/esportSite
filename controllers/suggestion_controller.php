<?php

if (!isset($_SESSION['id'])) {
    header('Location: ../views/login.php');
}

$title = htmlspecialchars($_POST['title'] ?? '');
$source = htmlspecialchars($_POST['source'] ?? '');
$desc = htmlspecialchars($_POST['desc'] ?? '');

$regexAll = "/./";
$regexUrl = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/";

if (isset($_POST['submit'])) { //si submit est dans le post
    $count = 0;
    if (!isValid($regexAll, $title)) { // si la regex n'est pas valide        
        $errorTitle = 'Champ Obligatoire'; // mettre un message
        $count++; // incrémente un conter d'erreur
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
        $News = new NewsModel();
        $userId = $_SESSION['id'];
        if ($News->setProposal($userId, $title, $source, $desc)) {
            $success = 'Votre suggestion a bien été envoyée';
            $color = 'bg-success';
        } else {
            $success = 'Une erreur est survenue';
            $color = 'bg-danger';
        }
    }
}


?>