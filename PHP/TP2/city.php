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
echo 'code | name | continent | region | surfacearea | indepyear | population | lifeexpectancy | gnp | gnpold | LocalName | governmentform | headofstate | capital | code2 | <br />';


$res = $bdd->query('SELECT * FROM city');
while ($row = $res->fetch()) {
    echo $row['name'].' | <a href="countryInfo.php?code='.$row['countrycode'].'">'.$row['countrycode'].'</a> | '.$row['district'].' | '.$row['population'].'<br />';
    echo '<hr>';
}

$res->closeCursor();
