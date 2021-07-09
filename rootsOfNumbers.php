<?php

function readFileNumbersAscending(string $fileName): void
{
    if (!file_exists($fileName))
    {
        exit('File not found.');
    }

    $file = fopen($fileName, 'r');

    $bites = 0;

    if ($file)
    {
        while(!feof($file)) {
            $number = fgetc($file);

            if ($number === false) {
                break;
            }

            if ($number == ' ') {
                continue;
            }

            $bites = (1 << (int)$number) | $bites;
        }
    }
    fclose($file);

    for ($i = 0; $i <= 9; $i++)
    {
        if ((1 << $i) & $bites)
        {
            echo $i . ' ';
        }
    }
}

readFileNumbersAscending('file');