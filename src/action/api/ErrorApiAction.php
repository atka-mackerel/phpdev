<?php
namespace action\api;

use core\ApplicationException;
use action\Action;

class ErrorApiAction implements Action
{

    private $exception;

    public function __construct(ApplicationException $exception)
    {
        $this->exception = $exception;
    }

    public function respond()
    {
        http_response_code($this->exception->getCode());
        header('Content-Type: application/json; charset=utf-8');
        $response = [
            'message' => $this->exception->getMessage(),
            'code' => $this->exception->getMessageId()
        ];
        echo json_encode($response);
    }

    public function init()
    {
        // Do Nothing
    }

    public function execute()
    {
        // Do Nothing
    }
}