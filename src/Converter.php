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

        foreach ($input as $rowString) {
            $rowArray = str_split($rowString);

            foreach ($rowArray as $key => $bit) {
                $output[$key][] = (int) $bit;
            }
        }

        return $output;
    }

    public function arrayToHex(array $input) : string
    {
        $binArray = [];

        foreach ($input as $rowArray) {
            foreach ($rowArray as $key => $bit) {
                if (isset($binArray[$key])) {
                    $binArray[$key] .= $bit;
                } else {
                    $binArray[$key] = $bit;
                }
            }
        }

        $output = [];
        foreach ($binArray as $bin) {
            $output[] = sprintf(
                '%02s',
                base_convert($bin, 2, 16)
            );
        }

        return implode('-', $output);
    }
}
