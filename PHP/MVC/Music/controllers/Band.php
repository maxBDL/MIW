<?php

use http\Encoding\Stream;

class BandController extends Controller
{
    public function liste()
    {
        //récupère des données en base
        $listBand = BandModel::getAll();

        //passer mes données à ma vue
        $this->set(['bands' =>$listBand]);

        //afficher ma vue
        $this->render('liste');
    }

    public function detail(BandModel $band)
    {
        $this->set(['band'=>$band]);
        $this->render('detail');
    }

    public function createEdit(BandModel $band)
    {
        $this->set(['band'=>$band]);
        $this->render('create-edit');
    }

    public function post(BandModel $band)
    {
        $band->fill($_POST);
        $band->save();
        header('Location: '.WEB_ROOT.'band/liste');
    }
}