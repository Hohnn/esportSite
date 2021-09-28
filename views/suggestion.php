<?php
    require_once __DIR__.'/../controllers/controller.php';
    require __DIR__.'/../controllers/suggestion_controller.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/sass/style.css">
    <link rel="stylesheet" href="../assets/sass/admin.css">
    <link rel="stylesheet" href="../assets/sass/suggestion.css">

    <title>DAW esport</title>
</head>
<?php require __DIR__.'/../components/header.php' ?>

<section class="actu mt-5">
                    <h1>Proposition d'article</h1>
                    <div class="container-fluid mt-5">
                        <div class="row mt-0 g-5">
                            <div class="col-12 col-xl-6">
                                <p class="text-white fs-5">Partager un article que vous pensez utile pour la communauté </p>
                                <p class=" text-white fw-normal">La promotion d'un événement que vous organisez, l'actualité sur le jeu, le test d'une nouvelle souris... Tous ce qui concerne l'univers compétitif Battlefield.</p>
                                <p>Votre demande sera étudiée par notre équipe. </p>
                            </div>  
                            <div class="col d-flex mt-3 mt-sm-0">
                                <form class="myCard p-3" action="suggestion.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3 form-floating">
                                        <input type="text" class="form-control <?=isset($errorTitle) ? 'is-invalid noFilter' : ''?>" id="title" name="title" placeholder="titre" value="<?= $_POST['title'] ?? '' ?>">
                                        <label for="title" class="text-muted">Titre de l'article</label>
                                        <div class="form-text text-danger"><?=$errorTitle ?? ''?></div>
                                    </div>
                                    <div class="mb-3 form-floating">
                                        <input type="url" class="form-control <?=isset($errorSource) ? 'is-invalid noFilter' : ''?>"" id="source" name="source" placeholder="Source">
                                        <label for="source" class="text-muted">Lien de l'article</label>
                                        <div class="form-text text-danger"><?=$errorSource ?? ''?></div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control <?=isset($errorDesc) ? 'is-invalid noFilter' : ''?>" placeholder="Leave a comment here" id="desc" name="desc" style="height: 100px"></textarea>
                                        <label for="desc" class="text-muted">Pourquoi cette article ?</label>
                                        <div class="form-text text-danger"><?=$errorDesc ?? ''?></div>
                                    </div>
                                    <div class="w-100 d-flex mt-2">
                                        <button class="btn btn-sm btn-primary ms-auto bgYellow px-3" type="submit" id="submit" name="submit" data-submit="<?= isset($count) && $count == 0 ? "valid" : "invalid" ?>">Valider</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                </section>

            </main>
        </div>
    </div>

    <!-- Toast -->
<div class="position-fixed top-0 end-0 p-3 myToast" style="z-index: 110">
    <div id="liveToast" class="toast align-items-center text-white <?= $color ?? 'bg-success' ?> border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            <?= $success ?? '' ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>



    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="../assets/js/suggestion.js"></script>
</body>
</html>