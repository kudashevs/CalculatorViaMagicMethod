<?php

namespace CalculatorViaMagicMethod\Tests\Operations;

use CalculatorViaMagicMethod\Operations\Multiplication;
use PHPUnit\Framework\TestCase;

class MultiplicationTest extends TestCase
{
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Multiplication(12, -20);

        $this->assertSame(-240, $addition->calculate());
    }

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
