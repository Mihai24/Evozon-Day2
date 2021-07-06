<?php

    $startDate1 = '14-05-2021 10:00:00';
    
    $endDate1 = '13-05-2021 00:00:00';

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
            return $startDate1 <= $endDate2 && $endDate1 >= $startDate2 ? true : false;
        }

        return true;
    }

    var_dump(checkForOverlapping($startDate1, $endDate1, $startDate2, $endDate2));