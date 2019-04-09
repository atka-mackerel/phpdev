<?php
namespace action\api;

use util\csv\CsvParser;
use util\common\CommonConst;

class CsvFileParseAction extends CsvParseAction
{

    private $uploadFileName;

    public function init()
    {
        parent::init();
        $this->uploadFileName = $_FILES['file']['tmp_name'] ?? '';
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
            header('Content-Type: text/csv; charset=utf8');
            header('Content-Disposition: attachment; filename="' . 'output' . '"');
            foreach ($this->csvData->convertStream($this->enclosureOut, $this->delimiterOut) as $line) {
                echo $line;
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

        $this->csvData = $parser->parseFile($this->uploadFileName);
        foreach ($this->csvData->convertStream($this->enclosureOut, $this->delimiterOut) as $line) {}
        $this->csvData = $parser->parseFile($this->uploadFileName);
    }
}