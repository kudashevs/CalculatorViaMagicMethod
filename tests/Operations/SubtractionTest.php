<?php

namespace CalculatorViaMagicMethod\Tests\Operations;

use CalculatorViaMagicMethod\Operations\Subtraction;
use PHPUnit\Framework\TestCase;

class SubtractionTest extends TestCase
{
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Subtraction();

        $this->assertSame(32, $addition->calculate(12, -20));
    }

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, array $data)
    {
        $operation = new Subtraction();

        $this->assertSame($expected, $operation->calculate(...$data));
    }

    public function provideData(): array
    {
        return [
            'Valid integers' => [10, [22, 12]],
            'Valid floats' => [-2.225, [1.5, 3.725]],
            'Valid integer and float' => [60.5, [102.5, 42]],
        ];
    }
}
