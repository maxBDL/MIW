<?php

use http\Encoding\Stream;

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

    public function detail(StreamerModel $streamer)
    {
        //$membre = new StreamerModel($_GET['id']);
        p('streamerController->detail()');
        p($streamer);
    }

    public function createEdit(StreamerModel $streamer)
    {
        //$membre = isset($_GET['id'])?StreamerModel::find($_GET['id']):new StreamerModel();
        $this->set(['membre'=>$streamer]);
        $this->render('create-edit');
    }

    public function post(StreamerModel $streamer)
    {
        /*
        if (isset($_GET['id'])) {
            $membre = StreamerModel::find($_GET['id']);
        } else {
            $membre = new StreamerModel();
        }//*/
        //$membre = isset($_GET['id'])?StreamerModel::find($_GET['id']):new StreamerModel();
        $streamer->fill($_POST);
        $streamer->save();
        header('Location: '.WEB_ROOT.'membre/liste');
    }
}