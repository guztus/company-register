<?php
//
//require_once "vendor/autoload.php";
//
//use League\Csv\Reader;
//use League\Csv\Statement;
//
//use App\Record;
//
//$csv = Reader::createFromPath('register.csv', 'r');
//$csv->setHeaderOffset(0);
//
////$header = $csv->getHeader();
//$records = $csv->getRecords();
//
//$stmt = Statement::create()
//    ->offset(1)
//    ->limit(1)
//;
//
//$records = $stmt->process($csv);
//
//foreach ($records as $record) {
//    new Record($record);
//}