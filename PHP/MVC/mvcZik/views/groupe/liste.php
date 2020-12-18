
<h1>Liste des groupes</h1>
<a href="<?php echo WEB_ROOT ?>groupe/createEdit">+ ajouter</a>
<table class="table-bordered" style="width: 900px">
    <thead class="thead-dark">
    <tr>
        <th>Nom</th>
        <th>Pays d'Origine</th>
        <th>Date de Création</th>
    </tr>
    </thead>
    <?php
    //boucle pour afficher la liste
    /** @var GroupeModel[] $groupe */
    foreach ($groupes as $groupe) {
        ?>
        <tr>
            <td><a href="<?php echo WEB_ROOT ?>groupe/detail?id=<?php echo $groupe->id ?>"><?php echo $groupe->name ?></a></td>
            <td><?php echo $groupe->country_origin ?></td>
            <td><?php echo $groupe->year_creation ?></td>
            <td><a href="<?php echo WEB_ROOT ?>groupe/createEdit?id=<?php echo $groupe->id ?>" class="btn btn-primary">Edit</a></td>
        </tr>
        <?php
    }
    ?>
</table>