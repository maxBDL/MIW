
<h1>Liste des Tours</h1>
<a href="<?php echo WEB_ROOT ?>tour/createEdit">+ ajouter</a>
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Position</th>
        <th>Id_Group</th>
    </tr>
    <?php
    //boucle pour afficher la liste
    /** @var tourModel[] $tour */
    foreach ($tours as $tour) {
        ?>
        <tr>
            <td><a href="<?php echo WEB_ROOT ?>tour/detail?id=<?php echo $tour->id ?>"><?php echo $tour->place ?></a></td>
            <td><?php echo $tour->place ?></td>
            <td><?php echo $tour->date ?></td>
            <td><?php echo $tour->price ?></td>
            <td><?php echo $tour->id_band ?></td>
            <td><a href="<?php echo WEB_ROOT ?>tour/createEdit?id=<?php echo $tour->id ?>" class="btn btn-primary">Edit</a></td>
        </tr>
        <?php
    }
    ?>
</table>