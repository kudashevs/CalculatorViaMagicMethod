<?php

namespace CalculatorViaMagicMethod\Tests\Operations;

use CalculatorViaMagicMethod\Operations\Addition;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $operation = new Addition(12, -20);

        $this->assertSame(-8, $operation->calculate());
    }

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Addition(...$data);

        $this->assertSame($expected, $operation->calculate());
    }

    public function provideData()
    {
        return [
            'Valid integers' => [32, [12, 20]],
            'Valid floats' => [2.922222, [0.5, 2.422222]],
            'Valid integer and float' => [17.5, [12.5, 5]],
        ];
    }
}
