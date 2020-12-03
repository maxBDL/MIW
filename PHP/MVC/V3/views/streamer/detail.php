

<h1>Detail de streamer</h1>

<?php

/** @var StreamerModel[] $streamers */

echo 'Pseudo: '.$streamers->nom.'<br>';
echo 'Lien: <a href="'.$streamers->url_twitch.'">'.$streamers->url_twitch.'</a>';

?>

<h1>Liste des dons</h1>

        <table>
            <thead>
                <th>Pseudo</th>
                <th>Message</th>
                <th>Montant</th>
            </thead>
            <tbody>
    <?php

/** @var DonModel[] $dons */
    foreach ($dons as $don) {
    ?>
            <tr><td><?php echo $don->pseudo ?></td>
            <td><?php echo $don->message ?></td>
            <td><?php echo $don->montant ?></td></tr>

    <?php
}
?>

            </tbody>
        </table>


<h1>Faire un don</h1>

<form action="../don/don">
    <table>
        <tbody>
            <tr>
                <td>Pseudo:</td>
                <td>
                    <input type="text" name="pseudo" required>
                    <input type="text" name="id_streamer" value="<?php echo $_GET['id']?>" style="display: none" required>
                </td>
            </tr>
            <tr>
                <td>Montant:</td>
                <td>
                    <input type="text" name="montant" placeholder="€" required>
                </td>
            </tr>
            <tr>
                <td>Message</td>
                <td>
                    <textarea name="message"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit">
                </td>
            </tr>
        </tbody>
    </table>
</form>
