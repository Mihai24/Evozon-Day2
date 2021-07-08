<?php

    $startDate1 = '10-05-2021 10:00:00';

    $endDate1 = '13-05-2021 10:00:00';

    $startDate2 = '04-04-2021 21:30:15';

    $endDate2 = '08-05-2021 04:30:00';

    const YEAR = 31556926;

    const MONTH = 2629743;

    const DAY = 86400;

    const HOUR = 3600;

    const MINUTE = 60;

    function convertDateTimeInSeconds(string $date): int
    {
        //Split datetime string in array
        $splitSpaces = explode(' ', $date);
        $splitLines = explode('-', $splitSpaces[0]);
        $splitSeparator = explode(':', $splitSpaces[1]);
        $array = array_merge($splitLines, $splitSeparator);

        //Calculate datetime from array in seconds
        return (int)$array[0] * DAY + (int)$array[1] * MONTH + (int)$array[2] * YEAR +
            (int)$array[3] * HOUR + (int)$array[4] * MINUTE + (int)$array[5];
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
            return convertDateTimeInSeconds($startDate1) <= convertDateTimeInSeconds($endDate2)
            && convertDateTimeInSeconds($endDate1) >= convertDateTimeInSeconds($startDate2) ? true : false;
        }

        return true;
    }

    var_dump(checkForOverlapping($startDate1, $endDate1, $startDate2, $endDate2));