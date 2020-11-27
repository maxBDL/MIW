<?php     
	header("Content-Type: text/xml");  // A ne pas oublier si on retourne du XML

	$servername = "localhost";
	$username   = "root";
	$password   = "";
	$dbname     = "produits";

	$liaisonbd = new mysqli($servername,$username ,$password,$dbname);
	// comparaison mysqli et PDO : https://algocool.fr/mysqli-pdo/

	sleep(3);      //pour simuler une attente

	// Exécution de la requête permettant de récupérer les produits
	$result = $liaisonbd->query("SELECT * FROM categories  ORDER BY libCat");

	$texte="<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>";
	$texte.="<select>";
	$texte.="<option value='0'>Catégories....</option>";
	while ($row = $result->fetch_assoc()) {
		$texte .="<option value=\"".$row["codeCat"]."\">".$row["libCat"]."</option>\n";
	}
	$texte.="</select>";
	echo $texte;
?>
