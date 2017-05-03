<?php


$fileIn = "text.txt";
$fileOut = "result.txt";

if (!file_exists($fileIn) OR !file_exists($fileOut) OR !is_writable($fileOut)) {
    echo 'One of file does not exist or permission denided';
}

$handle = fopen($fileIn, "r");
if ($handle) {
    $position = 0;
    while (($buffer = fgets($handle, 4096)) !== false) {
        $words = explode(" ", $buffer);
        foreach ($words as $key => $word) {
            $position++;

            if ($position % 3 == 0 AND $position % 5 == 0) {
                $words[$key] = '-ПЯТНАДЦАТЬ-';
            } else if ($position % 3 == 0) {
                $words[$key] = '-ТРИ-';
            } else if ($position % 5 == 0) {
                $words[$key] = '-ПЯТЬ-';
            }
        }
        file_put_contents($fileOut, implode(" ", $words), FILE_APPEND);

    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}