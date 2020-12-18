
<h1>Liste des membres</h1>
<a href="<?php echo WEB_ROOT ?>membre/createEdit">+ ajouter</a>
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Position</th>
        <th>Id_Group</th>
    </tr>
    <?php
    //boucle pour afficher la liste
    /** @var MembreModel[] $membre */
    foreach ($membres as $membre) {
        ?>
        <tr>
            <td><a href="<?php echo WEB_ROOT ?>membre/detail?id=<?php echo $membre->id ?>"><?php echo $membre->name ?></a></td>
            <td><?php echo $membre->position ?></td>
            <td><?php echo $membre->id_band ?></td>
            <td><a href="<?php echo WEB_ROOT ?>membre/createEdit?id=<?php echo $membre->id ?>" class="btn btn-primary">Edit</a></td>
        </tr>
        <?php
    }
    ?>
</table>