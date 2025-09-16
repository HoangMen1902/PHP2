<?php

namespace Src\Controllers;

use League\Plates\Engine;

abstract class BaseController
{
    protected $view;

    public function __construct()
    {
        $this->view = new Engine('./Src/Views/');
    }
}
