<?php
namespace action\api;

use action\Action;
use core\ApplicationException;
use util\common\CommonConst;
use util\common\CommonUtil;
use util\csv\CsvParser;

class CsvParseAction implements Action
{

    protected $csvData;

    protected $inputData;

    protected $enclosure;

    protected $delimiter;

    protected $enclosureOut;

    protected $delimiterOut;

    protected $outputType;

    public function init()
    {
        $this->inputData = $_REQUEST['inputData'] ?? '';
        $this->enclosure = $_REQUEST['enclosure'] ?? '';
        $this->delimiter = CommonUtil::unescape($_REQUEST['delimiter'] ?? '');
        $this->enclosureOut = CommonUtil::unescape($_REQUEST['enclosureOut'] ?? '');
        $this->delimiterOut = CommonUtil::unescape($_REQUEST['delimiterOut'] ?? '');
        $this->outputType = $_REQUEST['outputType'] ?? '';
    }

    public function respond()
    {
        if ($this->outputType === CommonConst::OUTPT_TYPE_PREVIEW) {
            header('Content-Type: application/json; charset=utf-8');
            $response = [
                'jsonData' => $this->csvData->getLines(),
                'data' => $this->csvData->convert($this->enclosureOut, $this->delimiterOut)
            ];
            echo json_encode($response);
        } else if ($this->outputType === CommonConst::OUTPT_TYPE_FILE) {
            $content = $this->csvData->convert($this->enclosureOut, $this->delimiterOut);
            header('Content-Length: ' . strlen($content));
            header('Content-Type: text/csv; charset=utf8');
            header('Content-Disposition: attachment; filename="' . 'output' . '"');
            try {
                echo $this->csvData->convert($this->enclosureOut, $this->delimiterOut);
            } catch (ApplicationException $e) {
                $e->setType(3);
                throw $e;
            }
        }
    }

    public function execute()
    {
        $parser = new CsvParser();
        if ($this->enclosure !== '') {
            $parser->setEnclosure($this->enclosure);
        }
        if ($this->delimiter !== '') {
            $parser->setDelimiter($this->delimiter);
        }
        $this->csvData = $parser->parseString($this->inputData);
    }
}