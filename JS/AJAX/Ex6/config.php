
<?php


/**
 * @return PDO
 */
function getBdd()
{
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
}

$bdd = getBdd();

$reponse = $bdd->prepare('SELECT * FROM categories');
$reponse->execute();

$tabJson = array();
while ($donnees = $reponse->fetch()) {
    array_push($tabJson, array(
        "codeCat" => $donnees["codeCat"],
        "libCat" => $donnees["libCat"],
    ));
}
echo (json_encode($tabJson));

$reponse->closeCursor();
