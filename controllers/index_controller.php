<?php

$News = new NewsModel();
$allNews = $News->getAllNews();

if (isset($_POST['submitDeleteNews'])) {
    $newsId = htmlspecialchars($_POST['newsId']);
    if ($News->deleteNews($newsId)) {
        $allNews = $News->getAllNews();
        $success = 'L\'article à bien été supprimé !';
        $color = 'bg-success';
    } else {
        $success = 'Une erreur est survenue !';
        $color = 'bg-danger';
    }
}