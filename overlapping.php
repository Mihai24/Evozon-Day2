<?php

    $startDate1 = '11-04-2021 10:00:00';
    
    $endDate1 = '11-04-2021 10:00:00';

    $startDate2 = '04-04-2021 21:30:15';

    $endDate2 = '11-04-2021 04:30:00';

    function validateDates(string $startDate, string $endDate): bool
    {
        //Check if startDate is lower than endDate
        return $startDate < $endDate ? true : false;
    }

    function checkForOverlapping(string $startDate1, string $endDate1, string $startDate2, string $endDate2): bool
    {
        if (validateDates($startDate1, $endDate1) == true && validateDates($startDate2, $endDate2) == true)
        {
            //Check dates for overlapping after validation
            return $endDate1 <= $startDate2 && $startDate1 >= $endDate2 ? false : true;
        }

        return true;
    }

    var_dump(checkForOverlapping($startDate1, $endDate1, $startDate2, $endDate2));

   preg_match_all("/0*(\d+)/", $startDate1, $array);
   var_dump($array);