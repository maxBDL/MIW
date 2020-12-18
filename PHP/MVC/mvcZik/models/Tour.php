<?php

class TourModel extends Model
{
    public $id;
    public $place;
    public $date;
    public $price;
    public $id_band;
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
        $req = Model::getBdd()->prepare('SELECT * FROM tour WHERE id=:id');
        $req->bindValue('id', $id);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetch();
    }


    /**
     * Crée ou met à jour le membre selon qu'il existe ou non dans la base de données.
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
     * Crée le membre dans la base de données.
     * @return bool
     */
    public function create()
    {
        $req = $this->bdd->prepare('insert into tour (id, place, date, price, id_band) value (:id, :place, :date, :price, :id_band)');
        $req->bindValue('id', $this->id);
        $req->bindValue('place', $this->place);
        $req->bindValue('date', $this->date);
        $req->bindValue('price', $this->price);
        $req->bindValue('id_band', $this->id_band);
        $exe = $req->execute();
        $this->id = $this->bdd->lastInsertId();
        return $exe;
    }

    /**
     * Met à jour les informations du membre dans la base de données.
     * @return bool
     */
    public function update()
    {
        $req = $this->bdd->prepare('update tour set id=:id, place=:place, date=:date, price=:price, id_band=:id_band where id=:id');
        $req->bindValue('id', $this->id);
        $req->bindValue('place', $this->place);
        $req->bindValue('date', $this->date);
        $req->bindValue('price', $this->price);
        $req->bindValue('id_band', $this->id_band);
        return $req->execute();
    }

    public static function getAll()
    {
        $req = Model::getBdd()->prepare('SELECT * FROM tour');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetchAll();
    }

}