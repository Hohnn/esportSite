<div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input placeholder="Votre nom..." type="text" class="form-control <?=$className ?? ''?>" id="name" name="name" required value="<?=$_POST['name'] ?? '';?>" > <!-- si il ya le name dans POSt affiche le sinon met rien -->
            <div class="form-text text-danger"><?=$errorName ?? ''?></div> <!-- affiche le message d'erreur -->
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom</label>
            <input placeholder="Votre prénom..." type="text" class="form-control <?=$classFirstname ?? ''?>" id="firstname" name="firstname" required value="<?=$_POST['firstname'] ?? '';?>">
            <div class="form-text text-danger"><?=$errorFirstname ?? ''?></div>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input placeholder="Votre age..." type="number" class="form-control <?=$classAge ?? ''?>" id="age" name="age" required value="<?=$_POST['age'] ?? '';?>">
            <div class="form-text text-danger"><?=$errorAge ?? ''?></div>
        </div>

        
        <div class="mb-3">
            <label for="zipCode" class="form-label">Code Postal</label>
            <input placeholder="Code postal..." type="text" class="form-control <?=$classZipCode ?? ''?>" id="zipCode" name="zipCode" aria-describedby="emailHelp" required value="<?=$_POST['zipCode'] ?? '';?>">
            <div class="form-text text-danger"><?=$errorZipCode ?? ''?></div>
        </div>


        <div class="heures ps-2 text-white">Temps de jeu : <?= $displayLifetime ?> </div>
                                <div class="row mygrid c">
                                    <?php foreach ($displayTopStats as $key => $value) { ?>
                                            <?= $value ?>
                                        <?php } ?>
                                </div>


                                
                                <?php } else {
    $allPlayers = $Comp->getAllplayerByTeam($_GET['teamId']);
    $count = 0;
    foreach($allPlayers as $player) {
        $count++;
    ?>
    <div class="col-6">
                                        <select class="form-select" aria-label="Default select example" id="userSelect" name="userId1" required data-user-select="<?= $count ?>" >
                                        <option value="" >Autre</option>

<?php if ( $_GET['team'] != 'edit') { ?>
                                            <option selected hidden>Joueurs inscrit</option> 
<?php } foreach($allUsers as $user) { ?>
                                            <option <?= isset($tournament['TOURNAMENT_STATUS']) ? ($tournament['TOURNAMENT_STATUS'] == 'A venir' ? 'selected' : '') : '' ?> value="<?= $user['USER_ID'] ?>" ><?= $user['USER_USERNAME'] ?></option>
<?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-6 ">
                                        <input type="text" class="form-control d-none" name="playerName" id="playerName1" value="<?= $tournament['TOURNAMENT_LINK']  ?? '' ?>" placeholder="Nom du joueur" required data-player-name >
                                        <div class="invalid-feedback ">non valide</div>
                                    </div>

<?php } } ?>
                                    