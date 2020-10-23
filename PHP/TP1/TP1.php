<?php
    //Exercice 1
    $nom = 'Didier';
    $prenom = 'Maxime';
    define('AGE', '19');
    
    //Exercice 2
    echo 'Je m\'appelle '.$prenom.' '.$nom.'<br/>';
    echo 'J\'ai '.AGE.' ans<br/>';

    //Exercice 3
    $nb_aleatoire = rand(0, 100);
    if ($nb_aleatoire < AGE) {
        echo $nb_aleatoire.' < à '.AGE.'<br/>';
    }else{
        echo $nb_aleatoire.' > à '.AGE.'<br/>';
    }

    //Exercice 4
    //Boucle jusqu'à ce que le chiffre aléatoire soit inférieur à _AGE
    while ($nb_aleatoire > AGE) {
        if ($nb_aleatoire < AGE) {
            echo $nb_aleatoire.' < à '.AGE.'<br/>';
        }else{
            echo $nb_aleatoire.' > à '.AGE.'<br/>';
            $nb_aleatoire = rand(0, 100);
        }
    }

    //Exercice 5
    //Fonction recursive qui boucle  boucle jusqu'à ce que le chiffre aléatoire soit inférieur à _AGE
    function recursifAge($age){
        $nbRandom = rand(0, 100);
        if ($nbRandom > AGE){
            echo $nbRandom.' > '.$age.'<br>';
            return recursifAge($age);
        }
        return $nbRandom;
    }
    echo 'Fonction recursive <br>';
    echo recursifAge(AGE).' < '.AGE.'<br>';

    //Exercice 6
    $tab = array(
        '-9' => 5,
        '5' => 6,
        '50' => 0,
        '0' => 7,
        '1' => 1  
    );


    //Fonction donnant la somme des valeurs du tableau
    function Somme(Array $tab){
        $somme = null;
        foreach ($tab as $key => $value) {
            $somme += $value;
        }
        return $somme;
    };



    //Fonction donnant la valeur maximale tu tableau
    function maxValue(Array $tab){
        $max = null;
        foreach ($tab as $key => $value) {
            if ($max <= $value){
                $max = $value;
            }
        }
        return $max;
    };

    //Fonction donnant la valeur minimale du tableau
    function minValue(Array $tab){
        $min = null;
        foreach ($tab as $key => $value) {
            if ($min >= $value){
                $min = $value;
            }
        }
        return $min;
    };

    //Fonction donnant l'indice de la valeur maximale
    function maxKey(Array $tab){
        $val = maxValue($tab);
        $maxKey = null;
        foreach ($tab as $key => $value) {
            if ($val == $value){
                $maxKey = $key;
            }
        }
        return $maxKey;
    };

    //Fonction donnant l'indice de la valeur maximale
    function minKey(Array $tab){
        $val = minValue($tab);
        $minKey = null;
        foreach ($tab as $key => $value) {
            if ($val == $value){
                $minKey = $key;
            }
        }
        return $minKey;
    };

    $result_somme = Somme($tab);
    $valMin = minValue($tab);
    $valMax = maxValue($tab);
    $indiceMax = maxKey($tab);
    $indiceMin = minKey($tab);

    echo 'La somme du tableau est égale à : '.$result_somme.'<br/>';
    echo 'La valeur minimale du tableau est égale à '.$valMin.' et ayant pour indice: '.$indiceMin.'<br/>';
    echo 'La valeur maximale du tableau est égale à '.$valMax.' et ayant pour indice: '.$indiceMax;
    