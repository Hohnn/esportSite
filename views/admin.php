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
    <link rel="stylesheet" href="../assets/sass/style.css">
    <link rel="stylesheet" href="../assets/sass/admin.css">
    <title>DAW esport</title>
</head>
<?php require __DIR__.'/../components/header.php' ?>
                <section class="actu">
                    <h1>ADMINISTRATION</h1>
<?php if (isset($_GET['edit']) == 'match') { ?>
                    <div class="container-md">
                        <form class="row pt-3 myCard needs-validation" action="" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="col-sm-5">
                                <select class="form-select" aria-label="Default select example" name="team1" required>
                                    <option selected hidden>équipe n°1</option>
<?php  for ($i=8; $i < 18; $i++) { 
if ($i >=  8 || $i <= 17) {  ?>
                                    <option value="<?= $i ?>" <?= $i == 12 ? 'disabled' : '' ?>><?= $i ?> : 00</option>
<?php }} ?>
                                </select>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center align-items-center text-yellow">VS</div>
                            <div class="col-sm-5">
                                <select class="form-select" aria-label="Default select example" name="team2" required>
                                    <option selected hidden>équipe n°2</option>
<?php  for ($i=8; $i < 18; $i++) { 
if ($i >=  8 || $i <= 17) {  ?>
                                    <option value="<?= $i ?>" <?= $i == 12 ? 'disabled' : '' ?>><?= $i ?> : 00</option>
<?php }} ?>
                                </select>
                            </div>   
                            <div class="col-12 g-3 mb-0">
                                <div class="row g-3">
                                    <div class="col minSet">
                                        <div class="row g-2">
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score1Team1" id="score1Team1" value="" placeholder="Score T1" required>
                                                <div class="invalid-feedback ">non valide</div>
                                            </div>
                                            <div class="col-2 d-flex justify-content-center align-items-center text-yellow">/</div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score1Team2" id="score1Team2" value="" placeholder="Score T2" required>
                                                <div class="invalid-feedback ">non valide</div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example" name="map1" required>
                                                    <option selected hidden>Carte n°1</option>
        <?php  for ($i=8; $i < 18; $i++) { 
            if ($i >=  8 || $i <= 17) {  ?>
                                                    <option value="<?= $i ?>" <?= $i == 12 ? 'disabled' : '' ?>><?= $i ?> : 00</option>
        <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col minSet">
                                        <div class="row g-2">
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score2Team1" id="score2Team1" value="" placeholder="Score T1" required>
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                            <div class="col-2 d-flex justify-content-center align-items-center text-yellow">/</div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score2Team2" id="score2Team2" value="" placeholder="Score T2" required>
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example" name="hour" required>
                                                    <option selected hidden>Carte n°2</option>
        <?php  for ($i=8; $i < 18; $i++) { 
            if ($i >=  8 || $i <= 17) {  ?>
                                                    <option value="<?= $i ?>" <?= $i == 12 ? 'disabled' : '' ?>><?= $i ?> : 00</option>
        <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col minSet">
                                        <div class="row g-2">
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score3Team1" id="score3Team1" value="" placeholder="Score T1" required>
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                            <div class="col-2 d-flex justify-content-center align-items-center text-yellow">/</div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="score3Team2" id="score3Team2" value="" placeholder="Score T2" required>
                                                <div class="invalid-feedback ">Score invalide</div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-2">
                                            <div class="col">
                                                <select class="form-select" aria-label="Default select example" name="hour" required>
                                                    <option selected hidden>Carte n°3</option>
        <?php  for ($i=8; $i < 18; $i++) { 
            if ($i >=  8 || $i <= 17) {  ?>
                                                    <option value="<?= $i ?>" <?= $i == 12 ? 'disabled' : '' ?>><?= $i ?> : 00</option>
        <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>  

                                <div class="col-12 g-3">
                                    <div class="row g-3">
                                    <div class="col minSet">
                                        <input type="text" class="form-control" name="team1Name" id="team1Name" value="" placeholder="Evenement" required>
                                        <div class="invalid-feedback ">Nom invalide</div>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="team1Name" id="team1Name" value="" placeholder="Date" required>
                                        <div class="invalid-feedback ">Nom invalide</div>
                                    </div>
                                    <div class="col minSet">
                                        <input type="link" class="form-control" name="team1Name" id="team1Name" value="" placeholder="Lien" required>
                                        <div class="invalid-feedback ">Nom invalide</div>
                                    </div>
                                </div>  
                                </div>  
                                
                            <div class="col d-flex mt-2">
                                <button class="btn btn-sm btn-primary bgYellow px-3" type="submit" id="submit" name="submit" data-submit="<?= isset($count) && $count == 0 ? "valid" : "invalid" ?>">Valider</button>
                            </div>
                        </form>
                    </div>
<?php } else { ?>
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="title">News n°1</div>
                            <div class="col">
                                <div class="card " id="backImage">
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
                                <form action="admin.php" method="POST">
                                    <input class="form-control form-control-sm" id="title" type="text" placeholder="Titre">
                                    <div class="wrap d-flex mt-2">
                                        <input class="form-control form-control-sm" id="date" type="text" placeholder="Date">
                                        <input class="form-control form-control-sm" id="type" type="text" placeholder="Type">
                                        <input class="form-control form-control-sm" id="author" type="text" placeholder="Auteur">
                                    </div>
                                    <input class="form-control form-control-sm mt-2" id="Source" type="text" placeholder="Lien source">
                                    <input class="form-control form-control-sm mt-2" id="fileToUpload" type="file">
                                    <div class="w-100 d-flex mt-2">
                                        <button class="btn btn-sm btn-primary ms-auto bgYellow px-3" type="submit">Valider</button>
                                    </div>
                        
                                </form>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="title">News n°2</div>
                            <div class="col d-flex">
                                <form action="">
                                    <input class="form-control form-control-sm" id="title2" type="text" placeholder="Titre">
                                    <div class="wrap d-flex mt-2">
                                        <input class="form-control form-control-sm" id="date2" type="text" placeholder="Date">
                                        <input class="form-control form-control-sm" id="type2" type="text" placeholder="Type">
                                        <input class="form-control form-control-sm" id="author2" type="text" placeholder="Auteur">
                                    </div>
                                    <input class="form-control form-control-sm mt-2" id="Source2" type="text" placeholder="Lien source">
                                    <input class="form-control form-control-sm mt-2" id="fileToUpload2" type="file">
                                    <div class="w-100 d-flex mt-2">
                                        <button class="btn btn-sm btn-primary ms-auto bgYellow px-3" type="submit">Valider</button>
                                    </div>
                        
                                </form>
                            </div>
                            <div class="col  mt-3 mt-sm-0">
                                <div class="card Mini">
                                    <div class="image" id="backImage2"></div>
                                    <div class="desc text-white">
                                        <h3 class="title" id="titlePreview2">Death Stranding</h3>
                                        <div class="date" id="datePreview2">25/05/1992</div>
                                        <div class="sujet" id="typePreview2">News</div>
                                        <div class="auteur" id="authorPreview2">Hohnn</div>
                                        <button type="button">Voir</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="title">News n°3</div>
                            <div class="col d-flex">
                                <form action="">
                                    <input class="form-control form-control-sm" id="title3" type="text" placeholder="Titre">
                                    <div class="wrap d-flex mt-2">
                                        <input class="form-control form-control-sm" id="date3" type="text" placeholder="Date">
                                        <input class="form-control form-control-sm" id="type3" type="text" placeholder="Type">
                                        <input class="form-control form-control-sm" id="author3" type="text" placeholder="Auteur">
                                    </div>
                                    <input class="form-control form-control-sm mt-2" id="Source3" type="text" placeholder="Lien source">
                                    <input class="form-control form-control-sm mt-2" id="fileToUpload3" type="file">
                                    <div class="w-100 d-flex mt-2">
                                        <button class="btn btn-sm btn-primary ms-auto bgYellow px-3" type="submit">Valider</button>
                                    </div>
                        
                                </form>
                            </div>
                            <div class="col  mt-3 mt-sm-0">
                                <div class="card Mini">
                                    <div class="image" id="backImage3"></div>
                                    <div class="desc text-white">
                                        <h3 class="title" id="titlePreview3">Death Stranding</h3>
                                        <div class="date" id="datePreview3">25/05/1992</div>
                                        <div class="sujet" id="typePreview3">News</div>
                                        <div class="auteur" id="authorPreview3">Hohnn</div>
                                        <button type="button">Voir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php } ?>
                </section>
            </main>
        </div>
    </div>


    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="../assets/js/admin.js"></script>
</body>
</html>