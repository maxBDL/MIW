<?php

class StreamerController extends Controller
{
    public function liste()
    {
        //récupère des données en base
        $listeDesStreamers = StreamerModel::getAll();

        //passer mes données à ma vue
        $this->set(['streamers' =>$listeDesStreamers]);

        //afficher ma vue
        $this->render('liste');
    }

    public function detail()
    {
        $DetailStreamer = StreamerModel::find($_GET['id']);
        $DetailDons = DonModel::find($_GET['id']);

        $this->set(['streamers' =>$DetailStreamer]);
        $this->set(['dons' =>$DetailDons]);

        $this->render('detail');
    }
}