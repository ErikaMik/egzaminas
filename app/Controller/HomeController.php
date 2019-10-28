<?php

namespace App\Controller;

use App\Model\MoviesModel;
use Core\Controller;

Class HomeController extends Controller
{
    public function index()
    {
        $this->view->movies = MoviesModel::show();
        $this->view->render('main/home');
    }


}