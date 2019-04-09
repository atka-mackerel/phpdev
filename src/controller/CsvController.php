<?php
namespace controller;


use action\page\CsvPageAction;
use action\api\CsvParseAction;
use action\api\CsvFileParseAction;

class CsvController extends ControllerBase
{

    public function index()
    {
        $action = new CsvPageAction();
        $this->executeAction($action);
    }

    public function parseString()
    {
        $action = new CsvParseAction();
        $this->executeAction($action);
    }

    public function parseFile()
    {
        $action = new CsvFileParseAction();
        $this->executeAction($action);
    }
}

