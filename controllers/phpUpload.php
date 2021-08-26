<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    return false;
}


function store($tmp_name, $uid, $ext)
{
    move_uploaded_file($tmp_name, "./assets/img/" . $uid . "." . $ext);
}

// enregistre sur le server
if (isset($count) && $count == 0) {

    function upload($img_file, $type = "image", $size = 1000000)
    {
        if (!isset($_POST["submit"])) {
            return false;
        }

        $img_file = $_FILES[$img_file] ?? false; # on "identifie" $img_file
        $type = "/$type/"; # on prépare la regex
        $msgArray = []; # notre liste de messages
        
        if ($img_file && $img_file["error"] == 0) {
            if (!preg_match($type, mime_content_type($img_file["tmp_name"]))) { # si c'est pas une image
                $msgArray[] = "Votre fichier n'est pas une image";
            } elseif ($img_file["size"] > $size) { # si le fichier est plus grand que 1Mo
                $msgArray[] = "Désolé, votre fichier doit faire moins de 1 Mo";
            }

            if (count($msgArray) != 0) { # si il y a un déjà message dans notre array
                $msgArray[] = "Votre fichier n'a pas été upload.";
            } else { # dans le cas ou tout est bon
                $uid = uniqid();
                $uid = $_SESSION['nickname'] . $uid;
                $ext = pathinfo($img_file["name"])["extension"];
                store($img_file["tmp_name"], $uid, $ext);
                $msgArray[] = "Le fichier " . $uid . "." . $ext . " a bien été uploadé.";
                $_SESSION['size'] = $_SESSION['size'] + $img_file["size"];
            }
        }

        if ($img_file["error"] == 4) {
            $msgArray[] = "Veuillez choisir un fichier.";
        }
        $res = "";
        foreach ($msgArray as $msg) {
            $res .= "<p>" . $msg . "</p>";
        }
        
        return $res;
    }

$uploaded = upload("img");

}

?>