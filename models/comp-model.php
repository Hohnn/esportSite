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

    public function getAllMaps()
    {
        $bdd = $this->connectDatabase();
        $condition = "SELECT * FROM maps";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
    }

    public function getMatches(): array
    {
        $bdd = $this->connectDatabase();
        $condition = "SELECT B.TEAM_NAME, C.TEAM_NAME, S.SCORE_TEAM1, S.SCORE_TEAM2, M.MAPS_NAME, T.TOURNAMENT_NAME, A.MATCH_DATE, A.MATCH_LINK_VOD
        FROM esport.matches as A
        left join teams as B on A.TEAM1_ID = B.TEAM_ID
        left join teams as C on A.TEAM2_ID = C.TEAM_ID
        left join matches_score as S on A.MATCH_ID = S.MATCH_ID
        left join maps as M on S.MAPS_ID = M.MAPS_ID
        left join tournament as T on A.TOURNAMENT_ID = T.TOURNAMENT_NAME";
        $result = $bdd->query($condition)->fetchAll();
        return $result;
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
}
