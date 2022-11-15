<?php declare(strict_types=1);

namespace App;

use League\Csv\Reader;
use League\Csv\Statement;

class CsvProcessor
{
    protected \League\Csv\TabularDataReader $records;
    protected array $header;
    private \League\Csv\Reader $csv;

    public function __construct(string $path, string $delimiter, int $headerOffset, int $resultOffset = 0)
    {
        $csv = Reader::createFromPath($path, 'r');
        $csv->setDelimiter($delimiter);
        $csv->setHeaderOffset($headerOffset);
        $this->csv = $csv;

        $stmt = Statement::create()->offset($resultOffset)->process($csv);
        $this->records = $stmt;

        $this->header = $csv->getHeader();
    }

    public function getAllRecords(): \Iterator
    {
        return $this->records->getRecords();
    }

    public function getHeader(): array
    {
        return $this->header;
    }

    public function getCsv(): Reader
    {
        return $this->csv;
    }
}