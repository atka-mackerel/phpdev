<?php
namespace action\page;

use action\Action;

abstract class AbstractPageAction implements Action
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = new \Smarty();
    }

    public function respond()
    {
        $this->smarty->display($this->getTemplate());
    }

    public function execute()
    {
        // Do Nothing
    }

    protected function assign(string $name, $value)
    {
        $this->smarty->assign($name, $value);
    }

    protected abstract function getTemplate(): string;

}

