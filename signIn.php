<?php
 include 'phpSignIn.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/sass/signIn.css">
    <title>DAW Inscription</title>
</head>
<body class="body flex-md-row ">
    <div class="magic"></div>
    <div class="brand text-center">
        <h1 class="my-4">BIENVENUE</h1>
        <p class="desc">Rejoignez nous et participer à la création d'une communauter eSport sur Battlefield</p>
    </div>

    <div class="myForm">
        <form action="signIn.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input placeholder="Votre nom..." type="text" class="form-control <?=$className ?? ''?>" id="name" name="name" required value="<?=$_POST['name'] ?? '';?>" > <!-- si il ya le name dans POSt affiche le sinon met rien -->
            <div class="form-text"><?=$errorName ?? ''?></div> <!-- affiche le message d'erreur -->
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom</label>
            <input placeholder="Votre prénom..." type="text" class="form-control <?=$classFirstname ?? ''?>" id="firstname" name="firstname" required value="<?=$_POST['firstname'] ?? '';?>">
            <div class="form-text"><?=$errorFirstname ?? ''?></div>
        </div>
        <div class="mb-3">
            <label for="nickname" class="form-label">Pseudo</label>
            <input placeholder="Votre pseudo..." type="text" class="form-control <?=$classNickname ?? ''?>" id="nickname" name="nickname" required value="<?=$_POST['nickname'] ?? '';?>">
            <div class="form-text"><?=$errorNickname ?? ''?></div>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input placeholder="Votre age..." type="number" class="form-control <?=$classAge ?? ''?>" id="age" name="age" required value="<?=$_POST['age'] ?? '';?>">
            <div class="form-text"><?=$errorAge ?? ''?></div>
        </div>
        <div class="mb-3">
            <label for="zipCode" class="form-label">Code Postal</label>
            <input placeholder="Code postal..." type="text" class="form-control <?=$classZipCode ?? ''?>" id="zipCode" name="zipCode" aria-describedby="emailHelp" required value="<?=$_POST['zipCode'] ?? '';?>">
            <div class="form-text"><?=$errorZipCode ?? ''?></div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse mail</label>
            <input placeholder="Adresse mail..." type="email" class="form-control <?=$classMail ?? ''?>" id="email" name="email" aria-describedby="emailHelp" required value="<?=$_POST['email'] ?? '';?>">
            <div class="form-text"><?=$errorMail ?? ''?></div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input placeholder="mot de passe..." type="password" class="form-control <?=$classMdp ?? ''?>" id="password" name="password" aria-describedby="emailHelp" required value="<?=$_POST['password'] ?? '';?>">
            <div class="form-text"><?=$errorMdp ?? ''?></div>
        </div>
        <div class="mb-3">
            <label for="confirm" class="form-label">Confirmation</label>
            <input placeholder="Confirmer votre mot de passe" type="password" class="form-control <?= $classPassword ?? '' ?>" id="confirm" name="confirm" required>
            <div class="form-text"><?= $errorPassword ?? '' ?></div>
        </div>
        <button type="submit" class="btn btn-primary" id="btn" name="submit">S'inscrire</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="./assets/js/magic.js"></script>
</body>
</html>