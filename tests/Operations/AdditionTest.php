<?php

namespace CalculatorViaMagicMethod\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaMagicMethod\Operations\Addition;

class AdditionTest extends TestCase
{
    /**
     * Exceptions.
     */

    /**
     * Corner cases.
     */
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $operation = new Addition(12, -20);

        $this->assertSame(-8, $operation->calculate());
    }

    /**
     * Functionality.
     */

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
