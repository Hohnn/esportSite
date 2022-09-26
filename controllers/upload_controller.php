<?php
$session = $_SESSION ?? false;
if (!$session) {
    session_start();
}


function store($tmp_name, $uid, $ext)
{
    move_uploaded_file($tmp_name, "../assets/images/user_logo/" . $uid . "." . $ext);
}


    function upload($img_file, $type = "image", $size = 1000000)
    {


        $img_file = $_FILES[$img_file] ?? false; # on "identifie" $img_file
        $type = "/$type/"; # on prépare la regex
        $msgArray = []; # notre liste de messages
        
        if ($img_file && $img_file["error"] == 0) {
            if (!preg_match($type, mime_content_type($img_file["tmp_name"]))) { # si c'est pas une image
                $msgArray[] = "Votre fichier n'est pas une image";
            } elseif ($img_file["size"] > $size) { # si le fichier est plus grand que 1Mo
                $msgArray[] = "Le fichier doit faire moins de 1 Mo";
            }
            if (count($msgArray) != 0) { # si il y a un déjà message dans notre array
                $msgArray[] = "Votre fichier n'a pas été upload.";
            } else { # dans le cas ou tout est bon
                $uid = uniqid();
                $uid = $_SESSION['user'] . $uid;
                $ext = pathinfo($img_file["name"])["extension"];
                $User = new UserModel();
                $dir = scandir("../assets/images/user_logo");
                $userLogoName = $User->getUserById($_SESSION['id'])['USER_LOGO'];
                if (in_array($userLogoName, $dir)) {
                    unlink("../assets/images/user_logo/$userLogoName");
                }
                $User->setUpdateUserLogo($_SESSION['id'], "$uid.$ext");
                store($img_file["tmp_name"], $uid, $ext);
            }
        }
        return $msgArray;
    }

?>