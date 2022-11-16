<?php declare(strict_types=1);

require_once "vendor/autoload.php";

use App\Company;
use App\CsvProcessor;
use App\CompanySearch;
use App\DisplayFunctions;

$records = new CsvProcessor('register.csv', ';', 0);

$allRecords = $records->getAllRecords();
$search = new CompanySearch();

$totalCompanyAmount = null;

DisplayFunctions::displayOptions();
$userChoice = readline();

switch ($userChoice) {
    case -1:
        echo "Counting...";
        $totalCompanyAmount = $records->getCsv()->count();
        echo PHP_EOL;
        echo "Finished counting!" . PHP_EOL;
        echo "There are " . $totalCompanyAmount . " companies in the list!" . PHP_EOL;
        echo PHP_EOL;
        break;

    case 0:
        exit;

    case 1:
        echo "Available search types - 'type' " . PHP_EOL;
        $userSearch = readline('Enter desired search query: ');
        $userSearchType = 'type';
        $searchResult = $search->countByCompanyType($allRecords, $records->getHeader(), $userSearchType, $userSearch);

        echo "Found " . $searchResult . " results for " . "'{$userSearch}'" . PHP_EOL;
        break;

    case 2:
        echo "Choose search type - 'name' OR 'regcode': " . PHP_EOL;
        $userSearchType = readline('Enter desired search type: ');

        if ($userSearchType !== 'name' && $userSearchType !== 'regcode') {
            echo "Entered search type is not valid!" . PHP_EOL;
            exit;
        }

        $userSearch = readline('Enter desired search query: ');
        if ($userSearchType == 'name') {
            $userSearchType = 'name_in_quotes';
        }

        $searchResult = $search->searchByCompanyType($allRecords, $records->getHeader(), $userSearchType, $userSearch);
        if ($searchResult == null) {
            echo PHP_EOL;
            echo "Nothing was found!";
            echo PHP_EOL;
            break;
        }
        $searchResultAsCompany = new Company($searchResult['regcode'], $searchResult['name'], $searchResult['type'], $searchResult['registered'], $searchResult['terminated'], $searchResult['closed'], $searchResult['address']);

        DisplayFunctions::displayCompanies($searchResultAsCompany);
        break;

    case 3:
        $allRecordsForCounting = new CsvProcessor('register.csv', ';', 0);
        $allRecordCount = $allRecordsForCounting->getCsv()->count();

        $records = new CsvProcessor('register.csv', ';', 0, $allRecordCount - 30);

        foreach($records->getAllRecords() as $record) {
            $company = new Company($record['regcode'], $record['name'], $record['type'], $record['registered'], $record['terminated'], $record['closed'], $record['address']);

            DisplayFunctions::displayCompanies($company);
        }
}