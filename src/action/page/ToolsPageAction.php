<?php
namespace action\page;

class ToolsPageAction extends AbstractPageAction
{

    public function init()
    {
        $this->assign('title', 'ツール');
        $this->assign('activePage', 1);
        $this->assign('breadcrumb', [
            ['title' => 'ツール', 'href' => '/tools']
        ]);
    }

    public function execute()
    {}

    protected function getTemplate(): string
    {
        return __DIR__ . '/../../../view/template/ToolsPage.html';
    }

}
