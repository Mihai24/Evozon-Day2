<?php

function readFileNumbersAscending(string $fileName)
{
    if (!file_exists($fileName))
    {
        exit('File not found.');
    }

    $file = fopen($fileName, 'r');

    if ($file)
    {
        while(!feof($file))
        {
            $number = fgetc($file);

            if ($number == ' ')
            {
                continue;
            }

            // 404 solution not found... thinking
        }
    }

    fclose($file);
}


echo readFileNumbersAscending('file.txt');