<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku18;

use PHPUnit\Framework\TestCase;

class Dokaku18Test extends TestCase
{
    /**
     * @var Dokaku18
     */
    protected $dokaku18;

    protected function setUp() : void
    {
        $this->dokaku18 = new Dokaku18;
    }

    public function testIsInstanceOfDokaku18() : void
    {
        $actual = $this->dokaku18;
        $this->assertInstanceOf(Dokaku18::class, $actual);
    }
}
