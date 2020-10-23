<?php
try{
    $bdd = new PDO(
        'mysql:host=localhost;dbname=world;charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING)
    );
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }

    echo '<a href="menu.html">< Retour</a><br><br>';

    echo '<a href="country_add.php">Nouveau pays</a><br><br>';


    //Affichage simple des pays
    echo 'Code | Name <br/><hr>';
    $res = $bdd->query('SELECT * FROM country');
    while ($row = $res->fetch()) {
        echo '<a href="countryInfo.php?code='.$row['code'].'">'.$row['code'].'</a> | '.$row['name'].' | <a href="country_add.php?code='.$row['code'].'">Modification</a> | <a href="#">Suppression</a><br />';
        echo '<hr>';
    }


$res->closeCursor();