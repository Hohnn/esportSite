<?php include './phpLogin.php'; 
?>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <aside class="col-3">
                    <div class="stick">
                        <div class="brand d-none d-sm-block">DAW <span class="d-none d-lg-inline-block">esport</span></div>
                        <nav>
                            <a href="index.php" class="d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/index.php" ? 'active' : ''  ?>"><i class="bi bi-newspaper"></i><div class="ms-3 d-none d-lg-block">Actualité</div></a>
                            <a href="comp.php" class="d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/comp.php" ? 'active' : ''  ?>"><i class="bi bi-trophy"></i><div class="ms-3 d-none d-lg-block">Compétitons</div></a>
                            <a href="#" class="d-flex pages"><i class="bi bi-people"></i><div class="ms-3 d-none d-lg-block">l'équipe DAW</div></a>
                            <a href="about.php" class="d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/about.php" ? 'active' : ''  ?>"><i class="bi bi-info-circle"></i><div class="ms-3 d-none d-lg-block">à propos</div></a>

                            <div id="plusPhone" class="d-md-none pages ms-auto plusPhone <?= !empty($_SESSION) ? '' : 'd-none' ?>"><i class="bi bi-three-dots-vertical"></i></div>
                            <div id="userMenu" class="profilMenu2 <?= !empty($_SESSION) ? '' : 'd-none' ?>">
                                <a href="user.php?nickname=<?= $_SESSION['user'] ?? '' ?>" class="d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/user.php" ? 'active' : ''  ?>" >                                
                                    <i class="bi bi-person-lines-fill me-3"></i>  
                                    <div class="d-none d-lg-block">Profil</div>
                                </a>
                                <a href="admin.php" class="<?= isset($_SESSION['role']) == 'admin' ? 'd-block' : 'd-none' ?> d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/admin.php" ? 'active' : ''  ?>">
                                    <i class="bi bi-sliders me-3"></i>
                                    <div class="d-none d-lg-block">Administration</div>
                                </a>
                                <form method="post">
                                    <button name="logout" value="logout"><i class="bi bi-box-arrow-left"></i></button>
                                </form> 
                            </div> 
                        </nav>
                    </div>
            </aside>
            <main class="col">
                <header>
                    <input type="search" placeholder="Rechercher" class="d-none d-sm-block  me-auto">
<?php if (!isset($_SESSION['user'])) { ?>
                    <a href="login.php" class="">Se connecter</a>
<?php } else { ?>
                    <i class="bi bi-bell mx-3"></i>
                    <i class="bi bi-chat-left-text"></i>
                    <div class="userInfos">
                        <div class="wrap">
                            <div class="userName" id="userName"><?= $_SESSION['user'] ?? '' ?></div>
                            <div class="role"><?= $_SESSION['status'] ?? '' ?></div>
                        </div>                        
                        <img src="./assets/images/<?= $_SESSION['logo'] ?? '' ?>" class="profilLogo" id="profilLogo" alt="profil logo">
                    </div>
<?php } ?>
                </header>

                <script src="./assets/js/header.js"></script>
