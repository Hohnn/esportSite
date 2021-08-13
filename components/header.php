<?php include './phpLogin.php'; ?>

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
                            <a href="#" class="d-flex pages"><i class="bi bi-info-circle"></i><div class="ms-3 d-none d-lg-block">à propos</div></a>

                            <div id="plusPhone" class="d-md-none pages ms-auto plusPhone <?= !empty($_SESSION) ? '' : 'd-none' ?>"><i class="bi bi-three-dots-vertical"></i></div>
                            <div id="userMenu" class="profilMenu2 <?= !empty($_SESSION) ? '' : 'd-none' ?>">
                                <a href="user.php?nickname=<?= $_SESSION['nickname'] ?? '' ?>" class="d-flex pages <?= $_SERVER['SCRIPT_NAME'] == "/user.php" ? 'active' : ''  ?>" >                                
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
                    <i class="bi bi-bell mx-3 <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>"></i>
                    <i class="bi bi-chat-left-text <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>"></i>
                    <a href="login.php" class="<?= isset($_SESSION['nickname']) ? 'd-none' : 'd-block' ?>">Se connecter</a>
                    <div class="userInfos <?= isset($_SESSION['nickname']) ? 'd-flex' : 'd-none' ?>">
                        <div class="wrap">
                            <div class="userName" id="userName"><?= $_SESSION['nickname'] ?? '' ?></div>
                            <div class="role"><?= $_SESSION['role'] ?? '' ?></div>
                        </div>                        
                        <img src="./assets/images/<?= $_SESSION['image'] ?? '' ?>" class="profilLogo <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>" id="profilLogo" alt="profil logo">
                    </div>
                    <!-- <div class="profilMenu">
                        <a href="user.php?nickname=<?= $_SESSION['nickname'] ?? '' ?>">Profil</a>
                        <a href="admin.php" class="<?= $_SESSION['role'] == 'admin' ? 'd-block' : 'd-none' ?>">Admin</a>
                        <form method="post">
                            <button name="logout" value="logout">Déconnexion</button>
                        </form> 
                    </div> -->
                </header>

                <script src="./assets/js/header.js"></script>
