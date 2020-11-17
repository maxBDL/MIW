<?php

class StreamerController extends Controller
{
    public function liste()
    {
        //récupère des données en base
        $listeDesStreamers = [
            [
                'nom' =>'Zerator',
                'url' => 'twitch.tv'
            ],
            [
                'nom' =>'Domingo',
                'url' => 'twitch.tv'
            ],
            [
                'nom' =>'Squeezie',
                'url' => 'twitch.tv'
            ],
        ];

        //passer mes données à ma vue
        $this->set(['streamers' =>$listeDesStreamers]);

        //afficher ma vue
        $this->render('liste');
    }
}