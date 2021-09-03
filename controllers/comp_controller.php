<?php
$Comp = new CompModel();
$allMatches = $Comp->getAllMatches();

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
                    <img src="../assets/images/teamLogo/<?= $match['TEAM1_LOGO'] ?>" alt="team logo" class="teamLogo <?= $looseCount < 0 ? 'win' : '' ?>">
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
                    <img src="../assets/images/teamLogo/<?= $match['TEAM1_LOGO'] ?>" alt="team logo" class="teamLogo <?= $looseCount > 0 ? 'win' : '' ?>">
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
                <a href="../views/admin.php?match=edit&matchId=<?= $match['MATCH_ID'] ?>"><i class="bi bi-pencil-square"></i></a>
                <form action="" method="POST">
                    <input type="hidden" name="matchId" value="<?= $match['MATCH_ID'] ?>">
                    <button type="submitDeleteMatch" class="btn btn-danger"><i class="bi bi-x-square"></i></button>
                </form>
            </div>
        </div>
        </a>
    </div>
<?php }
