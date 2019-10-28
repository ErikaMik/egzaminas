<?php


namespace App\Controller;

use App\Helper\Helper;
use App\Model\MoviesModel;
use Core\Controller;

class MoviesController extends Controller
{
    public function index()
    {
        $this->view->render('main/uploadmovies');
    }

    public function store()
    {
        $movie = new MoviesModel();
        $movie->setMovie($_POST['movie']);
        $movie->setDate($_POST['date']);
        $movie->setCensus($_POST['census']);
        $movie->setTime($_POST['time']);
        $movie->setHall($_POST['hall']);
        $movie->save();
        $helper = new Helper();
        $helper->redirect(url('movies'));
    }
}