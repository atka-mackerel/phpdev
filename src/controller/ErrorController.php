<?php
namespace controller;

use action\page\ErrorPageAction;
use core\ApplicationException;
use action\api\ErrorApiAction;

class ErrorController extends ControllerBase
{

    private $exception;

    public function __construct(string $messageId)
    {
        $this->exception = new ApplicationException($messageId);
    }

    public function controll()
    {
        if ($this->exception->getType() === 2) {
            $action = new ErrorApiAction($this->exception);
        } else {
            $action = new ErrorPageAction($this->exception);
        }
        $this->executeAction($action);
    }
}

