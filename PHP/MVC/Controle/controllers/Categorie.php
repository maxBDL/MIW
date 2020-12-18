<?php

use http\Encoding\Stream;

class CategorieController extends Controller
{
    public function liste()
    {
        //récupère des données en base
        $listCategorie = CategorieModel::getAll();

        //passer mes données à ma vue
        $this->set(['categories' =>$listCategorie]);

        //afficher ma vue
        $this->render('liste');
    }

    public function detail(CategorieModel $categorie)
    {
        $this->set(['categorie'=>$categorie]);
        $this->render('detail');
    }

    public function createEdit(CategorieModel $categorie)
    {
        $this->set(['categorie'=>$categorie]);
        $this->render('create-edit');
    }

    public function post(CategorieModel $categorie)
    {
        $categorie->fill($_POST);
        $categorie->save();
        header('Location: '.WEB_ROOT.'categorie/liste');
    }
}