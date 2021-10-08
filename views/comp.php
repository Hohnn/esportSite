<?php
require_once __DIR__.'/../controllers/controller.php';
require_once __DIR__.'/../controllers/comp_controller.php';



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
    <link rel="stylesheet" href="../assets/sass/comp.css">
    <title>DAW esport</title>
</head>
<?php require __DIR__.'/../components/header.php' ?>
                <img src="../assets/images/banner_team.jpg" class="teamBackImg" alt="">
                <section class="team" id="teamScroll">

                    <h1 class="text-uppercase">équipes</h1>
                    <div class="container-fluid mt-3">
                        <div class="row g-3" >
                          <?php foreach($allTeams as $team){ // for each register team
                              echo displayTeam($team); // display team
                          } ?>

                            <div class="col teamCol position-relative">
                                <a href="../views/admin.php?team=add">
                                    <div class="addCard">Ajouter une équipe</div>
                                </a>
                            </div>
                        
                        </div>
                    </div>    
                </section>
                <section class="tournament mt-4" id="tournamentScroll">
                    <h1 class="text-uppercase">tournois</h1>
                    <div class="container-fluid  mt-3">
                        <div class="row g-3">
                            
                        <?php foreach($allTournaments as $tournament){
                                echo displayTournament($tournament);
                            } ?>
                            <div class="col-12 tournamentCard position-relative">
                                    <a href="../views/admin.php?tournament=add">
                                        <div class="addCard">Ajouter un tournoi</div>
                                    </a>
                            </div>

                        </div>
                    </div>    
                </section>
                <section class="tournament mt-4" id="matchScroll">
                    <h1 class="text-uppercase">Matchs </span></span></h1>
                    <div class="container-fluid  mt-3">
                        <div class="row g-3">
                            
                            <?php foreach($allMatches as $match){
                                echo displayMatch($match);
                            } ?>
                            <div class="col matchCol position-relative">
                                <a href="../views/admin.php?match=add">
                                    <div class="addCard">Ajouter un match</div>
                                </a>
                            </div>                            
                        </div>
                    </div>    
                </section>
            </main>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="teamModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Vous êtes sur le point de supprimer une équipe. <br>
        ainsi que tous les matchs de cette équipe.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
        <form action="" method="POST">
            <input type="hidden" id="teamId" name="teamId" value="">
            <button type="submit" name="submitDeleteTeam" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <!-- Modal -->
<div class="modal fade" id="matchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Vous êtes sur le point de supprimer un match.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
        <form action="" method="POST">
            <input type="hidden" id="matchId" name="matchId" value="">
            <button type="submit" name="submitDeleteMatch" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Modal -->
<div class="modal fade" id="tournamentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Vous êtes sur le point de supprimer un tournoi. <br> Tous les matchs associés seront également supprimés.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
        <form action="" method="POST">
            <input type="hidden" id="tournamentId" name="tournamentId" value="">
            <button type="submit" name="submitDeleteTournament" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>


    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- Masonry -->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <!-- page -->
    <script src="../assets/js/comp.js"></script>

</body>
</html>