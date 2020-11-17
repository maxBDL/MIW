<?php

function readDirectory($dir)
{
    if ($handle = opendir($dir)) {

        echo '<ul>';
        echo '<li>'.$dir;
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                if (is_dir($dir.'/'.$entry)) {
                    readDirectory($dir.'/'.$entry);
                } else {
                    echo '<li><a href="'.$dir.'/'.$entry.'" target="_blank">'.$entry.'</a> <a href="?del='.$dir.'/'.$entry.'">Supprimer</a></li>';
                }
            }
        }
        echo '</li>';
        echo '</ul>';

        closedir($handle);
    }
}


function resizeImg($sourcePath, $thumbnailWidth, $thumbnailHeight){
    $file = new SplFileInfo($sourcePath);
    $dossier = $file->getPath();
    $fichier = pathinfo($sourcePath)['filename'];
    $extension = strtolower($file->getExtension());

    switch ($extension){
        case 'jpg':
        case 'jpeg':
            $sourceImageBase = imagecreatefromjpeg($file);
            break;
        case 'gif':
            $sourceImageBase = imagecreatefromgif($file);
            break;
        case 'png':
            $sourceImageBase = imagecreatefrompng($file);
            break;
        default:
            throw new Exception('Le fichier source n\'est pas une image');
            return false;
    }
    $fileInfo = getimagesize($sourcePath);
    $sourceWidth = $fileInfo[0];
    $sourceHeight = $fileInfo[1];
    $thumbnail = imagecreatetruecolor($sourceWidth, $sourceHeight);
    imagecopyresampled($thumbnail, $sourceImageBase, 0,0,0,0, $thumbnailWidth, $thumbnailHeight, $sourceWidth, $sourceHeight);
    imagejpeg($thumbnail, $dossier.'/thumb_'.$fichier.'.jpg', 90);
    return true;
}


if (isset($_GET['del'])) {
    if (file_exists($_GET['del'])) {
        unlink($_GET['del']);
    }
    header('Location: index.php');
}

if (isset($_FILES['photo'])) {
    if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) { //pas d'erreur
        //enregistrement du fichier
        $dossier = 'upload/'.date('Y').'/'.date('m');
        $path = explode('/', $dossier);
        $dossier = '';
        //pour chaque dossier, on le créé s'il n'existe pas.
        foreach ($path as $dir) {
            $dossier .= $dir.'/';
            if (!is_dir($dossier)) { //si le dossier n'existe pas
                mkdir($dossier);
            }
        }
        //ou on peu mettre le nom de fichier que l'on veut pour être certain d'éviter les doublons
        $ext = pathinfo($_FILES['photo']['name'])['extension'];
        $fichier = date('YmdHis').'-'.rand(0,999).'.'.$ext;



        //upload/Upload de fichier.pdf
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)) {
            //la fonction renvoie true, le fichier a bien été enregistré
            resizeImg('upload/'.date('Y').'/'.date('m').'/'.$fichier, 150, 150*$fichier);
            echo 'OK<br >';
        } else {
            echo 'echec de l\'upload.<br >';
        }

    } else {
        //cas d'erreur
        switch ($_FILES['photo']['error']) {
            case UPLOAD_ERR_FORM_SIZE:
            case UPLOAD_ERR_INI_SIZE:
                echo 'Le fichier est trop lourd<br >';
                break;
            default:
                echo 'Erreur lors de l\'upload<br >';
                break;
        }
    }
}

//lecture des fichiers
readDirectory('upload');



?>


<form enctype="multipart/form-data" method="post">
    Fichier : <input type="file" name="photo"><br/>
    <input type="submit" value="Envoyer">
</form>
