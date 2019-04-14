<?php
namespace action\page;

class IndexPageAction extends AbstractPageAction
{

    public function init()
    {
        $this->assign('title', 'ツール置き場');
        $this->assign('activePage', 0);
    }

    public function execute()
    {}

    protected function getTemplate(): string
    {
        return __DIR__ . '/../../../view/template/IndexPage.html';
    }

}
