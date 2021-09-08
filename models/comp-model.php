<?php

class CompModel extends database
{

    public function setTeam($name, $logo, $country, $user_id, $shortname)
    {
        $bdd = $this->connectDatabase();
        $condition = "INSERT INTO teams (team_name, team_logo, team_country, user_id, team_shortname) VALUES (?, ?, ?, ?, ?)";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $name, PDO::PARAM_STR);
        $result->bindValue(2, $logo, PDO::PARAM_STR);
        $result->bindValue(3, $country, PDO::PARAM_STR);
        $result->bindValue(4, $user_id, PDO::PARAM_INT);
        $result->bindValue(5, $shortname, PDO::PARAM_STR);
        $result->execute();
        return $result;
    }

    public function getTeam($id)
    {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM teams WHERE team_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public function getAllTeams()
    {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM teams";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }

    public function getMap($id)
    {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM maps WHERE maps_id = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public function getAllMaps()
    {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM maps";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }

    public function getAllMatches(): array
    {
        $bdd = $this->connectDatabase();
        $condition = "SELECT A.MATCH_ID, B.TEAM_SHORTNAME as TEAM1, B.TEAM_LOGO as TEAM1_LOGO, C.TEAM_SHORTNAME as TEAM2, C.TEAM_LOGO as TEAM2_LOGO, T.TOURNAMENT_NAME, DATE_FORMAT(A.MATCH_DATE, '%d %M') as MATCH_DATE, A.MATCH_LINK_VOD
        FROM esport.matches as A
        left join teams as B on A.TEAM1_ID = B.TEAM_ID
        left join teams as C on A.TEAM2_ID = C.TEAM_ID
        left join tournament as T on A.TOURNAMENT_ID = T.TOURNAMENT_ID
        ORDER BY MATCH_ID DESC;";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }

    public function getMatchAllInfos($id): array
    {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM esport.matches as A
        left join teams as B on A.TEAM1_ID = B.TEAM_ID
        left join teams as C on A.TEAM2_ID = C.TEAM_ID
        left join tournament as T on A.TOURNAMENT_ID = T.TOURNAMENT_ID
        WHERE MATCH_ID = ? ;";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public function getMatchScore($id) {
        $bdd = $this->connectDatabase();
        $condition = "SELECT S.MATCH_ID, S.SCORE_TEAM1, S.SCORE_TEAM2, M.MAPS_NAME, M.MAPS_ID, SCORE_ID
        FROM esport.matches_score as S
        left join maps as M on S.MAPS_ID = M.MAPS_ID
        where S.MATCH_ID = ? ;";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchAll();
    }

    public function addMatch($team1, $team2, $date, $link, $tournament, $id)
    {
        $bdd = $this->connectDatabase();
        $condition = "INSERT INTO matches (TEAM1_ID, TEAM2_ID, MATCH_DATE, MATCH_LINK_VOD, TOURNAMENT_ID, USER_ID) VALUES (?, ?, ?, ?, ?, ?)";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $team1, PDO::PARAM_INT);
        $result->bindValue(2, $team2, PDO::PARAM_INT);
        $result->bindValue(3, $date, PDO::PARAM_STR);
        $result->bindValue(4, $link, PDO::PARAM_STR);
        $result->bindValue(5, $tournament, PDO::PARAM_INT);
        $result->bindValue(6, $id, PDO::PARAM_INT);
        $result->execute();
        return $bdd->lastInsertId();
    }

    public function addMatchScore($team1, $team2, $map, $match_id): void
    {
        $bdd = $this->connectDatabase();
        $condition = "INSERT INTO matches_score (SCORE_TEAM1, SCORE_TEAM2, MAPS_ID, MATCH_ID) VALUES (?, ?, ?, ?)";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $team1, PDO::PARAM_INT);
        $result->bindValue(2, $team2, PDO::PARAM_INT);
        $result->bindValue(3, $map, PDO::PARAM_INT);
        $result->bindValue(4, $match_id, PDO::PARAM_INT);
        $result->execute();
    }

    public function getAllTournament() {
        $bdd = $this->connectDatabase();
        $condition = "SELECT *, DATE_FORMAT(TOURNAMENT_START, '%d/%m/%Y') as date FROM tournament order by tournament_id desc";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }

    public function updateMatch($matchId, $team1, $team2, $date, $link, $tournament, $userId) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE matches SET TEAM1_ID = ?, TEAM2_ID = ?, MATCH_DATE = ?, MATCH_LINK_VOD = ?, TOURNAMENT_ID = ?, USER_ID = ? WHERE MATCH_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $team1, PDO::PARAM_INT);
        $result->bindValue(2, $team2, PDO::PARAM_INT);
        $result->bindValue(3, $date, PDO::PARAM_STR);
        $result->bindValue(4, $link, PDO::PARAM_STR);
        $result->bindValue(5, $tournament, PDO::PARAM_INT);
        $result->bindValue(6, $userId, PDO::PARAM_INT);
        $result->bindValue(7, $matchId, PDO::PARAM_INT);
        $result->execute();
    }

    public function updateMatchScore($team1, $team2, $map, $score_id): void
    {
        $bdd = $this->connectDatabase();
        
        $condition = "UPDATE matches_score SET SCORE_TEAM1 = ?, SCORE_TEAM2 = ?, MAPS_ID = ? WHERE SCORE_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $team1, PDO::PARAM_INT);
        $result->bindValue(2, $team2, PDO::PARAM_INT);
        $result->bindValue(3, $map, PDO::PARAM_INT);
        $result->bindValue(4, $score_id, PDO::PARAM_INT);
        $result->execute();
    }

    public function deleteMatchScore($scoreId) {
        $bdd = $this->connectDatabase();
        $condition = "DELETE FROM matches_score WHERE SCORE_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $scoreId, PDO::PARAM_INT);
        $result->execute();
    }

    public function deleteMatch($matchId) {
        $bdd = $this->connectDatabase();
        $condition = "DELETE FROM matches WHERE MATCH_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $matchId, PDO::PARAM_INT);
        $result->execute();
    }

    public function deleteScore($matchId) {
        $bdd = $this->connectDatabase();
        $condition = "DELETE FROM matches_score WHERE MATCH_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $matchId, PDO::PARAM_INT);
        $result->execute();
    }

    public function addTournament( $name, $logo, $format, $start, $status, $link, $teamId, $userId) {
        $bdd = $this->connectDatabase();
        $condition = "INSERT INTO tournament (TOURNAMENT_NAME, TOURNAMENT_LOGO, TOURNAMENT_FORMAT, TOURNAMENT_START, TOURNAMENT_STATUS, TOURNAMENT_LINK, TEAM_ID, USER_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $name, PDO::PARAM_STR);
        $result->bindValue(2, $logo, PDO::PARAM_STR);
        $result->bindValue(3, $format, PDO::PARAM_STR);
        $result->bindValue(4, $start, PDO::PARAM_STR);
        $result->bindValue(5, $status, PDO::PARAM_STR);
        $result->bindValue(6, $link, PDO::PARAM_STR);
        $result->bindValue(7, $teamId, PDO::PARAM_STR);
        $result->bindValue(8, $userId, PDO::PARAM_INT);
        $result->execute();
    }

    public function getTournament($id) {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM tournament WHERE TOURNAMENT_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }

    public function updateTournament($id, $name, $logo, $format, $start, $status, $link, $teamId, $userId) {
        $bdd = $this->connectDatabase();
        $condition = "UPDATE tournament SET TOURNAMENT_NAME = ?, TOURNAMENT_LOGO = ?, TOURNAMENT_FORMAT = ?, TOURNAMENT_START = ?, TOURNAMENT_STATUS = ?, TOURNAMENT_LINK = ?, TEAM_ID = ?, USER_ID = ? WHERE TOURNAMENT_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $name, PDO::PARAM_STR);
        $result->bindValue(2, $logo, PDO::PARAM_STR);
        $result->bindValue(3, $format, PDO::PARAM_STR);
        $result->bindValue(4, $start, PDO::PARAM_STR);
        $result->bindValue(5, $status, PDO::PARAM_STR);
        $result->bindValue(6, $link, PDO::PARAM_STR);
        $result->bindValue(7, $teamId, PDO::PARAM_STR);
        $result->bindValue(8, $userId, PDO::PARAM_INT);
        $result->bindValue(9, $id, PDO::PARAM_INT);
        $result->execute();
    }

    public function deleteTournament($id) {
        $bdd = $this->connectDatabase();
        $condition = "DELETE FROM tournament WHERE TOURNAMENT_ID = ?";
        $result = $bdd->prepare($condition);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        $result->execute();
    }


}
