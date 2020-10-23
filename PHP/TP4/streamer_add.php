<?php
require_once 'config.php';
require_once 'class/streamer.php';
require_once 'class/don.php';
?>


    <a href="index.php">< Retour</a><br><br>


<?php
if (isset($_GET['ids'])) {
    //si l'id est communiqué on modifiera le streamer
    $streamer = Streamer::find($_GET['ids']);
    echo '<h1>Modification de ' . $streamer->nom . '</h1>';
} else {
    //si l'id n'est pas communiqué on creera un nouveau streamer
    $streamer = new Streamer();
    echo '<h1>Ajout d\'un nouveau streamer</h1>';
}
?>

    <fieldset>
        <form method="get">
            <label for="id">Id</label>
            <input type="number" id="id" name="id"
                   value="<?php echo isset($streamer->id) ? $streamer->id : null ?>" readonly><br>
            <label for="nm">Nom</label>
            <input type="text" id="nm" name="nom" value="<?php echo isset($streamer->nom) ? $streamer->nom : '' ?>"
                   required><br>
            <label for="url">Url</label>
            <input type="text" id="url" name="url_twitch"
                   value="<?php echo isset($streamer->url_twitch) ? $streamer->url_twitch : '' ?>" required><br>
            <button type="submit" name="button"
                    value="m"><?php echo isset($streamer->id) ? 'Modifier' : 'Créer' ?></button>
        </form>
    </fieldset>


<?php

//Creation du nouveau streamer ou modification de l'ancien
if (isset($_GET['button'])) {
    $streamer = new Streamer($_GET);
    $streamer->save();
}
