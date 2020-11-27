<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "france";

    $liaisonbd = new mysqli($servername, $username, $password, $dbname);
    $req = $liaisonbd->query("SELECT departement_code, departement_slug  FROM departements ORDER BY departement_slug");
    // $rows tableau qui contiendra  les produits
    $rows = array();
    while($r = mysqli_fetch_assoc($req)) {
        $rows[] = $r;
    }
    //var_dump($rows);
    echo json_encode($rows);
?>