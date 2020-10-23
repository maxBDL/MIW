<?php
require_once 'config.php';
require_once 'class/streamer.php';
require_once 'class/don.php';


if (isset($_GET['id'])) {
    $streamer = Streamer::find($_GET['id']);
} else {
    $streamer = new Streamer();
}
?>

    <a href="index.php">< Retour Accueil</a>

    <h1>Merci de donner pour Amnesty International</h1>
    <h2>Don pour <?php echo $streamer->nom?></h2>
    <form>
        <fieldset>
            <label>Streamer: <?php echo $streamer->nom?></label>
            <!-- permet de fixe le don sur ce streamer-->
            <input type="text" name="id_streamer" value="<?php echo $streamer->id ?>" readonly><br>
            <label>Pseudo</label>
            <input type="text" name="pseudo" required><br>
            <label>Message</label>
            <textarea name="message"></textarea><br>
            <label>Montant</label>
            <!-- permet de faire un don avec des centime, pour une valeur minimale de 1€-->
            <input type="number" step="0.01" min="1" name="montant" required><br>
            <label>Date</label>
            <!-- permet de fixer le don dans les dates du zevent-->
            <input type="datetime-local" name="date"  min="2020-10-16" max="2020-10-18"required><br>
            <button type="submit" name="button">Donner</button>
        </fieldset>
    </form>

<?php
if (isset($_GET['button'])) {
    //recuperation des champs grace a l'url -> creation d'un nouveau don
    $don = new Don($_GET);
    $don->create();
}
