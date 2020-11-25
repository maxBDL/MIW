   <?php
   header('Content-Type: text/xml');
   // IMPORTANT c'est ce qui permet à PHP d'indiquer au navigateur le format du fichier retourné.
   // Supprimer cette instruction header si le programme retourne des données au format texte ( HTML , Json )
   try {
      $bdd = new PDO('mysql:host=localhost;dbname=tp_ajax;charset=utf8', 'root', '');
   }
   catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
   }
   // On souhaite récupérer tout le contenu de la table produits
   // $reponse = $bdd->query('SELECT * FROM produits');
   // l'écriture ci-dessus est à éviter car elle n'est pas sécurisée. Il est préférable de préparer la requête comme ci-dessous
   $reponse = $bdd->prepare('SELECT * FROM produits WHERE codeCat=:codeCat');
   $reponse->bindValue('codeCat', $_GET['codeCat']);
   $reponse->execute();
   // Remarque : la requête ci-dessus ne présente pas vraiment de risque car il n'y a pas de variable.
   // Par contre, si l'on ne veut retourner que certains produits dont le nom se trouve dans la variable $_GET('nom')
   // et le prix maximal dans la variable $_GET('max')
   // il faut écrire:
   // $reponse = $bdd->prepare('SELECT * FROM produits where nom = ? and prix <= ?');
   // $reponse->execute(array($_GET['num'],$GET['max']));
   // la requête ci-dessus est sécurisée et ne permet pas des injections SQL
   // Autre écriture équivalente sans ? mais avec des marqueurs nominatifs précédés de :
   // $reponse = $bdd->prepare('SELECT num, nom, prix FROM produits WHERE nom = :nom AND prix <= :prixmax');
   // $req->execute(array('nom' => $_GET['nom'], 'prixmax' => $_GET['max']));
   // Création de la chaine $fichXml qui contiendra le fichier xml généré
   $fichXml = "<?xml version=\"1.0\"?>";
   $fichXml .= "<exemple>";
   while ($produit = $reponse->fetch()){
      $fichXml .= "<produit><numPro>".$produit['numPro']."</numPro><libPro>".$produit['libPro']."</libPro><codeCat>".$produit['codeCat']."</codeCat></produit>";
   }
   $fichXml .= "</exemple>";
   echo $fichXml;
   /*
   // Création du tableau $tabJson contiendra le fichier Json généré
   // ATTENTION dans ce cas il faut supprimer l'instruction header qui se trouve au début du programme
   $tabJson = array();
   while ($donnees = $reponse->fetch()){
   array_push($tabJson, array(
   "num" => $donnees["num"],
   "nom" => $donnees["nom"],
   "prix" => $donnees["prix"]));
   }
   echo(json_encode($tabJson)); transforme la structure Json en chaine de caractères*/

   $reponse->closeCursor(); // Termine le traitement de la requête
?>
