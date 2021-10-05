<?php


$Comp = new CompModel();

function displayMatch($match) {
    global $access;
    $Comp = new CompModel();
    $score = $Comp->getMatchScore($match['MATCH_ID']);
    $team1Loose = 0;
    $team2Loose = 0;
    foreach ($score as $round) {
        if ($round['SCORE_TEAM1'] - $round['SCORE_TEAM2'] < 0) {
            $team1Loose ++;
        } else {
            $team2Loose ++;
        }
    }
    $looseCount = $team1Loose - $team2Loose;
    $regexYoutube = "/http(?:s)?:\/\/(?:www\.)?youtube\.com\/([a-zA-Z0-9_]+)/";
    $regexTwitch = "/http(?:s)?:\/\/(?:www\.)?twitch\.tv\/([a-zA-Z0-9_]+)/";
    if (isValid($regexTwitch, $match['MATCH_LINK_VOD'])) {
        $vod = 'VOD Twitch';
        $vodClass = 'bgTwitch';
    } elseif (isValid($regexYoutube, $match['MATCH_LINK_VOD'])) {
        $vod = 'VOD Youtube';
        $vodClass = 'bgYoutube';
    } else {
        $vod = '';
    }
    ?>
    <div class="col matchCol">
        <a href="<?= $match['MATCH_LINK_VOD'] ?>"  target="_blank" rel="noopener noreferrer">
        <div class="matchCard myCard">
            <div class="imgBack">
                <?php foreach($score as $round){ 
                    if (count($score) < 3) {
                        $class = 'maps2';
                    } else {
                        $class = 'maps';
                    }?>
                <img class=" <?= $class ?? '' ?>" src="../assets/images/maps/<?= $round['MAPS_IMAGE'] ?>" alt="">
                <?php } ?>
            </div>
            <header>
                <div class="teamWrap">
                    <img src="data:image/png;base64,<?= $match['TEAM1_LOGO'] ?>" alt="team logo" class="teamLogo <?= $looseCount < 0 ? 'win' : '' ?>">
                    <span ><?= $match['TEAM1'] ?></span>
                </div>
                <div class="scoreWrap">
                <?php foreach($score as $round){ ?>
                    <div class="score">
                        <span ><?= $round['SCORE_TEAM1'] ?></span>
                        <span>/</span>
                        <span ><?= $round['SCORE_TEAM2'] ?></span>
                    </div>
                    <?php } ?>
                </div>
                <div class="teamWrap">
                    <img src="data:image/png;base64,<?= $match['TEAM2_LOGO'] ?>" alt="team logo" class="teamLogo <?= $looseCount > 0 ? 'win' : '' ?>">
                    <span ><?= $match['TEAM2'] ?></span>
                </div>
            </header>
            <footer>
                <div class="typeWrap">
                    <span ><?= $match['TOURNAMENT_NAME'] ?? 'Scrim' ?></span>
                    <div class="date"><?= $match['MATCH_DATE'] ?></div>
                </div>
                <div class="vodWrap">
                    <span><?= $vod ?></span>
                    <a href="<?= $match['MATCH_LINK_VOD'] ?>" class="btn <?= $vodClass ?? '' ?>"  target="_blank" rel="noopener noreferrer"></a>
                </div>
            </footer>
            <div class="admin <?= $access ?>">
                <a href="../views/admin.php?match=edit&matchId=<?= $match['MATCH_ID'] ?>" class="btn bg-success text-white"><i class="bi bi-pencil-square"></i></a>
                <button type="button" id="deleteMatch" value="<?= $match['MATCH_ID'] ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#matchModal"><i class="bi bi-x-square"></i></button>
            </div>
        </div>
        </a>
    </div>
<?php }

if (isset($_POST['submitDeleteMatch'])) {
    $Comp->deleteScore($_POST['matchId']);
    $Comp->deleteMatch($_POST['matchId']);
    $allMatches = $Comp->getAllMatches();
}

