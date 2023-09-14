<?php

namespace CalculatorViaMagicMethod\Tests\Operations;

use CalculatorViaMagicMethod\Operations\Subtraction;
use PHPUnit\Framework\TestCase;

class SubtractionTest extends TestCase
{
    /**
     * Exceptions.
     */

    /**
     * Corner cases.
     */
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Subtraction(12, -20);

        $this->assertSame(32, $addition->calculate());
    }

    /**
     * Functionality.
     */

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Subtraction(...$data);

        $this->assertSame($expected, $operation->calculate());
    }

    public function provideData()
    {
        return [
            'Valid integers' => [10, [22, 12]],
            'Valid floats' => [-2.225, [1.5, 3.725]],
            'Valid integer and float' => [60.5, [102.5, 42]],
        ];
    }
}
