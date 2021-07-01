<?php
 include 'phpLogin.php';
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
    <div class="brand text-center" >
        <h1 class="my-4">BIENVENUE</h1>
        <p class="desc">Rejoignez nous et participer à la création d'une communauter eSport sur Battlefield</p>
    </div>

    <div class="myForm">
    <form class="modal-content myModal" action="login.php" method="POST">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Se connecter</h3>
        </div>
        <div class="modal-body pt-0">
        <div class="mb-4">Vous êtes un nouvel utilisateur ? <a href="signIn.php" class="text-warning" >Créez un compte</a></div>
            <div class="mb-3 form-floating">
                <input type="email" class="form-control <?=isset($errorLog) ? 'is-invalid' : ''?>" id="email" name="login" placeholder="name@example.com" value="<?= $_POST['login'] ?? '' ?>">
                <label for="email" class="text-muted">Addresse mail</label>
                <div class="form-text text-danger"><?=$errorLog ?? ''?></div>
            </div>
            <div class="mb-3 form-floating">
                <input type="password" class="form-control <?=isset($errorPass) ? 'is-invalid' : ''?>"" id="password" name="password" placeholder="Mot de passe">
                <label for="password" class="text-muted">Mot de passe</label>
                <div class="form-text text-danger"><?=$errorPass ?? ''?></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary bgYellow">Connection</button>
        </div>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="./assets/js/magic.js"></script>
    <script src="./assets/js/vanilla-tilt.js"></script>

</body>
</html>