function displayTournament($tournament) {
    global $access;
    $Comp = new CompModel();
    ?>
    <div class="col-12" >
        <div class="tournamentCard myCard">
            <div class="brand stuff">
                <img src="data:image/png;base64,<?= $tournament['TOURNAMENT_LOGO'] ?>" alt="<?= $tournament['TOURNAMENT_LOGO'] ?>" class="orgLogo">
                <h4 class="orgName"><?= $tournament['TOURNAMENT_NAME'] ?></h4>
            </div>
            <div class="type stuff">
                <span>Format</span> 
                <?= $tournament['TOURNAMENT_FORMAT'] ?>
            </div>
            <div class="date stuff"> 
                <span>Début</span> 
                <?= $tournament['date'] ?>
            </div>
            <div class="status stuff">
                <span>Status</span> 
                <?= $tournament['TOURNAMENT_STATUS'] ?>
            </div>
            <div class="teams stuff">
                <span>équipes</span> 
                <div class="teamsWrap">
                    <?php $teamArray = explode(',', $tournament['TEAM_ID']);
                    foreach($teamArray as $teamId){ 
                        $team = $Comp->getTeam($teamId);
                        if ($team['TEAM_LOGO'] != NULL) { ?>
                    <img src="data:image/png;base64,<?= $team['TEAM_LOGO'] ?>" alt="" class="teamLogo">
                    <?php } }?>
                </div>
            </div>
            <div class="admin <?= $access ?>">
                <a href="../views/admin.php?tournament=edit&tournamentId=<?= $tournament['TOURNAMENT_ID'] ?>" class="btn bg-success text-white"><i class="bi bi-pencil-square"></i></a>
                <button type="button" id="deleteTournament" value="<?= $tournament['TOURNAMENT_ID'] ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tournamentModal"><i class="bi bi-x-square"></i></button>
            </div>
            <a href="<?= $tournament['TOURNAMENT_LINK'] ?>" class="link"></a>
        </div>
    </div>
<?php }

if (isset($_POST['submitDeleteTournament'])) {
    $Comp->deleteTournament($_POST['tournamentId']);
    $allTournaments = $Comp->getAllTournament();
    $allMatches = $Comp->getAllMatches();
}

/**
 * display the team card
 *
 * @param array $team
 */
function displayTeam($team) {
    global $access; // access to the admin panel
    $Comp = new CompModel(); // create a new competition model
    $defaultLogoBase64 = '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';
    ?>
    <div class="col teamCol" >
        <div class="teamCard myCard">
            <div class="admin <?= $access ?>">
                <a href="../views/admin.php?team=edit&teamId=<?= $team['TEAM_ID'] ?>" class="btn bg-success text-white"><i class="bi bi-pencil-square"></i></a>
                <button type="button" id="deleteTeam" value="<?= $team['TEAM_ID'] ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#teamModal"><i class="bi bi-x-square"></i></button>
            </div>
            <div class="toggle"><i class="bi bi-plus-circle" data-toggle ></i></div>
            <header>
                <img src="data:image/png;base64,<?= $team['TEAM_LOGO'] ?>" alt="team_logo" class="teamLogoBack">
                <img src="data:image/png;base64,<?= $team['TEAM_LOGO'] ?>" alt="team_logo" class="teamLogo">
                <div class="wrap">
                    <h3 class="teamName"><?= $team['TEAM_NAME'] ?></h3>
                    <div class="wrapDesc d-flex align-items-center">
                        <div class="flag">
                            <img src="https://www.countryflags.io/<?= $team['TEAM_COUNTRY'] ?>/flat/64.png" alt="">
                        </div>
                        <div class="tag ms-3">[<?= $team['TEAM_SHORTNAME'] ?>]</div> 
                    </div>
                </div>
            </header>
            <div class="teamMembers small">
<?php $allPlayers = $Comp->getAllplayerByTeam($team['TEAM_ID']); // get all players of the team
foreach($allPlayers as $player){  // loop through all players
    if ($player['USER_ID'] > 0) { // if player is registered ?> 
                <a href="../views/user.php?nickname=<?= $player['USER_USERNAME'] ?>">
                    <img src="../assets/images/user_logo/<?= $player['USER_LOGO'] ?>" alt="" class="memberLogo">
                    <h5 class="memberName"><?= $player['PLAYER_NAME'] ?></h5>
                </a>
<?php } else {  ?>
                <a>
                    <img src="data:image/png;base64,<?= $defaultLogoBase64 ?>" alt="" class="memberLogo">
                    <h5 class="memberName"><?= $player['PLAYER_NAME'] ?></h5>
                </a>
<?php } } ?>
            </div>
        </div>
    </div>
<?php }

if (isset($_POST['submitDeleteTeam'])) { // if modal delete team button is clicked
    $Comp->deleteTeam($_POST['teamId']); // delete team with this team id
    $allTeams = $Comp->getAllTeams(); // get all teams to refresh the display
}

$allMatches = $Comp->getAllMatches();
$allTournaments = $Comp->getAllTournament();
$allTeams = $Comp->getAllTeams();