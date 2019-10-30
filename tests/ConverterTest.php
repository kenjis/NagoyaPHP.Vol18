<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku18;

use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    public function providerHexData()
    {
        return [
            ['00', '00000000'],
            ['ff', '11111111'],
            ['2f', '00101111'],
            ['77', '01110111'],
        ];
    }

    /**
     * @dataProvider providerHexData
     */
    public function test_16進数を2進数に変換できる($input, $expected) : void
    {
        $converter = new Converter();

        $actual = $converter->hexToBin($input);

        $this->assertSame($expected, $actual);
    }
}
