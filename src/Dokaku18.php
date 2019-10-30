<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku18;

class Dokaku18
{
    public function run(string $input) : string
    {
        $converter = new Converter();

        $hexArray = explode('-', $input);

        $binArray = [];
        foreach ($hexArray as $hex) {
            $binArray[] = $converter->hexToBin($hex);
        }

        $transpose = $converter->convertToArray($binArray);
        $newArray = $converter->removeRows($transpose);

        return $converter->arrayToHex($newArray);
    }
}
