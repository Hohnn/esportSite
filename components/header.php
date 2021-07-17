<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <aside class="col-3">
                    <div class="stick">
                        <div class="brand">DAW <span class="d-none d-lg-inline-block">esport</span></div>
                        <nav>
                            <a href="index.php" class="d-flex"><i class="bi bi-newspaper"></i><div class="ms-3 d-none d-lg-block">Actualité</div></a>
                            <a href="#" class="d-flex"><i class="bi bi-mouse2"></i><div class="ms-3 d-none d-lg-block">Compétiton</div></a>
                            <a href="#" class="d-flex"><i class="bi bi-trophy"></i><div class="ms-3 d-none d-lg-block">League</div></a>
                            <a href="#" class="d-flex"><i class="bi bi-people"></i><div class="ms-3 d-none d-lg-block">Team</div></a>
                        </nav>
                    </div>
            </aside>
            <main class="col">
                <header>
                    <input type="search" placeholder="Recherche" class="d-none d-md-block  me-auto ">
                    <i class="bi bi-bell mx-3 <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>"></i>
                    <i class="bi bi-chat-left-text <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>"></i>
                    <a href="login.php" class="<?= isset($_SESSION['nickname']) ? 'd-none' : 'd-block' ?>">Se connecter</a>
                    <div class="userInfos <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>">
                        <div class="userName" id="userName"><?= $_SESSION['nickname'] ?? '' ?></div>
                        <div class="role"><?= $_SESSION['role'] ?? '' ?></div>
                    </div>
                    <img src="./assets/images/<?= $_SESSION['image'] ?? '' ?>" class="profilLogo <?= isset($_SESSION['nickname']) ? 'd-block' : 'd-none' ?>" id="profilLogo" alt="profil logo">
                    <div class="profilMenu">
                        <a href="user.php?nickname=<?= $_SESSION['nickname'] ?? '' ?>">Profil</a>
                        <a href="admin.php" class="<?= $_SESSION['role'] == 'admin' ? 'd-block' : 'd-none' ?>">Admin</a>
                        <form method="post">
                            <button name="logout" value="logout">Déconnexion</button>
                        </form> 
                    </div>
                </header>