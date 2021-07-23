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