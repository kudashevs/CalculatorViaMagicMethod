<?php

namespace CalculatorViaMagicMethod\Tests\Operations;

use CalculatorViaMagicMethod\Operations\Addition;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $operation = new Addition();

        $this->assertSame(-8, $operation->calculate(12, -20));
    }

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, array $data)
    {
        $operation = new Addition();

        $this->assertSame($expected, $operation->calculate(...$data));
    }

    public function provideData(): array
    {
        return [
            'Valid integers' => [32, [12, 20]],
            'Valid floats' => [2.922222, [0.5, 2.422222]],
            'Valid integer and float' => [17.5, [12.5, 5]],
        ];
    }
}
