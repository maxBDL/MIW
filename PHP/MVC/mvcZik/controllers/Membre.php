<?php

use http\Encoding\Stream;

class MembreController extends Controller
{
    public function liste()
    {
        //récupère des données en base
        $listeDesMembres = MembreModel::getAll();

        //passer mes données à ma vue
        $this->set(['membres' =>$listeDesMembres]);

        //afficher ma vue
        $this->render('liste');
    }

    public function detail(MembreModel $membre)
    {
        //$membre = new StreamerModel($_GET['id']);
        p('membreController->detail()');
    }

    public function createEdit(MembreModel $membre)
    {
        //$membre = isset($_GET['id'])?MembreModel::find($_GET['id']):new MembreModel();

        $listeDesGroupes = GroupeModel::getAll();

        $idband = isset($_GET['id_band'])?MembreModel::find($_GET['id_band']):new MembreModel();
        $nomBand = GroupeModel::find($idband->id);

        $this->set(['membre'=>$membre,'groupes' =>$listeDesGroupes, 'nomBand' =>$nomBand]);
        $this->render('create-edit');
    }

    public function post(MembreModel $membre)
    {
        /*
        if (isset($_GET['id'])) {
            $membre = StreamerModel::find($_GET['id']);
        } else {
            $membre = new StreamerModel();
        }//*/
        //$membre = isset($_GET['id'])?StreamerModel::find($_GET['id']):new StreamerModel();
        $membre->fill($_POST);
        $membre->save();
        header('Location: '.WEB_ROOT.'membre/liste');
    }

    public function delete(MembreModel $membre){
        MembreModel::delete($_GET['id']);
        header('Location: '.WEB_ROOT.'groupe/detail?id='.$membre->id_band);
    }



}