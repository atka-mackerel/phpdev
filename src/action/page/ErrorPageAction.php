<?php
namespace action\page;

use core\ApplicationException;

class ErrorPageAction extends AbstractPageAction
{

    private $exception;

    public function __construct(ApplicationException $exception)
    {
        parent::__construct();
        $this->exception = $exception;
    }

    public function init()
    {
        http_response_code($this->exception->getCode());
        header_remove('Content-Disposition');
        header('Content-Type: text/html; charset=utf-8');

        $this->assign('title', 'エラー');
        $this->assign('message', $this->exception->getMessage());
    }

    protected function getTemplate(): string
    {
        if ($this->exception->getType() === 1) {
            return __DIR__ . '/../../../view/template/ErrorPage.html';
        } else {
            return __DIR__ . '/../../../view/template/AlertPage.html';
        }
    }
}