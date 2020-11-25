<?php


class DonController extends Controller
{
    public function post()
    {
        //récupère des données en base
        $listeDesStreamers = StreamerModel::getAll();

        //passer mes données à ma vue
        $this->set(['streamers' =>$listeDesStreamers]);

        //afficher ma vue

        $this->render('detail');
    }


}