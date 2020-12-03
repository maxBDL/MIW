<?php

class BandModel extends Model
{
    public $id;
    public $name;
    public $country_origin;
    public $year_creation;
    //CRUD
    //Create
    //Read
    //Update
    //Delete


    /**
     *
     * @param $id
     */
    public static function find($id)
    {
        $req = Model::getBdd()->prepare('SELECT * FROM band WHERE id=:id');
        $req->bindValue('id', $id);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetch();
    }


    /**
     * Crée ou met à jour le streamer selon qu'il existe ou non dans la base de données.
     * @return bool
     */
    public function save()
    {
        if (null === $this->id) {
            return $this->create();
        } else {
            return $this->update();
        }
    }

    /**
     * Crée le streamer dans la base de données.
     * @return bool
     */
    public function create()
    {
        $req = $this->bdd->prepare('insert into band (name, country_origin, year_creation) value (:name, :country_origin, :year_creation)');
        $req->bindValue('name', $this->name);
        $req->bindValue('country_origin', $this->country_origin);
        $req->bindValue('year_creation', $this->year_creation);
        $exe = $req->execute();
        $this->id = $this->bdd->lastInsertId();
        return $exe;
    }

    /**
     * Met à jour les informations du streamer dans la base de données.
     * @return bool
     */
    public function update()
    {
        $req = $this->bdd->prepare('update band set name=:name, country_origin=:country_origin, year_creation=:year_creation where id=:id');
        $req->bindValue('name', $this->name);
        $req->bindValue('country_origin', $this->country_origin);
        $req->bindValue('year_creation', $this->year_creation);
        $req->bindValue('id', $this->id);
        return $req->execute();
    }

    public static function getAll()
    {
        $req = Model::getBdd()->prepare('SELECT * FROM band');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetchAll();
    }

}