<?php
namespace controller;

use action\page\ToolsPageAction;

class ToolsController extends ControllerBase
{

    public function index()
    {
        $action = new ToolsPageAction();
        $this->executeAction($action);
    }
}

