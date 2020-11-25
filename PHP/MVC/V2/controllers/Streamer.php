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
        $streamer = StreamerModel::find($_GET['id']);
        $dons = StreamerModel::getDons($_GET['id']);


        $this->set(['streamer' =>$streamer]);
        $this->set(['dons' => $dons]);

        $this->render('detail');
    }
}