<?php
//inclu getBdd()
require_once 'config.php';
require_once 'class/city.php';
require_once 'class/country.php';
require_once 'class/language.php';
?>

echo '<a href="index.php">< Retour</a><br><br>';
echo 'code | name | continent | region | surfacearea | indepyear | population | lifeexpectancy | gnp | gnpold | LocalName | governmentform | headofstate | capital | code2 | <br />';


$res = $bdd->query('SELECT * FROM countrylanguage');
while ($row = $res->fetch()) {
    echo '<a href="countryInfo.php?code='.$row['countrycode'].'">'.$row['countrycode'].'</a> | '.$row['language'].' | '.$row['isofficial'].' | '.$row['percentage'].'<br />';
    echo '<hr>';
}
$res->closeCursor();