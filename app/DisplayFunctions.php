<?php

namespace App;

use App\Company;

class DisplayFunctions {
    public static function displayOptions()
    {
        echo "-1 - count companies in list" . PHP_EOL;
        echo " 0 - exit" . PHP_EOL;
        echo " 1 - count occurrences" . PHP_EOL;
        echo " 2 - search up a company" . PHP_EOL;
        echo " 3 - list bottom 30 lines from the file" . PHP_EOL;
    }

    public static function displayCompanies(Company $company): void
    {
        echo PHP_EOL;
        if ($company->getClosed() !== null) {
            echo "The company was closed!" . PHP_EOL;
            echo "Terminated in   " . $company->getTerminated() . PHP_EOL;
            echo PHP_EOL;
        }
        echo "Registration code:   " . $company->getRegistrationCode() . PHP_EOL;
        echo "Company type:        " . $company->getType() . PHP_EOL;
        echo "Full company name:   " . $company->getName() . PHP_EOL;
        echo "Registered in:       " . $company->getRegistered() . PHP_EOL;
        echo "Full address:        " . $company->getAddress() . PHP_EOL;
    }

}