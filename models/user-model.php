<?php 

class UserModel extends database {

    public function setUser($username, $mail, $password, $status, $avatar) {
        $bdd = $this->connectDatabase();
        $condition = "INSERT INTO user (user_username, user_mail, user_password, status_id, user_logo)
        VALUES (?, ?, ?, ?, ?)";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $username, PDO::PARAM_STR);
        $result->bindValue(2, $mail, PDO::PARAM_STR);
        $result->bindValue(3, $password, PDO::PARAM_STR);
        $result->bindValue(4, $status, PDO::PARAM_INT);
        $result->bindValue(5, $avatar, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function getAllUser() {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM user NATURAL JOIN `status` ";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }

    public function getUserById($id) {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM user NATURAL JOIN `status` WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public function getUserByMail($mail) {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM user NATURAL JOIN `status`  WHERE user_mail = ? ";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $mail, PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(); /* pas fetchAll pour pas avoir 2 array */
        return $fetch;
    }

    public function getUserByUsername($username) {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM user NATURAL JOIN `status` WHERE user_username = ? ";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $username, PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(); /* pas fetchAll pour pas avoir 2 array */
        return $fetch;
    }

    public function setUserOriginID($user, $origin) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET user_origin_id = ? WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $origin, PDO::PARAM_STR);
        $result->bindValue(2, $user, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function setUpdateUser($id, $username, $origin, $twitter, $youtube, $twitch) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET user_username = ?, user_origin_id = ?, user_twitter = ?, user_youtube = ?, user_twitch = ? WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $username, PDO::PARAM_STR);
        $result->bindValue(2, $origin, PDO::PARAM_STR);
        $result->bindValue(3, $twitter, PDO::PARAM_STR);
        $result->bindValue(4, $youtube, PDO::PARAM_STR);
        $result->bindValue(5, $twitch, PDO::PARAM_STR);
        $result->bindValue(6, $id, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function setUpdateUserLogo($id, $logoName) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET user_logo = ? WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $logoName, PDO::PARAM_STR);
        $result->bindValue(2, $id, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function setToken($id, $token) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET user_token = ? WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $token, PDO::PARAM_STR);
        $result->bindValue(2, $id, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function setUpdateUserPassword($token, $password) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET user_password = ? WHERE user_token = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $password, PDO::PARAM_STR);
        $result->bindValue(2, $token, PDO::PARAM_STR);
        $result->execute();
        //return true if succes
        if ($result->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function setUpdateUserStatus($id, $status) {

    }

    public function removeUserToken($token) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET user_token = NULL WHERE user_token = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $token, PDO::PARAM_STR);
        $result->execute();
        return $result;
    }
}