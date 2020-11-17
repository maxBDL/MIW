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
         echo 'OK<br >';
         resizeImg($dossier.$fichier,200,50);
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

function resizeImg($sourcePath, $thumbWidth, $thumbHeight) {
   //extension fichier source
   $file = new SplFileInfo($sourcePath);
   $dossier = $file->getPath();
   $fichier = pathinfo($sourcePath)['filename'];
   $ext = strtolower($file->getExtension());
   //$ext = explode('.', $sourcePath);
   //$ext = $ext[count($ext)-1];

   switch ($ext) {
      case 'jpg':
      case 'jpeg':
         $source_gd_image = imagecreatefromjpeg($file);
         break;
      case 'gif':
         $source_gd_image = imagecreatefromgif($file);
         break;
      case 'png':
         $source_gd_image = imagecreatefrompng($file);
         break;
      default:
         throw new Exception('Le fichier source n\'est pas une image');
         return false;
         break;
      }

      //créer la miniature vide
      // $fileData = getimagesize($sourcePath);
      // $sourceWidth = $fileData[0];
      // $sourceHeight = $fileData[1];
      list($sourceWidth, $sourceHeight) = getimagesize($sourcePath);

      $thumbnail = imagecreatetruecolor($thumbWidth, $thumbHeight);
      $color = imagecolorallocate($thumbnail, 255, 255, 255);
      imagefill($thumbnail,0,0,$color);

      $width = $sourceWidth;
      $height = $sourceHeight;
      $new_width = $height*$thumbWidth/$thumbHeight;
      $new_height = $width*$thumbHeight/$thumbWidth;
      if ($new_width < $width) {
         $position_height = ($height-$new_height)/2;
         imagecopyresampled($thumbnail, $source_gd_image, 0, 0, 0, $position_height, $thumbWidth, $thumbHeight, $width, $new_height);
      } else {
         $position_width = ($width - $new_width)/2;
         imagecopyresampled($thumbnail, $source_gd_image, 0, 0, $position_width, 0, $thumbWidth, $thumbHeight, $new_width, $height);
      }

      //on enregistre la miniature sur le serveur
      switch ($ext) {
         case 'jpg':
         case 'jpeg':
            imagejpeg($thumbnail, $dossier.'/thumb_'.$fichier.'.jpg', 90);
            break;
         case 'gif':
            imagejpeg($thumbnail, $dossier.'/thumb_'.$fichier.'.gif', 90);
            break;
         case 'png':
            imagejpeg($thumbnail, $dossier.'/thumb_'.$fichier.'.png', 90);
            break;
         default:
            throw new Exception('Le fichier source n\'est pas une image');
            return false;
            break;
         }

      imagedestroy($source_gd_image);
      imagedestroy($thumbnail);
      return true;
   }

   //lecture des fichiers
   readDirectory('upload');



   ?>


   <form enctype="multipart/form-data" method="post">
      Fichier : <input type="file" name="photo"><br/>
      <input type="submit" value="Envoyer">
   </form>
