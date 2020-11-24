<?php
header('Content-Type: text/xml');

/**
 * @return PDO
 */
function getBdd()
{
    try {
        $bdd = new PDO(
            'mysql:host=localhost;dbname=produit;charset=utf8',
            'root',
            '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
        );
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

$bdd = getBdd();

$codeCat = $_GET['codeCat'];

$reponse = $bdd->prepare('SELECT libPro FROM produits WHERE produits.codeCat = :code');
$reponse->bindValue(':code', $codeCat, PDO::PARAM_INT);
$reponse->execute();

$fichXml  =  "<?xml version=\"1.0\"?>";
$fichXml .= "<produits>";
while ($donnees = $reponse->fetch()) {
    $fichXml .= "<produit>" . $donnees['libPro'] . "</produit> ";
}

$fichXml .= "</produits>";
echo $fichXml;


$reponse->closeCursor();
