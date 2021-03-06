<?php 

class UserModel extends database {
    /**
     * set a new user
     *
     * @param string $username
     * @param string $mail
     * @param string $password
     * @param int $status
     * @param string $avatar
     * @return void
     */
    public function setUser($username, $mail, $password, $status, $avatar) {
        $bdd = $this->connectDatabase();
        $condition = "INSERT INTO user (user_username, user_mail, user_password, status_id, user_logo)
        VALUES (?, ?, ?, ?, ?)";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $username, PDO::PARAM_STR);
        $result->bindValue(2, $mail, PDO::PARAM_STR);
        $result->bindValue(3, $password, PDO::PARAM_STR);
        $result->bindValue(4, $status, PDO::PARAM_INT);
        $result->bindValue(5, $avatar, PDO::PARAM_STR);
        $result->execute();
        return $result;
    }

    public function getAllUser() {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM user NATURAL JOIN `status` ORDER BY user_id DESC";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }

    public function getAllUserMail() {
        $bdd = $this->connectDatabase();
        $condition = "SELECT user_mail FROM user";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }
    /**
     * get all user infos
     *
     * @param int $id
     * @return array
     */
    public function getUserById($id) {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM user NATURAL JOIN `status` WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public function getUserPassword($userId) {
        $bdd = $this->connectDatabase();
        $condition = "SELECT user_password FROM user WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $userId, PDO::PARAM_INT);
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

    public function getAllStatus() {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM status";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }

    public function setUpdateUserStatus($id, $status) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET status_id = ? WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $status, PDO::PARAM_INT);
        $result->bindValue(2, $id, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function updatePassword($password, $userId) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET user_password = ? WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $password, PDO::PARAM_STR);
        $result->bindValue(2, $userId, PDO::PARAM_INT);
        $result->execute();
        if ($result->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function removeUserToken($token) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET user_token = NULL WHERE user_token = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $token, PDO::PARAM_STR);
        $result->execute();
        return $result;
    }

    public function updateMail($newMail, $userId) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET user_mail = ? WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $newMail, PDO::PARAM_STR);
        $result->bindValue(2, $userId, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function setUserStats($userId, $stats) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE user SET stats = ? WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $stats);
        $result->bindValue(2, $userId, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function getUserStats($username) {
        $bdd = $this->connectDatabase();
        $condition = "SELECT stats FROM user WHERE user_username = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $username, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
    }

    public function deleteUser($userId) {
        $bdd = $this->connectDatabase();
        $condition = "DELETE FROM user WHERE user_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $userId, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }
}