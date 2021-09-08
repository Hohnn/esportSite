<?php
require_once __DIR__.'/database.php';
require_once __DIR__.'/../models/comp-model.php';

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