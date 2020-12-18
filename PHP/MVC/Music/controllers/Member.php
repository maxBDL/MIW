<?php

use http\Encoding\Stream;

class MemberController extends Controller
{
    public function liste()
    {
        //récupère des données en base
        $listMember = MemberModel::getAll();

        //passer mes données à ma vue
        $this->set(['members' => $listMember]);

        //afficher ma vue
        $this->render('liste');
    }

    public function detail(BandModel $band)
    {
        $this->set(['band' => $band]);
        $this->render('detail');
    }

    public function createEdit(BandModel $band)
    {
        $this->set(['band' => $band]);
        $this->render('create-edit');
    }

    public function post(BandModel $band)
    {
        $band->fill($_POST);
        $band->save();
        header('Location: ' . WEB_ROOT . 'band/liste');
    }
}
