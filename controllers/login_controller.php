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
    header('location: ../index.php');
}

                            //Préciser qu'il faut utiliser le texte brut

$User = new UserModel();

if (isset($_POST['submitForgetMdp'])) {
    $email = htmlspecialchars($_POST['mail']) ?? '';
    $user = $User->getUserByMail($email) ?? false;
    if ($user) {
        $token = bin2hex(random_bytes(10));
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPSecure = 'tls';
/*         $mail->SMTPDebug  = 2;  */
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username   =  'dawesportbf@gmail.com';   //Adresse email à utiliser
        $mail->Password   =  'E7NXyZkDpUoBCF';         //Mot de passe de l'adresse email à utiliser
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Accepter SSL
        $mail->Port = 465;
        $mail->setFrom('dawesportbf@gmail.com', 'DAW eSport'); // Personnaliser l'envoyeur
        $mail->AddAddress("$email");
        $mail->Subject    =  'Changement de mot de passe';                      //Le sujet du mail           //Nombre de caracteres pour le retour a la ligne automatique
        $mail->Body = 'Bonjour, pour finaliser l\'opération, veuillez entrer votre nouveau mot de passe à l\'adresse suivante : <a href="http://esportsite/views/login.php?token=' . $token . '">cliquez ici</a>'; 	       //Texte brut
        $mail->IsHTML(true); 
        $User->setToken($user['USER_ID'], $token);
        /* header("location: /views/login.php?token=$token"); */
        if (!$mail->send()) {
            echo 'Erreur, message non envoyé.';
            echo $mail->ErrorInfo;
        } else{
            $mailSuccess = "Un mail vous à été envoyé avec les instructions à suivre.";
        }
    } else {
        $errorLog = "Cette adresse mail n'est pas inscrit";
    }
}

if (isset($_POST['submitNewMdp'])) {
    $token = htmlspecialchars($_POST['token']) ?? '';
    $pass = htmlspecialchars($_POST['password']) ?? '';
    $confirmPass = htmlspecialchars($_POST['confirmPassword']) ?? '';
    if (!empty($pass) && $pass == $confirmPass) {
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        if ($User->setUpdateUserPassword($token, $passHash)) {
            $User->removeUserToken($token);
            header('location: /views/login.php?updatePass=success');
        } else {
            header('location: /views/login.php?updatePass=error');
        }
    } else {
        $errorConfirmPass = 'Les mots de passe ne correspondent pas';
    }
}
?>