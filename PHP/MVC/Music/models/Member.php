<?php

class MemberModel extends Model
{
    public $id;
    public $name;
    public $position;
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
        $req = Model::getBdd()->prepare('SELECT * FROM member WHERE id=:id');
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
        $req = $this->bdd->prepare('insert into member (name, position, id_band) value (:name, :portion, :id_band)');
        $req->bindValue('name', $this->name);
        $req->bindValue('position', $this->position);
        $req->bindValue('id_band', $this->id_band);
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
        $req = $this->bdd->prepare('update member set name=:name, position=:position, id_band:=id_band where id=:id');
        $req->bindValue('name', $this->position);
        $req->bindValue('position', $this->position);
        $req->bindValue('id_band', $this->id_band);
        $req->bindValue('id', $this->id);
        return $req->execute();
    }

    public static function getAllFrom($id_band)
    {
        $req = Model::getBdd()->prepare('SELECT * FROM member WHERE id_band=:id_band');
        $req->bindValue('id_band', $id_band);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetchAll();
    }

    public static function getAll()
    {
        $req = Model::getBdd()->prepare('SELECT * FROM member');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetchAll();
    }
}