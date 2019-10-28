<?php

namespace App\Controller;

use App\Model\PanellistsModel;
use Core\Controller;

Class HomeController extends Controller
{
    public function index()
    {
        $this->view->panellists = PanellistsModel::show();
        //debug($this->view->panellists);
        $this->view->render('main/home');
    }


}