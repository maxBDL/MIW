<?php ?>
<a href="<?php echo WEB_ROOT ?>categorie/liste" class="btn btn-primary">Retour</a>
<h1 style="text-align: center"><?php echo $categorie->nom ?></h1><br>
<h2 style="text-align: center"><?php echo $categorie->description ?></h2><br><br>
<h3 style="text-align: center">Nos différents articles</h3>
<table align="center">
    <thead>
    <tr>
        <th>Titre:</th>
        <th>Date:</th>
        <th>Action:</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (ArticleModel::getAllFrom($categorie->id) as $article) {
        echo '<tr><td><a href="'.WEB_ROOT.'article/detail?id='.$article->id.'">'.$article->titre.'</a></td><td>'.$article->date_ajout.'</td><td><a href="'.WEB_ROOT.'article/createEdit?id='.$article->id.'" class="btn btn-primary">Modifier</a><td><a href="'.WEB_ROOT.'article/delete?id='.$article->id.'" class="btn btn-danger">Supprimer</a></td></tr>';
    }
    ?>
    <tr><td><a href="<?php echo WEB_ROOT.'article/createEdit?id_categorie='.$categorie->id.'"'?> class="btn btn-primary">Ajouter un article</a></td></tr>
    </tbody>
</table>
