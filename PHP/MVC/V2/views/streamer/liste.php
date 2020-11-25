<h1>Liste des streamers</h1>
<ul>
<?php
//boucle pour afficher la liste
/** @var StreamerModel[] $streamers */
foreach ($streamers as $streamer) {
    ?>
    <li><a href="<?php echo WEB_ROOT ?>streamer/detail?id=<?php echo $streamer->id ?>"><?php echo $streamer->nom ?></a></li>
    <?php
}
?>
</ul>
