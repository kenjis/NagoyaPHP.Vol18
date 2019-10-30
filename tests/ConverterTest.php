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

    public function test_2進数の配列を行と列を置き換えた配列に変換できる() : void
    {
        $converter = new Converter();

        $input = [
            '11111111',
            '00101111',
            '00100011',
        ];
        $actual = $converter->convertToArray($input);

        $expected = [
            [1, 0, 0],
            [1, 0, 0],
            [1, 1, 1],
            [1, 0, 0],
            [1, 1, 0],
            [1, 1, 0],
            [1, 1, 1],
            [1, 1, 1],
        ];
        $this->assertSame($expected, $actual);
    }

    public function test_全て1の行を削除して先頭を0の行で埋めることができる() : void
    {
        $converter = new Converter();

        $input = [
            [1, 0, 0],
            [1, 0, 0],
            [1, 1, 1],
            [1, 0, 0],
            [1, 1, 0],
            [1, 1, 0],
            [1, 1, 1],
            [1, 1, 1],
        ];

        $actual = $converter->removeRows($input);

        $expected = [
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0],
            [1, 0, 0],
            [1, 0, 0],
            [1, 0, 0],
            [1, 1, 0],
            [1, 1, 0],
        ];
        $this->assertSame($expected, $actual);
    }

    public function test_配列の行と列を置き換えて16進数文字列に変換できる() : void
    {
        $converter = new Converter();

        $input = [
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0],
            [1, 0, 0],
            [1, 0, 0],
            [1, 0, 0],
            [1, 1, 0],
            [1, 1, 0],
        ];
        $actual = $converter->arrayToHex($input);

        $expected = '1f-03-00';
        $this->assertSame($expected, $actual);
    }
}
