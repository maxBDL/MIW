<?php
/** @var MembreModel $membre */
p($nomBand);
?>
<form method="post" action="<?php echo WEB_ROOT ?>membre/post<?php echo $membre->id?'?id='.$membre->id:'' ?>">
    <label>Name :</label> <input type="text" name="name" value="<?php echo $membre->name ?>"><br />
    <label>Position :</label> <input type="text" name="position" value="<?php echo $membre->position ?>"><br />
    <label>Id_band :</label><input  type="text" name="id_band" value="<?php  if(isset($_GET['id_band'])){echo $_GET['id_band'];}else{echo $membre->id_band;}?>">
    <input type="submit">
</form>

