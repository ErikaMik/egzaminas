<?php

namespace Core;

class View
{
    public function render($template){
        $path = __DIR__;
        $path = str_replace('core', '', $path);

        include $path.'views/main/header.php';
        include $path.'views/'.$template.'.php';
        include $path.'views/main/footer.php';


        //include '/var/www/html/php2/mvc/views/'.$template.'.php';

    }

    public function renderAdmin($template)
    {
        $path = __DIR__;
        $path = str_replace('core', '', $path);

        include $path.'views/admin/header.php';
        include $path.'views/'.$template.'.php';
        include $path.'views/page/footer.php';
    }
}