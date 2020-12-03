
<h1>Liste des streamers</h1>
<a href="<?php echo WEB_ROOT ?>streamer/createEdit">+ ajouter</a>
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Action</th>
    </tr>
    <?php
    //boucle pour afficher la liste
    /** @var StreamerModel[] $streamers */
    foreach ($streamers as $streamer) {
        ?>
        <tr>
            <td><a href="<?php echo WEB_ROOT ?>streamer/detail?id=<?php echo $streamer->id ?>"><?php echo $streamer->nom ?></a></td>
            <td><a href="<?php echo WEB_ROOT ?>streamer/createEdit?id=<?php echo $streamer->id ?>" class="btn btn-primary">Edit</a></td>
        </tr>
        <?php
    }
    ?>
</table>