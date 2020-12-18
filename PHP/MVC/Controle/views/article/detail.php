<?php ?>
<a href='<?php echo WEB_ROOT."categorie/detail?id=".$article->id_categorie?>' class="btn btn-primary">Retour</a>
<h1 style="text-align: center"><?php echo $article->titre ?></h1><br>
<p style="text-align: center">Ecrit le: <?php echo $article->date_ajout ?></p><br><br>
<h3 style="text-align: center"><?php echo $article->contenu ?></h3>
