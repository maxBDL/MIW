<?php


class City
{
    public $id;
    public $name;
    public $countrycode;
    public $district;
    public $population;

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
     * @param int $id
     * @return City
     */
    public static function find($id)
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM city where id=:id');
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'City');
        //renvoie une instance de City
        return $req->fetch();
    }

    public static function findAll()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM city');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'City');
        //renvoie toutes les instance de City
        return $req->fetchAll();
    }

    public function save()
    {
        if ($this->id === null) {
            $this->create();
        } else {
            $this->update();
        }
    }

    public function create(){
        $bdd =getBdd();
        $req = $bdd->prepare('INSERT INTO city (name, countrycode, district, population) VALUE (:name, :countrycode, :district, :population)');
        $req->bindValue('name', $this->name);
        $req->bindValue('countrycode', $this->countrycode);
        $req->bindValue('district', $this->district);
        $req->bindValue('population', $this->population);
        $req->execute();
        $this->id = $bdd->lastInsertId();
    }

    public function update(){
        $bdd = getBdd();
        $req = $bdd->prepare('UPDATE city SET name=:name, countrycode=:countrycode, district=:district, population=:population WHERE id=:id');
        $req->bindValue('name', $this->name);
        $req->bindValue('countrycode', $this->countrycode);
        $req->bindValue('district', $this->district);
        $req->bindValue('population', $this->population);
        $req->bindValue('id', $this->id);
        $req->execute();
    }

    public function delete(){
        $bdd = getBdd();
        $req = $bdd->prepare('DELETE FROM city WHERE id=:id');
        $req->bindValue('id', $this->id);
        $req->execute();
        echo "Supression terminé";
    }
}