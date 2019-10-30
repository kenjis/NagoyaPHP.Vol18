<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku18;

class Converter
{
    public function hexToBin(string $hexadecimal) : string
    {
        return sprintf(
            '%08d',
            base_convert($hexadecimal, 16, 2)
        );
    }

    public function convertToArray(array $input) : array
    {
        $output = [];

        foreach ($input as $line) {
            $lineArray = str_split($line);

            foreach ($lineArray as $key => $bit) {
                $output[$key][] = (int) $bit;
            }
        }

        return $output;
    }
}
