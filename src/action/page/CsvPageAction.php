<?php
namespace action\page;

class CsvPageAction extends AbstractPageAction
{

    public function init()
    {
        $this->assign('title', 'CSV解析');
        $this->assign('activePage', 1);
        $this->assign('breadcrumb', [
            ['title' => 'ツール', 'href' => '/tools'],
            ['title' => 'CSV解析', 'href' => '/tools/csv']
        ]);
    }

    public function execute()
    {}

    protected function getTemplate(): string
    {
        return __DIR__ . '/../../../view/template/CsvPage.html';
    }

}
