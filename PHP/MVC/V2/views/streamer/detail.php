<h1 style="text-align: center"><?php echo $streamer->nom ?></h1>
<h2>Lien de la chaine twitch: <a href="<?php echo $streamer->url_twitch ?>">ici</a></h2>

<h3 style="text-align: center;">Dons:</h3>
<table border="1" align="center">
    <thead>
        <tr>
            <td>Pseudo: </td>
            <td>Message: </td>
            <td>Montant: </td>
            <td>Date: </td>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($dons as $item){
            echo '    <tr><td>'.$item->pseudo.'</td><td>'.$item->message.'</td><td>'.$item->montant.'</td><td>'.$item->date.'</td></tr>';
    }
    ?>
    </tbody>
</table>


<!--
<form>
    <label>Pseudo: </label>
    <input type="text"><br>
    <label>Message: </label>
    <textarea ></textarea><br>
    <label>Montant: </label>
    <input type="number"><br>
    <button type="submit">Faire un don</button>
</form>
-->



