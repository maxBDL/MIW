<?php
class DonController extends Controller
{

    public function don()
    {
        if(isset($_GET['pseudo'])){
            $newDon = new DonModel($_GET);
            $newDon->insert();
            header('location: '.WEB_ROOT.'streamer/detail?id='.$_GET['id_streamer']);
        }
    }
}

