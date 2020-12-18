<?php
/** @var tourModel $tour */
?>
<form method="post" action="<?php echo WEB_ROOT ?>tour/post<?php echo $tour->id?'?id='.$tour->id:'' ?>">
    <label>Place :</label> <input type="text" name="place" value="<?php echo $tour->place ?>"><br />
    <label>Date :</label> <input type="text" name="date" value="<?php echo $tour->date ?>"><br />
    <label>Price :</label> <input type="text" name="price" value="<?php echo $tour->price ?>"><br />
    <label>Id_Band :</label> <input type="text" name="id_band" value="<?php echo $tour->id_band ?>"><br />
    <input type="submit">
</form>