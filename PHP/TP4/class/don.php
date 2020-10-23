<?php


class Don
{
    public $id;
    public $id_streamer;
    public $pseudo;
    public $message;
    public $montant;
    public $date;

    function __construct($data = [])
    {
        $this->make($data);
    }

    public function make($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists(self::class, $key)) {
                $this->$key = $value;
            }
        }
    }


    //donne tous les dons fait à un streamer
    public static function find($id_streamer)
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM don where id_streamer=:id_streamer');
        $req->bindValue('id_streamer', $id_streamer, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Don');
        //renvoie une instance de Don
        return $req->fetchAll();
    }

    //affiche tous les dons existant
    public static function findAll()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM don');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Don');
        //renvoie toutes les instances de Don
        return $req->fetchAll();
    }

    //créer un nouveau don
    public function create()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('INSERT INTO don (id_streamer, pseudo, message, montant,date) VALUE (:id_streamer, :pseudo, :message, :montant, :date)');
        $req->bindValue('id_streamer', $this->id_streamer);
        $req->bindValue('pseudo', $this->pseudo);
        $req->bindValue('message', $this->message);
        $req->bindValue('montant', $this->montant);
        $req->bindValue('date', $this->date);
        $req->execute();
        $this->id = $bdd->lastInsertId();
        echo "Votre don a été envoyé";
    }


    //renvoie pour un streamer donné la valeur total de don en euro
    public static function totalDon($id_streamer)
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT id_streamer, SUM(montant) FROM don WHERE id_streamer=:id_streamer GROUP BY id_streamer');
        $req->bindValue('id_streamer', $id_streamer);
        $req->execute();
        return $req->fetch();
    }

    //envoie le total de don au zevent
    public static function total()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT SUM(montant) FROM don');
        $req->execute();
        return $req->fetch();
    }
}