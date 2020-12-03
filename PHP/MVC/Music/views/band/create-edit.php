<?php
/** @var BandModel $band */
?>
<form method="post" action="<?php echo WEB_ROOT ?>band/post<?php echo $band->id?'?id='.$band->id:'' ?>">
    <label>Nom :</label> <input type="text" name="name" value="<?php echo $band->name ?>"><br />
    <label>Pays d'origine :</label> <input type="text" name="country_origin" value="<?php echo $band->country_origin ?>"><br />
    <label>Date de creation :</label> <input type="text" name="year_creation" value="<?php echo $band->year_creation ?>"><br />
    <input type="submit">
</form>