<?php

class DonModel extends Model
{

    public $id;
    public $pseudo;
    public $id_streamer;
    public $message;
    public $montant;


    public function insert(){

        $req = $this->bdd->prepare('insert into don (id_streamer, pseudo, message, montant, date) value (:id_streamer, :pseudo, :message, :montant, :date)');

        $req->bindValue('id_streamer', $this->id_streamer);
        $req->bindValue('pseudo', $this->pseudo);
        $req->bindValue('message', $this->message);
        $req->bindValue('montant', $this->montant);
        $req->bindValue('date', '2020-10-16 00:24:19');

        $exe = $req->execute();
        $this->id = $this->bdd->lastInsertId();

        return $exe;
    }

    /**
     *
     * @param $id
     */

    public static function find($id){

        $req = Model::getBdd()->prepare('SELECT * FROM don WHERE id_streamer=:id');
        $req->bindValue('id', $id);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetchAll();

    }
}