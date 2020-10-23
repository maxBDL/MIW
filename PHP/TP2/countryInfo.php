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

    if (isset($_GET['code'])){
        $codeP = $_GET['code'];
    }
    echo '<a href="country.php">Retour</a><br><br>';
    echo 'code | name | continent | region | surfacearea | indepyear | population | lifeexpectancy | gnp | gnpold | LocalName | governmentform | headofstate | capital | code2 | <br /><hr>';

    $res = $bdd->query("SELECT * FROM country WHERE code='".$_GET['code']."'");
    $row = $res->fetch();
    echo $row['code'].' | '.$row['name'].' | '.$row['continent'].' | '.$row['region'].' | '.$row['surfacearea'].' | '.$row['indepyear'].' | '.$row['population'].' | '.$row['lifeexpectancy'].' | '.$row['gnp'].' | '.$row['gnpold'].' | '.$row['LocalName'].' | '.$row['governmentform'].' | '.$row['headofstate'].' | '.$row['capital'].' | '.$row['code2'].' | '.'<br />';
    $res->closeCursor();
