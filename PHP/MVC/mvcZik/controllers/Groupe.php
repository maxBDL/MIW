<?php

use http\Encoding\Stream;

class GroupeController extends Controller
{
    public function liste()
    {
        //récupère des données en base
        $listeDesGroupes = GroupeModel::getAll();

        //passer mes données à ma vue
        $this->set(['groupes' =>$listeDesGroupes]);

        //afficher ma vue
        $this->render('liste');
    }

    public function detail(GroupeModel $groupe)
    {
        //$groupe = new GroupeModel($_GET['id']);
        $listeDesMembres = MembreModel::getAllMembreById($_GET['id']);

        $this->set(['membres' =>$listeDesMembres,'groupe' =>$groupe]);

        $this->render('detail');
    }


    public function createEdit(GroupeModel $groupe)
    {
        //$membre = isset($_GET['id'])?GroupeModel::find($_GET['id']):new GroupeModel();
        $this->set(['groupe'=>$groupe]);
        $this->render('create-edit');
    }

    public function post(GroupeModel $groupe)
    {
        /*
        if (isset($_GET['id'])) {
            $membre = GroupeModel::find($_GET['id']);
        } else {
            $membre = new GroupeModel();
        }//*/
        //$membre = isset($_GET['id'])?GroupeModel::find($_GET['id']):new GroupeModel();
        $groupe->fill($_POST);
        $groupe->save();
        header('Location: '.WEB_ROOT.'groupe/liste');
    }
}