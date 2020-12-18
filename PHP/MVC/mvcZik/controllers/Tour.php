<?php

use http\Encoding\Stream;

class TourController extends Controller
{
    public function liste()
    {
        //récupère des données en base
        $listeDesTours = TourModel::getAll();

        //passer mes données à ma vue
        $this->set(['tours' =>$listeDesTours]);

        //afficher ma vue
        $this->render('liste');
    }

    public function detail(TourModel $tour)
    {
        //$tour = new TourModel($_GET['id']);
        p('tourController->detail()');
        p($tour);
    }

    public function createEdit(TourModel $tour)
    {
        //$tour = isset($_GET['id'])?TourModel::find($_GET['id']):new TourModel();
        $this->set(['tour'=>$tour]);
        $this->render('create-edit');
    }

    public function post(TourModel $tour)
    {
        /*
        if (isset($_GET['id'])) {
            $tour = TourModel::find($_GET['id']);
        } else {
            $tour = new TourModel();
        }//*/
        //$tour = isset($_GET['id'])?TourModel::find($_GET['id']):new TourModel();
        $tour->fill($_POST);
        $tour->save();
        header('Location: '.WEB_ROOT.'tour/liste');
    }
}