<?php 

    if(isset($_SESSION['user'])){
        $user = $User->getUserByUsername($_SESSION['user']);
    }
?>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <aside class="col-3">
                    <div class="stick">
                        <div class="brand d-none d-sm-block">DAW <span class="d-none d-lg-inline-block">esport</span></div>
                        <nav id="navSide">
                            <a href="../index.php" class="d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/index.php" ? 'active' : ''  ?>">
                                <i class="bi bi-newspaper"></i>
                                <div class="ms-3 d-none d-lg-block">Actualité</div>
                            </a>
                            <nav class="pageNav2 d-none d-lg-block <?= $_SERVER['SCRIPT_NAME'] == "/index.php" ? '' : 'hide'  ?>"  >
                                <ul>
                                    <li><a href="#twitchScroll">Twitch</a></li>
                                    <li><a href="#youtubeScroll">Youtube</a></li>
                                    <li><a href="#memberScroll">Membres</a></li>
                                </ul>                  
                            </nav>
                            <a href="../views/comp.php" class="d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/views/comp.php" ? 'active' : ''  ?>">
                                <i class="bi bi-trophy"></i>
                                <div class="ms-3 d-none d-lg-block">Compétitons</div>
                            </a>
                            <nav class="pageNav2 d-none d-lg-block <?= $_SERVER['SCRIPT_NAME'] == "/views/comp.php" ? '' : 'hide'  ?>">
                                <ul>
                                    <li><a href="#teamScroll">équipes</a></li>
                                    <li><a href="#tournamentScroll">Tournois</a></li>
                                    <li><a href="#matchScroll">Matchs</a></li>
                                </ul>                  
                            </nav>
                            <a href="#" class="d-flex pages">
                                <i class="bi bi-people"></i>
                                <div class="ms-3 d-none d-lg-block">l'équipe DAW</div>
                            </a>
                            <a href="../views/about.php" class="d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/views/about.php" ? 'active' : ''  ?>">
                                <i class="bi bi-info-circle"></i>
                                <div class="ms-3 d-none d-lg-block">à propos</div>
                            </a>

                            <div id="plusPhone" class="d-md-none pages ms-auto plusPhone <?= !empty($_SESSION) ? '' : 'd-none' ?>">
                                <i class="bi bi-three-dots-vertical"></i>
                            </div>
                            <div id="userMenu" class="profilMenu2 <?= !empty($_SESSION) ? '' : 'd-none' ?>">
                                <a href="../views/user.php?nickname=<?= $_SESSION['user'] ?? '' ?>" class="d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/views/user.php" ? 'active' : ''  ?>" >                                
                                    <i class="bi bi-person-lines-fill me-3"></i>  
                                    <div class="d-none d-lg-block">Profil</div>
                                </a>
                                <a href="../views/admin.php?news" class="<?= $user['STATUS_ROLE'] == 'administrateur' || $user['STATUS_ROLE'] == 'modérateur' ? 'd-block' : 'd-none' ?> d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/views/admin.php" ? 'active' : ''  ?>">
                                    <i class="bi bi-sliders me-3"></i>
                                    <div class="d-none d-lg-block">Administration</div>
                                </a>
                                <form method="post">
                                    <button name="logout" class="d-flex pages mb-0 mb-sm-3" value="logout">
                                        <i class="bi bi-box-arrow-left me-3"></i>
                                        <div class="d-none d-lg-block">Déconnexion</div>
                                    </button>
                                </form> 
                            </div> 
                        </nav>
                    </div>
            </aside>
            <main class="col " data-bs-spy="scroll" data-bs-target="#navSide" data-bs-offset="0" tabindex="0">
                <header>
                    <!-- <input type="search" placeholder="Rechercher" class="d-none d-sm-block  me-auto"> -->
<?php if ($_SERVER['SCRIPT_NAME'] == "/views/comp.php") { ?>
                    <nav class="pageNav" id="navTop">
                        <ul>
                            <li><a href="#teamScroll">équipes</a></li>
                            <li><a href="#tournamentScroll">Tournois</a></li>
                            <li><a href="#matchScroll">Matchs</a></li>
                        </ul>                  
                    </nav>
<?php } ?>
<?php if ($_SERVER['SCRIPT_NAME'] == "/index.php") { ?>
                    <nav class="pageNav">
                        <ul>
                            <li><a href="#twitchScroll">Twitch</a></li>
                            <li><a href="#youtubeScroll">Youtube</a></li>
                            <li><a href="#memberScroll">Membres</a></li>
                        </ul>                  
                    </nav>
<?php } ?>
<?php if (!isset($_SESSION['user'])) { ?>
                    <a href="../views/login.php" class="ms-auto">Se connecter</a>
<?php } else { ?>
                   <!--  <i class="bi bi-bell mx-3 "></i>
                    <i class="bi bi-chat-left-text"></i> -->
                    <a href="../views/user.php?nickname=<?= $_SESSION['user'] ?? '' ?>" class="userInfos ms-auto">
                        <div class="wrapProfil">
                            <div class="userName" id="userName"><?= $_SESSION['user'] ?? '' ?></div>
                            <div class="role"><?= $user['STATUS_ROLE']  ?? '' ?></div>
                        </div>                        
                        <img src="../assets/images/user_logo/<?= $user['USER_LOGO'] ?>" class="profilLogo" id="profilLogo" alt="profil logo">
                    </a>
<?php } ?>
                </header>

                <script src="../assets/js/header.js"></script>
