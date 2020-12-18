<?php

class ArticleModel extends Model
{
    public $id;
    public $id_categorie;
    public $titre;
    public $contenu;
    public $date_ajout;
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
        $req = Model::getBdd()->prepare('SELECT * FROM article WHERE id=:id');
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
        $req = $this->bdd->prepare('insert into article (id_categorie, titre, contenu, date_ajout) value (:id_categorie, :titre, :contenu, :date_ajout)');
        $req->bindValue('id_categorie', $this->id_categorie);
        $req->bindValue('titre', $this->titre);
        $req->bindValue('contenu', $this->contenu);
        $req->bindValue('date_ajout',  date('y-m-d h:i:s'));
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
        $req = $this->bdd->prepare('update article set id_categorie=:id_categorie, titre=:titre, contenu=:contenu, date_ajout=:date_ajout where id=:id');
        $req->bindValue('id_categorie', $this->id_categorie);
        $req->bindValue('titre', $this->titre);
        $req->bindValue('contenu', $this->contenu);
        $req->bindValue('date_ajout', $this->date_ajout);
        $req->bindValue('id', $this->id);
        return $req->execute();
    }

    public static function getAllFrom($id_categorie)
    {
        $req = Model::getBdd()->prepare('SELECT * FROM article WHERE id_categorie=:id_categorie');
        $req->bindValue('id_categorie', $id_categorie);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetchAll();
    }

    public static function delete($id){
        $req = Model::getBdd()->prepare('DELETE FROM article WHERE id=:id');
        $req->bindValue('id', $id);
        return $req->execute();
    }
}