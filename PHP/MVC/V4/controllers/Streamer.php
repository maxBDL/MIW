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
        //$streamer = new StreamerModel($_GET['id']);
        p('streamerController->detail()');
        p($streamer);
    }

    public function createEdit(StreamerModel $streamer)
    {
        //$streamer = isset($_GET['id'])?StreamerModel::find($_GET['id']):new StreamerModel();
        $this->set(['streamer'=>$streamer]);
        $this->render('create-edit');
    }

    public function post(StreamerModel $streamer)
    {
        /*
        if (isset($_GET['id'])) {
            $streamer = StreamerModel::find($_GET['id']);
        } else {
            $streamer = new StreamerModel();
        }//*/
        //$streamer = isset($_GET['id'])?StreamerModel::find($_GET['id']):new StreamerModel();
        $streamer->fill($_POST);
        $streamer->save();
        header('Location: '.WEB_ROOT.'streamer/liste');
    }
}