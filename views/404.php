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
    <link rel="stylesheet" href="../assets/sass/about.css">
    <link rel="stylesheet" href="../assets/sass/404Page.css">
    <title>DAW esport</title>
</head>
<?php require  __DIR__.'/../components/header.php' ?>
                <section class="page">
                    <img src="../assets/images/404.png" alt="">
                    <h2 class="text"> <span>404</span>  PAGE</h2>
                    <h2 class="text">INTROUVABLE</h2>
                    <div id="redirect"></div>
                </section>
                <footer>
                            <div class="container-fluid my-4">
                                <div class="row gy-5">
                                    <div class="col">
                                        <div class="projet">
                                            <a href="../views/mention-legale.php">Mentions légales et CGU</a>
                                            <div>Projet d'étude pour la formation de Développeur Web et Web mobile</div>
                                            <div>Créé par <a href="https://www.linkedin.com/in/jean-baptiste-samson-76a18a208/" target="_blank">Jean-baptiste Samson</a></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="contact text-center">
                                            <h3>Contact</h3>
                                            <ul>
                                                <li>06.63.22.76.98</li>
                                                <li>dawesport@gmail.com</li>
                                                <li>20 Rue jean jacque-rousseau, 76600, <br>  Le Havre</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="social text-center">
                                            <h3>Réseaux sociaux</h3>
                                            <ul>
                                                <li><a href="https://www.facebook.com/DAWesport/"><i class="bi bi-facebook"></i></a></li>
                                                <li><a href="https://twitter.com/DAWesport"><i class="bi bi-twitter"></i></a></li>
                                                <li><a href="https://www.instagram.com/dawesport/"><i class="bi bi-instagram"></i></a></li>
                                            </ul>
                                            <div class="footer-copyright text-center pt-3">
                                                © 2021 Copyright <a href="https://mdbootstrap.com/"> DAWesport.com</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                        </footer>

            </main>
        </div>
    </div>

    


    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- page -->
    <script>setTimeout(function(){history.back();}, 10000);
            let number = 10
            let redirect = document.getElementById("redirect")
            redirect.innerHTML = 'Redirection dans ' + number + ' secondes';
            setInterval(function(){
                number--;
                redirect.innerHTML = 'Redirection dans ' + number + ' secondes';
            }, 1000);


</script>

</body>
</html>