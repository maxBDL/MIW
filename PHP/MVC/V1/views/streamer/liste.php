<h1>Liste des streamers</h1>
<?php
//boucle pour afficher la liste

p($streamers);
p($streamers[0]);
p($streamers[0]['nom']);

for ($i = 0; $i < sizeof($streamers); $i++){
    echo '<p>'.$streamers[$i]['nom'].'</p>';
    echo '<p>'.$streamers[$i]['url'].'</p><br>';
}