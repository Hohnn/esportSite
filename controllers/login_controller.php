<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/../vendor/PHPMailer-master/src/Exception.php';
require __DIR__.'/../vendor/PHPMailer-master/src/PHPMailer.php';
require __DIR__.'/../vendor/PHPMailer-master/src/SMTP.php';

$User = new UserModel();


$regexMail = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";
$regexPassword = "/^(?=.*?[A-Z])(?=.*?[a-z]).{5,}$/";
$regexNickname = "/^[^0-9]\w+$/";
$regexText = "/./";
$regexUrl = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/";


//logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    setcookie("user", "", time()-3600);
    setcookie("id", "", time()-3600);
    header('location: ../index.php');
}

// login and create session
if (isset($_POST['submitLogin'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);
    $user = $User->getUserByMail($mail);
    if ($user) {
        if (password_verify($password, $user['USER_PASSWORD'])) {
            $_SESSION['user'] = $user['USER_USERNAME'];
            $_SESSION['id'] = $user['USER_ID'];  
            header('Location: ../index.php');
        } else {
            $errorPass = 'Ce mot de passe n’est pas valide.';
        }
    } else {
        $errorLog = 'Mauvaise adresse mail';
    }
}



//send mail for reset password
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
    if (isValid($regexPassword, $pass)) {
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
    
}
?>