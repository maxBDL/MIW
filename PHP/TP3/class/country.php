<?php


class Country
{
    public $code;
    public $name;
    public $continent;
    public $region;
    public $surfacearea;
    public $indepyear;
    public $population;
    public $lifeexpectancy;
    public $gnp;
    public $gnpold;
    public $LocalName;
    public $governmentform;
    public $headofstate;
    public $capital;
    public $code2;


    function __construct($data=[]){
        $this->make($data);
    }

    public  function make($data){
        foreach ($data as $key=>$value) {
            if (property_exists(self::class, $key)){
                 $this->$key = $value;
            }
        }
    }

    /**
     * read
     * @param string
     * @return Country
     */
    public static function find($code){
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM country WHERE code=:code');
        $req->bindValue('code', $code, PDO::PARAM_STR);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Country');
        return $req->fetch();
    }

    public static function findAll(){
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM country');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Country');
        return $req->fetchAll();
    }

    public function save()
    {
        if (self::find($this->code) == false) {
            echo "Creation effectuée";
            $this->create();
        } else {
            echo "Mise à jour effectuée";
            $this->update();
        }
    }

    public function create(){
        $bdd = getBdd();
        $req = $bdd->prepare('INSERT INTO country (code, name, continent, region, surfacearea, indepyear, population, lifeexpectancy, gnp, gnpold, LocalName, governmentform, headofstate, capital, code2) VALUE (:code, :name, :continent, :region, :surfacearea, :indepyear, :population, :lifeexpectancy, :gnp, :gnpold, :LocalName, :governmentform, :headofstate, :capital, :code2)');
        $req->bindValue('code', $this->code);
        $req->bindValue('name', $this->name);
        $req->bindValue('continent', $this->continent);
        $req->bindValue('region', $this->region);
        $req->bindValue('surfacearea', $this->surfacearea);
        $req->bindValue('indepyear', $this->indepyear);
        $req->bindValue('population', $this->population);
        $req->bindValue('lifeexpectancy', $this->lifeexpectancy);
        $req->bindValue('gnp', $this->gnp);
        $req->bindValue('gnpold', $this->gnpold);
        $req->bindValue('LocalName', $this->LocalName);
        $req->bindValue('governmentform', $this->governmentform);
        $req->bindValue('headofstate', $this->headofstate);
        $req->bindValue('capital', $this->capital);
        $req->bindValue('code2', $this->code2);
        $req->execute();
    }

    public  function update(){
        $bdd = getBdd();
        $req = $bdd->prepare('UPDATE country SET name=:name, continent=:continent, region=:region, surfacearea=:surfacearea, indepyear=:indepyear, population=:population, lifeexpectancy=:lifeexpectancy, gnp=:gnp, gnpold=:gnpold, LocalName=:LocalName, governmentform=:governmentform, headofstate=:headofstate, capital=:capital, code2=:code2 WHERE code=:code');
        $req->bindValue('code', $this->code);
        $req->bindValue('name', $this->name);
        $req->bindValue('continent', $this->continent);
        $req->bindValue('region', $this->region);
        $req->bindValue('surfacearea', $this->surfacearea);
        $req->bindValue('indepyear', $this->indepyear);
        $req->bindValue('population', $this->population);
        $req->bindValue('lifeexpectancy', $this->lifeexpectancy);
        $req->bindValue('gnp', $this->gnp);
        $req->bindValue('gnpold', $this->gnpold);
        $req->bindValue('LocalName', $this->LocalName);
        $req->bindValue('governmentform', $this->governmentform);
        $req->bindValue('headofstate', $this->headofstate);
        $req->bindValue('capital', $this->capital);
        $req->bindValue('code2', $this->code2);
        $req->execute();
    }

    public function delete(){
        $bdd = getBdd();
        $req = $bdd->prepare('DELETE FROM country WHERE code=:code');
        $req->bindValue('code', $this->code);
        $req->execute();
        echo "Suppression effectuée";
    }

    public static function sortNameDesc(){
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM country ORDER BY name DESC');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Country');
        return $req->fetchAll();
    }


}