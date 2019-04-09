<?php
namespace controller;

use action\page\IndexPageAction;

class IndexController extends ControllerBase
{

    public function index()
    {
        $action = new IndexPageAction();
        $this->executeAction($action);
    }
}

