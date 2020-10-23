<?php


class Streamer
{
    public $id;
    public $nom;
    public $url_twitch;

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

    //donne tous les streamers du zevent
    public static function findAll()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM streamer');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Streamer');
        //renvoie toute les instances de streamer
        return $req->fetchAll();
    }

    //donne un streamer précis grace à son id
    public static function find($id)
    {
        $bdd = getBdd();
        $req = $bdd->prepare('SELECT * FROM streamer WHERE id=:id');
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Streamer');
        //renvoie une instance de streamer
        return $req->fetch();
    }


    public function save()
    {
        //si l'id du streamer n'exite pas on crée un streamer
        if (self::find($this->id) == false) {
            $this->create();
        } else {
            //sinon on modifie le streamer donné
            $this->update();
        }
    }

    //crée un nouveau streamer
    public function create()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('INSERT INTO streamer (nom, url_twitch) VALUE (:nom, :url_twitch)');
        $req->bindValue('nom', $this->nom);
        $req->bindValue('url_twitch', $this->url_twitch);
        $req->execute();
        $this->id = $bdd->lastInsertId();
        echo "Creation effectuée";
    }

    //modifie un streamer existant
    public function update()
    {
        $bdd = getBdd();
        $req = $bdd->prepare('UPDATE streamer SET nom=:nom, url_twitch=:url_twitch WHERE id=:id');
        $req->bindValue('nom', $this->nom);
        $req->bindValue('url_twitch', $this->url_twitch);
        $req->bindValue('id', $this->id);
        $req->execute();
        echo "Modification effectuée";
    }

}