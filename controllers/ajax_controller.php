<?php
require_once __DIR__.'/database.php';
require_once __DIR__.'/../models/comp-model.php';
require_once __DIR__.'/../models/user-model.php';

if (isset($_GET['teamId'])) {
    $team = new CompModel();
    $result = $team->getTeam($_GET['teamId']);
    echo json_encode($result);
}
if (isset($_GET['mapId'])) {
    $team = new CompModel();
    $result = $team->getMap($_GET['mapId']);
    echo json_encode($result);
}
if (isset($_GET['userId'])) {
    $User = new UserModel();
    $result = $User->getUserById($_GET['userId']);
    echo json_encode($result);
}
if (isset($_GET['playerTeam'])) {
    $team = new CompModel();
    $result = $team->getAllplayerByTeam($_GET['playerTeam']);
    echo json_encode($result);
}