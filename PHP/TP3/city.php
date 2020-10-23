<?php
//inclu getBdd()
require_once 'config.php';
require_once 'class/city.php';
require_once 'class/country.php';
require_once 'class/language.php';
?>

<a href="index.php">< Retour</a><br><br>
<a href="city_add.php">Nouvelle ville</a><br><br>
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
    $cities = City::findAll();

    foreach ($cities as  $item) {
        echo '<tr>';
        echo '<td>'.$item->id.'</td>';
        echo '<td>'.$item->name.'</td>';
        echo '<td>'.$item->id.'</td>';
        echo '<td>'.$item->countrycode.'</td>';
        echo '<td>'.$item->district.'</td>';
        echo '<td>'.$item->population.'</td>';
        echo '<td><a href="city_add.php?id='.$item->id.'">Modification</a></td>';
        echo '<td><a href="city_remove?id='.$item->id.'">Suppression</a></td>';
        echo'</tr>';
    }

    ?>
</table>




