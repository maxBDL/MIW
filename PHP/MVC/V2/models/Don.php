<?php


class DonModel
{
    public $id;
    public $id_streamer;
    public $pseudo;
    public $message;
    public $montant;
    public $date;
    /**
     *
     * @param $id
     */
    public static function find($id)
    {
        $req = Model::getBdd()->prepare('SELECT * FROM don WHERE id=:id');
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
        $req = $this->bdd->prepare('insert into don (id_streamer, pseudo, message, montant, date) value (:id_streamer, :pseudo, :message, :montant, :date)');
        $req->bindValue('id_streamer', $this->id_streamer);
        $req->bindValue('pseudo', $this->pseudo);
        $req->bindValue('message', $this->message);
        $req->bindValue('montant', $this->montant);
        $this->date = date("j-m-Y h-i-s");
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
        $req = $this->bdd->prepare('update don set id_streamer=:id_streamer, pseudo:=pseudo, message:=message, montant:=montant, date:=date  where id=:id');
        $req->bindValue('id_streamer', $this->id_streamer);
        $req->bindValue('pseudo', $this->pseudo);
        $req->bindValue('message', $this->message);
        $req->bindValue('montant', $this->montant);
        $req->bindValue('date', $this->date);
        return $req->execute();
    }

    public static function getAll()
    {
        $req = Model::getBdd()->prepare('SELECT * FROM streamer');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetchAll();
    }

    public static function getDons($id)
    {
        $req = Model::getBdd()->prepare('SELECT * FROM don WHERE id_streamer =:id');
        $req->bindValue('id', $id);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $req->fetchAll();
    }
}
