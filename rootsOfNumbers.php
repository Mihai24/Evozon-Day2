<?php

function readFileNumbersAscending(string $fileName)
{
    if (!file_exists($fileName))
    {
        exit('File not found.');
    }

    $file = fopen($fileName, 'r');

    $bites = 0b0000000000;
    
    if ($file)
    {
        while(!feof($file))
        {
            $number = fgetc($file);

            if ($number == ' ')
            {
                continue;
            }

            $number = 0b0000000001 | $bites << $number;
        }
    }

    fclose($file);
}

echo readFileNumbersAscending('file.txt');