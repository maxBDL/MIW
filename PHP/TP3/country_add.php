<?php
//inclu getBdd()
require_once 'config.php';
require_once 'class/city.php';
require_once 'class/country.php';
require_once 'class/language.php';
?>
    <a href="country.php">< Retour</a><br><br>

<?php
    if (isset($_GET['code'])){
        $country = Country::find($_GET['code']);
        /*$bdd = getBdd();
        $reqRecherche = $bdd->prepare('SELECT * FROM country WHERE code=:code');
        $reqRecherche->bindValue('code', $_GET['code']);
        $reqRecherche->execute();
        $res = $reqRecherche->fetch(PDO::FETCH_ASSOC);*/
    }else{
        $country = new Country();
    }
?>

<!--Formulaire insertion nouveau pays-->
    <fieldset>
        <h2>Ajout/Modification de Pays</h2>
        <form method="get">
            <label for="cd">Code</label>
            <input type="text" id="cd" name="code" value="<?php echo isset($country->code)?$country->code:'' ?>" required><br>
            <label for="nm">Name</label>
            <input type="text" id="nm" name="name" value="<?php echo isset($country->name)?$country->name:'' ?>" required><br>
            <label for="cont">Continent</label>
            <input type="text" id="cont" name="continent" value="<?php echo isset($country->continent)?$country->continent:'' ?>" required><br>
            <label for="region">Region</label>
            <input type="text" id="region" name="region" value="<?php echo isset($country->region)?$country->region:'' ?>" required><br>
            <label for="surf">Surface Area</label>
            <input type="text" id="surf" name="surfacearea" value="<?php echo isset($country->surfacearea)?$country->surfacearea:0 ?>"><br>
            <label for="ind">Independance Year</label>
            <input type="text" id="ind" name="indepyear" value="<?php echo isset($country->indepyear)?$country->indepyear:0 ?>"><br>
            <label for="pop">Population</label>
            <input type="text" id="pop" name="population" value="<?php echo isset($country->population)?$country->population:0 ?>"><br>
            <label for="life">Life Expectancy</label>
            <input type="text" id="life" name="lifeexpectancy" value="<?php echo isset($country->lifeexpectancy)?$country->lifeexpectancy:0.00 ?>"><br>
            <label for="gnp">Gross National Product</label>
            <input type="text" id="gnp" name="gnp" value="<?php echo isset($country->gnp)?$country->gnp:0.00 ?>"><br>
            <label for="ognp">Old Gross National Product</label>
            <input type="text" id="ognp" name="gnpold" value="<?php echo isset($country->gnpold)?$country->gnpold:0.00 ?>" ><br>
            <label for="locnm">Local Name</label>
            <input type="text" id="locnm" name="LocalName" value="<?php echo isset($country->LocalName)?$country->LocalName:'' ?>" required><br>
            <label for="gvnt">Type of Government</label>
            <input type="text" id="gvnt" name="governmentform" value="<?php echo isset($country->governmentform)?$country->governmentform:'' ?>" required><br>
            <label for="head">Head of State</label>
            <input type="text" id="head" name="headofstate" value="<?php echo isset($country->headofstate)?$country->headofstate:'' ?>"><br>
            <label for="cap">Capital</label>
            <input type="text" id="cap" name="capital" value="<?php echo isset($country->capital)?$country->capital:0 ?>"><br>
            <label for="cd2">Code 2</label>
            <input type="text" id="cd2" name="code2" value="<?php echo isset($country->code2)?$country->code2:'' ?>" required><br>
            <button type="submit" name="button" value="m"><?php echo isset($country->code)?'Modifier':'Créer' ?></button>
        </form>
    </fieldset>

<?php

if (isset($_GET['button'])){
    $countryNew = new Country($_GET);
    $countryNew->save();
}

/*
    if (isset($_GET['button']) && $_GET['button']=='m'){
        $reqModif = $bdd->prepare('UPDATE country SET code=:code, name=:name, continent=:continent, region=:region, surfacearea=:surfacearea, indepyear=:indepyear, population=:population, lifeexpectancy=:lifeexpectancy, gnp=:gnp, gnpold=:gnpold, LocalName=:LocalName, governmentform=:gorvernmentform, headofstate=:headofstate, capital=:capital, code2=:code2 WHERE code=:code');
        $reqModif->bindValue('code', $_GET['code']);
        $reqModif->bindValue('name', $_GET['name']);
        $reqModif->bindValue('continent', $_GET['continent']);
        $reqModif->bindValue('region', $_GET['region']);
        $reqModif->bindValue('surfacearea', $_GET['surface']);
        $reqModif->bindValue('indepyear', $_GET['independance']);
        $reqModif->bindValue('population', $_GET['population']);
        $reqModif->bindValue('lifeexpectancy', $_GET['lifeExpec']);
        $reqModif->bindValue('gnp', $_GET['gnp']);
        $reqModif->bindValue('gnpold', $_GET['ognp']);
        $reqModif->bindValue('LocalName', $_GET['localName']);
        $reqModif->bindValue('governmentform', $_GET['government']);
        $reqModif->bindValue('headofstate', $_GET['headState']);
        $reqModif->bindValue('capital', $_GET['capital']);
        $reqModif->bindValue('code2', $_GET['code2']);
        $reqModif->execute();
        echo "Modification terminée";
    }else if(isset($_GET['button']) && $_GET['button']=='c'){
        $resOldCode = $bdd->prepare('INSERT INTO country VALUES (:code, :name, :continent, :region, :surfacearea, :indepyear, :population, :lifeexpectancy, :gnp, :gnpold, :LocalName, :gorvernmentform, :headofstate, :capital, :code2)');
        $resOldCode->bindValue('code', $_GET['code']);
        $resOldCode->bindValue('name', $_GET['name']);
        $resOldCode->bindValue('continent', $_GET['continent']);
        $resOldCode->bindValue('region', $_GET['region']);
        $resOldCode->bindValue('surfacearea', $_GET['surface']);
        $resOldCode->bindValue('indepyear', $_GET['independance']);
        $resOldCode->bindValue('population', $_GET['population']);
        $resOldCode->bindValue('lifeexpectancy', $_GET['lifeExpec']);
        $resOldCode->bindValue('gnp', $_GET['gnp']);
        $resOldCode->bindValue('gnpold', $_GET['ognp']);
        $resOldCode->bindValue('LocalName', $_GET['localName']);
        $resOldCode->bindValue('governmentform', $_GET['government']);
        $resOldCode->bindValue('headofstate', $_GET['headState']);
        $resOldCode->bindValue('capital', $_GET['capital']);
        $resOldCode->bindValue('code2', $_GET['code2']);
        $resOldCode->execute();
        echo "Création terminée";
    }*/