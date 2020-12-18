<?php
/** @var ArticleModel $article */
?>
<h1 style="text-align: center">Création/Modification d'article</h1><br><br>
<form align="center" method="post" action="<?php echo WEB_ROOT ?>article/post<?php echo $article->id?'?id='.$article->id:'' ?>">
    <input type="hidden" name="id_categorie" value="<?php echo isset($_GET['id_categorie'])?$_GET['id_categorie']:$article->id_categorie ?>"><br />
    <label>Titre :</label> <input type="text" name="titre" value="<?php echo $article->titre ?>"><br />
    <label>Contenu :</label> <input type="text" name="contenu" value="<?php echo $article->contenu?>"><br />
    <input type="submit">
</form>
