<?php
//inclu getBdd()
require_once 'config.php';
require_once 'class/city.php';
require_once 'class/country.php';
require_once 'class/language.php';
?>

    <a href="index.php">< Retour</a><br><br>
    <a href="country_add.php">Nouveau pays</a><br><br>
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th><a href="country.php<?php echo isset($_GET['sort'])?"":"?sort=true"?>">Name </a></th>
            </tr>
        </thead>
        <?php
        if (isset($_GET['sort'])){
            $countries = Country::sortNameDesc();
        }else{
            $countries = Country::findAll();
        }

            foreach ($countries as  $item) {
                echo '<tr>';
                echo '<td><a href="countryInfo.php?code='.$item->code.'">'.$item->code.'</a></td>';
                echo '<td>'.$item->name.'</td>';
                echo '<td><a href="country_add.php?code='.$item->code.'">Modification</a></td>';
                echo '<td><a href="#?code='.$item->code.'">Suppression</a></td>';
                echo'</tr>';
            }

        ?>
    </table>
