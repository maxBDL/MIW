<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "france";

    if (isset($_GET['dep']) && $_GET['dep'] != "") {
        $codeDep = htmlentities($_GET['dep']);
        $liaisonbd = new mysqli($servername, $username, $password, $dbname);
        $result = $liaisonbd->query("SELECT ville_nom FROM villes WHERE ville_departement=". $codeDep. " ORDER BY ville_nom;");
        // $rows tableau qui contiendra  les produits
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        // encodage du tableau en Json
        echo json_encode($rows);
    }
?>