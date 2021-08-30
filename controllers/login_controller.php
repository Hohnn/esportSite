<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/../vendor/PHPMailer-master/src/Exception.php';
require __DIR__.'/../vendor/PHPMailer-master/src/PHPMailer.php';
require __DIR__.'/../vendor/PHPMailer-master/src/SMTP.php';
/* $members = file_get_contents('./assets/json/members.json');
$membersList = json_decode($members)->members; */

/* if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    foreach($membersList as $member) {
        if ($login == $member->mail) {
            if (password_verify($password, $member->password)) {
                $_SESSION['nickname'] = $member->nickname;
                $_SESSION['image'] = $member->image;
                $_SESSION['role'] = $member->role;
                header('location: index.php');
            } else {
                $errorPass = 'Ce mot de passe n’est pas correct.';
            }
        } else {
            $errorLog = 'Mauvaise adresse mail';
        }
    }
} */

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location: index.php');
}

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPSecure = 'tls';
$mail->SMTPDebug  = 2; 
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username   =  'dawesportbf@gmail.com';   //Adresse email à utiliser
$mail->Password   =  'E7NXyZkDpUoBCF';         //Mot de passe de l'adresse email à utiliser
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Accepter SSL
$mail->Port = 465;

/*         $mail->SMTPAuth = 1; */
/*         $mail->CharSet = 'UTF-8'; //Format d'encodage à utiliser pour les caractères
if($mail->SMTPAuth){
    $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
    $mail->Username   =  'jean-bateee@hotmail.fr';   //Adresse email à utiliser
    $mail->Password   =  '9YEG4tPNHShXj8';         //Mot de passe de l'adresse email à utiliser
} */
/*         $mail->smtpConnect(); */
$mail->setFrom('from@example.com', 'Mailer'); // Personnaliser l'envoyeur
$mail->AddAddress('jean-bateee@hotmail.fr');
$mail->Subject    =  'Mon sujet';                      //Le sujet du mail
/* $mail->WordWrap   = 50; 	 */		                   //Nombre de caracteres pour le retour a la ligne automatique
$mail->Body = 'Mon message en texte brut test'; 	       //Texte brut
$mail->IsHTML(true);                             //Préciser qu'il faut utiliser le texte brut


if (isset($_POST['submitForgetMdp'])) {
    $email = htmlspecialchars($_POST['mail']) ?? '';
$User = new UserModel();
    $user = $User->getUserByMail($email) ?? false;
    if ($user) {
        $token = bin2hex(random_bytes(10));
        $User->setToken($user['USER_ID'], $token);
        header("location: /views/login.php?token=$token");
    }
    /* if (!$mail->send()) {
        echo 'Erreur, message non envoyé.';
        echo $mail->ErrorInfo;
    } else{
        echo 'Message bien envoyé';
    } */
}

if (isset($_POST['submitNewMdp'])) {

}
?>