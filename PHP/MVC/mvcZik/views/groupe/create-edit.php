<?php
/** @var GroupeModel $groupe */
?>
<form method="post" action="<?php echo WEB_ROOT ?>groupe/post<?php echo $groupe->id?'?id='.$groupe->id:'' ?>">
    <label>Name :</label> <input type="text" name="name" value="<?php echo $groupe->name ?>"><br />
    <label>Pays d'origine :</label> <input type="text" name="country_origin" value="<?php echo $groupe->country_origin ?>"><br />
    <label>Date de création :</label> <input type="text" name="year_creation" value="<?php echo $groupe->year_creation ?>"><br />
    <input type="submit">
</form>