<?php

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
