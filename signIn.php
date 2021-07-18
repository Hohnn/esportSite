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
    <div class="brand text-center" >
        <h1 class="my-4">BIENVENUE</h1>
        <p class="desc">Rejoignez nous et participer à la création d'une communauter eSport sur Battlefield</p>
    </div>

    <div class="myForm">
        <form action="signIn.php" method="post" novalidate>
  
        <div class="mb-3">
            <label for="nickname" class="form-label">Nom d'utilisateur</label>
            <input placeholder="Votre pseudo..." type="text" class="form-control <?=$classNickname ?? ''?>" id="nickname" name="nickname" required value="<?=$_POST['nickname'] ?? '';?>">
            <div class="form-text text-danger"><?=$errorNickname ?? ''?></div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse mail</label>
            <input placeholder="Adresse mail..." type="email" class="form-control <?=$classMail ?? ''?>" id="email" name="email" aria-describedby="emailHelp" required value="<?=$_POST['email'] ?? '';?>">
            <div class="form-text text-danger"><?=$errorMail ?? ''?></div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input placeholder="mot de passe..." type="password" class="form-control <?=$classMdp ?? ''?>" id="password" name="password" aria-describedby="emailHelp" required value="<?=$_POST['password'] ?? '';?>">
            <div class="form-text text-danger"><?=$errorMdp ?? ''?></div>
        </div>
        <div class="mb-3">
            <label for="confirm" class="form-label">Confirmer le mot de passe</label>
            <input placeholder="Confirmer votre mot de passe" type="password" class="form-control <?= $classPassword ?? '' ?>" id="confirm" name="confirm" required>
            <div class="form-text text-danger"><?= $errorPassword ?? '' ?></div>
        </div>
        <div class="mb-3">
            <div class="g-recaptcha" data-sitekey="6LfE56MbAAAAAEKmbGvII0V7FgBAOuUaekRQorZu" data-theme="dark"></div>
            <div class="form-text text-danger"><?= $errorCaptcha ?? '' ?></div>            
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="cgu" value="checked" id="cgu">
            <label class="form-check-label" for="cgu">Je suis d’accord avec les </label>
            <a type="button" class="text-warning" data-bs-toggle="modal" data-bs-target="#cguModal">conditions générale d’utilisation</a>
            <div class="form-text text-danger"><?= $errorCgu ?? '' ?></div>            
        </div>
        <button type="submit" class="btn btn-primary" id="btn" name="submit">S'inscrire</button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cguModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-sm-down">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Conditions d’inscription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Notre logiciel utilise des cookies pour vous distinguer des autres utilisateurs de notre site Internet. Cela nous permet de vous offrir une expérience personnalisée lorsque vous naviguez sur ce site.
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="./assets/js/magic.js"></script>
    <script src="./assets/js/vanilla-tilt.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=fr" async defer></script>

</body>
</html>