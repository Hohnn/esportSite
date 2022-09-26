<?php

if(isset($_SESSION['user'])) {
    setcookie('user', $_SESSION['user'], time() + 3600, '/');
    setcookie('id', $_SESSION['id'], time() + 3600, '/'); 
}

if (isset($_COOKIE['user']) && !empty(isset($_COOKIE['user']))) {
    $_SESSION['user'] = $_COOKIE['user'];
    $_SESSION['id'] = $_COOKIE['id'];
}

$News = new NewsModel();
$allNews = $News->getAllNews();

if (isset($_POST['submitDeleteNews'])) {
    $newsId = htmlspecialchars($_POST['newsId']);
    $singleNews = $News->getNewsById($newsId)['ARTICLE_IMAGE'];
    if ($News->deleteNews($newsId)) {
        $dir = scandir("assets/images/news_images");
        if (in_array($singleNews, $dir)) {
            unlink("assets/images/news_images/$singleNews");
        }
        $allNews = $News->getAllNews();
        $success = 'L\'article à bien été supprimé !';
        $color = 'bg-success';
    } else {
        $success = 'Une erreur est survenue !';
        $color = 'bg-danger';
    }
}
