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
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <aside class="col-3">
                    <div class="brand">DAW <span class="d-none d-lg-block">esport</span></div>
                    <nav>
                        <a href="#" class="d-flex"><i class="bi bi-newspaper"></i><div class="ms-3 d-none d-lg-block">ACTUALITÉ</div></a>
                        <a href="#" class="d-flex"><i class="bi bi-mouse2"></i><div class="ms-3 d-none d-lg-block">COMPÉTITION</div></a>
                        <a href="#" class="d-flex"><i class="bi bi-trophy"></i><div class="ms-3 d-none d-lg-block">LEAGUE</div></a>
                        <a href="#" class="d-flex"><i class="bi bi-people"></i><div class="ms-3 d-none d-lg-block">MEMBRES</div></a>
                    </nav>
            </aside>
            <main class="col">
                <header>
                    <input type="search" placeholder="Recherche" class="d-none d-md-block">
                    <i class="bi bi-bell mx-3"></i>
                    <i class="bi bi-chat-left-text"></i>
                    <div class="lightMode ms-auto"></div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#connectionModal">Se connecter</button>
                    <button class="userName" id="userName">userName</button>
                    <button class="profilLogo" id="profilLogo"></button>
                    <div class="profilMenu">
                        <button type="button">Profil</button>
                        <button type="button">Se déconnecter</button>                        
                    </div>
                </header>
                <section class="actu">
                    <h1>L'ACTUALITÉ <br> <span>BATTLEFIELD <span>5</span></span></h1>
                    <div class="container-fluid mt-5">
                        <div class="row flex-wrap g-4">
                            <div class="col">
                                <div class="card ">
                                    <div class="desc text-white">
                                        <h2 class="title">Death Stranding</h2>
                                        <div class="date">25/05/1992</div>
                                        <div class="sujet">News</div>
                                        <div class="auteur">Hohnn</div>
                                        <button type="button">Voir</button>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="card Mini">
                                    <div class="image"></div>
                                    <div class="desc text-white">
                                        <h3 class="title">Death Stranding</h3>
                                        <div class="date">25/05/1992</div>
                                        <div class="sujet">News</div>
                                        <div class="auteur">Hohnn</div>
                                        <button type="button">Voir</button>
                                    </div>
                                </div>
                                <div class="card Mini">
                                    <div class="image"></div>
                                    <div class="desc text-white">
                                        <h3 class="title">Death Stranding</h3>
                                        <div class="date">25/05/1992</div>
                                        <div class="sujet">News</div>
                                        <div class="auteur">Hohnn</div>
                                        <button type="button">Voir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

  
  <!-- Modal -->
  <div class="modal fade " id="connectionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <form class="modal-content myModal" action="index.html" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="email" class="form-label d-none">Login</label>
                <input type="email" class="form-control" id="email" name="login" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label d-none">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary me-auto" data-bs-target="#inscriptionModal" data-bs-toggle="modal" data-bs-dismiss="modal">Inscription</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary bgYellow">Connection</button>
        </div>
      </form>
    </div>
  </div>    
  <div class="modal fade " id="inscriptionModal" tabindex="-1" aria-labelledby="signin" aria-hidden="true">
    <div class="modal-dialog ">
      <form class="modal-content myModal" action="index.html" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="email" class="form-label d-none">Login</label>
                <input type="email" class="form-control" id="email" name="login" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label d-none">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary me-auto" data-bs-target="#connectionModal" data-bs-toggle="modal" data-bs-dismiss="modal">Connection</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary bgYellow">Valider</button>
        </div>
      </form>
    </div>
  </div>    




    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>
</body>
</html>