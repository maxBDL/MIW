<?php


class Language
{
    public $countrycode;
    public $language;
    public $isofficial;
    public $percentage;

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

    //renvoie des instances de Language ayant le meme country code
    public function find($countrycode){
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM countrylanguage WHERE countrycode=:countrycode');
        $req->bindValue('countrycode', $countrycode, PDO::PARAM_STR);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Language');
        return $req->fetchAll();
    }

    //renvoie toutes les instances de City
    public function findAll(){
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM countrylanguage');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Language');
        return $req->fetchAll();
    }

    public function save(){

    }
}