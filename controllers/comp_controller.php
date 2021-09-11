<?php
$Comp = new CompModel();
$allMatches = $Comp->getAllMatches();
$allTournaments = $Comp->getAllTournament();
$allTeams = $Comp->getAllTeams();
function displayMatch($match) {
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
        $vod = 'No VOD';
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
                <img class=" <?= $class ?? '' ?>" src="../assets/images/<?= $round['MAPS_ID'] ?>.jpg" alt="">
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
                    <span ><?= $match['TOURNAMENT_NAME'] ?></span>
                    <div class="date"><?= $match['MATCH_DATE'] ?></div>
                </div>
                <div class="vodWrap">
                    <span><?= $vod ?></span>
                    <a href="<?= $match['MATCH_LINK_VOD'] ?>" class="btn <?= $vodClass ?? '' ?>"  target="_blank" rel="noopener noreferrer"></a>
                </div>
            </footer>
            <div class="admin">
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
                    ?>
                    <img src="data:image/png;base64,<?= $team['TEAM_LOGO'] ?>" alt="" class="teamLogo">
                    <?php } ?>
                </div>
            </div>
            <div class="admin">
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

function displayTeam($team) { 
    $Comp = new CompModel();
    $defaultLogoBase64 = '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';

    ?>
    <div class="col teamCol" >
        <div class="teamCard myCard">
        <div class="admin">
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
<?php $allPlayers = $Comp->getAllplayerByTeam($team['TEAM_ID']) ;
foreach($allPlayers as $player){ 
    if ($player['USER_ID'] > 0) { ?>
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
