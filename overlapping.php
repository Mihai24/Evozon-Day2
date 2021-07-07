<?php


    $startDate1 = '11-04-2021 10:00:00';
    
    $endDate1 = '12-04-2021 10:00:00';

    $startDate2 = '04-04-2021 21:30:15';

    $endDate2 = '05-04-2021 04:30:00';

    function convertDateTimeInSeconds(string $date): int
    {
        $year = 31556926;

        $month = 2629743;
    
        $day = 86400;
    
        $hour = 3600;
    
        $minute = 60;

        $splitSpaces = explode(' ', $date);
        $splitLines = explode('-', $splitSpaces[0]);
        $splitSeparator = explode(':', $splitSpaces[1]);
        $array = array_merge($splitLines, $splitSeparator);

        return (int)$array[0] * $day + (int)$array[1] * $month + (int)$array[2] * $year + 
                (int)$array[3] * $hour + (int)$array[4] * $minute + (int)$array[5];
    }

    function validateDates(string $startDate, string $endDate): bool
    {
        //Check if startDate is lower than endDate
        return convertDateTimeInSeconds($startDate) < convertDateTimeInSeconds($endDate) ? true : false;
    }

    function checkForOverlapping(string $startDate1, string $endDate1, string $startDate2, string $endDate2): bool
    {
        if (validateDates($startDate1, $endDate1) == true && validateDates($startDate2, $endDate2) == true)
        {
            //Check dates for overlapping after validation
            return convertDateTimeInSeconds($endDate1) <= convertDateTimeInSeconds($startDate2) 
            && convertDateTimeInSeconds($startDate1) >= convertDateTimeInSeconds($endDate2) ? false : true;
        }

        return true;
    }

    var_dump(checkForOverlapping($startDate1, $endDate1, $startDate2, $endDate2));
