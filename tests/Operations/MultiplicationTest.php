<?php

namespace CalculatorViaMagicMethod\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaMagicMethod\Operations\Multiplication;

class MultiplicationTest extends TestCase
{
    /**
     * Exceptions.
     */

    /**
     * Corner cases.
     */
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Multiplication(12, -20);

        $this->assertSame(-240, $addition->calculate());
    }

    /**
     * Functionality.
     */

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Multiplication(...$data);

        $this->assertSame($expected, $operation->calculate());
    }

    public function provideData()
    {
        return [
            'When contains zero' => [0, [22, 12, 0]],
            'Valid integers' => [110, [22, 5]],
            'Valid floats' => [28.0, [3.5, 8]],
            'Valid integer and float' => [5.5, [2.75, 2]],
        ];
    }
}
