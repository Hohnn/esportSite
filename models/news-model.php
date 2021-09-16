<?php
class NewsModel extends database {

    public function setNews($userId, $imageName, $title, $subTitle, $type, $source) {
        $bdd = $this->connectDatabase();
        $condition = "INSERT INTO article (user_id, ARTICLE_IMAGE, ARTICLE_TITLE, ARTICLE_SUBTITLE, ARTICLE_TYPE, ARTICLE_LINK) VALUES (?, ?, ?, ?, ?, ?)";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $userId, PDO::PARAM_INT);
        $result->bindValue(2, $imageName, PDO::PARAM_STR);
        $result->bindValue(3, $title, PDO::PARAM_STR);
        $result->bindValue(4, $subTitle, PDO::PARAM_STR);
        $result->bindValue(5, $type, PDO::PARAM_STR);
        $result->bindValue(6, $source, PDO::PARAM_STR);
        $result->execute();
        return $result;
    }

    public function getAllNews(){
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM article ORDER BY ARTICLE_ID DESC LIMIT 3";
        $result = $bdd->query($condition);
        return $result->fetchAll();
    }

    public function getNewsById($newsId){
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM article WHERE ARTICLE_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $newsId, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public function updateNews($userId, $imageName, $title, $subTitle, $type, $source, $newsId){
        $bdd = $this->connectDatabase();
        $condition = "UPDATE article SET user_id = ?, ARTICLE_IMAGE = ?, ARTICLE_TITLE = ?, ARTICLE_SUBTITLE = ?, ARTICLE_TYPE = ?, ARTICLE_LINK = ? WHERE ARTICLE_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $userId, PDO::PARAM_INT);
        $result->bindValue(2, $imageName, PDO::PARAM_STR);
        $result->bindValue(3, $title, PDO::PARAM_STR);
        $result->bindValue(4, $subTitle, PDO::PARAM_STR);
        $result->bindValue(5, $type, PDO::PARAM_STR);
        $result->bindValue(6, $source, PDO::PARAM_STR);
        $result->bindValue(7, $newsId, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function deleteNews($newsId){
        $bdd = $this->connectDatabase();
        $condition = "DELETE FROM article WHERE ARTICLE_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $newsId, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }
}

