<?php
require './controllers/phpSuggestion.php';

require './controllers/phpUpload.php';


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/sass/style.css">
    <link rel="stylesheet" href="./assets/sass/admin.css">
    <link rel="stylesheet" href="./assets/sass/suggestion.css">

    <title>DAW esport</title>
</head>
<?php include './components/header.php' ?>

<section class="actu">
                    <h1>Proposition d'article</h1>
                    <div class="container-fluid mt-5">
                        <div class="row mt-0 flex-column-reverse flex-md-row-reverse g-5">
                            <div class="col">
                                <h3>Aperçu</h3>
                                <div class="card" id="backImage">
                                    <div class="desc text-white">
                                        <h2 class="title" id="titlePreview">Death Stranding</h2>
                                        <div class="date" id="datePreview">25/05/1992</div>
                                        <div class="sujet" id="typePreview">News</div>
                                        <div class="auteur" id="authorPreview">Hohnn</div>
                                        <button type="button">Voir</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col d-flex mt-3 mt-sm-0">
                                <form action="suggestion.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3 form-floating">
                                        <input type="text" class="form-control <?=isset($errorTitle) ? 'is-invalid noFilter' : ''?>" id="title" name="title" placeholder="titre" value="<?= $_POST['title'] ?? '' ?>">
                                        <label for="title" class="text-muted">Titre de l'article</label>
                                        <div class="form-text text-danger"><?=$errorTitle ?? ''?></div>
                                    </div>
                                    <div class="mb-3 form-floating">
                                        <input type="date" class="form-control <?=isset($errorDate) ? 'is-invalid noFilter' : ''?>"" id="date" name="date" placeholder="Date">
                                        <label for="date" class="text-muted">Date de l'article</label>
                                        <div class="form-text text-danger"><?=$errorDate ?? ''?></div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="type" name="type">
                                            <option selected value="Article">Article</option>
                                            <option value="Test">Test</option>
                                            <option value="Actu">Actu</option>
                                            <option value="Promo">Promo</option>
                                        </select>
                                        <label for="floatingSelect">Type d'article</label>
                                    </div>
                                    <div class="mb-3 form-floating">
                                        <input type="text" class="form-control <?=isset($errorAuthor) ? 'is-invalid noFilter' : ''?>"" id="author" name="author" placeholder="Date">
                                        <label for="author" class="text-muted">Auteur de l'article</label>
                                        <div class="form-text text-danger"><?=$errorAuthor ?? ''?></div>
                                    </div>
                                    
                                    <div class="mb-3 form-floating">
                                        <input type="url" class="form-control <?=isset($errorSource) ? 'is-invalid noFilter' : ''?>"" id="source" name="source" placeholder="Source">
                                        <label for="source" class="text-muted">Lien de l'article</label>
                                        <div class="form-text text-danger"><?=$errorSource ?? ''?></div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="fileToUpload">Image d'illustration</label>
                                        <input type="file" name="img" class="form-control" id="fileToUpload" accept="image/png, image/jpg, image/jpeg">
                                        <div class="form-text text-danger"><?=$uploaded ?? ''?></div>
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

    <!-- Modal -->
    <div class="modal fade invert" id="myModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>


    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="./assets/js/suggestion.js"></script>
    <script src="./assets/js/script.js"></script>
</body>
</html>