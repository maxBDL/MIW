<?php

class CategorieModel extends Model
{
    public $id;
    public $nom;
    public $description;
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
        $req = Model::getBdd()->prepare('SELECT * FROM categorie WHERE id=:id');
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
        $req = $this->bdd->prepare('insert into categorie (nom, description) value (:nom, :description)');
        $req->bindValue('nom', $this->nom);
        $req->bindValue('description', $this->description);
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
        $req = $this->bdd->prepare('update categorie set nom=:nom, description=:description where id=:id');
        $req->bindValue('nom', $this->nom);
        $req->bindValue('description', $this->description);
        $req->bindValue('id', $this->id);
        return $req->execute();
    }

    public static function getAll()
    {
        $req = Model::getBdd()->prepare('SELECT * FROM categorie');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetchAll();
    }

}