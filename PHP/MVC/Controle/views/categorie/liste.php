
<h1>Liste des Catégories</h1>
<a href="<?php echo WEB_ROOT ?>categorie/createEdit">+ ajouter</a>
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Action</th>
    </tr>
    <?php
    //boucle pour afficher la liste
    /** @var CategorieModel[] $categories */
    foreach ($categories as $categorie) {
        ?>
        <tr>
            <td><a href="<?php echo WEB_ROOT ?>categorie/detail?id=<?php echo $categorie->id ?>"><?php echo $categorie->nom ?></a></td>
            <td><a href="<?php echo WEB_ROOT ?>categorie/createEdit?id=<?php echo $categorie->id ?>" class="btn btn-primary">Modifier</a></td>
        </tr>
        <?php
    }
    ?>
</table>