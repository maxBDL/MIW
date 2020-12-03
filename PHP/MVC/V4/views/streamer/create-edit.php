<?php
/** @var StreamerModel $streamer */
?>
<form method="post" action="<?php echo WEB_ROOT ?>streamer/post<?php echo $streamer->id?'?id='.$streamer->id:'' ?>">
    <label>Nom :</label> <input type="text" name="nom" value="<?php echo $streamer->nom ?>"><br />
    <label>Url twitch :</label> <input type="text" name="url_twitch" value="<?php echo $streamer->url_twitch ?>"><br />
    <input type="submit">
</form>