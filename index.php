<?php
require './controllers/controller.php';
include './controllers/member_controller.php';
include './controllers/index_controller.php';

if(isset($_SESSION['user'])) {
    setcookie('user', $_SESSION['user'], time() + 3600, '/');
    setcookie('id', $_SESSION['id'], time() + 3600, '/'); 
}

if (isset($_COOKIE['user']) && !empty(isset($_COOKIE['user']))) {
    $_SESSION['user'] = $_COOKIE['user'];
    $_SESSION['id'] = $_COOKIE['id'];
}
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
    <title>DAW esport</title>
</head>
<?php include './components/header.php' ?>
            <div class="container-fluid" >
                <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php 
                        $count = 0;
                        foreach($allNews as $news){ ?>
                        <button type="button" data-bs-target="#carousel" data-bs-slide-to="<?= $count ?>" class="active" aria-current="true" aria-label="Slide <?= $count + 1 ?>"><img src="../assets/images/news_images/<?= $news['ARTICLE_IMAGE'] ?>" alt=""></button>
                        <?php $count++; } ?>
                    </div>
                    <div class="carousel-inner">
                    <?php 
                        $count = 0;
                        foreach($allNews as $news){ ?>
                        <div class="carousel-item <?= $count == 0 ? 'active' : '' ?>">
                            <img src="../assets/images/news_images/<?= $news['ARTICLE_IMAGE'] ?>" class="d-block w-100" style="z-index: 110" alt="...">
                            <div class="carousel-caption myTextShadow">
                                <h2><?= $news['ARTICLE_TITLE'] ?></h2>
                                <p><?= $news['ARTICLE_SUBTITLE'] ?></p>
                                <a href="<?= $news['ARTICLE_LINK'] ?>" target="_blank" rel="noopener noreferrer" class="btn bgYellow text-white">Afficher <i class="bi bi-box-arrow-in-right"></i></a>
                            </div>
                            <div class="carousel-caption mycaption-top" style="z-index: 0">
                                <p><i class="bi bi-bookmark-fill"></i> <?= $news['ARTICLE_TYPE'] ?></p>
                            </div>
                            <div class="admin <?= $access ?>">
                                <a href="../views/admin.php?news=edit&newsId=<?= $news['ARTICLE_ID'] ?>"  class="btn bg-success text-white"><i class="bi bi-pencil-square"></i></a>
                                <button type="button" id="deleteNews" value="<?= $news['ARTICLE_ID'] ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#newsModal"><i class="bi bi-x-square"></i></button>
                            </div>
                        </div>
                        <?php $count++; } ?>

                    </div>
                </div>
                    <div class="d-flex justify-content-end position-relative">
                        <div id="plusSug" class="plusSug">
                            <a href="../views/suggestion.php" class="fw-light">Proposer un article</a>
                        </div>
                    </div>
                </div>
                
                <section class="twitch" id="twitchScroll">
                    <h1>L'ACTU <span>TWITCH</span></h1>
                    <nav>
                        <ul>
                            <li class="active">
                                <a href="#">Tous</a>
                            </li>
                            <li>
                                <a href="#">DAW</a>
                            </li>
                            <li>
                                <a href="#">Caster</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="container-fluid cont">
                        <div id="next" class="nav"><i class="bi bi-arrow-right-circle-fill"></i></div>
                        <div id="prev" class="nav d-none"><i class="bi bi-arrow-left-circle-fill"></i></div>
                        <div id="myscroll" class="row g-3 scroll">
                            <!-- API twitch -->
                        </div>
                    </div>
                </section>
                <section class="twitch" id="youtubeScroll">
                    <h1>L'ACTU <span>YOUTUBE</span></h1>
                    <nav>
                        <ul>
                            <li class="active">
                                <a href="#">Tous</a>
                            </li>
                            <li>
                                <a href="#">DAW</a>
                            </li>
                            <li>
                                <a href="#">Caster</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="container-fluid cont">
                        <div id="next2" class="nav"><i class="bi bi-arrow-right-circle-fill"></i></div>
                        <div id="prev2" class="nav d-none"><i class="bi bi-arrow-left-circle-fill"></i></div>
                        <div id="myscroll2" class="row g-3 scroll">
                            <!-- API youtube -->
                        </div>
                    </div>
                </section>
                <section class="twitch topMembers" id="memberScroll">
                    <h1>MEMBRES</h1>
                    <div class="container-fluid cont">
                        <div id="next3" class="nav"><i class="bi bi-arrow-right-circle-fill"></i></div>
                        <div id="prev3" class="nav d-none"><i class="bi bi-arrow-left-circle-fill"></i></div>
                        <div id="myscroll3" class="row scroll d-flex">
                            <!-- members -->
                            <?= displayMembers() ?>
                        </div>
                    </div>
                </section>
               
            </main>
        </div>
    </div>  

        <!-- Modal -->
<div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Vous êtes sur le point de supprimer un article.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
        <form action="" method="POST">
            <input type="hidden" id="newsId" name="newsId" value="">
            <button type="submit" name="submitDeleteNews" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Toast -->
<div class="position-fixed bottom-0 end-0 p-3 myToast" style="z-index: 110">
    <div id="liveToast" class="toast align-items-center text-white <?= $color ?? 'bg-success' ?> border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            <?= $success ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>



    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/test.js"></script>
    <script src="./assets/js/apiTwitch.js"></script>
    <?php if(isset($success)){ ?>
        <script>
        let myToast =  new bootstrap.Toast(document.getElementById('liveToast'))
        myToast.show()
        </script>
    <?php } ?>
</body>
</html>