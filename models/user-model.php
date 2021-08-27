<?php 
class Appointments extends database {

    public function setRdv ($datehour, $idPatient){
        $bdd = $this->connectDatabase();
        $condition = "INSERT INTO appointments (datehour, idPatients)
        VALUES (?, ?)";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $datehour, PDO::PARAM_STR);
        $result->bindValue(2, $idPatient, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function getRdv (){
        $bdd = $this->connectDatabase();
        $condition = "SELECT  `appointments`.`id`, `idPatients`, `firstname`, `lastname`, DATE_FORMAT(`datehour`, '%d/%m/%Y %H:%i') as datehour FROM appointments
        inner join patients on patients.id = appointments.idPatients order by datehour";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }

    public function deleteRdv ($id){
        $bdd = $this->connectDatabase();
        $condition = "DELETE FROM appointments WHERE id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
    }

    public function getRdvInfo($id){
        $condition = "SELECT  `appointments`.`id`, `idPatients`, `firstname`, `lastname`, `datehour` FROM appointments
        inner join patients on patients.id = appointments.idPatients WHERE appointments.id = ?";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
        $fetch = $result->fetch(); /* pas fetchAll pour pas avoir 2 array */
        return $fetch;
    }

    public function updateRdv($id, $datehour, $idPatients){
        $condition = "UPDATE appointments SET datehour = ?, idPatients = ? WHERE id = ?";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $datehour, PDO::PARAM_STR);
        $result->bindValue(2, $idPatients, PDO::PARAM_INT);
        $result->bindValue(3, $id, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public function getRdvByPatient($idPatient){
        $condition = "SELECT  `appointments`.`id`, `idPatients`, `firstname`, `lastname`, DATE_FORMAT(`datehour`, '%d/%m/%Y %h:%i') as datehour FROM appointments
        inner join patients on patients.id = appointments.idPatients WHERE appointments.idPatients = ? order by datehour";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $idPatient, PDO::PARAM_INT);
        $result->execute();
        $fetch = $result->fetchAll();
        return $fetch;
    }

    public function checkSameRdv($datehour){
        $condition = "SELECT * FROM appointments
        where dateHour = ' ? '";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $datehour, PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(); /* pas fetchAll pour pas avoir 2 array */
        return $fetch;
    }


    public function deletePatientRdv($idPatient){
        $condition = "DELETE FROM appointments WHERE idPatients = ? ";
        $bdd = $this->connectDatabase();
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $idPatient, PDO::PARAM_INT);
        $result->execute();
    }


}

class UserModel extends database {

    public function setUser($username, $mail, $password, $status, $avatar) {
        $bdd = $this->connectDatabase();
        $condition = "INSERT INTO user (user_username, user_mail, user_password, status_id, defaultlogo_id)
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
        $condition = "SELECT * FROM user NATURAL JOIN `status` NATURAL JOIN `defaultlogo` WHERE user_mail = ? ";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $mail, PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(); /* pas fetchAll pour pas avoir 2 array */
        return $fetch;
    }

    public function getUserByUsername($username) {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM user NATURAL JOIN `status` NATURAL JOIN `defaultlogo` WHERE user_username = ? ";
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
}