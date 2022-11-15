<?php

$userChoice = readline('enter 1 for array test, 2 for generator test (10k times more results): ');
switch ($userChoice) {
    case 1:
//        version 1

        $rng = range(1, 3000000000);
        foreach ($rng as $r) {
            echo $r;
        }
        break;

    case 2:
//        version 2

        function doRange($min, $max): Generator
        {
            for ($i = $min; $i <= $max; $i++) {
                yield $i;
            }
        }
        $min = 1;
        $max = 30000000000000;
        $range = doRange($min, $max);

        for ($i = 0; $i < ($max - $min); $i++) {
            echo $range->current();
            $range->next();
        }
    break;

    case 3:
//        version 3
//        this can do less than version 1

        $rangeThree = range(1, 30000000000);
        function doRangeThree(array $numbers): Generator
        {
            foreach ($numbers as $number) {
                yield $number;
            }
        }

        $rangeGenerator = doRangeThree($rangeThree);

        foreach ($rangeThree as $item) {
            echo $rangeGenerator->current();
            $rangeGenerator->next();
        }
}