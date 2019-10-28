<?php

namespace Core;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
        //$this->view->user = currentUser();
    }


}