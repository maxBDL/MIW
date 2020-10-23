<?php

//inclu getBdd()
require_once 'config.php';
require_once 'class/city.php';
require_once 'class/country.php';
require_once 'class/language.php';
?>

<a href="city.php">< Retour</a><br><br>

<?php
    if (isset($_GET['id'])){
        $city = City::find($_GET['id']);
        /*$bdd = getBdd();
        $reqRecherche = $bdd->prepare('SELECT * FROM country WHERE code=:code');
        $reqRecherche->bindValue('code', $_GET['code']);
        $reqRecherche->execute();
        $res = $reqRecherche->fetch(PDO::FETCH_ASSOC);*/
    }else{
        $city = new City();
    }
    ?>
    <h1>Supression de <?php echo $city->name?></h1>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Country Code</th>
            <th>District</th>
            <th>Population</th>
        </tr>
    </thead>

<?php

echo '<tr>';
echo '<td>'.$city->id.'</td>';
echo '<td>'.$city->name.'</td>';
echo '<td>'.$city->id.'</td>';
echo '<td>'.$city->countrycode.'</td>';
echo '<td>'.$city->district.'</td>';
echo '<td>'.$city->population.'</td>';
echo'</tr>';

$city->delete();