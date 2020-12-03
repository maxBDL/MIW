
<h1>Liste des Groupes</h1>
<a href="<?php echo WEB_ROOT ?>band/createEdit">+ ajouter</a>
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Action</th>
    </tr>
    <?php
    //boucle pour afficher la liste
    /** @var BandModel[] $bands */
    foreach ($bands as $band) {
        ?>
        <tr>
            <td><a href="<?php echo WEB_ROOT ?>band/detail?id=<?php echo $band->id ?>"><?php echo $band->name ?></a></td>
            <td><a href="<?php echo WEB_ROOT ?>band/createEdit?id=<?php echo $band->id ?>" class="btn btn-primary">Edit</a></td>
        </tr>
        <?php
    }
    ?>
</table>