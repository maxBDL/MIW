<?php

use http\Encoding\Stream;

class ArticleController extends Controller
{
    public function detail(ArticleModel $article)
    {
        $this->set(['article' => $article]);
        $this->render('detail');
    }

    public function createEdit(ArticleModel $article)
    {
        $this->set(['article' => $article]);
        $this->render('create-edit');
    }

    public function post(ArticleModel $article)
    {
        $article->fill($_POST);
        $article->save();
        header('Location: '.WEB_ROOT.'categorie/detail?id='.$article->id_categorie);
    }

    public function delete(ArticleModel $article)
    {
        ArticleModel::delete($article->id);
        header('Location: '.WEB_ROOT.'categorie/detail?id='.$article->id_categorie);
    }
}
