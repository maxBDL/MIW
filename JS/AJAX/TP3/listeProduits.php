<?php               

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "produits";

sleep(3); //pour simuler une attente


if(isset($_GET['codeCat']) && $_GET['codeCat'] != "") {
        $codeCat = htmlentities($_GET['codeCat']);
        $liaisonbd = new mysqli($servername,$username,$password ,$dbname);
        $result = $liaisonbd->query("SELECT numPro,libPro FROM produits WHERE codeCat=".$codeCat." ORDER BY libPro ;");
		
		// $rows tableau qui contiendra  les produits
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
			$rows[] = $r;
		}
        // encodage du tableau en Json
		echo json_encode($rows);
}

?>
