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
}
