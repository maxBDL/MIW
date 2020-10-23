<?php
require_once 'config.php';
require_once 'class/streamer.php';
require_once 'class/don.php';
?>

<h1 style="text-align: center; font-size: 5em">Bienvenue au Zevent</h1>
<h2>Merci pour les <?php echo Don::total()[0]?> €</h2>
<table style="margin-left: auto;margin-right: auto;">
    <thead>
    <tr>
        <th style="font-size: 2em">Streamer</th>
        <th style="font-size: 2em">Total de dons (€)</th>
    </tr>
    </thead>

    <?php
    //affichage du nom du streamer ainsi que le total de ses dons
    $streamers = Streamer::findAll();
    foreach ($streamers as $index) {
        echo '<tr>';
        echo '<td style="font-size: 1.2em"><a href="streamer.php?id=' . $index->id . '">' . $index->nom . '</a></td>';
        echo '<td style="font-size: 1.2em">' . Don::totalDon($index->id)[1] . '</td>';
        echo '</tr>';
    }
    ?>
</table>

<br><br>
<hr>
<!--Ajout d'un streamer-->
<a href="streamer_add.php">Ajouter un streamer</a>