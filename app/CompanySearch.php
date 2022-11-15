<?php declare(strict_types=1);

namespace App;

use Iterator;

class CompanySearch
{
    public function countByCompanyType(Iterator $allRecords, array $header, string $searchType, string $userSearch): ?int
    {
        $i = 0;
        if (in_array($searchType, $header)) {
            foreach ($allRecords as $record) {
                if (strtolower($record[$searchType]) == strtolower($userSearch)) {
                    $i++;
                }
            }
        }
        return ($i > 0) ? $i : null;
    }

    public function searchByCompanyType(Iterator $allRecords, array $header, string $searchType, string $userSearch)
    {
        $found = null;
        if (in_array($searchType, $header)) {
            foreach ($allRecords as $record) {
                if (strtolower($record[$searchType]) == strtolower($userSearch)) {
                    $found = $record;
                    break;
                }
            }
        }
        return $found;
    }
}