<?php
require_once 'config.php';
require_once 'class/streamer.php';
require_once 'class/don.php';
?>

<a href="index.php">< Retour</a>

<?php
if (isset($_GET['id'])) {
    $streamer = Streamer::find($_GET['id']);
}
?>

<h1 style="text-align: center;font-size: 5em">Page de <?php echo $streamer->nom ?></h1>
<h2>Pour visionner mon stream cliquez <a href="<?php echo $streamer->url_twitch ?>">ici</a></h2>
<!--- lien vers le formulaire de don de ce streamer-->
<h2>Pour faire un don à Amnesty International cliquez <a href="don.php?id=<?php echo $streamer->id ?>">ici</a></h2>

<table style="margin-left: auto; margin-right: auto">
    <thead>
    <tr>
        <th style="font-size: 2em"">ID</th>
        <th style="font-size: 2em">Pseudo</th>
        <th style="font-size: 2em">Message</th>
        <th style="font-size: 2em">Montant</th>
        <th style="font-size: 2em">Date</th>
    </tr>
    </thead>
    <?php
    $dons = Don::find($streamer->id);
    //affichage de toutes les infos du don fait a ce streamer
    foreach ($dons as $don) {
        echo '<tr>';
        echo '<td style="font-size: 1.2em">' . $don->id . '</td>';
        echo '<td style="font-size: 1.2em">' . $don->pseudo . '</td>';
        echo '<td style="font-size: 1.2em">' . $don->message . '</td>';
        echo '<td style="font-size: 1.2em">' . $don->montant . '</td>';
        $date = $don->date;
        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        echo '<td>' .$datetime->format('d-m-Y H:i:s') . '</td>';
        echo '</tr>';
    }
    ?>
</table>


<br><br>
<hr>
<a href="streamer_add.php?ids=<?php echo $streamer->id ?>">Modifier <?php echo $streamer->nom ?></a>
