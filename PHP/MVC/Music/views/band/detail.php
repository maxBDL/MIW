<?php ?>
<h1><?php echo $band->name ?></h1>
<h2>Informations complémentaires</h2>
<table>
    <thead>
    <tr>
        <th>Nationnalité:</th>
        <th>Année de création:</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $band->country_origin ?></td>
        <td><?php echo $band->year_creation ?></td>
    </tr>
    </tbody>
</table>


<h2>Membres</h2>
<table>
    <thead>
    <tr>
        <th>Nom:</th>
        <th>Position:</th>
        <th>Action:</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (MemberModel::getAllFrom($band->id) as $member) {
        echo '<tr><td>' . $member->name . '</td><td>' . $member->position . '</td><td><a href="'.WEB_ROOT.'band/createEdit?id='.$band->id.'" class="btn btn-primary">Modifier</a><td><a href="'.WEB_ROOT.'band/createEdit?id='.$band->id.'" class="btn btn-danger">Supprimer</a></td></tr>';
    }
    ?>
    <tr><td><a href="<?php echo WEB_ROOT ?>band/createEdit?id=<?php echo $band->id ?>" class="btn btn-primary">Ajouter un membre</a></td></tr>
    </tbody>
</table>

<h2>Concert</h2>
<table>
    <thead>
    <tr>
        <th>Lieu:</th>
        <th>Date:</th>
        <th>Prix:</th>
        <th>Action:</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (TourModel::getAllFrom($band->id) as $tour) {
        echo '<tr><td>' . $tour->place . '</td><td>' . $tour->date . '</td><td>' . $tour->price . '</td><td><a href="'.WEB_ROOT.'band/createEdit?id='.$band->id.'" class="btn btn-primary">Modifier</a><td><a href="'.WEB_ROOT.'band/createEdit?id='.$band->id.'" class="btn btn-danger">Supprimer</a></td></tr>';
    }
    ?>
    <tr><td><a href="<?php echo WEB_ROOT ?>band/createEdit?id=<?php echo $band->id ?>" class="btn btn-primary">Ajouter une date</a></td></tr>
    </tbody>
</table>

