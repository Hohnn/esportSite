<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <aside class="col-3">
                    <div class="stick">
                        <div class="brand">DAW <span class="d-none d-lg-inline-block">esport</span></div>
                        <nav>
                            <a href="index.php" class="d-flex"><i class="bi bi-newspaper"></i><div class="ms-3 d-none d-lg-block">ACTUALITÉ</div></a>
                            <a href="#" class="d-flex"><i class="bi bi-mouse2"></i><div class="ms-3 d-none d-lg-block">COMPÉTITION</div></a>
                            <a href="#" class="d-flex"><i class="bi bi-trophy"></i><div class="ms-3 d-none d-lg-block">LEAGUE</div></a>
                            <a href="#" class="d-flex"><i class="bi bi-people"></i><div class="ms-3 d-none d-lg-block">MEMBRES</div></a>
                        </nav>
                    </div>
            </aside>
            <main class="col">
                <header>
                    <input type="search" placeholder="Recherche" class="d-none d-md-block">
                    <i class="bi bi-bell mx-3 ms-auto"></i>
                    <i class="bi bi-chat-left-text"></i>
                    <a href="login.php" class="<?= isset($_SESSION['nickname']) ? 'd-none' : 'd-block' ?>">Se connecter</a>
                    <div class="userInfos <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>">
                        <div class="userName" id="userName"><?= $_SESSION['nickname'] ?? '' ?></div>
                        <div class="role"><?= $_SESSION['role'] ?? '' ?></div>
                    </div>
                    <img src="./assets/images/<?= $_SESSION['image'] ?? '' ?>" class="profilLogo <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>" id="profilLogo" alt="profil logo">
                    <div class="profilMenu">
                    <a href="user.php">Profil</a>
                        <form method="post">
                            <button name="logout" value="logout">Déconnexion</button>
                        </form>                        
                    </div>
                </header>