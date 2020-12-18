<?php
/** @var CategorieModel $categorie */
?>
<h1 style="text-align: center">Création/Modification de catégorie</h1><br><br>
<form align="center" method="post" action="<?php echo WEB_ROOT ?>categorie/post<?php echo $categorie->id?'?id='.$categorie->id:'' ?>">
    <label>Nom :</label> <input type="text" name="nom" value="<?php echo $categorie->nom ?>"><br />
    <label>Description :</label> <input type="text" name="description" value="<?php echo $categorie->description?>"><br />
    <input type="submit">
</form>