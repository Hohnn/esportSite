<?php
    require_once __DIR__.'/../controllers/controller.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/sass/signIn.css">
    <title>DAW Inscription</title>
</head>
<body class="body flex-md-row position-relative">
    <a href="../index.php" class="position-absolute top-0 left-0 text-decoration-none brandHome" >
        <div class="brand-login">DAW <span>esport</span></div>
    </a>
    <div class="magic"></div>
    <div class="brand text-center" >
        <h1 class="my-4">BIENVENUE</h1>
        <p class="desc">Rejoignez nous et participer à la création d'une communauter eSport sur Battlefield</p>
    </div>
<?php if(isset($_GET['token'])) {?>
    <div class="myForm d-flex d-md-block">
        <form class="modal-content myModal" action="login.php?token=<?= $token ?? '' ?>" method="POST">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Changement mot de passe</h3>
            </div>
            <div class="modal-body pt-0">
                <div class="mb-4">Entrer votre nouveau mot de passe sécurisé.</div>
                <div class="mb-3 form-floating">
                    <input type="password" class="form-control <?=isset($errorPass) ? 'is-invalid' : ''?>" id="password" name="password" placeholder="Mot de passe">
                    <label for="password" class="text-muted">Mot de passe</label>
                    <div class="form-text text-danger"><?=$errorPass ?? ''?></div>
                </div>
                <div class="mb-3 form-floating">
                    <input type="password" class="form-control <?=isset($errorConfirmPass) ? 'is-invalid' : ''?>" id="confirmPassword" name="confirmPassword" placeholder="Mot de passe">
                    <label for="confirmPassword" class="text-muted">Confirmer le mot de passe</label>
                    <div class="form-text text-danger"><?=$errorConfirmPass ?? ''?></div>
                </div>
                <input type="hidden" name="token" value="<?= $_GET['token'] ?? '' ?>">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" name="submitNewMdp" class="btn btn-primary bgYellow">Envoyé</button>
            </div>
        </form>
    </div>
<?php }elseif (isset($_GET['mdp']) == 'forget') { ?>
    <div class="myForm d-flex d-md-block">
        <form class="modal-content myModal" action="login.php?mdp=forget" method="POST">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Mot de passe perdu ?</h3>
            </div>
            <div class="modal-body pt-0">
            <div class="mb-4">Entrer votre adresse mail, les instructions vous seront envoyé.</div>
            <div class="mb-1 mySuccess <?= isset($mailSuccess) ? '' : 'd-none' ?>"><i class="bi bi-check-circle me-2"></i><?= $mailSuccess ?? '' ?></div>
            <div class="mb-3 form-floating">
                <input type="email" class="form-control <?=isset($errorLog) ? 'is-invalid' : ''?>" id="email" name="mail" placeholder="name@example.com" value="<?= $_POST['login'] ?? '' ?>">
                <label for="email" class="text-muted">Addresse mail</label>
                <div class="form-text text-danger"><?=$errorLog ?? ''?></div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" name="submitForgetMdp" class="btn btn-primary bgYellow">Envoyé</button>
            </div>
        </form>
    </div>
<?php } else { ?>
    <div class="myForm d-flex d-md-block">
        <form class="modal-content myModal" action="login.php" method="POST">
            <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Se connecter</h3>
            </div>
            <div class="modal-body pt-0">
            <div class="mb-4">Vous êtes un nouvel utilisateur ? <a href="signIn.php" class="text-warning" >Créez un compte</a></div>
                <div class="mb-3 form-floating">
                    <input type="email" class="form-control <?=isset($errorLog) ? 'is-invalid' : ''?>" id="email" name="mail" placeholder="name@example.com" value="<?= $_POST['mail'] ?? '' ?>">
                    <label for="email" class="text-muted">Addresse mail</label>
                    <div class="form-text text-danger"><?=$errorLog ?? ''?></div>
                </div>
                <div class="mb-3 form-floating">
                    <input type="password" class="form-control <?=isset($errorPass) ? 'is-invalid' : ''?>"" id="password" name="password" placeholder="Mot de passe">
                    <label for="password" class="text-muted">Mot de passe</label>
                    <div class="form-text text-danger"><?=$errorPass ?? ''?></div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" name="submitLogin" class="btn btn-primary bgYellow">Connection</button>
                <a href="../views/login.php?mdp=forget" class="text-white">Mot de passe oublié ?</a>
            </div>
        </form>
    </div>

    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="../assets/js/magic.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_GET['updatePass'])) { 
    if ($_GET['updatePass'] == 'success') { ?>
        <script>Swal.fire({
                icon: 'success',
                title: 'Changement validé',
                text: 'Votre nouveau mot de passe est enregistré',
                footer: 'Vous pouvez vous connecter'
                })</script>
<?php } else {?>
        <script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'il y a eu une erreur',
                footer: '<a href="../views/login.php?mdp=forget">Réessayer</a>'
                })</script>
<?php } } ?>


</body>
</html>