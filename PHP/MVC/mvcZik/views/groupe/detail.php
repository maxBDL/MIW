
<h1>Listes des membres du groupe : <?php echo $groupe->name ?></h1>

<table class="table">
    <tr>
        <th>Nom</th>
        <th>Position</th>
    </tr>
    <?php
    //boucle pour afficher la liste
    /** @var GroupeModel[] $membres */
    /** @var GroupeModel[] $groupe */
    foreach ($membres as $membre) {
        ?>
        <tr>
            <td><a href="<?php echo WEB_ROOT ?>membre/createEdit?id=<?php echo $membre->id ?>"><?php echo $membre->name ?></a></td>
            <td><?php echo $membre->position ?></td>
            <td><a href="<?php echo WEB_ROOT ?>membre/delete?id=<?php echo $membre->id ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
        </tr>
        <?php
    }
    ?>
</table>

<a href="<?php echo WEB_ROOT ?>membre/createEdit?id_band=<?php echo $groupe->id ?>"><button type="button" class="btn btn-primary">Ajouter un membre</button></a>