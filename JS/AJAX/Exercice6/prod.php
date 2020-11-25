<?php
try {
    $bdd = new PDO(
        'mysql:host=localhost;dbname=ajax;charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
    );
    return $bdd;
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//Requete de recuperation des produits d'une categorie
$req = $bdd->prepare('SELECT * FROM produits WHERE codeCat=:codeCat');
$req->bindValue('codeCat', $_POST['codeCat']);
$req->execute();

$repJSON = array();
while ($produit = $req->fetch()){
    console.log($produit);
    /*array_push($repJSON, array(
        "numPro" => $produit["num"],
        "libPro" => $produit["nom"],
        "codeCat" => $produit
    ))*/
}
$rep->closeCursor();
?>

