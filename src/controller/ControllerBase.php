<?php
namespace controller;

use action\Action;
use core\ApplicationException;
use action\api\ErrorApiAction;
use action\page\ErrorPageAction;
use util\common\CommonUtil;

class ControllerBase
{

    public function __construct()
    {}

    protected function executeAction(Action $action)
    {
        try {
            $action->init();
            $action->execute();
            $action->respond();
        }
        catch (ApplicationException $e) {
            if ($e->getType() === 2) {
                $action = new ErrorApiAction($e);
            }
            else {
                $action = new ErrorPageAction($e);
            }
            $action->init();
            $action->execute();
            $action->respond();
        }
    }
}

